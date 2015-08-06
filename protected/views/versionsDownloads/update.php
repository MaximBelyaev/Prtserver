<?php
/* @var $this VersionsDownloadsController */
/* @var $model VersionsDownloads */

$this->breadcrumbs=array(
	'Versions Downloads'=>array('index'),
	$model->vd_id=>array('view','id'=>$model->vd_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List VersionsDownloads', 'url'=>array('index')),
	array('label'=>'Create VersionsDownloads', 'url'=>array('create')),
	array('label'=>'View VersionsDownloads', 'url'=>array('view', 'id'=>$model->vd_id)),
	array('label'=>'Manage VersionsDownloads', 'url'=>array('admin')),
);
?>

<h1>Update VersionsDownloads <?php echo $model->vd_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>