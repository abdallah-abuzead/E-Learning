$(document).ready(function () {
    "use strict";

    $('.add-video-button').click(function () {
        $('.add-video').fadeIn(400);
    });

    //-------------------------------------------

    $('.cancel').click(function () {
        $('.add-video').fadeOut(400);
    });

    //-------------------------------------------

    $(".confirm").click(function () {
        return confirm("Are you sure that you want to delete this content?");
    });

    //-------------------------------------------

});