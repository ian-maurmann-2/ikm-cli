#!/usr/bin/env php
<?php declare(strict_types=1);

require '../vendor/autoload.php';

$writer = new \IKM\CLI\CommandLineWriter();
$format = new \IKM\CLI\CommandLineFormatter();
$table_builder = new \IKM\CLI\CommandLineTableBuilder();

// ===========================================

$writer->writeLine('Progress Bar Test');

function drawBar($num_filled, $num_total, $is_first = false)
{
    $writer = new \IKM\CLI\CommandLineWriter();
    $format = new \IKM\CLI\CommandLineFormatter();

    $num_unfilled = $num_total - $num_filled;

    $greens      = $format->bg_dark_green . $format->fg_bright_green . str_repeat('▥', $num_filled  ) . $format->reset;
    $reds        = $format->bg_dark_black . $format->fg_bright_red     . str_repeat('▥', $num_unfilled) . $format->reset;
    $bar_content = $greens . $reds;
    $bar         = "\r" . $bar_content;

    $writer->write($bar);
}




$is_first = true;
$fill = 0;
do {
    drawBar($fill, 40, $is_first);
    $is_first = false;
    $fill++;
    // sleep(1); // 1s
    usleep(100000); // 0.001s
} while ($fill < 41);
$writer->write("\n");








