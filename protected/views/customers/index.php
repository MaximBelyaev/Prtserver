<?php
/* @var $this CustomersController */
/* @var $dataProvider CActiveDataProvider */

?>

<h1>Покупатели</h1>

<?php echo Chtml::link('Добавить нового','/customers/create', array('class'=>'btn btn-primary')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'user-grid',
	'dataProvider' => $dataProvider,
	'columns' => array(
		'c_id',
		'name',
		'email',
		'skype',
		'vk',
		'fb',
		array(
			'name'=>'reg_date',
			'value'=>'date("d-m-Y", $data->reg_date)',
		),
		'license',
		'status',
		'comment',
		array(
			'header'=>'Действия',
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}',
			'buttons'=>array
			(
				'update' => array
				(
					'label'=>'Редактировать',
					'options' => array(
						'class' => "btn btn-success"
					),
					'imageUrl'=>false,
				),
				'delete' => array
				(
					'label'=>'Удалить',
					'options' => array(
						'class' => "btn btn-danger"
					),
					'imageUrl'=>false,
				),
			),
		)
	),
)); ?>
