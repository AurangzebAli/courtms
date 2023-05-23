

	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
		<script type="text/javascript" language="javascript" src="jquery/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="jquery/jquery.dataTables.js"></script>
    			
<script type = "text/javascript">
	$(document).ready(function() {
			 

		
		

				Accused();
			 function Accused()
			 {
			
			 var selectedAccused = $('#accusedhdetail').val();
		
			 var dataTable = $('#accusedetail-grid').DataTable( {
					
				"searching" :false,
				"processing": true,
				"serverSide": true,
				"ajax":{
							url :"process.php", // json datasource
							type: "post",  // method  , by default get
							data: {name: 'accuseddetailform',selectedaccused:selectedAccused},
							error: function(){  // error handling

								$(".employee-grid-error").html("");
								$("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="4">No data found in the server</th></tr></tbody>');
								
								
							}
							
						},
							"columnDefs": [ {
				"targets": -1,
				"data": null,
				"defaultContent": "<button id='accuseeditdetail' class='btn btn-primary btn-md' data-toggle='modal' data-target='#myModal'>Edit </button>"
			} ],
			"fnRowCallback": function( nRow, aData, iDisplayIndex ) {
            $('td:eq(1)', nRow).html('<a id="accusedetail" class="accusedetail" href="" >' +aData[1] + '</a>');
            return nRow;
        }
			
							
			});
			
			$('#accusedhdetail').val('');
			
			
		}

		
		

		
		clickEvent();
		function clickEvent()
		{
			
		
		$('#accusedetail-grid tbody').on('click', 'td button', function (){
							$('.header').css("display","none");
			
		    var serialno = $(this).closest('tr').find('td:first').text();
		     //var title = $(this).closest('tr').find('td:first').next().text();
		    var   mesid = $(this).closest('tr').find('td:first').next().next().text();
		    var accused = $(this).closest('tr').find('td:first').next().text();
			var cnic = $(this).closest('tr').find('td:first').next().next().next().text();		
			var fathername = $(this).closest('tr').find('td:first').next().next().next().next().text();		
			var organization = $(this).closest('tr').find('td:last').prev().prev().text();		
			var status = $(this).closest('tr').find('td:last').prev().text();		




			
		$('#serialno' ).val(serialno);
		$('#txtMesid' ).val(mesid);
        //$('#txttitle' ).val(title);
        $('#txtaccused' ).val(accused);
        $('#txtcnic' ).val(cnic);
        $('#txtfathername' ).val(fathername);
        $('#txtorganization' ).val(organization);
        $('#txtstatus' ).val(status);
		
		
		
		
		});
			
		
			
			
			
		$( "#txtclose" ).click(function() {
				$('.header').css("display","block");
				
				$('#accusedhdetail').val($('#txtMesid').val());
				$("#maindiv").find('#mainsection').load('accuse-detail.php');
				
				

		});
		
		
		}
		
		
		
			
		
		
		UpdateAccuse();
		function UpdateAccuse()
		{
			
			
			
		$( "#update" ).click(function() {
			
			var serialnoval = $('#serialno').val();;
			
		     //var title = $(this).closest('tr').find('td:first').next().text();
		    //var   mesid = $(this).closest('tr').find('td:first').next().next().text();
		    var accusedval = $('#txtaccused').val();
			var cnicval = $('#txtcnic').val();;
			var fathernameval = $('#txtfathername').val();
			var organizationval =  $('#txtorganization').val();
			var statusval = $('#txtstatus').val();

			
			
			$.ajax({
				url: "process.php",
				type: "post",
				data: {name: 'accusedUpdate',serialno : serialnoval, accused: accusedval, cnic : cnicval ,fathername :fathernameval , organization:organizationval,status:statusval} ,
				success: function (response) {
				
					alert(response);		
					//$('#txtaccused').val(); 

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
					
					         <table id="accusedetail-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                        <thead>
                          <tr>
	
						    
							<th>S#</th>
                            
							<th>Accused</th>
							<th>MES ID</th>
                            <th>CNIC</th>
											
                            
							<th>Father Name</th>
							<th>Organization</th>
                            <th>Status</th>
							<th>Edit Accused</th>
							
						  
						 </tr>
                        </thead>
                    
					</table>
             
      
</div>

</div>
</div>
				  </div>
				  
				  
	

>
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
                          <label class="form-control-label label">Accused</label>
                          <input type="text" id = "txtaccused" placeholder="" name = "accused"  class="form-control detail-textboxes">
                        </div>
						
						<div class="form-group">
                          <label class="form-control-label label">CNIC</label>
                          <input type="text" id = "txtcnic" placeholder="" name = "cnic"  maxlength="13" class="form-control detail-textboxes">
                        </div>
						
						<div class="form-group">
                          <label class="form-control-label label">Father Name</label>
                          <input type="text" id = "txtfathername" placeholder="" name = "fathername"  class="form-control detail-textboxes">
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
	         <input type="submit" value="Save" id= "update" name = "accusedUpdate" class="btn btn-primary">
        <button id ="txtclose"  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
                      </form>
					  
					  </div>
					  
				
             