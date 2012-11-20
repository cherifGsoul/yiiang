<!doctype html>
<html lang="<?php echo Yii::app()->language; ?>">
<head>
  <meta charset="utf-8">
  <title><?php echo Yii::app()->name; ?></title>
  <?php 
  		$cs=Yii::app()->clientScript;
		$app=Yii::app()->baseUrl.'/app';
		$cs->registerCssFile($app.'/lib/bootstrap/css/bootstrap.min.css');
		$cs->registerCssFile($app.'/css/app.css');
	?>
	 <!--[if lte IE 8]>
      <script>
        document.createElement('ng-include');
        document.createElement('ng-pluralize');
        document.createElement('ng-view');
 
        // Optionally these for CSS
        document.createElement('ng:include');
        document.createElement('ng:pluralize');
        document.createElement('ng:view');
      </script>
    <![endif]-->
</head>
<body ng-app="yiiAng">
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			
			<a class="brand" href="#/contacts">YiiAng</a>
			<div>
				<ul class="nav">
					<li><a href="#/contacts">Contacts</a></li>
					<li><a href="#/users">Users</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<noscript><?php echo $content ?></noscript>
	
		<div id="loading" class="span12"><p>loading...</p></div>
		<div ng-view class="container"></div>
	{{contacts}}

	{{contact}}
</div>
 

 
  <?php
  
  	$cs->registerCoreScript('jquery');
	$cs->registerScriptFile($app.'/lib/es5-shim.js',CClientScript::POS_END);
	$cs->registerScriptFile($app.'/lib/json3.min.js',CClientScript::POS_END);
	$cs->registerScriptFile($app.'/lib/angular/angular.js',CClientScript::POS_END);
	$cs->registerScriptFile($app.'/lib/angular/angular-resource.js',CClientScript::POS_END);
	
	$cs->registerScriptFile($app.'/js/app.js',CClientScript::POS_END);
	$cs->registerScriptFile($app.'/js/services.js',CClientScript::POS_END);
	$cs->registerScriptFile($app.'/js/controllers.js',CClientScript::POS_END);
  ?>
</body>
</html>
