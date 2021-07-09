function startTest(testid){
    console.log(testid);

    window.location.href = `../users/testQuestions.php?test_id=${testid}`;
}