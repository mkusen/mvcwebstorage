function testEmptyField(){
    var user = document.forms["form_login"]["username"].value;
    var pass = document.forms["form_login"]["password"].value;
    
    if(user === ""){
        alert("Upisati korisničko ime");
        return false;
    }
    
    if(pass === ""){
        alert("Upisati lozinku");
        return false;
    }
    
    return true;
}