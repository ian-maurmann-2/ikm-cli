<?php
# =======================================
# Copyright (c) 2024 Ian K Maurmann.
# Released under the MIT License.
# =======================================

/**
 * Command-Line Table Builder
 * --------------------------
 *
 * Background:
 * Based on the CliTableUtility that I wrote for made-up-word-generator
 *
 * @noinspection PhpPropertyNamingConventionInspection      - Long property names are ok.
 * @noinspection PhpMethodNamingConventionInspection        - Long method names are ok.
 * @noinspection PhpVariableNamingConventionInspection      - Short variable names are ok.
 * @noinspection PhpUnnecessaryLocalVariableInspection      - Ignore for readability.
 * @noinspection PhpArrayShapeAttributeCanBeAddedInspection - Ignore shape for now, add later.
 * @noinspection PhpIllegalPsrClassPathInspection           - Ignore, using PSR 4 not 0.
 */


declare(strict_types=1);


namespace IKM\CLI;


use Exception;


/**
 * Class CommandLineTableBuilder
 */
class CommandLineTableBuilder
{
    private \IKM\CLI\CommandLineWriter $cli_writer;

    public function __construct()
    {
        // Set object dependencies:
        $this->cli_writer = new \IKM\CLI\CommandLineWriter();
    }


    public function buildTableOld($table_info)
    {
        // Objects
        $format = new \IKM\CLI\CommandLineFormatter();

        // Get info
        $data                            = $table_info['data'] ?? [];
        $heading_top                     = $table_info['heading_top'] ?? [];
        $table_text_align                = $table_info['table_text_align'] ?? STR_PAD_RIGHT;
        $heading_top_text_align          = $table_info['heading_top_text_align'] ?? STR_PAD_BOTH;
        $columns_align_center            = $table_info['columns_align_center'] ?? [];
        $columns_color_bright_yellow     = $table_info['columns_color_bright_yellow'] ?? [];
        $columns_highlight_1_bright_cyan = $table_info['columns_highlight_1_bright_cyan'] ?? [];
        $has_heading_top                 = is_array($heading_top) && count($heading_top);


        $this->cli_writer->writeLine('Building table.......');

        if($has_heading_top){
            array_unshift($data, $heading_top);
        }


        //error_log(print_r($data,true));

        $size_info   = $this->getColAndRowSizes($data);
        $col_lengths = $size_info['col_lengths'];
        $row_heights = $size_info['row_heights'];
        $num_cols    = count($col_lengths);
        $num_rows    = count($row_heights);

        $current_row_number = 0;
        foreach ($data as $row_index => $row){
            $current_row_number++;
            $has_line_to_add  = true;
            $current_sub_line = 0;
            while($has_line_to_add) {
                $has_line_to_add = false;

                // ────────────────────────────────────────────────────────────────────
                // TOP LINE

                if ($current_row_number === 1 && $current_sub_line === 0) {

                    // Top Line
                    $is_first_col = true;
                    foreach ($row as $col_index => $cell_data) {
                        if ($is_first_col) {
                            $is_first_col = false;

                            // Top left corner
                            $this->cli_writer->write('┌');
                        } else {
                            // Top intersection
                            $this->cli_writer->write('┬');
                        }
                        // Top line over col
                        $line = str_repeat('─', $col_lengths[$col_index]);
                        $this->cli_writer->write($line);
                    }

                    // Top right corner
                    $this->cli_writer->write('┐' . "\n");
                }



                // ────────────────────────────────────────────────────────────────────
                // MIDDLE LINE

                if ($current_row_number !== 1 && $current_sub_line === 0) {

                    // Top Line
                    $is_first_col = true;
                    foreach ($row as $col_index => $cell_data) {
                        if ($is_first_col) {
                            $is_first_col = false;

                            // Left intersection
                            $this->cli_writer->write('├');
                        } else {
                            // Middle intersection
                            $this->cli_writer->write('┼');
                        }
                        // Middle border between rows
                        $line = str_repeat('─', $col_lengths[$col_index]);
                        $this->cli_writer->write($line);
                    }

                    // Right intersection
                    $this->cli_writer->write('┤' . "\n");
                }


                // ────────────────────────────────────────────────────────────────────
                // TEXT LINE

                // Text Line
                $is_first_col = true;
                foreach ($row as $col_index => $cell_data) {
                    if ($is_first_col) {
                        $is_first_col = false;

                        // Left side
                        $this->cli_writer->write('│');
                    } else {
                        // Inside Col Border
                        $this->cli_writer->write('│');
                    }
                    // Text
                    $is_header                      = $has_heading_top && $row_index === 0;
                    $cell_text_align                = $table_text_align;
                    $is_col_aligned_center          = in_array($col_index, $columns_align_center);
                    $is_col_color_bright_yellow     = in_array($col_index, $columns_color_bright_yellow);
                    $is_col_highlight_1_bright_cyan = in_array($col_index, $columns_highlight_1_bright_cyan);

                    // Text alignment
                    if($is_header){
                        $cell_text_align = $heading_top_text_align;
                    }
                    elseif ($is_col_aligned_center){
                        $cell_text_align = STR_PAD_BOTH;
                    }

                    // Text
                    $cell_sub_lines      = explode("\n", (string) $cell_data);
                    $cell_sub_line_text  = $cell_sub_lines[$current_sub_line] ?? '';

                    // Color
                    if(!$is_header) {
                        if ($is_col_color_bright_yellow) {
                            $cell_sub_line_text = $format->fg_bright_yellow . $cell_sub_line_text . $format->reset;
                        }
                    }

                    // Highlight
                    if(!$is_header) {
                        if ($is_col_highlight_1_bright_cyan) {
                            $cell_sub_line_text = str_replace('{',$format->fg_bright_cyan, $cell_sub_line_text);
                            $cell_sub_line_text = str_replace('}',$format->reset, $cell_sub_line_text);
                        }
                    }

                    // Tabs
                    $cell_sub_line_text = str_replace("\t",'    ', $cell_sub_line_text);


                    $line                = $this->mb_str_pad($cell_sub_line_text, $col_lengths[$col_index], ' ', $cell_text_align);
                    $last_sub_line_index = count($cell_sub_lines) - 1;

                    if($current_sub_line < $last_sub_line_index){
                        $has_line_to_add  = true;
                    }

                    //$line = str_repeat('X', $col_lengths[$col_index]);

                $this->cli_writer->write($line);
            }

                // Top right corner
                $this->cli_writer->write('│' . "\n");

                // ────────────────────────────────────────────────────────────────────
                // BOTTOM LINE

                // $is_bottom = $row_index >= $num_rows - ($has_heading_top ? 0 : 1) && !$has_line_to_add;
                //$is_bottom = $current_row_number > $num_rows && !$has_line_to_add;
                $is_bottom = $current_row_number > $num_rows - ($has_heading_top ? 0 : 1) && !$has_line_to_add;
                //$is_bottom = ($current_row_number === $num_rows) && !$has_line_to_add;
                $is_bottom = false;


                $next_row        = $data[$row_index +1] ?? [];
                $has_another_row = count($next_row);
                $is_bottom       = !$has_another_row && !$has_line_to_add;

                if ($is_bottom) {
                    // Bottom Line
                    $is_first_col = true;
                    foreach ($row as $col_index => $cell_data) {
                        if ($is_first_col) {
                            $is_first_col = false;

                            // Bottom left corner
                            $this->cli_writer->write('└');
                        } else {
                            // Bottom intersection
                            $this->cli_writer->write('┴');
                        }
                        // Bottom line under col
                        $line = str_repeat('─', $col_lengths[$col_index]);
                        $this->cli_writer->write($line);
                    }

                    // Bottom right corner
                    $this->cli_writer->write('┘' . "\n");
                }

                $current_sub_line++;
            }
        }
    }

