<?php

namespace Tests\Unit;

use App\Classes\Canvas;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LangtonStep21_CountAntStepsTest extends TestCase
{
    public function testGetStepCount ()
    {
        $playfield = (new Canvas(2,2))->getPlayfield();
        $ant = $playfield->getAnt();

        // We should start with 0.
        $this->assertEquals(0, $ant->getStepCount());

        // Increase the stepCount.
        $ant->increaseStepCount();
        $this->assertNotEquals(0, $ant->getStepCount());
    }
}
