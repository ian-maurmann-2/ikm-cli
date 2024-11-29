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
    private \IKM\CLI\CommandLineWriter    $cli_writer;
    private \IKM\CLI\StringUtility        $string_utility;
    private \IKM\CLI\CommandLineFormatter $cli_formatter;

    public function __construct()
    {
        // Set object dependencies:
        $this->cli_writer     = new \IKM\CLI\CommandLineWriter();
        $this->string_utility = new \IKM\CLI\StringUtility();
        $this->cli_formatter  = new \IKM\CLI\CommandLineFormatter();
    }


    public function buildTableOld($table_info)
    {
        // Objects
        $format = new \IKM\CLI\CommandLineFormatter();

        // Get info
        $data                            = $table_info['data'] ?? [];
        $heading_top                     = $table_info['heading_top'] ?? [];
        $table_text_align_string         = $table_info['table_text_align'] ?? 'left';
        $heading_top_text_align_string   = $table_info['heading_top_text_align'] ?? 'left';
        $columns_align_center            = $table_info['columns_align_center'] ?? [];
        $columns_color_bright_yellow     = $table_info['columns_color_bright_yellow'] ?? [];
        $columns_highlight_1_bright_cyan = $table_info['columns_highlight_1_bright_cyan'] ?? [];
        $has_heading_top                 = is_array($heading_top) && count($heading_top);

        // Setup text alignment
        $table_text_pad_direction = STR_PAD_RIGHT;
        if ($table_text_align_string === 'left') {
            $table_text_pad_direction = STR_PAD_RIGHT;
        }
        elseif ($table_text_align_string === 'right') {
            $table_text_pad_direction = STR_PAD_LEFT;
        }
        elseif ($table_text_align_string === 'center') {
            $table_text_pad_direction = STR_PAD_BOTH;
        }

        $heading_top_text_pad_direction = STR_PAD_RIGHT;
        if ($heading_top_text_align_string === 'left') {
            $heading_top_text_pad_direction = STR_PAD_RIGHT;
        }
        elseif ($heading_top_text_align_string === 'right') {
            $heading_top_text_pad_direction = STR_PAD_LEFT;
        }
        elseif ($heading_top_text_align_string === 'center') {
            $heading_top_text_pad_direction = STR_PAD_BOTH;
        }

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
                    $cell_text_pad_direction_int    = $table_text_pad_direction;
                    $is_col_aligned_center          = in_array($col_index, $columns_align_center);
                    $is_col_color_bright_yellow     = in_array($col_index, $columns_color_bright_yellow);
                    $is_col_highlight_1_bright_cyan = in_array($col_index, $columns_highlight_1_bright_cyan);

                    // Text alignment
                    if($is_header){
                        $cell_text_pad_direction_int = $heading_top_text_pad_direction;
                    }
                    elseif ($is_col_aligned_center){
                        $cell_text_pad_direction_int = STR_PAD_BOTH;
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


                    $line                = $this->string_utility->mb_str_pad($cell_sub_line_text, $col_lengths[$col_index], ' ', $cell_text_pad_direction_int);
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
                $escapes              = $this->string_utility->getCliFormattingEscapes();
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

    public function buildTable($data = [], $table_config=[], $column_config=[])
    {
        // Objects
        $writer = $this->cli_writer;
        $format = $this->cli_formatter;

        // Get size info
        $size_info   = $this->getColAndRowSizes($data);
        $col_lengths = $size_info['col_lengths'];
        $row_heights = $size_info['row_heights'];
        $num_cols    = count($col_lengths);
        $num_rows    = count($row_heights);

        $has_column_config = count($column_config) > 0;


        // ------------------------------------------------

        $has_table_config = !empty($table_config) && is_array($table_config) && count($table_config);

        $table_show_thead = false;
        $table_text_pad_direction = STR_PAD_RIGHT;
        if($has_table_config){
            $table_show_thead = $table_config['table_show_thead'] ?? false; // true | false
            $table_text_pad_direction = $this->string_utility->alignmentToPaddingDirection($table_config['table_text_align'] ?? 'left'); // STR_PAD_RIGHT | STR_PAD_LEFT | STR_PAD_BOTH
        }


        // ------------------------------------------------
        // ------------------------------------------------

        // Loop through rows
        $current_row_number = 0;
        foreach ($data as $row_index => $row){
            $current_row_number++; // Inc row number, starting at 1
            $has_line_to_add  = true;
            $current_sub_line = 0;
            while($has_line_to_add) {
                // Default row to only have one line
                $has_line_to_add = false;

                //$writer->writeLine($current_row_number);


                $is_this_the_top_row  = $current_row_number === 1 && $current_sub_line === 0;
                $is_this_a_middle_row = $current_row_number !== 1 && $current_sub_line === 0;

                if($has_column_config){
                    // $columns = $this->getColumnData($row, $column_config);
                    $columns = $this->getColumnData2($row, $column_config);
                }
                else {
                    continue;
                }

                // Top Line
                if($is_this_the_top_row){
                    $is_first_col = true;
                    foreach ($columns as $col_index => $cell_data) {
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
                elseif ($is_this_a_middle_row){
                    $is_first_col = true;
                    foreach ($columns as $col_index => $cell_data) {
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

                //--------------------
                $has_heading_top = false;
                $heading_top_text_pad_direction = STR_PAD_BOTH;


                //--------------------

                // Text Line
                $is_first_col = true;
                foreach ($columns as $col_index => $cell_data) {
                    if ($is_first_col) {
                        $is_first_col = false;

                        // Left side
                        $this->cli_writer->write('│');
                    } else {
                        // Inside Col Border
                        $this->cli_writer->write('│');
                    }

                    // Text
                    // ====================================================================
                    $is_header                   = $has_heading_top && $row_index === 0;
                    $cell_text_lines             = $cell_data['value'];
                    $has_column_alignment        = isset($cell_data['text_align']) && !empty($cell_data['text_align']);
                    $column_alignment_string     = $has_column_alignment ? $cell_data['text_align'] : '';
                    $column_text_pad_direction   = $has_column_alignment ? $this->string_utility->alignmentToPaddingDirection($column_alignment_string ?? 'left') : STR_PAD_LEFT;
                    $cell_text_pad_direction     = $has_column_alignment ? $column_text_pad_direction : $table_text_pad_direction;
                    // ====================================================================

                    // Text
                    $cell_sub_lines     = explode("\n", (string) $cell_text_lines);
                    $cell_sub_line_text = $cell_sub_lines[$current_sub_line] ?? '';

                    // Tabs
                    $cell_sub_line_text = str_replace("\t",'    ', $cell_sub_line_text);

                    // Line
                    $line = $this->string_utility->mb_str_pad($cell_sub_line_text, $col_lengths[$col_index], ' ', $cell_text_pad_direction);

                    $last_sub_line_index = count($cell_sub_lines) - 1;
                    if($current_sub_line < $last_sub_line_index){
                        $has_line_to_add  = true;
                    }

                    //$line = str_repeat('X', $col_lengths[$col_index]);

                    $this->cli_writer->write($line);
                }

                // Top right corner
                $this->cli_writer->write('│' . "\n");


                //--------------------

                $next_row        = $data[$row_index +1] ?? [];
                $has_another_row = count($next_row);
                $is_bottom       = !$has_another_row && !$has_line_to_add;

                if ($is_bottom) {
                    // Bottom Line
                    $is_first_col = true;
                    foreach ($columns as $col_index => $cell_data) {
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

    private function getColumnData(array $row, array $column_config): array
    {
        // Default to empty array
        $columns = [];

        foreach ($column_config as $column_config_item) {
            $attribute = $column_config_item['attribute'] ?? '';
            $has_attribute = !empty($attribute);

            if($has_attribute){
                $columns[$attribute] = $row[$attribute] ?? '';
            }
        }

        return $columns;
    }

    private function getColumnData2(array $row, array $column_config): array
    {
        // Default to empty array
        $columns = [];

        /*
        foreach ($column_config as $column_config_item) {
            $attribute = $column_config_item['attribute'] ?? '';
            $has_attribute = !empty($attribute);

            if($has_attribute){
                $columns[$attribute] = $row[$attribute] ?? '';
            }
        }
        */

        foreach ($column_config as $column_config_item) {
            $attribute = $column_config_item['attribute'] ?? '';
            $has_attribute = !empty($attribute);

            if($has_attribute){
                $columns[$attribute] = $column_config_item;
                $current_column_is_array = is_array($columns[$attribute]);
                if($current_column_is_array){
                    $columns[$attribute]['value'] = $row[$attribute] ?? '';
                }
            }
        }

        return $columns;
    }

}