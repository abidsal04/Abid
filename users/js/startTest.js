function startTest(testid){
    console.log(testid);

    window.location.href = `http://localhost/thinkexam/users/testQuestions.php?test_id=${testid}`;
}