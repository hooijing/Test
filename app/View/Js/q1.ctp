<div class="alert  ">
<button class="close" data-dismiss="alert"></button>
Question: Advanced Input Field</div>

<p>
1. Make the Description, Quantity, Unit price field as text at first. When user clicks the text, it changes to input field for use to edit. Refer to the following video.

</p>


<p>
2. When user clicks the add button at left top of table, it wil auto insert a new row into the table with empty value. Pay attention to the input field name. For example the quantity field

<?php echo htmlentities('<input name="data[1][quantity]" class="">')?> ,  you have to change the data[1][quantity] to other name such as data[2][quantity] or data["any other not used number"][quantity]

</p>



<div class="alert alert-success">
<button class="close" data-dismiss="alert"></button>
The table you start with</div>
<style>
.table .content {
	display: none;
}
.table tr input,
.table tr textarea {
	display: none;
}
.table tr .placeholder {
	width: 100%;
	display: inline-block;
	height: 50px;
}
</style>

<table class="table table-striped table-bordered table-hover">
<thead>
<th><span id="add_item_button" class="btn mini green addbutton" onclick="addToObj=false">
											<i class="icon-plus"></i></span></th>
<th>Description</th>
<th>Quantity</th>
<th>Unit Price</th>
</thead>

<tbody>
	<tr class="content">
	<td><span class="btn btn-delete"><i class="icon-trash"></i></span></td>
	<td>
	    <div><span class="description-placeholder placeholder"></span>
			 <textarea name="data[0][description]" class="m-wrap description required form-control" rows="2"></textarea>
		</div>
	</td>
	<td>
	    <div><span class="quantity-placeholder placeholder"></span>
			 <input type="text"  name="data[0][quantity]" class="form-control"/>
		</div>
    </td>
	<td>
	     <div><span class="unit_price-placeholder placeholder"></span>
			  <input type="text"  name="data[0][unit_price]" class="form-control"/>
		 </div>
	</td>
	
</tr>
<tr data-index="1">
	<td><span class="btn btn-delete"><i class="icon-trash"></i></span></td>
	<td>
	    <div><span class="description-placeholder placeholder"></span>
			 <textarea name="data[1][description]" class="m-wrap description required form-control" rows="2"></textarea>
		</div>
	</td>
	<td>
	    <div><span class="quantity-placeholder placeholder"></span>
			 <input type="text"  name="data[1][quantity]" class="form-control"/>
		</div>
    </td>
	<td>
	     <div><span class="unit_price-placeholder placeholder"></span>
			  <input type="text"  name="data[1][unit_price]" class="form-control"/>
		 </div>
	</td>
</tr>
</tbody>

</table>


<p></p>
<div class="alert alert-info ">
<button class="close" data-dismiss="alert"></button>
Video Instruction</div>

<p style="text-align:left;">
<video width="78%"   controls>
  <source src="/video/q3_2.mov">
Your browser does not support the video tag.
</video>
</p>





<?php $this->start('script_own');?>
<script>
$(document).ready(function(){

	$("#add_item_button").click(function(){
            var indexs = parseInt($('.table tr:last').data('index'));
			if (!indexs) {
				indexs = 0;
			}
			var newRow = $('.table').find('.content').html().replace('data[0]', 'data[' + (indexs + 1) + ']');
			$('.table tbody').append('<tr data-index="' + (indexs + 1) + '">' + newRow + '</tr>');
		});

	$(document).on('click', '.table tr .btn-delete', function(event) {
			$(this).parent().parent().remove();
		});
		
	$(document).on('click', '.table tr .placeholder', function(event) {
			$(this).hide();
			$(this).siblings().show();
			$(this).siblings().focus();
		});
	
	$(document).on('blur', '.table tr .form-control', function(event) {
			$(this).hide();
			$(this).siblings().show();
			$(this).siblings().html($(this).val());
		})
	
});
</script>
<?php $this->end();?>

