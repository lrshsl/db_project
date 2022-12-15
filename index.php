<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodingQuiz</title>
</head>

<?php
include 'scripts/create.php'
?>

<body>
    <header>
        <h1 id="tiltle">CodingQuiz - Which programming language is the worst?</h1>
    </header>
    <main>
        <a href="/templates/login_form.html">
            <button>log in</button>
        </a>
        <a href="/templates/clear.html">
            <button>log in</button>
        </a>
        <button>start quiz</button>
        <br><br><br><br><br><br>
        <br><br><br><br><br><br>
        <br><br><br><br><br><br>
        <h1>QUIZ</h1>
        <h2>What makes the least sense?</h2>
        <ul>
            <li><label for="choice1">(not not 2) == 1</label>
                <input type="checkbox" id="choice1" name="choice1"></li>
            <li><label for="choice2">0.1 + 0.2 != 0.3</label>
                <input type="checkbox" id="choice2" name="choice2"></li>
        </ul>

        <h1>Quiz</h1>
        <form action="insert.php" method="POST">
            <label for="inp_what">What?  </label><input type="text" id="inp_what" name="inp_what"><br>
            <label for="inp_amount">How many litres?  </label><input type="number" id="inp_amount" name="inp_amount"><br>
            <input type="submit" value="send">
        </form>
    </main>
    <footer>
        <h2>Wanna change the background?</h2>
        <style contenteditable style="display: block; white-space: pre">
            html {
                background-color: #336666;
            }</style>
    </footer>

</body>
</html>