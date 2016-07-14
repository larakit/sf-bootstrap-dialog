LarakitJs.initSelector('a.js-bootstrap-dialog', function () {
    var url = $(this).attr('href');
    $(this).on('click', function () {
        $.ajax({url: url,dataType: "jsonp"});
        return false;
    });
});