<?php
if(isset($_POST['job_id'])) {
    require 'mysql_connect.php';

    $job_id_submit = $_POST['job_id'];

    if ($job_id_submit != "") {
        $sql = "select job_title from hr_jobs where job_id=$job_id_submit";
        $return_value = mysqli_query($connection, $sql);
        if (!$return_value) {
            die('Could not get data: ' . mysqli_error($connection));
        }
        echo "Retrieved data successfully.  Result: \n";
    } else{
        die('Please enter a value for Job ID');
    }
    $result = mysqli_fetch_assoc($return_value);
    echo $result['job_title'];
    mysqli_close($connection);
}
?>
