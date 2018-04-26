<?php

namespace Tests\Feature;

use App\Classes\Canvas;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LangtonStep12_MoveAntAndAdjustTileTest extends TestCase
{
    public function testMoveAndChangeTileState ()
    {
        $playfield = (new Canvas(2,2))->getPlayfield();
        $ant = $playfield->getAnt();
        $position = $ant->getPosition();
        $positionY = $position['y'];

        // Move the ant up/down (depends on its position)
        // and check wether the tile state has been changed.
        if (0 === $positionY) {
            $this->assertEquals($playfield->moveAnt('down'), true);
            $position = $playfield->getAnt()->getPosition();
            $movedToTile = $playfield->getTileAtPosition($position['x'], $position['y']);

            $this->assertEquals(1, $movedToTile->getState());
        } elseif (1 === $positionY) {
            $this->assertEquals($playfield->moveAnt('up'), true);
            $position = $playfield->getAnt()->getPosition();
            $movedToTile = $playfield->getTileAtPosition($position['x'], $position['y']);

            $this->assertEquals(1, $movedToTile->getState());
        }
    }
}
