<?php

namespace Tests\Unit;

use App\Classes\Canvas;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LangtonStep14_ChangeAntDirectionTest extends TestCase
{
    /**
     * @return void
     */
    public function testChangeAntDirection()
    {
        $playfield = (new Canvas(2,2))->getPlayfield();
        $ant = $playfield->getAnt();

        $currentDirection = $ant->getDirection();

        // Ant faces north by default;
        $this->assertEquals(0, $ant->getDirection());

        // Attempt to turn to the right.
        $ant->turnRight();
        $this->assertEquals(90, $ant->getDirection());

        // Turn from 90 (east) degrees to 270 (west).
        $ant->turnLeft(2);
        $this->assertEquals(270, $ant->getDirection());
        $this->assertNotEquals(-90, $ant->getDirection());

        // Turn to the south with right turns.
        // Assume that we get 180, not 540.
        $ant->turnRight(3);
        $this->assertEquals(180, $ant->getDirection());
        $this->assertNotEquals(540, $ant->getDirection());
    }
}
