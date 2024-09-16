#!/usr/bin/env php
<?php declare(strict_types=1);

require 'vendor/autoload.php';

$writer = new \IKM\CLI\CommandLineWriter();
$format = new \IKM\CLI\CommandLineFormatter();

// ===========================================

$writer->writeLine('Clear Screen');

// $writer->write($format->terminal_clear . $format->terminal_cursor_home);

$writer->clearScreen();