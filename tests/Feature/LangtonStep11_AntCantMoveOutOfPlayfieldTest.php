<?php

namespace Tests\Feature;

use App\Classes\Canvas;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LangtonStep10AntCantMoveOutOfPlayfieldTest extends TestCase
{
    public function testAntStaysWithinBoundaries ()
    {
        // Get all the Objects for our playfield.
        $canvas = new Canvas(2, 2);
        $playfield = $canvas->getPlayfield();
        $ant = $playfield->getAnt();

        // Attempt to move the ant out of the border
        // By going up or down.
        if ($ant->getPosition()['y'] === 0) {
            $playfield->moveAnt('up');
            $this->assertNotEquals($ant->getPosition()['y'], -1);
        } elseif ($ant->getPosition()['y'] === 1) {
            $playfield->moveAnt('down');
            $this->assertNotEquals($ant->getPosition()['y'], 2);
        }

        // Attempt to move the ant out of the border
        // By going left or right.
        if ($ant->getPosition()['x'] === 0) {
            $playfield->moveAnt('left');
            $this->assertNotEquals($ant->getPosition()['x'], -1);
        } elseif ($ant->getPosition()['x'] === 1) {
            $playfield->moveAnt('right');
            $this->assertNotEquals($ant->getPosition()['x'], 2);
        }
    }
}
