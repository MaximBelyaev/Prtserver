<?php
/* @var $this VersionsDownloadsController */
/* @var $model VersionsDownloads */

$this->breadcrumbs=array(
	'Versions Downloads'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List VersionsDownloads', 'url'=>array('index')),
	array('label'=>'Manage VersionsDownloads', 'url'=>array('admin')),
);
?>

<h1>Create VersionsDownloads</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>