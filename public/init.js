LarakitJs.initSelector('.js-bootstrap-dialog', function () {
    var url;
    if ('A' == $(this).get(0).tagName) {
        url = $(this).attr('href');
    } else {
        url = $(this).attr('data-url');
    }
    $(this).on('click', function () {
        $.ajax({url: url, dataType: "jsonp"});
        return false;
    });
});