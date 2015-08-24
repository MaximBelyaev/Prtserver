<?php
/* @var $this CustomersController */
/* @var $dataProvider CActiveDataProvider */

?>

<h1>Версии</h1>

<?php echo Chtml::link('Добавить','/versions/create', array('class'=>'btn btn-primary')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'user-grid',
	'dataProvider' => $dataProvider,
	'columns' => array(
		'name',
		'dir',
		array(
			'name'=>'status',
			'value'=>'$data->getStatusNameByLang("ru")',
		),
		array(
			'name'=>'date',
			'value'=>'date("d-m-Y", $data->date)',
		),
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
