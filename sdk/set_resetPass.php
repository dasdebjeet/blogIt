<?php

function mins_remaing($token){
    $en_timestamp = hex2bin(substr($token, 10));

    function decrypt($string){
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $decryption_iv = '1001100110011001';
        $decryption_key = "blogIt";
        $decryption = openssl_decrypt($string, $ciphering, $decryption_key, $options, $decryption_iv);

        return $decryption;
    }
    $de_timestamp = decrypt($en_timestamp);

    date_default_timezone_set('Asia/Kolkata');
    $datetime1 = new DateTime();
    $datetime2 = new DateTime(($de_timestamp));
    $interval = $datetime1->diff($datetime2);

    // $elapsed = $interval->format('%h:%i:%s');

    $years = $interval->format('%y'); 
    $months = $interval->format('%m'); 
    $days   = $interval->format('%d'); 
    $hours   = $interval->format('%h'); 
    $minutes = $interval->format('%i');

    return ($years * (365*24*60) + $months * (30*24*60) + $days * (24*60) + $hours * 60 + $minutes);
}

if(isset($_POST['token_check'])){
    require_once "get_resetPass.php";


    $token = $_POST['token_check'];
    $token_val = substr($token, 0, 10);

    $mins = mins_remaing($token);

    $obj = new reset_password();
    $result = $obj->tokenChecker($token_val); 

    if($result == 1){
        if($mins > 30){
            $obj = new reset_password();
            $result = $obj->reset_token($token_val);        
        }
        echo $mins;
    }else{
        echo "token expired";
    }
 
}

