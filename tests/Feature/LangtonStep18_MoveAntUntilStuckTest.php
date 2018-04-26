<?php

namespace Tests\Feature;

use App\Classes\Canvas;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LangtonStep18_MoveAntUntilStuckTest extends TestCase
{
    public function testMoveAntUntilStuck ()
    {
        $playfield = (new Canvas(2,2))->getPlayfield();
        $ant = $playfield->getAnt();
        $playfield->start();


        $stopped = false;
        do {
            if (!$playfield->isPlaying()) {
                $stopped = true;
            }
        } while (!$stopped && $playfield->isPlaying());

        $this->assertEquals(true, $stopped);
    }
}
