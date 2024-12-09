#!/usr/bin/env php
<?php declare(strict_types=1);

require 'vendor/autoload.php';

$writer = new \IKM\CLI\CommandLineWriter();
$format = new \IKM\CLI\CommandLineFormatter();

// ===========================================

$writer->writeLine('ASCII Colors:');

$writer->writeLine('    ' . $format->fg_dark_black     . ' Dark Black     ' . $format->reset . ' ' . $format->bg_dark_black     . ' Dark Black     ' . $format->reset);
$writer->writeLine('    ' . $format->fg_dark_red       . ' Dark Red       ' . $format->reset . ' ' . $format->bg_dark_red       . ' Dark Red       ' . $format->reset);
$writer->writeLine('    ' . $format->fg_dark_green     . ' Dark Green     ' . $format->reset . ' ' . $format->bg_dark_green     . ' Dark Green     ' . $format->reset);
$writer->writeLine('    ' . $format->fg_dark_yellow    . ' Dark Yellow    ' . $format->reset . ' ' . $format->bg_dark_yellow    . ' Dark Yellow    ' . $format->reset);
$writer->writeLine('    ' . $format->fg_dark_blue      . ' Dark Blue      ' . $format->reset . ' ' . $format->bg_dark_blue      . ' Dark Blue      ' . $format->reset);
$writer->writeLine('    ' . $format->fg_dark_magenta   . ' Dark Magenta   ' . $format->reset . ' ' . $format->bg_dark_magenta   . ' Dark Magenta   ' . $format->reset);
$writer->writeLine('    ' . $format->fg_dark_cyan      . ' Dark Cyan      ' . $format->reset . ' ' . $format->bg_dark_cyan      . ' Dark Cyan      ' . $format->reset);
$writer->writeLine('    ' . $format->fg_dark_white     . ' Dark White     ' . $format->reset . ' ' . $format->bg_dark_white     . ' Dark White     ' . $format->reset);
$writer->writeLine('    ' . $format->fg_bright_black   . ' Bright Black   ' . $format->reset . ' ' . $format->bg_bright_black   . ' Bright Black   ' . $format->reset);
$writer->writeLine('    ' . $format->fg_bright_red     . ' Bright Red     ' . $format->reset . ' ' . $format->bg_bright_red     . ' Bright Red     ' . $format->reset);
$writer->writeLine('    ' . $format->fg_bright_green   . ' Bright Green   ' . $format->reset . ' ' . $format->bg_bright_green   . ' Bright Green   ' . $format->reset);
$writer->writeLine('    ' . $format->fg_bright_yellow  . ' Bright Yellow  ' . $format->reset . ' ' . $format->bg_bright_yellow  . ' Bright Yellow  ' . $format->reset);
$writer->writeLine('    ' . $format->fg_bright_blue    . ' Bright Blue    ' . $format->reset . ' ' . $format->bg_bright_blue    . ' Bright Blue    ' . $format->reset);
$writer->writeLine('    ' . $format->fg_bright_magenta . ' Bright Magenta ' . $format->reset . ' ' . $format->bg_bright_magenta . ' Bright Magenta ' . $format->reset);
$writer->writeLine('    ' . $format->fg_bright_cyan    . ' Bright Cyan    ' . $format->reset . ' ' . $format->bg_bright_cyan    . ' Bright Cyan    ' . $format->reset);
$writer->writeLine('    ' . $format->fg_bright_white   . ' Bright White   ' . $format->reset . ' ' . $format->bg_bright_white   . ' Bright White   ' . $format->reset);
