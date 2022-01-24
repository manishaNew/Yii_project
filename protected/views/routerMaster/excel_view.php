<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>
<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'registration-form',
        'action'=>Yii::app()->createAbsoluteUrl('TempRouterMaster/ReadExcel'),
         'enableAjaxValidation'=>true,
             'htmlOptions' => array('enctype' => 'multipart/form-data'),
        )); ?>

         	<div>
		<?php echo 'Please upload router master ' ?>
		<?php echo $form->fileField($model,'csv_file'); ?>
		<?php echo $form->error($model, 'csv_file'); ?>
	</div>
		<br/>
		<?php  echo CHtml::submitButton('Upload CSV',array("class"=>"")); ?>
		<?php echo $form->errorSummary($model); ?>
	</div>


     <?php   $this->endWidget(); ?>


        

