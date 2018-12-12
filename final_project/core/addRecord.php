<!DOCTYPE html>
<?php
    session_start();
?>

<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    	  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
    	  
        <title> Login </title>
        <style>
            body {
                text-align:center;
                background-color: cornflowerblue;
            }
            
            .error {
                color: red;
            }
        </style>
        
        <script>
            $(document).ready(function() {
                $("#table").change(function() {
                    $("#dataEntry").html("");
                    
                    var val = $(this).val();
                    var elements = [];
                    var title = [];
                    
                    if (val == "songs") {
                        elements.push("<input type = 'text' name = 'songName'> <br /><br />");
                        elements.push("<input type = 'text' name = 'songArtist'> <br /><br />");
                        elements.push("<input type = 'text' name = 'songGenre'> <br /><br />");
                        elements.push("<input type = 'text' name = 'songDuration'> <br /><br />");
                        elements.push("<input type = 'submit' name = 'submitEntry' value = 'Add Song!'>");
                        
                        title.push("<span> Song Name: </span>");
                        title.push("<span> Song Artist: </span>");
                        title.push("<span> Song Genre: </span>");
                        title.push("<span> Song Duration: </span>");
                        
                    } else if (val == "albums") {
                        elements.push("<input type = 'text' name = 'albumName'> <br /><br />");
                        elements.push("<input type = 'number' name = 'albumYear'> <br /><br />");
                        elements.push("<input type = 'text' name = 'albumArtist'> <br /><br />");
                        elements.push("<input type = 'text' name = 'albumGenre'> <br /><br />");
                        elements.push("<input type = 'number' name = 'albumNumSongs' min = '1' value = '1'> <br /><br />");
                        elements.push("<input type = 'text' name = 'albumDuration'> <br /><br />");
                        elements.push("<input type = 'submit' name = 'submitEntry' value = 'Add Album!'>");
                        
                        title.push("<span> Album Name: </span>");
                        title.push("<span> Album Year: </span>");
                        title.push("<span> Album Artist: </span>");
                        title.push("<span> Album Genre: </span>");
                        title.push("<span> Album Number of Songs: </span>")
                        title.push("<span> Album Total Duration: </span>");
                    }
                    

                    for (var i = elements.length - 1; i >= 0; i--) {
                        $(elements[i]).prependTo("#dataEntry");
                        if (i < title.length) {
                            $(title[i]).prependTo("#dataEntry");
                        }
                    }
                    
                }) 
            });
        </script>
    </head>
    <body>

        <h1> OtterMusic [ADMIN] - Add Record </h1>
        
        <div>
            Select Table: 
            <select id = "table">
              <option value = "">Select One</option>
              <option value = "albums">Albums</option>
              <option value = "songs">Songs</option>
            </select>
        </div>
        <br />

        <form id = "dataEntry" method="post" action = "../api/insertData.php">
        </form>


    <footer>

            <br />

            <figure>
              <!-- <img id = "csumbLogo" src = "../../templates/img/csumb_logo.png" alt = "CSUMB Logo"/> -->
              <!-- <img id = "buddyVerified" src = "../../templates/img/buddy_verified.png" alt = "Buddy Verified" /> -->
            </figure>


        </footer>
    </body>
    
</html>