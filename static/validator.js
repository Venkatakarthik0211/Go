function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}
function validateForm() {
    var fname = document.order.fname.value;
    var lname = document.order.lname.value;
    var email = document.order.email.value;
    var pno = document.order.pno.value;
    var fnameErr = emailErr = pnoErr = true;
    if(fname == "") {
        printError("fnameErr", "Please enter your first name");
    } else {
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(fname) === false) {
            printError("fnameErr", "Please enter a valid first name");
        } else {
            printError("fnameErr", "");
            fnameErr = false;
        }
    }
    if(lname == "") {
        printError("lnameErr", "Please enter your last name");
    } else {
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(lname) === false) {
            printError("lnameErr", "Please enter a valid last name");
        } else {
            printError("lnameErr", "");
            lnameErr = false;
        }
    }



    if(email == "") {
        printError("emailErr", "Please enter your email address");
    } else {
        var regex = /^\S+@\S+\.\S+$/;
        if(regex.test(email) === false) {
            printError("emailErr", "Please enter a valid email address");
        } else{
            printError("emailErr", "");
            emailErr = false;
        }
    }
    if(pno == "") {
        printError("pnoErr", "Please enter your pno number");
    } else {
        var regex = /^[1-9]\d{9}$/;
        if(regex.test(pno) === false) {
            printError("pnoErr", "Please enter a valid 10 digit pno number");
        } else{
            printError("pnoErr", "");
            pnoErr = false;
        }
    }
    if((fnameErr || emailErr || pnoErr || lnameErr) == true) {
       return false;

    }
};



