<?php
/* @var $this RouterMasterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Router Masters',
);

$this->menu=array(
	array('label'=>'Create RouterMaster', 'url'=>array('create')),
	array('label'=>'Manage RouterMaster', 'url'=>array('admin')),
);
?>

<h1>Router Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
