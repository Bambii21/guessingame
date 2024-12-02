<?php require 'guess.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Guessing Game</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>PHP Guessing Game</h1>
        <p>Guess the number between 1 and 100. You have 5 tries to win!</p>

        <form method="POST">
            <?php if ($_SESSION['attempts'] < $_SESSION['max_attempts']): ?>
                <label for="guess">Enter your guess:</label>
                <input type="number" name="guess" id="guess" min="1" max="100" required>
                <button type="submit">Submit Guess</button>
            <?php endif; ?>
            <br>
            <br>
            <button type="submit" name="restart" class="restart">Restart Game</button>
        </form>

        <div class="feedback">
            <?= htmlspecialchars($feedback) ?>
        </div>
    </div>
</body>
</html>
