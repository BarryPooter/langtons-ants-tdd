<?php

namespace Tests\Feature;

use App\Classes\Playfield;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LangtonStep4_CreatePlayfieldTest extends TestCase
{
    public function testPlayfieldInstance ()
    {
        // Test if the same dimensions generate the same Object.
        $this->assertInstanceOf(Playfield::class, new Playfield(5, 5));

        // Test if two different dimensions create different Objects.
        $this->assertNotEquals(new Playfield(5, 5), new Playfield(10, 10));
    }
}
