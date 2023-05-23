

	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
		<script type="text/javascript" language="javascript" src="jquery/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="jquery/jquery.dataTables.js"></script>
    			
<script type = "text/javascript">
	$(document).ready(function() {
			 

		
		

				Accused();
			 function Accused()
			 {
			
			 var selectedAccuse = $('#accusedhiddenid').val();
			 var dataTable = $('#accuse-grid').DataTable( {
					
				"searching" :false,
				"processing": true,
				"serverSide": true,
				"ajax":{
							url :"process.php", // json datasource
							type: "post",  // method  , by default get
							data: {name: 'accusedform',selectedaccuse:selectedAccuse},
							error: function(){  // error handling

								$(".employee-grid-error").html("");
								$("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="4">No data found in the server</th></tr></tbody>');
								
								
							}
							
						},
							"columnDefs": [ {
				"targets": -1,
				"data": null,
				"defaultContent": "<button class='btn btn-primary btn-md' data-toggle='modal' data-target='#myModal'>Add </button>"
			} ],
			"fnRowCallback": function( nRow, aData, iDisplayIndex ) {
            $('td:eq(1)', nRow).html('<a id="accusedetail" class="accusedetail" href="" >' +aData[1] + '</a>');
            return nRow;
        }
			
							
			});
			
			$('#accusedhiddenid').val('');
			
			
		}

		
		
		clickEvent();
		function clickEvent()
		{
			
		$('#accuse-grid tbody ').on('click', 'td a.accusedetail', function (){
					var mesid = $(this).closest('tr').find('td:first').next().text();
					$('#accusedhdetail').val(mesid);
					$("#maindiv").find('#mainsection').load('accuse-detail.php');
					
		
		return false;
		
		});
			
			
		$( "#txtclose" ).click(function() {
				$('.header').css("display","block");
		$("#maindiv").find('#mainsection').load('accused.php');
		});
		
		
		}

		
		
		
		InsertAccuse();
		
		function InsertAccuse()
		{
			
			
			
		$( "#save" ).click(function() {
			var mesid= $('#txtMesid').val(); 
			var accused = $('#txtaccused').val(); 
			var cnicval = $('#txtcnic').val() + $('#txtcnic1').val() + $('#txtcnic2').val(); 
			var fathernameval = $('#txtfathername').val(); 
			var organizationval = $('#txtorganization').val(); 
			var statusval = $('#txtstatus').val(); 


			
			$.ajax({
				url: "process.php",
				type: "post",
				data: {name: 'accusesave',messid1 : mesid, accused1 : accused, cnic: cnicval, fathername : fathernameval , organization: organizationval , status: statusval} ,
				success: function (response) {
				
					alert(response);		
					$('#txtaccused').val(''); 
					$('#txtcnic').val(''); 
					$('#txtfathername').val(''); 
					$('#txtorganization').val(''); 
					$('#txtstatus').val(''); 

				},
				error: function(jqXHR, textStatus, errorThrown) {
				   console.log(textStatus, errorThrown);
				}


			});
			
			
			
			return false;
			});
			
		}
		
		


		
		
		
		
		
	});
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
                      <h3 class="h4">Accused</h3>
                    </div>
					<div class="card-body">
					
					         <table id="accuse-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                        <thead>
                          <tr>
	
						    <th>S#</th>
                            <th>MES ID</th>
                            <th>Title</th>
                            <th>Accused</th>
							<th>New Accused</th>
							
						  
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
                <h3 class="h4" style="padding-right: 36%;">Accused Form </h3>
      </div>
      <div class="modal-body">
	  
                    <div  class="card-body">
                      
                      <form action = "process.php" method= "post">
					  
                        <div class="form-group">
						<input id= "serialno" type = "hidden" > 
                          <label class="form-control-label label">MES-ID</label>
                                
						    <input type="text" id = "txtMesid" placeholder="" name="mesid"  readonly="true" class="form-control detail-textboxes">
						  
                     <!--     <select name="account" class="form-control detail-ddl">
                              <option>option 1</option>
                              <option>option 2</option>
                              <option>option 3</option>
                              <option>option 4</option>
                            </select>
						  -->
                        </div>
						<div class="form-group">
                          <label class="col-sm-3 form-control-label label">Title</label>
                          <input type="text" id ="txttitle" placeholder="" name = "title"  readonly="true" class="form-control detail-textboxes">
                          </div>
						<div class="form-group">
                          <label class="form-control-label label">Accused</label>
                          <input type="text" id = "txtaccused" placeholder="" name = "accused"  class="form-control detail-textboxes">
                        </div>
						
						<div     class="form-group detail-textboxes">
                          <label  class="form-control-label label">CNIC</label>
						  <div style="margin-left: 43px;"  class="form-control" >
                          <input type="text" style="width:60px;"  maxlength="5" id = "txtcnic" placeholder="" name = "cnic"  > -
						  <input type="text" style="width:80px;" maxlength="7" id = "txtcnic1" placeholder="" name = "cnic1"  >-
						 <input type="text" style="width:20px;" maxlength="1" id = "txtcnic2" placeholder="" name = "cnic2"  >
						 </div>
                        </div>
						
						<div class="form-group">
                          <label class="form-control-label label">Father Name</label>
                          <input type="text" id = "txtfathername" placeholder="" name = "accused"  class="form-control detail-textboxes">
                        </div>
						
						<div class="form-group">
                          <label style="word-wrap: break-word;" class="form-control-label label">Organization</label>
                          <input type="text" id = "txtorganization" placeholder="" name = "accused"  class="form-control detail-textboxes">
                        </div>
						
					<div class="form-group">
                          <label class="form-control-label label">Status</label>
                          <input type="text" id = "txtstatus" placeholder="" name = "accused"  class="form-control detail-textboxes">
                        </div>
		</div>
						
						
						
						
        
      </div>
      <div class="modal-footer">
	         <input type="submit" value="Save" id= "save" name = "accusedsave" class="btn btn-primary">
        <button id ="txtclose"  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
                      </form>
					  
					  
                    </div>
     

	<script type= "text/javascript">
		$(function(){
			
			$('#accuse-grid tbody').on('click', 'td button', function (){
			         var serialno = $(this).closest('tr').find('td:first').text();
				 var mesid = $(this).closest('tr').find('td:first').next().text();
				var title = $(this).closest('tr').find('td:first').next().next().text();
			
		$('#serialno' ).val(serialno);
		$('#txtMesid' ).val(mesid);
        $('#txttitle' ).val(title);

 $('.header').css("display","none");
	
		
		});
		});
	</script>