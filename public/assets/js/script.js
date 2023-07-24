// with Javascript
// document.addEventListener('DOMContentLoaded', function() {
//     var elems = document.querySelectorAll('.sidenav');
//     var instances = M.Sidenav.init(elems, {});

//     var closeIcon = document.querySelector('.sidenav li a.right');
//     var sidenavInstance = instances[0];

//     closeIcon.addEventListener('click', function() {
//         sidenavInstance.close();
//     });
// });

// Or with jQuery

$(document).ready(function () {
    var elems = $(".sidenav");
    var instances = M.Sidenav.init(elems, {});

    var closeIcon = $(".sidenav li a.right");
    var sidenavInstance = instances[0];

    closeIcon.on("click", function () {
        sidenavInstance.close();
    });
});
