// Submit question
function submitQuestion()
    {
        console.log("submitQuestion");

        var question = document.getElementById("question").value;
        var option1 = document.getElementById("option1").value;
        var option2 = document.getElementById("option2").value;
        var option3 = document.getElementById("option3").value;
        var option4 = document.getElementById("option4").value;
        var answer = document.getElementById("answer").value;
        var category = document.getElementById("category").value;



        if(question=="")
        {
            document.getElementById("err").innerHTML="Enter Question!";
        }
        else if(option1=="" || option2=="" || option3=="" || option4=="")
        {
            document.getElementById("err").innerHTML="Fill all options!";
        }
        
        else
        {

            dataString = 'category=' + category + '&question=' + question + '&option1=' + option1 + '&option2=' + option2 + '&option3=' + option3 + '&option4=' + option4 + '&answer=' + answer ;

            var xhr = new XMLHttpRequest();

            // For Post Request
            xhr.open("POST", "database/insertQuestions.php", true);
            xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xhr.onreadystatechange=function(){
                if(xhr.status==200){
                    console.log(this.responseText);
                    document.getElementById("err").innerHTML=this.responseText;
                    document.getElementById("createQuestion").reset();
                }
            }
            xhr.send(dataString);
        }
        
    }