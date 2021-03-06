<?php
/* @var $this CustomersController */
/* @var $dataProvider CActiveDataProvider */

?>

<h1>Все покупатели и лицензии</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'user-grid',
    'dataProvider' => $customer->search(),
    'filter' => $customer,
	'columns' => array(
		'site',
		/**array(
		'name'=>'reg_date',
		'value'=>'date("d-m-Y", $data->reg_date)',
		),**/
		'license',
		'status',
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