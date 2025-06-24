<?php

namespace Tests\Unit;

use App\Models\Kebutuhan;
use App\Models\Media;
use App\Models\Panti;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PantiTest extends TestCase
{
    use RefreshDatabase;

    public function test_panti_has_many_kebutuhan()
    {
        $panti = Panti::factory()->create();
        $kebutuhan1 = Kebutuhan::factory()->create(['id_panti' => $panti->id_panti]);
        $kebutuhan2 = Kebutuhan::factory()->create(['id_panti' => $panti->id_panti]);
        $this->assertCount(2, $panti->kebutuhan);
        $this->assertTrue($panti->kebutuhan->contains($kebutuhan1));
        $this->assertTrue($panti->kebutuhan->contains($kebutuhan2));
    }

    public function test_panti_has_many_media()
    {
        $panti = Panti::factory()->create();
        $media1 = Media::factory()->create(['id_panti' => $panti->id_panti]);
        $media2 = Media::factory()->create(['id_panti' => $panti->id_panti]);
        $this->assertCount(2, $panti->media);
        $this->assertTrue($panti->media->contains($media1));
        $this->assertTrue($panti->media->contains($media2));
    }
} 