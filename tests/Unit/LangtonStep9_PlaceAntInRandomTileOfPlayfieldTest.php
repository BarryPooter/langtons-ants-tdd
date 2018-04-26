<?php

namespace Tests\Unit;

use App\Classes\Ant;
use App\Classes\Canvas;
use App\Classes\Playfield;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LangtonStep9PlaceAntInRandomTileOfPlayfieldTest extends TestCase
{
    public function testPlayerSpawningOnRandomTile ()
    {
        // Generate a playfield through a Canvas.
        $playfield = $this->_generatePlayfield(10, 10);
        $this->assertInstanceOf(Playfield::class, $playfield);

        // Get the Ant that's in the Playfield.
        $ant = $playfield->getAnt();
        $this->assertInstanceOf(Ant::class, $ant);

        // Create another Canvas and grab the Ant for that instance.
        $playfield2 = $this->_generatePlayfield(10, 10);

        // Generate another playfield if the two are exactly the same.
        // This is a consequence of testing randomness :-)
        do {
            $playfield2 = $this->_generatePlayfield(10, 10);
        } while ($playfield2 === $playfield);

        $ant2 = $playfield2->getAnt();

        // See if a different spawnpoint has been generated.
        $this->assertNotEquals($ant->getPosition(), $ant2->getPosition());
    }

    /**
     * This method is used to quickly generate a new Playfield.
     * It's added because there is a small change that the
     * first and second playfield ARE equal.
     * @param int $height
     * @param int $width
     * @return Playfield
     */
    private function _generatePlayfield(int $height, int $width) : Playfield
    {
        return (new Canvas($height, $width))->getPlayfield();
    }
}
