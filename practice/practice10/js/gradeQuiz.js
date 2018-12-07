$(document).ready(function(){
    
    $("#logoutBtn").click( function() {
        window.location.href="logout.php";
        }
    );
    
    var score = 0;
    $("form").submit(function(event) {
        
        event.preventDefault();
        
        alert(score);
        //Get answers
        var answer1 = $("input[name='question1']").val().trim();
        var answer2 = $("input[name='question2']:checked").val();
        
        //Check answers
        // Question 1
        if(answer1 === "1994") {
            correctAnswer($("#question1-feedback"));
        } 
        else {  
            incorrectAnswer($("#question1-feedback"));
        }
        
        alert(score);
        
        $("#question1-feedback").append("The answer is <strong>1994</strong>" );
        
        // Question 2
        if(answer2 === "C") {   
            correctAnswer($("#question2-feedback"));
        } 
        else { 
            incorrectAnswer($("#question2-feedback"));
        }
        $("#question2-feedback").append("The answer is <strong>Monte Rey</strong>" );
        
        $("#score").html( score );
        $("#waiting").html("<img src='img/loading.gif' alt='submitting data' />");
        $("input[type='submit']").css("display","none");
        
        var userId = ($("#user").text().trim() == "user_1!" ? 1 : 2);
        alert(score);
        //Submits and stores score, retrieves average score
        $.ajax({
            type : "post",
            url  : "submitScores.php",            
            dataType : "json",
            data : {"score" : score, "userId": userId},            
            success : function(data){
                $("#times").html(data[0].times);
                $("#average").html(data[0].average);
                $("#feedback").css("display","block");
                $("#waiting").html("");
                $("input[type='submit']").css("display","");
            },
            complete: function(data,status) { //optional, used for debugging purposes
               // alert(status);
            }

        });//AJAX
        
    }); //formSubmit
    
    function correctAnswer(questionFeedback){
        questionFeedback.html("Correct! ");
        questionFeedback.addClass("correct");
        questionFeedback.removeClass("incorrect");
    }
    
    function incorrectAnswer(questionFeedback){
        questionFeedback.html("Incorrect! ");
        questionFeedback.addClass("incorrect");
        questionFeedback.removeClass("correct");
        score += 5;
    }
    
}); //documentReady       