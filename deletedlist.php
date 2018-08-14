<!DOCTYPE html>

<html>
    <head>
        <title>Student list</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
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
</style>
        
    </head>
    <body>
       <div class="abhishake" style="background-color:  #801b00;color:#e5e5e5; margin-bottom:.20em; width:100%"><center> KLU Departmental Changes<cente></div>
        
<?php
session_start();
       
$connect = mysqli_connect("localhost","root","root","kluniversity" );
$select_qry = "select * from student where active = 1";

if($result = mysqli_query($connect, $select_qry)){
    if(mysqli_num_rows($result) > 0){
        echo "<table style='border 2px solid black'>";
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
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}



?>
       
    </body>
</html>