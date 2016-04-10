<?php include "dbConfig.php";

$msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST["name"];
    $pass = $_POST["pass"];
	if ($name == '' or $pass == ''){
        $msg = "You must fill all fields.";
    }
    else{
        $sql = "SELECT * FROM coordinator WHERE username = '$name' AND passw = '$pass';";
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
        	session_start();
        	$row = $result->fetch_assoc();
        	$_SESSION["id"] = $row["idCoordinator"];
        	$_SESSION["fullname"] = $row["fullName"];

        	$host  = $_SERVER['HTTP_HOST'];
        	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        	$extra = 'menu.php';
        	header("Location: http://$host$uri/$extra");
            exit;
        }

        $msg = "Username and password do not match.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>MessHub</title>
	<link href="css/metro.min.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<style>
		.login-form { width: 25rem; height: 19.75rem; position: fixed; top: 50%; margin-top: -9.375rem; left: 50%; margin-left: -12.5rem; background-color: rgb(255, 255, 255); opacity: 0; transform: scale(0.8); }
	</style>
</head>
<body class="bg-darkTeal">
	<div style="opacity: 1; transform: scale(1); transition: all 0.5s ease 0s;" class="login-form padding20 block-shadow">
		<form name="login" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
			<h1 class="text-light">Login to MessHub Dashboard</h1>
			<hr class="thin">
			<br>
			<div class="input-control text full-size" data-role="input">
				<label for="name">Username:</label>
				<input style="padding-right: 42px;" name="name" id="name" type="text">
				<button type="button" tabindex="-1" class="button helper-button clear"><span class="mif-cross"></span></button>
			</div>
			<br>
			<br>
			<div class="input-control password full-size" data-role="input">
				<label for="pass">Password:</label>
				<input style="padding-right: 42px;" name="pass" id="pass" type="password">
				<button type="button" tabindex="-1" class="button helper-button reveal"><span class="mif-looks"></span></button>
			</div>
			<br>
			<br>
			<div class="form-actions">
				<button type="submit" class="button primary">Login</button>
			</div>
		</form>
	</div>
</body>
</html>
