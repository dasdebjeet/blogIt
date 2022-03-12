$(document).ready(() => {
    $.ajax({
        type: 'POST',
        url: './sdk/set_resetPass.php',
        data: 'token_check=' + token
    }).done((response) => {
        // console.log(response)
        if (response > 30 || response == "token expired") {
            $(".update_password_wrap").css("display", "none")
            $(".nPass_link_not_found_con").css("display", "flex")
        } else {
            $(".update_password_wrap").css("display", "flex")
            $(".nPass_link_not_found_con").css("display", "none")
        }
    })

    $(".update_password_form").on('submit', (e) => {
        e.preventDefault()

        if ($(".n_pass").val() == $(".c_pass").val()) {
            var c_len = ($(".c_pass").val()).length
            if (c_len < 8) {
                $(".update_password_form_error").html("<span style='color:#ff0000'>Password must be atleast 8 characters long</span>")
            } else if (c_len > 20) {
                $(".update_password_form_error").html("<span style='color:#ff0000'>Password should be less than 20 characters</span>")
            } else {
                var form_data = $(".update_password_form").serialize() + '&token=' + token
                $.ajax({
                    type: 'POST',
                    url: './sdk/set_resetPass.php',
                    data: form_data
                }).done((response) => {
                    // console.log(response)
                    if (response == "Password updated succesfully") {
                        $("html, body").addClass("noscroll");
                        $(".update_password_modal_con").css({
                            "opacity": '1',
                            "visibility": 'visible'
                        })
                        $(".update_password_form")[0].reset()
                        $(".update_password_form_error").html("<span style='color:#000000'>" + response + "</span>")
                    } else {
                        $(".update_password_form_error").html("<span style='color:#ff0000'>" + response + "</span>")
                    }

                })
            }
        } else {
            $(".update_password_form_error").html("<span style='color:#ff0000'>Password not match</span>")
        }
    })


    var closeModal = () => {
        $("html, body").removeClass("noscroll");
        $(".update_password_modal_con").css({
            "opacity": '0',
            "visibility": 'hidden'
        })
    }
    $(".update_password_modal_closeBtn").click(() => {
        closeModal()
    })

    $(".update_password_modal_con").on("click", (e) => {
        if (e.target.classList.contains("update_password_modal_con")) {
            closeModal()
        }
    });
})