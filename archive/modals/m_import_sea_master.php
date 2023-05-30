<div class="modal fade" id="CMasterImportSeafreight" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>[Create New Record] </b> Import - Seafreight</h4>
      </div>
      <form action="" method="POST">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <p style="font-weight: 600;background-color: aqua;margin-right: 730px;border-radius: 0px 0px 35px 0;">Document</p>
              <hr>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>KN. REF/TN NO. <font style="color: red;">*</font></label>
                    <input type="text" class="form-control" name="InputKNREFTN" id="IdKNREFTN" placeholder="KN. REF/TN NO. ..." required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>HBL/HAWB <font style="color: red;">*</font></label>
                    <input type="text" class="form-control" name="InputHBL" id="IdHBL" placeholder="HBL/HAWB ..." required>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Invoice No. <font style="color: red;">*</font></label>
                    <input type="text" class="form-control" name="InputInvoiceNo" id="IdInvoiceNo" placeholder="Invoice No. ..." required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>ETA <font style="color: red;">*</font></label>
                    <input type="date" class="form-control" name="InputETA" id="IdETA" placeholder="ETA ..." required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>MOT <font style="color: red;">*</font></label>
                    <select class="form-control" name="InputMOT" id="IdMOT" required>
                      <option value="" id="">-- SELECT ---</option>
                      <option value="FCL" id="IDFCL">FCL</option>
                      <option value="LCL" id="IDLCL">LCL</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12" id="forPackage" style="display: none;">
                  <div class="form-group">
                    <label>Package</label>
                    <input type="text" class="form-control" name="InputPackage" id="IdPackage" placeholder="Package ...">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <hr>
              <p style="font-weight: 600;background-color: aqua;margin-right: 730px;border-radius: 0px 0px 35px 0;">Shipper & Consignee</p>
              <hr>
            </div>
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Shipper <font style="color: red;">*</font></label>
                    <select class="form-control" name="InputShipper" id="IdShipper" required>
                      <option value=" ">--- SELECT ---</option>
                      <?php
                      mysql_connect('localhost','root','');
                      mysql_select_db('contta');
                      $resultShipper=mysql_query("SELECT * FROM tb_shipper WHERE type = 'import'");
                      while($dataShipper=mysql_fetch_array($resultShipper)) {
                        echo "<option value='$dataShipper[user_name]'> $dataShipper[user_name] </option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Consignee <font style="color: red;">*</font></label>
                    <select class="form-control" name="InputConsignee" id="IdConsignee" required>
                      <option value=" ">--- SELECT ---</option>
                      <?php
                      mysql_connect('localhost','root','');
                      mysql_select_db('contta');
                      $resultConsignee=mysql_query("SELECT * FROM tb_cnee WHERE type = 'import'");
                      while($dataConsignee=mysql_fetch_array($resultConsignee)) {
                        echo "<option value='$dataConsignee[user_name]'> $dataConsignee[user_name] </option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <hr>
              <p style="font-weight: 600;background-color: aqua;margin-right: 730px;border-radius: 0px 0px 35px 0;">Detail Import - Seafreight</p>
              <hr>
            </div>
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Weight</label>
                    <input type="text" class="form-control" name="InputWeight" id="IdWeight" placeholder="Weight ...">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>20'</label>
                    <input type="text" class="form-control" name="Input20" id="Id20" placeholder="20' ...">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>40'</label>
                    <input type="text" class="form-control" name="Input40" id="Id40" placeholder="40' ...">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>CBM <font style="color: red;">*</font></label>
                    <input type="text" class="form-control" name="InputCBM" id="IdCBM" placeholder="CBM ..." required>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label style="color: red; font-weight: 300;">* <i style="color: #000;">Required!</i></label>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="far fa-times-circle"></i> Close</button>
          <button type="submit" name="createImportSea" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
        </div>
      </form>
    </div>
  </div>
</div>