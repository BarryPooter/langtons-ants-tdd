<?php

namespace App\Classes;

class Playfield
{
    private $playfield;
    private $ant;
    private $playing = false;

    /**
     * Playfield constructor.
     * @param int $height
     * @param int $width
     */
    public function __construct(int $height, int $width)
    {
        $boundaries = [
            'y' => [
                'min' => 0,
                'max' => $height-1
            ],

            'x' => [
                'min' => 0,
                'max' => $width-1
            ]
        ];

        $this->ant = new Ant(rand(0, $width-1), rand(0, $height-1));
        $this->ant->setBoundaries($boundaries);
        $this->_buildPlayfield($height, $width);
    }

    /**
     * @return array
     */
    public function print() : array
    {
        return $this->playfield;
    }

    public function randomize () : bool
    {
        // Spin the ant around a random amount
        // so we can randomize its starting direction.
        // This gives us more interesting outputs :-)
        $this->ant->turnRight(rand(1, 21));
        return true;
    }

    /**
     * Start moving the Ant around the Playfield
     * until it gets stuck and thus can't move.
     */
    public function start () : void
    {
        $this->randomize();
        $this->playing = true;

        while ($this->playing) {
            $this->moveFoward();

            if ($this->ant->isStuck()) {
                $this->playing = false;
            }
        }
    }

    public function isPlaying () : bool
    {
        return $this->playing;
    }

    /**
     * @return array
     */
    public function get () : array
    {
        return $this->playfield;
    }

    /**
     * @param $x
     * @param $y
     * @return Tile
     */
    public function getTileAtPosition($x, $y) :? Tile
    {
        try {
            return $this->playfield[$y][$x];
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return null;
        }
    }

    /**
     * @return Ant
     */
    public function getAnt () : Ant
    {
        return $this->ant;
    }

    /**
     * Move the ant through the Playfield.
     * @param $direction
     * @return bool
     */
    public function moveAnt ($direction) : bool
    {
        $directions = ['up', 'down', 'left', 'right'];

        if (!in_array($direction, $directions)) {
            return false;
        }

        $moved = $this->ant->{$direction}(); // bool

        if (!$moved) {
            return $moved;
        }

        $this->_manipulatePlayfield();
        return $moved;
    }

    /**
     * Move the ant forward into its current direction.
     */
    public function moveFoward ()
    {
        $directions = [0 => 'up', 90 => 'right', 180 => 'down', 270 => 'left', 360 => 'up'];

        if ($this->moveAnt($directions[$this->ant->getDirection()])) {
            $this->ant->increaseStepCount();
        }

        return true;
    }

    /**
     * Turn the ant in another direction and
     * and change the state of the Tile.
     * @return void
     */
    private function _manipulatePlayfield () : void
    {
        $position = $this->ant->getPosition();
        $tile = $this->getTileAtPosition($position['x'], $position['y']);

        // Change the ant direction.
        switch ($tile->getState()) {
            // White Tile.
            case 0:
                $tile->changeState(1);
                $this->ant->turnRight();
                break;

            // Black Tile.
            case 1:
                $tile->changeState(0);
                $this->ant->turnLeft();
                break;
        }
    }

    /**
     * Start building the rows & Tiles based
     * on the available height & width.
     * @param int $height
     * @param int $width
     */
    private function _buildPlayfield(int $height, int $width) : void
    {
        $playfield = [];

        for ($y = 0; $y < $height; $y++) {
            $row = [];

            for ($x = 0; $x < $width; $x++) {
                $row[] = new Tile(0);
            }

            $playfield[] = $row;
        }

        $this->playfield = $playfield;
    }
}