<?php

namespace spec\Day9;

use Day9\CitiesCollection;
use Day9\Permutations;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Day9\SantaJourney;
use Day9\City;

/**
 * Sample data used in examples:
 *	London to Dublin = 464
 *  London to Belfast = 518
 *	Dublin to Belfast = 141
 *
 * The possible routes are therefore:
 *
 * Dublin -> London -> Belfast = 982
 * London -> Dublin -> Belfast = 605
 * London -> Belfast -> Dublin = 659
 * Dublin -> Belfast -> London = 659
 * Belfast -> Dublin -> London = 605
 * Belfast -> London -> Dublin = 982
 *
 * The shortest of these is London -> Dublin -> Belfast = 605, and so the answer is 605 in this example.*
 */
class JourneyPlannerSpec extends ObjectBehavior
{
	public function let(Permutations $calc, CitiesCollection $cities)
	{
		$this->beConstructedWith($calc, $cities);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Day9\JourneyPlanner');
    }

	public function it_should_be_able_to_calculate_the_shortest_possible_route(Permutations $calc, CitiesCollection $cities, City $london, City $belfast, City $dublin)
	{
		$london->beConstructedWith(["London", [
			"Dublin" => 464,
			"Belfast" => 518,
		]]);

		$london->distanceTo("Belfast")->shouldBeCalled()->willReturn(518);
		$london->distanceTo("Dublin")->shouldBeCalled()->willReturn(464);
		$london->getName()->shouldBeCalled()->willReturn("London");

		$belfast->beConstructedWith(["Belfast", [
			"Dublin" => 141,
			"London" => 518,
		]]);

		$belfast->getName()->shouldBeCalled()->willReturn("Belfast");
		$belfast->distanceTo("Dublin")->shouldBeCalled()->willReturn(141);
		$belfast->distanceTo("London")->shouldBeCalled()->willReturn(518);

		$dublin->beConstructedWith(["Dublin", [
			"London" => 464,
			"Belfast" => 141,
		]]);

		$dublin->distanceTo("Belfast")->shouldBeCalled()->willReturn(141);
		$dublin->distanceTo("London")->shouldBeCalled()->willReturn(464);
		$dublin->getName()->shouldBeCalled()->willReturn("Dublin");


		$keys = [0,1,2];
		$cities->keys()->shouldBeCalled()->willReturn($keys);

		$cities->offsetGet(0)->shouldBeCalled()->willReturn($london);
		$cities->offsetGet(1)->shouldBeCalled()->willReturn($belfast);
		$cities->offsetGet(2)->shouldBeCalled()->willReturn($dublin);

		$calc->calculate($keys)->shouldBeCalled()->willReturn([
			[0,1,2],
			[0,2,1],
			[1,2,0],
			[1,0,2],
			[2,1,0],
			[2,0,1],
		]);

		$shortestJourney = $this->calculateShortestRoute();
		$shortestJourney->shouldBeAnInstanceOf(SantaJourney::class);
		$shortestJourney->distance()->shouldBe(605);
	}

	public function it_should_be_able_to_calculate_the_longest_possible_route(Permutations $calc, CitiesCollection $cities, City $london, City $belfast, City $dublin)
	{
		$london->beConstructedWith(["London", [
			"Dublin" => 464,
			"Belfast" => 518,
		]]);

		$london->distanceTo("Belfast")->shouldBeCalled()->willReturn(518);
		$london->distanceTo("Dublin")->shouldBeCalled()->willReturn(464);
		$london->getName()->shouldBeCalled()->willReturn("London");

		$belfast->beConstructedWith(["Belfast", [
			"Dublin" => 141,
			"London" => 518,
		]]);

		$belfast->getName()->shouldBeCalled()->willReturn("Belfast");
		$belfast->distanceTo("Dublin")->shouldBeCalled()->willReturn(141);
		$belfast->distanceTo("London")->shouldBeCalled()->willReturn(518);

		$dublin->beConstructedWith(["Dublin", [
			"London" => 464,
			"Belfast" => 141,
		]]);

		$dublin->distanceTo("Belfast")->shouldBeCalled()->willReturn(141);
		$dublin->distanceTo("London")->shouldBeCalled()->willReturn(464);
		$dublin->getName()->shouldBeCalled()->willReturn("Dublin");


		$keys = [0,1,2];
		$cities->keys()->shouldBeCalled()->willReturn($keys);

		$cities->offsetGet(0)->shouldBeCalled()->willReturn($london);
		$cities->offsetGet(1)->shouldBeCalled()->willReturn($belfast);
		$cities->offsetGet(2)->shouldBeCalled()->willReturn($dublin);

		$calc->calculate($keys)->shouldBeCalled()->willReturn([
			[0,1,2],
			[0,2,1],
			[1,2,0],
			[1,0,2],
			[2,1,0],
			[2,0,1],
		]);

		$longestJourney = $this->calculateLongestRoute();
		$longestJourney->shouldBeAnInstanceOf(SantaJourney::class);
		$longestJourney->distance()->shouldBe(982);
	}
}
