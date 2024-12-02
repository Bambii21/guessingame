<?php
session_start();

if (!isset($_SESSION['target_number'])) {
    $_SESSION['target_number'] = rand(1, 100);
    $_SESSION['attempts'] = 0;
    $_SESSION['max_attempts'] = 5;
}

$feedback = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['guess'])) {
        if ($_SESSION['attempts'] < $_SESSION['max_attempts']) {
            $guess = (int) $_POST['guess'];
            $_SESSION['attempts']++;

            
            if ($guess === $_SESSION['target_number']) {
                $feedback = "Congratulations! You guessed the number in {$_SESSION['attempts']} attempts.";
                $_SESSION['attempts'] = $_SESSION['max_attempts'];
            } elseif ($guess < $_SESSION['target_number']) {
                $feedback = "Too low! ";
            } else {
                $feedback = "Too high! ";
            }

            
            if ($_SESSION['attempts'] < $_SESSION['max_attempts']) {
                $remaining = $_SESSION['max_attempts'] - $_SESSION['attempts'];
                $feedback .= "You have $remaining tries left.";
            } else {
                $feedback .= "Game over! The correct number was {$_SESSION['target_number']}.";
            }
        }
    } elseif (isset($_POST['restart'])) {
        
        session_unset(); 
        session_destroy(); 
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}
?>
