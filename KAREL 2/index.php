<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karel (PHP)</title>
    <link rel="stylesheet" href="style.css">
    <style>
        #game-container {
            display: grid;
            grid-template-columns: repeat(10, 30px);
            grid-template-rows: repeat(10, 30px);
            gap: 1px;
        }

        .cell {
            width: 30px;
            height: 30px;
            border: 1px solid #ddd;
            text-align: center;
            vertical-align: middle;
            line-height: 30px;
            background-color: white;
        }

        .karel {
            background-color: yellow;
        }
    </style>
</head>
<body>
    <h1>Karel</h1>
    <form action="index.php" method="POST">
        <textarea name="commands" placeholder="Enter commands here" required></textarea><br>
        <button type="submit">Execute</button>
        <button type="submit" name="reset" value="1">Reset</button>
    </form>

    <div id="game-container">
        <?php
        $gridSize = 10;
        $karelX = 0;
        $karelY = 0;
        $direction = 0;

        if (isset($_POST['reset'])) {
            $karelX = 0;
            $karelY = 0;
            $direction = 0;
            $grid = array_fill(0, $gridSize, array_fill(0, $gridSize, ''));
        } else {
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
                }
            }
        }

        for ($y = 0; $y < $gridSize; $y++) {
            for ($x = 0; $x < $gridSize; $x++) {
                $class = ($x === $karelX && $y === $karelY) ? 'cell karel' : 'cell';
                $content = $grid[$y][$x];
                echo "<div class=\"$class\">$content</div>";
            }
        }
        ?>
    </div>
</body>
</html>
