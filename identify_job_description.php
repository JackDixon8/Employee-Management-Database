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
<form action="identify_job_description_action.php" id="add_employee" method="post">
    <div class="w3-container w3-card-2" style="margin-left:20%">
        <div class="w3-container w3-card-2 w3-teal">
            <h1>Identify Job Description</h1>
        </div>

        <br><br>

        <label for='job_id'>Select Job ID:</label>
        <select name='job_id'>
            <?php
            require "mysql_connect.php";
            $sql = "select job_id from hr_jobs";
            $result = $connection->query($sql);
            echo "<option>Select Job ID...</option>";
            while ($row = $result->fetch_assoc()){
                $rowVal = "{$row['job_id']}";
                echo "<option value=$row[job_id]>$rowVal</option>";
            }
            mysqli_close($connection);
            ?>
        </select>
        <input type="submit" name="submit" value="Submit">

    <br><br><br><br>
    </div>



</body>
</html>
