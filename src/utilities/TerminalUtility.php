<?php

# =======================================
# Copyright (c) 2024 Ian K Maurmann.
# Released under the MIT License.
# =======================================

/**
 * Terminal Utility for IKM/CLI
 * ----------------------------
 *
 */


declare(strict_types=1);


namespace IKM\CLI;


/**
 * Class TerminalUtility
 *
 * Junk drawer to hide random CLI functions used by IKM/CLI
 */
class TerminalUtility
{
    public function __construct()
    {
        // Set object dependencies:
        // Do nothing for now.

        // Set defaults:
        // Do nothing for now.
    }

    /**
     * Get the terminal height in number of lines.
     *
     * @noinspection PhpUnnecessaryLocalVariableInspection
     */
    public function getTerminalWidth(): int
    {
        $width_in_chars = (int) exec('tput cols');

        return $width_in_chars;
    }

    /**
     * Get the terminal height in number of lines.
     *
     * @noinspection PhpUnnecessaryLocalVariableInspection
     */
    public function getTerminalHeight(): int
    {
        $height_in_lines = (int) exec('tput lines');

        return $height_in_lines;
    }
}