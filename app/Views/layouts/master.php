<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeIgniter 4 Login & Registation </title>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .navigation-panel {
            height: 100%;
            overflow-x: auto;
        }

        .scrollable {
            white-space: nowrap;
            padding: 0;
            margin: 0;
        }

        .scrollable li {
            display: inline-block;
            margin: 0 10px;
        }
    </style>
</head>

<body>

    <?= $this->renderSection("content") ?>

    <!-- Compiled and minified Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <!-- Compiled and minified Materialize -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
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

        $(document).ready(function() {
            var elems = $('.sidenav');
            var instances = M.Sidenav.init(elems, {});

            var closeIcon = $('.sidenav li a.right');
            var sidenavInstance = instances[0];

            closeIcon.on('click', function() {
                sidenavInstance.close();
            });
        });
    </script>
</body>

</html>