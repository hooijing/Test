
<div id="message1">


<?php echo $this->Form->create('Type',array('id'=>'form_type','type'=>'file','class'=>'','method'=>'POST','autocomplete'=>'off','inputDefaults'=>array(
				
				'label'=>false,'div'=>false,'type'=>'text','required'=>false),
				
				'url' => array('controller' => 'format', 'action' => 'q1_save')))?>
	
<?php echo __("Hi, please choose a type below:")?>
<br><br>

<?php 
        $option = array(
		array(
		 'title' => 'Type1', 
		 'content' => '<span><ul><li>Description .......</li>
 				        <li>Description 2</li></ul></span>'),
		array(
         'title' => 'Type2', 
		 'content' => '<span><ul><li>Desc 1 .....</li>
 				       <li>Desc 2...</li></ul></span>')		
						);

?>
	
<?php 
         $options_new = array();
		 foreach($option as $id => $options){
		         $options_new[$options['title']] ='<span class="popup" data-id="' . $id . '">' . $options['title'] . '</span><div class="style_popover" id="' . $id . '">' . $options['content'] . '</div>';
		 }
		 
		 
		 ?>

<?php echo $this->Form->input('type', array('legend'=>false, 'type' => 'radio', 'options'=>$options_new,'before'=>'<label class="radio line notcheck">','after'=>'</label>' ,'separator'=>'</label><label class="radio line notcheck">'));?>


<?php echo $this->Form->end(array(
				'label' => 'save'
			));?>

</div>

<style>
.style_popover {
	display: none;
}

#message1 .radio{
	vertical-align: top;
	font-size: 13px;
}

.control-label{
	font-weight: bold;
}

.wrap {
	white-space: pre-wrap;
}

</style>

<?php $this->start('script_own')?>
<script>

$(document).ready(function(){
	$(".popup").popover({
      trigger: 'hover',
      content: function() {
	        var typeId = $(this).data('id');
			return $('#' + typeId).html();
	  },
	  html: true
	});



})


</script>
<?php $this->end()?>
