#!/usr/bin/env php
<?php declare(strict_types=1);

require '../vendor/autoload.php';

$writer = new \IKM\CLI\CommandLineWriter();
$format = new \IKM\CLI\CommandLineFormatter();
$table_builder = new \IKM\CLI\CommandLineTableBuilder();

// ===========================================

$writer->writeLine('Draw table');

// Sample from made-up-word-gen
/*
$table_data = [
    'heading_top' => ['type' => 'Type', 'name' =>'Name', 'examples' => 'Examples', 'description' => 'Description', 'info_ipa' => 'IPA', 'quick_transcription' => 'Quick Transcription', 'phone_family' => '*'],
    'heading_top_text_align' => STR_PAD_BOTH,
    'data' => $this->alphabet,
    'columns_align_center' => ['name', 'info_ipa', 'quick_transcription'],
    'columns_color_bright_yellow' => ['name', 'quick_transcription'],
    'columns_highlight_1_bright_cyan' => ['examples'],
];
*/


$pets = [
    [
        'pet_name' => 'Spot',
        'kind_of_animal' => 'dog',
        'pet_number_legs' => 4,
        'pet_owner_name' => 'John Doe',
        'pet_owner_number_legs' => 2,
    ],
    [
        'pet_name' => 'Fluffy',
        'kind_of_animal' => 'cat',
        'pet_number_legs' => 4,
        'pet_owner_name' => 'Jane Doe',
        'pet_owner_number_legs' => 2,
    ],
    [
        'pet_name' => 'Flint',
        'kind_of_animal' => 'parrot',
        'pet_number_legs' => 2,
        'pet_owner_name' => 'John Silver',
        'pet_owner_number_legs' => 1,
    ],
];




$table_data = [
    // Heading
    'heading_top' => [
        'pet_name' => 'Pet Name',
        'kind_of_animal' =>'Type',
        'pet_number_legs' => 'Num. Legs',
        'pet_owner_name' => 'Owner',
        'pet_owner_number_legs' => 'Num. Legs',
    ],

    // Heading text alignment
    'heading_top_text_align' => STR_PAD_BOTH,

    // Table data
    'data' => $pets,

    // Columns to align center
    'columns_align_center' => ['pet_owner_number_legs'],

    // Columns in yellow
    'columns_color_bright_yellow' => ['pet_name', 'pet_owner_name'],

    // Columns to apply highlighting
    'columns_highlight_1_bright_cyan' => ['kind_of_animal'],
];

$writer->hr();

$writer->writeLine('Draw old table');
$table_builder->buildTableOld($table_data);

$writer->br();
$writer->br();
$writer->br();
$writer->br();


$writer->writeLine('Draw new table');
$table_builder->buildTable($pets);


$table_cols = [
    [
        'attributes' => 'pet_name',
        'label'      => 'Pet Name',
    ],
];


$table_style = [
    'table_text_align' => 'center', // 'left' | 'right' | 'center'
];

$writer->br();
$writer->writeLine('Aligned center');
$table_builder->buildTable($pets, $table_style);


$writer->br();
$writer->writeLine('Aligned right');
$table_style = [
    'table_text_align' => 'right', // 'left' | 'right' | 'center'
];

$table_builder->buildTable($pets, $table_style);

$writer->br();
$writer->writeLine('Aligned left');
$table_style = [
    'table_text_align' => 'left', // 'left' | 'right' | 'center'
    'table_show_thead' => true,
];

$table_builder->buildTable($pets, $table_style, $table_cols);


// ==========================================================

$writer->hr();

