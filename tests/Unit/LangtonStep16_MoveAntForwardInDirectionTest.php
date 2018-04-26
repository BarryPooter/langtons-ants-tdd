<?php

namespace Tests\Unit;

use App\Classes\Canvas;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LangtonStep16_MoveAntForwardInDirectionTest extends TestCase
{
    /**
     * @return void
     */
    public function testMoveAntUpAndDown ()
    {
        $playfield = (new Canvas(2,2))->getPlayfield();
        $ant = $playfield->getAnt();
        $position = $ant->getPosition();

        // Move the ant up or down (depends on its position).
        if (0 === $position['y']) {
            // At top.
            $ant->turnRight(2);
            $this->assertEquals(true, $playfield->moveFoward());
        } else {
            // At bottom.
            $this->assertEquals(true, $playfield->moveFoward());
        }
    }

    /**
     * @return void
     */
    public function testMoveAntLeftAndRight ()
    {
        $playfield = (new Canvas(2,2))->getPlayfield();
        $ant = $playfield->getAnt();
        $position = $ant->getPosition();

        // Move the ant to left or right.
        if (0 === $position['x']) {
            // at left.
            $ant->turnRight();
            $this->assertEquals(true, $playfield->moveFoward());
        } else {
            // at right.
            $ant->turnLeft();
            $this->assertEquals(true, $playfield->moveFoward());
        }
    }
}
