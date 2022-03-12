<?php
    function reset_cookie(){
        unset($_COOKIE['oreo_blogW']);
        setcookie('oreo_blogW', '', time() - 3600, '/');

        return TRUE;
    }

    if(reset_cookie()){
        echo "Succesfully logouted";
    }else{
        echo "Failed logout ";
    }
?>
