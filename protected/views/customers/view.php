
<h1>View Customers #<?php echo $model->c_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'c_id',
		'name',
		'email',
		'skype',
		'vk',
		'fb',
		'reg_date',
		'license',
		'status',
		'comment',
	),
)); ?>
