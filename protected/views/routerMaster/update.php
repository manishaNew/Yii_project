<?php
/* @var $this RouterMasterController */
/* @var $model RouterMaster */

$this->breadcrumbs=array(
	'Router Masters'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RouterMaster', 'url'=>array('index')),
	array('label'=>'Create RouterMaster', 'url'=>array('create')),
	array('label'=>'View RouterMaster', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RouterMaster', 'url'=>array('admin')),
);
?>

<h1>Update RouterMaster <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>