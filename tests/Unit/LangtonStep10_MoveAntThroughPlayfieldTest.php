<?php

namespace Tests\Unit;

use App\Classes\Canvas;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LangtonStep10_MoveAntThroughPlayfieldTest extends TestCase
{
    /**
     * This test will test if an exception is thrown
     * when there is movement not equal to :
     * - up
     * - down
     * - left
     * - right
     */
    public function testMovementThroughPlayfield ()
    {
        $playfield = (new Canvas(2,2))->getPlayfield();
        $position = $playfield->getAnt()->getPosition();

        // Attempt to move in the allowed directions.
        if (0 === $position['y']) {
            $this->assertEquals($playfield->moveAnt('down'), true);
            $this->assertEquals($playfield->moveAnt('up'), true);
        } else {
            $this->assertEquals($playfield->moveAnt('up'), true);
            $this->assertEquals($playfield->moveAnt('down'), true);
        }

        if (0 === $position['x']) {
            $this->assertEquals($playfield->moveAnt('right'), true);
            $this->assertEquals($playfield->moveAnt('left'), true);
        } else {
            $this->assertEquals($playfield->moveAnt('left'), true);
            $this->assertEquals($playfield->moveAnt('right'), true);
        }

        // Now try to move in an illegal direction.
        $this->assertNotEquals($playfield->moveAnt('diagonal'), true);
    }
}
