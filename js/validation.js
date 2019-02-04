function validateForm() {

    //Check that age is not empty
    let age = document.forms["myForm"]["age"].value;
    //    var age = document.querySelector("#age").value;  //This format does the same as above

    if (age == "") {
        alert("Age must be entered");
        return false;  //Returns to the form with the values as entered
    }

    // If age is Not a Number or less than 18 or greater than 30 display an error on the form
    if (isNaN(age) || age < 18 || age > 30) {
        var text = "Age must be between 18 and 30";
        document.querySelector("#ageError").innerHTML = text;
        return false;  ////Returns to the form with the values as entered and error displayed next to the email
    } //if all is OK the form will be submitted and all values cleared

    /* To use this first add novalidate as an attribute in the form tag
    //check if the firstname is valid
    let firstname = document.querySelector("#firstname");
    if (!firstname.checkValidity()) {
        firstname.setCustomValidity("First letter must be capitalised and all subsequent letters lowercase");
        document.querySelector("#firstnameError").innerHTML = firstname.validationMessage;
        return false;
    } else {
        document.querySelector("#firstnameError").innerHTML = "";
        return false;
    }
    */

    let password = document.querySelector("#password").value;
    let patt = new RegExp("[0-9]+");
    let res = patt.test(password);
    if (!res){
        alert("Only numbers are allowed in passwords");
        return false;
    }
}
