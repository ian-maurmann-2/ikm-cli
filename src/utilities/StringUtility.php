<?php

# =======================================
# Copyright (c) 2024 Ian K Maurmann.
# Released under the MIT License.
# =======================================

/**
 * String Utility for IKM/CLI
 * --------------------------
 *
 */


declare(strict_types=1);


namespace IKM\CLI;


/**
 * Class StringUtility
 *
 * Junk drawer to hide string functions used by IKM/CLI
 */
class StringUtility
{
    public function __construct()
    {
        // Set object dependencies:
        // Do nothing for now.

        // Set defaults:
        // Do nothing for now.
    }

    /**
     * From: https://gist.github.com/rquadling/c9ff12755fc412a6f0d38f6ac0d24fb1
     * See: https://gist.github.com/nebiros/226350
     *
     * Multibyte String Pad
     *
     * Functionally, the equivalent of the standard str_pad function, but is capable of successfully padding multibyte strings.
     *
     * @param string $input The string to be padded.
     * @param int $length The length of the resultant padded string.
     * @param string $padding The string to use as padding. Defaults to space.
     * @param int $padType The type of padding. Defaults to STR_PAD_RIGHT.
     * @param string $encoding The encoding to use, defaults to UTF-8.
     *
     * @return string A padded multibyte string.
     */
    public function mb_str_pad(string $input,int $length, string $padding = ' ', int $padType = STR_PAD_RIGHT, string $encoding = 'UTF-8') : string
    {
        $result          = $input;
        $escapes         = $this->getCliFormattingEscapes();
        $input_clean     = str_replace($escapes, '', $input); // Remove escapes
        $input_clean     = str_replace(["\n", '{', '}'], '', $input_clean); // Remove braces
        $input_clean     = str_replace("\t",'    ', $input_clean); // Replace tabs with 4 spaces
        $paddingRequired = $length - grapheme_strlen($input_clean);

        if ($paddingRequired > 0) {
            switch ($padType) {
                case STR_PAD_LEFT:
                    $result =
                        mb_substr(str_repeat($padding, (int) $paddingRequired), 0, (int) $paddingRequired, $encoding).
                        $input;
                    break;
                case STR_PAD_RIGHT:
                    $result =
                        $input.
                        mb_substr(str_repeat($padding, (int) $paddingRequired), 0, (int) $paddingRequired, $encoding);
                    break;
                case STR_PAD_BOTH:
                    $leftPaddingLength = floor($paddingRequired / 2);
                    $rightPaddingLength = $paddingRequired - $leftPaddingLength;
                    $result =
                        mb_substr(str_repeat($padding, (int) $leftPaddingLength), 0, (int) $leftPaddingLength, $encoding).
                        $input.
                        mb_substr(str_repeat($padding, (int) $rightPaddingLength), 0, (int) $rightPaddingLength, $encoding);
                    break;
            }
        }

        return $result;
    }

    public function getCliFormattingEscapes(): array
    {
        return [
            "\033[0m",

            "\033[1m",
            "\033[2m",
            "\033[3m",
            "\033[4m",
            "\033[5m",
            "\033[6m",
            "\033[7m",

            "\033[30m",
            "\033[31m",
            "\033[32m",
            "\033[33m",
            "\033[34m",
            "\033[35m",
            "\033[36m",
            "\033[37m",

            "\033[40m",
            "\033[41m",
            "\033[42m",
            "\033[43m",
            "\033[44m",
            "\033[45m",
            "\033[46m",
            "\033[47m",

            "\033[90m",
            "\033[91m",
            "\033[92m",
            "\033[93m",
            "\033[94m",
            "\033[95m",
            "\033[96m",
            "\033[97m",

            "\033[100m",
            "\033[101m",
            "\033[102m",
            "\033[103m",
            "\033[104m",
            "\033[105m",
            "\033[106m",
            "\033[107m",
        ];
    }

    /**
     * @noinspection PhpDuplicateMatchArmBodyInspection - For readability.
     * @noinspection PhpUnnecessaryLocalVariableInspection - For readability.
     */
    public function alignmentToPaddingDirection(string $alignment): int
    {
        $pad_direction = match ($alignment) {
            'left'   => STR_PAD_RIGHT, // Align left by padding the right
            'right'  => STR_PAD_LEFT,  // Align right by padding the left
            'center' => STR_PAD_BOTH,
            default  => STR_PAD_RIGHT,
        };

        return $pad_direction;
    }

}