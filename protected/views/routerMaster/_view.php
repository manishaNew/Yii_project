<?php
/* @var $this RouterMasterController */
/* @var $data RouterMaster */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('sapid')); ?>:</b>
	<?php echo CHtml::encode($data->sapid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hostname')); ?>:</b>
	<?php echo CHtml::encode($data->hostname); ?>
	<br />

	<b><?php 

	echo CHtml::encode($data->getAttributeLabel('loopback')); ?>:</b>
	<?php echo CHtml::encode($data->loopback); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mac_id')); ?>:</b>
	<?php echo CHtml::encode($data->mac_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_on')); ?>:</b>
	<?php echo CHtml::encode($data->created_on); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_on')); ?>:</b>
	<?php echo CHtml::encode($data->updated_on); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delete_status')); ?>:</b>
	<?php echo CHtml::encode($data->delete_status); ?>
	<br />

	*/ ?>

</div>