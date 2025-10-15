<?php
function ranNum() {
    return rand(1, 100);
}
$comNum = ranNum();
function hint($comNum){
    
}
echo "
    Welcome to the Number Guessing Game! \n
    I'm thinking of a number between 1 and 100.\n
    You will get a specified number of chances to guess the correct number.\n
";

echo "
    Please select the difficulty level:\n
    1. Easy (10 chances)\n
    2. Medium (5 chances)\n
    3. Hard (3 chances)\n
";

echo"Enter you choice: ";
$choice = trim(fgets(STDIN));
if ($choice == 1) {
    echo "Great! You have selected the Easy difficulty level.\n";
    $chances = 10;
} elseif ($choice == 2) {
    echo "Great! You have selected the Medium difficulty level.\n";
    $chances = 5;
} elseif ($choice == 3) {
    echo "Great! You have selected the Hard difficulty level.\n";
    $chances = 3;
} else {
    echo "Invalid choice. Please restart the game and select a valid difficulty level.\n";
    exit;
}

echo "Let's start the game!\n";
$attempts = 0;
while($attempts < $chances) {
    echo "Enter a number between 1 and 100: ";
    $userNum = trim(fgets(STDIN));
    if ($userNum < 1 || $userNum > 100) {
        echo "Please enter a number between 1 and 100.\n";
        continue;
    }
    if ($userNum == $comNum) {
        echo "Congratulations! You've guessed the correct number: $comNum\n";
        $attempts++;
        break;
    } elseif ($userNum < $comNum) {
        echo "Too low! Try again.\n";
        $attempts++;
    } else {
        echo "Too high! Try again.\n";
        $attempts++;
    }
    if ($attempts == $chances) {
        echo "Sorry, you've used all your chances. The correct number was: $comNum\n";
        echo "Do you want to play again? (yes/no): ";
        $playAgain = trim(fgets(STDIN));
        if (strtolower($playAgain) == 'yes') {
            $comNum = ranNum();
            $attempts = 0;
            echo "Starting a new game!\n";
        } else {
            echo "Thank you for playing! Goodbye!\n";
            break;
        }

    }
}

?>