<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tic Tac Toe</title>
    <link rel="stylesheet" href="/css/tictactoe/style.css">
</head>
<body>
    <h1>Tic Tac Toe</h1>
    <div id="scores">
        <p>Player X: <span id="scoreX">0</span></p>
        <p>Player O: <span id="scoreO">0</span></p>
    </div>
    <div id="board" class="board"></div>
    <p id="message"></p>
    <button id="resetButton">Reset Game</button>

    <!-- Add audio elements -->
    <audio id="placeSound" src="/image/game/tictactoe/place.mp3"></audio>
    <audio id="winSound" src="/image/game/tictactoe/win.mp3"></audio>

    <script src="/js/tictactoe/script.js"></script>
</body>
</html>
