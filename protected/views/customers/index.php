<?php
/* @var $this CustomersController */
/* @var $dataProvider CActiveDataProvider */

?>

<h1>Customers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
