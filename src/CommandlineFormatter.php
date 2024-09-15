<?php
# =======================================
# Copyright (c) 2024 Ian K Maurmann.
# Released under the MIT License.
# =======================================

/**
 * Command-Line Formatter
 * ---------------
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
    // Reset
    public string $reset = "\033[0m";

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

    public function __construct()
    {
        // Set object dependencies:
        // Do nothing for now.

        // Set defaults:
        // Do nothing for now.
    }



}