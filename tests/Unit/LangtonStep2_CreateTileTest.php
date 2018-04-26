<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use \App\Classes\Tile;

class LangtonStep2_CreateTileTest extends TestCase
{
    public function testTileCreation ()
    {
        // Test if a Tile Object, is the same as another Tile Object.
        $this->assertEquals(new Tile(1), new Tile(1));

        // Test if this is the same for another case.
        $this->assertEquals(new Tile(0), new Tile(0));

        // Test if a Tile Object, is not the same as another Tile Object.
        $this->assertNotEquals(new Tile(0), new Tile(1));
    }
}
