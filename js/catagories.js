$(document).ready(() => {
    $(".catagories_btn").click(function () {
        $(".catagories_sec").toggleClass("catagories_table_active");
        $(".catagories_btn>i").toggleClass("fa-angle-up");
        $(".catagories_table").slideToggle();
    });

    $(".blog_cat").click(function () {
        const value = $(this).attr("data-filter");

        if (value == "all") {
            $(".blog_prev").show('1000');
        } else {
            $(".blog_prev").not('.' + value).hide('1000');
            $(".blog_prev").filter('.' + value).show('1000');
        };
    });
})