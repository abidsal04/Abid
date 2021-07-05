function editEnable(){
    document.getElementById("name").disabled = false;
    document.getElementById("email").disabled = false;
    document.getElementById("phone").disabled = false;
    document.getElementById("profession").disabled = false;
    document.getElementById("update").disabled = false;

}


function update(){

    var name=document.getElementById("name").value;
    var email=document.getElementById("email").value;
    var phone=document.getElementById("phone").value;
    var profession=document.getElementById("profession").value;

    err=""

    var mailformat = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var mobileformat = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    if(name=="")
        {
            document.getElementById("err").innerHTML="Enter name!";
        }
    else if(email.match(mailformat)==null)
    {
        document.getElementById("err").innerHTML="Enter Valid Email ";
    }
    else if(phone.match(mobileformat)==null)
    {
        document.getElementById("err").innerHTML="Enter Valid Phone Number!";
    }
    else if(profession=="")
        {
            document.getElementById("err").innerHTML="Enter profession";
        }

    else
    {

        dataString = 'name=' + name + '&email=' + email + '&phone=' + phone + '&profession=' + profession;

        var xhr = new XMLHttpRequest();

        // For Post Request
        xhr.open("POST", "database/updateProfile.php", true);
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhr.onreadystatechange=function(){
            if(xhr.status==200){
                console.log(this.responseText);
                
                document.getElementById("name").disabled = true;
                document.getElementById("email").disabled = true;
                document.getElementById("phone").disabled = true;
                document.getElementById("profession").disabled = true;
                document.getElementById("update").disabled = true;
                location.reload();
            }
        }
        xhr.send(dataString);
    }
}









// for changing password

function passwordEnable(){
    document.getElementById("ChangePassword").style.display = "block";
    document.getElementById("profile").style.display = "none";

}



function changePassword(){

    console.log("change");

    var oldpassword=document.getElementById("oldpassword").value;
    var newpassword=document.getElementById("newpassword").value;
    var cpassword=document.getElementById("cpassword").value;

    err1="";

    if(oldpassword=="")
        {
            document.getElementById("err1").innerHTML="Enter old password!";
        }
    else if(newpassword!=cpassword)
    {
        document.getElementById("err1").innerHTML="Password Does'nt match!";
    }
    else if(newpassword.match(/^.{6,}$/)==null)
        {
            document.getElementById("err1").innerHTML="Minimum 6 character required!";
        }

    else
    {

        dataString = 'newpassword=' + newpassword + '&oldpassword=' + oldpassword;

        var xhr = new XMLHttpRequest();

        // For Post Request
        xhr.open("POST", "database/changePassword.php", true);
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhr.onreadystatechange=function(){
            if(xhr.status==200){
                console.log(this.responseText);
                if(this.responseText==""){
                    location.reload();
                }
                else{
                    document.getElementById("err1").innerHTML=this.responseText;
                }
            }
        }
        xhr.send(dataString);
    }
}