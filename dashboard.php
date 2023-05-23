		
	

	<input id = "accusedhiddenid" name ="accusehiddenname" type = "hidden"/>
	
		<input id = "accusedhdetail" name ="accuseddetail" type = "hidden"/>
      <section id="mainsection" class="client no-padding-top">

	  
	  <script type="text/javascript" language="javascript" >
			
			$(document).ready(function() {
			
			
			
			

			var dataTable = $('#employee-grid').DataTable( {
				
			"searching" :true,
			"processing": true,
			"serverSide": true,
			"ajax":{
						url :"process.php", // json datasource
						type: "POST",  // method  , by default get
						data: {"name": 'dashboard'},
						error: function(){  // error handling

							$(".employee-grid-error").html("");
							$("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="9">No data found in the server</th></tr></tbody>');
							
							
						}
						
					},
							"fnRowCallback": function( nRow, aData, iDisplayIndex ) {
            $('td:eq(1)', nRow).html('<a href="class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal"">' +
                aData[1] + '</a>');
				$('td:eq(5)', nRow).html('<a id="filterdaccused" class="filteraccuse" href="" >' +
                aData[5] + '</a>');
            return nRow;
        }
			
					
				} );
			} );

			
			//$.noConflict();
		</script>		


	  <div  id="container" class="container-fluid">
		
		
                    
		
	<div class="row">
                  <div class="card">
				  
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
						
						
						
						
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">INFO</h3>
                    </div>
                    <div class="card-body">
                      <table id="employee-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                        <thead>
                          <tr>
	
						    
                            <th>S#</th>
                            <th>MES ID</th>
                            <th>IO/ CO'S</th>                         
							<th>Title</th>
                            <th>Title of CPs</th>
							<th> Accused</th>
							
							<th>Status of Hearing with Date</th>                         
							<th>Direction of Court</th>                         
							<th>Next Hearing Date</th>
							
							
							
							
						  
						 </tr>
                        </thead>
                    
					</table>
                    </div>
                  </div>
                </div>
				           </div>     
						     	
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="h4" style="padding-right: 53%;">Form </h3>
      </div>
      <div class="modal-body">
	  
                    <div  class="card-body">
                      
                      <form action = "process.php" method= "post">
					  
                        <div class="form-group">
						<input id= "serialno" type = "hidden" > 
                          <label class="form-control-label label">MES-ID</label>
                                
						    <input type="text" id = "txtMesid" placeholder=""  readonly="true" class="form-control detail-textboxes">
						  
                     <!--     <select name="account" class="form-control detail-ddl">
                              <option>option 1</option>
                              <option>option 2</option>
                              <option>option 3</option>
                              <option>option 4</option>
                            </select>
						  -->
                        </div>
						<div class="form-group">
                          <label class="form-control-label label">IO/CO,S </label>
                          <input type="text" id ="caseofficer" placeholder=""   class="form-control detail-textboxes">
                          </div>
						<div class="form-group">
                          <label class="form-control-label label">Title</label>
                          <input type="text" id ="txttitle" placeholder=""  class="form-control detail-textboxes">
                        </div>
						<div class="form-group">
                          <label class="form-control-label label">Title of  CPS</label>
                          <input type="text" id ="txtcps" placeholder=""  class="form-control detail-textboxes">
                        </div>
						
						<div class="form-group">
                          <label class="form-control-label label">Accused</label>
                          <input type="text" id ="txtaccused" placeholder=""  class="form-control detail-textboxes">
                        </div>
						
						
						<div class="form-group">
                          <label class="label">Status of Hearing </label>
                          
														  <select id = "hearingstatus" name= "hearingstatus"  class="form-control detail-textboxes">
                              <option value = "0"> Please select status of hearing</option>
							  <option value="1">Notice Issue to Nab</option>
                              <option value = "2">Kachha Paishe</option>
                              
                            </select>
						  <br />
						  <label class="label">with Date</label>
						<input type="text" id= "txthearing" placeholder="Hearing Date"  name = "hearing" required="required" class="form-control detail-textboxes">
                          </div>
						
						
						<div class="form-group">
                          <label class="form-control-label label">Direction of Court</label>
                          <input type="text" id ="txtDOC" placeholder=""  class="form-control detail-textboxes">
                        </div>
						
						<div class="form-group">
                          <label class="form-control-label label">Next Hearing Date</label>
                          <input type="text" id ="txtnexthearingdate" placeholder=""  class="form-control detail-textboxes">
                        </div>
						
		
						
						
						
						
						
        
      </div>
      <div class="modal-footer">
	         <input type="submit" value="Update" id= "updatedashboard" name = "accusedupdate" class="btn btn-primary">
        <button id= "close" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
                      </form>
					  
					  
                    </div>
                  

	<script type= "text/javascript">
		$(function(){
			
					$('#employee-grid tbody ').on('click', 'td a.filteraccuse ', function (){
		
			
					var serialno = $(this).closest('tr').find('td:first').text();
			
					$('#accusedhiddenid').val(serialno);
									
									
						$('#accused').trigger('click');
			
			
						
						//$('#accusedhiddenid').val('');
						return false;
					});
			
				
			$('#employee-grid tbody').on('click', 'td a', function (){
			    var serialno = $(this).closest('tr').find('td:first').text();
				var mesid = $(this).closest('tr').find('td:first').next().text();
				var caseofficer = $(this).closest('tr').find('td:first').next().next().text();
				var title = $(this).closest('tr').find('td:first').next().next().next().text();
				var cps= $(this).closest('tr').find('td:first').next().next().next().next().text();
				var accused= $(this).closest('tr').find('td:first').next().next().next().next().next().text();
				var statusofhearing = $(this).closest('tr').find('td:last').prev().prev().text();
				var doc = $(this).closest('tr').find('td:last').prev().text();
				var nexthearingdate = $(this).closest('tr').find('td:last').text();
				var array =	 statusofhearing.split(',');
				
				
			
		
		$('#serialno' ).val(serialno);
		
		$('#txtMesid' ).val(mesid);
        $('#caseofficer' ).val(caseofficer);
        $('#txttitle' ).val(title);
		$('#txtcps' ).val(cps);
		$('#txtaccused' ).val(accused);
		$('#txthearing' ).val(array[1]);
		
		$('#txtDOC' ).val(doc);
		$('#txtnexthearingdate' ).val(nexthearingdate);
		
		
		if(array[0] == "Kachha Paishe")
		{
				$('#hearingstatus' ).val(2);
		}
		else if(array[0] == "Notice Issue to Nab")
		{
			$('#hearingstatus' ).val(1);
		}
		else
		{
			$('#hearingstatus' ).val(0);
		}
		

		
		
		$('.header').css("display","none");
		
		
					$('#txthearing').datepicker();
					$('#txtnexthearingdate').datepicker();
			
	
	
		
});


	

	$('#close').click(function(){

		$('.header').css("display","block");
	});



			
			
		});
			 
			 
	</script>                
	   <script type="text/javascript" src="js/datepicker/jquery-ui.js"></script> 
	<link rel="stylesheet" type="text/css" href="js/datepicker/jquery-ui.css" />
     
		  </section> 
	 