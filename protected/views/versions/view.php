<h1>View Versions #<?php echo $model->v_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'v_id',
		'name',
		'dir',
		'status',
	),
)); ?>
