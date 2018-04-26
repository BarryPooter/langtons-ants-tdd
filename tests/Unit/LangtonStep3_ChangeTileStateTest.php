<?php

namespace Tests\Feature;

use App\Classes\Tile;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LangtonStep3_ChangeTileStateTest extends TestCase
{
    public function testChangeTileState()
    {
        // Switch the tile from "white" to "black".
        $tile = new Tile(0);
        $tile->changeState(1);

        // See if the state has changed.
        $this->assertEquals(new Tile(1), $tile);
    }
}