    private function getColAndRowSizes(array $data): array
    {
        $col_lengths = [];
        $row_heights = [];

        foreach ($data as $row_index => $row){
            foreach ($row as $col_index => $cell){
                $col_length_so_far    = $col_lengths[$col_index] ?? 0;
                $row_height_so_far    = $row_heights[$row_index] ?? 0;
                $cell_text            = (string) $cell;
                $cell_lines           = explode("\n", $cell_text);
                $cell_height          = mb_substr_count($cell_text, "\n");
                $escapes              = $this->getCliFormattingEscapes();
                $cell_lines_clean     = str_replace($escapes, "", $cell_lines);// Remove escapes
                $cell_lines_clean     = str_replace(["\n", '{', '}'], "", $cell_lines_clean);// Remove braces
                $cell_lines_clean     = str_replace("\t",'    ', $cell_lines_clean); // Replace tabs with 4 spaces
                $cell_max_line_length = max(array_map('grapheme_strlen', $cell_lines_clean));

                // Update col size if needed
                if($cell_max_line_length > $col_length_so_far){
                    $col_lengths[$col_index] = $cell_max_line_length;
                }

                // Update row size if needed
                if($cell_height > $row_height_so_far){
                    $row_heights[$row_index] = $cell_height;
                }
            }
        }

        return [
            'col_lengths' => $col_lengths,
            'row_heights' => $row_heights,
        ];
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
    private function mb_str_pad(string $input,int $length, string $padding = ' ', int $padType = STR_PAD_RIGHT, string $encoding = 'UTF-8')
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


    public function getCliFormattingEscapes(){
        return [
            "\033[0m",

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



}