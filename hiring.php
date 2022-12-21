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
    <form action="insert.php" id="add_employee" method="post">
            <br>
            
            <label>First Name</label>
            <label>
                <input class="w3-input w3-border w3-round" type="text" name="first_name" id="first_name">
            </label>
            <label>Last Name</label>
            <label>
                <input class="w3-input w3-border w3-round" type="text" name="last_name" id="last_name">
            </label>
            <label>Email</label>
            
            <label>
                <input class="w3-input w3-border w3-round" type="text" name="email" id="email">
            </label>
            <br>
            <label>Phone</label>
            <label>
                <input class="w3-input w3-border w3-round" type="text" name="phone_number" id="phone_number">
            </label>
            <label>Hire Date</label>
            <label>
                <input class="w3-input w3-border w3-round" type="text" name="hire_date" id="hire_date">
            </label>
            <label>Salary</label>
            <label>
                <input class="w3-input w3-border w3-round" type="text" name="salary" id="salary">
            </label>
            <br>

        
            <label for='job_id'>Select Job Title:</label>
            <select name='job_id'>
                <?php
                require "mysql_connect.php";
                $sql = "select job_id, job_title from hr_jobs";
                $result = $connection->query($sql);
                echo "<option>Select Job Title...</option>";
                while ($row = $result->fetch_assoc()){
                    $rowVal = "{$row['job_id']}  {$row['job_title']}";
                    echo "<option value=$row[job_id]>$rowVal</option>";
                }
                mysqli_close($connection);
                ?>
            </select>

        <br><br>

        
        <label for='manager_id'>Select Manager Title:</label>
        <select name='manager_id'>
            <?php
            require "mysql_connect.php";
            $sql = "select employee_id, first_name, last_name from hr_employees";
            $result = $connection->query($sql);
            echo "<option>Select Manager ID...</option>";
            while ($row = $result->fetch_assoc()){
                $rowVal = "{$row['employee_id']}  {$row['first_name']}  {$row['last_name']}";
                echo "<option value=$row[employee_id]>$rowVal</option>";
            }
            mysqli_close($connection);
            ?>
        </select>

        <br><br>

        <label for='department_id'>Select Department Title:</label>
        <select name='department_id'>
            <?php
            require "mysql_connect.php";
            $sql = "select department_id, department_name from hr_departments";
            $result = $connection->query($sql);
            echo "<option>Select Department ID...</option>";
            while ($row = $result->fetch_assoc()){
                $rowVal = "{$row['department_id']}  {$row['department_name']}";
                echo "<option value=$row[department_id]>$rowVal</option>";
            }
            mysqli_close($connection);
            ?>
        </select>

        <br><br>

        <input type="submit" name="submit" value="Hire">
        <input type="reset" onclick="myFunction" value="Cancel">

        <br><br>

    </form>

</div>
</body>
</html>
