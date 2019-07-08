$(document).ready(function () {
    "use strict";

    $('.add-video-button').click(function () {
        $('.add-video').fadeIn(400);
    });

    $('.cancel').click(function () {
        $('.add-video').fadeOut(400);
    });
});