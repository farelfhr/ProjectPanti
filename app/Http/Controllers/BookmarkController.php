<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Panti;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    /**
     * Toggle bookmark untuk panti
     */
    public function togglePanti(Request $request, Panti $panti)
    {
        $user = Auth::user();
        
        // Cek apakah sudah di-bookmark
        $existingBookmark = Bookmark::where('user_id', $user->id)
            ->where('bookmarkable_type', 'App\Models\Panti')
            ->where('bookmarkable_id', $panti->id_panti)
            ->first();

        if ($existingBookmark) {
            // Hapus bookmark jika sudah ada
            $existingBookmark->delete();
            $isBookmarked = false;
            $message = 'Panti dihapus dari bookmark';
        } else {
            // Tambah bookmark jika belum ada
            Bookmark::create([
                'user_id' => $user->id,
                'bookmarkable_type' => 'App\Models\Panti',
                'bookmarkable_id' => $panti->id_panti,
            ]);
            $isBookmarked = true;
            $message = 'Panti ditambahkan ke bookmark';
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'isBookmarked' => $isBookmarked,
                'message' => $message
            ]);
        }

        return back()->with('success', $message);
    }

    /**
     * Toggle bookmark untuk artikel
     */
    public function toggleArtikel(Request $request, Artikel $artikel)
    {
        $user = Auth::user();
        
        // Cek apakah sudah di-bookmark
        $existingBookmark = Bookmark::where('user_id', $user->id)
            ->where('bookmarkable_type', 'App\Models\Artikel')
            ->where('bookmarkable_id', $artikel->id)
            ->first();

        if ($existingBookmark) {
            // Hapus bookmark jika sudah ada
            $existingBookmark->delete();
            $isBookmarked = false;
            $message = 'Artikel dihapus dari bookmark';
        } else {
            // Tambah bookmark jika belum ada
            Bookmark::create([
                'user_id' => $user->id,
                'bookmarkable_type' => 'App\Models\Artikel',
                'bookmarkable_id' => $artikel->id,
            ]);
            $isBookmarked = true;
            $message = 'Artikel ditambahkan ke bookmark';
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'isBookmarked' => $isBookmarked,
                'message' => $message
            ]);
        }

        return back()->with('success', $message);
    }

    /**
     * Hapus bookmark
     */
    public function destroy(Bookmark $bookmark)
    {
        $user = Auth::user();
        
        // Pastikan user hanya bisa menghapus bookmark miliknya sendiri
        if ($bookmark->user_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        $bookmark->delete();

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Bookmark berhasil dihapus'
            ]);
        }

        return back()->with('success', 'Bookmark berhasil dihapus');
    }

    /**
     * Tampilkan semua bookmark user
     */
    public function index()
    {
        $user = Auth::user();
        $bookmarks = $user->bookmarks()->with('bookmarkable')->latest()->paginate(12);

        return view('bookmarks.index', compact('bookmarks'));
    }

    /**
     * Cek status bookmark untuk panti
     */
    public function checkPantiBookmark(Panti $panti)
    {
        $user = Auth::user();
        $isBookmarked = Bookmark::where('user_id', $user->id)
            ->where('bookmarkable_type', 'App\Models\Panti')
            ->where('bookmarkable_id', $panti->id_panti)
            ->exists();

        return response()->json([
            'isBookmarked' => $isBookmarked
        ]);
    }

    /**
     * Cek status bookmark untuk artikel
     */
    public function checkArtikelBookmark(Artikel $artikel)
    {
        $user = Auth::user();
        $isBookmarked = Bookmark::where('user_id', $user->id)
            ->where('bookmarkable_type', 'App\Models\Artikel')
            ->where('bookmarkable_id', $artikel->id)
            ->exists();

        return response()->json([
            'isBookmarked' => $isBookmarked
        ]);
    }
} 