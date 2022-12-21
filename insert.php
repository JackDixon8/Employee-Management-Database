<?php

$link = mysqli_connect("localhost", "root", "", "hr_database");
// Check connection
if($link === false){
    die("ERROR: Bad Connection. " . mysqli_connect_error());
}
 
$first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$phone_number = mysqli_real_escape_string($link, $_REQUEST['phone_number']);
$hire_date = mysqli_real_escape_string($link, $_REQUEST['hire_date']);
$salary = mysqli_real_escape_string($link, $_REQUEST['salary']);
$job_id = mysqli_real_escape_string($link, $_REQUEST['job_id']);
$manager_id = mysqli_real_escape_string($link, $_REQUEST['manager_id']);
$department_id = mysqli_real_escape_string($link, $_REQUEST['department_id']);

$query = "SELECT min_salary, max_salary from hr_jobs where job_id=$job_id";
$answer = mysqli_query($link, $query);
$result = mysqli_fetch_assoc($answer);
$min_salary = $result['min_salary'];
$max_salary = $result['max_salary'];

if (!($salary < $min_salary or $max_salary < $salary)) {
    $sql = "INSERT INTO hr_employees (first_name, last_name, email, phone_number, hire_date, salary, job_id, manager_id, department_id)
     VALUES ('$first_name', '$last_name', '$email', '$phone_number' , '$hire_date' , '$salary',  '$job_id',  '$manager_id',  '$department_id')";
    if (mysqli_query($link, $sql)) {
        echo "Records added.";
        mysqli_commit($link);
    } else {
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    }
} else{
    echo "ERROR: Salary is outside min/max. ";
}
mysqli_commit($link);

mysqli_close($link);
?>