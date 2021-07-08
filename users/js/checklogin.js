// login
function checklogin()
{
    console.log("submitForm");
    var email=document.getElementById("email").value;
    var password=document.getElementById("password").value;

    // console.log(password);

    err="";

    var mailformat = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if(email.match(mailformat)==null)
    {
        document.getElementById("err").innerHTML="Enter Valid Email";
    }
    else if(password=="")
    {
        document.getElementById("err").innerHTML="Enter password";
    }
    

    else
    {

        dataString = 'email=' + email + '&password=' + password;

        var xhr = new XMLHttpRequest();

        // For Post Request
        xhr.open("POST", "database/checklogin.php", true);
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhr.onreadystatechange=function(){
            if(xhr.status==200){
                // console.log(this.responseText);
                resp = this.responseText;
                if(resp=="Success"){
                    window.location.href= "http://localhost/Abid/users/profile.php";
                }
                else{
                    // console.log(resp);
                    document.getElementById("err").innerHTML=resp;
                    // document.getElementById("login").reset();
                }
            }
        }
        xhr.send(dataString);
    }
    
}

// Forgot Password
function forgotPassword(){
    console.log("submitForm");
    var email=document.getElementById("email").value;



    var mailformat = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if(email.match(mailformat)==null)
    {
        document.getElementById("err").innerHTML="Enter Valid Email";
    }


    else
    {

        dataString = 'email=' + email;

        var xhr = new XMLHttpRequest();

        // For Post Request
        xhr.open("POST", "database/sendReset.php", true);
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhr.onreadystatechange=function(){
            if(xhr.status==200){
                // console.log(this.responseText);
                document.getElementById("err").innerHTML=this.responseText;
                document.getElementById("forgot").reset();
                }
            }
        xhr.send(dataString);
    }
}


// Reset Passsword
function resetPassword(){
    console.log("submitForm");
    var password=document.getElementById("password").value;
    var cpassword=document.getElementById("cpassword").value;
    var token=document.getElementById("token").value;




    if(password!=cpassword)
    {
        document.getElementById("err").innerHTML="Password Does'nt match!";
    }
    else if(password.match(/^.{6,}$/)==null)
        {
            document.getElementById("err").innerHTML="Minimum 6 character required!";
        }


    else
    {

        dataString = 'password=' + password + '&token=' + token;

        var xhr = new XMLHttpRequest();

        // For Post Request
        xhr.open("POST", "database/storeResetPassword.php", true);
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhr.onreadystatechange=function(){
            if(xhr.status==200){
                // console.log(this.responseText);
                document.getElementById("err").innerHTML=this.responseText;
                document.getElementById("reset").reset();
                // window.location.href = "index.php";
                }
            }
        xhr.send(dataString);
    }
}