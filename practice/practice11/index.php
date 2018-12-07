<!DOCTYPE html>

<html>
    <header>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <title> Video Rater </title>
        
        <style>
            body {
                text-align: center;
            }
        </style>
        
        <script>
            
            $(document).ready(function() {
               $(".ratingButton").change(function() {
                    $(".ratingButton").attr('disabled', true);
                    
                    var rating = $(this).val();
                    
                    $.ajax({
                        url: "addRating.php",
                        type: "GET",
                        data: {"rating" : rating}
                    });
                    
                    
                    $.ajax({
                        url: "ratings.php",
                        type: "POST",
                        dataType : "json",
                        sucess: function(data, status) {
                            alert(data);
                            $("#totalRatings").html("<h2> Total Ratings: " + parseInt(data.count) + "</h2>");
                        
                            var innerDiv = "<h2> Average Ratings: <h2> <br />";
                            
                            for (var i = 0; i < parseInt(data.average); i++) {
                                innerDiv += "<img src = 'star.png' alt = 'star'/>";
                            }
                            
                            $("#averageRatings").html(innerDiv);
                        }, // end success
                        complete: function(status) {
                            
                        }
                    }); // end ajax
                    
               });
               
            });
        </script>
    </header>
    
    
    <body>
        <h1> Rate this video: </h1>
        
        <iframe width="560" height="315" src="https://www.youtube.com/embed/gl1aHhXnN1k" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <br />
        <br />
        
        <h3>Stars:</h3>
        <input class = 'ratingButton' type = "radio" name = "stars" value = "1"> One </input>
        <input class = 'ratingButton' type = "radio" name = "stars" value = "2"> Two </input>
        <input class = 'ratingButton' type = "radio" name = "stars" value = "3"> Three </input>
        <input class = 'ratingButton' type = "radio" name = "stars" value = "4"> Four </input>
        
        <div id = "totalRatings"></div> <br />
        <div id = "averageRatings"></div> <br />
        
        <footer></footer>
    </body>
</html>