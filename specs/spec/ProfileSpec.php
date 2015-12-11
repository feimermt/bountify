<?php

namespace spec\Bountify;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProfileSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Bountify\Profile');
    }
	function It_has_Address()
	{
		$this->phone_number='800  South Main street Harrisonburg VA';
		$this->save()->shouldHaveType('Bountify\Profile');
	}
	function It_has_Phone_number()
	{
		$this->It_has_Address='516-761-2720';
		$this->save()->shouldHaveType('Bountify\Profile');
	}
}