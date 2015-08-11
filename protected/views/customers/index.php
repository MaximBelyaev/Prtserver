<?php
/* @var $this CustomersController */
/* @var $dataProvider CActiveDataProvider */

?>

<h1>Покупатели</h1>

<?php echo Chtml::link('Добавить 200 лицензионных кодов','/customers/addcodes', array('class'=>'btn btn-primary')); ?>

<p>
	<a href="javascript:onoff('block1');"><label for="block1">Показать все коды лицензий</label></a>
<div id="block1" style="display: none;">
<textarea rows="25" style="width: 265px;" onclick="this.select()"><?php
	foreach ($allCustomers as $customer)
	{
		echo $customer->license . "\n";
	}
	?></textarea>
</div>
</p>

<h2>Активированные</h2>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'user-grid',
	'dataProvider' => $activatedCustomers,
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

<!--<h2>Все лицензии и покупатели</h2>-->
<?php /**$this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'user-grid',
	'dataProvider' => $dataProvider,
	'columns' => array(
		'site',
array(
			'name'=>'reg_date',
			'value'=>'date("d-m-Y", $data->reg_date)',
		),
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
)); **/?>

<script>
	function onoff(t){
		p=document.getElementById(t);
		if(p.style.display=="none"){
			p.style.display="block";}
		else{
			p.style.display="none";}
	}
</script>
