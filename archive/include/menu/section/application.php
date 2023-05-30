<li class="section">
    <div>
        APPLICATION SECTION
    </div>
</li>
<!-- EXPORT -->
<li class="<?= // EXPORT AIR
               $uriSegments[2] == 'export_air_master.php' || 
               $uriSegments[2] == 'export_air_ship_cus.php' || 
               $uriSegments[2] == 'export_air_ship_mon.php' || 
               $uriSegments[2] == 'export_air_efile.php' ||
               // EXPORT SEA
               $uriSegments[2] == 'export_sea_master.php' ||
               $uriSegments[2] == 'export_sea_ship_cus.php' || 
               $uriSegments[2] == 'export_sea_ship_mon.php' ||
               $uriSegments[2] == 'export_sea_coo_man.php' || 
               $uriSegments[2] == 'export_sea_billing.php' ||
               $uriSegments[2] == 'export_sea_set_trucker.php' ||
               $uriSegments[2] == 'export_sea_efile.php'
               ? 'active' : '' 
            ?>">
    <a class="<?= // EXPORT AIR
                  $uriSegments[2] == 'export_air_master.php' || 
                  $uriSegments[2] == 'export_air_ship_cus.php' || 
                  $uriSegments[2] == 'export_air_ship_mon.php' || 
                  $uriSegments[2] == 'export_air_efile.php' ||
                  // EXPORT SEA
                  $uriSegments[2] == 'export_sea_master.php' ||
                  $uriSegments[2] == 'export_sea_ship_cus.php' || 
                  $uriSegments[2] == 'export_sea_ship_mon.php' ||
                  $uriSegments[2] == 'export_sea_coo_man.php' || 
                  $uriSegments[2] == 'export_sea_billing.php' ||
                  $uriSegments[2] == 'export_sea_set_trucker.php' ||
                  $uriSegments[2] == 'export_sea_efile.php'
                  ? 'active' : '' 
              ?>" 
              href="#"><i class="fa fa-box fa-fw"></i> Export<span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level">
        <!-- EXPORT AIRFREIGHT -->
        <li class="<?= $uriSegments[2] == 'export_air_master.php' || 
                       $uriSegments[2] == 'export_air_ship_cus.php' || 
                       $uriSegments[2] == 'export_air_ship_mon.php' || 
                       $uriSegments[2] == 'export_air_efile.php'
                       ? 'active' : '' 
                   ?>">
            <a href="#" style="background-color: skyblue;color: white"><i class="fas fa-plane"></i> Airfreight<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li class="<?= $uriSegments[2] == 'export_air_master.php' ? 'show' : '' ?>">
                    <a href="export_air_master.php"><font style="font-weight: 600;">-</font> Export Master</a>
                </li>
                <?php 
                $con=mysqli_connect("localhost","root","","contta");
                $result1 = mysqli_query($con,"SELECT * FROM tb_record_miles_export 
                                              INNER JOIN tb_ex_custom ON tb_record_miles_export.rcd_id=tb_ex_custom.rcd_id 
                                              WHERE tb_record_miles_export.miles_custom = 0 
                                              AND tb_record_miles_export.miles_arr != 0 
                                              AND tb_record_miles_export.mot = 'AIR' ");
                $cus_total = mysqli_num_rows($result1);
                if ($cus_total == 0) { ?>
                    <li class="<?= $uriSegments[2] == 'export_air_ship_cus.php' ? 'show' : '' ?>">
                        <a class="#" href="export_air_ship_cus.php"><font style="font-weight: 600;">-</font> 1) Custom Arrangement </a>
                    </li>
                <?php } else { ?>
                    <li class="<?= $uriSegments[2] == 'export_air_ship_cus.php' ? 'show' : '' ?>">
                        <a class="#" href="export_air_ship_cus.php"><font style="font-weight: 600;">-</font> 1) Custom Arrangement <i class="btn btn-danger btn-circle"><?= $cus_total;?></i></a>
                    </li>
                <?php } ?>
                <li class="<?= $uriSegments[2] == 'export_air_ship_mon.php' ? 'show' : '' ?>">
                    <a class="#" href="export_air_ship_mon.php"><font style="font-weight: 600;">-</font> 2) Ship. Monitoring</a>
                </li>   
                <li class="<?= $uriSegments[2] == 'export_air_efile.php' ? 'show' : '' ?>">
                    <a class="#" href="export_air_efile.php"><font style="font-weight: 600;">-</font> *) E-FILE</a>
                </li>                             
            </ul>
        </li>
        <!-- END EXPORT AIRFREIGHT -->
        <!-- EXPORT SEAFREIGHT -->
        <li class="<?= $uriSegments[2] == 'export_sea_master.php' ||  
                       $uriSegments[2] == 'export_sea_ship_cus.php' || 
                       $uriSegments[2] == 'export_sea_ship_mon.php' || 
                       $uriSegments[2] == 'export_sea_coo_man.php' || 
                       $uriSegments[2] == 'export_sea_billing.php' ||
                       $uriSegments[2] == 'export_sea_set_trucker.php' ||
                       $uriSegments[2] == 'export_sea_efile.php'
                       ? 'active' : '' 
                   ?>">
            <a href="#" style="background-color: skyblue;color: white"><i class="fas fa-ship"></i> Seafreight<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li class="<?= $uriSegments[2] == 'export_sea_master.php' ? 'show' : '' ?>">
                    <a href="export_sea_master.php"><font style="font-weight: 600;">-</font> Export Master</a>
                </li>
                <?php 
                $con=mysqli_connect("localhost","root","","contta");
                $result1 = mysqli_query($con,"SELECT * FROM tb_record_miles_export 
                                              INNER JOIN tb_ex_custom ON tb_record_miles_export.rcd_id=tb_ex_custom.rcd_id 
                                              WHERE tb_record_miles_export.miles_custom = 0 
                                              AND tb_record_miles_export.miles_arr != 0 
                                              AND tb_record_miles_export.mot = 'AIR' ");
                $cus_total = mysqli_num_rows($result1);
                if ($cus_total == 0) {                            
                    ?>
                    <li class="<?= $uriSegments[2] == 'export_sea_ship_cus.php' ? 'show' : '' ?>">
                        <a class="#" href="export_sea_ship_cus.php"><font style="font-weight: 600;">-</font> 1) Custom Arrangement </a>
                    </li>
                <?php } else { ?>
                    <li class="<?= $uriSegments[2] == 'export_sea_ship_cus.php' ? 'show' : '' ?>">
                        <a class="#" href="export_sea_ship_cus.php"><font style="font-weight: 600;">-</font> 1) Custom Arrangement <i class="btn btn-danger btn-circle"><?= $cus_total;?></i></a>
                    </li>
                <?php } ?>
                <li class="<?= $uriSegments[2] == 'export_sea_ship_mon.php' ? 'show' : '' ?>">
                    <a class="#" href="export_sea_ship_mon.php"><font style="font-weight: 600;">-</font> 2) Ship. Monitoring</a>
                </li>
                <li class="<?= $uriSegments[2] == 'export_sea_coo_man.php' ? 'show' : '' ?>">
                    <a class="#" href="export_sea_coo_man.php"><font style="font-weight: 600;">-</font> 3) COO Management</a>
                </li>
                <li class="<?= $uriSegments[2] == 'export_sea_billing.php' ? 'show' : '' ?>">
                    <a class="#" href="export_sea_billing.php"><font style="font-weight: 600;">-</font> 4) Billing</a>
                </li>
                <li class="<?= $uriSegments[2] == 'export_sea_set_trucker.php' ? 'show' : '' ?>">
                    <a class="#" href="export_sea_set_trucker.php"><font style="font-weight: 600;">-</font> 5) Set Trucker</a>
                </li> 
                <li class="<?= $uriSegments[2] == 'export_sea_efile.php' ? 'show' : '' ?>">
                    <a class="#" href="export_sea_efile.php"><font style="font-weight: 600;">-</font> *) E-FILE</a>
                </li>                             
            </ul>
        </li>
        <!-- END EXPORT SEAFREIGHT -->
    </ul>
