<?php

namespace OentoEbayTools\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ListingCommand extends Command
{
    protected function configure()
    {
        $this->setName("oento:ebay:listing")
            ->setDescription("Retrieve listing's number of sold items")
            ->addOption("item", null, InputOption::VALUE_REQUIRED, "enter listing id", "111001403497")
        ;
    }


    /**
     * @return array
     */
    public static function getItemSoldNumber($item)
    {

		$content = file_get_contents("http://www.ebay.co.uk/itm/$item");
		$s1 = substr( $content, strpos( $content, "qtyTxt" ), 500 );

		$p1 = strpos($s1, 'item='.$item.'">')+strlen('item='.$item.'">');
		$s2 = substr( $s1, $p1, strpos( $s1, " sold" ) - $p1 );

		$sold = (int) str_replace(",","",strip_tags($s2));

        return $sold;
    }


    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return integer
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $item = $input->getOption('item');
		$sold = $this->getItemSoldNumber($item);

		$output->writeln("Sold: $sold");

    }

}
