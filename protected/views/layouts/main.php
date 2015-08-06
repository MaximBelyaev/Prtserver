<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="language" content="en" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/f/bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/f/main.css" />
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<a class="navbar-brand" href="/">Главная</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li>
							<?= Chtml::link("Клиенты", array( 'customers/index' ))?>
						</li>
						<li>
							<?= Chtml::link("Версии", array( 'versions/index' ))?>
						</li>
						<li>
							<?= Chtml::link("Загрузки", array( 'VersionsDownloads/index' ))?>
						</li>
						<li>
							<?= Chtml::link("Войти", array( 'login' ))?>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#">Link</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
		<div class="container" id="page">
			<div class="row">
				<div class="col-md-10"><?php echo $content; ?></div>
				<div class="col-md-2">.col-md-2</div>
			</div>
		</div><!-- page -->
	</body>
</html>