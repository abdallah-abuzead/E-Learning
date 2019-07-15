$(document).ready(function () {
    "use strict";

    $('.add-video-button').click(function () {
        $('.add-video').fadeIn(400);
    });

    //-------------------------------------------

    $('.add-description-button').click(function () {
        $('.add-description').fadeIn(400);
    });


    //-------------------------------------------

    $('.cancel').click(function () {
        $('.add-video, .add-description').fadeOut(400);
    });

    //-------------------------------------------

    $(".confirm").click(function () {
        return confirm("Are you sure that you want to delete this content?");
    });

    //-------------------------------------------

    $(".start-exam").click(function () {
        return confirm("Are you sure that you want to start the exam now?");
    });

    //-------------------------------------------

    $(".delete-exam").click(function () {
        return confirm("Are you sure that you want to delete the course exam?");
    });

    //-------------------------------------------

    $(".edit-comment").click(function (e) {
        var commentElement = $(this).parent().prev();
        var control = $(commentElement).next();
        var form = $(commentElement).prev().prev();
        $(control).hide();
        $(commentElement).hide();
        $(form).show();
        $(commentElement).prev().show();
        $(".lead").focus();
    });

    //-------------------------------------------

    $(".discard").click(function () {
        var parent = $(this).parent();
        $(parent).hide();
        $(parent).prev().hide();
        $(parent).next().show();
        $(parent).next().next().show();
    });
});