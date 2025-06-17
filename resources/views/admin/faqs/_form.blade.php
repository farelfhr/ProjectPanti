@csrf
<div class="mb-4">
    <label for="question" class="block text-gray-700 text-sm font-bold mb-2">Pertanyaan (Question):</label>
    <input type="text" name="question" id="question" value="{{ old('question', $faq->question ?? '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
</div>

<div class="mb-4">
    <label for="answer" class="block text-gray-700 text-sm font-bold mb-2">Jawaban (Answer):</label>
    <textarea name="answer" id="answer" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>{{ old('answer', $faq->answer ?? '') }}</textarea>
</div>

<div class="flex items-center justify-between mt-6">
    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
        {{ isset($faq) ? 'Update FAQ' : 'Simpan FAQ' }}
    </button>
    <a href="{{ route('admin.faqs.index') }}" class="text-blue-500 hover:text-blue-800">Batal</a>
</div>