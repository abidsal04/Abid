// login
function checkregister()
{
    console.log("submitForm");
    var name=document.getElementById("name").value;
    var email=document.getElementById("email").value;
    var phone=document.getElementById("phone").value;
    var profession=document.getElementById("profession").value;
    var password=document.getElementById("password").value;
    var cpassword=document.getElementById("cpassword").value;

    // console.log(password);


    var mailformat = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var mobileformat = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;

    if(name=="")
    {
        document.getElementById("err").innerHTML="Enter Your name!";
    }
    else if(email.match(mailformat)==null)
    {
        document.getElementById("err").innerHTML="Enter Valid email id!";
    }
    else if(phone.match(mobileformat)==null)
    {
        document.getElementById("err").innerHTML="Enter Valid Phone Number!";
    }
    else if(profession=="")
    {
        document.getElementById("err").innerHTML="Enter Your profession!";
    }
    else if(password=="" || cpassword=="")
    {
        document.getElementById("err").innerHTML="Enter Your password!";
    }
    else if(password!=cpassword)
    {
        document.getElementById("err").innerHTML="Password does'nt match!";
    }

    else
    {
        dataString = 'name=' + name + '&email=' + email + '&phone=' + phone + '&profession=' + profession + '&password=' + password;

        var xhr = new XMLHttpRequest();

        // For Post Request
        xhr.open("POST", "database/insertRegister.php", true);
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhr.onreadystatechange=function(){
            if(xhr.status==200){
                console.log(this.responseText);
                document.getElementById("err").innerHTML=this.responseText;
                document.getElementById("register").reset();
                // window.location.href= "http://localhost/thinkexam/users/login.php";
            }
        }
        xhr.send(dataString);
    }
}