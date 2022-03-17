


<!--VIEW REQUEST -->
<div class="modal fade" id="viewRequest<?php echo $row['leave_id'];?>" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable">
            <!-- Modal content-->
                <div class="modal-content">
                   <!-- MODAL HEADER -->
                <div class="modal-header" style="background: #245E36;">
                    <h3 class="modal-title" style="font-family: sans-serif;color: white;">View Request</h3>
                    <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times" style="color: white;"></i></button>
                </div>
                <!-- MODAL HEADER -->
                <!--MODAL BODY-->
                <form action="" method="POST">
                <div class="modal-body">
                  <input type="hidden" name="view_id" id ="view_id" value="<?= $row['leave_id'];?>">
                  <div class="form-group">
                      <label>School Year:</label>
                      <input style="border-color: gray;" type="text" class="form-control" name="full_name" value="<?= $row['schoolyear'];?>"readonly>
                  </div>
                  <div class="form-group">
                      <label>Semester:</label>
                      <input style="border-color: gray;" type="text" class="form-control" name="full_name" value="<?= $row['semester'];?>"readonly>
                  </div>
                 <div class="form-group">
                      <label>Full Name:</label>
                      <input style="border-color: gray;" type="text" class="form-control" name="full_name" value="<?= $row['full_name'];?>"readonly>
                  </div>
                  <div class="form-group">
                      <label>Email Address:</label>
                      <input style="border-color: gray;" type="Email" class="form-control" name="email_address" value="<?= $row['email_address'];?>"readonly>
                  </div>
                  <div class="form-group">
                      <label>Start Date: </label>
                      <input style="border-color: gray;" type="text" class="form-control" name="selected_date" value="<?= $row['start_date'];?>"readonly>
                  </div>
                    <div class="form-group">
                      <label>End Date: </label>
                      <input style="border-color: gray;" type="text" class="form-control" name="selected_date" value="<?= $row['end_date'];?>"readonly>
                  </div>
                 <div class="form-group">
                     <label>Image: (Click to view Image)</label><br>
                      <a href="<?= $row['request_letter'];?>">
                        <img src="<?= $row['request_letter'];?>" class="thumbnail" alt="">
                      </a>
                  </div>
            </div>
            </form>
        </div>
        </div>
   </div>
  <!--END OF MODAL VIEW-->


    <!-- MODAL OF DELETE REQUEST -->
<div class="modal fade" id="deleteRequest<?php echo $row['leave_id'];?>" role="dialog">
        <div class="modal-dialog">
        
            <!-- Modal content-->
                <div class="modal-content">
                <!-- MODAL HEADER -->
                <div class="modal-header" style="background: #00cb82;">
                                <h3 class="modal-title" style="font-family: sans-serif;color: white;">Delete Request</h3>
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                <!-- MODAL HEADER -->

                <!--MODAL BODY-->
                <form action="deletereq.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="del_id" id="del_id" value="<?php echo $row['leave_id'];?>">
                <p> Are you sure you want to delete this request?</p>
                <!--MODAL FOOTER-->
                <div class="modal-footer"> 
                        <input type="submit" name="delrequest" class="btn btn-danger" value="Yes">
                        <input type="button" class="btn btn-secondary" data-dismiss="modal" value="No">
                </div>
                <!--MODAL FOOTER-->
            </div>
            </form>
        </div>
        </div>
   </div>
<!-- END MODAL OF DELETE REQUEST -->