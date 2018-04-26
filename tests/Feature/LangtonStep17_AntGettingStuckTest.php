<?php

namespace Tests\Feature;

use App\Classes\Canvas;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LangtonStep17_AntGettingStuckTest extends TestCase
{
    public function testAntGettingStuck ()
    {
        $playfield = (new Canvas(1,1))->getPlayfield();
        $playfield->moveFoward();

        $this->assertEquals(true, $playfield->getAnt()->isStuck());
    }
}