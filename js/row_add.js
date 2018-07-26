
function addRows(tableID)
{ 
     var table = document.getElementById(tableID);
    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);
  var add=document.getElementById("Row_add").innerHTML;
 
  
    var cell1 = row.insertCell(0);
cell1.innerHTML = '<select name="items[]" id="item_'+rowCount+'"  onchange="getPrice('+rowCount+')" class=" form-control states"   >'+add+'</select>';
   
    var cell2 = row.insertCell(1);
cell2.innerHTML = '<input type="text" name="price[]" id="price_'+rowCount+'"  class=" form-control  "  ></input>';
   
    var cell3 = row.insertCell(2);
cell3.innerHTML = '<input type="text" name="quantity[]" id="quantity_'+rowCount+'" onkeyup="calculatePrice('+rowCount+')" class=" form-control "  ></input>';
   
    var cell4 = row.insertCell(3);
cell4.innerHTML = '<input type="text" name="unitPrice[]" id="unitPrice_'+rowCount+'"  class=" form-control "></input>';
   
	
   
   
  var cell5 = row.insertCell(4);   
  cell5.innerHTML = "<INPUT type='button' class='btn btn-danger' value='Delete' onclick=deleteRow('itemList',"+rowCount+") >";

	 
            $(".states").select2();   
		   
       

   }

 function deleteRow(tableID,rowId)
{
   try
   {
         var table = document.getElementById(tableID);
         table.deleteRow(rowId);
      
  }
  catch(e)
  {
        alert(e);
  }
}
