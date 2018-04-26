<?php

namespace Tests\Unit;

use App\Classes\Canvas;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LangtonStep1_CreateCanvasTest extends TestCase
{
    public function setUp()
    {
        // First we initialize a Canvas.
        // We set the height & width directly.
    }

    public function testCreateCanvas ()
    {
        // We want to test if we get a Canvas Object
        // with the given dimensions as its dimensions.
        $this->assertEquals(new Canvas(100, 100), new Canvas(100, 100));

        // Since the above worked, let's see if works with other dimensions,
        // so we can test the flexibility .
        $this->assertEquals(new Canvas(150, 150), new Canvas(150, 150));

        // And test for a difference, assirting non-equality.
        $this->assertNotEquals(new Canvas(100, 100), new Canvas(200, 200));
    }
}
