<?php
$yea1 = $_POST["year1"];
$yea2 = $_POST["year2"];
$year = "20".$yea1." - 20".$yea2;
$id = $_POST["id"];
$name = $_POST["sname"];
$cgpa = $_POST["cgpa"];
$cf = $_POST["pre_dept"];
$ct = $_POST["dept"];


$connect1 = mysqli_connect("localhost", "root", "", "kluniversity");
$query1 = "INSERT INTO student  VALUES('$year','$id','$name','$cgpa','$cf','$ct',0)";
echo $query1;
if((mysqli_query($connect1, $query1))){
    echo "Successfully Inserted";
    header("Location:home.html");
}
else{
    echo "Entry already Exist";
}
    
?>
