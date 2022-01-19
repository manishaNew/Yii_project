<?php
/* @var $this RouterMasterController */
/* @var $model RouterMaster */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	

	<div class="row">
		<?php echo $form->label($model,'sapid'); ?>
		<?php echo $form->textField($model,'sapid',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hostname'); ?>
		<?php echo $form->textField($model,'hostname',array('size'=>14,'maxlength'=>14)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'loopback'); ?>
		<?php echo $form->textField($model,'loopback',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mac_id'); ?>
		<?php echo $form->textField($model,'mac_id',array('size'=>17,'maxlength'=>17)); ?>
	</div>

	
	<div class="row">
		<?php echo $form->label($model,'delete_status'); ?>
		<?php echo $form->checkBox($model,'delete_status',array('value' => '1', 'uncheckValue'=>'0')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->