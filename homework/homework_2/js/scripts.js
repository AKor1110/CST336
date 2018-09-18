function display(tag) {

    var value = tag.value;
    var id = "#" + tag.id;
    
    if (value == "hidden") {
        $(id).val("show");
        $((tag.id == "decimal" ? "#dec" : "#hex")).show();
    } else {
        $(id).val("hidden");
        $((tag.id == "decimal" ? "#dec" : "#hex")).hide();
    }
    
}