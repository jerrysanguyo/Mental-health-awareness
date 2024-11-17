<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Floppy Mario</title>
  <link rel="stylesheet" href="/css/flappy/style.css">
  <style>
    body, html {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #70c5ce;
    }

    canvas {
        display: block;
        margin: 0;
        padding: 0; 
        position: absolute;
        top: 0;
        left: 0;
    }
  </style>
</head>
<body>
    <canvas id="canvas"></canvas>
    <button id="startButton" class="retro-button">Click to Play</button>
   
    <audio id="jumpSound" src="/image/game/flappy/jump.mp3"></audio>
    <audio id="gameOverSound" src="/image/game/flappy/game-over.mp3"></audio>

    <script>
        const canvas = document.getElementById('canvas');
        const ctx = canvas.getContext('2d');
        const startButton = document.getElementById('startButton');
        const jumpSound = document.getElementById('jumpSound');
        const gameOverSound = document.getElementById('gameOverSound');

        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }
        window.addEventListener('resize', resizeCanvas);
        resizeCanvas();

        const marioImg = new Image();
        marioImg.src = '/image/game/flappy/mario.webp'; 

        const topPipeImg = new Image();
        topPipeImg.src = '/image/game/flappy/pipe-up.webp';

        const bottomPipeImg = new Image();
        bottomPipeImg.src = '/image/game/flappy/pipe-down.webp';

        const backgroundImg = new Image();
        backgroundImg.src = '/image/game/flappy/bg.webp';

        let gamePlaying = false;
        const gravity = 1;
        const speed = 5.5;
        const size = [51, 36];
        const jump = -11.5;
        const cTenth = (canvas.width / 100);

        let index = 0,
            bestScore = 0, 
            flight, 
            flyHeight, 
            currentScore, 
            pipes;

        const pipeWidth = 78;
        const pipeGap = 300;
        const pipeLoc = () => (Math.random() * ((canvas.height - (pipeGap + pipeWidth)) - pipeWidth)) + pipeWidth;

        const setup = () => {
            currentScore = 0;
            flight = jump;
            flyHeight = (canvas.height / 2) - (size[1] / 2);
            
            pipes = Array(20).fill().map((_, i) => [
                canvas.width + (i * (pipeGap + pipeWidth)), 
                pipeLoc() 
            ]);
        }

        const render = () => {
            index++;
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            ctx.drawImage(backgroundImg, 0, 0, canvas.width, canvas.height);

            ctx.fillStyle = "#000";
            ctx.textAlign = "center";
            ctx.font = "bold 40px 'Press Start 2P', cursive";
            ctx.fillText("Floppy Mario", canvas.width / 2, 50);

            // Draw score at the top
            ctx.font = "20px 'Press Start 2P', cursive";
            ctx.fillText(`Best: ${bestScore}`, canvas.width / 4, 90);
            ctx.fillText(`Current: ${currentScore}`, (canvas.width / 4) * 3, 90);

            // Pipe display
            if (gamePlaying) {
                pipes.map(pipe => {
                    pipe[0] -= speed;

                    // Draw top pipe
                    ctx.drawImage(topPipeImg, pipe[0], 0, pipeWidth, pipe[1]);

                    // Draw bottom pipe
                    ctx.drawImage(bottomPipeImg, pipe[0], pipe[1] + pipeGap, pipeWidth, canvas.height - pipe[1] - pipeGap);

                    // Check if the pipe has moved off the screen to the left
                    if (pipe[0] + pipeWidth < 0) {
                        currentScore++; // Increment currentScore when a pipe goes off-screen
                        bestScore = Math.max(bestScore, currentScore); // Update bestScore if needed
                        pipes = [...pipes.slice(1), [pipes[pipes.length - 1][0] + pipeGap + pipeWidth, pipeLoc()]];
                    }

                    // Check for collision
                    if ([
                        pipe[0] <= cTenth + size[0],
                        pipe[0] + pipeWidth >= cTenth,
                        pipe[1] > flyHeight || pipe[1] + pipeGap < flyHeight + size[1]
                    ].every(elem => elem)) {
                        gameOverSound.play(); // Play sound when game over
                        gamePlaying = false;
                        startButton.style.display = 'block'; // Show the button when the game stops
                        setup();
                    }
                });
            }

            // Draw mario
            if (gamePlaying) {
                ctx.drawImage(marioImg, cTenth, flyHeight, ...size);
                flight += gravity;
                flyHeight = Math.min(flyHeight + flight, canvas.height - size[1]);
            } else {
                ctx.drawImage(marioImg, ((canvas.width / 2) - size[0] / 2), flyHeight, ...size);
                flyHeight = (canvas.height / 2) - (size[1] / 2);

                ctx.textAlign = "center";
                ctx.textBaseline = "middle";
                ctx.font = "bold 30px courier";

                ctx.fillText(`Best score : ${bestScore}`, canvas.width / 2, canvas.height / 2 - 50);
            }

            window.requestAnimationFrame(render);
        }

        // launch setup
        setup();
        marioImg.onload = render;

        // Handle button click to start or restart the game
        startButton.addEventListener('click', () => {
            gamePlaying = true;
            startButton.style.display = 'none'; // Hide the button when the game starts
            flight = jump; // Reset flight for a new start
        });

        // Handle mario jump and play jump sound
        function handleJump() {
            jumpSound.currentTime = 0; // Reset audio to the beginning
            jumpSound.play().catch(err => {
                console.error('Audio play failed:', err);
            }); // Play jump sound on click or touch

            if (gamePlaying) {
                flight = jump;
            }
        }

        // Add event listeners for both click and touch events
        window.addEventListener('click', handleJump);
        window.addEventListener('touchstart', handleJump);
    </script>
</body>
</html>
