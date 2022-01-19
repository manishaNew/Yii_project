<?php
/* @var $this RouterMasterController */
/* @var $model RouterMaster */

$this->breadcrumbs=array(
	'Router Masters'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RouterMaster', 'url'=>array('index')),
	array('label'=>'Create RouterMaster', 'url'=>array('create')),
	array('label'=>'Update RouterMaster', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RouterMaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RouterMaster', 'url'=>array('admin')),
);
?>

<h1>View RouterMaster #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'sapid',
		'hostname',
		'loopback',
		'mac_id',
		'created_on',
		'updated_on',
		'delete_status',
	),
)); ?>
