<?php
/* @var $this RouterMasterController */
/* @var $model RouterMaster */

$this->breadcrumbs=array(
	'Router Masters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List RouterMaster', 'url'=>array('index')),
	array('label'=>'Create RouterMaster', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#router-master-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Router Masters</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'router-master-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
	
		'sapid',
		'hostname',
		'loopback',
		'mac_id',
		/*
		'created_on',
		'updated_on',
		'delete_status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
