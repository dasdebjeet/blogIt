$(document).ready(() => {
    $(".forgot_password_form").on('submit', (e) => {
        e.preventDefault()
        var form_data = $(".forgot_password_form").serialize()
        $.ajax({
            type: 'POST',
            url: './sdk/set_resetPass.php',
            data: form_data
        }).done((response) => {
            // var data = JSON.parse(response)
            console.log(response)
            if (response == "We have sent you a verification mail") {
                $("html, body").addClass("noscroll");
                $(".forgot_password_modal_con").css({
                    "opacity": '1',
                    "visibility": 'visible'
                })
                $(".forgot_password_form_inp").val("")
                $(".forgot_password_form_error").html("<span style='color:#000000'>" + response + "</span>")
            } else {
                $(".forgot_password_form_error").html("<span style='color:#ff0000'>" + response + "</span>")
            }

        })
    })

    var closeModal = () => {
        $("html, body").removeClass("noscroll");
        $(".forgot_password_modal_con").css({
            "opacity": '0',
            "visibility": 'hidden'
        })
    }
    $(".forgot_password_modal_closeBtn").click(() => {
        closeModal()
    })

    $(".forgot_password_modal_con").on("click", (e) => {
        if (e.target.classList.contains("forgot_password_modal_con")) {
            closeModal()
        }
    });
})