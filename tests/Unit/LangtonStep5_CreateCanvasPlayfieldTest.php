<?php

namespace Tests\Feature;

use App\Classes\Canvas;
use App\Classes\Playfield;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LangtonStep5_CreateCanvasPlayfieldTest extends TestCase
{
    public function testPlayfieldCreation ()
    {
        // Test if we get a Playfield instance after
        // running the canvas getPlayfield() method.
        $canvas = new Canvas(10, 10);
        $this->assertInstanceOf(Playfield::class, $canvas->getPlayfield());
    }
}
