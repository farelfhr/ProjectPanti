<?php

namespace Tests\Feature\Admin;

use App\Models\Kegiatan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class KegiatanTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->create(['is_admin' => true]);
        $this->user = User::factory()->create(['is_admin' => false]);
    }

    public function test_admin_can_view_kegiatan_list()
    {
        $this->actingAs($this->admin)
            ->get(route('admin.kegiatan.index'))
            ->assertStatus(200)
            ->assertSee('Kegiatan');
    }

    public function test_admin_can_create_kegiatan()
    {
        Storage::fake('public');
        $this->actingAs($this->admin);
        $data = [
            'judul' => 'Kegiatan Test',
            'pembicara' => 'Pembicara Test',
            'tanggal' => now()->toDateString(),
            'waktu' => '09:00 - 10:00',
            'lokasi' => 'Aula',
            'deskripsi_singkat' => 'Deskripsi singkat',
            'judul_modal' => 'Judul Modal',
            'deskripsi_panjang' => 'Deskripsi panjang kegiatan',
            'gambar' => UploadedFile::fake()->image('kegiatan.jpg'),
        ];
        $response = $this->post(route('admin.kegiatan.store'), $data);
        $response->assertRedirect(route('admin.kegiatan.index'));
        $this->assertDatabaseHas('kegiatan', ['judul' => 'Kegiatan Test']);
    }

    public function test_admin_can_update_kegiatan()
    {
        $this->actingAs($this->admin);
        $kegiatan = Kegiatan::factory()->create();
        $response = $this->put(route('admin.kegiatan.update', $kegiatan), [
            'judul' => 'Kegiatan Updated',
            'pembicara' => $kegiatan->pembicara,
            'tanggal' => $kegiatan->tanggal->toDateString(),
            'waktu' => $kegiatan->waktu,
            'lokasi' => $kegiatan->lokasi,
            'deskripsi_singkat' => $kegiatan->deskripsi_singkat,
            'judul_modal' => $kegiatan->judul_modal,
            'deskripsi_panjang' => $kegiatan->deskripsi_panjang,
        ]);
        $response->assertRedirect(route('admin.kegiatan.index'));
        $this->assertDatabaseHas('kegiatan', ['judul' => 'Kegiatan Updated']);
    }

    public function test_admin_can_delete_kegiatan()
    {
        $this->actingAs($this->admin);
        $kegiatan = Kegiatan::factory()->create();
        $response = $this->delete(route('admin.kegiatan.destroy', $kegiatan));
        $response->assertRedirect(route('admin.kegiatan.index'));
        $this->assertDatabaseMissing('kegiatan', ['id' => $kegiatan->id]);
    }

    public function test_creating_kegiatan_fails_without_judul()
    {
        $this->actingAs($this->admin);
        $data = [
            'pembicara' => 'Pembicara Test',
            'tanggal' => now()->toDateString(),
            'waktu' => '09:00 - 10:00',
            'lokasi' => 'Aula',
            'deskripsi_singkat' => 'Deskripsi singkat',
            'judul_modal' => 'Judul Modal',
            'deskripsi_panjang' => 'Deskripsi panjang kegiatan',
        ];
        $response = $this->post(route('admin.kegiatan.store'), $data);
        $response->assertSessionHasErrors('judul');
    }

    public function test_non_admin_user_cannot_access_kegiatan_create_page()
    {
        $this->actingAs($this->user)
            ->get(route('admin.kegiatan.create'))
            ->assertStatus(403);
    }
} 