function addRows(tableID)
{ 
     var table = document.getElementById(tableID);
    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);
   
     

    var cell1 = row.insertCell(0);
cell1.innerHTML = '<select name="quality[]" id="quality'+rowCount+'"   data-live-search="true" class="selectpicker requiredInput form-control" onchange="getFullDetails('+rowCount+')"><option value="0"> Select Category</option> </select>';
   
   
  var cell2 = row.insertCell(1);   
  cell2.innerHTML = "<INPUT type='button' class='btn btn-danger' value='-' onclick=deleteRow('itemList',"+rowCount+") >";

 

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
