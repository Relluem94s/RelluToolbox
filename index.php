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
                  <span class="info-box-text">' . $displayname . '</span>
                  <span class="info-box-number">' . $description . '</span>
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
        <script defer src="./assets/scripts/slothSearch.js"></script>
        <link rel="stylesheet" href="./node_modules/admin-lte/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="./assets/css/Toolbox.css">
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png">
    </head>
    <body>
        <div class="wrapper">
            <!-- Preloader -->
            <div class="preloader" style="display:none;">
                <img class="animation__shake" src="assets/img/rellutoolbox.svg" alt="rellutoolbox" width="600">
            </div>
        
            <div class="content-wrapper" style="min-height: 768px;">
            
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <h1 class="text-center mt-3 pt-3 mb-3 pb-3">
                                <img alt="logo" src="assets/img/rellutoolbox.svg" width="60%">
                            </h1>
                        </div>
                        <div class="row">
                            <?php
                                $tools = json_decode(file_get_contents("./tools.json"), true);
                                
                                foreach($tools as $key => $value){
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
        </div>
        <footer class="bg-dark fixed-bottom searchBar">
            <div class="container">
                <div class="btn-group">
                    <input id="searchBox" type="text" class="form-control empty" id="iconified" placeholder="&#xF002;"/>
                </div>
            </div>
        </footer>
    </body>
</html>
