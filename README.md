# ikm-cli
PHP lib with CLI formatting tools

## Install:

- Open the terminal and navigate to the directory your project will be in.
- Install Composer: https://getcomposer.org/download/
- Require `ikm/cli` with Composer:


```bash
php composer.phar require ikm/cli
```


## Usage:

Write a line of text:

```php
require '../vendor/autoload.php';

$writer = new \IKM\CLI\CommandLineWriter();

$writer->writeLine('Hello, World!');
```






Write a line of text in yellow:

```php
require '../vendor/autoload.php';

$writer = new \IKM\CLI\CommandLineWriter();
$format = new \IKM\CLI\CommandLineFormatter();

$writer->writeLine($format->fg_bright_yellow  . 'Yellow, World!' . $format->reset);
```



### Colors:

(See: https://en.wikipedia.org/wiki/ANSI_escape_code#Colors)

Text color

| dark | bright |
| ---- | ------ |
| `fg_dark_black`   | `fg_bright_black`   |
| `fg_dark_red`     | `fg_bright_red`     |
| `fg_dark_green`   | `fg_bright_green`   |
| `fg_dark_yellow`  | `fg_bright_yellow`  |
| `fg_dark_blue`    | `fg_bright_blue`    |
| `fg_dark_magenta` | `fg_bright_magenta` |
| `fg_dark_cyan`    | `fg_bright_cyan`    |
| `fg_dark_white`   | `fg_bright_white`   |

Background color

| dark | bright |
| ---- | ------ |
| `bg_dark_black`   | `bg_bright_black`   |
| `bg_dark_red`     | `bg_bright_red`     |
| `bg_dark_green`   | `bg_bright_green`   |
| `bg_dark_yellow`  | `bg_bright_yellow`  |
| `bg_dark_blue`    | `bg_bright_blue`    |
| `bg_dark_magenta` | `bg_bright_magenta` |
| `bg_dark_cyan`    | `bg_bright_cyan`    |
| `bg_dark_white`   | `bg_bright_white`   |

```php
require '../vendor/autoload.php';

$writer = new \IKM\CLI\CommandLineWriter();
$format = new \IKM\CLI\CommandLineFormatter();

// Write a line of text
$writer->writeLine('Hello, World!');

// Write a yellow line of text
$writer->writeLine($format->fg_bright_yellow  . 'Yellow, World!' . $format->reset);

// Write, without any line break
$writer->write('Foo');

// Write a line break
$writer->br();

// Clear the screen
$writer->clearScreen();

// Add a divider
$writer->hr();

// Bold
$writer->writeLine($format->bold  . 'Bold' . $format->reset);

// Italic
$writer->writeLine($format->italic  . 'Italic' . $format->reset);

// Underline
$writer->writeLine($format->underline  . 'Underline' . $format->reset);

// Dim
$writer->writeLine($format->dim  . 'Dim' . $format->reset);

// Blink
$writer->writeLine($format->blink  . 'Blink' . $format->reset);

```

----

## Tables (WIP)

```php 

require '../vendor/autoload.php';

$writer = new \IKM\CLI\CommandLineWriter();
$format = new \IKM\CLI\CommandLineFormatter();
$table_builder = new \IKM\CLI\CommandLineTableBuilder();

// Data
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

$table_style = [
    'table_text_align' => 'left', // 'left' | 'right' | 'center'
    'table_border_fg_color' => 'dark-yellow',
    'table_cell_fg_color' => 'bright-yellow',
    'table_show_head' => true,
    'table_head_text_align' => 'center',
    'table_head_fg_color' => 'bright-green',
    'table_head_bg_color' => 'dark-blue',
    'table_head_weight' => 'bold',
];

$table_columns = [
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
        'head_text_align' => 'left',
    ],
    [
        'attribute' => 'kind_of_animal',
        'label'     => 'Type',
        'text_align' => 'right',
    ],
    [
        'attribute' => 'pet_number_legs',
        'label'     => 'Num. Legs',
    ],
];

$table_builder->buildTable($pets, $table_style, $table_columns);

```


### Tags (For text in tables)

```
{previous}

{bold}
{dim}
{italic}
{underline}
{blink}

{fg_dark_black}
{fg_dark_red}
{fg_dark_green}
{fg_dark_yellow}
{fg_dark_blue}
{fg_dark_magenta}
{fg_dark_cyan}
{fg_dark_white}

{fg_bright_black}
{fg_bright_red}
{fg_bright_green}
{fg_bright_yellow}
{fg_bright_blue}
{fg_bright_magenta}
{fg_bright_cyan}
{fg_bright_white}

{bg_dark_black}
{bg_dark_red}
{bg_dark_green}
{bg_dark_yellow}
{bg_dark_blue}
{bg_dark_magenta}
{bg_dark_cyan}
{bg_dark_white}

{bg_bright_black}
{bg_bright_red}
{bg_bright_green}
{bg_bright_yellow}
{bg_bright_blue}
{bg_bright_magenta}
{bg_bright_cyan}
{bg_bright_white}
```