<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>

    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );

        function myFunction() {
            document.getElementById("myForm").reset();
        }
    </script>

  





<style>



body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

.navbar {
  overflow: hidden;
  background-color: #333; 
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.subnav {
  float: left;
  overflow: hidden;
}

.subnav .subnavbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .subnav:hover .subnavbtn {
  background-color: blue;
}

.subnav-content {
  display: none;
  position: absolute;
  left: 0;
  background-color: blue;
  width: 100%;
  z-index: 1;
}

.subnav-content a {
  float: left;
  color: white;
  text-decoration: none;
}

.subnav-content a:hover {
  background-color: #eee;
  color: black;
}

.subnav:hover .subnav-content {
  display: block;
}
</style>
</head>
<body>

<div class="navbar">
  <a href="#home">Home</a>
 
  
  <div class="subnav">
    <button class="subnavbtn">Employee Main Menu <i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
    <a href="hiring.php" class="w3-bar-item w3-button">&emsp;Employee Hire</a>
    <a href="update_employee_records.php" class="w3-bar-item w3-button">&emsp;Update Employee Info</a>
   
    </div>
  </div>
  <div class="subnav">
    <button class="subnavbtn">Jobs Main Menu <i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
    <a href="identify_job_description.php" class="w3-bar-item w3-button">&emsp;Identify JOB Description</a>
    <a href="changejob.php" class="w3-bar-item w3-button">&emsp;Change Job Description</a>
    <a href="create.php" class="w3-bar-item w3-button">&emsp;Create a New Job</a>
    </div>
  </div>
  

</body>
</div>

<div class="w3-container w3-card-2" style="margin-left:20%">
    <div class="w3-container w3-card-2 w3-teal">
        <h1>Job Description </h1>
    </div>
<br>
    <?php
    if(isset($_POST['getjob'])) {
        require 'mysql_connect.php';

        $job_id = mysqli_real_escape_string($connection, $_POST['job_id']);
        $job_title = mysqli_real_escape_string($connection,$_POST['job_title']);
	    $min_salary = mysqli_real_escape_string($connection,$_POST['min_salary']);
        $max_salary = mysqli_real_escape_string($connection,$_POST['max_salary']);

		if (($job_id != "") && ($job_title != "") && ($min_salary != "") && ($max_salary != "")) {
            $sql = "UPDATE hr_jobs SET job_title = '$job_title', min_salary = '$min_salary',
                    max_salary = '$max_salary' WHERE job_id = '$job_id'";
            $return_value = mysqli_query($connection, $sql);
            if (!$return_value) {
                die('Could not update: ' . mysqli_error($connection));
            }
            echo "Updated data.\n";
        } else{
            die('Please enter values for all fields.');
        }
        mysqli_close($connection);
    }
    ?>


 <?php
    try {
        require 'mysql_connect.php';
        $query = "SELECT * FROM hr_jobs";
        print "<table>&nbsp;";
        $result = $connection->query($query);
        $row = $result->fetch_assoc();
        print "&nbsp;<tr>";
        foreach ($row as $field => $value){
            print " <th>&nbsp;$field</th>";
        } 
        print "</tr>";
        $data = $connection->query($query);
        $data->fetch_assoc();
        foreach($data as $row){
            print " <tr>";
            foreach ($row as $name=>$value){
                print " <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$value&nbsp;</td>";
            } 
            print " </tr>";
        }
        print "</table>&nbsp;";
        mysqli_close($connection);
    } catch(mysqli_sql_exception $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    ?>
<br>

    <form method="post" action="">
        <table width="700" align="left" border="0" cellspacing="1" cellpadding="2">
            <tr>
                <th width="220", align="right">Where job ID =</th>
                <td><input name="job_id" type="text" id="job_id"></td>
            </tr>
            <tr>
                <th align="right">job title =</th>
                <td><input name="job_title" type="text" id="job_title"></td>
            </tr>
            <tr>
                <th align="right">min salary =</th>
                <td><input name="min_salary" type="text" id="min_salary"></td>
            </tr>
            <tr>
                <th align="right">max salary =</th>
                <td><input name="max_salary" type="text" id="max_salary"></td>
            </tr>
            <tr>
                <td width="100"> </td>
                <td>
                    <input name="getjob" type="submit" id="getjob" value="change job">
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
