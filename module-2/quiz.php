<?php

$scores = [];

function showMenu()
{
    echo "\n=== Quiz Application ===\n";
    echo "1. Start Quiz\n";
    echo "2. View Scores\n";
    echo "3. Exit\n";
}

function startQuiz(array &$scores)
{
    $questions = [
        [
            "q" => "Which of these is a PHP function for output?",
            "options" => ["1. echo", "2. print", "3. var_dump", "4. All of the above"],
            "answer" => 4
        ],
        [
            "q" => "Which symbol is used for variables in PHP?",
            "options" => ["1. $", "2. #", "3. @", "4. %"],
            "answer" => 1
        ],
        [
            "q" => "What is the extension of PHP files?",
            "options" => ["1. .html", "2. .php", "3. .exe", "4. .js"],
            "answer" => 2
        ],
    ];

    $score = 0;
    $i = 0;

    while ($i < count($questions)) {
        $q = $questions[$i];
        echo "\nQuestion " . ($i + 1) . ": " . $q["q"] . "\n";

        $j = 0;
        while ($j < count($q["options"])) {
            echo $q["options"][$j] . "\n";
            $j++;
        }

        $choice = (int) readline("Your answer (1-" . count($q["options"]) . "): ");

        if ($choice === $q["answer"]) {
            echo " Correct!\n";
            $score++;
        } else {
            echo " Wrong! Correct answer was option {$q["answer"]}\n";
        }

        $i++;
    }

    echo "\nYour final score: $score / " . count($questions) . "\n";
    $scores[] = $score;
}

function viewScores(array $scores)
{
    if (empty($scores)) {
        echo "No scores available.\n";
    } else {
        echo "\n=== Previous Scores ===\n";
        $i = 0;
        while ($i < count($scores)) {
            echo "Attempt " . ($i + 1) . ": " . $scores[$i] . "\n";
            $i++;
        }
    }
}

while (true) {
    showMenu();
    $choice = (int) readline("Choose an option: ");

    if ($choice === 1) {
        startQuiz($scores);
    } elseif ($choice === 2) {
        viewScores($scores);
    } elseif ($choice === 3) {
        echo "Exiting quiz app...\n";
        break;
    } else {
        echo "Invalid choice. Try again.\n";
    }
}
