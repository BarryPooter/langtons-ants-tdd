<?php

namespace Tests\Unit;

use App\Classes\Canvas;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LangtonStep19_PrintPlayfieldTest extends TestCase
{
    public function testPrintArray(): void
    {
        $playfield = (new Canvas(2, 2))->getPlayfield();
        $this->assertEquals(true, is_array($playfield->print()));
        $this->assertEquals(true, !empty($playfield->print()));
    }
}