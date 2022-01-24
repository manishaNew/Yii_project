<?php
/* @var $this RouterMasterController */
/* @var $model RouterMaster */

$this->breadcrumbs=array(
	'Router Masters'=>array('index'),
	'Manage',
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

<style>
.danger{
	background: red;
}
.duplicate{
	background: grey;
}
.success{
	background: white;
}
	</style>

<h1>View Router Data</h1>


<?php #echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php
//  $this->widget('zii.widgets.grid.CGridView', array(
// 	'id'=>'router-master-grid',
// 	'dataProvider'=>$model->search(),
// 	'selectableRows' => 1, //permit to select only one row by the time
//         'selectionChanged' => 'RouterMaster/create',
// 		'filter' => $model,
		
// 	//'filter'=>$model,
// 	'columns'=>array(
// 		'id',
// 		'sapid',
// 		'hostname',
// 		'loopback',
// 		'mac_id',
// 		/*
// 		'created_on',
// 		'updated_on',
// 		'delete_status',
// 		*/
// 		array(
// 			'class'=>'CButtonColumn',
// 		),
// 	),
// ));
 ?>
 <?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'router-master-form',
	'action'=>$this->createUrl('RouterMaster/create')
	 )) ?> 
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
     'dataProvider'=>$model->search(),
	 'id'=>'router-master-grid',
   //  'showQuickBar'=>true,
  //  'quickCreateAction'=>'QuickCreate', // will be actionQuickCreate()
	'rowCssClassExpression' => '($data->success_status==1?"success":($data->success_status==0?"danger":"duplicate"))',
     'columns'=>array(
           'id',          // display the 'title' attribute
            array('header' => 'Sap Id', 'name' => 'sapid', 'class' => 'ext.CEditableColumn'),
			array('header' => 'Hostname', 'name' => 'hostname', 'class' => 'ext.CEditableColumn'),
			array('header' => 'Loopback', 'name' => 'loopback', 'class' => 'ext.CEditableColumn'),
			array('header' => 'Mac ID', 'name' => 'mac_id', 'class' => 'ext.CEditableColumn'),
			array('header' => 'Validation Failure Reason',
			 'name' => 'fail_validation_reason',
				'type'=>'raw','htmlOptions'=>array(
                'class'=>'fail_validation_reason',
            )
		),
			array(
				'class'=>'CButtonColumn',
				'template'=>'{update}{delete}',
				'buttons'=>array
    			(	
					
					// 'update' => array
					// (
					// 	'url'=> 'Yii::app()->createUrl("RouterMaster/create",array("sapid"=>$data->sapid,"hostname"=>$data->hostname))',
					// 	'options'=>array(  // this is the 'html' array but we specify the 'ajax' element
					// 	  'ajax'=>array(
					// 		'type'=>'POST',
					// 		'data'=> "js:$(this).attr('href')",
					// 		'url'=>"js:$(this).attr('href').split('&')[0]", // ajax post will use 'url' specified above
					// 		'success'=>"js:alert('hello')"
					// 	  ),
					// 	),
					// )
					'update' => array(
						'options' => array('class' => 'save-ajax-button'),
						'url' => 'Yii::app()->createUrl("TempRouterMaster/Update", array("id"=>$data->id))',
					),
					'delete' => array(
						'url' => 'Yii::app()->createUrl("TempRouterMaster/delete", array("id"=>$data->id))',
					),
				)	
				
			),
		

			),
			
	));
	 ?>

<div class="row buttons">
	
		<?php echo CHtml::submitButton("Submit"); ?>
	</div>

<?php $this->endWidget(); ?>

<script>
	$(document).ready(function(){
    $('a.save-ajax-button').on('click', function(e)
    {
        var row = $(this).parent().parent();
        var data = $('input', row).serializeObject();
        $.ajax({
            type: 'POST',
            data: data,
            url: jQuery(this).attr('href'),
            success: function(data, textStatus, jqXHR) {
				var response= $.parseJSON(data);
				if(response.success_status == 1){
					alert("Record Updated Successfully...");
				}else{
					alert("Record Update Failed......");
				}
				$('.fail_validation_reason', row).html(response.fail_validation_reason);
            },
          
        });
        return false;
    });
	

    $.fn.serializeObject = function() {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function() {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };
});
</script>