<?php
# =======================================
# Copyright (c) 2024-2026 Ian K Maurmann.
# Released under the MIT License.
# =======================================

/**
 * Command-Line Writer
 * -------------------
 *
 * Background:
 * Based on the CLI Writer that I made for Pith Framework, but this one will be more general-use and MIT Licensed.
 *
 * @noinspection PhpPropertyNamingConventionInspection - Short property names are ok.
 * @noinspection PhpMethodNamingConventionInspection   - Long method names are ok.
 */


declare(strict_types=1);


namespace IKM\CLI;


/**
 * Class CommandLineWriter
 */
class CommandLineWriter
{
    private array $writes;
    private \IKM\CLI\TerminalUtility $terminal_utility;

    public function __construct()
    {
        // Set object dependencies:
        $this->terminal_utility = new TerminalUtility();

        // Set defaults:
        $this->writes = [];
    }

    public function write(...$args): void
    {
        foreach ($args as $arg) {
            if (is_object($arg) || is_array($arg) || is_resource($arg)) {
                $output = print_r($arg, true);
            } else {
                $output = (string) $arg;
            }

            // Save output for later
            $this->writes[] = $output;

            // Write to CLI
            fwrite(STDOUT, $output);
        }
    }

    /**
     * Send a log message to the STDOUT stream.
     *
     * @param array<int, mixed> $args
     * @return void
     */
    public function writeLine(...$args): void
    {
        foreach ($args as $arg) {
            if (is_object($arg) || is_array($arg) || is_resource($arg)) {
                $output = print_r($arg, true);
            } else {
                $output = (string) $arg;
            }

            // Save output for later
            $this->writes[] = $output;

            // Write to CLI
            fwrite(STDOUT, $output . "\n");
        }
    }

    /**
     * Clear the screen
     */
    public function clearScreen(): void
    {
        $this->write("\033[2J\033[H");
    }

    /**
     * Break row
     */
    public function hr(): void
    {
        $width = $this->terminal_utility->getTerminalWidth();

        $hr = str_repeat('─', $width);




        $this->write("$hr\n");
    }

    /**
     * Break row
     */
    public function br(): void
    {
        $this->write("\n");
    }

    /**
     * @return array
     */
    public function getWrites(): array
    {
        return $this->writes;
    }


}