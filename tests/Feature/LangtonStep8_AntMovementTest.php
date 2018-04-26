<?php

namespace Tests\Feature;

use App\Classes\Ant;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LangtonStep8_AntMovementTest extends TestCase
{
    /**
     * In this test we test wether the Ant
     * is able to move around freely.
     */
    public function testAntMovement ()
    {
        $ant = new Ant(1,1);

        // Get the current Ant coordinates.
        $position = $ant->getPosition();
        $this->assertEquals(['x' => 1, 'y' => 1], $position);

        // Try to move the ant up.
        $position = $ant->getPosition();
        $ant->up();
        $this->assertNotEquals($position, $ant->getPosition());
        $this->assertEquals($position['y']-1, $ant->getPosition()['y']);

        // Move the ant down.
        $position = $ant->getPosition();
        $ant->down();
        $this->assertNotEquals($position, $ant->getPosition());
        $this->assertEquals($position['y']+1, $ant->getPosition()['y']);

        // Move the ant to the left.
        $position = $ant->getPosition();
        $ant->left();
        $this->assertNotEquals($position, $ant->getPosition());
        $this->assertEquals($position['x']-1, $ant->getPosition()['x']);

        // Move the ant to the right.
        $position = $ant->getPosition();
        $ant->right();
        $this->assertNotEquals($position, $ant->getPosition());
        $this->assertEquals($position['x']+1, $ant->getPosition()['x']);
    }
}