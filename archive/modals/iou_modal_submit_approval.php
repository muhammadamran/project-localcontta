                <td><button class="btn btn-block btn-primary" data-toggle="modal" data-target="#myModal">Submit for Approval</button></td>
                <div class="modal fade" id="myModal" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><b>[Billing] </b> Submit for Approval</h4>
                      </div>
                      <div class="modal-body">
                        <form method="post" action=" ">
                          <div class="form-group">
                            <label>Are you sure to submit this record?</label>                            
                            <input type="hidden" name="act_id" class="form-control" value="<?php echo $_GET['id'];?>" />
                            <input type="hidden" name="user_name" class="form-control" value="<?php echo $_SESSION['username'];?>" />
                          </div>                            
                          <button type="submit" name="approval" value="approval" class="btn btn-default">Yes</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        </form>
                      </div>
                      <div class="modal-footer">
                        
                      </div>
                    </div>

                  </div>
                </div>
