<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Answer;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        $subjects = Subject::where('is_active', true)->get();
        return view('exam.index', compact('subjects'));
    }

    public function show($id)
    {
        $subject = Subject::findOrFail($id);
        $questions = $subject->questions()->with('answers')->paginate(10);
        
        // Ambil jawaban yang sudah pernah dijawab dan tersimpan di Session
        $savedAnswers = session()->get("exam_answers_{$id}", []);

        return view('exam.show', compact('subject', 'questions', 'savedAnswers'));
    }

    // Fungsi baru untuk menyimpan jawaban secara real-time via AJAX (Background)
    public function storeAnswer(Request $request, $id)
    {
        $questionId = $request->input('question_id');
        $answerId = $request->input('answer_id');

        // Simpan ke session dengan format: exam_answers_1 = [ ID_SOAL => ID_JAWABAN ]
        session()->put("exam_answers_{$id}.{$questionId}", $answerId);

        return response()->json(['success' => true]);
    }

    public function submit(Request $request, $id)
    {
        // Ambil jawaban DARI SESSION (karena sudah tersimpan saat diklik), bukan dari form
        $submittedAnswers = session()->get("exam_answers_{$id}", []); 

        $totalBenar = 0;
        $totalSalah = 0;
        $totalNilai = 0;
        $soalDijawab = count($submittedAnswers); // Hanya menghitung jumlah soal yang dijawab

        // Looping hanya pada soal yang dijawab saja
        foreach ($submittedAnswers as $questionId => $answerId) {
            $answer = Answer::where('id', $answerId)->where('question_id', $questionId)->first();
            
            if ($answer && $answer->is_correct) {
                $totalBenar++;
                $totalNilai += 10;
            } else {
                $totalSalah++;
            }
        }

        // Hapus session/reset lembar jawaban ujian untuk mata pelajaran ini setelah dikumpulkan
        session()->forget("exam_answers_{$id}");

        // Kembalikan ke halaman depan (index) beserta pesan nilainya
        return redirect()->route('exam.index')->with('success', "Ujian selesai! Kamu menjawab $soalDijawab soal. Benar: $totalBenar, Salah: $totalSalah. Total Nilai: $totalNilai poin.");
    }
}