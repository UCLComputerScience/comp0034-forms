function validateName() {
    let name = document.querySelector("#name").value;
    let patt = new RegExp("[A-Za-z]+");
    let res = patt.test(name);
    if (!res){
        alert("Only letters are allowed in names");
    }
}
