<?php

namespace Tests\Unit;

use App\Classes\Canvas;
use App\Classes\Tile;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LangtonStep13_GetTileInPlayfieldTest extends TestCase
{
    public function testGetTilePosition ()
    {
        $playfield = (new Canvas(2, 2))->getPlayfield();

        // Attempt to get a tile within the Playfield.
        $tile = $playfield->getTileAtPosition(1,1);
        $this->assertInstanceOf(Tile::class, $tile);

        // Attempt to get a tile OUTSIDE of the Playfield.
        // We want to retrieve null if it's invalid.
        $tile = $playfield->getTileAtPosition(5,5);
        $this->assertEquals($tile, null);
    }
}
