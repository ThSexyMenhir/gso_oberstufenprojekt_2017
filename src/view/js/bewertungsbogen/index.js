$('#delete').click(function (e) {
    return confirm("Wollen Sie wirklich den Bewertungsbogen löschen");
});

$('.student-name').click(function ($e) {

    if ($(this).hasClass("student-hidden")) {
        $('.student-evaluation').show();
        $('.student-name').show();
        $(this).removeClass("student-hidden");
    } else {
        $('.student-evaluation').hide();
        $('.student-name').hide();
        var id = $(this).attr('id');
        $('.id-student-' + id).show();
        $(this).addClass("student-hidden");
    }

});