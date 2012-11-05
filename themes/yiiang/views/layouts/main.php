<!doctype html>
<html lang="<?php echo Yii::app()->language; ?>" ng-app="yiiAng">
<head>
  <meta charset="utf-8">
  <title><?php echo Yii::app()->name; ?></title>
  <?php 
  		$cs=Yii::app()->clientScript;
		$app=Yii::app()->baseUrl.'/app';
		$cs->registerCssFile($app.'/lib/bootstrap/css/bootstrap.min.css');
	?>
</head>
<body>
<!-- <div class="navbar navbar-fixed-top">
 	<div class="navbar-inner">
 		<div class="container">
 			 <a class="brand" href="#">Title</a>
 			 <div>
 			<ul class="nav">
 				<li><a href="#">Module1</a></li>
 				<li><a href="#">Module1</a></li>
 			</ul>
 			</div>
 		</div>
 	</div>
</div>-->
<div id="loading">loading...</div>
	
  <div ng-view class="container"></div>

 

 
  <?php
  	$cs->registerCoreScript('jquery');
	$cs->registerScriptFile($app.'/lib/angular/angular.js',CClientScript::POS_END);
	$cs->registerScriptFile($app.'/lib/angular/angular-resource.js',CClientScript::POS_END);
	
	$cs->registerScriptFile($app.'/js/app.js',CClientScript::POS_END);
	$cs->registerScriptFile($app.'/js/services.js',CClientScript::POS_END);
	$cs->registerScriptFile($app.'/js/controllers.js',CClientScript::POS_END);
  ?>
</body>
</html>
