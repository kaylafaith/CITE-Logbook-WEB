  <!-- MODAL OF DELETE ADMIN -->
<div class="modal fade" id="deletemodal<?php echo $row['id'];?>" role="dialog">
        <div class="modal-dialog">
        
            <!-- Modal content-->
                <div class="modal-content">
                <!-- MODAL HEADER -->
                <div class="modal-header"  style="background: #245E36;">
                        <h3 class="modal-title" style="font-family: sans-serif;color: white;">Delete Admin</h3>
                        <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times" style="color: white;"></i></button>
                          </div>
                <!-- MODAL HEADER -->

                <!--MODAL BODY-->
                <form action="deletefunc.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="delete_id" id="delete_id" value="<?php echo $row['id'];?>">
                <p> Are you sure you want to delete this user?</p>
                <!--MODAL FOOTER-->
                <div class="modal-footer"> 
                        <input type="submit" name="deletedata" class="btn btn-danger" value="Yes">
                        <input type="button" class="btn btn-secondary" data-dismiss="modal" value="No">
                </div>
                <!--MODAL FOOTER-->
            </div>
            </form>
        </div>
        </div>
   </div>
<!-- END MODAL OF DELETE ADMIN -->

 <!-- MODAL OF EDIT ADMIN -->
<div class="modal fade" id="editmodal<?php echo $row['id'];?>" role="dialog">
        <div class="modal-dialog">
        
            <!-- Modal content-->
                <div class="modal-content">
                <!-- MODAL HEADER -->
               <div class="modal-header" style="background: #245E36;">
					            <h3 class="modal-title" style="font-family: sans-serif;color: white;">Edit Profile</h3>
					             <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times" style="color: white;"></i></button>
						  </div>
                <!-- MODAL HEADER -->

                <!--MODAL BODY-->
                <form action="edituser.php" method="POST">
                <div class="modal-body">
                			<input type="hidden" name="update_id" id="update_id" value="<?php echo $row['id'];?>">
                			  <div class="form-group" style="display: inline-block;">
		                        <label>User Type</label>
		                        <input style="border-color: gray;" type="text" class="form-control" name="teacher" id="teacher" value="<?php echo $row['usertype'];?>" readonly="">
		                  </div>
					        <div class="form-group">
					            <label>New Faculty ID</label>
					            <input style="border-color: gray;" type="text" class="form-control" name="username" id="username" value="<?php echo $row['username'];?>" required="required">
					        </div>
					         <div class="form-group">
			                      <label>Email Address</label>
			                      <input style="border-color: gray;" type="email" class="form-control" name="email" id="email" value="<?php echo $row['email'];?>" required="required">
			                  </div>
					        <div class="form-group">
					            <label>New First Name</label>
					            <input style="border-color: gray;" type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $row['first_name'];?>" required="required">
					        </div>
					        <div class="form-group">
					            <label>New Last Name</label>
					            <input style="border-color: gray;" type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $row['last_name'];?>" required="required"
					        </div>
                	
                <!--MODAL FOOTER-->
                <div class="modal-footer"> 
                        <button type="submit" name="updatedata" class="btn btn-success">Update User</button>
                </div>
                <!--MODAL FOOTER-->
                </form>
            </div>
            		
        </div>
        </div>
   </div>

 <!-- ENDMODAL OF EDIT ADMIN -->

