function onClick() {
    console.log(this.id);
}

function clickEmbedded() {
    console.log("here");
    $("#contact-form").empty();
    $("#contact-form").append('<form action = "contact.php" method = "post">');
    $("#contact-form").append('<h2> Contact Me </h2>');
    $("#contact-form").append('<h3>Name: </h3><br /> <input type = "text" name = "name" maxlength = "12" required> <br /> <br />');
    $("#contact-form").append('<h3>Email: </h3><br /> <input id = "email" type = "text" name = "email" maxlength = "30" required> <br /> <br />');
    $("#contact-form").append('<h3>Address: </h3><br /> <input type = "text" name = "address" maxlength = "30" required> <br /> <br />');
    $("#contact-form").append('<h3>Phone Number: </h3><br /> <input id = "phone" type = "text" name = "phone" maxlength = "14" placeholder = "(xxx)-xxx-xxxx"> <br /> <br />');
    $("#contact-form").append('<h3>Comments: </h3><br /> <textarea id = "comments" name = "comments"> </textarea> <br /> <br /> <br />');
    $("#contact-form").append('<input id = "submitButton" type = "submit" value = "Submit"><br /><br /><br /> </form>');
    
}