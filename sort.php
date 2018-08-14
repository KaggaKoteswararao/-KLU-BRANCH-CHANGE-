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
$connect = mysqli_connect("localhost","root","","kluniversity");
$order = $_POST["order"];
$order1 = $_POST["s"];
$sql="SELECT * FROM student order by ".$order1." ".$order;


$result=mysqli_query($connect,$sql);
$num = mysqli_num_rows($result);
if($num>0)
{

echo"<table>";
echo"<tr>
<th>Year</th>
<th>ID Number</th>
<th>Name</th>
<th>CGPA</th>
<th>Changed from</th>
<th>Changed to</th>
</tr>";

while($row=mysqli_fetch_array($result))
{

  echo"<tr>";
  echo"<td>".$row['year']."</td>&nbsp;&nbsp;";
  echo"<td>".$row['id']."</td>&nbsp;&nbsp;";
  echo"<td>".$row['name']."</td>&nbsp;&nbsp;";
  echo"<td>".$row['cgpa']."</td>&nbsp;&nbsp;";
  echo"<td>".$row['changed_from']."</td>&nbsp;&nbsp;";
  echo"<td>".$row['changed_to']."</td>&nbsp;&nbsp;";
  echo"</tr><br />";

}

echo"</table>";
}


?>

       
    </body>
</html>