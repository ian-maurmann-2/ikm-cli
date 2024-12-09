#!/usr/bin/env php
<?php declare(strict_types=1);

require 'vendor/autoload.php';

$writer = new \IKM\CLI\CommandLineWriter();
$format = new \IKM\CLI\CommandLineFormatter();
$table_builder = new \IKM\CLI\CommandLineTableBuilder();

// ===========================================

$writer->writeLine('Progress Bar Test');

function drawSpinner($frame_num)
{
    $writer = new \IKM\CLI\CommandLineWriter();
    $format = new \IKM\CLI\CommandLineFormatter();

    $frames = [
        'Running...  ⣏⠀  ',
        'Running...  ⡏⠁  ',
        'Running...  ⠏⠉  ',
        'Running...  ⠋⠙  ',
        'Running...  ⠉⠹  ',
        'Running...  ⠈⢹  ',
        'Running...  ⠀⣹  ',
        'Running...  ⢀⣸  ',
        'Running...  ⣀⣰  ',
        'Running...  ⣄⣠  ',
        'Running...  ⣆⣀  ',
        'Running...  ⣇⡀  ',
    ];

    $writer->write("\r" . $frames[$frame_num]);
}




$is_first = true;
$fill = 0;
do {
    drawSpinner($fill % 12);
    $is_first = false;
    $fill++;
    // sleep(1); // 1s
    usleep(150000); // 0.001s
} while ($fill < 41);
$writer->write("\r" . $format->terminal_erase_line . "Done");
$writer->br();








