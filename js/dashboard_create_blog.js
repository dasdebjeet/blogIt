$(document).ready(() => {

    var max_len_checker = (el, len, limit, e) => {
        $(el).next().text(len)
        $(el).next().addClass("active_blog_inp_charCount")
        $(el).prev().children(".label_icon").addClass("active_label_icon")
        if (len >= limit && !(e.keyCode == 8)) {
            $(el).prev().children(".label_icon").children(".fa-check").addClass("fa-exclamation-circle").css("color", "#ff9c9c")
        } else if (len == 0) {
            $(el).next().removeClass("active_blog_inp_charCount")
            $(el).prev().children(".label_icon").removeClass("active_label_icon")
            $(el).prev().children(".label_icon").children(".fa-check").removeClass("fa-exclamation-circle").css("color", "#4affbc")
        } else {
            $(el).prev().children(".label_icon").children(".fa-check").removeClass("fa-exclamation-circle").css("color", "#4affbc")
        }
    }

    // create blog title and subtitle input limit function
    var blog_create_inp = document.querySelectorAll('.blog_inp')

    for (const blog_cinp of blog_create_inp) {
        blog_cinp.addEventListener("input", (e) => {
            var inp_val = $(blog_cinp).val().length
            // console.log(inp_val)

            var max_len = ($(blog_cinp).next().attr("data_char_len"))
            max_len_checker(blog_cinp, inp_val, max_len, e)
        })
    }



    // --------------------------------------
    // blog_input_tags
    var arr_tags = [];

    $(".create_blog_tags_con").click(() => { //fn to focus on the tags input elements
        $(".create_blog_tags_inp").focus();
    });

    var createTags = (tag_name) => { // prepend tags in frontend
        $(".create_blog_tags_con").prepend("<div class='tags_format'><span style='padding: 0 5px;' >#" + tag_name + "</span><i id='tag_remove_btn' class='fal fa-times' data-item=" + tag_name + "></i></div>");
    }

    var resetTags = () => { //  reset tags are not working
        document.querySelectorAll(".tags_format").forEach((tag) => {
            tag.parentElement.removeChild(tag);
        });
    }
    var addTags = () => { //function declaration to add tags
        resetTags();
        arr_tags.slice().reverse().forEach((tag) => {
            createTags(tag);
        });
    }

    // var backpress = 0;
    // var temp = 0;

    var backpress_key = 0

    var update_tags_limit = (el, len, limit) => {
        $(el).next().text(len)
        $(el).next().addClass("active_blog_inp_charCount")
        $(el).prev().children(".label_icon").addClass("active_label_icon")
        if (len >= limit) {
            $(el).prev().children(".label_icon").children(".fa-check").addClass("fa-exclamation-circle").css("color", "#ff9c9c")
        } else if (len == 0) {
            $(el).next().removeClass("active_blog_inp_charCount")
            $(el).prev().children(".label_icon").removeClass("active_label_icon")
            $(el).prev().children(".label_icon").children(".fa-check").removeClass("fa-exclamation-circle").css("color", "#4affbc")
        } else {
            $(el).prev().children(".label_icon").children(".fa-check").removeClass("fa-exclamation-circle").css("color", "#4affbc")
        }
    }

    $(".create_blog_tags_inp").on('keydown', (e) => { // main function of tags by key events
        var inp_tag_val = $(".create_blog_tags_inp").val();
        var max_len = ($(".create_blog_tags_con").next().attr("data_tag_len"))

        // update_tags_limit(".create_blog_tags_con", arr_tags.length, max_len)
        if (arr_tags.length < max_len) {
            if (e.key == "Enter" && inp_tag_val != "") {
                arr_tags.push(inp_tag_val);
                addTags();
                $(".create_blog_tags_inp").val("")
                update_tags_limit(".create_blog_tags_con", arr_tags.length, max_len)
            }
        } else {
            update_tags_limit(".create_blog_tags_con", arr_tags.length, max_len)
        }

        if (e.keyCode == 8 && inp_tag_val == 0) {
            console.log(backpress_key)
            if (backpress_key == 2) {
                arr_tags.pop(); // method 1 to delete element from arr of tags(arr_tags)
                // arr_tags = [...arr_tags.slice(0, index), ...arr_tags.slice(index + 1)];  method 2 to delete element from arr of tags(arr_tags)
                addTags()
                update_tags_limit(".create_blog_tags_con", arr_tags.length, max_len)
                backpress_key = 0
            }
            backpress_key += 1;
        }
    })

    var delete_tags = (e) => { // fn to delete tags
        var max_len = ($(".create_blog_tags_con").next().attr("data_tag_len"))
        var value = e.target.getAttribute('data-item');
        var index = arr_tags.indexOf(value);
        arr_tags.splice(index, 1); // method 1 to delete element from arr of tags(arr_tags)
        addTags();
        update_tags_limit(".create_blog_tags_con", arr_tags.length, max_len)
    }

    document.addEventListener('click', (e) => { //delete tags on click eventlistener
        if (e.target.id == "tag_remove_btn") {
            delete_tags(e);
        }
    })




})