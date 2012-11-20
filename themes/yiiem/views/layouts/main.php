<!doctype html>
<html lang="<?php echo Yii::app()->language; ?>">
<head>
  <meta charset="utf-8">
  <title><?php echo Yii::app()->name; ?></title>
  <?php 
  		$cs=Yii::app()->clientScript;
		$app=Yii::app()->baseUrl.'/emyii';
		/*$cs->registerCssFile($app.'/lib/bootstrap/css/bootstrap.min.css');
		$cs->registerCssFile($app.'/css/app.css');*/
	?>
</head>
<body>
	<script type="text/x-handlebars" data-template-name="application">
	{{outlet}}
	</script>
	
		<script src="<?php echo $app; ?>/scripts/libs/jquery-1.8.2.js" ></script>
		<script src="<?php echo $app; ?>/scripts/libs/handlebars-1.0.rc.1.js"></script>
		<script src="<?php echo $app; ?>/scripts/libs/ember.js"></script>
		<script src="<?php echo $app; ?>/scripts/libs/ember-data.js"></script>
		<script src="<?php echo $app; ?>/scripts/main.js"></script>
		<script src="<?php echo $app; ?>/scripts/routes/app_router.js"></script>
		<script src="<?php echo $app; ?>/scripts/store.js"></script>
		<script src="<?php echo $app; ?>/scripts/controllers/application_controller.js"></script>
		<script src="<?php echo $app; ?>/scripts/models/application-model.js"></script>
		<script src="<?php echo $app; ?>/scripts/views/application_view.js"></script>
	
</body>
</html>