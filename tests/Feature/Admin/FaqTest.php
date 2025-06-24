<?php

namespace Tests\Feature\Admin;

use App\Models\Faq;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FaqTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->create(['is_admin' => true]);
        $this->user = User::factory()->create(['is_admin' => false]);
    }

    public function test_admin_can_view_faq_list()
    {
        $this->actingAs($this->admin)
            ->get(route('admin.faqs.index'))
            ->assertStatus(200)
            ->assertSee('FAQ');
    }

    public function test_admin_can_create_faq()
    {
        $this->actingAs($this->admin);
        $data = [
            'question' => 'Apa itu Titik Kebaikan?',
            'answer' => 'Titik Kebaikan adalah platform...'
        ];
        $response = $this->post(route('admin.faqs.store'), $data);
        $response->assertRedirect(route('admin.faqs.index'));
        $this->assertDatabaseHas('faqs', ['question' => 'Apa itu Titik Kebaikan?']);
    }

    public function test_admin_can_update_faq()
    {
        $this->actingAs($this->admin);
        $faq = Faq::factory()->create();
        $response = $this->put(route('admin.faqs.update', $faq), [
            'question' => 'Apa itu Titik Kebaikan? (Update)',
            'answer' => $faq->answer,
        ]);
        $response->assertRedirect(route('admin.faqs.index'));
        $this->assertDatabaseHas('faqs', ['question' => 'Apa itu Titik Kebaikan? (Update)']);
    }

    public function test_admin_can_delete_faq()
    {
        $this->actingAs($this->admin);
        $faq = Faq::factory()->create();
        $response = $this->delete(route('admin.faqs.destroy', $faq));
        $response->assertRedirect(route('admin.faqs.index'));
        $this->assertDatabaseMissing('faqs', ['id' => $faq->id]);
    }

    public function test_creating_faq_fails_without_question()
    {
        $this->actingAs($this->admin);
        $data = [
            'answer' => 'Titik Kebaikan adalah platform...'
        ];
        $response = $this->post(route('admin.faqs.store'), $data);
        $response->assertSessionHasErrors('question');
    }

    public function test_non_admin_user_cannot_access_faq_create_page()
    {
        $this->actingAs($this->user)
            ->get(route('admin.faqs.create'))
            ->assertStatus(403);
    }
} 