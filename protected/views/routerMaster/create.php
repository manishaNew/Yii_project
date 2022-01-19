<?php
/* @var $this RouterMasterController */
/* @var $model RouterMaster */

$this->breadcrumbs=array(
	'Router Masters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RouterMaster', 'url'=>array('index')),
	array('label'=>'Manage RouterMaster', 'url'=>array('admin')),
);
?>

<h1>Create RouterMaster</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>