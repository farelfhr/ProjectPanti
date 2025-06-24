<?php

namespace Tests\Unit;

use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArtikelTest extends TestCase
{
    use RefreshDatabase;

    public function test_artikel_belongs_to_kategori()
    {
        $kategori = Kategori::factory()->create();
        $artikel = Artikel::factory()->create(['id_kategori' => $kategori->id_kategori]);
        $this->assertInstanceOf(Kategori::class, $artikel->kategori);
        $this->assertEquals($kategori->id_kategori, $artikel->kategori->id_kategori);
    }

    public function test_artikel_belongs_to_user()
    {
        $user = User::factory()->create();
        $artikel = Artikel::factory()->create(['id_penulis' => $user->id]);
        $this->assertInstanceOf(User::class, $artikel->author);
        $this->assertEquals($user->id, $artikel->author->id);
    }
} 