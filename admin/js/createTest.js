// Submit test Form
function submitDetail()
    {
        console.log("submitForm");
        var testName=document.getElementById("testName").value;
        var negativeMarking=document.getElementById("negativeMarking").value;
        var passingMarks=document.getElementById("passingMarks").value;
        var publishDate=document.getElementById("publishDate").value;
        var countCategory=document.getElementById("countCategory").value;


        var category = [];
        for (let i = 1; i <= countCategory; i++) {
            var checkbox = document.getElementById(`customSwitch${i}`);  
            if (checkbox.checked == true){  
                category.push(checkbox.value);
            } 
        }

        document.getElementById("error1").innerHTML="";
        // document.getElementById("error2").innerHTML="";
        document.getElementById("error3").innerHTML="";



        if(testName=="")
        {
            document.getElementById("error1").innerHTML="Enter Test name!";
        }
        else if(passingMarks.match("^[0-9]")==null)
        {
            document.getElementById("error2").innerHTML="Enter Valid marks";
        }
        else if (category.length==0) {
            document.getElementById("error3").innerHTML="Please select atleast one category";
        }
        

        else
        {

            dataString = 'testName=' + testName + '&negativeMarking=' + negativeMarking + '&passingMarks=' + passingMarks + '&report=' + 'Not Generated' + '&publishDate=' + publishDate + '&category=' + category;

            var xhr = new XMLHttpRequest();

            // For Post Request
            xhr.open("POST", "database/insertTest.php", true);
            xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xhr.onreadystatechange=function(){
                if(xhr.status==200){
                    console.log(this.responseText);
                    window.location.href = "http://localhost/thinkexam/admin/tests.php";

                }
            }
            xhr.send(dataString);
        }
        
    }



// Submit question
// function submitQuestion()
//     {
//         console.log("submitQuestion");


//         var option = document.getElementsByName('option[]');
//         var Question = document.getElementsByName('Question[]');
//         var answer = document.getElementsByName('answer[]');
//         var testid = document.getElementById("test_id").value;


//         optiondata="INSERT INTO `options` (`answer`, `qid`, `test_id`) VALUES";
//             j=1;
//             for (var i = 0; i < option.length; i++) {
//                 var a = option[i];

//                 optiondata += " ('" +a.value+ "'," + "'" +j+ "', '" +testid+ "')";
//                 if((i+1)!=option.length){
//                     optiondata += ","
//                 }

//                 if((i+1)%4==0){
//                     j++;
//                 }
//             }


//         questiondata="INSERT INTO `questions` (`question`, `ans_opt_id`, `test_id`) VALUES";

//             for (var i = 0; i < Question.length; i++) {
//                 var a = Question[i];
    
//                 questiondata += " ('" +a.value+ "'," + "'" +answer[i].value+ "', '" +testid+ "')";
//                 if((i+1)!=Question.length){
//                     questiondata += ","
//                 }
//             }


//             // sending options to database
//             optionString = 'sql=' + optiondata;

//             var xhr = new XMLHttpRequest();

//             // For Post Request
//             xhr.open("POST", "database/insertoption.php", true);
//             xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
//             xhr.onreadystatechange=function(){
//                 if(xhr.status==200){
//                     console.log(this.responseText);

//                 }
//             }
//             xhr.send(optionString);



//             // sending questions to database
//             questionString = 'sql=' + questiondata;

//             var xhr = new XMLHttpRequest();

//             // For Post Request
//             xhr.open("POST", "database/insertquestion.php", true);
//             xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
//             xhr.onreadystatechange=function(){
//                 if(xhr.status==200){
//                     console.log(this.responseText);
//                     window.location.href= "http://localhost/thinkexam/admin/tests.php";

//                 }
//             }
//             xhr.send(questionString);
        
//     }


