<li class="section">
    <div>
        REPORT SECTION
    </div>
</li>
<li class="<?= // EXPORT | IMPORT
               $uriSegments[2] == 'report_daily_export.php' || 
               $uriSegments[2] == 'report_daily_import.php' || 
               // AIR
               $uriSegments[2] == 'report_air_process.php' || 
               $uriSegments[2] == 'report_air_uncompleted.php' ||
               // SEA
               $uriSegments[2] == 'report_sea_process.php' ||
               $uriSegments[2] == 'report_sea_uncompleted.php' ||
               // CUSTOMER 
               $uriSegments[2] == 'report_sea_cust_siemens.php'
               ? 'active' : ''
            ?>">
    <a class="<?= // EXPORT | IMPORT
                  $uriSegments[2] == 'report_daily_export.php' || 
                  $uriSegments[2] == 'report_daily_import.php' || 
                  // AIR
                  $uriSegments[2] == 'report_air_process.php' || 
                  $uriSegments[2] == 'report_air_uncompleted.php' ||
                  // SEA
                  $uriSegments[2] == 'report_sea_process.php' ||
                  $uriSegments[2] == 'report_sea_uncompleted.php' ||
                  // CUSTOMER 
                  $uriSegments[2] == 'report_sea_cust_siemens.php'
                  ? 'active' : ''
              ?>" href="#"><i class="fa fa-folder-open fa-fw"></i> Report<span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level">
        <!-- DAILY REPORT -->
        <li class="<?= $uriSegments[2] == 'report_daily_export.php' ||  
                       $uriSegments[2] == 'report_daily_import.php'
                       ? 'active' : '' 
                   ?>">
            <a href="#" style="background-color: skyblue;color: white"><i class="fas fa-calendar-check"></i> Daily Report<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li class="<?= $uriSegments[2] == 'report_daily_export.php' ? 'show' : '' ?>">
                    <a href="report_daily_export.php?datenow=<?= date('Y-m-d');?>"><font style="font-weight: 600;">-</font> Daily Report - Export</a>
                </li>
                <li class="<?= $uriSegments[2] == 'report_daily_import.php' ? 'show' : '' ?>">
                    <a href="report_daily_import.php?datenow=<?= date('Y-m-d');?>"><font style="font-weight: 600;">-</font> Daily Report - Import</a>
                </li>
            </ul>
        </li>
        <!-- AIR -->
        <li class="<?= $uriSegments[2] == 'report_air_process.php' ||  
                       $uriSegments[2] == 'report_air_uncompleted.php'
                       ? 'active' : '' 
                   ?>">
            <a href="#" style="background-color: skyblue;color: white"><i class="fas fa-plane"></i> Air - Import Record<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li class="<?= $uriSegments[2] == 'report_air_process.php' ? 'show' : '' ?>">
                    <a href="report_air_process.php"><font style="font-weight: 600;">-</font> Report Process</a>
                </li>
                <li class="<?= $uriSegments[2] == 'report_air_uncompleted.php' ? 'show' : '' ?>">
                    <a href="report_air_uncompleted.php"><font style="font-weight: 600;">-</font> Uncompleted Record</a>
                </li>
            </ul>
        </li>
        <!-- SEA -->
        <li class="<?= $uriSegments[2] == 'report_sea_process.php' ||  
                       $uriSegments[2] == 'report_sea_uncompleted.php' ||
                       $uriSegments[2] == 'report_sea_cust_siemens.php' 
                       ? 'active' : '' 
                   ?>">
            <a href="#" style="background-color: skyblue;color: white"><i class="fas fa-ship"></i> Sea - Import Record<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li class="<?= $uriSegments[2] == 'report_sea_process.php' ? 'show' : '' ?>">
                    <a href="report_sea_process.php"><font style="font-weight: 600;">-</font> Report Process</a>
                </li>
                <li class="<?= $uriSegments[2] == 'report_sea_uncompleted.php' ? 'show' : '' ?>">
                    <a href="report_sea_uncompleted.php"><font style="font-weight: 600;">-</font> Uncompleted Record</a>
                </li>
                <!-- CUSTOMER -->
                <li class="<?= $uriSegments[2] == 'report_sea_cust_siemens.php'
                       ? 'active' : '' 
                   ?>">
                    <a href="#" style="background-color: #5bc0de;color: white"><i class="fas fa-sitemap"></i> Customer Report<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="<?= $uriSegments[2] == 'report_sea_cust_siemens.php' ? 'show' : '' ?>">
                            <a href="report_sea_cust_siemens.php">&nbsp;&nbsp;&nbsp;&nbsp; <font style="font-weight: 600;">-</font> Siemens</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</li>