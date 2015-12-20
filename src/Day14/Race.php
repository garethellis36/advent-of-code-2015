<?php

namespace Day14;

class Race
{
    /**
     * @var array Reindeer[]
     */
    private $herd;

    public function __construct(array $herd)
    {
        $this->herd = $herd;
    }

    /**
     * @param int $duration
     * @param Reindeer
     */
    public function winnerAfter($duration)
    {
        $winner = null;
        foreach ($this->herd as $reindeer) {
            if (!$winner || $reindeer->distanceAfter($duration) > $winner->distanceAfter($duration)) {
                $winner = $reindeer;
            }
        }
        return $winner;
    }

    public function pointsWinnerAfter($duration)
    {
        for ($i = 1; $i <= $duration; $i++) {
            $this->winnerAfter($i)->awardPoint();
        }

        $winner = null;
        foreach ($this->herd as $reindeer) {
            if (!$winner || $reindeer->points() > $winner->points()) {
                $winner = $reindeer;
            }
        }
        return $winner;
    }
}
