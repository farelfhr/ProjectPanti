<?php

namespace Tests\Feature\Admin;

use App\Models\Kategori;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class KategoriTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->create(['is_admin' => true]);
        $this->user = User::factory()->create(['is_admin' => false]);
    }

    public function test_admin_can_view_kategori_list()
    {
        $this->actingAs($this->admin)
            ->get(route('admin.kategori.index'))
            ->assertStatus(200)
            ->assertSee('Kategori');
    }

    public function test_admin_can_create_kategori()
    {
        $this->actingAs($this->admin);
        $data = [
            'nama' => 'Kategori Test',
            'deskripsi' => 'Deskripsi kategori',
        ];
        $response = $this->post(route('admin.kategori.store'), $data);
        $response->assertRedirect(route('admin.kategori.index'));
        $this->assertDatabaseHas('kategori', ['nama' => 'Kategori Test']);
    }

    public function test_admin_can_update_kategori()
    {
        $this->actingAs($this->admin);
        $kategori = Kategori::factory()->create();
        $response = $this->put(route('admin.kategori.update', $kategori), [
            'nama' => 'Kategori Updated',
            'deskripsi' => $kategori->deskripsi,
        ]);
        $response->assertRedirect(route('admin.kategori.index'));
        $this->assertDatabaseHas('kategori', ['nama' => 'Kategori Updated']);
    }

    public function test_admin_can_delete_kategori()
    {
        $this->actingAs($this->admin);
        $kategori = Kategori::factory()->create();
        $response = $this->delete(route('admin.kategori.destroy', $kategori));
        $response->assertRedirect(route('admin.kategori.index'));
        $this->assertDatabaseMissing('kategori', ['id_kategori' => $kategori->id_kategori]);
    }

    public function test_creating_kategori_fails_without_nama()
    {
        $this->actingAs($this->admin);
        $data = [
            'deskripsi' => 'Deskripsi kategori',
        ];
        $response = $this->post(route('admin.kategori.store'), $data);
        $response->assertSessionHasErrors('nama');
    }

    public function test_non_admin_user_cannot_access_kategori_create_page()
    {
        $this->actingAs($this->user)
            ->get(route('admin.kategori.create'))
            ->assertStatus(403);
    }
} 