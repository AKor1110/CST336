
// Variables
var selectedWord = "";
var selectedHint = "";
var board = [];
var remainingGuesses = 6;

var guessedWords = [];

var words = [{word: "snake", hint: "It's a reptile"}, 
             {word: "monkey", hint: "It's a mammal"}, 
             {word: "beetle", hint: "It's an insect"}];
             
var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];



// Listeners
$(".replayBtn").on("click", function() {
    location.reload();    
});

window.onload = startGame();

// Functions

function startGame() {
    pickWord();
    initBoard();
    updateBoard();
    createLetters();
}

function pickWord() {
    var randomInt = Math.floor(Math.random() * words.length);
    selectedWord = words[randomInt].word.toUpperCase();   
    selectedHint = words[randomInt].hint;
}

function initBoard() {
    for (var letter in selectedWord) {
        board.push("_");
    }
}

function updateBoard() {
    $("#word").empty();
    
    for (var i = 0; i < board.length; i++) {
        $("#word").append(board[i] + " ");
    }
    
    $("#word").append("<br /><br />");
    $("#word").append("<button id = 'hint'> Hint </button> <br/>");
    $("#word").append("<span class = 'hint'> Hint: " + selectedHint + "</span><br/>");
    $(".hint").hide();
    
    $("#hint").click(function() {
       $(".hint").show(); 
       remainingGuesses--;
    });
    
}

function createLetters() {
    for (var letter of alphabet) {
        $("#letters").append("<button class = 'letter' id = '" + letter + "'>" + letter + "</button>");
    }
    
    $(".letter").click(function() {
        checkLetter($(this).attr("id"));
        disableButton($(this));
    });
}

function updateWord(positions, letter) {
    for (var pos of positions) {
        board[pos] = letter;
    }    
    
    updateBoard();
}

function checkLetter(letter) {
    var positions = new Array();
    
    for (var i = 0; i < selectedWord.length; i++) {
        console.log(selectedWord);
        if (letter == selectedWord[i]) {
            positions.push(i);
        }
    }
    
    if (positions.length > 0) {
        
        updateWord(positions, letter);
        
        if (!board.includes("_")) {
            endGame(true);
            //guessedWords.push(selectedWord);
            //$("#guessedWordsList").append("<li> " + selectedWord + "</li>");
        }
    } else {
        remainingGuesses--;
        updateMan();
    }
    
    if (remainingGuesses <= 0) {
        endGame(false);
    }
    
    
}

function updateMan() {
    $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png");
}

function endGame(win) {
    $("#letters").hide();
    
    var id = (win ? "#win" : "#lost");
    
    $(id).show();
}

function disableButton(btn) {
    btn.prop("disabled", true);
    btn.attr("class", "btn btn-danger");
}