$pets = [
    [
        'pet_name' => 'Spot',
        'kind_of_animal' => 'dog',
        'pet_number_legs' => 4,
        'pet_owner_name' => 'John Doe',
        'pet_owner_number_legs' => 2,
    ],
    [
        'pet_name' => 'Fluffy',
        'kind_of_animal' => 'cat',
        'pet_number_legs' => 4,
        'pet_owner_name' => 'Jane Doe',
        'pet_owner_number_legs' => 2,
    ],
    [
        'pet_name' => 'Flint',
        'kind_of_animal' => 'parrot',
        'pet_number_legs' => 2,
        'pet_owner_name' => 'John Silver',
        'pet_owner_number_legs' => 1,
    ],
    [
        'pet_name' => 'V',
        'kind_of_animal' => 'W',
        'pet_number_legs' => 'X',
        'pet_owner_name' => 'Y',
        'pet_owner_number_legs' => 'Z',
    ],
    [
        'pet_name' => 'V',
    ],
    [
        'kind_of_animal' => 'W',
    ],
    [
        'pet_number_legs' => 'X',
    ],
    [
        'pet_owner_name' => 'Y',
    ],
    [
        'pet_owner_number_legs' => 'Z',
    ],
];



$table_style = [
    'table_text_align' => 'left', // 'left' | 'right' | 'center'
    'table_show_thead' => true,
];

$writer->br();
$writer->writeLine('Aligned left, with gaps');
$table_builder->buildTable($pets, $table_style);






$table_style = [
    'table_text_align' => 'left', // 'left' | 'right' | 'center'
    'table_show_thead' => true,
];

$table_cols = [
    [
        'attribute' => 'pet_name',
        'label'     => 'Pet Name',
    ],
];
$writer->br();
$writer->writeLine('Aligned left, with gaps');
$table_builder->buildTable($pets, $table_style, $table_cols);




$table_cols = [
    [
        'attribute' => 'pet_name',
        'label'     => 'Pet Name',
    ],
    [
        'attribute' => 'kind_of_animal',
        'label'     => 'Type',
    ],
];
$writer->br();
$writer->writeLine('Aligned left, with gaps');
$table_builder->buildTable($pets, $table_style, $table_cols);




$table_cols = [
    [
        'attribute' => 'pet_name',
        'label'     => 'Pet Name',
    ],
    [
        'attribute' => 'kind_of_animal',
        'label'     => 'Type',
    ],
    [
        'attribute' => 'pet_number_legs',
        'label'     => 'Num. Legs',
    ],
];
$writer->br();
$writer->writeLine('Aligned left, with gaps');
$table_builder->buildTable($pets, $table_style, $table_cols);




$table_cols = [
    [
        'attribute' => 'pet_name',
        'label'     => 'Pet Name',
    ],
    [
        'attribute' => 'kind_of_animal',
        'label'     => 'Type',
    ],
    [
        'attribute' => 'pet_number_legs',
        'label'     => 'Num. Legs',
    ],
    [
        'attribute' => 'pet_owner_name',
        'label'     => 'Owner',
    ],
];
$writer->br();
$writer->writeLine('Aligned left, with gaps');
$table_builder->buildTable($pets, $table_style, $table_cols);


$table_cols = [
    [
        'attribute' => 'pet_name',
        'label'     => 'Pet Name',
    ],
    [
        'attribute' => 'kind_of_animal',
        'label'     => 'Type',
    ],
    [
        'attribute' => 'pet_number_legs',
        'label'     => 'Num. Legs',
    ],
    [
        'attribute' => 'pet_owner_name',
        'label'     => 'Owner',
    ],
    [
        'attribute' => 'pet_owner_number_legs',
        'label'     => 'Num. Legs',
    ],
];
$writer->br();
$writer->writeLine('Aligned left, with gaps');
$table_builder->buildTable($pets, $table_style, $table_cols);




$table_cols = [
    [
        'attribute' => 'pet_owner_name',
        'label'     => 'Owner',
    ],
    [
        'attribute' => 'pet_owner_number_legs',
        'label'     => 'Num. Legs',
    ],
    [
        'attribute' => 'pet_name',
        'label'     => 'Pet Name',
    ],
    [
        'attribute' => 'kind_of_animal',
        'label'     => 'Type',
    ],
    [
        'attribute' => 'pet_number_legs',
        'label'     => 'Num. Legs',
    ],
];
$writer->br();
$writer->writeLine('Aligned left, with gaps');
$table_builder->buildTable($pets, $table_style, $table_cols);