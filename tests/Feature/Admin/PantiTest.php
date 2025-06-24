<?php

namespace Tests\Feature\Admin;

use App\Models\Panti;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PantiTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Buat user admin
        $this->admin = User::factory()->create(['is_admin' => true]);
        $this->user = User::factory()->create(['is_admin' => false]);
    }

    public function test_admin_can_view_panti_list()
    {
        $this->actingAs($this->admin)
            ->get(route('admin.panti.index'))
            ->assertStatus(200)
            ->assertSee('Panti');
    }

    public function test_admin_can_create_panti()
    {
        $this->actingAs($this->admin);
        $data = [
            'nama' => 'Panti Test',
            'alamat' => 'Jl. Test',
            'kecamatan' => 'Klojen',
            'phone' => '08123456789',
            'email' => 'pantitest@example.com',
            'social_media_url' => 'https://example.com',
        ];
        $response = $this->post(route('admin.panti.store'), $data);
        $response->assertRedirect(route('admin.panti.index'));
        $this->assertDatabaseHas('panti', ['nama' => 'Panti Test']);
    }

    public function test_admin_can_update_panti()
    {
        $this->actingAs($this->admin);
        $panti = Panti::factory()->create();
        $response = $this->put(route('admin.panti.update', $panti), [
            'nama' => 'Panti Updated',
            'alamat' => $panti->alamat,
            'kecamatan' => $panti->kecamatan,
            'phone' => $panti->phone,
            'email' => $panti->email,
            'social_media_url' => $panti->social_media_url,
        ]);
        $response->assertRedirect(route('admin.panti.index'));
        $this->assertDatabaseHas('panti', ['nama' => 'Panti Updated']);
    }

    public function test_admin_can_delete_panti()
    {
        $this->actingAs($this->admin);
        $panti = Panti::factory()->create();
        $response = $this->delete(route('admin.panti.destroy', $panti));
        $response->assertRedirect(route('admin.panti.index'));
        $this->assertDatabaseMissing('panti', ['id_panti' => $panti->id_panti]);
    }

    public function test_creating_panti_fails_without_name()
    {
        $this->actingAs($this->admin);
        $data = [
            'alamat' => 'Jl. Test',
            'kecamatan' => 'Klojen',
            'phone' => '08123456789',
            'email' => 'pantitest@example.com',
        ];
        $response = $this->post(route('admin.panti.store'), $data);
        $response->assertSessionHasErrors('nama');
    }

    public function test_non_admin_user_cannot_access_panti_create_page()
    {
        $this->actingAs($this->user)
            ->get(route('admin.panti.create'))
            ->assertStatus(403);
    }
} 