<?php

namespace Tests\Feature;

use App\Classes\Canvas;
use App\Classes\Playfield;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LangtonStep6_BuildPlayfieldTest extends TestCase
{
    public function testBuildPlayfield ()
    {
        // Get a Playfield instance through the canvas.
        $playfield = (new Canvas(2, 2))->getPlayfield();
        $this->assertInstanceOf(Playfield::class, $playfield);

        // Test if there are two rows in the playfield
        // and two items in the first & second row.
        $playfieldArray = $playfield->get();
        $this->assertCount(2, $playfieldArray);
        $this->assertCount(2, $playfieldArray[0]);
        $this->assertCount(2, $playfieldArray[1]);
    }
}
