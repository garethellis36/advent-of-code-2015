<?php

namespace Day21;

class Game
{
    /**
     * @var TurnTaker
     */
    private $turnTaker;

    public function __construct(TurnTaker $turnTaker)
    {
        $this->turnTaker = $turnTaker;
    }

    /**
     * @param Player $player
     * @param Boss $boss
     *
     * @return PlayerInterface Winner of the game
     */
    public function play(Player $player, Boss $boss)
    {
        $attacker = $player;
        $defender = $boss;

        while (true) {

            //take turn, this will return an updated defender object
            $defender = $this->turnTaker->take($attacker, $defender);

            //check hit points of defender - are they still alive?
            //if not, attacker has won the game
            if ($defender->getHitPoints() <= 0) {
                return $attacker;
            }

            $copy = $attacker;
            $attacker = $defender;
            $defender = $copy;
        }
    }
}
