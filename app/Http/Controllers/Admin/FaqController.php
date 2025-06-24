<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::latest()->paginate(10);
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq = Faq::create($validated);
        ActivityLog::create([
            'user_name' => auth()->user()->name,
            'action' => 'Tambah FAQ',
            'subject_type' => 'FAQ',
            'subject_id' => $faq->id,
            'description' => 'Pertanyaan: ' . $faq->question,
        ]);
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ berhasil ditambahkan.');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq->update($validated);
        ActivityLog::create([
            'user_name' => auth()->user()->name,
            'action' => 'Edit FAQ',
            'subject_type' => 'FAQ',
            'subject_id' => $faq->id,
            'description' => 'Pertanyaan: ' . $faq->question,
        ]);
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ berhasil diperbarui.');
    }

    public function destroy(Faq $faq)
    {
        ActivityLog::create([
            'user_name' => auth()->user()->name,
            'action' => 'Hapus FAQ',
            'subject_type' => 'FAQ',
            'subject_id' => $faq->id,
            'description' => 'Pertanyaan: ' . $faq->question,
        ]);
        $faq->delete();
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ berhasil dihapus.');
    }
}