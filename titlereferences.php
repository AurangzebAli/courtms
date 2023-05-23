

		<script type="text/javascript">
				$(function(){
					$('#txthearing').datepicker();
					$('#txtnexthearing').datepicker();
				});
		
		</script>

<form action="process.php" method="post">
                <div id="titlereferences" class="">
                  <div  class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Detail Form</h3>
                    </div>
                    <div style="padding-left: 25%;" class="card-body">
                      <p></p>
                      <form >
					  
                        <div class="form-group">
                          <label class="form-control-label label">MES-ID</label>
                          <input type="text" placeholder="" name = "mesid" required="required"  class="form-control detail-textboxes">
                        </div>
                        <div class="form-group">
                          <label class="form-control-label label">Title</label>
                          <input type="text" placeholder="" name ="title" required="required"  class="form-control detail-textboxes">
                        </div>
						<div class="form-group">
                          <label class="form-control-label label">CPs</label>
                          <input type="text" placeholder="" name = "cps" required="required" class="form-control detail-textboxes">
                        </div>
						
                        <div class="form-group">
                          <label class="form-control-label label">Accused</label>
                          <input type="text" placeholder=""  name = "accused" required="required" class="form-control detail-textboxes">
                        </div>
						
                        <div class="form-group">
                          <label class="form-control-label label">IO</label>
                          <input type="text" placeholder=""  name="io" required="required" class="form-control detail-textboxes">
                        </div>
						<div class="form-group">
						
						  <label class="label">Status of Hearing </label>
						  <select id = "hearingstatus" name= "hearingstatus"  class="form-control detail-textboxes">
                              <option> Please select status of hearing</option>
							  <option>Notice Issue to Nab</option>
                              <option>Kachha Paishe</option>
                              
                            </select>
                          
						  <br />
						  <label class="label">with Date</label>
                          <input type="text" id= "txthearing" placeholder="Hearing Date"  name = "hearing" required="required" class="form-control detail-textboxes">
						  
                          </div>
						  <!--<div class="form-group">
                          <label class="form-control-label label"></label>
                          <select name="account"  class="form-control detail-textboxes">
                              <option> Please select status of hearing</option>
							  <option>Notice Issue to Nab</option>
                              <option>Kachha Paishe</option>
                              
                            </select>
						  </div>
						  -->
						  
                          
						<div class="form-group">
                          <label class="form-control-label label">Direction of court</label>
                          <input type="text" placeholder="" name ="commitment" required="required" class="form-control detail-textboxes">
						</div>
						
						<div class="form-group">
                          <label class="form-control-label label">Next Hearing</label>
                          <input type="text" id="txtnexthearing" placeholder="" name ="nexthearing" required="required" class="form-control detail-textboxes">
						</div>

                        <div class="form-group">       
						<label class="form-control-label label"></label>
                          <input type="submit" name="save" value="Save" class="btn btn-primary">
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
</form>