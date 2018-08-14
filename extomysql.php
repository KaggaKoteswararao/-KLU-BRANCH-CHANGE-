<?php
session_start();

error_reporting(E_ALL);
$connect = mysqli_connect("localhost", "root", "", "kluniversity");
$output = '';
 
 $tmp = explode(".", $_FILES["excel"]["name"]);
 $extension = end($tmp); // For getting Extension of selected file
 $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
 if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
 {
  $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
  include("PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file

  $output .= "<label class='text-success'>Data Inserted</label><br /><table class='table table-bordered'>";
        $output .= '<td>'.'year'.'</td>';
        $output .= '<td>'.'id'.'</td>';
	$output .= '<td>'.'name'.'</td>';
	$output .= '<td>'.'cgpa'.'</td>';
	$output .= '<td>'.'changed_from'.'</td>';
	$output .= '<td>'.'changed_to'.'</td>';
  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
  {
   $highestRow = $worksheet->getHighestRow();
   for($row=2; $row<=$highestRow; $row++)
   {
    $output .= "<tr>";
         $year= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
         $id = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
	 $name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
	$cgpa= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
	$changed_from = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
	$changed_to = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
	
    $query = "INSERT INTO student VALUES ('".$year."', '".$id."', '".$name."', '".$cgpa."', '".$changed_from."', '".$changed_to."')";
    mysqli_query($connect, $query);
    $output .= '<td>'.$year.'</td>';
    $output .= '<td>'.$id.'</td>';
	$output .= '<td>'.$name.'</td>';
	$output .= '<td>'.$cgpa.'</td>';
	$output .= '<td>'.$changed_from.'</td>';
	$output .= '<td>'.$changed_to.'</td>';
	$output .= '</tr>';
   }
  }
  $output .= '</table>';

 }
 
 else
 {
     
  $output = '<label class="text-danger">Invalid File</label>'; //if non excel file then
 }
echo"$output ."
?>

