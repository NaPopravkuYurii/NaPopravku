<!DOCTYPE html>
<html xml:lang="<?php echo Yii::app()->language?>" lang="<?php echo Yii::app()->language?>">
	<head>
		<title><?php echo Yii::app()->name?> | <?php echo CHtml::encode($this->pageTitle)?></title>
		
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		
		<link href="/css/style.css" type="text/css"  rel="stylesheet" />
		<link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script  type="text/javascript" src="js/script.js"></script>
		
		<!--[if lt IE 9]>
			<script  type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
		<header>
			<h1><?php echo CHtml::encode($this->pageTitle)?></h1>
		</header>
		
		<section>
			<?php $this->widget('Doctors')?>
		</section>
		
		<article>
			<?php echo $content?>
		</article>
		
		<div style="clear: both;"></div>
		
		<footer>
			Copyright Алексеев Юрий
		</footer>
	</body>
</html>