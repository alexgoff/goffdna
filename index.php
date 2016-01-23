<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Goff Surname DNA Study</title>
    <meta name="description" content="Goff Surname DNA Study results">

	<!-- font -->
	<link href='https://fonts.googleapis.com/css?family=Merriweather|Raleway:400,300,600' rel='stylesheet' type='text/css'>

	<!-- css -->
	<link rel="stylesheet" href="css/normalize.min.css">
	<link rel="stylesheet" href="css/skeleton.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/dt/jq-2.1.4,dt-1.10.10/datatables.min.css"/>

</head>

<body>
<?php
//include functions
$path = $_SERVER['DOCUMENT_ROOT']."/include/functions.php";
include_once($path);

//get read access to database
pdo_open_read();

//make database object global
global $db;
?>
<div class="container">
	<div class="row">
		<div class="twelve columns">
			<h1>Goff/Gough Surname DNA Study</h1>
			<h2>Includes Goffe, Gaugh, Gawf, Gauff</h2>
		</div>
	</div>
	<div class="row">
		<div class="twelve columns">
			<?php
			//check to see if a family has been selected
			if(isset($_GET['id'])) {
				//show selected family
				$path = $_SERVER['DOCUMENT_ROOT']."/include/table.php";
				include_once($path);
			//if ID has not been set, display list of families
			} else {
				//show front page list
				$path = $_SERVER['DOCUMENT_ROOT']."/include/frontpage.php";
				include_once($path);
			};
			?>
		</div>
	</div>
</div>
<!-- external scripts -->
<script type="text/javascript" src="https://cdn.datatables.net/s/dt/jq-2.1.4,dt-1.10.10/datatables.min.js"></script>
<script type="text/javascript">
$(document).ready( function () {
    $('#family').DataTable({
		"scrollX": true,
		"scrollY": "400px",
		"paging": false
	});
} );
</script>
</body>

</html>