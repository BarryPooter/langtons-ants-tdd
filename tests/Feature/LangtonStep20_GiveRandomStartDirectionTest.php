<?php

namespace Tests\Feature;

use App\Classes\Canvas;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LangtonStep20_GiveRandomStartDirectionTest extends TestCase
{
    public function testRandomAntDirection ()
    {
        $playfield = (new Canvas(2,2))->getPlayfield();
        $this->assertEquals(true, $playfield->randomize());
    }
}
