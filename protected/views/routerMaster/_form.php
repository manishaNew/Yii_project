<?php
/* @var $this RouterMasterController */
/* @var $model RouterMaster */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'router-master-form',
	'enableAjaxValidation'=>true,
    'clientOptions'=>array(
      'validateOnSubmit'=>true,
     )
	

  ));?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>


	<?php echo $form->errorSummary($model); ?>
		
	<div class="row">
		<?php echo $form->labelEx($model,'sapid'); ?>
		<?php echo $form->textField($model,'sapid',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'sapid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hostname'); ?>
		<?php echo $form->textField($model,'hostname',array('size'=>14,'maxlength'=>14)); ?>
		<?php echo $form->error($model,'hostname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'loopback'); ?>
		<?php 	$this->widget("ext.maskedInput.MaskedInput", array(
		"model" => $model,
		"attribute" => "loopback",
		"clientOptions" => array("alias" =>  "ip"),
		"defaults"=>array("removeMaskOnSubmit"=>false),
		//'mask' => '9[9][9].9[9][9].9[9][9].9[9][9]'
		//'mask' => '255.255.255.255'
	)); 
	?>
		<?php #echo $form->textField($model,'loopback',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'loopback'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mac_id'); ?>
		<?php echo $form->textField($model,'mac_id',array('size'=>17,'maxlength'=>17)); ?>
		<?php echo $form->error($model,'mac_id'); ?>
	</div>

	

	
	<div class="row">
		<?php echo $form->label($model,'delete_status'); ?>
		<?php echo $form->checkBox($model,'delete_status',array('value' => '1', 'uncheckValue'=>'0')); ?>
	</div>

	<div class="row buttons">
	
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->