<?php
/* @var $this VersionsDownloadsController */
/* @var $model VersionsDownloads */

$this->breadcrumbs=array(
	'Versions Downloads'=>array('index'),
	$model->vd_id,
);

$this->menu=array(
	array('label'=>'List VersionsDownloads', 'url'=>array('index')),
	array('label'=>'Create VersionsDownloads', 'url'=>array('create')),
	array('label'=>'Update VersionsDownloads', 'url'=>array('update', 'id'=>$model->vd_id)),
	array('label'=>'Delete VersionsDownloads', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->vd_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VersionsDownloads', 'url'=>array('admin')),
);
?>

<h1>View VersionsDownloads #<?php echo $model->vd_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'vd_id',
		'v_id',
		'c_id',
		'time',
		'ip',
	),
)); ?>
