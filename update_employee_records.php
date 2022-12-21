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
<br>
<br>
<br>
<br>
<br>

    <?php
    if(isset($_POST['update2'])) {
        require 'mysql_connect.php';

        $employee_id = mysqli_real_escape_string($connection, $_POST['employee_id']);
        $salary = mysqli_real_escape_string($connection,$_POST['salary']);
        $phone_number = mysqli_real_escape_string($connection,$_POST['phone_number']);
        $email = mysqli_real_escape_string($connection,$_POST['email']);

        $query = "SELECT min_salary, max_salary from hr_jobs where job_id = (select job_id from hr_employees where employee_id=$employee_id)";
        $answer = mysqli_query($connection, $query);
        $result = mysqli_fetch_assoc($answer);
        $min_salary = $result['min_salary'];
        $max_salary = $result['max_salary'];

        if (($employee_id != "") && ($salary != "") && ($phone_number != "") && ($email != "")) {
            if (!($salary < $min_salary or $max_salary < $salary)) {
                $sql = "UPDATE hr_employees SET salary = '$salary', phone_number = '$phone_number',
                        email = '$email' WHERE employee_id = '$employee_id'";
                $return_value = mysqli_query($connection, $sql);
                if (!$return_value) {
                    die('Failure!: ' . mysqli_error($connection));
                }
                echo "Data Changed!\n";
            } else{
                die("ERROR: Salary goes outside min/max. ");
            }
        } else{
            die('Please enter values for all fields.');
        }
        mysqli_commit($connection);
        mysqli_close($connection);
    }
    ?>

      <?php
    try {
        require 'mysql_connect.php';
        $query = "SELECT * FROM hr_employees";
   
        print "<table>&nbsp;";
        $result = $connection->query($query);
        $row = $result->fetch_assoc();
        print "&nbsp;<tr>";
        foreach ($row as $field => $value){
            print " <th>&nbsp;&nbsp;$field</th>";
        } 
        print "</tr>";
       
        $data = $connection->query($query);
        $data->fetch_assoc();
        foreach($data as $row){
            print " <tr>";
            foreach ($row as $name=>$value){
                print " <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$value&nbsp;</td>";
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
                <th width="220", align="right">Where Employee ID =</th>
                <td><input name="employee_id" type="text" id="employee_id"></td>
            </tr>
            <tr>
                <th align="right"></th>
            </tr>
            <tr>
                <th align="right">Salary =</th>
                <td><input name="salary" type="text" id="salary"></td>
            </tr>
            <tr>
                <th align="right">Phone Number =</th>
                <td><input name="phone_number" type="text" id="phone_number"></td>
            </tr>
            <tr>
                <th align="right">Email =</th>
                <td><input name="email" type="text" id="email"></td>
            </tr>
            <tr>
                <td width="100"> </td>
                <td>
                    <input name="update2" type="submit" id="update2" value="Update">
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>
