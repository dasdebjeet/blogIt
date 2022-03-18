<?php
    $file_name =  $_FILES['mainImg_file']['name']; //getting file name

    $tmp_name = $_FILES['mainImg_file']['tmp_name']; //getting temp_name of file
    $file_up_name = "mainBlog_Img_".$file_name; //making file name dynamic by adding time before file name
    move_uploaded_file($_FILES["mainImg_file"]["tmp_name"], "../assests/blog_main_img/".$file_up_name); //moving file to the specified folder with dynamic name
    // echo "file uploaded";
?>
