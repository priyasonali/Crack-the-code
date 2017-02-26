<?php session_start();?>
<!DOCTYPE html>
<?php
$number = rand(1000,9999);
$_SESSION["number"]=$number;
?>
<html>
<head>
    <title>Crack The Code</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Crack The Code</a>
        </div>
    </div>
</nav>

<div class="container starter-template">
    <div class="row">
        <div class="col-md-6 mid">
            <h1 class="ques">????</h1>
            <h1 class="ans"></h1>
            <form class="form-inline" id="guessForm">
                <div class="form-group">
                    <input type="text" id="guessId" class="form-control" name="guess" placeholder="Enter the number" autocomplete="off">
                </div>
                <button type="submit" class="btn btn-danger submitBtn" disabled>Submit</button>
            </form>
            <span class="text-danger error">Only 4 digit numbers allowed!</span>
            <br>
            <div class="row">
                <div class="col-md-6">Guess</div>
                <div class="col-md-6">Result</div>
            </div>
            <div class="row">
                <div class="col-md-6 text-success result"></div>
                <div class="col-md-6 result2"></div>
            </div>
        </div>
        <div class="col-md-6 text-left">
            <h3>Objective:</h3>
            <p>Guess the randomly generated 4 digit code.</p>
            <h3>Rules:</h3>
            <ul>
                <li>Each guess must consist of 4 numberic characters.</li>
                <li>Numbers may be used more than once!</li>
                <li>You win only if your guess is an exact match.</li>
                <li>You lose if you fail to guess the code under 5 guesses.</li>
                <li><span class="glyphicon glyphicon-ok"></span> Indicates a number is in the correct position.
                <li><span class="glyphicon glyphicon-transfer"></span> Indicates a number is part of the code, but not in the right position.</li>
                <li><span class="glyphicon glyphicon-repeat"></span> Exists but doesn't consider how many times.</li>
                <li><span class="glyphicon glyphicon-remove"></span> Indicates a number is not part of the code.</li>
            </ul><br>
            <p class="text-danger fail"></p>
            <button class="btn btn-success" id="playAgain" onclick="location.reload()">Play Again</button>

        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>

</html> 