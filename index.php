<?php

// noteShifter
// Note Shifter
// fa-solid fa-music
// Shifts a Note x Steps up or down
// bg-info
// ...

function getTool(string $name, string $displayname, string $icon, string $description, string $bgclass, string $content):string {
	return '
	<div class="col col-sm-4">
		<div class="info-box ' . $bgclass . '"  data-bs-toggle="modal" data-bs-target="#' . $name . '">
			<span class="info-box-icon"><i class="' . $icon . '"></i></span>
			<div class="info-box-content">
		  		<span class="info-box-text">' . $displayname . '</span>
		  		<span class="info-box-number">' . $description . '</span>
		  	</div>
		  	
		</div>
		<div class="modal fade" id="' . $name . '" tabindex="-1" aria-labelledby="' . $name . 'Label" aria-hidden="true">
	  		<div class="modal-dialog">
	    			<div class="modal-content">
	      				<div class="modal-header">
						<h5 class="modal-title" id="' . $name . 'Label">' . $displayname . '</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      				</div>
	      				<div class="modal-body">
						' . $content . '
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
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>RelluToolbox</title>
		<script src="./node_modules/admin-lte/dist/js/adminlte.min.js"></script>
		<script src="./node_modules/@fortawesome/fontawesome-free/js/all.min.js"></script>
		<script src="./node_modules/jquery/dist/jquery.min.js"></script>
		<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
		<link rel="stylesheet" href="./node_modules/admin-lte/dist/css/adminlte.min.css">
		<link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
		<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
		<link rel="icon" type="image/x-icon" href="assets/img/favicon.png">
	</head>
	<body>
		<div class="wrapper">
			<!-- Preloader -->
			<div class="preloader" style="display:none;">
				<img class="animation__shake" src="assets/img/rellutoolbox.png" alt="rellutoolbox" width="600">
			</div>

			
			
			
		
			<div class="content-wrapper" style="min-height: 768px;">
			
				<div class="content">
					<div class="container">
						<div class="row">
							<?php
								echo getTool("noteShifter", "Note Shifter", "fa-solid fa-music", "Shifts a Note x Steps up or down", "bg-info", "...");
								echo getTool("textRotate", "Text Rotate", "fa-solid fa-text-width", "Inverts a Text Front to Back", "bg-primary", "<input type='text'>");
								echo getTool("passwordGenerator", "Password Generator", "fa-solid fa-key", "Generates Passwords", "bg-secondary", "...");
							?>
						</div>
					</div>
				</div>
			
				
			</div>
		</div>
	</body>
</html>

