<?php
require "shared/Tools.php";

use Shared\Tools;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RelluToolbox</title>
    <script src="./shared/node_modules/admin-lte/dist/js/adminlte.min.js"></script>
    <script src="./shared/node_modules/@fortawesome/fontawesome-free/js/all.min.js"></script>
    <script src="./shared/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./shared/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./shared/node_modules/js-cookie/dist/js.cookie.min.js"></script>
    <script src="./shared/assets/js/rellu94.js"></script>
    <script src="./shared/assets/js/loader.js"></script>
    <script src="./shared/assets/js/cookieHandling.js"></script>
    <script defer src="./shared/assets/scripts/slothSearch.js"></script>
    <script src="./shared/assets/folitoast/folitoast.js"></script>
    <link rel="stylesheet" href="./shared/node_modules/admin-lte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="./shared/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="./shared/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./shared/assets/css/Toolbox.css">
    <link rel="stylesheet" href="./shared/assets/css/rellu94.css">
    <link rel="stylesheet" href="./shared/assets/folitoast/folitoast.css">
    <link rel="icon" type="image/x-icon" href="./shared/assets/img/favicon.png">
</head>

<body>
    <div class="wrapper">
        <div id="loader-container">
            <div id="loader">
                <i class="fa-solid fa-spinner fa-spin-pulse fa-2xl"></i>
            </div>
        </div>
        <nav class="navbar fixed-top bg-dark">
            <a class="navbar-brand" href="#">
                <img src="./shared/assets/img/rellutoolbox.svg" alt="Logo" class="d-inline-block align-text-top">
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
                        $tools = json_decode(file_get_contents("./shared/config/tools.json"), true);

                        foreach ($tools as $key => $value) {
                            echo Tools::getTool(
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
            <h5>
                <i class="fa-solid fa-cookie"></i>
                This pages uses technical cookies. No tracking is done.
                <button type="button" class="btn btn-primary" onclick="dismissCookieBanner()">
                    <i class="fa-solid fa-eye-slash"></i>
                    Don't show again
                </button>
           </h5>
        </div>
    </div>
</body>

</html>
