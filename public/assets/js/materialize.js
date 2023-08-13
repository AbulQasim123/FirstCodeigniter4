// Or with jQuery
$(document).ready(function () {
        // Mobile Responsive
    var elems = $(".sidenav");
    var instances = M.Sidenav.init(elems, {});

    var closeIcon = $(".sidenav li a.right");
    var sidenavInstance = instances[0];

    closeIcon.on("click", function () {
        sidenavInstance.close();
    });


    $('textarea#address,textarea#post_body').characterCounter();
    $("select").formSelect();
    $('.modal').modal();
});

$(document).ready(function () {
    var today = new Date();
    var fiftyYearsAgo = new Date(today);
    fiftyYearsAgo.setFullYear(fiftyYearsAgo.getFullYear() - 50);

    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        defaultDate: today,
        minDate: fiftyYearsAgo,
        maxDate: today,
        yearRange: [fiftyYearsAgo.getFullYear(), today.getFullYear()],
    });
});

$(document).ready(function(){
    $('.tabs').tabs();
});


