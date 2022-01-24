<?php
/* @var $this RouterMasterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Router Masters',
);


?>

<h1>Router Masters</h1>
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
