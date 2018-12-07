

<!DOCTYPE html>

<?php
session_start();


?>
<html>
    <head>
        <title>CSUMB Online Quiz</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    
    <body>
        <!--Display user and logout button-->
        <div class="user-menu">
            Welcome <span id = "user" value = "<?php echo $_SESSION["userId"]?>"> <?php echo $_SESSION["username"]; ?>!</span>
            <input type="button" id="logoutBtn" value="Logout" />    
        </div>
        
        <!--Display Quiz Content-->
        <div class="content-wrapper">
            <div id="quiz">
              <h1>Quiz</h1>
              <form>
    <!--Question 1-->
    What year was CSUMB founded? 
    <input type="text" name="question1" size="5" /><br />
    <div id="question1-feedback" class="answer"></div><br />

    <!--Question 2-->
    What is the name of CSUMB's mascot?<br />
    <input type="radio" name="question2" id="q2-1"  value="A"/><label for='q2-1'>Otto <br />
    <input type="radio" name="question2" id="q2-2"  value="B"/><label for='q2-2'>Albus <br />
    <input type="radio" name="question2" id="q2-3"  Value="C"/><label for='q2-3'>Monte Rey <br />
    <div id="question2-feedback" class="answer"></div><br />

    <input type="submit" value="Submit" />
    
    <!--Will display the "loading" or "spinning" animated gif-->
    <div id="waiting"></div>
</form>

<!--Will display the quiz score-->
<div id="scores"></div>            
                <div id="feedback">
                    <h2>Your final score is <span id="score"> score  </span> </h2>
                    
                    You've taken this quiz <strong id="times"></strong> time(s). <br /><br />
    
                    Your average score was  <strong id="average"></strong>
                </div>
            </div>
            <div id="mascot">
                <img src="img/mascot.png" alt="CSUMB Mascot" width="350" />
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="js/gradeQuiz.js"></script>
    </body>
</html>