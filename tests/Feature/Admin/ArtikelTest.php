<?php

namespace Tests\Feature\Admin;

use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ArtikelTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->create(['is_admin' => true]);
        $this->user = User::factory()->create(['is_admin' => false]);
        $this->kategori = Kategori::factory()->create();
    }

    public function test_admin_can_view_artikel_list()
    {
        $this->actingAs($this->admin)
            ->get(route('admin.artikel.index'))
            ->assertStatus(200)
            ->assertSee('Artikel');
    }

    public function test_admin_can_create_artikel()
    {
        Storage::fake('public');
        $this->actingAs($this->admin);
        $data = [
            'judul' => 'Artikel Test',
            'konten' => 'Konten artikel test',
            'id_kategori' => $this->kategori->id_kategori,
            'gambar' => UploadedFile::fake()->image('artikel.jpg'),
        ];
        $response = $this->post(route('admin.artikel.store'), $data);
        $response->assertRedirect(route('admin.artikel.index'));
        $this->assertDatabaseHas('artikel', ['judul' => 'Artikel Test']);
    }

    public function test_admin_can_update_artikel()
    {
        $this->actingAs($this->admin);
        $artikel = Artikel::factory()->create(['id_kategori' => $this->kategori->id_kategori]);
        $response = $this->put(route('admin.artikel.update', $artikel), [
            'judul' => 'Artikel Updated',
            'konten' => $artikel->konten,
            'id_kategori' => $this->kategori->id_kategori,
        ]);
        $response->assertRedirect(route('admin.artikel.index'));
        $this->assertDatabaseHas('artikel', ['judul' => 'Artikel Updated']);
    }

    public function test_admin_can_delete_artikel()
    {
        $this->actingAs($this->admin);
        $artikel = Artikel::factory()->create(['id_kategori' => $this->kategori->id_kategori]);
        $response = $this->delete(route('admin.artikel.destroy', $artikel));
        $response->assertRedirect(route('admin.artikel.index'));
        $this->assertDatabaseMissing('artikel', ['id_artikel' => $artikel->id_artikel]);
    }

    public function test_creating_artikel_fails_without_judul()
    {
        $this->actingAs($this->admin);
        $data = [
            'konten' => 'Konten artikel test',
            'id_kategori' => $this->kategori->id_kategori,
        ];
        $response = $this->post(route('admin.artikel.store'), $data);
        $response->assertSessionHasErrors('judul');
    }

    public function test_non_admin_user_cannot_access_artikel_create_page()
    {
        $this->actingAs($this->user)
            ->get(route('admin.artikel.create'))
            ->assertStatus(403);
    }
} 