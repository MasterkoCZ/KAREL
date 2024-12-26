const gridSize = 10;
let karelPosition = { x: 0, y: 0 };
let direction = 0; // 0 = right, 1 = down, 2 = left, 3 = up

const container = document.getElementById('game-container');
const commandsInput = document.getElementById('commands');

// Initialize grid
function initializeGrid() {
    container.innerHTML = '';
    for (let i = 0; i < gridSize; i++) {
        for (let j = 0; j < gridSize; j++) {
            const cell = document.createElement('div');
            cell.classList.add('cell');
            cell.dataset.x = j;
            cell.dataset.y = i;
            container.appendChild(cell);
        }
    }
    updateKarel();
}

// Update Karel's position
function updateKarel() {
    document.querySelectorAll('.cell').forEach(cell => cell.classList.remove('karel'));
    const cell = document.querySelector(`.cell[data-x="${karelPosition.x}"][data-y="${karelPosition.y}"]`);
    if (cell) cell.classList.add('karel');
}

// Execute commands
function executeCommands() {
    const commands = commandsInput.value.trim().split('\n');
    commands.forEach(command => {
        const [cmd, arg] = command.toUpperCase().split(' ');
        const value = parseInt(arg, 10) || 1;
        if (cmd === 'KROK') moveKarel(value);
        else if (cmd === 'VLEVOBOK') turnKarel(value);
        else if (cmd === 'POLOZ') placeItem(arg);
        else if (cmd === 'RESET') resetGame();
    });
}

// Move Karel
function moveKarel(steps) {
    for (let i = 0; i < steps; i++) {
        if (direction === 0) karelPosition.x = Math.min(gridSize - 1, karelPosition.x + 1);
        else if (direction === 1) karelPosition.y = Math.min(gridSize - 1, karelPosition.y + 1);
        else if (direction === 2) karelPosition.x = Math.max(0, karelPosition.x - 1);
        else if (direction === 3) karelPosition.y = Math.max(0, karelPosition.y - 1);
        updateKarel();
    }
}

// Turn Karel
function turnKarel(times) {
    direction = (direction + 3 * times) % 4;
}

// Place item
function placeItem(item) {
    const cell = document.querySelector(`.cell[data-x="${karelPosition.x}"][data-y="${karelPosition.y}"]`);
    if (cell) cell.textContent = item;
}

// Reset game
function resetGame() {
    karelPosition = { x: 0, y: 0 };
    direction = 0;
    initializeGrid();
    commandsInput.value = '';
}

// Initialize game on load
initializeGrid();
