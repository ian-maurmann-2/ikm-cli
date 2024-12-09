#!/usr/bin/env php
<?php declare(strict_types=1);

require '../vendor/autoload.php';

$writer = new \IKM\CLI\CommandLineWriter();
$format = new \IKM\CLI\CommandLineFormatter();
$table_builder = new \IKM\CLI\CommandLineTableBuilder();

// ===========================================

function drawSpinner($frame_num)
{
    $writer = new \IKM\CLI\CommandLineWriter();
    $format = new \IKM\CLI\CommandLineFormatter();

    $reset  = $format->reset;
    $cyan   = $format->fg_bright_cyan;
    $white  = $format->fg_bright_white;
    $green  = $format->fg_bright_green;
    $yellow = $format->fg_bright_yellow;

    $frames = [
        "{$cyan}⠉{$white}⠉\n{$yellow}⠀{$green}⠀{$reset} Running... ",
        "{$cyan}⠈{$white}⠙\n{$yellow}⠀{$green}⠀{$reset} Running... ",
        "{$cyan}⠀{$white}⠹\n{$yellow}⠀{$green}⠀{$reset} Running... ",
        "{$cyan}⠀{$white}⢸\n{$yellow}⠀{$green}⠀{$reset} Running... ",
        "{$cyan}⠀{$white}⢰\n{$yellow}⠀{$green}⠈{$reset} Running... ",
        "{$cyan}⠀{$white}⢠\n{$yellow}⠀{$green}⠘{$reset} Running... ",
        "{$cyan}⠀{$white}⢀\n{$yellow}⠀{$green}⠸{$reset} Running... ",
        "{$cyan}⠀{$white}⠀\n{$yellow}⠀{$green}⢸{$reset} Running... ",
        "{$cyan}⠀{$white}⠀\n{$yellow}⠀{$green}⣰{$reset} Running... ",
        "{$cyan}⠀{$white}⠀\n{$yellow}⢀{$green}⣠{$reset} Running... ",
        "{$cyan}⠀{$white}⠀\n{$yellow}⣀{$green}⣀{$reset} Running... ",
        "{$cyan}⠀{$white}⠀\n{$yellow}⣄{$green}⡀{$reset} Running... ",
        "{$cyan}⠀{$white}⠀\n{$yellow}⣆{$green}⠀{$reset} Running... ",
        "{$cyan}⠀{$white}⠀\n{$yellow}⡇{$green}⠀{$reset} Running... ",
        "{$cyan}⡀{$white}⠀\n{$yellow}⠇{$green}⠀{$reset} Running... ",
        "{$cyan}⡄{$white}⠀\n{$yellow}⠃{$green}⠀{$reset} Running... ",
        "{$cyan}⡆{$white}⠀\n{$yellow}⠁{$green}⠀{$reset} Running... ",
        "{$cyan}⡇{$white}⠀\n{$yellow}⠀{$green}⠀{$reset} Running... ",
        "{$cyan}⠏{$white}⠀\n{$yellow}⠀{$green}⠀{$reset} Running... ",
        "{$cyan}⠋{$white}⠁\n{$yellow}⠀{$green}⠀{$reset} Running... ",
    ];

    $writer->write("\r" . $format->terminalCursorUp(0) . $frames[$frame_num]);
}


$writer->br();

$is_first = true;
$fill = 0;
$writer->write($format->terminal_cursor_save_position);
do {
    drawSpinner($fill % 19);
    $is_first = false;
    $fill++;
    // sleep(1); // 1s
    usleep(150000); // 0.001s
} while ($fill < 41);
$writer->write("\r" . $format->terminal_erase_line . $format->terminalCursorUp(0) . $format->terminal_erase_line . "Done");
$writer->br();








