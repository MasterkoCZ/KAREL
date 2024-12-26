<?php
$gridSize = 10;
$karelX = 0;
$karelY = 0;
$direction = 0;

if (isset($_POST['reset'])) {
    header('Location: index.php');
    exit;
}

$commands = strtoupper($_POST['commands']);
$lines = explode("\n", trim($commands));
$grid = array_fill(0, $gridSize, array_fill(0, $gridSize, ''));

foreach ($lines as $line) {
    $parts = explode(' ', $line);
    $command = $parts[0];
    $arg = isset($parts[1]) ? $parts[1] : null;

    switch ($command) {
        case 'KROK':
            $steps = intval($arg) ?: 1;
            for ($i = 0; $i < $steps; $i++) {
                if ($direction === 0) $karelX = min($gridSize - 1, $karelX + 1);
                if ($direction === 1) $karelY = min($gridSize - 1, $karelY + 1);
                if ($direction === 2) $karelX = max(0, $karelX - 1);
                if ($direction === 3) $karelY = max(0, $karelY - 1);
            }
            break;

        case 'VLEVOBOK':
            $turns = intval($arg) ?: 1;
            $direction = ($direction + 3 * $turns) % 4;
            break;

        case 'POLOZ':
            $grid[$karelY][$karelX] = $arg;
            break;

        case 'RESET':
            $karelX = 0;
            $karelY = 0;
            $direction = 0;
            $grid = array_fill(0, $gridSize, array_fill(0, $gridSize, ''));
            break;
    }
}

echo '<div id="game-container">';
for ($y = 0; $y < $gridSize; $y++) {
    echo '<div class="row">';
    for ($x = 0; $x < $gridSize; $x++) {
        $class = ($x === $karelX && $y === $karelY) ? 'cell karel' : 'cell';
        $content = $grid[$y][$x];
        echo "<div class=\"$class\">$content</div>";
    }
    echo '</div>';
}
echo '</div>';

header('Location: index.php');
exit;
?>
