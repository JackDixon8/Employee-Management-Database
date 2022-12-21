<?php

$link = mysqli_connect("localhost", "root", "", "hr_database");

if($link === false){
    die("ERROR: bad connection. " . mysqli_connect_error());
}
 

$job_id = mysqli_real_escape_string($link, $_REQUEST['job_id']);
$job_title = mysqli_real_escape_string($link, $_REQUEST['job_title']);
$min_salary = mysqli_real_escape_string($link, $_REQUEST['min_salary']);
$max_salary = mysqli_real_escape_string($link, $_REQUEST['max_salary']);




$sql = "INSERT INTO hr_jobs (job_id, job_title, min_salary, max_salary)
 VALUES ('$job_id', '$job_title', '$min_salary', '$max_salary' )";
if(mysqli_query($link, $sql)){
    echo "A  new job has been created.";
    mysqli_commit($link);
} else{
    echo "ERROR: cant execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
?>