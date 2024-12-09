#!/usr/bin/env php
<?php declare(strict_types=1);

require '../vendor/autoload.php';

$writer = new \IKM\CLI\CommandLineWriter();
$format = new \IKM\CLI\CommandLineFormatter();

// ===========================================

$writer->writeLine('Hello, World!');

$writer->writeLine('────────────────────────────────────────');
$writer->writeLine('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
$writer->writeLine('┄┄┄┄┄┄┄┄┄┄┄┄┄┄┄┄┄┄┄┄┄┄┄┄┄┄┄┄┄┄┄┄┄┄┄┄┄┄┄┄');
$writer->writeLine('┅┅┅┅┅┅┅┅┅┅┅┅┅┅┅┅┅┅┅┅┅┅┅┅┅┅┅┅┅┅┅┅┅┅┅┅┅┅┅┅');
$writer->writeLine('┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈');
$writer->writeLine('┉┉┉┉┉┉┉┉┉┉┉┉┉┉┉┉┉┉┉┉┉┉┉┉┉┉┉┉┉┉┉┉┉┉┉┉┉┉┉┉');
$writer->writeLine('╌╌╌╌╌╌╌╌╌╌╌╌╌╌╌╌╌╌╌╌╌╌╌╌╌╌╌╌╌╌╌╌╌╌╌╌╌╌╌╌');
$writer->writeLine('╍╍╍╍╍╍╍╍╍╍╍╍╍╍╍╍╍╍╍╍╍╍╍╍╍╍╍╍╍╍╍╍╍╍╍╍╍╍╍╍');
$writer->writeLine('════════════════════════════════════════');
$writer->writeLine('╴╴╴╴╴╴╴╴╴╴╴╴╴╴╴╴╴╴╴╴╴╴╴╴╴╴╴╴╴╴╴╴╴╴╴╴╴╴╴╴');
$writer->writeLine('╶╶╶╶╶╶╶╶╶╶╶╶╶╶╶╶╶╶╶╶╶╶╶╶╶╶╶╶╶╶╶╶╶╶╶╶╶╶╶╶');
$writer->writeLine('╸╸╸╸╸╸╸╸╸╸╸╸╸╸╸╸╸╸╸╸╸╸╸╸╸╸╸╸╸╸╸╸╸╸╸╸╸╸╸╸');
$writer->writeLine('╺╺╺╺╺╺╺╺╺╺╺╺╺╺╺╺╺╺╺╺╺╺╺╺╺╺╺╺╺╺╺╺╺╺╺╺╺╺╺╺');
$writer->writeLine('╼╼╼╼╼╼╼╼╼╼╼╼╼╼╼╼╼╼╼╼╼╼╼╼╼╼╼╼╼╼╼╼╼╼╼╼╼╼╼╼');
$writer->writeLine('╾╾╾╾╾╾╾╾╾╾╾╾╾╾╾╾╾╾╾╾╾╾╾╾╾╾╾╾╾╾╾╾╾╾╾╾╾╾╾╾');
$writer->writeLine('▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀');
$writer->writeLine('▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁');
$writer->writeLine('▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂');
$writer->writeLine('▃▃▃▃▃▃▃▃▃▃▃▃▃▃▃▃▃▃▃▃▃▃▃▃▃▃▃▃▃▃▃▃▃▃▃▃▃▃▃▃');
$writer->writeLine('▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄');
$writer->writeLine('▅▅▅▅▅▅▅▅▅▅▅▅▅▅▅▅▅▅▅▅▅▅▅▅▅▅▅▅▅▅▅▅▅▅▅▅▅▅▅▅');
$writer->writeLine('▆▆▆▆▆▆▆▆▆▆▆▆▆▆▆▆▆▆▆▆▆▆▆▆▆▆▆▆▆▆▆▆▆▆▆▆▆▆▆▆');
$writer->writeLine('▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇');
$writer->writeLine('████████████████████████████████████████');
$writer->writeLine('▉▉▉▉▉▉▉▉▉▉▉▉▉▉▉▉▉▉▉▉▉▉▉▉▉▉▉▉▉▉▉▉▉▉▉▉▉▉▉▉');
$writer->writeLine('▊▊▊▊▊▊▊▊▊▊▊▊▊▊▊▊▊▊▊▊▊▊▊▊▊▊▊▊▊▊▊▊▊▊▊▊▊▊▊▊');
$writer->writeLine('▋▋▋▋▋▋▋▋▋▋▋▋▋▋▋▋▋▋▋▋▋▋▋▋▋▋▋▋▋▋▋▋▋▋▋▋▋▋▋▋');
$writer->writeLine('▌▌▌▌▌▌▌▌▌▌▌▌▌▌▌▌▌▌▌▌▌▌▌▌▌▌▌▌▌▌▌▌▌▌▌▌▌▌▌▌');
$writer->writeLine('▍▍▍▍▍▍▍▍▍▍▍▍▍▍▍▍▍▍▍▍▍▍▍▍▍▍▍▍▍▍▍▍▍▍▍▍▍▍▍▍');
$writer->writeLine('▎▎▎▎▎▎▎▎▎▎▎▎▎▎▎▎▎▎▎▎▎▎▎▎▎▎▎▎▎▎▎▎▎▎▎▎▎▎▎▎');
$writer->writeLine('▏▏▏▏▏▏▏▏▏▏▏▏▏▏▏▏▏▏▏▏▏▏▏▏▏▏▏▏▏▏▏▏▏▏▏▏▏▏▏▏');
$writer->writeLine('▐▐▐▐▐▐▐▐▐▐▐▐▐▐▐▐▐▐▐▐▐▐▐▐▐▐▐▐▐▐▐▐▐▐▐▐▐▐▐▐');
$writer->writeLine('░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░');
$writer->writeLine('▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒');
$writer->writeLine('▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓');
$writer->writeLine('▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔');
$writer->writeLine('▕▕▕▕▕▕▕▕▕▕▕▕▕▕▕▕▕▕▕▕▕▕▕▕▕▕▕▕▕▕▕▕▕▕▕▕▕▕▕▕');
$writer->writeLine('▖▖▖▖▖▖▖▖▖▖▖▖▖▖▖▖▖▖▖▖▖▖▖▖▖▖▖▖▖▖▖▖▖▖▖▖▖▖▖▖');
$writer->writeLine('▗▗▗▗▗▗▗▗▗▗▗▗▗▗▗▗▗▗▗▗▗▗▗▗▗▗▗▗▗▗▗▗▗▗▗▗▗▗▗▗');
$writer->writeLine('▘▘▘▘▘▘▘▘▘▘▘▘▘▘▘▘▘▘▘▘▘▘▘▘▘▘▘▘▘▘▘▘▘▘▘▘▘▘▘▘');
$writer->writeLine('▙▙▙▙▙▙▙▙▙▙▙▙▙▙▙▙▙▙▙▙▙▙▙▙▙▙▙▙▙▙▙▙▙▙▙▙▙▙▙▙');
$writer->writeLine('▚▚▚▚▚▚▚▚▚▚▚▚▚▚▚▚▚▚▚▚▚▚▚▚▚▚▚▚▚▚▚▚▚▚▚▚▚▚▚▚');
$writer->writeLine('▛▛▛▛▛▛▛▛▛▛▛▛▛▛▛▛▛▛▛▛▛▛▛▛▛▛▛▛▛▛▛▛▛▛▛▛▛▛▛▛');
$writer->writeLine('▜▜▜▜▜▜▜▜▜▜▜▜▜▜▜▜▜▜▜▜▜▜▜▜▜▜▜▜▜▜▜▜▜▜▜▜▜▜▜▜');
$writer->writeLine('▝▝▝▝▝▝▝▝▝▝▝▝▝▝▝▝▝▝▝▝▝▝▝▝▝▝▝▝▝▝▝▝▝▝▝▝▝▝▝▝');
$writer->writeLine('▞▞▞▞▞▞▞▞▞▞▞▞▞▞▞▞▞▞▞▞▞▞▞▞▞▞▞▞▞▞▞▞▞▞▞▞▞▞▞▞');
$writer->writeLine('▟▟▟▟▟▟▟▟▟▟▟▟▟▟▟▟▟▟▟▟▟▟▟▟▟▟▟▟▟▟▟▟▟▟▟▟▟▟▟▟');
$writer->writeLine('');

$writer->writeLine('┌─┬┐  ╔═╦╗  ╓─╥╖  ╒═╤╕');
$writer->writeLine('│ ││  ║ ║║  ║ ║║  │ ││');
$writer->writeLine('├─┼┤  ╠═╬╣  ╟─╫╢  ╞═╪╡');
$writer->writeLine('└─┴┘  ╚═╩╝  ╙─╨╜  ╘═╧╛');
$writer->writeLine('┌───────────────────┐');
$writer->writeLine('│  ╔═══╗ Some Text  │▒');
$writer->writeLine('│  ╚═╦═╝ in the box │▒');
$writer->writeLine('╞═╤══╩══╤═══════════╡▒');
$writer->writeLine('│ ├──┬──┤           │▒');
$writer->writeLine('│ └──┴──┘           │▒');
$writer->writeLine('└───────────────────┘▒');
$writer->writeLine(' ▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒');
