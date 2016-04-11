<!DOCTYPE html>
<html>
<head>
	<title>MessHub</title>
	<link href="css/metro.min.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/flex.css" rel="stylesheet" type="text/css">
	<script src="lib/angular.min.js"></script>

	<script>
		angular.module('myApp', [])
		.controller('dummy', ['$scope', '$sce', function ($scope, $sce) {

			$scope.url = $sce.trustAsResourceUrl('home.php');

			$scope.changeIt = function (content) {
				$scope.url = $sce.trustAsResourceUrl(content);
			}
		}]);
	</script>
</head>
<body>
	<div class="box" ng-app="myApp" ng-controller="dummy">
		<div class="row header">
			<ul class="navbar">
				<li><div class="tile-small bg-lighterBlue" data-role="tile" ng-click="changeIt('home.php')">
					<div class="tile-content iconic">
						<img src="img/home.svg" data-role="fitImage" data-format="square"></img>
					</div>
				</div></li>
				<li><div class="tile-small bg-green" data-role="tile" ng-click="changeIt('hubs.php')">
					<div class="tile-content">
						<span class="tile-label">Hubs Map</span>
					</div>
				</div></li>
				<li><div class="tile-small bg-red" data-role="tile" ng-click="changeIt('track.php')">
					<div class="tile-content">
						<span class="tile-label">Track User</span>
					</div>
				</div></li>
			</ul>
		</div>
		<div class="row content">
			<iframe ng-src="{{url}}" class="row content" width="100%" height="100%" frameBorder="0"></iframe>
		</div>
		<div class="row footer" bgcolor="#333">
			<?php
			session_start();
			echo "Welcome " . explode(" ",$_SESSION["fullname"])[0] . "!"
			?>
		</div>
	</div>
</body>
</html>