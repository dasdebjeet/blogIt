<?php

foreach ($_POST as $param_name => $param_val) {
    echo "Param: $param_name; Value: $param_val <br/>\n";
}

$file_name =  $_FILES['mainImg_file']['name']; //getting file name
echo $file_name;

$tmp_name = $_FILES['mainImg_file']['tmp_name']; //getting temp_name of file
$file_up_name = time().$file_name; //making file name dynamic by adding time before file name
move_uploaded_file($_FILES["mainImg_file"]["tmp_name"], "uploads/".$file_up_name); //moving file to the specified folder with dynamic name
echo "file uploaded";

?>
