<?php include("common/header.php") ?>
<script src="js/row_add.js"></script>

<!--main content start-->
<section id="main-content">
	<section class="wrapper text-center">
	<div class="col-lg-2" ></div>
	<div class="col-lg-7" >
	<table id="itemList">
	<th><h1>Category Select</h1></th>
		<tr id="r1"><td>
		
		<select class="form-control">
		  <optgroup label="Roti">
			<option value="chapati">Chapati</option>
			<option value="naan">Naan</option>
		  </optgroup>
		  <optgroup label="Cold Drinks">
			<option value="thums up">Thums Up</option>
			<option value="slice">Slice</option>
		  </optgroup>
		  <optgroup label="Cold Drinks">
			<option value="thums up">Thums Up</option>
			<option value="slice">Slice</option>
		  </optgroup>
		  <optgroup label="Cold Drinks">
			<option value="thums up">Thums Up</option>
			<option value="slice">Slice</option>
		  </optgroup>
		  <optgroup label="Cold Drinks">
			<option value="thums up">Thums Up</option>
			<option value="slice">Slice</option>
		  </optgroup>
		  <optgroup label="Cold Drinks">
			<option value="thums up">Thums Up</option>
			<option value="slice">Slice</option>
		  </optgroup>
		  <optgroup label="Cold Drinks">
			<option value="thums up">Thums Up</option>
			<option value="slice">Slice</option>
		  </optgroup>
		</select>
</td></tr>
	
	</table>
		
		 </br>
			   <button type="submit" onclick="location.href='bill.php' " class="btn btn-lg btn-info">Order</button>
				<button type="button" class="btn btn-lg btn-info ">Cancel</button>
		</div>
			 
			 

			<div class="col-lg-3" ></div>
			 <button type="button" class="btn btn-lg btn-default" onclick="addRows('itemList')">Add Items</button>
			 
			</div>
			
</section>


<?php include("common/footer.php") ?>