<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="x-apple-disable-message-reformatting">
        <title>Reset mail confirmation</title>
        <link href="https://fonts.googleapis.com/css2?family=Rajdhani&display=swap" rel="stylesheet">

        <style>
            @media screen {
                @font-face {
                    font-family: "Rajdhani";
                    font-style: normal;
                    font-weight: 400;
                    src: url("https://fonts.googleapis.com/css2?family=Rajdhani&display=swap");
                }
            }

            * {
                margin: 0;
                padding: 0;
                outline: 0;
                border: 0;
                font-family: "Rajdhani", sans-serif;
            }

            table,
            td,
            div,
            h1,
            p {
                font-family: "Rajdhani", sans-serif;
            }

            .siteL {
                color: #ff3b1d;
                /* font-size: 10em;
                font-weight: 600;
                text-shadow: -2px 4px 8px #000000; */
            }

            .resetPass_linkBtn {
                background: #000000;
                margin-top: 20px;
                padding: 10px 20px;
                font-family: inherit;
                color: #ffffff;
                cursor: pointer;
            }

            .social_link {
                width: 20px;
                height: 20px;
            }

        </style>
    </head>

    <body style="margin:0;padding:0;background: #ffffff;">
        <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0; background:transparent;">
            <tr>
                <td align="center" style="padding:0;">
                    <table role="presentation" style="width:60%; margin: 50px 0; border:0; border-collapse:collapse;border-spacing:0; background: #e6e6e6; color: #000000;">
                        <tr>
                            <td align="center" style="padding:50px 0px; height:200px; background:#000000">
                                <div class="siteL"><img src="https://raw.githubusercontent.com/debjeet-dev/blogIt/main/assests/siteTitle.svg"></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:30px;">
                                <div style="font-size:20px">Dear Debjeet,<br>You can set your new password here:</div>
                                <a href="http://192.168.0.109/all_projects/Projects/blog_web2/ui_design/updatePassword_page.php?token='.$token.'" style="cursor:pointer">
                                    <button class="resetPass_linkBtn">Reset Password</button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:0 30px; font-weight:600">The blogIt Team</td>
                        </tr>
                        <tr>
                            <td style="padding:50px 30px 30px;text-align:center">
                                <br> <br> <br> <br>
                                <img src="https://lh3.googleusercontent.com/WCg77EASlH8NjdsKdUAvQrlEC0sbqaJ6jv8A1orGemvNACMijg2MATZU3EPKTDzvN8nn5Lzt07VXVxLm2StELT7ahIK8l2tgong89XZJHlLszidW_jZ2g27LlsI9lSoEG2p-ZN55GlCMNXV9MCSCW5CppdK5fqbSb0Gl35YeS7ktUGvQZseV5iYzKYMVMPorzwemY7Gn36JnHVFz9GNJSGYEjZlj42HWTvjwlK-WaarLtLD_uWmbCaYKVZ0L_WlyHMrxPmNauCFK6sQuRk7-aLcGhJhCdJlhbEaQ5e2bvFIyAiqp3A2xwMFybizM_fWkbfMrX-ej8c-aYtCSOsKV1x1bMCo3mHSD3eXphYIkuEQvx1dApVxm9aegBxjRb0j4d6nsC-L6ZB-4I-4v8AOMJ72MB5KD0ZM78q9-HkQYaVxPKp_1pDJmMJzG1emDtriPlDDaPGoguIBXFgvMpZl0SK47TefVbHLGPo81LTeJagO32GB9n6x9-asAAx-I-hQwwoSlRke_9T4G9OFExuKSQb7CIy54ufMmC65PpnyTZg0U0RqXlSNUik8jabJP94T_a5GbsXQZ8N4GbrvE5vjsTeXf6cHdLn-f7eY-kjgh5UN3nPPBu4Imxbd8U7ZuoZ8vKBT3oGP-03_xhcy2V83h_J1nYfuLB_cqaR_pzSUaISSbWo0g0YGule31xECrdS6EwXPO8wu_wWyeRZi0znODHpM=w141-h74-no?authuser=0" style="width:60px">
                                <br>Copyright © 2022. All rights reserved.
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </body>

</html>