if(isset($_POST['email'])){
    require_once "get_resetPass.php";
    $user_email = $_POST['email'];

    $obj = new reset_password;
    $result = $obj->emailChecker($user_email);

    if($result){
        // header('Content-Type: application/json');
        $results = json_decode($result);
        $token = bin2hex(openssl_random_pseudo_bytes(5));

        $result = $obj->set_token($token, $user_email);
        if($result){
            function encrypt($string){      
                $ciphering = "AES-128-CTR";
                $iv_length = openssl_cipher_iv_length($ciphering);
                $options = 0;
                $encryption_iv = '1001100110011001';
                $encryption_key = "blogIt";
                $encryption = openssl_encrypt($string, $ciphering, $encryption_key, $options, $encryption_iv);
        
                return $encryption;
            }

            date_default_timezone_set('Asia/Kolkata');
            $encrypt_dt = encrypt(date("d-m-Y H:i:s"));
            $email_token = $token.(bin2hex($encrypt_dt));


            $to = $user_email;
            $subject = "Reset your password";


            $message = '
            <!DOCTYPE html>
            <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width,initial-scale=1">
                    <meta name="x-apple-disable-message-reformatting">
                    <title>Reset mail confirmation</title>
                    <link href="https://fonts.googleapis.com/css2?family=Rajdhani&display=swap" rel="stylesheet">

                    <style>
                        * {
                            margin: 0;
                            padding: 0;
                            outline: 0;
                            border: 0;
                            font-family: "Google Sans";
                        }

                        .siteL {
                            color: #ff3b1d;
                            font-family: fantasy;
                            font-size: 10em;
                            text-shadow: -2px 4px 8px #000000;
                        }

                        .resetPass_linkBtn {
                            background: #000000;
                            margin-top: 20px;
                            padding: 10px 20px;
                            font-family: inherit;
                            text-decoration: none;
                            color: #ffffff !important;
                            cursor: pointer;
                        }
                    </style>
                </head>

                <body style="margin:0;padding:0;background: #ffffff;">
                    <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0; background:transparent;">
                        <tr>
                            <td align="center" style="padding:0;">
                                <table role="presentation" style="width:60%; margin: 50px 0; border:0; border-collapse:collapse;border-spacing:0; background: #e6e6e6; color: #000000; box-shadow: 0 0 5px #cfcfcf;">
                                <tr>
                                    <td align="center" style="padding:0 20px; height:200px; background:#000000">
                                        <div class="siteL"><img src="https://lh3.googleusercontent.com/yLpCENVHsb1MIAdD87D1_vgp8P6Q1HfkNOBWxlwoLZ2AKK0YO_BlE43GxSzr9QorSpW5uTOK0LrvIAeaZQWkelmpwydpMqGYHzVgqFlVfQV-tdmok2kcWAAxzBCrwcglBtH5LNpiiCAhNhg2sKUhtZJyKdehtFldQ3rPkUbIL7Q8ZpDXbBwZD4s3YNasE8dV7dRCn3Ur_hgfG981jaBoPPonNs07AX84NlgAHCIVX1jDG4QnJ2628DE-p0XXfKuMR0b8GQfcPBUR2OHTQ3fDBh_46mieo2FiMueKpq4crcUhqw4VxHnJ7BOUY-hP_xUcdWi--FvnfDYeWm85SYQhBpojEXxCoGXO9zrGXv9HydvesO3sie9-7FUKZn_FaQLPFnJXL2APilla0nicrbw7Xf5C9YFG991wCOEEEqVSYtTaWLW0Cp-wfVKbzGMvr362tsf50UPrkirPr_o62V2d2QmIMGPaUPiJAhPyUYQ-p3HROo48zUhrmp-rhuo6IHYl2IK858b0XpL5vx_W9yIKB32CFRicJYt_HIiM4lABmIIog-UU_IWMJoxWeOCbAKmD5j4V15_yZBaCY3NAZa_jxHlPhlCAE-zONerdB9SOC_EIJPBIw_47Nev315OZLIELi7iemhF4jdNKQI43CY0MZG-qj1UyXdTR13RjXMfESCHmvN_tnQCEaX_PECHgXPPttr6wRd3Q8vohQ5C3yrBZUK0=w443-h247-no?authuser=0"></div>
                                    </td>
                                </tr>
                                    <tr>
                                        <td style="padding:30px;">
                                            <div style="font-size:18px">Dear '.$results[0]->user_name.',<br>Please verify your account via the link in the mail and reset your password. You can set your new password here:</div><br><br>
                                            <a class="resetPass_linkBtn" style="color:#ffffff" href="http://localhost/all_projects/Projects/blog_web2/blogW/update_password.php?token='.$email_token.'" style="cursor:pointer">
                                                Reset Password
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding:0 30px; font-weight:600">The blogIt Team</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:50px 30px 30px;text-align:center">
                                            <br> <br> <br> <br>
                                            <a href=""><img src="https://lh3.googleusercontent.com/WCg77EASlH8NjdsKdUAvQrlEC0sbqaJ6jv8A1orGemvNACMijg2MATZU3EPKTDzvN8nn5Lzt07VXVxLm2StELT7ahIK8l2tgong89XZJHlLszidW_jZ2g27LlsI9lSoEG2p-ZN55GlCMNXV9MCSCW5CppdK5fqbSb0Gl35YeS7ktUGvQZseV5iYzKYMVMPorzwemY7Gn36JnHVFz9GNJSGYEjZlj42HWTvjwlK-WaarLtLD_uWmbCaYKVZ0L_WlyHMrxPmNauCFK6sQuRk7-aLcGhJhCdJlhbEaQ5e2bvFIyAiqp3A2xwMFybizM_fWkbfMrX-ej8c-aYtCSOsKV1x1bMCo3mHSD3eXphYIkuEQvx1dApVxm9aegBxjRb0j4d6nsC-L6ZB-4I-4v8AOMJ72MB5KD0ZM78q9-HkQYaVxPKp_1pDJmMJzG1emDtriPlDDaPGoguIBXFgvMpZl0SK47TefVbHLGPo81LTeJagO32GB9n6x9-asAAx-I-hQwwoSlRke_9T4G9OFExuKSQb7CIy54ufMmC65PpnyTZg0U0RqXlSNUik8jabJP94T_a5GbsXQZ8N4GbrvE5vjsTeXf6cHdLn-f7eY-kjgh5UN3nPPBu4Imxbd8U7ZuoZ8vKBT3oGP-03_xhcy2V83h_J1nYfuLB_cqaR_pzSUaISSbWo0g0YGule31xECrdS6EwXPO8wu_wWyeRZi0znODHpM=w141-h74-no?authuser=0" style="width:60px"></a>
                                            <br>Copyright © 2022. All rights reserved.
                                        </td>
                                    </tr>
                                </table>

                            </td>
                        </tr>
                    </table>
                </body>

            </html>
            ';

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // mail piority
            $headers .= "X-Priority: 1\n";
            $headers .= "X-MSMail-Priority: High\n";
            $headers .= "Importance: High\n";

            // More headers
            $headers .= 'From: <blogIt@contactus.com>' . "\r\n";
            // $headers .= 'Cc: myboss@example.com' . "\r\n";


            if(mail($to,$subject,$message,$headers)){
                echo "We have sent you a verification mail";
                exit();
            }else{
                echo "Failed to send mail";
                exit();
            }
        }else{            
            echo "Failed to generate token";
        }
    }else{
        echo "There no username with this email";
    }

}

if(isset($_POST['new_password'])){
    require_once "get_resetPass.php";

    $token = $_POST['token'];
    $token_val = substr($token, 0, 10);


    $new_pass = $_POST['new_password'];
    $confirm_pass = $_POST['confirm_password'];

    if($new_pass == $confirm_pass){
        $obj = new reset_password();
        // echo "\n".$confirm_pass;
        // echo "\n".$token;
        $result = $obj->update_password($confirm_pass, $token_val);
        if($result == 1){
            echo "Password updated succesfully";
            $obj = new reset_password();
            $result = $obj->reset_token($token_val);
        }else{
            echo "Failed to updated password";
        }
    }else{
        echo "Password not match";
    }

}

?>
