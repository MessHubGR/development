<!DOCTYPE html>
<html>
<head>
	<title>MessHub</title>
	<link href="css/metro.min.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/flex.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="box">
		<div class="row header">
			<ul class="navbar" style="flex: 0 1 auto;">
				<li><div class="tile-small bg-lighterBlue" data-role="tile">
					<div class="tile-content iconic">
						<img src="img/home.svg" data-role="fitImage" data-format="square"></img>
					</div>
				</div></li>
				<li><div class="tile-small bg-green" data-role="tile">
					<div class="tile-content">
						<span class="tile-label">Hubs Map</span>
					</div>
				</div></li>
				<li><div class="tile-small bg-red" data-role="tile">
					<div class="tile-content">
						<span class="tile-label">Track User</span>
					</div>
				</div></li>
			</ul>
		</div>
		<div class="row content">
			<iframe src="hubs.php" class="row content" width="100%" height="100%"></iframe>
		</div>
	</div>
</body>
</html>