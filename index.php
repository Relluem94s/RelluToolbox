<?php

function getTool(
    $name,
    $displayname,
    $icon,
    $description,
    $bgclass,
    $content
) {
    return '
    <div class="col col-sm-4">
        <div style="cursor:pointer"
        class="info-box ' . $bgclass . '"
        id="' . str_replace(' ', '', strtolower($displayname)) . '"
        data-bs-toggle="modal"
        data-bs-target="#' . $name . '">
            <span class="info-box-icon"><i class="' . $icon . '"></i></span>
            <div class="info-box-content">
                  <span class="info-box-number">' . $displayname . '</span>
                  <span class="info-box-text">' . $description . '</span>
              </div>
        </div>
        <div
            class="modal fade"
            id="' . $name . '"
            tabindex="-1"
            aria-labelledby="' . $name . 'Label"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header ' . $bgclass . '">
                    <h5 class="modal-title" id="' . $name . 'Label">
                        <i class="' . $icon . '"></i> ' . $displayname . '
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="' . $name . 'Content">
                    <script> $( "#' . $name . 'Content" ).load( "' . $content . '" ); </script>
                    
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RelluToolbox</title>
    <script src="./node_modules/admin-lte/dist/js/adminlte.min.js"></script>
    <script src="./node_modules/@fortawesome/fontawesome-free/js/all.min.js"></script>
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./node_modules/js-cookie/dist/js.cookie.min.js"></script>
    <script src="./assets/js/cookieHandling.js"></script>
    <script defer src="./assets/scripts/slothSearch.js"></script>
    <link rel="stylesheet" href="./node_modules/admin-lte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/Toolbox.css">
    <link rel="stylesheet" href="./assets/css/rellu94.css">
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png">
    <script src="./assets/folitoast/folitoast.js"></script>
    <link rel="stylesheet" href="./assets/folitoast/folitoast.css">
</head>

<body>
    <div class="wrapper">
        <nav class="navbar fixed-top bg-dark">
            <a class="navbar-brand" href="#">
                <img src="assets/img/rellutoolbox.svg" alt="Logo" height="30" class="d-inline-block align-text-top">
            </a>
            <form class="d-flex" role="search">
                <input class="form-control navSearch" id="searchBox" type="search" placeholder="Search" aria-label="Search">
            </form>
            <div class="toggleMode">
                <span class="dark mode"><i class="fa-solid fa-moon"></i></span>
                <span class="light mode"><i class="fa-solid fa-sun"></i></span>
            </div>
        </nav>
        <div class="content-wrapper" style="min-height: 768px;">
            <div class="content">
                <div class="container" style="margin-top: 80px;">
                    <div class="row">

                    </div>
                    <div class="row">
                        <?php
                        $tools = json_decode(file_get_contents("./tools.json"), true);

                        foreach ($tools as $key => $value) {
                            echo getTool(
                                $value["name"],
                                $value["displayname"],
                                $value["icon"],
                                $value["description"],
                                $value["bgclass"],
                                $value["content"]
                            );
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="cookieBanner fixed-bottom">
            <h5><i style="color: rgb(67, 162, 160)" class="fa-solid fa-cookie"></i> This pages uses technical cookies. No tracking is done. <button type="button" class="btn btn-primary" onclick="dismissCookieBanner()"><i class="fa-solid fa-eye-slash"></i> Don't show again</button></h5>
        </div>
    </div>
</body>

</html>