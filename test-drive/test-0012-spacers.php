#!/usr/bin/env php
<?php declare(strict_types=1);

require '../vendor/autoload.php';

$writer = new \IKM\CLI\CommandLineWriter();
$format = new \IKM\CLI\CommandLineFormatter();

// ===========================================



$writer->br();
$writer->br();
$writer->br();

$writer->writeLine('─────────────────────────────────────────────────────');


$writer->br();
$writer->br();
$writer->br();

$writer->writeLine('                      │                      ');
$writer->writeLine('                      │                      ');
$writer->writeLine('───────────────╮      │      ╭───────────────');
$writer->writeLine('               ╰──────┴──────╯               ');




$writer->br();
$writer->br();
$writer->br();

$writer->writeLine('                  │                  ');
$writer->writeLine('                  ┃                  ');
$writer->writeLine('───────────────╮  │  ╭───────────────');
$writer->writeLine('               ╰──┴──╯               ');

