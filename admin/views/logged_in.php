<!-- if you need user information, just put them into the $_SESSION variable and output them here -->
<!--Hey, <?php //echo $_SESSION['user_name']; ?>. You are logged in.
Try to close this browser tab and open it again. Still logged in! ;) -->

<!-- because people were asking: "index.php?logout" is just my simplified form of "index.php?logout=true" -->
<!-- <a href="index.php?logout">Logout</a> -->

<!-- admin page -->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Goff Surname DNA Study</title>
    <meta name="description" content="Goff Surname DNA Study Admin Panel">

	<!-- font -->
	<link href='https://fonts.googleapis.com/css?family=Merriweather|Raleway:400,300,600' rel='stylesheet' type='text/css'>

	<!-- css -->
	<link rel="stylesheet" href="/css/normalize.min.css">
	<link rel="stylesheet" href="/css/skeleton.min.css">

</head>

<body>
<body>
<?php
//define variables
$frontpageMessage = NULL;
//include functions
$path = $_SERVER['DOCUMENT_ROOT']."/include/functions.php";
include_once($path);

//get read access to database
pdo_open_admin();

//make database object global
global $db;

//get frontpage content for editing
$stmt = $db->query('SELECT content FROM content WHERE id = 1');
$frontpage = $stmt->fetchAll(PDO::FETCH_NUM);

//get kits for editing
$stmt = $db->query('SELECT kit FROM kit');
$kits = $stmt->fetchAll(PDO::FETCH_NUM);

if(isset($_POST['submit-frontpage']) && !empty($_POST['content'])) {
    $content = htmlentities($_POST['content']);
    
    $stmtContent = $db->prepare('UPDATE content SET content=:content WHERE id = 1');
    $stmtContent->bindParam(':content', $content);
    
	//get front page info
    try {
        $stmtContent->execute();
        $stmt = $db->query('SELECT content FROM content WHERE id = 1');
        $frontpage = $stmt->fetchAll(PDO::FETCH_NUM);
        
    } catch (Exception $e) {
        $frontPageMessage = $e;
    }
}
?>
    <div class="container">
        <div class="row">
            <div class="twelve columns">
                <h1>Goff DNA Administrator Panel</h1>
                <h2>Edit Front Page Content</h2>
                <?php echo $frontpageMessage; ?>
                <form method="post" action="index.php" name="frontpage">
                    <div class="row">
                        <textarea id="content" name="content"><?php echo $frontpage[0][0];?></textarea>
                    </div>
                    <div class="row">
                        <br />
                        <input class="button-primary" type="submit"  name="submit-frontpage" value="Update" />                        
                    </div>
                </form>
				<h2>Kits</h2>
				<?php
				if(isset($_GET['action']) && $_GET['action'] == "addkit") {
					if (isset($_GET['status'])) {
						include_once('add_kit_post.php');
						include_once('select_kit.html');
					} else {
						include_once('add_kit.php');
					}
				} elseif(isset($_GET['action']) && $_GET['action'] == "editkit") {
					if (isset($_GET['status'])) {
						include_once('edit_kit_post.php');
						include_once('select_kit.html');
					} else {
						include_once('edit_kit.php');
					}
				} elseif(isset($_GET['action']) && $_GET['action'] == "deletekit") {
					if (isset($_GET['status'])) {
						include_once('delete_kit_post.php');
						include_once('select_kit.html');
					} else {
						include_once('delete_kit.php');
					}
				} else {
					include_once('select_kit.html');
				}
				?>
                <h2>Edit Families</h2>
                <?php
				if(isset($_GET['action']) && $_GET['action'] == "addfamily") {
					if (isset($_GET['status'])) {
						include_once('add_family_post.php');
						include_once('select_family.html');
					} else {
						include_once('add_family.php');
					}
				} elseif(isset($_GET['action']) && $_GET['action'] == "editfamily") {
					if (isset($_GET['status'])) {
						include_once('edit_family_post.php');
						include_once('select_family.html');
					} else {
						include_once('edit_family.php');
					}
				} elseif(isset($_GET['action']) && $_GET['action'] == "deletefamily") {
					if (isset($_GET['status'])) {
						include_once('delete_family_post.php');
						include_once('select_family.html');
					} else {
						include_once('delete_family.php');
					}
				} else {
					include_once('select_family.html');
				}	
				?>
                <a class="button" href="index.php?logout">Logout</a>
            </div>
        </div>
    </div>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
</body>

</html>
