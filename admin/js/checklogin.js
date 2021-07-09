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
                    window.location.href= "admin.php";
                }
                else{
                    // console.log(resp);
                    document.getElementById("err").innerHTML=resp;
                }
            }
        }
        xhr.send(dataString);
    }
    
}