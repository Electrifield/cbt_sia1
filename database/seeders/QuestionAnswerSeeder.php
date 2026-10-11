<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionAnswerSeeder extends Seeder
{
    private const TOTAL_PER_SUBJECT = 150;

    public function run(): void
    {
        mt_srand(2026); // agar hasil acak konsisten setiap kali seeder dijalankan

        $map = [
            'Pemrograman Dasar' => 'pemrogramanDasarQuestions',
            'Sistem Operasi'    => 'sistemOperasiQuestions',
            'Matematika'        => 'matematikaQuestions',
        ];

        foreach ($map as $subjectName => $method) {
            $subject = Subject::where('name', $subjectName)->first();

            if (! $subject) {
                $this->command?->warn("Mata pelajaran '{$subjectName}' tidak ditemukan, dilewati.");

                continue;
            }

            $pool = self::{$method}();
            shuffle($pool);
            $pool = array_slice($pool, 0, self::TOTAL_PER_SUBJECT);

            DB::transaction(function () use ($subject, $pool, $subjectName) {
                // Bersihkan soal lama milik pelajaran ini (jawabannya ikut terhapus via cascadeOnDelete)
                Question::withTrashed()->where('subject_id', $subject->id)->forceDelete();

                foreach ($pool as $item) {
                    $question = Question::create([
                        'subject_id'  => $subject->id,
                        'payload'     => $item['question'],
                        'score'       => 1,
                        'description' => null,
                        'is_active'   => true,
                    ]);

                    foreach ($item['options'] as $option) {
                        Answer::create([
                            'question_id' => $question->id,
                            'text'        => $option['text'],
                            'is_correct'  => $option['correct'],
                            'is_active'   => true,
                        ]);
                    }
                }

                $this->command?->info("{$subjectName}: " . count($pool) . " soal berhasil dibuat.");
            });
        }
    }

    private static function buildMcq(string $question, string $correct, array $wrongs): array
    {
        $options = [['text' => $correct, 'correct' => true]];

        foreach ($wrongs as $w) {
            $options[] = ['text' => $w, 'correct' => false];
        }

        shuffle($options);

        return ['question' => $question, 'options' => $options];
    }

    private static function pickDistractors(array $pairs, int|string $excludeKey, int $n, bool $wantValue, array $fallbackPool = []): array
    {
        $excludeValue = $wantValue ? ($pairs[$excludeKey] ?? '') : $excludeKey;
        $excludeNormalized = mb_strtolower(trim((string) $excludeValue));

        $seen = [$excludeNormalized => true];
        $result = [];

        $candidates = $pairs;
        unset($candidates[$excludeKey]);
        $keys = array_keys($candidates);
        shuffle($keys);

        foreach ($keys as $k) {
            $val = $wantValue ? (string) $candidates[$k] : (string) $k;
            $norm = mb_strtolower(trim($val));
            if (isset($seen[$norm])) {
                continue;
            }
            $seen[$norm] = true;
            $result[] = $val;
            if (count($result) >= $n) {
                break;
            }
        }

        if (count($result) < $n && ! empty($fallbackPool)) {
            $extra = $fallbackPool;
            shuffle($extra);
            foreach ($extra as $val) {
                $norm = mb_strtolower(trim($val));
                if (isset($seen[$norm])) {
                    continue;
                }
                $seen[$norm] = true;
                $result[] = $val;
                if (count($result) >= $n) {
                    break;
                }
            }
        }

        return $result;
    }

    private static function buildLookupQuestions(array $pairs, string $askValue, ?string $askKey = null, int $distractorCount = 3, array $valueFallbackPool = []): array
    {
        $items = [];

        foreach ($pairs as $key => $value) {
            $wrongValues = self::pickDistractors($pairs, $key, $distractorCount, true, $valueFallbackPool);
            if (count($wrongValues) < $distractorCount) {
                continue;
            }
            $items[] = self::buildMcq(sprintf($askValue, $key), (string) $value, $wrongValues);

            if ($askKey !== null) {
                $wrongKeys = self::pickDistractors($pairs, $key, $distractorCount, false);
                if (count($wrongKeys) < $distractorCount) {
                    continue;
                }
                $items[] = self::buildMcq(sprintf($askKey, $value), (string) $key, $wrongKeys);
            }
        }

        return $items;
    }

    private static function numericDistractors(int|float $correct, int $minDelta = 1, int $maxDeltaPercent = 30): array
    {
        $wrongs = [];
        $attempts = 0;

        while (count($wrongs) < 3 && $attempts < 50) {
            $attempts++;
            $deltaBase = max($minDelta, (int) round(abs($correct) * mt_rand(5, $maxDeltaPercent) / 100));
            $delta = mt_rand(1, max(1, $deltaBase)) * (mt_rand(0, 1) ? 1 : -1);
            $w = $correct + $delta;

            if ($w == $correct || $w < 0) {
                continue;
            }

            $wStr = (string) (is_float($correct) ? round($w, 2) : (int) $w);

            if (! in_array($wStr, $wrongs, true)) {
                $wrongs[] = $wStr;
            }
        }

        $i = 1;
        while (count($wrongs) < 3) {
            $w = (string) ($correct + $i);
            if ($w !== (string) $correct && ! in_array($w, $wrongs, true)) {
                $wrongs[] = $w;
            }
            $i++;
        }

        return $wrongs;
    }

    private static function gcd(int $a, int $b): int
    {
        return $b === 0 ? max($a, 1) : self::gcd($b, $a % $b);
    }

    // PEMROGRAMAN DASAR (Menghasilkan > 160 Soal Unik)

    private static function pemrogramanDasarQuestions(): array
    {
        $items = [];

        // 1. Tipe Data & Konsep Dasar (20 pasang x 2 bentuk soal = 40 soal)
        $tipeData = [
            'Integer' => 'tipe data untuk menyimpan bilangan bulat tanpa desimal',
            'Float' => 'tipe data untuk menyimpan bilangan pecahan presisi tunggal',
            'Double' => 'tipe data untuk menyimpan bilangan desimal presisi ganda',
            'String' => 'tipe data untuk menyimpan sekumpulan karakter atau teks',
            'Boolean' => 'tipe data yang hanya bernilai benar (true) atau salah (false)',
            'Array' => 'struktur data yang menyimpan kumpulan elemen sejenis dalam indeks terurut',
            'Char' => 'tipe data untuk menyimpan satu karakter tunggal',
            'NULL' => 'penanda khusus bahwa suatu variabel belum memiliki nilai',
            'Object' => 'instansiasi dari class yang berisi property dan method',
            'Constant (Konstanta)' => 'variabel yang nilainya bersifat tetap dan tidak dapat diubah setelah dideklarasikan',
            'Pointer' => 'variabel yang menyimpan alamat memori dari variabel lain',
            'Enum' => 'tipe data bentukan yang terdiri dari sekumpulan konstanta bernama',
            'Struct' => 'tipe data komposit yang menggabungkan beberapa variabel dengan tipe berbeda',
            'Typecasting' => 'proses konversi tipe data dari satu jenis ke jenis lainnya secara eksplisit',
            'Global Variable' => 'variabel yang dapat diakses di seluruh bagian program',
            'Local Variable' => 'variabel yang hanya dikenali di dalam blok kode tempat ia dideklarasikan',
            'Literal' => 'nilai tetap yang ditulis langsung di dalam kode program',
            'Scope' => 'jangkauan area di mana suatu variabel dapat diakses',
            'Syntax Error' => 'kesalahan akibat pelanggaran aturan penulisan tata bahasa pemrograman',
            'Runtime Error' => 'kesalahan yang terjadi saat program sedang dieksekusi atau berjalan',
        ];
        $items = array_merge($items, self::buildLookupQuestions(
            $tipeData,
            'Pengertian dari istilah/tipe data %s adalah...',
            'Istilah atau tipe data yang digunakan untuk %s adalah...'
        ));

        // 2. Operator Pemrograman (15 pasang x 2 = 30 soal)
        $operator = [
            'Aritmatika' => 'operator untuk operasi matematika seperti penjumlahan dan perkalian',
            'Logika' => 'operator untuk membandingkan dua kondisi boolean (AND, OR, NOT)',
            'Relasional' => 'operator untuk membandingkan nilai dua operan (>, <, ==)',
            'Assignment' => 'operator untuk memberikan nilai ke dalam variabel (=, +=)',
            'Modulus (%)' => 'operator aritmatika untuk mendapatkan sisa hasil bagi',
            'Increment (++)' => 'operator untuk menambah nilai variabel sebesar 1',
            'Decrement (--)' => 'operator untuk mengurangi nilai variabel sebesar 1',
            'Ternary' => 'operator kondisi ringkas tiga operan pengganti percabangan IF ringkas',
            'Bitwise' => 'operator yang melakukan manipulasi pada tingkat bit individual',
            'Identity (===)' => 'operator yang membandingkan nilai dan tipe data secara identik',
            'Concatenation' => 'operator yang digunakan untuk menggabungkan dua string',
            'Logical AND (&&)' => 'menghasilkan true jika kedua kondisi bernilai true',
            'Logical OR (||)' => 'menghasilkan true jika salah satu kondisi bernilai true',
            'Logical NOT (!)' => 'membalikkan nilai kebenaran suatu kondisi boolean',
            'Not Equal (!=)' => 'menghasilkan true jika kedua nilai yang dibandingkan tidak sama',
        ];
        $items = array_merge($items, self::buildLookupQuestions(
            $operator,
            'Dalam pemrograman, %s berfungsi sebagai...',
            'Operator yang %s adalah...'
        ));

        // 3. Struktur Kontrol & Perulangan (15 pasang x 2 = 30 soal)
        $kontrol = [
            'IF-ELSE' => 'mengevaluasi kondisi bernilai true/false untuk menentukan alur eksekusi',
            'SWITCH-CASE' => 'memilih salah satu dari banyak blok kode berdasarkan nilai ekspresi tunggal',
            'FOR Loop' => 'digunakan ketika jumlah iterasi perulangan sudah diketahui pasti',
            'WHILE Loop' => 'mengevaluasi kondisi di awal sebelum mengeksekusi blok kode',
            'DO-WHILE Loop' => 'menjalankan blok kode minimal satu kali sebelum mengevaluasi kondisi di akhir',
            'BREAK Statement' => 'digunakan untuk menghentikan dan keluar dari perulangan secara langsung',
            'CONTINUE Statement' => 'melompati sisa kode pada iterasi saat ini dan berlanjut ke iterasi berikutnya',
            'Nested Loop' => 'struktur perulangan di mana terdapat loop lain di dalam loop',
            'Infinite Loop' => 'kondisi perulangan yang berjalan tanpa henti karena kondisi selalu true',
            'Pass Statement' => 'perintah kosong yang digunakan sebagai placeholder tanpa eksekusi kode',
            'Foreach Loop' => 'perulangan khusus untuk melintasi setiap elemen pada array/koleksi',
            'Default Case' => 'blok opsional pada switch-case yang dieksekusi jika tidak ada case yang cocok',
            'Return Statement' => 'menghentikan fungsi dan mengembalikan suatu nilai ke pemanggilnya',
            'Catch Block' => 'menangkap dan menangani exception yang terjadi pada blok try',
            'Try Block' => 'membungkus blok kode yang berpotensi menimbulkan runtime error',
        ];
        $items = array_merge($items, self::buildLookupQuestions(
            $kontrol,
            'Tujuan penggunaan %s adalah...',
            'Struktur kontrol/perulangan yang %s adalah...'
        ));

        // 4. Konsep Algoritma & OOP (20 pasang x 2 = 40 soal)
        $konsepOOP = [
            'Algoritma' => 'urutan langkah-langkah logis dan sistematis untuk menyelesaikan masalah',
            'Pseudocode' => 'deskripsi informal algoritma yang ditulis menggunakan bahasa manusia sederhana',
            'Flowchart' => 'diagram grafis yang menggambarkan alur langkah-langkah algoritma',
            'Fungsi' => 'blok kode terorganisir yang dibuat untuk menjalankan tugas spesifik',
            'Parameter' => 'variabel penampung nilai masukan pada saat fungsi dideklarasikan',
            'Argument' => 'nilai riil yang dikirimkan ke dalam fungsi saat dipanggil',
            'Fungsi Rekursif' => 'fungsi yang memanggil dirinya sendiri sampai mencapai base case',
            'Encapsulation' => 'pembungkusan data dan method serta pembatasan akses langsung dari luar class',
            'Inheritance' => 'pewarisan atribut dan method dari class induk ke class anak',
            'Polymorphism' => 'kemampuan suatu method untuk memiliki banyak bentuk/implementasi berbeda',
            'Abstraction' => 'penyembunyian detail kompleksitas dan hanya menampilkan fitur esensial',
            'Constructor' => 'method khusus yang dipanggil otomatis saat objek pertama kali dibuat',
            'Destructor' => 'method khusus yang dipanggil saat objek dihapus dari memori',
            'Interface' => 'kontrak dalam OOP yang berisi daftar method tanpa implementasi body',
            'Abstract Class' => 'class yang tidak dapat diinstansiasi langsung dan berisi method abstrak',
            'Method Overloading' => 'membuat beberapa method bernama sama tetapi beda parameter dalam satu class',
            'Method Overriding' => 'menulis ulang implementasi method milik class induk pada class anak',
            'Getter' => 'method yang bertugas untuk mengambil atau membaca nilai variabel privat',
            'Setter' => 'method yang bertugas untuk mengisi atau mengubah nilai variabel privat',
            'Namespace' => 'pengelompokan elemen kode untuk mencegah bentrok nama (naming collision)',
        ];
        $items = array_merge($items, self::buildLookupQuestions(
            $konsepOOP,
            'Definisi dari %s adalah...',
            'Konsep pemrograman yang berarti %s disebut...'
        ));

        // 5. Algoritma Pemrosesan Array & Sorting (15 pasang x 2 = 30 soal)
        $algoritmaArray = [
            'Bubble Sort' => 'mengurutkan data dengan membandingkan dan menukar pasangan elemen bersebelahan',
            'Selection Sort' => 'mengurutkan data dengan memilih elemen terkecil lalu menukarnya ke posisi tepat',
            'Insertion Sort' => 'mengurutkan data dengan menyisipkan elemen ke posisi terurut satu per satu',
            'Linear Search' => 'mencari data dengan memeriksa setiap elemen array satu per satu dari awal',
            'Binary Search' => 'mencari data pada array terurut dengan membagi dua area pencarian',
            'Stack (Tumpukan)' => 'struktur data linier yang menerapkan prinsip LIFO (Last In First Out)',
            'Queue (Antrean)' => 'struktur data linier yang menerapkan prinsip FIFO (First In First Out)',
            'Push Operation' => 'proses memasukkan elemen baru ke dalam tumpukan (stack)',
            'Pop Operation' => 'proses mengeluarkan elemen teratas dari tumpukan (stack)',
            'Enqueue' => 'proses memasukkan elemen baru ke dalam antrean (queue)',
            'Dequeue' => 'proses mengeluarkan elemen terdepan dari antrean (queue)',
            'Merge Sort' => 'algoritma pengurutan berbasis strategi Divide and Conquer',
            'Quick Sort' => 'mengurutkan data dengan memilih elemen pivot dan membagi array',
            'Multidimensional Array' => 'array yang memiliki lebih dari satu indeks (array di dalam array)',
            'Index Array' => 'posisi nomor urut elemen di dalam array yang umumnya dimulai dari 0',
        ];
        $items = array_merge($items, self::buildLookupQuestions(
            $algoritmaArray,
            'Karakteristik dari %s adalah...',
            'Struktur data atau algoritma yang %s adalah...'
        ));

        return array_values($items);
    }

    // SISTEM OPERASI (Menghasilkan > 160 Soal Unik)

    private static function sistemOperasiQuestions(): array
    {
        $items = [];

        // 1. Arsitektur & Inti Sistem Operasi (20 pasang x 2 = 40 soal)
        $intiSO = [
            'Kernel' => 'komponen inti Sistem Operasi yang mengelola komunikasi hardware dan software',
            'Monolithic Kernel' => 'arsitektur kernel di mana seluruh layanan SO berjalan dalam satu ruang memori kernel',
            'Microkernel' => 'arsitektur kernel minimalis yang menjalankan layanan utama di ruang pengguna',
            'Process' => 'program yang sedang dieksekusi oleh memori dan CPU',
            'Thread' => 'unit terkecil dari eksekusi proses yang membagi memori yang sama',
            'Deadlock' => 'kondisi di mana dua proses atau lebih saling menunggu sumber daya secara permanen',
            'Multitasking' => 'kemampuan SO untuk menjalankan beberapa tugas secara bersamaan',
            'Multiprocessing' => 'penggunaan dua atau lebih CPU dalam satu sistem komputer',
            'Virtual Memory' => 'teknik meminjam ruang penyimpanan sekunder untuk memperluas kapasitas RAM',
            'CPU Scheduling' => 'mekanisme pemilihan proses dari antrean siap untuk dieksekusi CPU',
            'Context Switch' => 'proses menyimpan state CPU saat berpindah dari satu proses ke proses lain',
            'Interrupt' => 'sinyal dari hardware/software yang meminta perhatian segera dari CPU',
            'System Call' => 'antarmuka pemrograman yang menghubungkan aplikasi pengguna ke fungsi kernel',
            'Device Driver' => 'perangkat lunak khusus yang mengontrol operasional perangkat keras tertentu',
            'GUI (Graphical User Interface)' => 'antarmuka berbasis grafis visual untuk memudahkan pengguna',
            'CLI (Command Line Interface)' => 'antarmuka berbasis teks untuk mengeksekusi perintah sistem',
            'Bootloader' => 'program kecil yang bertugas memuat kernel Sistem Operasi ke RAM saat boot',
            'Sistem Operasi Open Source' => 'sistem operasi yang kode sumbernya dibuka untuk umum dan bebas dimodifikasi',
            'Sistem Operasi Proprietary' => 'sistem operasi komersial yang kode sumbernya dilindungi hak cipta',
            'Spooling' => 'penyimpanan data sementara pada buffer agar perangkat I/O dapat memproses secara bertahap',
        ];
        $items = array_merge($items, self::buildLookupQuestions(
            $intiSO,
            'Definisi dari %s dalam Sistem Operasi adalah...',
            'Komponen/istilah SO yang bertugas %s adalah...'
        ));

        // 2. Algoritma Penjadwalan & Memori (15 pasang x 2 = 30 soal)
        $penjadwalan = [
            'FCFS (First-Come First-Served)' => 'mengekskusi proses berdasarkan urutan kedatangan pertama kali',
            'SJF (Shortest Job First)' => 'prioritas dieksekusi pada proses yang memiliki burst time terpendek',
            'Round Robin' => 'mengekskusi proses secara bergiliran menggunakan batas kuantum waktu',
            'Priority Scheduling' => 'mengekskusi proses berdasarkan bobot prioritas tertinggi',
            'Multilevel Queue' => 'memisah antrean proses ke dalam beberapa tingkatan sesuai karakteristiknya',
            'Paging' => 'skema manajemen memori yang membagi memori fisik menjadi blok berukuran tetap (page/frame)',
            'Segmentation' => 'skema manajemen memori yang membagi memori menjadi segmen-segmen variabel logis',
            'Thrashing' => 'kondisi di mana sistem menghabiskan lebih banyak waktu melakukan swapping dibanding eksekusi',
            'First Fit' => 'mengalokasikan memori pada lubang kosong (hole) pertama yang cukup besar',
            'Best Fit' => 'mengalokasikan memori pada lubang kosong yang paling mendekati ukuran proses',
            'Worst Fit' => 'mengalokasikan memori pada lubang kosong terbesar yang tersedia',
            'RAM (Random Access Memory)' => 'memori utama tempat menyimpan data dan instruksi sementara saat komputer menyala',
            'ROM (Read Only Memory)' => 'memori permanen yang berisi instruksi boot dasar (BIOS/UEFI)',
            'Page Fault' => 'interupsi yang terjadi saat halaman memori yang diminta belum ada di RAM',
            'Cache Memory' => 'memori sangat cepat yang menjembatani perbedaan kecepatan CPU dan RAM',
        ];
        $items = array_merge($items, self::buildLookupQuestions(
            $penjadwalan,
            'Prinsip kerja dari %s adalah...',
            'Algoritma atau skema memori yang %s adalah...'
        ));

        // 3. File System & Media Penyimpanan (15 pasang x 2 = 30 soal)
        $fileSystem = [
            'NTFS' => 'sistem berkas standar Windows yang mendukung fitur enkripsi dan enkapsulasi file besar',
            'FAT32' => 'sistem berkas kompatibel luas namun terbatas ukuran file maksimal 4 GB',
            'ext4' => 'sistem berkas standar yang paling umum dipakai pada distribusi Linux',
            'SWAP Partition' => 'partisi khusus Linux yang difungsikan sebagai cadangan memori virtual',
            'Formatting' => 'proses menyiapkan dan membentuk struktur sistem berkas pada media simpan',
            'Defragmentation' => 'proses menyusun ulang fragmentasi file pada harddisk agar performa meningkat',
            'RAID 0' => 'metode kompresi striping data untuk kecepatan tanpa adanya redundansi data',
            'RAID 1' => 'metode mirroring data ke dua disk terpisah untuk perlindungan data penuh',
            'Inode' => 'struktur data sistem berkas UNIX yang menyimpan atribut file seperti izin dan ukuran',
            'Directory Tree' => 'struktur hierarki penataan folder berakar dari direktori utama (root)',
            'Mounting' => 'proses menyambungkan sistem berkas media external ke hierarki direktori utama',
            'Partition' => 'pembagian area fisik harddisk menjadi beberapa bagian logis independen',
            'Bad Sector' => 'kerusakan fisik atau logis pada area sektor piringan harddisk',
            'SSD (Solid State Drive)' => 'media penyimpanan berbasis memori kilat (flash) tanpa komponen bergerak',
            'ExFAT' => 'sistem berkas ringan pengganti FAT32 yang mendukung file berukuran besar',
        ];
        $items = array_merge($items, self::buildLookupQuestions(
            $fileSystem,
            'Mengenai sistem penyimpanan, %s merujuk pada...',
            'Istilah atau teknologi sistem berkas yang %s adalah...'
        ));

        // 4. Perintah Terminal / CLI Linux (20 pasang x 2 = 40 soal)
        $perintahCLI = [
            'ls' => 'menampilkan daftar file dan folder pada direktori aktif',
            'cd' => 'berpindah dari satu direktori ke direktori lain',
            'mkdir' => 'membuat direktori atau folder baru',
            'rm' => 'menghapus berkas atau direktori',
            'chmod' => 'mengubah hak akses izin (permission) pada file atau folder',
            'chown' => 'mengubah kepemilikan pengguna atau grup atas suatu berkas',
            'ps' => 'menampilkan daftar proses yang sedang aktif berjalan',
            'top' => 'menampilkan monitor proses dan konsumsi sumber daya CPU/RAM secara langsung',
            'cp' => 'menyalin file atau folder ke lokasi tujuan',
            'mv' => 'memindahkan atau mengganti nama (rename) file/folder',
            'pwd' => 'menampilkan rute jalur lengkap direktori kerja saat ini',
            'cat' => 'menampilkan seluruh isi konten dari suatu file teks ke layar',
            'grep' => 'mencari baris teks yang cocok dengan pola karakter tertentu',
            'sudo' => 'menjalankan perintah terminal dengan hak akses administrator/root',
            'df' => 'menampilkan informasi sisa ruang kapasitas pada sistem berkas disk',
            'du' => 'menampilkan estimasi ukuran penggunaan disk oleh berkas/folder',
            'kill' => 'menghentikan proses yang sedang berjalan berdasarkan Process ID (PID)',
            'ping' => 'menguji konektivitas jaringan ke host tujuan menggunakan paket ICMP',
            'ifconfig / ip' => 'menampilkan dan mengonfigurasi pengaturan antarmuka jaringan',
            'tar' => 'mengarsipkan atau mengekstrak kumpulan berkas ke dalam satu file archive',
        ];
        $items = array_merge($items, self::buildLookupQuestions(
            $perintahCLI,
            'Perintah CLI Linux "%s" digunakan untuk...',
            'Perintah CLI Linux yang berfungsi untuk %s adalah...'
        ));

        // 5. Keamanan & Antarmuka Sistem Operasi (12 pasang x 2 = 24 soal)
        $keamananSO = [
            'Authentication' => 'proses verifikasi identitas pengguna sebelum memberikan akses ke sistem',
            'Authorization' => 'proses menentukan hak akses dan izin yang dimiliki oleh pengguna',
            'Firewall' => 'sistem keamanan jaringan yang menyaring lalu lintas data masuk dan keluar',
            'Malware' => 'perangkat lunak berbahaya yang dirancang untuk merusak atau menyusupi sistem',
            'Phishing' => 'teknik penipuan untuk mencuri data sensitif dengan menyamar sebagai pihak tepercaya',
            'Encryption' => 'proses mengacak teks asli menjadi ciphertext agar tidak bisa dibaca tanpa kunci',
            'Decryption' => 'proses mengubah kembali data terenkripsi menjadi teks semula',
            'Antivirus' => 'program yang dirancang untuk mendeteksi, mencegah, dan menghapus malware',
            'Root Access' => 'tingkat hak akses tertinggi tanpa batasan pada sistem operasi berbasis UNIX',
            'User Account Control (UAC)' => 'fitur keamanan Windows yang meminta izin saat perubahan sistem terjadi',
            'BIOS' => 'firmware dasar pada motherboard untuk inisialisasi hardware saat startup',
            'UEFI' => 'standar pengganti BIOS modern dengan dukungan antarmuka grafis dan disk besar',
        ];
        $items = array_merge($items, self::buildLookupQuestions(
            $keamananSO,
            'Definisi dari %s dalam keamanan SO adalah...',
            'Konsep keamanan atau komponen SO yang %s adalah...'
        ));

        return array_values($items);
    }

    // MATEMATIKA (150 Soal Algoritmik Tepat)

    private static function matematikaQuestions(): array
    {
        $items = [];

        // 1. Operasi hitung bilangan bulat (40 soal)
        $count = 0;
        for ($i = 0; $count < 40 && $i < 100; $i++) {
            $op = ['+', '-', 'x', ':'][$i % 4];

            switch ($op) {
                case '+':
                    $a = mt_rand(10, 500);
                    $b = mt_rand(10, 500);
                    $correct = $a + $b;
                    $question = "Hasil dari {$a} + {$b} adalah...";
                    break;
                case '-':
                    $a = mt_rand(100, 900);
                    $b = mt_rand(1, $a - 1);
                    $correct = $a - $b;
                    $question = "Hasil dari {$a} - {$b} adalah...";
                    break;
                case 'x':
                    $a = mt_rand(2, 50);
                    $b = mt_rand(2, 50);
                    $correct = $a * $b;
                    $question = "Hasil dari {$a} x {$b} adalah...";
                    break;
                default:
                    $b = mt_rand(2, 25);
                    $q = mt_rand(2, 50);
                    $a = $b * $q;
                    $correct = $q;
                    $question = "Hasil dari {$a} : {$b} adalah...";
                    break;
            }

            if (! isset($items[$question])) {
                $items[$question] = self::buildMcq($question, (string) $correct, self::numericDistractors($correct));
                $count++;
            }
        }

        // 2. Penjumlahan pecahan sepenyebut (20 soal)
        $denoms = [2, 3, 4, 5, 6, 8, 10, 12, 15, 20];
        $count = 0;
        for ($i = 0; $count < 20 && $i < 60; $i++) {
            $d = $denoms[$i % count($denoms)];
            $n1 = mt_rand(1, $d - 1);
            $n2 = mt_rand(1, $d - 1);
            $sumN = $n1 + $n2;
            $g = self::gcd($sumN, $d);
            $correct = ($sumN / $g) . '/' . ($d / $g);
            $question = "Hasil dari {$n1}/{$d} + {$n2}/{$d} adalah...";

            $wrongs = [];
            while (count($wrongs) < 3) {
                $wn = max(1, $sumN + mt_rand(-2, 2));
                $cand = $wn . '/' . $d;
                if ($cand !== $correct && ! in_array($cand, $wrongs, true)) {
                    $wrongs[] = $cand;
                }
            }

            if (! isset($items[$question])) {
                $items[$question] = self::buildMcq($question, $correct, $wrongs);
                $count++;
            }
        }

        // 3. Pecahan ke bentuk desimal (10 soal)
        $fracToDecimal = [
            '1/2' => '0,5',
            '1/4' => '0,25',
            '3/4' => '0,75',
            '1/5' => '0,2',
            '2/5' => '0,4',
            '3/5' => '0,6',
            '4/5' => '0,8',
            '1/8' => '0,125',
            '1/10' => '0,1',
            '3/10' => '0,3',
        ];
        foreach ($fracToDecimal as $frac => $dec) {
            $decVal = (float) str_replace(',', '.', $dec);
            $wrongs = [];
            $guard = 0;
            while (count($wrongs) < 3 && $guard < 50) {
                $guard++;
                $w = round($decVal + (mt_rand(-30, 30) / 100), 3);
                if ($w <= 0) {
                    continue;
                }
                $wStr = rtrim(rtrim(number_format($w, 3, '.', ''), '0'), '.');
                $wStr = str_replace('.', ',', $wStr);
                if ($wStr !== $dec && ! in_array($wStr, $wrongs, true)) {
                    $wrongs[] = $wStr;
                }
            }
            $q = "Bentuk desimal dari pecahan {$frac} adalah...";
            $items[$q] = self::buildMcq($q, $dec, $wrongs);
        }

        // 4. Desimal ke bentuk persen (10 soal)
        $decToPercent = [
            '0,1' => '10%',
            '0,15' => '15%',
            '0,2' => '20%',
            '0,25' => '25%',
            '0,3' => '30%',
            '0,4' => '40%',
            '0,5' => '50%',
            '0,6' => '60%',
            '0,75' => '75%',
            '0,9' => '90%',
        ];
        foreach ($decToPercent as $dec => $persen) {
            $val = (int) rtrim($persen, '%');
            $wrongs = [];
            $guard = 0;
            while (count($wrongs) < 3 && $guard < 50) {
                $guard++;
                $w = $val + mt_rand(-3, 3) * 5;
                if ($w <= 0 || $w === $val) {
                    continue;
                }
                $wStr = $w . '%';
                if (! in_array($wStr, $wrongs, true)) {
                    $wrongs[] = $wStr;
                }
            }
            $q = "Bentuk persen dari {$dec} adalah...";
            $items[$q] = self::buildMcq($q, $persen, $wrongs);
        }

        // 5. Persentase dari suatu bilangan (20 soal)
        $percents = [5, 10, 15, 20, 25, 30, 40, 50, 60, 70, 75, 80, 90];
        $count = 0;
        for ($i = 0; $count < 20 && $i < 60; $i++) {
            $p = $percents[$i % count($percents)];
            $base = 20 * mt_rand(1, 25);
            $correct = ($p * $base) / 100;
            $question = "Hasil dari {$p}% dari {$base} adalah...";
            if (! isset($items[$question])) {
                $items[$question] = self::buildMcq($question, (string) $correct, self::numericDistractors($correct));
                $count++;
            }
        }

        // 6. Aljabar sederhana - mencari nilai x (25 soal)
        $count = 0;
        for ($i = 0; $count < 25 && $i < 60; $i++) {
            $a = mt_rand(2, 9);
            $x = mt_rand(1, 20);
            $b = mt_rand(1, 50);
            $sign = $i % 2 === 0 ? '+' : '-';
            $c = $sign === '+' ? ($a * $x + $b) : ($a * $x - $b);
            $question = "Jika {$a}x {$sign} {$b} = {$c}, maka nilai x yang memenuhi adalah...";
            if (! isset($items[$question])) {
                $items[$question] = self::buildMcq($question, (string) $x, self::numericDistractors($x, 1, 25));
                $count++;
            }
        }

        // 7. Geometri: luas & keliling (25 soal)
        $count = 0;
        for ($i = 0; $count < 25 && $i < 60; $i++) {
            switch ($i % 4) {
                case 0:
                    $s = mt_rand(3, 30);
                    if ($i % 8 < 4) {
                        $correct = $s * $s;
                        $question = "Luas persegi dengan panjang sisi {$s} cm adalah...cm2";
                    } else {
                        $correct = 4 * $s;
                        $question = "Keliling persegi dengan panjang sisi {$s} cm adalah...cm";
                    }
                    break;
                case 1:
                    $p = mt_rand(6, 40);
                    $l = mt_rand(3, $p - 1);
                    if ($i % 8 < 4) {
                        $correct = $p * $l;
                        $question = "Luas persegi panjang dengan panjang {$p} cm dan lebar {$l} cm adalah...cm2";
                    } else {
                        $correct = 2 * ($p + $l);
                        $question = "Keliling persegi panjang dengan panjang {$p} cm dan lebar {$l} cm adalah...cm";
                    }
                    break;
                case 2:
                    $alas = 2 * mt_rand(3, 20);
                    $tinggi = mt_rand(3, 20);
                    $correct = ($alas * $tinggi) / 2;
                    $question = "Luas segitiga dengan alas {$alas} cm dan tinggi {$tinggi} cm adalah...cm2";
                    break;
                default:
                    $r = 7 * mt_rand(1, 10);
                    if ($i % 8 < 4) {
                        $correct = (22 / 7) * $r * $r;
                        $question = "Luas lingkaran dengan jari-jari {$r} cm (menggunakan pi=22/7) adalah...cm2";
                    } else {
                        $correct = 2 * (22 / 7) * $r;
                        $question = "Keliling lingkaran dengan jari-jari {$r} cm (menggunakan pi=22/7) adalah...cm";
                    }
                    break;
            }
            $correct = (int) round($correct);
            if (! isset($items[$question])) {
                $items[$question] = self::buildMcq($question, (string) $correct, self::numericDistractors($correct));
                $count++;
            }
        }

        return array_values($items);
    }
}
