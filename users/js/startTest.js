function startTest(testid){
    console.log(testid);

    window.location.href = `http://localhost/Abid/users/testQuestions.php?test_id=${testid}`;
}