<?php
/* @var $this VersionsDownloadsController */
/* @var $model VersionsDownloads */

$this->breadcrumbs=array(
	'Versions Downloads'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List VersionsDownloads', 'url'=>array('index')),
	array('label'=>'Create VersionsDownloads', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#versions-downloads-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Versions Downloads</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'versions-downloads-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'vd_id',
		'v_id',
		'c_id',
		'time',
		'ip',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
