<?php
namespace spec\OentoEbayTools\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use PhpSpec\ObjectBehavior;

class ListingCommandSpec extends ObjectBehavior
{
    function it_is_a_command()
    {
        $this->shouldHaveType('Symfony\Component\Console\Command\Command');
    }

    function it_retrieves_number_of_sold_items()
    {
        $this->getItemSoldNumber('111001403497')->shouldBeInt();
    }
}