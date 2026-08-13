<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data Mata Pelajaran dan Soalnya
        $subjectsData = [
            'Pemrograman Dasar' => [
                'description' => 'Mata pelajaran dasar-dasar algoritma dan pemrograman.',
                'questions' => [
                    [
                        'payload' => 'Urutan langkah-langkah logis untuk menyelesaikan masalah yang disusun secara sistematis disebut...',
                        'correct' => 'Algoritma',
                        'wrong' => ['Program', 'Flowchart', 'Pseudocode']
                    ],
                    [
                        'payload' => 'Tipe data yang digunakan untuk menyimpan bilangan bulat adalah...',
                        'correct' => 'Integer',
                        'wrong' => ['Float', 'String', 'Boolean']
                    ],
                    [
                        'payload' => 'Simbol belah ketupat pada flowchart berfungsi untuk menunjukkan...',
                        'correct' => 'Percabangan atau kondisi (Decision)',
                        'wrong' => ['Proses', 'Input / Output', 'Titik awal / akhir']
                    ],
                    [
                        'payload' => 'Dalam bahasa pemrograman, sisa hasil bagi ditandai dengan operator...',
                        'correct' => 'Modulo (%)',
                        'wrong' => ['Bagi (/)', 'Kali (*)', 'Kurang (-)']
                    ],
                    [
                        'payload' => 'Tipe data yang hanya bernilai TRUE atau FALSE adalah...',
                        'correct' => 'Boolean',
                        'wrong' => ['Character', 'String', 'Double']
                    ],
                    [
                        'payload' => 'Tempat untuk menyimpan data yang nilainya dapat berubah-ubah selama program berjalan disebut...',
                        'correct' => 'Variabel',
                        'wrong' => ['Konstanta', 'Tipe Data', 'Operator']
                    ],
                    [
                        'payload' => 'Penulisan komentar dalam bahasa C++ untuk satu baris menggunakan tanda...',
                        'correct' => '//',
                        'wrong' => ['/* ... */', '#', '<!-- ... -->']
                    ],
                    [
                        'payload' => 'Operator logika yang menghasilkan nilai TRUE hanya jika kedua kondisi bernilai TRUE adalah...',
                        'correct' => 'AND (&&)',
                        'wrong' => ['OR (||)', 'NOT (!)', 'XOR']
                    ],
                    [
                        'payload' => 'Struktur perulangan yang mengecek kondisi di akhir perulangan (dieksekusi minimal 1 kali) adalah...',
                        'correct' => 'Do-While',
                        'wrong' => ['While', 'For', 'If-Else']
                    ],
                    [
                        'payload' => 'Perangkat lunak yang berfungsi menerjemahkan seluruh kode program ke dalam bahasa mesin sekaligus adalah...',
                        'correct' => 'Compiler',
                        'wrong' => ['Interpreter', 'Assembler', 'Debugger']
                    ],
                    [
                        'payload' => 'Pada struktur data array, indeks elemen pertama selalu dimulai dari angka...',
                        'correct' => '0',
                        'wrong' => ['1', '-1', '2']
                    ],
                    [
                        'payload' => 'Error yang terjadi ketika program dijalankan dan berhenti secara tiba-tiba karena operasi ilegal (misal: bagi dengan nol) disebut...',
                        'correct' => 'Runtime Error',
                        'wrong' => ['Syntax Error', 'Logical Error', 'Compile Error']
                    ],
                    [
                        'payload' => 'Fungsi yang tidak mengembalikan nilai apapun (biasanya menggunakan keyword void) disebut...',
                        'correct' => 'Prosedur',
                        'wrong' => ['Function', 'Method', 'Parameter']
                    ],
                    [
                        'payload' => 'Variabel yang dikenali dan dapat diakses oleh seluruh blok kode dalam program disebut...',
                        'correct' => 'Variabel Global',
                        'wrong' => ['Variabel Lokal', 'Variabel Statis', 'Variabel Dinamis']
                    ],
                    [
                        'payload' => 'Tipe data yang digunakan untuk menyimpan bilangan pecahan/desimal adalah...',
                        'correct' => 'Float / Double',
                        'wrong' => ['Integer', 'Char', 'Boolean']
                    ],
                    [
                        'payload' => 'Struktur percabangan yang digunakan untuk mengevaluasi banyak kemungkinan nilai dari satu variabel adalah...',
                        'correct' => 'Switch-Case',
                        'wrong' => ['If-Else', 'While', 'For']
                    ],
                    [
                        'payload' => 'Operator increment yang digunakan untuk menambah nilai variabel sebanyak 1 adalah...',
                        'correct' => '++',
                        'wrong' => ['--', '+=', '+']
                    ],
                    [
                        'payload' => 'Konsep perulangan di dalam perulangan disebut...',
                        'correct' => 'Nested Loop',
                        'wrong' => ['Infinite Loop', 'Do-While Loop', 'For Loop']
                    ],
                    [
                        'payload' => 'Struktur data yang menerapkan konsep LIFO (Last In First Out) adalah...',
                        'correct' => 'Stack',
                        'wrong' => ['Queue', 'Array', 'Linked List']
                    ],
                    [
                        'payload' => 'Nilai yang dilewatkan ke dalam suatu fungsi saat pemanggilan fungsi disebut...',
                        'correct' => 'Argumen / Parameter',
                        'wrong' => ['Return value', 'Variabel', 'Konstanta']
                    ],
                    [
                        'payload' => 'Apabila kita ingin mendeklarasikan nilai phi (3.14) yang tidak boleh diubah-ubah nilainya, kita menggunakan...',
                        'correct' => 'Konstanta',
                        'wrong' => ['Variabel', 'Tipe Data', 'Array']
                    ],
                    [
                        'payload' => 'Untuk membandingkan apakah nilai A sama dengan nilai B, operator yang digunakan adalah...',
                        'correct' => '==',
                        'wrong' => ['=', '===', '!=']
                    ],
                    [
                        'payload' => 'Proses memanggil fungsi dirinya sendiri secara berulang-ulang disebut...',
                        'correct' => 'Rekursif',
                        'wrong' => 'Iteratif',
                        'wrong' => ['Iteratif', 'Looping', 'Fungsi In-line']
                    ],
                    [
                        'payload' => 'Manakah di bawah ini yang BUKAN merupakan tipe data primitif?',
                        'correct' => 'Array',
                        'wrong' => ['Integer', 'Float', 'Char']
                    ],
                    [
                        'payload' => 'Error akibat kesalahan penulisan aturan tata bahasa dari bahasa pemrograman disebut...',
                        'correct' => 'Syntax Error',
                        'wrong' => ['Logical Error', 'Runtime Error', 'Fatal Error']
                    ],
                    [
                        'payload' => 'Kumpulan karakter seperti kata atau kalimat disimpan dalam tipe data...',
                        'correct' => 'String',
                        'wrong' => ['Char', 'Array', 'Boolean']
                    ],
                    [
                        'payload' => 'Perintah untuk keluar secara paksa dari sebuah perulangan atau blok switch adalah...',
                        'correct' => 'Break',
                        'wrong' => ['Continue', 'Exit', 'Return']
                    ],
                    [
                        'payload' => 'Operator logika OR dilambangkan dengan karakter...',
                        'correct' => '||',
                        'wrong' => ['&&', '!', '==']
                    ],
                    [
                        'payload' => 'Struktur data yang menerapkan prinsip FIFO (First In First Out) adalah...',
                        'correct' => 'Queue',
                        'wrong' => ['Stack', 'Tree', 'Graph']
                    ],
                    [
                        'payload' => 'Simbol jajar genjang pada flowchart mewakili...',
                        'correct' => 'Input / Output Data',
                        'wrong' => ['Proses perhitungan', 'Percabangan', 'Mulai / Selesai']
                    ],
                    [
                        'payload' => 'Kode program yang mirip dengan kode asli namun ditulis dengan bahasa manusia (tidak terikat aturan baku) disebut...',
                        'correct' => 'Pseudocode',
                        'wrong' => ['Flowchart', 'Source Code', 'Bahasa Mesin']
                    ],
                    [
                        'payload' => 'Apakah hasil dari operasi logika: TRUE AND FALSE?',
                        'correct' => 'FALSE',
                        'wrong' => ['TRUE', 'NULL', 'Error']
                    ],
                    [
                        'payload' => 'Apakah hasil dari operasi aritmatika 10 % 3 ?',
                        'correct' => '1',
                        'wrong' => ['3', '0', '10']
                    ],
                    [
                        'payload' => 'Variabel bertipe boolean biasanya diawali dengan penamaan kata kerja, contoh yang benar adalah...',
                        'correct' => 'is_active',
                        'wrong' => ['nama_user', 'total_harga', 'alamat']
                    ],
                    [
                        'payload' => 'Lingkungan perangkat lunak yang menyediakan fasilitas komprehensif bagi programmer untuk pengembangan perangkat lunak (contoh: VS Code, Netbeans) disebut...',
                        'correct' => 'IDE (Integrated Development Environment)',
                        'wrong' => ['GUI (Graphical User Interface)', 'API (Application Programming Interface)', 'CLI (Command Line Interface)']
                    ],
                    [
                        'payload' => 'Perintah untuk melewati satu iterasi (langsung lanjut ke iterasi berikutnya) di dalam perulangan adalah...',
                        'correct' => 'Continue',
                        'wrong' => ['Break', 'Next', 'Skip']
                    ],
                    [
                        'payload' => 'Manakah penamaan variabel yang valid (benar) dalam aturan umum pemrograman?',
                        'correct' => 'nilai_total',
                        'wrong' => ['1nilai', 'nilai total', 'nilai-total']
                    ],
                    [
                        'payload' => 'Array yang memiliki lebih dari satu indeks (contohnya tabel baris dan kolom) disebut...',
                        'correct' => 'Array 2 Dimensi (Multidimensi)',
                        'wrong' => ['Array 1 Dimensi', 'Array Linear', 'Vector']
                    ],
                    [
                        'payload' => 'Tipe data Char biasanya diapit oleh tanda...',
                        'correct' => 'Petik tunggal (\')',
                        'wrong' => ['Petik ganda (")', 'Kurung ()', 'Kurung siku []']
                    ],
                    [
                        'payload' => 'Proses untuk menemukan dan memperbaiki bug atau error di dalam kode program disebut...',
                        'correct' => 'Debugging',
                        'wrong' => ['Compiling', 'Executing', 'Testing']
                    ],
                    [
                        'payload' => 'Pendekatan pemrograman di mana masalah dipecah menjadi fungsi-fungsi kecil (modul) disebut pemrograman...',
                        'correct' => 'Prosedural',
                        'wrong' => ['Berorientasi Objek', 'Deklaratif', 'Fungsional']
                    ],
                    [
                        'payload' => 'Dalam konsep Object Oriented Programming (OOP), cetak biru (blueprint) untuk menciptakan sebuah objek disebut...',
                        'correct' => 'Class',
                        'wrong' => ['Method', 'Property', 'Attribute']
                    ],
                    [
                        'payload' => 'Karakter atau simbol khusus di dalam string seperti \\n (new line) disebut...',
                        'correct' => 'Escape Character',
                        'wrong' => ['Special Character', 'Format Specifier', 'Regular Expression']
                    ],
                    [
                        'payload' => 'Penggabungan dua buah teks (string) menjadi satu disebut dengan proses...',
                        'correct' => 'Concatenation (Konkatenasi)',
                        'wrong' => ['Kalkulasi', 'Interpolasi', 'Parsing']
                    ],
                    [
                        'payload' => 'Manakah dari operator berikut yang menunjukkan "Tidak Sama Dengan"?',
                        'correct' => '!=',
                        'wrong' => ['==', '===', '<>']
                    ],
                    [
                        'payload' => 'Mengubah tipe data dari satu tipe ke tipe lainnya secara paksa dalam program (misal String ke Integer) disebut...',
                        'correct' => 'Type Casting / Parsing',
                        'wrong' => ['Concatenation', 'Declaration', 'Initialization']
                    ],
                    [
                        'payload' => 'Perintah untuk memasukkan pustaka atau library dari luar dalam bahasa C/C++ menggunakan syntax...',
                        'correct' => '#include',
                        'wrong' => ['import', 'require', 'using']
                    ],
                    [
                        'payload' => 'Operator penugasan majemuk (Compound Assignment) yang menjumlahkan dan memasukkan hasilnya ke variabel awal adalah...',
                        'correct' => '+=',
                        'wrong' => ['+', '++', '==']
                    ],
                    [
                        'payload' => 'Simbol terminal / terminator (oval) pada flowchart menandakan...',
                        'correct' => 'Awal dan Akhir dari program',
                        'wrong' => ['Titik proses', 'Titik input', 'Titik percabangan']
                    ],
                    [
                        'payload' => 'Jika kondisi if(5 > 10) dijalankan, blok kode di dalamnya...',
                        'correct' => 'Tidak akan dieksekusi',
                        'wrong' => ['Akan dieksekusi satu kali', 'Akan terjadi error', 'Akan dieksekusi terus menerus']
                    ],
                    [
                        'payload' => 'Fungsi utama dari method main() pada program C++ atau Java adalah untuk...',
                        'correct' => 'Titik awal (entry point) pengeksekusian program',
                        'wrong' => ['Mendeklarasikan variabel global', 'Menutup program otomatis', 'Menangani error (exception)']
                    ],
                    [
                        'payload' => 'Aturan penamaan variabel (identifier) pada sebagian besar bahasa pemrograman TIDAK BOLEH diawali dengan...',
                        'correct' => 'Angka',
                        'wrong' => ['Huruf kapital', 'Huruf kecil', 'Garis bawah (Underscore)']
                    ],
                    [
                        'payload' => 'Proses memberikan nilai awal pada sebuah variabel saat pertama kali dideklarasikan disebut...',
                        'correct' => 'Inisialisasi',
                        'wrong' => ['Deklarasi', 'Instansiasi', 'Implementasi']
                    ],
                    [
                        'payload' => 'Jika terdapat kode `int x = 5;` lalu dijalankan perintah `x--;`, berapakah nilai `x` sekarang?',
                        'correct' => '4',
                        'wrong' => ['5', '6', '0']
                    ],
                    [
                        'payload' => 'Library standar pada C++ yang sering digunakan untuk keperluan input/output standar (cin/cout) adalah...',
                        'correct' => 'iostream',
                        'wrong' => ['math.h', 'string.h', 'conio.h']
                    ],
                    [
                        'payload' => 'Karakter `\n` dalam penulisan string (teks) berfungsi untuk...',
                        'correct' => 'Membuat baris baru (newline)',
                        'wrong' => ['Membuat tab (jarak) ke kanan', 'Menghapus karakter sebelumnya', 'Membunyikan alarm/beep sistem']
                    ],
                    [
                        'payload' => 'Bahasa pemrograman tingkat tinggi yang dieksekusi secara baris per baris tanpa dikompilasi menyeluruh disebut bahasa berbasis...',
                        'correct' => 'Interpreter',
                        'wrong' => ['Compiler', 'Assembler', 'Machine Code']
                    ],
                    [
                        'payload' => 'Kondisi di mana sebuah perulangan tidak pernah memenuhi syarat untuk berhenti sehingga berjalan terus-menerus disebut...',
                        'correct' => 'Infinite Loop',
                        'wrong' => ['Nested Loop', 'Runtime Error', 'Syntax Loop']
                    ],
                    [
                        'payload' => 'Kata kunci (keyword) yang berfungsi untuk mengembalikan suatu nilai dari dalam fungsi kepada pemanggilnya adalah...',
                        'correct' => 'return',
                        'wrong' => ['break', 'continue', 'yield']
                    ],
                    [
                        'payload' => 'Variabel yang dideklarasikan di dalam suatu blok fungsi atau perulangan, dan hanya bisa diakses di dalam blok tersebut dinamakan...',
                        'correct' => 'Variabel Lokal',
                        'wrong' => ['Variabel Global', 'Variabel Statis', 'Variabel Dinamis']
                    ],
                    [
                        'payload' => 'Algoritma pencarian yang membagi data terurut menjadi dua bagian berulang kali untuk menemukan elemen yang dicari adalah...',
                        'correct' => 'Binary Search',
                        'wrong' => ['Sequential Search', 'Linear Search', 'Bubble Search']
                    ],
                    [
                        'payload' => 'Algoritma pengurutan data sederhana yang berulang kali membandingkan elemen berdekatan dan menukarnya jika urutannya salah disebut...',
                        'correct' => 'Bubble Sort',
                        'wrong' => ['Quick Sort', 'Merge Sort', 'Selection Sort']
                    ],
                    [
                        'payload' => 'Pada diagram alir (flowchart), garis dengan tanda panah berfungsi sebagai...',
                        'correct' => 'Arus aliran instruksi (Flowline)',
                        'wrong' => ['Input data manual', 'Penyimpanan data', 'Proses perhitungan matematis']
                    ],
                    [
                        'payload' => 'Jika terjadi *Logical Error* pada sebuah program, maka akibatnya adalah...',
                        'correct' => 'Program berjalan tanpa crash, namun menghasilkan output yang salah',
                        'wrong' => ['Program tidak bisa di-compile', 'Program otomatis berhenti/crash saat dijalankan', 'Komputer akan restart']
                    ],
                    [
                        'payload' => 'Penulisan nilai (value) untuk tipe data String biasanya wajib diapit oleh tanda...',
                        'correct' => 'Petik ganda (" ")',
                        'wrong' => ['Petik tunggal (\' \')', 'Kurung siku ([ ])', 'Kurung kurawal ({ })']
                    ],
                    [
                        'payload' => 'Bilangan biner `1010` jika dikonversi menjadi bilangan desimal bernilai...',
                        'correct' => '10',
                        'wrong' => ['8', '12', '14']
                    ],
                    [
                        'payload' => 'Dari pilihan berikut, bahasa pemrograman yang tingkatannya paling mendekati bahasa mesin komputer (Low-level language) adalah...',
                        'correct' => 'Assembly',
                        'wrong' => ['Python', 'Java', 'PHP']
                    ],
                    [
                        'payload' => 'Operator pembanding `<= ` memiliki arti...',
                        'correct' => 'Kurang dari atau sama dengan',
                        'wrong' => ['Lebih dari atau sama dengan', 'Sama dengan', 'Tidak sama dengan']
                    ],
                    [
                        'payload' => 'Apa yang terjadi jika kondisi awal pada struktur `while(kondisi)` sudah bernilai FALSE sejak awal dijalankan?',
                        'correct' => 'Blok perulangan tidak akan dieksekusi sama sekali',
                        'wrong' => ['Blok perulangan dieksekusi 1 kali', 'Program mengalami error', 'Blok perulangan dieksekusi tanpa henti']
                    ],
                    [
                        'payload' => 'Operasi logika NOT yang berfungsi untuk membalikkan nilai logika boolean disimbolkan dengan karakter...',
                        'correct' => 'Tanda seru (!)',
                        'wrong' => ['Tanda tanya (?)', 'Tanda tambah (+)', 'Tanda minus (-)']
                    ],
                    [
                        'payload' => 'Blok kode yang membungkus instruksi tertentu untuk bisa dipanggil secara berulang tanpa menulis kodenya lagi disebut...',
                        'correct' => 'Fungsi / Function',
                        'wrong' => ['Variabel', 'Parameter', 'Tipe Data']
                    ],
                    [
                        'payload' => 'Operator *Ternary* yang merupakan bentuk singkat dari percabangan if-else menggunakan tanda...',
                        'correct' => '? :',
                        'wrong' => ['=>', '&&', '::']
                    ],
                    [
                        'payload' => 'Untuk menemukan nilai tertinggi dari sekumpulan data array, kita menggunakan algoritma pencarian...',
                        'correct' => 'Max / Maximum Search',
                        'wrong' => ['Binary Search', 'Interpolation Search', 'Min Search']
                    ],
                    [
                        'payload' => 'Apa yang dimaksud dengan *Hardcoding* dalam pemrograman?',
                        'correct' => 'Menuliskan nilai (data) secara langsung ke dalam source code sehingga sulit diubah',
                        'wrong' => ['Menggunakan kode rahasia', 'Menulis kode program dengan cepat', 'Memecahkan algoritma yang rumit']
                    ],
                    [
                        'payload' => 'Kapan kita harus menggunakan struktur percabangan `if ... else if ... else`?',
                        'correct' => 'Ketika terdapat lebih dari dua kemungkinan pilihan kondisi',
                        'wrong' => ['Ketika hanya ada satu kemungkinan', 'Ketika ingin mengulang instruksi berkali-kali', 'Ketika mendeklarasikan array']
                    ],
                    [
                        'payload' => 'Karakteristik utama dari struktur data Array standar adalah...',
                        'correct' => 'Menyimpan elemen dengan tipe data yang sama dalam ruang memori yang berurutan',
                        'wrong' => ['Bisa menyimpan berbagai macam tipe data secara acak', 'Ukurannya bisa bertambah otomatis secara dinamis tanpa batas', 'Hanya bisa menyimpan teks']
                    ],
                    [
                        'payload' => 'Pendekatan pemecahan masalah algoritma di mana kita memilih solusi lokal terbaik pada tiap langkah (optimal lokal) dinamakan...',
                        'correct' => 'Greedy Algorithm',
                        'wrong' => ['Dynamic Programming', 'Divide and Conquer', 'Brute Force']
                    ],
                    [
                        'payload' => 'Kata-kata khusus dalam bahasa pemrograman yang tidak boleh digunakan sebagai nama variabel karena sudah memiliki fungsi tersendiri dinamakan...',
                        'correct' => 'Reserved Words / Keywords',
                        'wrong' => ['Special Variables', 'Magic Words', 'Constants']
                    ],
                    [
                        'payload' => 'Berdasarkan tabel kebenaran logika OR, jika `A = True` dan `B = False`, maka hasil `A OR B` adalah...',
                        'correct' => 'True',
                        'wrong' => ['False', 'Null', 'Error']
                    ],
                    [
                        'payload' => 'Berdasarkan tabel kebenaran logika AND, jika `A = True` dan `B = False`, maka hasil `A AND B` adalah...',
                        'correct' => 'False',
                        'wrong' => ['True', 'Null', 'Error']
                    ],
                    [
                        'payload' => 'Untuk menyimpan bilangan umur manusia yang pastinya tidak mungkin bernilai negatif, tipe data Integer yang paling efisien memori adalah...',
                        'correct' => 'Unsigned Integer',
                        'wrong' => ['Signed Integer', 'Float', 'Double']
                    ],
                    [
                        'payload' => 'Pada bahasa pemrograman PHP, penamaan variabel diwajibkan untuk diawali dengan simbol...',
                        'correct' => 'Dollar ($)',
                        'wrong' => ['At (@)', 'Hastag (#)', 'Ampersand (&)']
                    ],
                    [
                        'payload' => 'Tokoh pencipta bahasa pemrograman C yang juga berperan penting dalam pengembangan sistem operasi UNIX adalah...',
                        'correct' => 'Dennis Ritchie',
                        'wrong' => ['Bill Gates', 'Steve Jobs', 'Mark Zuckerberg']
                    ],
                    [
                        'payload' => 'Dalam notasi analisis algoritma (Big-O notation), kompleksitas waktu saat kita mengakses elemen array langsung berdasarkan indeksnya adalah...',
                        'correct' => 'O(1)',
                        'wrong' => ['O(N)', 'O(log N)', 'O(N^2)']
                    ],
                    [
                        'payload' => 'Dalam konsep Pemrograman Berorientasi Objek (OOP), membungkus variabel dan method ke dalam satu kesatuan Class sekaligus menyembunyikannya dari luar disebut...',
                        'correct' => 'Encapsulation (Enkapsulasi)',
                        'wrong' => ['Inheritance', 'Polymorphism', 'Abstraction']
                    ],
                    [
                        'payload' => 'Komentar yang memiliki lebih dari satu baris (multiline comment) dalam bahasa C / Java / PHP biasanya diawali dan diakhiri dengan...',
                        'correct' => '/* dan */',
                        'wrong' => ['// dan //', '<!-- dan -->', '## dan ##']
                    ],
                    [
                        'payload' => 'Berapakah output dari ekspresi matematika `5 + 3 * 2` yang diproses komputer?',
                        'correct' => '11',
                        'wrong' => ['16', '10', '13']
                    ],
                    [
                        'payload' => 'Mengapa nomor indeks array (misalnya 0, 1, 2) sangat dibutuhkan?',
                        'correct' => 'Untuk mengakses lokasi memori spesifik elemen tersebut di dalam array secara acak (random access)',
                        'wrong' => ['Untuk menjumlahkan elemen array', 'Hanya sebagai hiasan sintaksis', 'Untuk menghitung ukuran file']
                    ],
                    [
                        'payload' => 'Perbedaan paling mendasar antara *Fungsi (Function)* dan *Prosedur (Procedure)* adalah...',
                        'correct' => 'Fungsi mengembalikan sebuah nilai, sedangkan prosedur tidak mengembalikan nilai',
                        'wrong' => ['Prosedur mengembalikan nilai, fungsi tidak', 'Fungsi hanya bisa menerima angka, prosedur teks', 'Keduanya persis sama tanpa perbedaan']
                    ],
                    [
                        'payload' => 'Pada statement perulangan `for(inisialisasi; kondisi; x)`, bagian `x` biasanya diisi dengan operasi untuk menambah/mengurangi iterasi yang disebut...',
                        'correct' => 'Increment / Decrement',
                        'wrong' => ['Condition Statement', 'Declaration Variable', 'Return Statement']
                    ],
                    [
                        'payload' => 'Struktur program dasar di mana instruksi dieksekusi secara lurus baris demi baris dari atas ke bawah tanpa adanya percabangan atau perulangan disebut struktur...',
                        'correct' => 'Sekuensial / Berurutan',
                        'wrong' => ['Seleksi', 'Iterasi', 'Dinamis']
                    ],
                    [
                        'payload' => 'Tipe data primitif berupa karakter (char) biasanya mengkonsumsi memori sebanyak...',
                        'correct' => '1 Byte',
                        'wrong' => ['4 Byte', '8 Byte', '1 Bit']
                    ],
                    [
                        'payload' => 'Konsep dalam OOP di mana satu buah method atau antarmuka bisa diimplementasikan ke dalam banyak bentuk/tingkah laku yang berbeda-beda disebut...',
                        'correct' => 'Polymorphism',
                        'wrong' => ['Encapsulation', 'Inheritance', 'Class Diagram']
                    ],
                    [
                        'payload' => 'Teknik pengujian perangkat lunak dengan memasukkan nilai paling maksimal atau minimal pada batas rentang input tertentu disebut...',
                        'correct' => 'Boundary Value Testing',
                        'wrong' => ['Stress Testing', 'Usability Testing', 'Unit Testing']
                    ],
                    [
                        'payload' => 'Kata kunci (keyword) yang biasanya digunakan untuk membuat/memori alokasi objek baru (instansiasi) dari sebuah Class adalah...',
                        'correct' => 'new',
                        'wrong' => ['create', 'make', 'build']
                    ],
                    [
                        'payload' => 'Dalam operasi manipulasi bit, operator *Bitwise AND* dilambangkan menggunakan karakter...',
                        'correct' => '& (Satu buah Ampersand)',
                        'wrong' => ['&& (Dua buah Ampersand)', '| (Satu buah Pipa)', '^ (Caret)']
                    ],
                    [
                        'payload' => 'Untuk mendeklarasikan sekumpulan nilai konstanta tetap yang saling berhubungan, seperti nama-nama hari (Senin, Selasa, dsb), tipe data bentukan yang ideal digunakan adalah...',
                        'correct' => 'Enum (Enumeration)',
                        'wrong' => ['Array List', 'String', 'Struct']
                    ],
                    [
                        'payload' => 'Pada penggambaran flowchart standar, simbol lingkaran (On-page Connector) digunakan untuk...',
                        'correct' => 'Menghubungkan bagian flowchart yang terpisah namun masih dalam satu halaman yang sama',
                        'wrong' => ['Menghubungkan flowchart di halaman yang berbeda', 'Menandai error', 'Memulai program']
                    ],
                    [
                        'payload' => 'Nilai bawaan (default value) dari sebuah variabel bertipe boolean jika tidak diinisialisasi secara eksplisit pada bahasa seperti Java adalah...',
                        'correct' => 'False',
                        'wrong' => ['True', 'Null', '0']
                    ],
                    [
                        'payload' => 'Simbol panah ke arah kiri (<-) pada notasi penulisan algoritma pseudocode umumnya merujuk pada operasi...',
                        'correct' => 'Assignment (Pemberian nilai pada variabel)',
                        'wrong' => ['Return', 'Pembanding (Lebih kecil)', 'Looping']
                    ],
                    [
                        'payload' => 'Apa keuntungan utama dalam menggunakan fungsi (function) atau metode dalam sebuah kode program?',
                        'correct' => 'Membuat kode dapat digunakan kembali (reusability) tanpa harus ditulis ulang',
                        'wrong' => ['Mempercepat kinerja prosesor komputer', 'Menambah ukuran file kode agar terlihat rumit', 'Mengubah struktur bahasa pemrograman']
                    ],
                    [
                        'payload' => 'Method khusus yang secara otomatis dijalankan pertama kali saat sebuah objek (instance) dibuat dinamakan...',
                        'correct' => 'Constructor',
                        'wrong' => ['Destructor', 'Getter', 'Setter']
                    ],
                    [
                        'payload' => 'Method khusus yang otomatis dipanggil saat sebuah objek dihancurkan atau memori dihapus dinamakan...',
                        'correct' => 'Destructor',
                        'wrong' => ['Constructor', 'Void', 'Return']
                    ],
                    [
                        'payload' => 'Sebuah tipe data gabungan dalam bahasa C/C++ yang bisa menampung berbagai macam tipe data yang berbeda di dalam satu entitas disebut...',
                        'correct' => 'Struct (Structure)',
                        'wrong' => ['Array', 'Float', 'Pointer']
                    ],
                    [
                        'payload' => 'Konsep pewarisan sifat dari *Class* induk kepada *Class* anak (turunan) pada Pemrograman Berorientasi Objek dinamakan...',
                        'correct' => 'Inheritance',
                        'wrong' => ['Polymorphism', 'Encapsulation', 'Abstraction']
                    ],
                    [
                        'payload' => 'Membuat beberapa fungsi dengan *nama yang sama persis*, tetapi *jumlah atau tipe parameternya berbeda* di dalam sebuah Class disebut...',
                        'correct' => 'Method Overloading',
                        'wrong' => ['Method Overriding', 'Method Shadowing', 'Method Wrapping']
                    ],
                    [
                        'payload' => 'Sedangkan, saat class anak (Subclass) memodifikasi atau menulis ulang isi method warisan dari class induknya (Superclass), proses ini disebut...',
                        'correct' => 'Method Overriding',
                        'wrong' => ['Method Overloading', 'Encapsulation', 'Instantiation']
                    ],
                    [
                        'payload' => 'UML adalah bahasa standar pemodelan yang umum digunakan untuk mendesain perangkat lunak. Kepanjangan dari UML adalah...',
                        'correct' => 'Unified Modeling Language',
                        'wrong' => ['Universal Modern Language', 'Unified Machine Learning', 'Unit Modeling Language']
                    ],
                    [
                        'payload' => 'Keyword "private" pada variabel di dalam Class (OOP) berarti bahwa variabel tersebut...',
                        'correct' => 'Hanya bisa diakses dan diubah oleh method di dalam Class itu sendiri',
                        'wrong' => ['Bisa diakses dari Class mana saja', 'Hanya bisa diakses oleh Class turunannya', 'Dapat diakses secara global oleh seluruh program']
                    ],
                    [
                        'payload' => 'Sebaliknya, keyword hak akses (Access Modifier) yang membebaskan properti atau method diakses dari seluruh bagian program dinamakan...',
                        'correct' => 'Public',
                        'wrong' => ['Protected', 'Private', 'Static']
                    ],
                    [
                        'payload' => 'Struktur data hirarkis yang diibaratkan seperti silsilah keluarga, memiliki *Root*, *Parent*, dan *Child Node*, adalah...',
                        'correct' => 'Tree',
                        'wrong' => ['Array', 'Stack', 'Queue']
                    ],
                    [
                        'payload' => 'Sebuah variabel khusus yang nilai di dalamnya BUKAN berisi angka/teks, melainkan berisi *Alamat Memori* dari variabel lain dinamakan...',
                        'correct' => 'Pointer',
                        'wrong' => ['Reference', 'Struct', 'Constant']
                    ],
                    [
                        'payload' => 'Pada bahasa C/C++, operator referensi untuk mengetahui/mengambil alamat memori suatu variabel adalah...',
                        'correct' => '& (Ampersand)',
                        'wrong' => ['* (Asterisk)', '# (Hash)', '$ (Dollar)']
                    ],
                    [
                        'payload' => 'Sedangkan operator dereferensi yang dipakai untuk melihat isi/nilai dari alamat yang ditunjuk pointer adalah...',
                        'correct' => '* (Asterisk)',
                        'wrong' => ['& (Ampersand)', '-> (Arrow)', '@ (At)']
                    ],
                    [
                        'payload' => 'API merupakan jembatan antar sistem perangkat lunak untuk saling berkomunikasi. Singkatan dari API adalah...',
                        'correct' => 'Application Programming Interface',
                        'wrong' => ['Advanced Programming Interface', 'Automatic Protocol Interface', 'Application Process Integration']
                    ],
                    [
                        'payload' => 'Format pertukaran data yang sering digunakan pada API (ringan, mudah dibaca mesin dan manusia), yang berbasis format objek bahasa JavaScript dinamakan...',
                        'correct' => 'JSON (JavaScript Object Notation)',
                        'wrong' => ['XML', 'HTML', 'YAML']
                    ],
                    [
                        'payload' => 'Dalam konsep pembuatan fungsi, variabel yang tertera pada saat deklarasi pembuatan fungsi disebut...',
                        'correct' => 'Parameter Formal',
                        'wrong' => ['Parameter Aktual', 'Argumen Valid', 'Variabel Global']
                    ],
                    [
                        'payload' => 'Sedangkan nilai/data nyata yang dimasukkan atau dilempar ketika fungsi tersebut *dipanggil/dijalankan* disebut...',
                        'correct' => 'Parameter Aktual / Argumen',
                        'wrong' => ['Parameter Formal', 'Void Variable', 'Static Parameter']
                    ],
                    [
                        'payload' => 'Blok *try - catch - finally* (atau serupa) dalam banyak bahasa pemrograman (Java, C++, PHP) ditujukan khusus untuk keperluan...',
                        'correct' => 'Error Handling / Exception (Penanganan kesalahan saat runtime)',
                        'wrong' => ['Menguji performa kode program (Testing)', 'Membuat perulangan tak terbatas', 'Menghentikan program secara paksa']
                    ],
                    [
                        'payload' => 'Salah satu syarat utama yang membedakan sebuah Algoritma sejati dengan sekumpulan instruksi biasa (menurut Donald Knuth) adalah *Finiteness*, yaitu...',
                        'correct' => 'Harus memiliki titik berhenti/berakhir setelah memproses sejumlah langkah logis',
                        'wrong' => ['Harus tidak boleh ada error sama sekali', 'Harus berjalan selamanya di memori', 'Harus menggunakan bahasa Inggris']
                    ],
                    [
                        'payload' => 'Kata kunci `null` atau `nil` pada variabel sering direpresentasikan sebagai...',
                        'correct' => 'Kekosongan; Variabel sama sekali tidak merujuk pada nilai maupun objek apapun',
                        'wrong' => ['Angka nol (0)', 'Teks yang kosong ("")', 'Tipe data boolean False']
                    ],
                    [
                        'payload' => 'Git merupakan tools wajib programmer (misalnya saat memakai GitHub/GitLab). Git ini pada dasarnya adalah sistem...',
                        'correct' => 'Version Control System (VCS)',
                        'wrong' => ['Operating System', 'Compiler System', 'Database Management System']
                    ],
                    [
                        'payload' => 'Cabang utama dalam riwayat penyimpanan proyek ketika menggunakan sistem kontrol versi Git biasanya dinamakan...',
                        'correct' => 'Master / Main',
                        'wrong' => ['Branch / Tree', 'Commit / Push', 'Head / Tail']
                    ],
                    [
                        'payload' => 'Struktur data *Graph* (graf) biasanya dimanfaatkan programmer di dunia nyata paling ideal untuk memodelkan sistem...',
                        'correct' => 'Jalur rute peta/navigasi dan pertemanan jejaring sosial',
                        'wrong' => ['Daftar antrean kasir', 'Tumpukan piring cucian', 'Penyimpanan biodata tunggal user']
                    ],
                    [
                        'payload' => 'SDK biasanya berisi compiler, debugger, dan library yang dibundel untuk target platform tertentu. SDK adalah kependekan dari...',
                        'correct' => 'Software Development Kit',
                        'wrong' => ['System Development Kit', 'Standard Design Kit', 'Software Deployment Kit']
                    ],
                    [
                        'payload' => 'Dalam bahasa C/C++, *Format Specifier* yang digunakan di dalam fungsi `printf` untuk mencetak bilangan desimal (Float) adalah...',
                        'correct' => '%f',
                        'wrong' => ['%d', '%s', '%c']
                    ],
                    [
                        'payload' => 'Sedangkan untuk fungsi *input* (menerima ketikan dari user) dari library standar bahasa C menggunakan instruksi...',
                        'correct' => 'scanf()',
                        'wrong' => ['cin', 'print', 'get()']
                    ],
                    [
                        'payload' => 'Dalam pemrograman berorientasi objek (seperti Java, C++, PHP), kata kunci `this` digunakan untuk...',
                        'correct' => 'Merujuk pada variabel/metode milik instance objek Class saat itu sendiri',
                        'wrong' => ['Memanggil objek induk', 'Mendeklarasikan kelas baru', 'Membuat variabel lokal baru']
                    ],
                    [
                        'payload' => 'Pola arsitektur pengembangan perangkat lunak yang memisahkan kode data (Model), antarmuka (View), dan logika aplikasi (Controller) disebut...',
                        'correct' => 'Arsitektur MVC',
                        'wrong' => ['Arsitektur MVP', 'Arsitektur Monolithic', 'Arsitektur Microservices']
                    ],
                    [
                        'payload' => 'Sebuah kerangka kerja terstruktur (biasanya berisi pondasi, struktur file baku, dan fungsi siap pakai) yang mempercepat kita dalam mengembangkan aplikasi disebut...',
                        'correct' => 'Framework',
                        'wrong' => ['Plugin', 'Library', 'Extension']
                    ],
                    [
                        'payload' => 'Istilah untuk kode program yang belum dikompilasi (kode mentah yang ditulis dan masih dibaca oleh manusia) adalah...',
                        'correct' => 'Source Code',
                        'wrong' => ['Machine Code', 'Bytecode', 'Executable File (.exe)']
                    ],
                    [
                        'payload' => 'Pernyataan mana yang PALING TEPAT mengenai perbedaan antara Compiler dan Interpreter?',
                        'correct' => 'Compiler menerjemahkan seluruh kode ke file mesin sebelum jalan, Interpreter mengeksekusi langsung baris demi baris saat itu juga',
                        'wrong' => ['Compiler digunakan untuk bahasa Web, Interpreter untuk Desktop', 'Compiler berjalan lebih lambat dibanding Interpreter', 'Tidak ada perbedaan mendasar']
                    ],
                    [
                        'payload' => 'Pengujian (testing) fungsionalitas program yang dilakukan oleh pihak pengembang (Developer) disebut dengan fase...',
                        'correct' => 'Alpha Testing',
                        'wrong' => ['Beta Testing', 'Unit Testing', 'Release Testing']
                    ],
                    [
                        'payload' => 'Menyisipkan variabel atau hasil eksekusi langsung ke dalam teks (string) tanpa memakai operator penggabung (+) disebut teknik...',
                        'correct' => 'String Interpolation',
                        'wrong' => ['String Concatenation', 'String Parsing', 'String Replacing']
                    ],
                    [
                        'payload' => 'Keyword `static` pada sebuah fungsi/variabel dalam Class menandakan bahwa fungsi tersebut...',
                        'correct' => 'Bisa diakses langsung lewat nama Class-nya tanpa harus membuat instance objek baru',
                        'wrong' => ['Tidak bisa diubah nilainya', 'Menjadi tidak bisa diakses dari luar', 'Hanya jalan satu kali']
                    ],
                    [
                        'payload' => 'Pola desain pengembangan perangkat lunak yang tradisional, bertahap lurus menyerupai aliran air terjun dari analisa sampai maintenance disebut metode...',
                        'correct' => 'Waterfall',
                        'wrong' => ['Agile', 'Scrum', 'Spiral']
                    ],
                    [
                        'payload' => 'Salah satu *framework* kerja dalam lingkup metodologi *Agile* yang terkenal dengan konsep tahapan Sprint (1-4 minggu pengerjaan) adalah...',
                        'correct' => 'Scrum',
                        'wrong' => ['Kanban', 'DevOps', 'Lean']
                    ],
                    [
                        'payload' => 'Operasi memori atau disk yang prosesnya dilakukan bersama-sama atau secara berbarengan, dimana program bisa mengerjakan tugas lain saat tugas pertama belum selesai disebut pemrograman...',
                        'correct' => 'Asynchronous',
                        'wrong' => ['Synchronous', 'Sequential', 'Linear']
                    ],
                    [
                        'payload' => 'Konsep *Garbage Collection* dalam beberapa bahasa pemrograman (seperti Java dan C#) bertugas untuk...',
                        'correct' => 'Secara otomatis membersihkan ruang memori (RAM) dari objek yang sudah tidak terpakai lagi',
                        'wrong' => ['Mengahapus file sementara di hardisk', 'Membersihkan cache browser', 'Memformat sistem operasi']
                    ],
                    [
                        'payload' => 'Di sebuah Array bahasa PHP `[10, 20, 30]`, jika kita ingin mengambil angka `30`, kita harus mengakses indeks ke...',
                        'correct' => '2',
                        'wrong' => ['3', '1', '0']
                    ],
                    [
                        'payload' => 'Di sebagian besar sintaks SQL (yang biasa diintegrasikan di pemrograman), perintah untuk mengambil baris data dalam database adalah...',
                        'correct' => 'SELECT',
                        'wrong' => ['GET', 'PULL', 'FETCH']
                    ],
                    [
                        'payload' => 'Tanda kurung kurawal `{ }` dalam struktur pemrograman turunan bahasa C (termasuk C++, Java, PHP) sangat penting. Tanda tersebut berfungsi untuk...',
                        'correct' => 'Menentukan batas blok kode (scope) milik sebuah perulangan, percabangan, atau fungsi',
                        'wrong' => ['Mendeklarasikan array multidimensi', 'Memberikan komentar ganda pada file', 'Mencetak output ke terminal']
                    ],
                    [
                        'payload' => 'Sebutan untuk program jahat yang disisipkan oleh developer secara rahasia, yang akan terpicu ketika waktu atau syarat logikanya terpenuhi adalah...',
                        'correct' => 'Logic Bomb',
                        'wrong' => ['Trojan Horse', 'Malware', 'Worm']
                    ],
                    [
                        'payload' => 'Sebuah *Paradigma* pemrograman dimana alur eksekusi program sangat bergantung pada interaksi dan input (klik mouse, tombol keyboard dari pengguna) disebut...',
                        'correct' => 'Event-Driven Programming',
                        'wrong' => ['Functional Programming', 'Procedural Programming', 'Declarative Programming']
                    ],
                    [
                        'payload' => 'Penulisan notasi kasus untuk nama variabel di mana kata pertama diawali huruf kecil, dan kata berikutnya berawalan huruf kapital (contoh: `namaLengkapUser`) disebut tipe...',
                        'correct' => 'Camel Case',
                        'wrong' => ['Snake Case', 'Pascal Case', 'Kebab Case']
                    ],
                    [
                        'payload' => 'Sementara penulisan variabel dengan memisahkan kata menggunakan garis bawah (contoh: `nama_lengkap_user`) disebut tipe...',
                        'correct' => 'Snake Case',
                        'wrong' => ['Camel Case', 'Pascal Case', 'Kebab Case']
                    ],
                    [
                        'payload' => 'Dalam evaluasi kondisi logika `(True OR False) AND True`, hasil akhirnya adalah...',
                        'correct' => 'True',
                        'wrong' => ['False', 'Null', 'Error']
                    ],
                    [
                        'payload' => 'Dalam logika pemrograman bitwise XOR (Exclusive OR), operasi tersebut akan menghasilkan TRUE jika dan hanya jika...',
                        'correct' => 'Inputnya memiliki nilai yang saling berbeda (contoh: True XOR False)',
                        'wrong' => ['Semua inputnya True', 'Semua inputnya False', 'Minimal satu inputnya True bebas']
                    ],
                    [
                        'payload' => 'Sebuah tipe struktur data abstrak di mana kita menyimpan pasangan kunci dan nilai (Key-Value Pair), sehingga pengambilan data jauh lebih cepat melalui "Key", dinamakan...',
                        'correct' => 'Hash Map / Dictionary',
                        'wrong' => ['Linked List', 'Stack', 'Queue']
                    ],
                    [
                        'payload' => 'Pernyataan *Refactoring* dalam siklus pengembangan program berarti tindakan untuk...',
                        'correct' => 'Menulis ulang struktur kode supaya lebih rapi dan bersih tanpa mengubah fungsionalitas dan output aslinya',
                        'wrong' => ['Menghapus bug secara menyeluruh', 'Menambah banyak fitur baru', 'Mengubah bahasa pemrograman ke yang lebih baru']
                    ]
                ]
            ],
            'Sistem Operasi' => [
                'description' => 'Mata pelajaran tentang manajemen perangkat keras dan perangkat lunak komputer.',
                'questions' => [
                    [
                        'payload' => 'Perangkat lunak sistem yang mengatur sumber daya dari perangkat keras dan perangkat lunak, serta sebagai daemon untuk program komputer disebut...',
                        'correct' => 'Sistem Operasi',
                        'wrong' => ['Aplikasi Perkantoran', 'Bahasa Pemrograman', 'Antivirus']
                    ],
                    [
                        'payload' => 'Inti atau program utama dari sebuah sistem operasi yang mengatur interaksi antara hardware dan software adalah...',
                        'correct' => 'Kernel',
                        'wrong' => ['Shell', 'GUI', 'Terminal']
                    ],
                    [
                        'payload' => 'Antarmuka sistem operasi yang menggunakan unsur grafis (ikon, jendela, kursor) untuk berinteraksi dengan pengguna disebut...',
                        'correct' => 'GUI (Graphical User Interface)',
                        'wrong' => ['CLI (Command Line Interface)', 'API (Application Programming Interface)', 'TUI (Text User Interface)']
                    ],
                    [
                        'payload' => 'Antarmuka sistem operasi di mana pengguna harus mengetikkan perintah berupa teks secara manual disebut...',
                        'correct' => 'CLI (Command Line Interface)',
                        'wrong' => ['GUI (Graphical User Interface)', 'VUI (Voice User Interface)', 'MDI (Multiple Document Interface)']
                    ],
                    [
                        'payload' => 'Berikut ini yang merupakan sistem operasi bersifat Open-Source (sumber terbuka) adalah...',
                        'correct' => 'Linux',
                        'wrong' => ['Windows', 'macOS', 'iOS']
                    ],
                    [
                        'payload' => 'Sistem operasi berbayar dan berlisensi tertutup (closed-source) yang paling banyak digunakan pada komputer pribadi di dunia saat ini adalah...',
                        'correct' => 'Microsoft Windows',
                        'wrong' => ['Ubuntu', 'FreeBSD', 'Mac OS Classic']
                    ],
                    [
                        'payload' => 'Maskot resmi dari sistem operasi Linux berupa burung penguin yang diberi nama...',
                        'correct' => 'Tux',
                        'wrong' => ['Duke', 'Gopher', 'Beastie']
                    ],
                    [
                        'payload' => 'Kemampuan sebuah sistem operasi untuk menjalankan beberapa program/aplikasi secara bersamaan disebut...',
                        'correct' => 'Multitasking',
                        'wrong' => ['Multiprocessing', 'Multiusers', 'Multithreading']
                    ],
                    [
                        'payload' => 'Sedangkan sistem operasi yang mengizinkan banyak pengguna (user) untuk login dan menggunakan komputer yang sama secara bersamaan disebut...',
                        'correct' => 'Multiusers',
                        'wrong' => ['Multitasking', 'Single-user', 'Client-Server']
                    ],
                    [
                        'payload' => 'Pada sistem operasi Linux, perintah dasar pada terminal untuk melihat daftar file dan direktori adalah...',
                        'correct' => 'ls',
                        'wrong' => ['dir', 'show', 'list']
                    ],
                    [
                        'payload' => 'Pada Command Prompt (CMD) di Windows, perintah untuk membersihkan layar adalah...',
                        'correct' => 'cls',
                        'wrong' => ['clear', 'clean', 'rm']
                    ],
                    [
                        'payload' => 'Perintah untuk membuat sebuah folder (direktori) baru melalui terminal Linux adalah...',
                        'correct' => 'mkdir',
                        'wrong' => ['rmdir', 'cd', 'touch']
                    ],
                    [
                        'payload' => 'Sedangkan perintah untuk menyalin (copy) sebuah file di sistem Linux adalah...',
                        'correct' => 'cp',
                        'wrong' => ['copy', 'mv', 'rm']
                    ],
                    [
                        'payload' => 'Struktur direktori tertinggi (paling akar) di dalam sistem operasi Linux disimbolkan dengan tanda...',
                        'correct' => '/ (Slash)',
                        'wrong' => ['C:\\', '~ (Tilde)', '. (Titik)']
                    ],
                    [
                        'payload' => 'Sistem file (File System) standar modern yang secara default digunakan oleh sistem operasi Windows NT / 10 / 11 adalah...',
                        'correct' => 'NTFS (New Technology File System)',
                        'wrong' => ['FAT32', 'ext4', 'HFS+']
                    ],
                    [
                        'payload' => 'Sistem file bawaan (default) yang sangat umum digunakan oleh distribusi Linux modern seperti Ubuntu adalah...',
                        'correct' => 'ext4',
                        'wrong' => ['NTFS', 'FAT32', 'APFS']
                    ],
                    [
                        'payload' => 'Proses memuat sistem operasi dari media penyimpanan (harddisk) ke dalam memori utama (RAM) sesaat setelah komputer dinyalakan disebut...',
                        'correct' => 'Booting',
                        'wrong' => ['Instalasi', 'Formatting', 'Shutdown']
                    ],
                    [
                        'payload' => 'Proses menyalakan ulang komputer yang sedang dalam keadaan hidup tanpa mematikan aliran listriknya disebut...',
                        'correct' => 'Warm Boot',
                        'wrong' => ['Cold Boot', 'Sleep', 'Hibernate']
                    ],
                    [
                        'payload' => 'Program bawaan pada motherboard yang pertama kali berjalan sebelum sistem operasi dipanggil adalah...',
                        'correct' => 'BIOS / UEFI',
                        'wrong' => ['Bootloader', 'Kernel', 'Command Prompt']
                    ],
                    [
                        'payload' => 'Istilah yang digunakan ketika sistem operasi mengalokasikan sebagian kapasitas Harddisk/SSD untuk bertindak seolah-olah sebagai tambahan RAM adalah...',
                        'correct' => 'Virtual Memory / Swap File',
                        'wrong' => ['Cache Memory', 'Register', 'ROM']
                    ],
                    [
                        'payload' => 'Kondisi di mana dua atau lebih proses saling menunggu secara tak terhingga (hang/macet) karena masing-masing menahan resource yang dibutuhkan satu sama lain disebut...',
                        'correct' => 'Deadlock',
                        'wrong' => ['Starvation', 'Interrupt', 'Spooling']
                    ],
                    [
                        'payload' => 'Kombinasi tombol pintasan (shortcut) default di Windows untuk membuka Task Manager secara langsung adalah...',
                        'correct' => 'Ctrl + Shift + Esc',
                        'wrong' => ['Alt + F4', 'Windows + R', 'Ctrl + Alt + Tab']
                    ],
                    [
                        'payload' => 'Istilah *Open Source Software (OSS)* bermakna bahwa...',
                        'correct' => 'Kode sumber dari perangkat lunak tersebut terbuka, bebas dilihat, dimodifikasi, dan didistribusikan',
                        'wrong' => ['Perangkat lunak tersebut selalu gratis namun tidak boleh diubah', 'Sistem operasinya tidak menggunakan password', 'Komputernya selalu terbuka tanpa casing']
                    ],
                    [
                        'payload' => 'Berbagai macam varian sistem operasi yang dibangun berdasarkan inti kernel Linux (contoh: Debian, Fedora, Arch) biasa disebut dengan istilah...',
                        'correct' => 'Distro (Distribusi)',
                        'wrong' => ['Versi', 'Edisi', 'Kernel Mods']
                    ],
                    [
                        'payload' => 'Program manajer paket (Package Manager) bawaan pada distro keluarga Debian dan Ubuntu adalah...',
                        'correct' => 'apt (Advanced Package Tool)',
                        'wrong' => ['yum', 'pacman', 'zypper']
                    ],
                    [
                        'payload' => 'Di sistem operasi Linux, akun pengguna tertinggi yang memiliki hak akses penuh (Administrator) tanpa batas disebut...',
                        'correct' => 'root',
                        'wrong' => ['admin', 'superuser', 'system']
                    ],
                    [
                        'payload' => 'Aplikasi *shell* (penerjemah perintah) yang paling umum dan menjadi default di banyak distro Linux saat terminal dibuka adalah...',
                        'correct' => 'bash (Bourne Again Shell)',
                        'wrong' => ['cmd.exe', 'PowerShell', 'csh']
                    ],
                    [
                        'payload' => 'Alamat IP (Internet Protocol) standar yang merepresentasikan localhost (komputer itu sendiri) untuk pengujian jaringan internal pada OS adalah...',
                        'correct' => '127.0.0.1',
                        'wrong' => ['192.168.1.1', '8.8.8.8', '0.0.0.0']
                    ],
                    [
                        'payload' => 'Ekstensi file untuk program yang dapat dieksekusi / dijalankan secara langsung (executable file) di Windows adalah...',
                        'correct' => '.exe',
                        'wrong' => ['.apk', '.deb', '.dmg']
                    ],
                    [
                        'payload' => 'Ekstensi file installer (paket instalasi) untuk sistem operasi Android adalah...',
                        'correct' => '.apk',
                        'wrong' => ['.ipa', '.exe', '.msi']
                    ],
                    [
                        'payload' => 'Sistem operasi mobile raksasa ciptaan Google (Android) pada dasarnya dibangun di atas kernel dari OS...',
                        'correct' => 'Linux',
                        'wrong' => ['Windows', 'macOS', 'Unix']
                    ],
                    [
                        'payload' => 'Dalam manajemen proses OS, sebuah proses yang sedang menunggu gilirannya untuk dieksekusi oleh CPU berada pada status (state)...',
                        'correct' => 'Ready',
                        'wrong' => ['Running', 'Blocked / Waiting', 'Terminated']
                    ],
                    [
                        'payload' => 'Mekanisme sistem operasi yang memungkinkan beberapa proses untuk saling berkomunikasi dan bertukar data satu sama lain disebut...',
                        'correct' => 'IPC (Inter-Process Communication)',
                        'wrong' => ['RPC (Remote Procedure Call)', 'DMA (Direct Memory Access)', 'Virtualization']
                    ],
                    [
                        'payload' => 'Proses menyimpan *state* (kondisi) proses lama dan memuat *state* proses baru agar CPU dapat berpindah mengeksekusi tugas lain dinamakan...',
                        'correct' => 'Context Switching',
                        'wrong' => ['Multitasking', 'Paging', 'Scheduling']
                    ],
                    [
                        'payload' => 'Unit dasar dari utilisasi CPU; terkadang disebut sebagai "proses ringan" yang berjalan di dalam sebuah proses dinamakan...',
                        'correct' => 'Thread',
                        'wrong' => ['Fiber', 'Kernel', 'Task']
                    ],
                    [
                        'payload' => 'Kondisi saat program meminta sebagian data ke RAM, namun data tersebut belum ada di RAM (masih di harddisk) disebut...',
                        'correct' => 'Page Fault',
                        'wrong' => ['Segmentation Fault', 'Buffer Overflow', 'Memory Leak']
                    ],
                    [
                        'payload' => 'Masalah pada sistem file di mana file disimpan dalam potongan-potongan kecil yang tersebar tidak berurutan di sektor harddisk disebut...',
                        'correct' => 'Fragmentasi (Fragmentation)',
                        'wrong' => ['Partisi', 'Bad Sector', 'Defragmentasi']
                    ],
                    [
                        'payload' => 'Untuk mengatasi masalah file yang tersebar agar performa harddisk kembali cepat, Windows memiliki utilitas sistem yang disebut...',
                        'correct' => 'Disk Defragmenter',
                        'wrong' => ['Disk Cleanup', 'Task Scheduler', 'Device Manager']
                    ],
                    [
                        'payload' => 'Perangkat lunak khusus yang bertugas agar sistem operasi dapat mengenali dan mengontrol perangkat keras tertentu (seperti VGA, Printer, Mouse) adalah...',
                        'correct' => 'Device Driver',
                        'wrong' => ['Firmware', 'Kernel', 'Bootloader']
                    ],
                    [
                        'payload' => 'Teknik menaruh data sementara dari berbagai program ke dalam buffer (antrean) sebelum dikirim ke perangkat input/output yang lambat (misal pada mesin Printer) disebut...',
                        'correct' => 'Spooling',
                        'wrong' => ['Caching', 'Paging', 'Swapping']
                    ],
                    [
                        'payload' => 'Perangkat lunak (biasanya kecil) yang diprogram dan ditanamkan secara permanen ke dalam chip ROM pada perangkat keras (misal: router, mikrokontroler) disebut...',
                        'correct' => 'Firmware',
                        'wrong' => ['Malware', 'Software', 'Shareware']
                    ],
                    [
                        'payload' => 'GNU merupakan sebuah proyek sistem operasi bebas/open source yang merupakan singkatan rekursif dari...',
                        'correct' => 'GNU\'s Not Unix',
                        'wrong' => ['General Network Utility', 'Global Network Unix', 'Graphics Network Unit']
                    ],
                    [
                        'payload' => 'Mahasiswa dari Universitas Helsinki, Finlandia yang pertama kali menciptakan kernel Linux dan mempublikasikannya secara gratis pada tahun 1991 adalah...',
                        'correct' => 'Linus Torvalds',
                        'wrong' => ['Richard Stallman', 'Steve Wozniak', 'Bill Gates']
                    ],
                    [
                        'payload' => 'Perintah pada terminal Windows (CMD) untuk melihat konfigurasi IP Address dari perangkat jaringan di komputer tersebut adalah...',
                        'correct' => 'ipconfig',
                        'wrong' => ['ifconfig', 'ping', 'netstat']
                    ],
                    [
                        'payload' => 'Sedangkan pada banyak distro Linux lama, perintah jaringan untuk melihat IP Address dan antarmuka jaringan adalah...',
                        'correct' => 'ifconfig',
                        'wrong' => ['ipconfig', 'ping', 'traceroute']
                    ],
                    [
                        'payload' => 'Layanan pada sistem operasi yang berjalan terus menerus di latar belakang tanpa adanya antarmuka grafis (pada Linux biasa disebut dengan nama ini) adalah...',
                        'correct' => 'Daemon',
                        'wrong' => ['Process', 'Thread', 'Zombie']
                    ],
                    [
                        'payload' => 'Sedangkan layanan latar belakang yang tidak terlihat tersebut, jika di sistem operasi Windows dikenal dengan istilah...',
                        'correct' => 'Services',
                        'wrong' => ['Daemons', 'Registries', 'Schedulers']
                    ],
                    [
                        'payload' => 'Komponen manajemen memori yang menerjemahkan alamat logika/virtual dari CPU menjadi alamat fisik di RAM adalah...',
                        'correct' => 'MMU (Memory Management Unit)',
                        'wrong' => ['ALU (Arithmetic Logic Unit)', 'CU (Control Unit)', 'FPU (Floating Point Unit)']
                    ],
                    [
                        'payload' => 'Direktori tempat sistem operasi Windows secara default terinstal biasanya ditandai dengan partisi atau drive letter...',
                        'correct' => 'Drive C:',
                        'wrong' => ['Drive A:', 'Drive B:', 'Drive D:']
                    ],
                    [
                        'payload' => 'Kumpulan pengaturan terpusat (database hierarki) pada Windows yang menyimpan konfigurasi sistem hardware, software, dan preferensi pengguna dinamakan...',
                        'correct' => 'Windows Registry',
                        'wrong' => ['Windows Explorer', 'Control Panel', 'Group Policy']
                    ],
                    [
                        'payload' => 'Algoritma penjadwalan CPU di mana proses yang pertama kali datang akan dieksekusi terlebih dahulu disebut...',
                        'correct' => 'FCFS (First Come First Serve)',
                        'wrong' => ['SJF (Shortest Job First)', 'Round Robin', 'Priority Scheduling']
                    ],
                    [
                        'payload' => 'Algoritma penjadwalan CPU yang memberikan jatah waktu tertentu (Time Quantum) secara bergantian dan adil kepada setiap proses adalah...',
                        'correct' => 'Round Robin',
                        'wrong' => ['FCFS', 'SJF', 'Multilevel Queue']
                    ],
                    [
                        'payload' => 'Algoritma penjadwalan yang mengeksekusi proses dengan estimasi waktu penyelesaian paling singkat terlebih dahulu adalah...',
                        'correct' => 'SJF (Shortest Job First)',
                        'wrong' => ['FCFS', 'Round Robin', 'Priority Scheduling']
                    ],
                    [
                        'payload' => 'Pada struktur direktori Linux, folder yang digunakan khusus untuk menyimpan file-file konfigurasi sistem adalah...',
                        'correct' => '/etc',
                        'wrong' => ['/var', '/bin', '/home']
                    ],
                    [
                        'payload' => 'Sedangkan direktori di Linux yang digunakan untuk menyimpan file data pribadi masing-masing pengguna (seperti Dokumen, Download, Gambar) adalah...',
                        'correct' => '/home',
                        'wrong' => ['/usr', '/opt', '/root']
                    ],
                    [
                        'payload' => 'Direktori `/var` pada Linux utamanya diperuntukkan sebagai tempat penyimpanan data yang...',
                        'correct' => 'Ukurannya terus berubah atau dinamis, seperti file Log sistem dan database',
                        'wrong' => ['Berisi program aplikasi sistem', 'Berisi driver perangkat keras', 'Berisi konfigurasi bootloader']
                    ],
                    [
                        'payload' => 'Perintah terminal pada Linux untuk menghapus file secara permanen adalah...',
                        'correct' => 'rm',
                        'wrong' => ['del', 'erase', 'remove']
                    ],
                    [
                        'payload' => 'Kata kunci (perintah) tambahan di Linux yang digunakan pengguna biasa untuk menjalankan suatu perintah dengan hak akses Superuser/Root adalah...',
                        'correct' => 'sudo',
                        'wrong' => ['su', 'admin', 'runas']
                    ],
                    [
                        'payload' => 'Perintah di Linux untuk mengubah hak akses (permission) dari sebuah file atau direktori adalah...',
                        'correct' => 'chmod',
                        'wrong' => ['chown', 'chgrp', 'attrib']
                    ],
                    [
                        'payload' => 'Perintah di Linux untuk mengubah kepemilikan (owner) dari sebuah file adalah...',
                        'correct' => 'chown',
                        'wrong' => ['chmod', 'chgrp', 'usermod']
                    ],
                    [
                        'payload' => 'Dalam format oktal hak akses file Linux, angka `777` bermakna...',
                        'correct' => 'Owner, Group, dan Other memiliki hak untuk Read, Write, dan Execute penuh',
                        'wrong' => ['Hanya Owner yang bisa membaca file', 'File dikunci total dari semua orang', 'Hanya sistem yang bisa mengeksekusi file']
                    ],
                    [
                        'payload' => 'Sistem operasi buatan Apple Inc. untuk komputer Mac (macOS) pada dasarnya dibangun menggunakan basis dari OS...',
                        'correct' => 'Unix / Darwin',
                        'wrong' => ['Linux', 'Windows NT', 'MS-DOS']
                    ],
                    [
                        'payload' => 'Aplikasi perangkat lunak yang berfungsi untuk membuat dan menjalankan Mesin Virtual (Virtual Machine) di atas OS utama (misal untuk menginstal Ubuntu di dalam Windows) disebut...',
                        'correct' => 'Hypervisor (seperti VirtualBox atau VMware)',
                        'wrong' => ['Emulator', 'Simulator', 'Bootloader']
                    ],
                    [
                        'payload' => 'Hypervisor yang diinstal langsung di atas perangkat keras fisik tanpa OS perantara (biasa digunakan di server enterprise) disebut Hypervisor tipe...',
                        'correct' => 'Tipe 1 (Bare-Metal)',
                        'wrong' => ['Tipe 2 (Hosted)', 'Tipe 3 (Hybrid)', 'Tipe 4 (Cloud)']
                    ],
                    [
                        'payload' => 'Lingkungan desktop (Desktop Environment) grafis yang paling populer dan sering menjadi bawaan pada sistem operasi Linux modern (seperti Ubuntu) adalah...',
                        'correct' => 'GNOME dan KDE',
                        'wrong' => ['Aero dan Metro', 'Aqua', 'Explorer']
                    ],
                    [
                        'payload' => 'Program bootloader yang sangat umum dipakai oleh distro Linux untuk mengatur menu pemilihan sistem operasi saat komputer baru menyala adalah...',
                        'correct' => 'GRUB',
                        'wrong' => ['LILO', 'NTLDR', 'BOOTMGR']
                    ],
                    [
                        'payload' => 'Antarmuka program (API) yang menghubungkan antara aplikasi milik pengguna (User Space) dengan layanan yang disediakan oleh Kernel (Kernel Space) disebut...',
                        'correct' => 'System Call',
                        'wrong' => ['Interrupt', 'Signal', 'Driver']
                    ],
                    [
                        'payload' => 'Utilitas grafis bawaan Windows yang digunakan untuk membagi, memformat, dan mengatur partisi harddisk adalah...',
                        'correct' => 'Disk Management',
                        'wrong' => ['Device Manager', 'Task Manager', 'Registry Editor']
                    ],
                    [
                        'payload' => 'Perintah CLI pada Linux yang menampilkan daftar proses yang sedang berjalan beserta konsumsi RAM/CPU-nya secara realtime (mirip Task Manager) adalah...',
                        'correct' => 'top (atau htop)',
                        'wrong' => ['ps', 'kill', 'df']
                    ],
                    [
                        'payload' => 'Untuk menghentikan secara paksa sebuah proses yang macet di Linux berdasarkan nomor PID-nya, kita menggunakan perintah...',
                        'correct' => 'kill',
                        'wrong' => ['stop', 'terminate', 'end']
                    ],
                    [
                        'payload' => 'Dalam konsep proses, suatu proses yang sudah selesai dieksekusi (mati) namun entri datanya masih belum dihapus dari tabel proses oleh induknya disebut...',
                        'correct' => 'Zombie Process',
                        'wrong' => ['Orphan Process', 'Deadlock Process', 'Ghost Process']
                    ],
                    [
                        'payload' => 'Sedangkan proses anak (child process) yang terus berjalan namun proses induknya (parent) dimatikan lebih dulu secara tiba-tiba disebut...',
                        'correct' => 'Orphan Process',
                        'wrong' => ['Zombie Process', 'Daemon Process', 'Background Process']
                    ],
                    [
                        'payload' => 'Pada mayoritas distro Linux modern, sistem inisialisasi utama (proses dengan PID 1) yang mengelola servis, daemon, dan sistem booting menggantikan `init` lama adalah...',
                        'correct' => 'systemd',
                        'wrong' => ['SysVinit', 'Upstart', 'OpenRC']
                    ],
                    [
                        'payload' => 'Teknik manajemen memori di mana memori fisik (RAM) dibagi menjadi blok-blok kecil dengan ukuran tetap yang disebut dengan "Frame" dinamakan...',
                        'correct' => 'Paging',
                        'wrong' => ['Segmentation', 'Swapping', 'Fragmentation']
                    ],
                    [
                        'payload' => 'Algoritma penggantian halaman (Page Replacement) di memori di mana halaman yang paling lama tidak diakses/digunakan akan diganti lebih dulu disebut...',
                        'correct' => 'LRU (Least Recently Used)',
                        'wrong' => ['FIFO (First In First Out)', 'Optimal', 'MRU (Most Recently Used)']
                    ],
                    [
                        'payload' => 'Konfigurasi harddisk berjenis RAID 0 (Striping) difokuskan untuk mendapatkan...',
                        'correct' => 'Kecepatan baca/tulis yang sangat tinggi tanpa toleransi kesalahan (no redundancy)',
                        'wrong' => ['Keamanan data yang digandakan (mirroring)', 'Backup data secara otomatis ke cloud', 'Kapasitas file menjadi terkompresi']
                    ],
                    [
                        'payload' => 'Sedangkan RAID 1 (Mirroring) difokuskan pada...',
                        'correct' => 'Redundansi data (duplikasi keamanan) di mana jika satu disk rusak, disk lain punya data yang persis sama',
                        'wrong' => ['Kecepatan baca/tulis dua kali lipat', 'Penggabungan ukuran dari berbagai disk tanpa keamanan', 'Penghapusan data secara permanen']
                    ],
                    [
                        'payload' => 'Aplikasi bawaan OS Linux untuk menjadwalkan suatu script atau program agar berjalan otomatis pada waktu tertentu (mirip Task Scheduler di Windows) adalah...',
                        'correct' => 'cron / crontab',
                        'wrong' => ['at', 'batch', 'schedule']
                    ],
                    [
                        'payload' => 'Perintah `pwd` di terminal Linux memiliki singkatan dan fungsi...',
                        'correct' => 'Print Working Directory (Menampilkan jalur folder tempat kita berada saat ini)',
                        'wrong' => ['Password (Mengubah password pengguna)', 'Power Down (Mematikan komputer)', 'Ping Wan Domain (Mengecek koneksi internet)']
                    ],
                    [
                        'payload' => 'Perintah di Linux untuk mencari kata atau pola teks spesifik di dalam sebuah file adalah...',
                        'correct' => 'grep',
                        'wrong' => ['find', 'search', 'locate']
                    ],
                    [
                        'payload' => 'Sistem operasi yang didesain khusus agar memiliki latensi respon yang sangat cepat, pasti, dan digunakan pada alat medis vital atau robot industri disebut...',
                        'correct' => 'RTOS (Real-Time Operating System)',
                        'wrong' => ['NOS (Network OS)', 'Mobile OS', 'Batch OS']
                    ],
                    [
                        'payload' => 'Arsitektur kernel di mana seluruh komponen OS (Device driver, File system, Memory management) dijalankan semua di dalam satu ruang Kernel dinamakan...',
                        'correct' => 'Monolithic Kernel',
                        'wrong' => ['Microkernel', 'Hybrid Kernel', 'Exokernel']
                    ],
                    [
                        'payload' => 'Sebuah filosofi penting dari sistem berbasis Unix/Linux di mana "Segala macam perangkat keras (Harddisk, Keyboard, Mouse) direpresentasikan dan diperlakukan sebagai..."',
                        'correct' => 'Sebuah File',
                        'wrong' => ['Sebuah Objek', 'Sebuah Proses', 'Sebuah Tabel']
                    ],
                    [
                        'payload' => 'Pengalamatan path file seperti `C:\\Windows\\System32\\cmd.exe` atau `/var/log/syslog` yang ditulis secara lengkap dari root disebut dengan...',
                        'correct' => 'Absolute Path',
                        'wrong' => ['Relative Path', 'Dynamic Path', 'Shortcut Path']
                    ],
                    [
                        'payload' => 'Sedangkan pengalamatan seperti `../folder/file.txt` (menggunakan titik-titik untuk mundur direktori) disebut...',
                        'correct' => 'Relative Path',
                        'wrong' => ['Absolute Path', 'Logical Path', 'Physical Path']
                    ],
                    [
                        'payload' => 'Environment Variable global pada sistem Windows maupun Linux yang menyimpan daftar direktori tempat OS mencari perintah program/executables adalah...',
                        'correct' => 'PATH',
                        'wrong' => ['HOME', 'USER', 'ROOT']
                    ],
                    [
                        'payload' => 'Perintah di terminal Linux yang digunakan untuk membuka buku panduan (manual) dari perintah lain adalah...',
                        'correct' => 'man',
                        'wrong' => ['help', 'info', 'guide']
                    ],
                    [
                        'payload' => 'Text editor berbasis Command Line (CLI) bawaan yang paling ramah pemula dan sering ditemui di server Linux adalah...',
                        'correct' => 'nano',
                        'wrong' => ['Microsoft Word', 'Notepad', 'Vim (Ramah untuk pro/expert)']
                    ],
                    [
                        'payload' => 'Salah satu fitur utama dari File System ext4 dan NTFS yang mencatat setiap perubahan pada jurnal (log) sebelum ditulis ke struktur disk utama untuk mencegah kerusakan data saat mati listrik mendadak dinamakan...',
                        'correct' => 'Journaling',
                        'wrong' => ['Defragmentation', 'Compression', 'Encryption']
                    ],
                    [
                        'payload' => 'Skema partisi tradisional lama (MBR / Master Boot Record) memiliki batasan maksimal ukuran harddisk yang dapat didukungnya, yaitu sebesar...',
                        'correct' => '2 Terabyte',
                        'wrong' => ['4 Gigabyte', '128 Terabyte', '256 Gigabyte']
                    ],
                    [
                        'payload' => 'Sebagai pengganti MBR, skema partisi modern yang wajib digunakan bersama UEFI dan mendukung harddisk raksasa dinamakan...',
                        'correct' => 'GPT (GUID Partition Table)',
                        'wrong' => ['MBR2', 'LVM (Logical Volume Manager)', 'APFS']
                    ],
                    [
                        'payload' => 'Pada Command Prompt Windows, perintah untuk memeriksa integritas sistem file di harddisk dan mencoba memperbaiki error bad sector adalah...',
                        'correct' => 'chkdsk',
                        'wrong' => ['sfc', 'diskpart', 'format']
                    ],
                    [
                        'payload' => 'Pada sistem Windows, utilitas `sfc /scannow` berfungsi untuk...',
                        'correct' => 'Memindai dan memperbaiki file inti sistem Windows (System Files) yang rusak atau hilang',
                        'wrong' => ['Mencari virus', 'Membersihkan cache RAM', 'Melakukan defragmentasi harddisk']
                    ],
                    [
                        'payload' => 'Program bawaan OS Windows yang berfungsi sebagai pelindung jaringan (memblokir port masuk/keluar yang mencurigakan) adalah...',
                        'correct' => 'Windows Defender Firewall',
                        'wrong' => ['Windows Update', 'UAC (User Account Control)', 'BitLocker']
                    ],
                    [
                        'payload' => 'Sistem enkripsi bawaan pada Windows edisi Pro / Enterprise yang dapat mengunci (enkripsi) satu partisi/harddisk penuh agar tidak bisa dibuka pencuri dinamakan...',
                        'correct' => 'BitLocker',
                        'wrong' => ['TrueCrypt', 'VeraCrypt', 'FileVault']
                    ],
                    [
                        'payload' => 'File sementara di Windows bernama `hiberfil.sys` memiliki ukuran sangat besar di harddisk C karena digunakan untuk menyimpan...',
                        'correct' => 'Seluruh isi RAM ke harddisk saat komputer masuk mode Hibernate',
                        'wrong' => ['Backup file update OS', 'Database virus terbaru', 'Cache penjelajahan internet']
                    ],
                    [
                        'payload' => 'Mode di Windows yang memungkinkan sistem menyala dengan memuat hanya driver dan servis dasar (sangat berguna untuk perbaikan/troubleshoot) disebut...',
                        'correct' => 'Safe Mode',
                        'wrong' => ['Normal Mode', 'Debug Mode', 'Recovery Mode']
                    ],
                    [
                        'payload' => 'Ketika kita mengklik kanan icon USB flashdisk dan memilih menu "Eject / Safely Remove" pada sistem operasi, apa yang sebenarnya dilakukan OS?',
                        'correct' => 'OS menyelesaikan (flush) seluruh operasi tulis yang tertunda di buffer RAM ke flashdisk lalu memutus koneksinya',
                        'wrong' => ['OS menghapus semua virus di flashdisk', 'OS mematikan listrik seluruh port USB', 'OS mengompresi data flashdisk menjadi kecil']
                    ],
                    [
                        'payload' => 'Sebuah notifikasi pengingat pop-up di layar di mana OS mengambil alih eksekusi sejenak karena ada kejadian penting pada perangkat keras (misal ada ketikan dari keyboard) dinamakan...',
                        'correct' => 'Interrupt (Interupsi)',
                        'wrong' => ['Error Message', 'Ping', 'Broadcast']
                    ],
                    [
                        'payload' => 'Di era komputasi modern, agar sistem operasi bisa mendeteksi perangkat keras USB (seperti Mouse atau Flashdisk) langsung dan dapat dipakai tanpa harus merestart komputer disebut dukungan...',
                        'correct' => 'Plug and Play (PnP)',
                        'wrong' => ['Hotspot', 'Tethering', 'BIOS Booting']
                    ],
                    [
                        'payload' => 'Protokol jaringan yang digunakan untuk meremote dan mengendalikan server Linux dari jarak jauh secara aman (terenkripsi) adalah...',
                        'correct' => 'SSH (Secure Shell)',
                        'wrong' => ['Telnet', 'FTP', 'HTTP']
                    ],
                    [
                        'payload' => 'Perintah dasar untuk mengecek konektivitas jaringan dari komputer kita ke komputer lain atau ke internet adalah...',
                        'correct' => 'ping',
                        'wrong' => ['ipconfig', 'netstat', 'nslookup']
                    ],
                    [
                        'payload' => 'Karakter `|` (Pipe) pada antarmuka baris perintah (CLI) Linux berfungsi untuk...',
                        'correct' => 'Meneruskan output dari perintah pertama untuk dijadikan input bagi perintah kedua',
                        'wrong' => ['Membatalkan perintah yang sedang berjalan', 'Menyimpan output ke dalam file teks', 'Memulai ulang terminal']
                    ],
                    [
                        'payload' => 'Karakter `>` (Redirection) pada CLI Linux dan Windows berfungsi untuk...',
                        'correct' => 'Membelokkan / menyimpan hasil output perintah dari layar ke dalam sebuah file',
                        'wrong' => ['Menggabungkan dua perintah sekaligus', 'Menghapus file yang dituju', 'Membuka akses admin']
                    ],
                    [
                        'payload' => 'Utilitas pengarsipan standar di Linux yang digunakan untuk menggabungkan banyak file menjadi satu file (biasanya dengan ekstensi .tar) adalah...',
                        'correct' => 'tar',
                        'wrong' => ['zip', 'rar', '7z']
                    ],
                    [
                        'payload' => 'Partisi khusus di harddisk pada sistem operasi Linux yang digunakan sebagai memori cadangan ketika RAM fisik penuh disebut...',
                        'correct' => 'Swap Partition',
                        'wrong' => ['Root Partition', 'Home Partition', 'Boot Partition']
                    ],
                    [
                        'payload' => 'Di sistem Windows, fungsi dari file `pagefile.sys` adalah...',
                        'correct' => 'Sebagai memori virtual (Virtual Memory) yang menyimpan data RAM ke harddisk saat RAM penuh',
                        'wrong' => ['Sebagai file installer pembaruan Windows', 'Menyimpan konfigurasi jaringan', 'File utama kernel Windows']
                    ],
                    [
                        'payload' => 'Fitur di Windows yang dapat mengembalikan kondisi file sistem dan pengaturan ke titik waktu sebelumnya jika terjadi error setelah update dinamakan...',
                        'correct' => 'System Restore',
                        'wrong' => ['System Image Backup', 'File History', 'Disk Cleanup']
                    ],
                    [
                        'payload' => 'Error fatal pada sistem operasi Windows yang menyebabkan layar berubah menjadi biru total dan sistem terhenti paksa biasa dikenal dengan istilah...',
                        'correct' => 'BSOD (Blue Screen of Death)',
                        'wrong' => ['RROD (Red Ring of Death)', 'Kernel Panic', 'System Freeze']
                    ],
                    [
                        'payload' => 'Kondisi error fatal serupa (sistem crash total) yang terjadi pada keluarga sistem operasi Unix/Linux disebut...',
                        'correct' => 'Kernel Panic',
                        'wrong' => ['Blue Screen', 'Segmentation Fault', 'Fatal Exception']
                    ],
                    [
                        'payload' => 'Program utilitas bawaan Windows yang digunakan untuk memantau, mengedit, dan menghapus konfigurasi tingkat lanjut (hierarchical database) adalah...',
                        'correct' => 'Registry Editor (regedit)',
                        'wrong' => ['Command Prompt', 'Task Manager', 'Group Policy']
                    ],
                    [
                        'payload' => 'Fitur keamanan Windows yang akan memunculkan jendela peringatan "Yes/No" dan meredupkan layar ketika sebuah program mencoba melakukan perubahan pada sistem disebut...',
                        'correct' => 'UAC (User Account Control)',
                        'wrong' => ['Windows Defender', 'Windows Firewall', 'SmartScreen']
                    ],
                    [
                        'payload' => 'Konfigurasi menginstal dua sistem operasi (misalnya Windows dan Linux) pada satu komputer yang sama agar bisa dipilih saat booting disebut...',
                        'correct' => 'Dual Boot',
                        'wrong' => ['Virtual Machine', 'Multitasking', 'Cloud Boot']
                    ],
                    [
                        'payload' => 'Sistem operasi yang dapat dijalankan langsung dari USB Flashdisk atau CD/DVD tanpa perlu diinstal ke harddisk disebut...',
                        'correct' => 'Live OS / Live USB',
                        'wrong' => ['Portable Apps', 'Virtual OS', 'Embedded OS']
                    ],
                    [
                        'payload' => 'Fitur keamanan pada motherboard berbasis UEFI yang mencegah sistem operasi atau perangkat lunak berbahaya (bootkit) dimuat saat proses booting dinamakan...',
                        'correct' => 'Secure Boot',
                        'wrong' => ['Fast Boot', 'Legacy Boot', 'Password Boot']
                    ],
                    [
                        'payload' => 'Lapisan perangkat lunak dalam OS Windows yang menyembunyikan detail perbedaan spesifikasi perangkat keras dari sistem operasi agar lebih mudah dikelola disebut...',
                        'correct' => 'HAL (Hardware Abstraction Layer)',
                        'wrong' => ['API (Application Programming Interface)', 'GUI (Graphical User Interface)', 'CLI (Command Line Interface)']
                    ],
                    [
                        'payload' => 'Dalam permission file Linux, hak akses bernilai `644` artinya adalah...',
                        'correct' => 'Owner bisa baca tulis (Read, Write), sedangkan Group dan Other hanya bisa baca (Read)',
                        'wrong' => ['Semua orang bisa mengeksekusi file', 'Hanya Owner yang bisa melihat file tersebut', 'Group bisa membaca dan menulis, selain itu tidak bisa']
                    ],
                    [
                        'payload' => 'Teknik membuat sebuah file (shortcut) di Linux yang menunjuk ke lokasi file atau folder aslinya (jika asli dihapus, shortcut mati) disebut...',
                        'correct' => 'Symbolic Link (Soft Link)',
                        'wrong' => ['Hard Link', 'Static Link', 'Dynamic Link']
                    ],
                    [
                        'payload' => 'Direktori root (`/`) dan direktori pengguna root (`/root`) di Linux adalah hal yang...',
                        'correct' => 'Berbeda; `/` adalah akar paling atas sistem, sedangkan `/root` adalah folder pribadi (home) milik akun superuser',
                        'wrong' => ['Sama persis', 'Keduanya berfungsi menyimpan aplikasi', 'Keduanya adalah virtual memory']
                    ],
                    [
                        'payload' => 'Tanda dua titik berurutan (`..`) saat navigasi direktori (misal `cd ..`) berfungsi untuk...',
                        'correct' => 'Mundur/naik satu tingkat ke direktori induk (Parent Directory)',
                        'wrong' => ['Masuk ke direktori root', 'Membuka folder pengguna (home)', 'Menyembunyikan direktori tersebut']
                    ],
                    [
                        'payload' => 'Sistem operasi ringan buatan Google yang dirancang khusus untuk bekerja utamanya dengan aplikasi web dan penyimpanan cloud adalah...',
                        'correct' => 'Chrome OS',
                        'wrong' => ['Android', 'Fuchsia', 'WebOS']
                    ],
                    [
                        'payload' => 'Sistem operasi mobile iOS milik Apple dibangun menggunakan pondasi dasar (core) yang dinamakan...',
                        'correct' => 'Darwin (Berbasis Unix)',
                        'wrong' => ['Linux', 'Windows CE', 'Symbian']
                    ],
                    [
                        'payload' => 'Istilah sistem operasi untuk arsitektur perangkat keras yang memiliki lebih dari satu CPU (Processor) fisik untuk mengerjakan tugas secara paralel adalah...',
                        'correct' => 'Multiprocessing OS',
                        'wrong' => ['Multitasking OS', 'Multithreading OS', 'Batch OS']
                    ],
                    [
                        'payload' => 'Program bawaan (daemon) yang mengatur antrean dokumen yang dikirim oleh pengguna ke printer agar dicetak secara berurutan disebut...',
                        'correct' => 'Print Spooler',
                        'wrong' => ['Task Scheduler', 'Print Screen', 'Device Manager']
                    ],
                    [
                        'payload' => 'Kondisi buruk di mana OS lebih sibuk melakukan proses pemindahan data (Swapping/Paging) dari RAM ke Harddisk bolak-balik daripada mengeksekusi program, akibat RAM terlalu kecil, disebut...',
                        'correct' => 'Thrashing',
                        'wrong' => ['Deadlock', 'Fragmentation', 'Starvation']
                    ],
                    [
                        'payload' => 'Protokol yang digunakan oleh perintah `ping` untuk mengirim pesan "Echo Request" dan menerima "Echo Reply" adalah...',
                        'correct' => 'ICMP (Internet Control Message Protocol)',
                        'wrong' => ['TCP', 'UDP', 'HTTP']
                    ],
                    [
                        'payload' => 'Perintah untuk melacak jalur (rute) lompatan router jaringan yang dilewati paket data dari komputer kita menuju server tujuan adalah...',
                        'correct' => 'tracert (Windows) / traceroute (Linux)',
                        'wrong' => ['nslookup', 'netstat', 'ipconfig']
                    ],
                    [
                        'payload' => 'Format file paket instalasi perangkat lunak standar yang digunakan oleh distro Linux turunan Red Hat (seperti Fedora, CentOS) menggunakan ekstensi...',
                        'correct' => '.rpm',
                        'wrong' => ['.deb', '.tar.gz', '.pkg']
                    ],
                    [
                        'payload' => 'Sedangkan distro Linux turunan Debian (seperti Ubuntu, Linux Mint) menggunakan format file paket instalasi dengan ekstensi...',
                        'correct' => '.deb',
                        'wrong' => ['.rpm', '.exe', '.sh']
                    ],
                    [
                        'payload' => 'Perintah CLI pada Linux yang umum digunakan untuk mengunduh file secara langsung dari internet melalui protokol HTTP/FTP adalah...',
                        'correct' => 'wget (atau curl)',
                        'wrong' => ['apt-get download', 'fetch', 'pull']
                    ],
                    [
                        'payload' => 'Utilitas administrasi di OS Windows yang mencatat seluruh log sistem (informasi, peringatan, error program) agar mudah didiagnosa disebut...',
                        'correct' => 'Event Viewer',
                        'wrong' => ['Task Manager', 'Control Panel', 'System Configuration']
                    ],
                    [
                        'payload' => 'Alat Windows yang berfungsi mengatur hak akses, pembatasan fitur, dan kebijakan (policy) sistem untuk satu atau banyak pengguna (biasanya diakses lewat gpedit.msc) adalah...',
                        'correct' => 'Local Group Policy Editor',
                        'wrong' => ['Registry Editor', 'Device Manager', 'Computer Management']
                    ],
                    [
                        'payload' => 'Perintah Linux `ls -l` berfungsi untuk menampilkan isi direktori dalam format panjang. Hal yang TIDAK ditampilkan oleh perintah ini adalah...',
                        'correct' => 'Isi teks di dalam file tersebut',
                        'wrong' => ['Hak akses (Permission) file', 'Pemilik dan Grup (Owner & Group)', 'Ukuran dan tanggal modifikasi file']
                    ],
                    [
                        'payload' => 'Perbedaan perintah `su` dan `sudo` di Linux adalah...',
                        'correct' => '`su` memindahkan sesi menjadi user root, sedangkan `sudo` mengeksekusi satu perintah sebagai root tanpa pindah user',
                        'wrong' => ['Keduanya persis sama tanpa perbedaan', '`sudo` hanya untuk Windows', '`su` menghapus user, `sudo` menambah user']
                    ],
                    [
                        'payload' => 'Perintah terminal Linux yang digunakan untuk mengecek sisa kapasitas ruang kosong (Storage/Harddisk) pada sistem adalah...',
                        'correct' => 'df -h',
                        'wrong' => ['free -m', 'du -sh', 'top']
                    ],
                    [
                        'payload' => 'Sedangkan perintah untuk melihat sisa kapasitas RAM yang sedang digunakan di Linux adalah...',
                        'correct' => 'free -m',
                        'wrong' => ['df -h', 'ramstat', 'meminfo']
                    ],
                    [
                        'payload' => 'Perintah di Linux untuk menampilkan informasi detail terkait nama kernel, nama hostname mesin, dan arsitektur OS adalah...',
                        'correct' => 'uname (atau uname -a)',
                        'wrong' => ['systeminfo', 'whoami', 'sysctl']
                    ],
                    [
                        'payload' => 'Proses pengecekan perangkat keras primer secara cepat (seperti RAM, Keyboard) yang dilakukan oleh BIOS saat komputer pertama kali dinyalakan disebut...',
                        'correct' => 'POST (Power-On Self-Test)',
                        'wrong' => ['Bootstrapping', 'Formatting', 'Checksum']
                    ],
                    [
                        'payload' => 'Baterai kecil berbentuk koin di motherboard komputer (CMOS Battery) berfungsi untuk...',
                        'correct' => 'Menjaga chip BIOS/RTC tetap hidup untuk menyimpan waktu dan pengaturan dasar saat komputer mati',
                        'wrong' => ['Menyuplai listrik utama ke prosesor', 'Menyimpan data harddisk', 'Mempercepat putaran kipas']
                    ],
                    [
                        'payload' => 'Area di sudut bilah tugas (Taskbar) Windows yang menampilkan jam, ikon speaker, jaringan, dan aplikasi latar belakang disebut...',
                        'correct' => 'System Tray / Notification Area',
                        'wrong' => ['Start Menu', 'Quick Launch', 'Action Center']
                    ],
                    [
                        'payload' => 'Sistem operasi dikembangkan pertama kali (generasi awal sekitar tahun 1950-an) belum memiliki OS sejati dan interaksi manusia-komputer dilakukan secara langsung dengan bahasa mesin. Era ini disebut era...',
                        'correct' => 'Generasi Pertama (Vacuum Tubes & Plugboards)',
                        'wrong' => ['Generasi Kedua (Transistor & Batch OS)', 'Generasi Ketiga (IC & Multiprogramming)', 'Generasi Keempat (PC)']
                    ],
                    [
                        'payload' => 'Jika kita menginstal aplikasi secara sembarangan di Windows dan tiba-tiba banyak ikon aneh bermunculan di browser serta internet menjadi lambat, sistem kemungkinan terkena...',
                        'correct' => 'Malware / Adware',
                        'wrong' => ['Bad Sector', 'Fragmentasi RAM', 'Update gagal']
                    ],
                    [
                        'payload' => 'Perintah `whoami` pada Command Prompt atau terminal Linux digunakan untuk...',
                        'correct' => 'Menampilkan nama pengguna (username) yang sedang aktif / login saat ini',
                        'wrong' => ['Menampilkan IP Address', 'Menampilkan versi sistem operasi', 'Menampilkan daftar orang yang pernah login']
                    ],
                    [
                        'payload' => 'Apa fungsi utama dari tombol pintasan Windows (Win) + R ?',
                        'correct' => 'Membuka dialog "Run" untuk mengeksekusi program atau membuka path secara cepat',
                        'wrong' => ['Mengunci komputer (Lock screen)', 'Membuka layar pencarian file', 'Merestart komputer (Reboot)']
                    ],
                    [
                        'payload' => 'Apa yang membedakan OS Server (seperti Windows Server atau Ubuntu Server) dibandingkan dengan OS Desktop?',
                        'correct' => 'OS Server dioptimalkan untuk performa jaringan, stabilitas layanan non-stop, dan umumnya tidak mementingkan antarmuka grafis',
                        'wrong' => ['OS Server digunakan khusus untuk bermain game', 'OS Server hanya bisa dijalankan lewat Flashdisk', 'OS Server tidak butuh RAM']
                    ],
                    [
                        'payload' => 'Ekstensi file skrip batch pada OS Windows yang bisa dieksekusi otomatis oleh Command Prompt adalah...',
                        'correct' => '.bat / .cmd',
                        'wrong' => ['.sh', '.vbs', '.py']
                    ],
                    [
                        'payload' => 'Sementara ekstensi skrip (Shell Script) yang umum digunakan untuk otomatisasi pada sistem Linux adalah...',
                        'correct' => '.sh',
                        'wrong' => ['.bat', '.cmd', '.exe']
                    ],
                    [
                        'payload' => 'Di Windows, jika suatu program mengalami *Not Responding* dan tidak bisa ditutup lewat tombol X merah, cara paling efektif mematikannya adalah lewat...',
                        'correct' => 'Task Manager -> klik kanan program -> End Task',
                        'wrong' => ['Registry Editor -> Delete', 'Mencabut kabel power CPU', 'Mendelete shortcut aplikasi di desktop']
                    ],
                    [
                        'payload' => 'Komponen antarmuka pengguna pada sistem operasi yang bertindak mengonversi teks perintah yang diketik menjadi sistem call (contoh: CMD, Bash, PowerShell) secara umum disebut...',
                        'correct' => 'Command Interpreter / Shell',
                        'wrong' => ['Kernel', 'Graphical Driver', 'Text Editor']
                    ],
                    [
                        'payload' => 'Kesimpulan utama dari peran Sistem Operasi dalam dunia komputasi adalah...',
                        'correct' => 'Sistem operasi adalah jembatan vital penghubung antara hardware dan software serta pengguna',
                        'wrong' => ['Sistem operasi hanya diperlukan jika kita ingin memakai mouse', 'Sistem operasi adalah virus yang memperlambat komputer', 'Tanpa OS, Microsoft Office masih bisa dibuka manual']
                    ]
                ]
            ],
            'Desain Grafis' => [
                'description' => 'Mata pelajaran dasar-dasar desain, tipografi, dan pengolahan gambar.',
                'questions' => [
                    [
                        'payload' => 'Gambar digital yang dibentuk oleh susunan titik-titik warna atau pixel yang memiliki resolusi tetap disebut...',
                        'correct' => 'Grafis Bitmap (Raster)',
                        'wrong' => ['Grafis Vektor', 'Grafis 3D', 'Animasi']
                    ],
                    [
                        'payload' => 'Gambar digital yang dibentuk menggunakan perhitungan matematis berupa garis dan kurva, yang tidak akan pecah saat diperbesar, disebut...',
                        'correct' => 'Grafis Vektor',
                        'wrong' => ['Grafis Bitmap', 'Grafis Pixel', 'Grafis Raster']
                    ],
                    [
                        'payload' => 'Mode warna standar yang digunakan untuk tampilan di layar monitor, web, dan perangkat digital adalah...',
                        'correct' => 'RGB (Red, Green, Blue)',
                        'wrong' => ['CMYK (Cyan, Magenta, Yellow, Key)', 'Grayscale', 'Pantone']
                    ],
                    [
                        'payload' => 'Mode warna yang wajib digunakan jika desain grafis ditujukan untuk proses cetak (printing) ke media fisik (seperti kertas/banner) adalah...',
                        'correct' => 'CMYK',
                        'wrong' => ['RGB', 'Hexadecimal', 'Lab Color']
                    ],
                    [
                        'payload' => 'Perangkat lunak (software) standar industri yang paling umum digunakan untuk memanipulasi gambar atau foto berbasis bitmap adalah...',
                        'correct' => 'Adobe Photoshop',
                        'wrong' => ['Adobe Illustrator', 'CorelDraw', 'Adobe InDesign']
                    ],
                    [
                        'payload' => 'Perangkat lunak standar industri yang paling umum digunakan untuk membuat desain logo dan ilustrasi berbasis vektor adalah...',
                        'correct' => 'Adobe Illustrator / CorelDraw',
                        'wrong' => ['Adobe Photoshop', 'Adobe Premiere Pro', 'Adobe After Effects']
                    ],
                    [
                        'payload' => 'Dalam tipografi, font yang memiliki "kait" atau garis kecil di ujung-ujung hurufnya (seperti Times New Roman) termasuk dalam jenis...',
                        'correct' => 'Serif',
                        'wrong' => ['Sans-Serif', 'Script', 'Dekoratif']
                    ],
                    [
                        'payload' => 'Sedangkan font yang bentuk hurufnya polos tanpa kait di ujung hurufnya (seperti Arial, Helvetica) termasuk dalam jenis...',
                        'correct' => 'Sans-Serif',
                        'wrong' => ['Serif', 'Monospace', 'Handwriting']
                    ],
                    [
                        'payload' => 'Pengaturan jarak (spasi) horizontal antara satu huruf dengan huruf lainnya secara spesifik (pada dua huruf yang berdekatan) disebut...',
                        'correct' => 'Kerning',
                        'wrong' => ['Tracking', 'Leading', 'Spacing']
                    ],
                    [
                        'payload' => 'Pengaturan jarak spasi horizontal untuk seluruh kumpulan huruf dalam satu kata atau kalimat secara keseluruhan disebut...',
                        'correct' => 'Tracking',
                        'wrong' => ['Kerning', 'Leading', 'Alignment']
                    ],
                    [
                        'payload' => 'Pengaturan jarak vertikal antar baris teks (jarak antara baris pertama dan baris di bawahnya) dinamakan...',
                        'correct' => 'Leading',
                        'wrong' => ['Tracking', 'Kerning', 'Paragraph Space']
                    ],
                    [
                        'payload' => 'Format file gambar grafis yang sangat direkomendasikan karena mendukung transparansi latar belakang adalah...',
                        'correct' => 'PNG (Portable Network Graphics)',
                        'wrong' => ['JPG / JPEG', 'BMP', 'TIFF']
                    ],
                    [
                        'payload' => 'Format file standar vektor untuk penggunaan di web agar logo atau ikon tetap tajam dan ukurannya kecil adalah...',
                        'correct' => 'SVG (Scalable Vector Graphics)',
                        'wrong' => ['PNG', 'GIF', 'JPEG']
                    ],
                    [
                        'payload' => 'Dalam desain percetakan, area lebihan desain di luar garis potong yang berfungsi untuk mengantisipasi melesetnya mesin potong kertas dinamakan...',
                        'correct' => 'Bleed',
                        'wrong' => ['Margin', 'Crop Mark', 'Safe Zone']
                    ],
                    [
                        'payload' => 'Sebutan untuk elemen kosong atau ruang tak terpakai di antara objek-objek desain, yang berfungsi memberikan "ruang bernapas" agar desain tidak sumpek adalah...',
                        'correct' => 'White Space (Negative Space)',
                        'wrong' => ['Positive Space', 'Margin Area', 'Bleed Area']
                    ],
                    [
                        'payload' => 'Warna dasar yang tidak dapat dihasilkan dari campuran warna lain (Merah, Kuning, Biru pada seni rupa) disebut warna...',
                        'correct' => 'Primer',
                        'wrong' => ['Sekunder', 'Tersier', 'Komplementer']
                    ],
                    [
                        'payload' => 'Warna yang dihasilkan dari campuran dua warna primer dengan proporsi yang sama (misal Kuning + Merah = Oranye) disebut warna...',
                        'correct' => 'Sekunder',
                        'wrong' => ['Tersier', 'Analog', 'Netral']
                    ],
                    [
                        'payload' => 'Berdasarkan roda warna (Color Wheel), dua warna yang posisinya saling berseberangan secara berhadapan (misal Merah dan Hijau) disebut warna...',
                        'correct' => 'Komplementer',
                        'wrong' => ['Analog (Analogous)', 'Monokromatik', 'Triadik']
                    ],
                    [
                        'payload' => 'Kombinasi warna yang posisinya saling bersebelahan di dalam roda warna, sehingga menciptakan harmoni yang nyaman dipandang dinamakan skema warna...',
                        'correct' => 'Analog (Analogous)',
                        'wrong' => ['Komplementer', 'Split Komplementer', 'Tetradik']
                    ],
                    [
                        'payload' => 'Skema warna yang hanya menggunakan satu dasar warna (hue) namun divariasikan tingkat gelap-terangnya (tints dan shades) disebut skema...',
                        'correct' => 'Monokromatik',
                        'wrong' => ['Achromatic', 'Analogous', 'Polychromatic']
                    ],
                    [
                        'payload' => 'Teknik membuat perpindahan yang halus dari satu warna ke warna lainnya secara berangsur-angsur dalam suatu area desain dinamakan...',
                        'correct' => 'Gradasi (Gradient)',
                        'wrong' => ['Opacity', 'Blending', 'Drop Shadow']
                    ],
                    [
                        'payload' => 'Istilah untuk tingkat kepekatan atau transparansi sebuah objek desain di Photoshop/Illustrator dinamakan...',
                        'correct' => 'Opacity',
                        'wrong' => ['Saturation', 'Brightness', 'Contrast']
                    ],
                    [
                        'payload' => 'Sebuah konsep di Photoshop di mana elemen desain ditumpuk seperti lembaran kaca transparan, memungkinkan kita mengedit bagian tertentu tanpa merusak bagian lain, adalah konsep...',
                        'correct' => 'Layer',
                        'wrong' => ['Artboard', 'Masking', 'Filter']
                    ],
                    [
                        'payload' => 'Teknik menyembunyikan sebagian area pada Layer tanpa harus menghapus gambar aslinya (bersifat non-destructive) di Photoshop dinamakan...',
                        'correct' => 'Layer Mask / Masking',
                        'wrong' => ['Eraser', 'Crop', 'Clone Stamp']
                    ],
                    [
                        'payload' => 'Tool pada Photoshop yang berfungsi memotong tepi atau menghilangkan bagian luar gambar yang tidak diinginkan adalah...',
                        'correct' => 'Crop Tool',
                        'wrong' => ['Slice Tool', 'Move Tool', 'Marquee Tool']
                    ],
                    [
                        'payload' => 'Tool di Photoshop atau Illustrator yang bentuknya menyerupai pipet, berfungsi untuk mengambil/menyalin sampel warna dari sebuah objek adalah...',
                        'correct' => 'Eyedropper Tool',
                        'wrong' => ['Paint Bucket Tool', 'Brush Tool', 'Magic Wand Tool']
                    ],
                    [
                        'payload' => 'Tool seleksi pada Photoshop yang secara otomatis menyeleksi area berdasar kesamaan warna yang berdekatan dengan sekali klik adalah...',
                        'correct' => 'Magic Wand Tool',
                        'wrong' => ['Lasso Tool', 'Pen Tool', 'Marquee Tool']
                    ],
                    [
                        'payload' => 'Tool presisi di Photoshop dan Illustrator yang menggunakan konsep *Bezier Curve* dan titik tumpu (*anchor points*) untuk membuat garis/seleksi yang rapi adalah...',
                        'correct' => 'Pen Tool',
                        'wrong' => ['Pencil Tool', 'Brush Tool', 'Lasso Tool']
                    ],
                    [
                        'payload' => 'Tool di Photoshop yang berfungsi menyalin tekstur/gambar dari satu area dan menerapkannya (mengecapnya) ke area lain untuk menutupi cacat/objek adalah...',
                        'correct' => 'Clone Stamp Tool',
                        'wrong' => ['Eraser Tool', 'Healing Brush Tool', 'Smudge Tool']
                    ],
                    [
                        'payload' => 'Shortcut umum di hampir semua software grafis untuk melakukan Undo (membatalkan perintah terakhir) adalah kombinasi tombol...',
                        'correct' => 'Ctrl + Z (Cmd + Z di Mac)',
                        'wrong' => ['Ctrl + S', 'Ctrl + C', 'Ctrl + X']
                    ],
                    [
                        'payload' => 'Prinsip desain yang mengutamakan tingkat perbedaan visual (seperti gelap vs terang, besar vs kecil) agar desain lebih menarik dan terbaca dinamakan...',
                        'correct' => 'Kontras (Contrast)',
                        'wrong' => ['Kesatuan (Unity)', 'Keseimbangan (Balance)', 'Irama (Rhythm)']
                    ],
                    [
                        'payload' => 'Prinsip tata letak di mana elemen-elemen diletakkan sedemikian rupa agar mata pembaca diarahkan pada informasi yang paling penting terlebih dahulu disebut...',
                        'correct' => 'Hierarki Visual (Visual Hierarchy)',
                        'wrong' => ['Keseimbangan Simetris', 'Pengulangan (Repetition)', 'Alignment']
                    ],
                    [
                        'payload' => 'Sebuah komposisi desain di mana bobot visual di sisi kiri dan kanan (atau atas bawah) sama persis seperti dicerminkan, disebut keseimbangan...',
                        'correct' => 'Simetris (Symmetrical Balance)',
                        'wrong' => ['Asimetris', 'Radial', 'Dinamic']
                    ],
                    [
                        'payload' => 'Titik terkecil pada layar monitor atau gambar digital yang menyusun sebuah gambar raster/bitmap disebut...',
                        'correct' => 'Pixel (Picture Element)',
                        'wrong' => ['Point', 'Pica', 'Inch']
                    ],
                    [
                        'payload' => 'Satuan resolusi gambar yang merujuk pada jumlah titik tinta dalam satu inci cetakan mesin print adalah singkatan dari...',
                        'correct' => 'DPI (Dots Per Inch)',
                        'wrong' => ['PPI (Pixels Per Inch)', 'LPI (Lines Per Inch)', 'CPI (Color Per Inch)']
                    ],
                    [
                        'payload' => 'Dalam pembuatan desain grafis yang ditujukan untuk percetakan berkualitas tinggi (High-Quality Print), resolusi standar yang diwajibkan adalah sebesar...',
                        'correct' => '300 DPI / PPI',
                        'wrong' => ['72 DPI', '150 DPI', '96 DPI']
                    ],
                    [
                        'payload' => 'Sedangkan untuk desain grafis yang hanya akan ditampilkan pada layar digital (seperti postingan Instagram atau web), resolusi yang ideal dan efisien adalah...',
                        'correct' => '72 DPI / PPI',
                        'wrong' => ['300 DPI', '600 DPI', '100 DPI']
                    ],
                    [
                        'payload' => 'Jenis desain logo yang elemen utamanya hanya berupa tulisan/nama brand dengan font yang dikustomisasi tanpa tambahan simbol/ikon dinamakan...',
                        'correct' => 'Logotype (Wordmark)',
                        'wrong' => ['Logogram (Pictorial Mark)', 'Emblem', 'Mascot']
                    ],
                    [
                        'payload' => 'Sedangkan desain logo yang elemen utamanya hanya berupa simbol ikonik atau gambar grafis tanpa menyertakan teks disebut...',
                        'correct' => 'Logogram (Pictorial Mark / Brandmark)',
                        'wrong' => ['Logotype', 'Lettermark', 'Abstract Mark']
                    ],
                    [
                        'payload' => 'Presentasi visual tiga dimensi buatan yang digunakan desainer untuk mendemonstrasikan bagaimana desain 2D mereka (seperti logo/kemasan) akan terlihat di dunia nyata disebut...',
                        'correct' => 'Mockup',
                        'wrong' => ['Wireframe', 'Prototype', 'Sketch']
                    ],
                    [
                        'payload' => 'Kerangka garis besar hitam putih (blueprint) dari desain UI/UX aplikasi atau website yang hanya menampilkan penempatan tata letak elemen disebut...',
                        'correct' => 'Wireframe',
                        'wrong' => ['Mockup', 'Prototype', 'Final Design']
                    ],
                    [
                        'payload' => 'Warna dalam mode CMYK dibentuk berdasarkan pencampuran tinta cetak. Kepanjangan dari hurup "K" dalam CMYK adalah...',
                        'correct' => 'Key (Black / Hitam)',
                        'wrong' => ['Kryton', 'Kelvin', 'Kroma']
                    ],
                    [
                        'payload' => 'Format file *mentah* asli dari Adobe Photoshop yang menyimpan seluruh Layer, Mask, dan efek tanpa dikompres adalah...',
                        'correct' => '.PSD',
                        'wrong' => ['.AI', '.CDR', '.EPS']
                    ],
                    [
                        'payload' => 'Format file asli/mentah standar industri dari Adobe Illustrator adalah...',
                        'correct' => '.AI',
                        'wrong' => ['.PSD', '.INDD', '.CDR']
                    ],
                    [
                        'payload' => 'Format file dari software CorelDraw secara default memiliki ekstensi...',
                        'correct' => '.CDR',
                        'wrong' => ['.AI', '.EPS', '.DWG']
                    ],
                    [
                        'payload' => 'Sebuah tanda (biasanya semi-transparan) yang ditempatkan pada karya digital untuk melindungi hak cipta dan mencegah pencurian gambar disebut...',
                        'correct' => 'Watermark',
                        'wrong' => ['Trademark', 'Copyright', 'Patent']
                    ],
                    [
                        'payload' => 'Dalam desain kemasan atau brosur, garis panduan bantu (guideline) di aplikasi grafis yang tidak akan ikut tercetak berfungsi untuk memastikan...',
                        'correct' => 'Penempatan Layout (Alignment) dan Margin aman',
                        'wrong' => ['Warna cetakan menjadi lebih cerah', 'Menghemat tinta printer', 'Mengubah resolusi gambar']
                    ],
                    [
                        'payload' => 'Pekerjaan merancang tata letak elemen visual berupa teks, gambar, dan bentuk dalam halaman media cetak (majalah/koran) sangat mengandalkan software...',
                        'correct' => 'Adobe InDesign',
                        'wrong' => ['Adobe Premiere', 'Adobe Lightroom', 'Adobe After Effects']
                    ],
                    [
                        'payload' => 'Dalam tipografi, kumpulan semua karakter, huruf, angka, dan simbol yang memiliki gaya dan desain dasar yang konsisten dalam satu keluarga dinamakan...',
                        'correct' => 'Typeface',
                        'wrong' => ['Font Size', 'Paragraph', 'Typographic Scale']
                    ],
                    [
                        'payload' => 'Prinsip mengulang-ulang elemen yang sama (seperti pola warna, bentuk garis, atau font) secara konsisten di seluruh bagian karya desain disebut prinsip...',
                        'correct' => 'Pengulangan (Repetition / Konsistensi)',
                        'wrong' => ['Variasi (Variation)', 'Proporsi (Proportion)', 'Kontras (Contrast)']
                    ],
                    [
                        'payload' => 'Dalam istilah tipografi profesional, perbedaan yang tepat antara Font dan Typeface adalah...',
                        'correct' => 'Typeface adalah desain keluarganya (misal Arial), sedangkan Font adalah versi spesifiknya (misal Arial Bold 12pt)',
                        'wrong' => ['Font adalah ukurannya, Typeface adalah warnanya', 'Font hanya untuk angka, Typeface untuk huruf', 'Tidak ada bedanya sama sekali']
                    ],
                    [
                        'payload' => 'Efek visual pada software grafis yang berfungsi untuk memberikan bayangan jatuh di belakang sebuah objek agar terlihat berdimensi disebut...',
                        'correct' => 'Drop Shadow',
                        'wrong' => ['Outer Glow', 'Inner Shadow', 'Bevel and Emboss']
                    ],
                    [
                        'payload' => 'Pada pengaturan nilai mode warna RGB (Red, Green, Blue), apabila ketiga nilai diatur maksimum (255, 255, 255), maka akan menghasilkan warna...',
                        'correct' => 'Putih',
                        'wrong' => ['Hitam', 'Abu-abu', 'Merah Gelap']
                    ],
                    [
                        'payload' => 'Sebaliknya, pada mode warna RGB, jika ketiga nilainya berada di angka minimum (0, 0, 0), maka akan menghasilkan warna...',
                        'correct' => 'Hitam',
                        'wrong' => ['Putih', 'Abu-abu', 'Transparan']
                    ],
                    [
                        'payload' => 'Proses mengubah atau merender gambar berbasis vektor menjadi gambar bitmap (raster) disebut dengan proses...',
                        'correct' => 'Rasterize',
                        'wrong' => ['Vectorize', 'Rendering', 'Tracing']
                    ],
                    [
                        'payload' => 'Sebaliknya, proses mengubah gambar bitmap secara otomatis menjadi garis vektor di Adobe Illustrator dinamakan fitur...',
                        'correct' => 'Image Trace',
                        'wrong' => ['Rasterize', 'Pathfinder', 'Clipping Mask']
                    ],
                    [
                        'payload' => 'Pengaturan dasar pada foto yang berfungsi untuk menambah atau mengurangi tingkat intensitas cahaya keseluruhan (terang/gelap) disebut...',
                        'correct' => 'Brightness',
                        'wrong' => ['Contrast', 'Saturation', 'Hue']
                    ],
                    [
                        'payload' => 'Pada software Adobe Illustrator dan Photoshop, fitur yang digunakan untuk memasukkan suatu gambar ke dalam batas bentuk tertentu (misal foto di dalam lingkaran) disebut...',
                        'correct' => 'Clipping Mask',
                        'wrong' => ['Layer Mask', 'Quick Mask', 'Vector Mask']
                    ],
                    [
                        'payload' => 'Format file gambar yang mampu menyimpan rangkaian banyak frame sehingga dapat menghasilkan animasi bergerak berdurasi pendek tanpa suara adalah...',
                        'correct' => 'GIF (Graphics Interchange Format)',
                        'wrong' => ['PNG', 'JPEG', 'TIFF']
                    ],
                    [
                        'payload' => 'Efek visual yang membuat tepi dari sebuah bentuk/objek 2D terlihat menonjol timbul ke luar atau tenggelam layaknya objek 3D ukiran dinamakan efek...',
                        'correct' => 'Bevel & Emboss',
                        'wrong' => ['Drop Shadow', 'Gradient Overlay', 'Stroke']
                    ],
                    [
                        'payload' => 'Di dalam software vektor seperti Illustrator atau CorelDraw, garis tepi luar pembatas sebuah bentuk (shape) disebut...',
                        'correct' => 'Stroke / Outline',
                        'wrong' => ['Fill', 'Path', 'Anchor Point']
                    ],
                    [
                        'payload' => 'Sedangkan isian warna pada bagian dalam dari sebuah bentuk garis tertutup tersebut dinamakan...',
                        'correct' => 'Fill',
                        'wrong' => ['Stroke', 'Gradient', 'Solid']
                    ],
                    [
                        'payload' => 'Panel (jendela) berisi kotak-kotak kecil sampel warna tersimpan siap pakai yang sangat memudahkan pewarnaan konsisten dinamakan panel...',
                        'correct' => 'Swatches',
                        'wrong' => ['Layers', 'Color Picker', 'Properties']
                    ],
                    [
                        'payload' => 'Rasio aspek (perbandingan panjang dan lebar) kanvas standar yang paling umum saat ini untuk video widescreen YouTube dan presentasi layar lebar adalah...',
                        'correct' => '16:9',
                        'wrong' => ['4:3', '1:1', '21:9']
                    ],
                    [
                        'payload' => 'Bidang desain yang sangat berfokus pada alur interaksi, kenyamanan, dan pengalaman pengguna saat memakai sebuah aplikasi disebut desain...',
                        'correct' => 'UX (User Experience)',
                        'wrong' => ['UI (User Interface)', 'Print Design', 'Branding Design']
                    ],
                    [
                        'payload' => 'Sedangkan bidang desain yang lebih fokus pada tata letak visual antarmuka aplikasinya (warna tombol, tipografi, estetika layar) disebut desain...',
                        'correct' => 'UI (User Interface)',
                        'wrong' => ['UX (User Experience)', 'Service Design', 'Motion Graphic']
                    ],
                    [
                        'payload' => 'Tool pada Photoshop yang dilambangkan dengan huruf "T", berfungsi untuk membuat dan mengedit tulisan/huruf adalah...',
                        'correct' => 'Type Tool / Text Tool',
                        'wrong' => ['Pen Tool', 'Move Tool', 'Lasso Tool']
                    ],
                    [
                        'payload' => 'Dalam kode pewarnaan Hexadesimal untuk desain antarmuka Web/UI, kode `#FFFFFF` merupakan representasi pasti dari warna...',
                        'correct' => 'Putih',
                        'wrong' => ['Hitam', 'Biru', 'Merah']
                    ],
                    [
                        'payload' => 'Sedangkan dalam pewarnaan Hexadesimal, kode `#000000` merupakan representasi dari warna...',
                        'correct' => 'Hitam',
                        'wrong' => ['Putih', 'Abu-abu', 'Hijau']
                    ],
                    [
                        'payload' => 'Prinsip tata letak komposisi (sering dipakai di fotografi dan desain grafis) yang membagi area kerja menjadi 9 kotak dengan 4 titik pertemuan sebagai titik fokus dinamakan...',
                        'correct' => 'Rule of Thirds (Aturan Sepertiga)',
                        'wrong' => ['Golden Ratio', 'Symmetry Center', 'Fibonacci Spiral']
                    ],
                    [
                        'payload' => 'Pemberian efek *Blur* (Gaussian Blur, Motion Blur) pada background sebuah objek utama bertujuan untuk...',
                        'correct' => 'Mengurangi fokus latar belakang sehingga objek utama terlihat menonjol (Depth of Field)',
                        'wrong' => ['Mempertajam teks', 'Meningkatkan ukuran file gambar', 'Menghapus latar belakang sepenuhnya']
                    ],
                    [
                        'payload' => 'Tindakan membalik sebuah gambar atau objek secara vertikal atau horizontal menyerupai pantulan cermin dinamakan fungsi...',
                        'correct' => 'Flip',
                        'wrong' => ['Rotate', 'Scale', 'Skew']
                    ],
                    [
                        'payload' => 'Di aplikasi CorelDraw, alat utama yang sangat presisi untuk membuat objek garis kurva secara bebas dari satu titik (node) ke titik lain adalah...',
                        'correct' => 'Bezier Tool',
                        'wrong' => ['Shape Tool', 'Pick Tool', 'Eraser Tool']
                    ],
                    [
                        'payload' => 'Representasi grafis kecil (piktogram) dalam desain antarmuka yang melambangkan program, fungsi, atau file (seperti gambar "Rumah" untuk beranda) dinamakan...',
                        'correct' => 'Ikon (Icon)',
                        'wrong' => ['Logo', 'Mascot', 'Thumbnail']
                    ],
                    [
                        'payload' => 'Tool pembuat seleksi batas gambar pada Photoshop yang unik karena garis seleksinya akan otomatis menempel (snap) pada tepi objek berdasar perbedaan kontras warnanya adalah...',
                        'correct' => 'Magnetic Lasso Tool',
                        'wrong' => ['Polygonal Lasso Tool', 'Magic Wand Tool', 'Rectangular Marquee Tool']
                    ],
                    [
                        'payload' => 'Teks standar berbahasa Latin tiruan yang tidak memiliki makna, digunakan sementara oleh desainer sebagai *placeholder* pada layout teks yang sesungguhnya belum siap dinamakan...',
                        'correct' => 'Lorem Ipsum',
                        'wrong' => ['Dummy Texting', 'Sans Serif Text', 'Vector Text']
                    ],
                    [
                        'payload' => 'Di Adobe Illustrator, tool interaktif super cepat untuk menggabungkan, menghapus, dan membagi bentuk-bentuk (shapes) yang saling tumpang tindih hanya dengan men-drag kursor di atasnya disebut...',
                        'correct' => 'Shape Builder Tool',
                        'wrong' => ['Pen Tool', 'Pathfinder Tool', 'Direct Selection Tool']
                    ],
                    [
                        'payload' => 'Sedangkan nama Panel/Jendela di Illustrator yang berisi sekumpulan opsi otomatis (seperti Unite, Minus Front, Intersect) untuk merekayasa bentuk objek tumpang tindih dinamakan...',
                        'correct' => 'Pathfinder',
                        'wrong' => ['Transform', 'Align', 'Gradient']
                    ],
                    [
                        'payload' => 'Alat pengukur berupa baris angka di pinggir kanvas (atas dan kiri) pada software grafis untuk membantu presisi posisi yang bisa dimunculkan dengan menekan `Ctrl + R` disebut...',
                        'correct' => 'Rulers',
                        'wrong' => ['Grid', 'Guides', 'Measurement Tool']
                    ],
                    [
                        'payload' => 'Area putih tempat kita mendesain dan menempatkan karya grafis pada Adobe Illustrator (serupa kanvas/lembar kerja) memiliki istilah resmi...',
                        'correct' => 'Artboard',
                        'wrong' => ['Workspace', 'Layer', 'Document']
                    ],
                    [
                        'payload' => 'Menurut elemen dasar desain grafis, pergerakan titik yang membentuk sebuah lintasan panjang dan memiliki arah disebut...',
                        'correct' => 'Garis (Line)',
                        'wrong' => ['Bidang (Shape)', 'Ruang (Space)', 'Tekstur (Texture)']
                    ],
                    [
                        'payload' => 'Dalam properti HSB (Hue, Saturation, Brightness), unsur *Saturation* mengontrol...',
                        'correct' => 'Intensitas, kemurnian, atau seberapa pucat/mencoloknya sebuah warna',
                        'wrong' => ['Jenis warna dasarnya (Merah, Kuning, dsb)', 'Tingkat kecerahan/cahaya', 'Tingkat transparansi warna']
                    ],
                    [
                        'payload' => 'Dalam pencampuran teori warna tradisional, jika warna murni (Hue) ditambahkan dengan unsur warna Putih, hasil variasi warna terangnya ini disebut...',
                        'correct' => 'Tint',
                        'wrong' => ['Shade', 'Tone', 'Shadow']
                    ],
                    [
                        'payload' => 'Sedangkan jika warna murni tersebut ditambahkan atau dicampur dengan unsur warna Hitam, sehingga menjadi lebih gelap, disebut...',
                        'correct' => 'Shade',
                        'wrong' => ['Tint', 'Tone', 'Highlight']
                    ],
                    [
                        'payload' => 'Jika Anda menumpuk 3 bentuk lingkaran (Layer) lalu ingin agar lingkaran yang posisinya paling belakang pindah seketika menjadi paling depan, perintah Arrange yang dipilih adalah...',
                        'correct' => 'Bring to Front',
                        'wrong' => ['Send to Back', 'Bring Forward', 'Send Backward']
                    ],
                    [
                        'payload' => 'Gaya desain grafis kekinian yang menonjolkan kesederhanaan ekstrim, ruang kosong (white space), membuang dekorasi ramai, dan mengedepankan fungsionalitas lazim disebut gaya desain...',
                        'correct' => 'Minimalis',
                        'wrong' => ['Retro / Vintage', 'Cyberpunk', 'Gothic']
                    ],
                    [
                        'payload' => 'Tren gaya desain User Interface (UI) yang menghilangkan tekstur 3D, bayangan, atau gradasi rumit dan benar-benar memakai warna datar solid (populer sejak iOS 7 dan Windows 8) disebut...',
                        'correct' => 'Flat Design',
                        'wrong' => ['Skeuomorphism', 'Neumorphism', 'Material Design']
                    ],
                    [
                        'payload' => 'Alat masukan komputer (Input Device) favorit para desainer dan ilustrator grafis berupa pad elektronik dan pena khusus yang sangat sensitif terhadap tekanan (pressure) dinamakan...',
                        'correct' => 'Graphic Tablet / Pen Tablet',
                        'wrong' => ['Trackball', 'Joystick', 'Scanner']
                    ],
                    [
                        'payload' => 'Perangkat lunak editor grafis bitmap yang bersifat bebas hambatan lisensi, gratis (Open Source), dan sering digunakan di OS Linux sebagai alternatif Photoshop adalah...',
                        'correct' => 'GIMP (GNU Image Manipulation Program)',
                        'wrong' => ['Krita', 'Inkscape', 'Blender']
                    ],
                    [
                        'payload' => 'Sedangkan software grafis vektor Open Source, gratis, dan andal yang sering menjadi pengganti Adobe Illustrator untuk mengolah file SVG adalah...',
                        'correct' => 'Inkscape',
                        'wrong' => ['GIMP', 'CorelDraw', 'Affinity Designer']
                    ],
                    [
                        'payload' => 'Format file khusus atau asali (native format) yang dihasilkan saat menyimpan proyek dokumen kerja menggunakan Adobe InDesign adalah...',
                        'correct' => '.INDD',
                        'wrong' => ['.PSD', '.AI', '.PDF']
                    ],
                    [
                        'payload' => 'Salah satu alasan rasional mengapa baliho atau billboard raksasa di jalan raya dicetak dengan resolusi sangat rendah (kurang dari 72 dpi) adalah...',
                        'correct' => 'Karena dilihat dari jarak yang sangat jauh, mata manusia tidak lagi melihat detail pixel tersebut',
                        'wrong' => ['Karena mesin tidak kuat mencetak warna tinggi', 'Agar file tidak bisa dicopy orang', 'Kertas banner tidak menyerap tinta 300 dpi']
                    ],
                    [
                        'payload' => 'Mengapa standar profesional industri mewajibkan mendesain logo perusahaan harus berbasis Vektor, bukan Bitmap?',
                        'correct' => 'Agar kualitas logo tetap tajam sempurna walaupun diperbesar seukuran gedung maupun diperkecil untuk ikon favicon website',
                        'wrong' => ['Agar warna logonya bisa menyala di kegelapan', 'Karena logo berbasis vektor lebih berat filenya', 'Sebab vektor mudah terserang virus']
                    ],
                    [
                        'payload' => 'Pada Adobe Photoshop, Shortcut menekan `Ctrl + T` (atau `Cmd + T`) pada layer berfungsi untuk memunculkan mode...',
                        'correct' => 'Free Transform (Untuk mengubah ukuran skala, merotasi, atau mendistorsi objek)',
                        'wrong' => ['Type Text (Untuk mengetik)', 'Trim Object (Memotong otomatis)', 'Testing Mode']
                    ],
                    [
                        'payload' => 'Bentuk format perataan paragraf (Alignment) yang membuat garis teks di tepi kiri maupun tepi kanan seimbang, rata lurus seperti kotak buku disebut...',
                        'correct' => 'Justify (Rata Kiri-Kanan)',
                        'wrong' => ['Align Left', 'Align Right', 'Center']
                    ],
                    [
                        'payload' => 'Dalam desain cetak komersial, istilah kalibrasi monitor sangat penting dilakukan dengan tujuan...',
                        'correct' => 'Menyamakan tampilan warna desain yang ada di monitor dengan hasil warna mesin cetak agar tidak belang (melenceng)',
                        'wrong' => ['Memperpanjang umur monitor', 'Mengubah resolusi dari vektor ke raster', 'Memperbesar resolusi warna piksel']
                    ],
                    [
                        'payload' => 'Dalam komposisi warna, warna *Grayscale* didefinisikan sebagai kombinasi tingkatan dari warna dasar...',
                        'correct' => 'Hanya warna Hitam, Abu-abu, dan Putih (Tanpa warna Hue lain)',
                        'wrong' => ['Merah, Kuning, Biru', 'Hijau tua dan Hijau muda', 'Hanya warna primer saja']
                    ],
                    [
                        'payload' => 'Tool pada Photoshop yang biasa dipakai untuk memperbaiki area kecil wajah (seperti jerawat atau noda kulit) dengan mencocokkan tekstur sekitarnya secara otomatis adalah...',
                        'correct' => 'Spot Healing Brush Tool',
                        'wrong' => ['Eraser Tool', 'Red Eye Tool', 'Blur Tool']
                    ],
                    [
                        'payload' => 'Pada software layout/publishing (InDesign), istilah untuk huruf pertama dalam awal paragraf yang sengaja dibuat sangat besar mencakup beberapa baris ke bawah dinamakan...',
                        'correct' => 'Drop Cap',
                        'wrong' => ['Bold Text', 'Headline', 'Title Case']
                    ],
                    [
                        'payload' => 'Format file dokumen elektronik standar PDF ciptaan Adobe yang sangat populer untuk bertukar file siap cetak adalah kepanjangan dari...',
                        'correct' => 'Portable Document Format',
                        'wrong' => ['Print Design Format', 'Pixel Direct File', 'Page Description Format']
                    ],
                    [
                        'payload' => 'Proporsi matematis sempurna yang sering ditemukan di alam dan sangat sering digunakan dalam komposisi seni atau desain logo (misal logo Apple), dengan rasio 1:1.618 disebut...',
                        'correct' => 'Golden Ratio (Rasio Emas)',
                        'wrong' => ['Rule of Thirds', 'Fibonacci Spiral', 'Symmetry Ratio']
                    ],
                    [
                        'payload' => 'Cabang ilmu desain grafis yang khusus mempelajari perancangan bentuk, label, dan visual dari bungkus suatu produk fisik dinamakan desain...',
                        'correct' => 'Desain Kemasan (Packaging Design)',
                        'wrong' => ['Desain Editorial', 'Desain UI/UX', 'Desain Lingkungan']
                    ],
                    [
                        'payload' => 'Fitur di Photoshop yang berfungsi merekam semua perubahan dan tindakan (langkah-langkah) yang telah kita lakukan, sehingga kita bisa kembali (undo) ke langkah jauh sebelumnya adalah panel...',
                        'correct' => 'History',
                        'wrong' => ['Actions', 'Layers', 'Properties']
                    ],
                    [
                        'payload' => 'Format file gambar modern yang dikembangkan oleh Google untuk web, yang ukurannya sangat kecil namun kualitasnya sebanding dengan JPEG atau PNG adalah...',
                        'correct' => 'WebP',
                        'wrong' => ['TIFF', 'BMP', 'SVG']
                    ],
                    [
                        'payload' => 'Dalam pengaturan tata letak (layout), garis-garis bantu vertikal dan horizontal tak kasat mata yang membentuk kolom untuk menyelaraskan elemen desain agar rapi disebut...',
                        'correct' => 'Grid System',
                        'wrong' => ['Margins', 'Bleeds', 'Crop Marks']
                    ],
                    [
                        'payload' => 'Sebuah komposisi desain di mana elemen di sisi kiri tidak identik dengan sisi kanan, namun bobot visual keseluruhan tetap terasa seimbang disebut keseimbangan...',
                        'correct' => 'Asimetris',
                        'wrong' => ['Simetris', 'Radial', 'Modular']
                    ],
                    [
                        'payload' => 'Penyajian data, statistik, atau informasi yang rumit menjadi bentuk visual yang mudah dipahami, menarik, dan terstruktur disebut dengan...',
                        'correct' => 'Infografis (Infographics)',
                        'wrong' => ['Tipografi', 'Brosur', 'Wireframe']
                    ],
                    [
                        'payload' => 'Pada anatomi huruf (Tipografi), bagian batang huruf kecil yang menjulur ke atas melewati tinggi badan huruf utamanya (seperti pada huruf b, d, h) disebut...',
                        'correct' => 'Ascender',
                        'wrong' => ['Descender', 'Baseline', 'X-Height']
                    ],
                    [
                        'payload' => 'Sedangkan bagian batang huruf kecil yang menjulur ke bawah garis dasar tulisan (seperti pada huruf p, q, y) disebut...',
                        'correct' => 'Descender',
                        'wrong' => ['Ascender', 'Cap Height', 'Stem']
                    ],
                    [
                        'payload' => 'Kumpulan potongan gambar, warna, teks, dan inspirasi visual yang dikumpulkan oleh desainer pada tahap awal proyek untuk menentukan "rasa" atau tema desain disebut...',
                        'correct' => 'Moodboard',
                        'wrong' => ['Storyboard', 'Mockup', 'Blueprint']
                    ],
                    [
                        'payload' => 'Kumpulan warna-warna terpilih yang akan digunakan secara konsisten dalam sebuah karya desain atau identitas merek disebut...',
                        'correct' => 'Color Palette (Palet Warna)',
                        'wrong' => ['Color Gradient', 'Color Wheel', 'Color Contrast']
                    ],
                    [
                        'payload' => 'Resolusi dimensi layar standar untuk format Full HD (1080p) yang sering digunakan pada kanvas video digital adalah...',
                        'correct' => '1920 x 1080 pixel',
                        'wrong' => ['1280 x 720 pixel', '2560 x 1440 pixel', '3840 x 2160 pixel']
                    ],
                    [
                        'payload' => 'Perangkat lunak standar industri dari Adobe yang digunakan secara khusus untuk membuat grafis gerak (Motion Graphics) dan efek visual video adalah...',
                        'correct' => 'Adobe After Effects',
                        'wrong' => ['Adobe Premiere Pro', 'Adobe InDesign', 'Adobe Audition']
                    ],
                    [
                        'payload' => 'Sketsa berurutan berupa gambar panel-panel kotak (mirip komik) yang merencanakan alur adegan pada pembuatan video animasi atau iklan disebut...',
                        'correct' => 'Storyboard',
                        'wrong' => ['Wireframe', 'Moodboard', 'Timeline']
                    ],
                    [
                        'payload' => 'Dalam ilmu warna psikologi, warna yang sering digunakan untuk memunculkan kesan mendesak, energi, bahaya, atau nafsu makan (sering dipakai brand fast food) adalah...',
                        'correct' => 'Merah',
                        'wrong' => ['Biru', 'Hijau', 'Putih']
                    ],
                    [
                        'payload' => 'Sedangkan warna yang sering dikaitkan dengan kesan profesional, ketenangan, keamanan, dan teknologi (sering dipakai oleh bank dan media sosial) adalah...',
                        'correct' => 'Biru',
                        'wrong' => ['Merah', 'Kuning', 'Oranye']
                    ],
                    [
                        'payload' => 'Tool pada Photoshop yang digunakan untuk mencerahkan (membuat lebih terang) area spesifik pada gambar dengan cara disapukan (brush) dinamakan...',
                        'correct' => 'Dodge Tool',
                        'wrong' => ['Burn Tool', 'Sponge Tool', 'Smudge Tool']
                    ],
                    [
                        'payload' => 'Sebaliknya, tool yang disapukan untuk menggelapkan sebagian area gambar di Photoshop dinamakan...',
                        'correct' => 'Burn Tool',
                        'wrong' => ['Dodge Tool', 'Blur Tool', 'Eraser Tool']
                    ],
                    [
                        'payload' => 'Perintah `Flatten Image` pada panel Layer Photoshop berfungsi untuk...',
                        'correct' => 'Menggabungkan seluruh Layer yang ada menjadi satu Layer tunggal (Background) yang tak bisa diedit terpisah lagi',
                        'wrong' => ['Menghapus semua warna pada gambar', 'Mengunci layer agar tidak bergeser', 'Membuat gambar menjadi tembus pandang (transparan)']
                    ],
                    [
                        'payload' => 'Format file yang merupakan standar baku untuk menyimpan huruf/font agar dapat diinstal di sistem operasi Windows maupun Mac adalah...',
                        'correct' => '.TTF (TrueType Font) atau .OTF',
                        'wrong' => ['.PNG', '.DOCX', '.PDF']
                    ],
                    [
                        'payload' => 'Kategori font yang memiliki bentuk menyerupai tulisan tangan, tegak bersambung, dan sering digunakan pada desain undangan pernikahan yang elegan disebut jenis font...',
                        'correct' => 'Script / Cursive',
                        'wrong' => ['Serif', 'Sans-Serif', 'Monospace']
                    ],
                    [
                        'payload' => 'Format file grafik vektor standar lama (Encapsulated PostScript) yang sering dipakai di industri percetakan dan mesin cutting sticker karena kestabilannya adalah format...',
                        'correct' => '.EPS',
                        'wrong' => ['.JPEG', '.GIF', '.PSD']
                    ],
                    [
                        'payload' => 'Layer khusus di Photoshop (Smart Object) sangat berguna bagi desainer karena...',
                        'correct' => 'Memungkinkan objek diperbesar atau diperkecil berkali-kali tanpa menurunkan atau merusak kualitas resolusi aslinya',
                        'wrong' => ['Bisa membuat logo vektor otomatis', 'Membuat ukuran file gambar menjadi 0 kilobyte', 'Otomatis menghapus background']
                    ],
                    [
                        'payload' => 'Prinsip desain grafis yang memastikan semua elemen di dalam komposisi terlihat saling terkait, harmoni, dan merupakan satu kesatuan utuh disebut...',
                        'correct' => 'Kesatuan (Unity)',
                        'wrong' => ['Kontras', 'Penekanan (Emphasis)', 'Proporsi']
                    ],
                    [
                        'payload' => 'Sebuah konsep di mana logo perusahaan dirancang dengan berbagai versi kerumitan agar bisa menyesuaikan (tampil bagus) di layar komputer besar hingga layar smartwatch kecil dinamakan...',
                        'correct' => 'Responsive Logo',
                        'wrong' => ['Animated Logo', '3D Logo', 'Vintage Logo']
                    ],
                    [
                        'payload' => 'Dalam percetakan, warna khusus (Spot Color) yang tinta campurannya sudah dipatenkan agar warnanya absolut sama di seluruh dunia saat dicetak (biasanya untuk brand raksasa), menggunakan standar...',
                        'correct' => 'Pantone Matching System (PMS)',
                        'wrong' => ['RGB Color System', 'Grayscale System', 'Web Safe Colors']
                    ],
                    [
                        'payload' => 'Gradasi warna (Gradient) yang bentuk sebarannya memancar secara melingkar dari titik pusat ke arah luar dinamakan gradient...',
                        'correct' => 'Radial Gradient',
                        'wrong' => ['Linear Gradient', 'Angle Gradient', 'Diamond Gradient']
                    ],
                    [
                        'payload' => 'Tool pada Photoshop yang digunakan untuk menggeser efek seolah-olah gambar diseka/digosok dengan jari basah (sering dipakai untuk manipulasi foto) adalah...',
                        'correct' => 'Smudge Tool',
                        'wrong' => ['Blur Tool', 'Sharpen Tool', 'Healing Brush']
                    ],
                    [
                        'payload' => 'Desain buku pedoman yang merinci aturan ketat cara penggunaan logo brand, palet warna, dan tipografi perusahaan (agar staf tidak melenceng) disebut...',
                        'correct' => 'Brand Guidelines (Brand Book / Graphic Standard Manual)',
                        'wrong' => ['Katalog Produk', 'Company Profile', 'Flyer Promosi']
                    ],
                    [
                        'payload' => 'Saat merancang UI (User Interface) sebuah website yang dirancang dapat menyesuaikan ukurannya di desktop, tablet, maupun HP, desain ini menerapkan sistem...',
                        'correct' => 'Responsive Web Design',
                        'wrong' => ['Fixed Width Design', 'Flash Design', 'Monolithic Design']
                    ],
                    [
                        'payload' => 'Shortcut `Ctrl + G` pada Adobe Illustrator atau Photoshop berfungsi untuk melakukan...',
                        'correct' => 'Group (Menggabungkan beberapa layer/objek ke dalam satu folder kelompok)',
                        'wrong' => ['Gradient (Memunculkan tool gradasi)', 'Grid (Menampilkan garis bantu)', 'Guide (Menghapus garis)']
                    ],
                    [
                        'payload' => 'Sedangkan shortcut `Ctrl + D` pada Photoshop berfungsi untuk...',
                        'correct' => 'Deselect (Menghilangkan garis seleksi yang aktif)',
                        'wrong' => ['Delete (Menghapus layer)', 'Duplicate (Menggandakan layer)', 'Dodge (Mencerahkan)']
                    ],
                    [
                        'payload' => 'Salah satu opsi pada Free Transform di Photoshop yang berfungsi untuk memiringkan objek (menarik sisi-sisinya secara miring) dinamakan...',
                        'correct' => 'Skew',
                        'wrong' => ['Rotate', 'Scale', 'Perspective']
                    ],
                    [
                        'payload' => 'Elemen desain yang berkaitan dengan perabaan atau memberikan kesan visual permukaan sebuah material (kasar, halus, kayu, logam) di atas kanvas 2D disebut...',
                        'correct' => 'Tekstur (Texture)',
                        'wrong' => ['Ruang (Space)', 'Bentuk (Form)', 'Warna (Color)']
                    ],
                    [
                        'payload' => 'Pada software desain, `Fill` adalah warna isi objek. Fitur untuk mengosongkan/menghilangkan warna `Fill` tersebut sehingga hanya tersisa garis luarnya saja disimbolkan dengan kotak...',
                        'correct' => 'Putih dengan garis coret silang merah',
                        'wrong' => ['Hitam pekat', 'Kotak abu-abu', 'Lingkaran penuh']
                    ],
                    [
                        'payload' => 'Format file gambar yang sangat tua dan jarang dipakai sekarang, karena tidak dikompresi sama sekali (ukurannya sangat besar per file) adalah...',
                        'correct' => 'BMP (Bitmap Image File)',
                        'wrong' => ['JPG', 'PNG', 'WEBP']
                    ],
                    [
                        'payload' => 'Mode warna *Lab Color* pada Photoshop memisahkan data gambar berdasarkan...',
                        'correct' => 'Lightness (Kecerahan cahaya) dan sumbu warna A/B secara terpisah',
                        'wrong' => ['Cyan, Magenta, dan Yellow', 'Merah, Hijau, dan Biru', 'Hanya data piksel transparan']
                    ],
                    [
                        'payload' => 'Kategori tipografi yang memiliki ciri ketebalan garis huruf yang sama persis dan setiap karakter mengambil ruang jarak/spasi yang persis sama (seperti font coding atau mesin tik) disebut...',
                        'correct' => 'Monospace',
                        'wrong' => ['Serif', 'Script', 'Decorative']
                    ],
                    [
                        'payload' => 'Prinsip desain "Proximity" (Kedekatan) menyatakan bahwa...',
                        'correct' => 'Elemen-elemen yang saling berhubungan harus diletakkan berdekatan untuk menunjukkan bahwa mereka satu kelompok informasi',
                        'wrong' => ['Elemen desain harus sebesar mungkin', 'Jarak antar huruf harus direnggangkan jauh', 'Warna harus selalu kontras']
                    ],
                    [
                        'payload' => 'Istilah HAKI sangat penting bagi seorang desainer grafis profesional. HAKI singkatan dari...',
                        'correct' => 'Hak Atas Kekayaan Intelektual (Termasuk Hak Cipta Karya)',
                        'wrong' => ['Hak Atas Keamanan Internet', 'Harga Asli Karya Ilustrasi', 'Hukum Aturan Kerja Ilustrator']
                    ],
                    [
                        'payload' => 'Mengklaim, menyalin mentah-mentah, dan memodifikasi sedikit karya desainer lain kemudian diakui sebagai karya buatan sendiri adalah pelanggaran berat yang dinamakan...',
                        'correct' => 'Plagiarisme',
                        'wrong' => ['Tracing', 'Referensi', 'Brainstorming']
                    ],
                    [
                        'payload' => 'Kumpulan hasil karya terbaik (terkurasi) dari seorang desainer grafis yang digunakan sebagai syarat melamar kerja atau mencari klien disebut...',
                        'correct' => 'Portfolio',
                        'wrong' => ['Curriculum Vitae', 'Katalog', 'Brosur']
                    ],
                    [
                        'payload' => 'Tampilan ruang batas tepi dalam dokumen (jarak area kertas kosong dari bagian paling tepi hingga teks mulai diketik) dinamakan...',
                        'correct' => 'Margin',
                        'wrong' => ['Bleed', 'Gutter', 'Column']
                    ],
                    [
                        'payload' => 'Sedangkan ruang/jarak vertikal atau horizontal di antara dua buah kolom teks dalam layout majalah/koran disebut...',
                        'correct' => 'Gutter',
                        'wrong' => ['Margin', 'Bleed', 'Slug']
                    ],
                    [
                        'payload' => 'Software pengolah grafis 3 Dimensi (3D) yang paling populer dan sepenuhnya gratis/open source di seluruh dunia adalah...',
                        'correct' => 'Blender',
                        'wrong' => ['Autodesk Maya', 'Cinema 4D', '3ds Max']
                    ],
                    [
                        'payload' => 'Di Adobe Illustrator, apabila Anda salah membuat desain dan ingin mengembalikannya persis ke momen terakhir kali Anda melakukan *Save*, Anda menekan menu File > ...',
                        'correct' => 'Revert',
                        'wrong' => ['Undo', 'Redo', 'Restore']
                    ],
                    [
                        'payload' => 'Pewarnaan pada objek desain (seperti Poster atau Baliho) yang tampak cerah mencolok saat di layar laptop, namun tiba-tiba menjadi redup dan kusam setelah dicetak di kertas terjadi karena kesalahan...',
                        'correct' => 'Lupa mengubah format warna dokumen dari RGB (untuk layar) ke CMYK (untuk mesin cetak)',
                        'wrong' => ['Tinta printernya terlalu banyak', 'Kertasnya terlalu tebal', 'Resolusi filenya terlalu besar']
                    ],
                    [
                        'payload' => 'Tool di Photoshop yang otomatis bisa menghilangkan orang (objek di latar belakang) dan mengganti ruang kosong bekas orang tersebut dengan meniru background aslinya disebut fitur...',
                        'correct' => 'Content-Aware Fill',
                        'wrong' => ['Crop Tool', 'Eraser Tool', 'Brush Tool']
                    ],
                    [
                        'payload' => 'Format file gambar grafis yang sangat disarankan oleh profesional untuk menyimpan aset *Logo*, karena jika dikirim ke web developer kode warnanya dan kualitas garisnya tak akan pernah pecah, adalah...',
                        'correct' => 'SVG (Scalable Vector Graphics)',
                        'wrong' => ['JPG', 'GIF', 'BMP']
                    ],
                    [
                        'payload' => 'Tahapan di mana kita mempresentasikan rancangan ide visual, logo, warna, hingga filosofinya dengan rapi menggunakan dokumen Presentasi / PDF kepada Klien disebut...',
                        'correct' => 'Design Pitching / Presentation',
                        'wrong' => ['Rendering', 'Brainstorming', 'Prototyping']
                    ]
                ]
            ]
        ];

        DB::beginTransaction();

        try {
            foreach ($subjectsData as $subjectName => $data) {
                // 1. Buat Mata Pelajaran ke tabel `subjects`
                $subject = Subject::create([
                    'name' => $subjectName,
                    'description' => $data['description'],
                    'is_active' => true,
                ]);

                $questionsList = $data['questions'];

                // =========================================================
                // ACAK SOAL: Mengacak urutan kemunculan soal di database
                // =========================================================
                shuffle($questionsList);

                // 2. Looping data soal yang sudah diacak
                foreach ($questionsList as $qData) {
                    $this->createQuestionWithRandomizedAnswers($subject, $qData);
                }
            }

            DB::commit();
            $this->command->info("Seeding berhasil! Seluruh mata pelajaran, soal, dan posisi jawaban telah diacak dan tersimpan.");

        } catch (\Exception $e) {
            DB::rollBack();
            $this->command->error("Terjadi kesalahan saat seeding: " . $e->getMessage());
        }
    }

    /**
     * Fungsi untuk menyimpan Pertanyaan dan mengacak posisi Jawabannya (A, B, C, D)
     */
    private function createQuestionWithRandomizedAnswers(Subject $subject, array $qData): void
    {
        // 3. Simpan data pertanyaan ke tabel `questions`
        $question = Question::create([
            'subject_id' => $subject->id,
            'payload' => $qData['payload'],
            'score' => 1, // Default skor per soal
            'description' => 'Soal ujian ' . $subject->name,
            'is_active' => true,
        ]);

        // 4. Siapkan format array jawaban (1 Benar, 3 Salah)
        $answers = [
            ['text' => $qData['correct'], 'is_correct' => true],
            ['text' => $qData['wrong'][0], 'is_correct' => false],
            ['text' => $qData['wrong'][1], 'is_correct' => false],
            ['text' => $qData['wrong'][2], 'is_correct' => false],
        ];

        // =========================================================
        // ACAK JAWABAN: Mengacak posisi index jawaban benar dan salah
        // =========================================================
        shuffle($answers);

        // 5. Simpan jawaban yang posisinya sudah teracak ke tabel `answers`
        foreach ($answers as $answerData) {
            Answer::create([
                'question_id' => $question->id,
                'text' => $answerData['text'],
                'is_correct' => $answerData['is_correct'],
                'is_active' => true,
            ]);
        }
    }
}