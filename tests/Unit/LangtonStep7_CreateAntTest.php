<?php

namespace Tests\Feature;

use App\Classes\Ant;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LangtonStep7_CreateAntTest extends TestCase
{
    public function testAntInstance ()
    {
        // Instantiate a new Ant Object and asserts its Instance.
        $ant = new Ant(1, 1);
        $this->assertInstanceOf(Ant::class, $ant);

        // See if an Ant with the same position is the
        // same as a second Ant with these positions.
        $this->assertEquals($ant, (new Ant(1, 1)));
        $this->assertNotEquals($ant, (new Ant(2, 4)));
    }
}
