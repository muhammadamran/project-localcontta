              <td><button class="btn btn-block btn-default" data-toggle="modal" data-target="#myModal">CREATE!</button></td>
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"><b>[RecordMaster - Import] </b> Add New Record</h4>
                    </div>
                    <div class="modal-body">
                      <form method="post" action=" ">
                        <div class="col-md-12">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>HBL/HAWB*</label>
                              <input type="text" name="hbl" class="form-control" required>
                            </div>

                            <!-- <div class="form-group">
                              <label>AJU NBR</label>
                              <input type="text" name="aju" class="form-control" required>
                            </div> -->

                            <div class="form-group">
                              <label>KNREF/TN NO.</label>
                              <input type="text" name="ref" class="form-control" required>
                            </div>

                            <div class="form-group">
                              <label>Shipper</label>
                              <select class="form-control" name="shipper" id="shipper">
                                <option value=" ">--- SELECT ---</option>
                                <?php
                                mysql_connect('localhost','root','');
                                mysql_select_db('contta');
                                $result=mysql_query("SELECT * FROM tb_shipper where type = 'import'");
                                while($data=mysql_fetch_array($result)) {
                                  echo "<option value='$data[user_name]'> $data[user_name] </option>";
                                }
                                ?>
                              </select>
                            </div>

                            <div class="form-group">
                              <label>Consignee</label>
                              <select class="form-control" name="cnee" id="cnee">
                                <option value=" ">--- SELECT ---</option>
                                <?php
                                mysql_connect('localhost','root','');
                                mysql_select_db('contta');
                                $result=mysql_query("SELECT * FROM tb_cnee where type = 'import'");
                                while($data=mysql_fetch_array($result)) {
                                  echo "<option value='$data[user_name]'> $data[user_name] </option>";
                                }
                                ?>
                              </select>
                            </div>

                            <div class="form-group">
                              <label>Invoice No.</label>
                              <input type="text" name="inv_no" class="form-control"  required>
                            </div>

                            <script>
                              function getPort(str) {
                                if (str == "") {
                                  document.getElementById("txtHint").innerHTML = "";
                                  return;
                                } else {
                                  if (window.XMLHttpRequest) {
                                    // code for IE7+, Firefox, Chrome, Opera, Safari
                                    xmlhttp = new XMLHttpRequest();
                                  } else {
                                    // code for IE6, IE5
                                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                  }
                                  xmlhttp.onreadystatechange = function() {
                                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                      document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                                    }
                                  }
                                  xmlhttp.open("GET","helper/mot_package_master_impor.php?q="+str,true);
                                  xmlhttp.send();
                                }
                              }
                            </script>

                            <div class="form-group">
                              <label>MOT</label>
                              <select class="form-control" name="mot" id="mot" onchange="getPort(this.value)">
                                <option value="">---SELECT---</option>
                                <option value="FCL">FCL</option>
                                <option value="LCL">LCL</option>
                              </select>                              
                            </div>

                            <div class="form-group">
                              <label>Weight*</label>
                              <input type="text" name="weight" class="form-control"  required>
                              <input type="hidden" name="user_name" class="form-control" placeholder="#" value="<?php echo $_SESSION['username'];?>">
                            </div>

                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>20'</label>
                              <input type="text" name="c20" class="form-control" required>
                            </div>

                            <div class="form-group">
                              <label>40'</label>
                              <input type="text" name="c40" class="form-control" required>
                            </div>

                            <div class="form-group">
                              <label>CBM*</label>
                              <input type="text" name="cbm" class="form-control"  required>
                            </div>

                            <div id="txtHint">
                            </div><!-- /.form group -->

                            <!-- <div class="form-group">
                              <label>PACKAGE</label>
                              <input type="text" name="package" class="form-control"  required>
                            </div> -->

                            <div class="form-group">
                              <label>ETA</label>
                              <input type="date" name="eta" class="form-control"  required>
                            </div>

                            <!-- <div class="form-group">
                              <label>ATA</label>
                              <input type="date" name="ata" class="form-control"  required>
                            </div> -->

                            <!-- <div class="form-group">
                              <label>COO</label>
                              <select class="form-control" name="coo">
                                <option value="">---SELECT---</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                              </select> 
                            </div> -->

                            <button type="submit" name="create" value="create" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                          </div>                          

                        </div>                                                                            

                      </form>

                    </div>

                    <div class="modal-footer">



                    </div>

                  </div>

                </div>

              </div>

