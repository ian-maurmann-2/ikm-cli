<?php
# =======================================
# Copyright (c) 2024 Ian K Maurmann.
# Released under the MIT License.
# =======================================

/**
 * Command-Line Formatter
 * ----------------------
 *
 * Background:
 * Based on the CLI Format utility that I made for Pith Framework, but this one will be more general-use and MIT Licensed.
 *
 * @noinspection PhpPropertyNamingConventionInspection - Short property names are ok.
 * @noinspection PhpMethodNamingConventionInspection   - Long method names are ok.
 */


declare(strict_types=1);


namespace IKM\CLI;


/**
 * Class CommandLineFormatter
 */
class CommandLineFormatter
{
    // Escape
    public string $escape = "\033";

    // Control Sequence Introducer
    public string $csi = "\033[";

    // Reset
    public string $reset = "\033[0m";

    // Formatting
    public string $bold      = "\033[1m";
    public string $dim       = "\033[2m";
    public string $italic    = "\033[3m";
    public string $underline = "\033[4m";
    public string $blink     = "\033[5m";
    public string $reverse   = "\033[6m";
    public string $invisible = "\033[7m";

    // Foreground Dark
    public string $fg_dark_black   = "\033[30m";
    public string $fg_dark_red     = "\033[31m";
    public string $fg_dark_green   = "\033[32m";
    public string $fg_dark_yellow  = "\033[33m";
    public string $fg_dark_blue    = "\033[34m";
    public string $fg_dark_magenta = "\033[35m";
    public string $fg_dark_cyan    = "\033[36m";
    public string $fg_dark_white   = "\033[37m";

    // Background Dark
    public string $bg_dark_black   = "\033[40m";
    public string $bg_dark_red     = "\033[41m";
    public string $bg_dark_green   = "\033[42m";
    public string $bg_dark_yellow  = "\033[43m";
    public string $bg_dark_blue    = "\033[44m";
    public string $bg_dark_magenta = "\033[45m";
    public string $bg_dark_cyan    = "\033[46m";
    public string $bg_dark_white   = "\033[47m";

    // Foreground Bright
    public string $fg_bright_black   = "\033[90m";
    public string $fg_bright_red     = "\033[91m";
    public string $fg_bright_green   = "\033[92m";
    public string $fg_bright_yellow  = "\033[93m";
    public string $fg_bright_blue    = "\033[94m";
    public string $fg_bright_magenta = "\033[95m";
    public string $fg_bright_cyan    = "\033[96m";
    public string $fg_bright_white   = "\033[97m";

    // Background Bright
    public string $bg_bright_black   = "\033[100m";
    public string $bg_bright_red     = "\033[101m";
    public string $bg_bright_green   = "\033[102m";
    public string $bg_bright_yellow  = "\033[103m";
    public string $bg_bright_blue    = "\033[104m";
    public string $bg_bright_magenta = "\033[105m";
    public string $bg_bright_cyan    = "\033[106m";
    public string $bg_bright_white   = "\033[107m";

    // Terminal control
    public string $terminal_clear = "\033[2J";
    public string $terminal_erase_line = "\033[2K";

    // Terminal Cursor control
    public string $terminal_cursor_home                = "\033[H";
    public string $terminal_cursor_save_position       = "\033[s";
    public string $terminal_cursor_goto_saved_position = "\033[u";

    public string $previous = '';

    public function __construct()
    {
        // Set object dependencies:
        // Do nothing for now.

        // Set defaults:
        // Do nothing for now.
    }

    public function terminalScrollUp($number_of_lines)
    {
        return "\033[" . $number_of_lines . "K";
    }

    public function terminalCursorUp($number_of_lines)
    {
        return "\033[" . $number_of_lines . "A";
    }

    public function setPrevious(string $character_sequence)
    {
        $this->previous = $character_sequence;
    }



}