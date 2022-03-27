<?php

// blog thumbnail image file
if(isset($_FILES['mainImg_file'])){
    $file_name =  $_FILES['mainImg_file']['name']; //getting file name

    $tmp_name = $_FILES['mainImg_file']['tmp_name']; //getting temp_name of file
    $file_up_name = "mainBlog_Img_".$file_name; //making file name dynamic by adding time before file name
    move_uploaded_file($_FILES["mainImg_file"]["tmp_name"], "../assests/blog_main_img/".$file_up_name); //moving file to the specified folder with dynamic name
    echo "file uploaded";
}

if(isset($_POST['blog_thumbnail_name_delete'])){
    $blog_thumbnail_name = $_POST['blog_thumbnail_name'];

    $file_dir = "../assests/blog_main_img/mainBlog_Img_";
    $flag = unlink($file_dir.$blog_thumbnail_name);;
    echo $flag;
}

// blog content mini image file
if(isset($_FILES['blog_content_mini_img_file'])){
    $file_name =  $_FILES['blog_content_mini_img_file']['name']; //getting file name

    $tmp_name = $_FILES['blog_content_mini_img_file']['tmp_name']; //getting temp_name of file
    $file_up_name = "miniBlog_Img_".$file_name; //making file name dynamic by adding time before file name
    move_uploaded_file($_FILES["blog_content_mini_img_file"]["tmp_name"], "../assests/blog_content_mini_img/".$file_up_name); //moving file to the specified folder with dynamic name
    echo "file uploaded";
}

if(isset($_POST['miniImg_name_modify'])){
    $old_name = $_POST['miniImg_old_name'];
    $new_name = $_POST['miniImg_new_name'];

    $file_dir = "../assests/blog_content_mini_img/miniBlog_Img_";
    $flag = rename($file_dir.$old_name, $file_dir.$new_name);
    echo $flag;
}

if(isset($_POST['miniImg_name_delete'])){
    $miniImg_file_name = $_POST['miniImg_file_name'];

    $file_dir = "../assests/blog_content_mini_img/miniBlog_Img_";
    $flag = unlink($file_dir.$miniImg_file_name);;
    echo $flag;
}

?>
