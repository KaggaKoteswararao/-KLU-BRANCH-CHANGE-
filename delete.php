-
<html>
<head>
  <title>Import Excel to Mysql using PHPExcel in PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="script.js"></script>
  <style>
  body
  {
   margin:0;
   padding:0;
   background-color:#f1f1f1;
  }
  .box
  {
   width:700px;
   border:1px solid #ccc;
   background-color:#fff;
   border-radius:5px;
   margin-top:100px;
  }
  .abhishake {
    height: 80px;
    width :100%;
    font-size:3em;
    padding:30px 50px 30px 50px;

}
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td {
     
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}
th {
     background-color: #4CAF50;
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
body{
    background-image: url("back.jpeg");
}
  </style>
 </head>
<body>
<div class="abhishake" style="background-color:  #801b00;color:#e5e5e5; margin-bottom:.20em ;width:100%"><center> KLU Departmental Changes<cente></div>

 <div class="container box">
   <div class="row" style="background-color:black">
			<div class="col-md-1" >
				<img src="download1.png" class="pull-left img-responsive" alt="KLU LOGO"/>
			</div>
			
</div>	
<?php
session_start();

error_reporting(E_ALL);

$link = mysqli_connect("localhost", "root", "", "kluniversity");

$btype = $_POST["dlist"];

if($btype==="deletedlist"){
    header("Location:deletedlist.php");
}
else{
    


if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 $del = $_POST['name'];
$sql1="UPDATE student SET active=1 where id='$del'";
 
if($result1 = mysqli_query($link, $sql1)){
$sql = "SELECT * FROM student where active=0";
if($result = mysqli_query($link, $sql)){
   if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-bordered'>";
            echo "<tr>";
                echo "<th>year</th>&nbsp;";
                echo "<th>id no</th>&nbsp;";
                echo "<th>name</th>&nbsp;";
                echo "<th>cgpa</th>&nbsp;";
		echo "<th>changed from</th>&nbsp;";
		echo "<th>changed to</th>&nbsp;";
            echo "</tr>";
            
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['year'] . "</td>&nbsp;";
                echo "<td>" . $row['id'] . "</td>&nbsp;";
                echo "<td>" . $row['name'] . "</td>&nbsp;";
                echo "<td>" . $row['cgpa'] . "</td>&nbsp;";
		echo "<td>" . $row['changed_from'] . "</td>&nbsp;";
		echo "<td>" . $row['changed_to'] . "</td>&nbsp;";
            echo "</tr>";
        }
        echo "</table>";
        
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
}
}
 else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

}
// Close connection
mysqli_close($link);
?>
</div>
</body>
</html>