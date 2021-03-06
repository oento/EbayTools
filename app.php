#!/usr/bin/env php
<?php

require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;
use OentoEbayTools\Command\ListingCommand;

$application = new Application();
$application->add(new ListingCommand());
$application->run();