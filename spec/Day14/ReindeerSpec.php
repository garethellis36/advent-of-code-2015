<?php

namespace spec\Day14;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ReindeerSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith("Comet", 14, 10, 127);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Day14\Reindeer');
    }

    public function it_should_know_its_name()
    {
        $this->name()->shouldBe("Comet");
    }

    public function it_should_know_its_flying_speed()
    {
        $this->speed()->shouldBe(14);
    }

    public function it_should_know_its_flying_duration()
    {
        $this->durationOfFlight()->shouldBe(10);
    }

    public function it_should_know_its_rest_time()
    {
        $this->restTime()->shouldBe(127);
    }

    public function it_should_know_how_far_it_has_gone_after_a_given_number_of_seconds()
    {
        $this->distanceAfter(10)->shouldBe(140);
    }

    public function it_should_know_how_far_it_has_gone_after_a_given_number_of_seconds_greater_than_its_duration_of_flight()
    {
        $this->distanceAfter(1000)->shouldBe(1120);
    }

    public function it_should_know_the_duration_of_one_flight_cycle()
    {
        $this->flightCycleDuration()->shouldBe(137);
    }

    public function it_should_know_its_distance_per_flight_cycle()
    {
        $this->distancePerFlightCycle()->shouldBe(140);
    }

    public function it_should_know_how_many_flight_cycles_it_can_complete_in_a_given_number_of_seconds()
    {
        $this->numberOfCompletedFlightCycles(300)->shouldBe(2);
    }

    public function it_should_know_how_many_seconds_were_spent_flying_in_an_incomplete_flight_cycle()
    {
        $this->additionalSecondsInFlightOutsideOfACompletedCycle(140)->shouldBe(3);
    }

    public function it_should_know_the_total_number_of_seconds_spent_in_flight()
    {
        $this->secondsInFlight(140)->shouldBe(13);
    }

    public function it_should_have_zero_points_at_start()
    {
        $this->points()->shouldBe(0);
    }

    public function it_should_be_able_to_be_awarded_points()
    {
        $this->awardPoint();
        $this->points()->shouldBe(1);
    }
}