</li>
<!-- IMPORT -->
<li class="<?= // IMPORT AIR
               $uriSegments[2] == 'import_air_master.php' || 
               $uriSegments[2] == 'import_air_pre.php' || 
               $uriSegments[2] == 'import_air_clear.php' || 
               $uriSegments[2] == 'import_air_post.php' || 
               $uriSegments[2] == 'import_air_set_trucking.php' || 
               $uriSegments[2] == 'import_air_cost_sheet.php' || 
               $uriSegments[2] == 'import_air_efile.php' || 
               // IMPORT SEA
               $uriSegments[2] == 'import_sea_master.php' || 
               $uriSegments[2] == 'import_sea_pre.php' || 
               $uriSegments[2] == 'import_sea_clear.php' || 
               $uriSegments[2] == 'import_sea_post.php' || 
               $uriSegments[2] == 'import_sea_set_trucking.php' || 
               $uriSegments[2] == 'import_sea_cost_sheet.php' || 
               $uriSegments[2] == 'import_sea_efile.php'
               ? 'active' : '' 
           ?>">
    <a class="<?= // IMPORT AIR
                  $uriSegments[2] == 'import_air_master.php' || 
                  $uriSegments[2] == 'import_air_pre.php' || 
                  $uriSegments[2] == 'import_air_clear.php' || 
                  $uriSegments[2] == 'import_air_post.php' || 
                  $uriSegments[2] == 'import_air_set_trucking.php' || 
                  $uriSegments[2] == 'import_air_cost_sheet.php' || 
                  $uriSegments[2] == 'import_air_efile.php' || 
                  // IMPORT SEA
                  $uriSegments[2] == 'import_sea_master.php' || 
                  $uriSegments[2] == 'import_sea_pre.php' || 
                  $uriSegments[2] == 'import_sea_clear.php' || 
                  $uriSegments[2] == 'import_sea_post.php' || 
                  $uriSegments[2] == 'import_sea_set_trucking.php' || 
                  $uriSegments[2] == 'import_sea_cost_sheet.php' || 
                  $uriSegments[2] == 'import_sea_efile.php'
                  ? 'active' : '' 
              ?>" href="#"><i class="fa fa-dolly-flatbed fa-fw"></i> Import<span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level">
        <!-- IMPORT AIRFREGIT -->
        <li class="<?= $uriSegments[2] == 'import_air_master.php' || 
                       $uriSegments[2] == 'import_air_pre.php' || 
                       $uriSegments[2] == 'import_air_clear.php' || 
                       $uriSegments[2] == 'import_air_post.php' || 
                       $uriSegments[2] == 'import_air_set_trucking.php' || 
                       $uriSegments[2] == 'import_air_cost_sheet.php' || 
                       $uriSegments[2] == 'import_air_efile.php'
                       ? 'active' : '' 
                   ?>">
            <a href="#" style="background-color: skyblue;color: white"><i class="fas fa-plane"></i> Airfreight<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <?php 
                $con=mysqli_connect("localhost","root","","contta");
                $result1 = mysqli_query($con,"SELECT * FROM tb_master_impor 
                                              WHERE rcd_status = 'New' 
                                              AND rcd_mot = 'AIR'");
                $total1 = mysqli_num_rows($result1);
                if ($total1 == 0) {                            
                    ?>
                    <li class="<?= $uriSegments[2] == 'import_air_master.php' ? 'show' : '' ?>">
                        <a href="import_air_master.php"><font style="font-weight: 600;">-</font> Import Master</a>
                    </li>
                <?php } else { ?>
                    <li class="<?= $uriSegments[2] == 'import_air_master.php' ? 'show' : '' ?>">
                        <a class="#" href="import_air_master.php"><font style="font-weight: 600;">-</font> Import Master <i class="btn btn-primary btn-circle"><?= $total1;?></i></a>
                    </li>
                <?php } ?>
                <?php 
                $con=mysqli_connect("localhost","root","","contta");
                $result2 = mysqli_query($con,"SELECT * FROM tb_record_miles_import 
                                              INNER JOIN tb_imp_pre ON tb_record_miles_import.rcd_id=tb_imp_pre.rcd_id 
                                              WHERE tb_record_miles_import.pre = '0' 
                                              AND tb_record_miles_import.mot = 'AIR' ");
                $total2 = mysqli_num_rows($result2);
                if ($total2 == 0) {                            
                    ?>
                    <li class="<?= $uriSegments[2] == 'import_air_pre.php' ? 'show' : '' ?>">
                        <a class="#" href="import_air_pre.php"><font style="font-weight: 600;">-</font> 1) Pre-Clearance</a>
                    </li>
                <?php } else { ?>
                    <li class="<?= $uriSegments[2] == 'import_air_pre.php' ? 'show' : '' ?>">
                        <a class="#" href="import_air_pre.php"><font style="font-weight: 600;">-</font> 1) Pre-Clearance <i class="btn btn-primary btn-circle"><?= $total2;?></i></a>
                    </li>
                <?php } ?>
                <?php 
                $con=mysqli_connect("localhost","root","","contta");
                $result3 = mysqli_query($con,"SELECT * FROM tb_record_miles_import 
                                              INNER JOIN tb_imp_clear ON tb_record_miles_import.rcd_id=tb_imp_clear.rcd_id 
                                              WHERE tb_record_miles_import.clear = '0' 
                                              AND tb_record_miles_import.pre != '0' 
                                              AND tb_record_miles_import.mot = 'AIR' ");
                $total3 = mysqli_num_rows($result3);
                if ($total3 == 0) {                            
                    ?>
                    <li class="<?= $uriSegments[2] == 'import_air_clear.php' ? 'show' : '' ?>">
                        <a class="#" href="import_air_clear.php"><font style="font-weight: 600;">-</font> 2) Clearance</a>
                    </li>
                <?php } else { ?>
                    <li class="<?= $uriSegments[2] == 'import_air_clear.php' ? 'show' : '' ?>">
                        <a class="#" href="import_air_clear.php"><font style="font-weight: 600;">-</font> 2) Clearance <i class="btn btn-primary btn-circle"><?= $total3;?></i></a>
                    </li>
                <?php } ?>
                <?php 
                $con=mysqli_connect("localhost","root","","contta");
                $result4 = mysqli_query($con,"SELECT * FROM tb_record_miles_import 
                                              INNER JOIN tb_imp_post ON tb_record_miles_import.rcd_id=tb_imp_post.rcd_id 
                                              WHERE tb_record_miles_import.post = '0' 
                                              AND tb_record_miles_import.clear != '0' 
                                              AND tb_record_miles_import.mot = 'AIR'");
                $total4 = mysqli_num_rows($result4);
                if ($total4 == 0) {                            
                    ?>
                    <li class="<?= $uriSegments[2] == 'import_air_post.php' ? 'show' : '' ?>">
                        <a class="#" href="import_air_post.php"><font style="font-weight: 600;">-</font> 3) Post-Clearance</a>
                    </li>
                <?php } else { ?>
                    <li class="<?= $uriSegments[2] == 'import_air_post.php' ? 'show' : '' ?>">
                        <a class="#" href="import_air_post.php"><font style="font-weight: 600;">-</font> 3) Post-Clearance <i class="btn btn-primary btn-circle"><?= $total4;?></i></a>
                    </li>
                <?php } ?>
                <li class="<?= $uriSegments[2] == 'import_air_set_trucking.php' ? 'show' : '' ?>">
                    <a class="#" href="import_air_set_trucking.php"><font style="font-weight: 600;">-</font> 4) Set Trucking</a>
                </li>
                <li class="<?= $uriSegments[2] == 'import_air_cost_sheet.php' ? 'show' : '' ?>">
                    <a class="#" href="import_air_cost_sheet.php"><font style="font-weight: 600;">-</font> *) Cost Sheet</a>
                </li>
                <li class="<?= $uriSegments[2] == 'import_air_efile.php' ? 'show' : '' ?>">
                    <a class="#" href="import_air_efile.php"><font style="font-weight: 600;">-</font> *) E-FILE</a>
                </li>
            </ul>
        </li>
        <!-- END IMPORT AIRFREGIT -->
        <!-- IMPORT SEAFREIGHT -->
        <li class="<?= $uriSegments[2] == 'import_sea_master.php' || 
                       $uriSegments[2] == 'import_sea_pre.php' || 
                       $uriSegments[2] == 'import_sea_clear.php' || 
                       $uriSegments[2] == 'import_sea_post.php' || 
                       $uriSegments[2] == 'import_sea_set_trucking.php' || 
                       $uriSegments[2] == 'import_sea_cost_sheet.php' || 
                       $uriSegments[2] == 'import_sea_efile.php'
                       ? 'active' : '' 
                   ?>">
            <a href="#" style="background-color: skyblue;color: white"><i class="fas fa-ship"></i> Seafreight<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <?php 
                $con=mysqli_connect("localhost","root","","contta");
                $result1 = mysqli_query($con,"SELECT * FROM tb_master_impor 
                                              WHERE rcd_status = 'New' 
                                              AND rcd_mot != 'AIR' ");
                $total1 = mysqli_num_rows($result1);
                if ($total1 == 0) {                            
                    ?>
                    <li class="<?= $uriSegments[2] == 'import_sea_master.php' ? 'show' : '' ?>">
                        <a href="import_sea_master.php"><font style="font-weight: 600;">-</font> Import Master</a>
                    </li>
                <?php } else { ?>
                    <li class="<?= $uriSegments[2] == 'import_sea_master.php' ? 'show' : '' ?>">
                        <a class="#" href="import_sea_master.php"><font style="font-weight: 600;">-</font> Import Master <i class="btn btn-primary btn-circle"><?= $total1;?></i></a>
                    </li>
                <?php } ?>
                <?php 
                $con=mysqli_connect("localhost","root","","contta");
                $result2 = mysqli_query($con,"SELECT * FROM tb_record_miles_import 
                                              INNER JOIN tb_imp_pre ON tb_record_miles_import.rcd_id=tb_imp_pre.rcd_id 
                                              WHERE tb_record_miles_import.pre = '0' 
                                              AND tb_record_miles_import.mot != 'AIR' ");
                $total2 = mysqli_num_rows($result2);
                if ($total2 == 0) {                            
                    ?>
                    <li class="<?= $uriSegments[2] == 'import_sea_pre.php' ? 'show' : '' ?>">
                        <a class="#" href="import_sea_pre.php"><font style="font-weight: 600;">-</font> 1) Pre-Clearance</a>
                    </li>
                <?php } else { ?>
                    <li class="<?= $uriSegments[2] == 'import_sea_pre.php' ? 'show' : '' ?>">
                        <a class="#" href="import_sea_pre.php"><font style="font-weight: 600;">-</font> 1) Pre-Clearance <i class="btn btn-primary btn-circle"><?= $total2;?></i></a>
                    </li>
                <?php } ?>
                <?php 
                $con=mysqli_connect("localhost","root","","contta");
                $result3 = mysqli_query($con,"SELECT * FROM tb_record_miles_import 
                                              INNER JOIN tb_imp_clear ON tb_record_miles_import.rcd_id=tb_imp_clear.rcd_id 
                                              WHERE tb_record_miles_import.clear = '0' 
                                              AND tb_record_miles_import.pre != '0' 
                                              AND tb_record_miles_import.mot != 'AIR'");
                $total3 = mysqli_num_rows($result3);
                if ($total3 == 0) {                            
                    ?>
                    <li class="<?= $uriSegments[2] == 'import_sea_clear.php' ? 'show' : '' ?>">
                        <a class="#" href="import_sea_clear.php"><font style="font-weight: 600;">-</font> 2) Clearance</a>
                    </li>
                <?php } else { ?>
                    <li class="<?= $uriSegments[2] == 'import_sea_clear.php' ? 'show' : '' ?>">
                        <a class="#" href="import_sea_clear.php"><font style="font-weight: 600;">-</font> 2) Clearance <i class="btn btn-primary btn-circle"><?= $total3;?></i></a>
                    </li>
                <?php } ?>
                <?php 
                $con=mysqli_connect("localhost","root","","contta");
                $result4 = mysqli_query($con,"SELECT * FROM tb_record_miles_import 
                                              INNER JOIN tb_imp_post ON tb_record_miles_import.rcd_id=tb_imp_post.rcd_id 
                                              WHERE tb_record_miles_import.post = '0' 
                                              AND tb_record_miles_import.clear != '0' 
                                              AND tb_record_miles_import.mot != 'AIR'");
                $total4 = mysqli_num_rows($result4);
                if ($total4 == 0) {                            
                    ?>
                    <li class="<?= $uriSegments[2] == 'import_sea_post.php' ? 'show' : '' ?>">
                        <a class="#" href="import_sea_post.php"><font style="font-weight: 600;">-</font> 3) Post-Clearance</a>
                    </li>
                <?php } else { ?>
                    <li class="<?= $uriSegments[2] == 'import_sea_post.php' ? 'show' : '' ?>">
                        <a class="#" href="import_sea_post.php"><font style="font-weight: 600;">-</font> 3) Post-Clearance <i class="btn btn-primary btn-circle"><?= $total4;?></i></a>
                    </li>
                <?php } ?>
                <li class="<?= $uriSegments[2] == 'import_sea_set_trucking.php' ? 'show' : '' ?>">
                    <a class="#" href="import_sea_set_trucking.php"><font style="font-weight: 600;">-</font> 4) Set Trucking</a>
                </li>
                <li class="<?= $uriSegments[2] == 'import_sea_cost_sheet.php' ? 'show' : '' ?>">
                    <a class="#" href="import_sea_cost_sheet.php"><font style="font-weight: 600;">-</font> *) Cost Sheet</a>
                </li>
                <li class="<?= $uriSegments[2] == 'import_sea_efile.php' ? 'show' : '' ?>">
                    <a class="#" href="import_sea_efile.php"><font style="font-weight: 600;">-</font> *) E-FILE</a>
                </li>
            </ul>
        </li>
        <!-- END IMPORT SEAFREIGHT -->
    </ul>
</li>
<!-- TRUCKER -->
<li class="<?= $uriSegments[2] == 'truck_job_confirm.php' || 
               $uriSegments[2] == 'truck_job_list.php' 
               ? 'active' : '' 
           ?>">
    <a class="<?= $uriSegments[2] == 'truck_job_confirm.php' || 
                  $uriSegments[2] == 'truck_job_list.php' 
                  ? 'active' : '' 
              ?>" href="#"><i class="fa fa-truck-moving fa-fw"></i> Trucker<span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level">
        <li class="<?= $uriSegments[2] == 'truck_job_list.php' ? 'show' : '' ?>">
            <a class="#" href="truck_job_list.php"><i class="#"></i><i class="fas fa-caret-right" aria-hidden="true"></i> Job List</a>
        </li>
        <li class="<?= $uriSegments[2] == 'truck_job_confirm.php' ? 'show' : '' ?>">
            <a class="#" href="truck_job_confirm.php"><i class="#"></i><i class="fas fa-caret-right" aria-hidden="true"></i> Job Confirm</a>
        </li>                                             
    </ul>
</li>