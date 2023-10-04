// JS file for the logic behind the Game Page, Author: Himanshu, Date: August 7

// Initialize an empty tic-tac-toe board
const board = ['', '', '', '', '', '', '', '', ''];

// Define all the possible winning combinations on the board
const winningCombinations = [
  [0, 1, 2], [3, 4, 5], [6, 7, 8],
  [0, 3, 6], [1, 4, 7], [2, 5, 8],
  [0, 4, 8], [2, 4, 6]
];

// Initialize game variables
let currentPlayer = 'X';
let playerXName = '';
let playerOName = '';
let gameStarted = false;
let lastRoundWinner = ''; // To keep track of the last round's winner

// Function to check if the given name is valid (contains only letters)
function isValidName(name) {
  return /^[A-Za-z]+$/.test(name);
}

// Function to start the game, set player names, and begin the game
function startGame() {
  playerXName = document.getElementById('playerX').value.trim().toUpperCase();
  playerOName = document.getElementById('playerO').value.trim().toUpperCase();

  // Check if both player names are valid, otherwise show an alert and abort game start
  if (!isValidName(playerXName) || !isValidName(playerOName)) {
    alert('Please enter valid names for both players. Names should only contain letters (A-Z or a-z).');
    return;
  }

  // Set the game as started and update the turn text
  gameStarted = true;
  updateTurnText();
}

// Function to make a move at the specified index on the board
function makeMove(index) {
  // Check if the game has started, if not, show an alert and abort the move
  if (!gameStarted) {
    alert('Please start the game first.');
    return;
  }

  // Check if the chosen cell is empty and the game is not already won
  if (board[index] === '' && !checkWin()) {
    // Update the board with the current player's mark and update the cell's text
    board[index] = currentPlayer;
    document.getElementsByClassName('cell')[index].innerText = currentPlayer;

    // Check if the current move resulted in a win
    if (checkWin()) {
      alert(`${currentPlayer} wins!`);

      // Update the last round's winner
      lastRoundWinner = currentPlayer;
    } else if (!board.includes('')) {
      // If the board is full (no empty cells), it's a draw
      alert("It's a draw!");
    }

    // Switch to the other player's turn and update the turn text
    currentPlayer = currentPlayer === 'X' ? 'O' : 'X';
    updateTurnText();
  }
}

// Function to check if any of the winning combinations have been achieved
function checkWin() {
  for (const combination of winningCombinations) {
    const [a, b, c] = combination;
    if (board[a] && board[a] === board[b] && board[a] === board[c]) {
      // Highlight the winning combination cells and return true (game won)
      highlightWinningCombination(a, b, c);
      return true;
    }
  }
  // If no winning combination found, return false (game not won yet)
  return false;
}

// Function to highlight the winning combination by changing cell background color
function highlightWinningCombination(a, b, c) {
  const cells = document.getElementsByClassName('cell');
  cells[a].style.backgroundColor = '#4CAF50';
  cells[b].style.backgroundColor = '#4CAF50';
  cells[c].style.backgroundColor = '#4CAF50';
}

// Function to update the turn text with the current player's name
function updateTurnText() {
  document.getElementById('turnText').innerText = `${currentPlayer === 'X' ? playerXName : playerOName}'s turn`;
}

// Function to reset the game for the next round
function resetGame() {
  // Clear the board, reset cell texts, and cell background colors
  board.fill('');
  const cells = document.getElementsByClassName('cell');
  for (let i = 0; i < cells.length; i++) {
    cells[i].innerText = '';
    cells[i].style.backgroundColor = '';
  }

  // Set the starting player for the next round based on the last round's winner
  currentPlayer = lastRoundWinner || 'X';

  // Reset game variables and update the turn text
  gameStarted = true; // Automatically starts the next round
  updateTurnText();
}

// Initial setup
document.getElementById('startButton').addEventListener('click', startGame);
document.getElementById('resetButton').addEventListener('click', resetGame);
for (let i = 0; i < 9; i++) {
  document.getElementsByClassName('cell')[i].addEventListener('click', () => makeMove(i));
}
