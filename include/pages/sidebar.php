<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html" style="display: flex;justify-content: center;">
            <div>
                <img src="assets/app/logo/logo-blue.png" alt="" class="dark-logo">
                <img src="assets/app/logo/logo-white.png" alt="" class="light-logo">
            </div>
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class=" sidebar-menu">
            <ul id="accordion-menu">
                <li class="list-title">
                    <!--                                              GENERAL SECTION                                                       -->
                    <div class="sidebar-small-cap">GENERAL SECTION</div>
                </li>
                <!-- Dashboard -->
                <li>
                    <a href="index.php" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-analytics-4" id="icon-sidebar"></span><span class="mtext">Dashboard</span>
                    </a>
                </li>
                <!-- Search -->
                <li>
                    <a href="index.php?m=general-section&s=search" class="dropdown-toggle no-arrow <?= !empty($_GET['s']) && $_GET['s'] == 'search' ? 'active' : '' ?>">
                        <span class="micon dw dw-search" id="icon-sidebar"></span><span class="mtext">Search</span>
                    </a>
                </li>
                <!--                                              APPLICATION SECTION                                                       -->
                <li class="list-title">
                    <div class="sidebar-small-cap">APPLICATION SECTION</div>
                </li>
                <!-- Export -->
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon icon-copy ti-upload" id="icon-sidebar"></span><span class="mtext">Export</span>
                    </a>
                    <ul class="submenu">
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon icon-copy dw dw-flight-1"></span><span class="mtext">Airfreight</span>
                            </a>
                            <ul class="submenu child">
                                <li><a href="javascript:;">Export Master Airfreight</a></li>
                                <li><a href="javascript:;">1) Custom Arrangement</a></li>
                                <li><a href="javascript:;">2) Ship. Monitoring</a></li>
                                <li><a href="javascript:;">*) E-File</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon icon-copy dw dw-ship"></span><span class="mtext">Seafreight</span>
                            </a>
                            <ul class="submenu child">
                                <li><a href="javascript:;">Export Master Seafreight</a></li>
                                <li><a href="javascript:;">1) Custom Arrangement</a></li>
                                <li><a href="javascript:;">2) Ship. Monitoring</a></li>
                                <li><a href="javascript:;">3) COO Management</a></li>
                                <li><a href="javascript:;">4) Billing</a></li>
                                <li><a href="javascript:;">5) Set Trucker</a></li>
                                <li><a href="javascript:;">*) E-File</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- Import -->
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon icon-copy ti-download" id="icon-sidebar"></span><span class="mtext">Import</span>
                    </a>
                    <ul class="submenu">
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon icon-copy dw dw-flight-1"></span><span class="mtext">Airfreight</span>
                            </a>
                            <ul class="submenu child">
                                <li><a href="javascript:;">Import Master Airfreight</a></li>
                                <li><a href="javascript:;">1) Pre-Clearance</a></li>
                                <li><a href="javascript:;">2) Clearance</a></li>
                                <li><a href="javascript:;">3) Post-Clearance</a></li>
                                <li><a href="javascript:;">4) Set Trucking</a></li>
                                <li><a href="javascript:;">*) Cost Sheet</a></li>
                                <li><a href="javascript:;">*) E-File</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon icon-copy dw dw-ship"></span><span class="mtext">Seafreight</span>
                            </a>
                            <ul class="submenu child">
                                <li><a href="javascript:;">Import Master Seafreight</a></li>
                                <li><a href="javascript:;">1) Pre-Clearance</a></li>
                                <li><a href="javascript:;">2) Clearance</a></li>
                                <li><a href="javascript:;">3) Post-Clearance</a></li>
                                <li><a href="javascript:;">4) Set Trucking</a></li>
                                <li><a href="javascript:;">*) Cost Sheet</a></li>
                                <li><a href="javascript:;">*) E-File</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- Truck Monitoring -->
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon icon-copy dw dw-delivery-truck-2" id="icon-sidebar"></span><span class="mtext">Truck Monitoring</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="basic-table.html">Confirm Job</a></li>
                        <li><a href="datatable.html">Job List</a></li>
                    </ul>
                </li>
                <!--                                              REPORT SECTION                                                       -->
                <li class="list-title">
                    <div class="sidebar-small-cap">REPORT SECTION</div>
                </li>
                <!-- Report -->
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon icon-copy dw dw-file-85" id="icon-sidebar"></span><span class="mtext">Report</span>
                    </a>
                    <ul class="submenu">
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon icon-copy dw dw-calendar-6"></span><span class="mtext">Daily Report</span>
                            </a>
                            <ul class="submenu child">
                                <li><a href="javascript:;">Export</a></li>
                                <li><a href="javascript:;">Import</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon icon-copy dw dw-flight-1"></span><span class="mtext">Airfreight</span>
                            </a>
                            <ul class="submenu child">
                                <li><a href="javascript:;">Process</a></li>
                                <li><a href="javascript:;">Uncompleted Record</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon icon-copy dw dw-ship"></span><span class="mtext">Seafreight</span>
                            </a>
                            <ul class="submenu child">
                                <li><a href="javascript:;">Process</a></li>
                                <li><a href="javascript:;">Uncompleted Record</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon icon-copy dw dw-file-58"></span><span class="mtext">Customers Report</span>
                            </a>
                            <ul class="submenu child">
                                <li><a href="javascript:;">Siemens</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!--                                              ADMINISTRATION SECTION                                                       -->
                <li class="list-title">
                    <div class="sidebar-small-cap">ADMINISTRATION SECTION</div>
                </li>
                <!-- Management Users -->
                <li>
                    <a href="calendar.html" class="dropdown-toggle no-arrow">
                        <span class="micon icon-copy dw dw-user-11" id="icon-sidebar"></span><span class="mtext">Management Users</span>
                    </a>
                </li>
                <!-- Upload Freight -->
                <li>
                    <a href="calendar.html" class="dropdown-toggle no-arrow">
                        <span class="micon icon-copy dw dw-file-55" id="icon-sidebar"></span><span class="mtext">Upload Freight</span>
                    </a>
                </li>
                <!-- Consignee -->
                <li>
                    <a href="calendar.html" class="dropdown-toggle no-arrow">
                        <span class="micon icon-copy dw dw-file-64" id="icon-sidebar"></span><span class="mtext">Consignee</span>
                    </a>
                </li>
                <!-- Shipper -->
                <li>
                    <a href="calendar.html" class="dropdown-toggle no-arrow">
                        <span class="micon icon-copy dw dw-file-57" id="icon-sidebar"></span><span class="mtext">Shipper</span>
                    </a>
                </li>
                <!-- Truck -->
                <li>
                    <a href="calendar.html" class="dropdown-toggle no-arrow">
                        <span class="micon icon-copy dw dw-delivery-truck-1" id="icon-sidebar"></span><span class="mtext">Truck</span>
                    </a>
                </li>
                <!-- Document Type -->
                <li>
                    <a href="calendar.html" class="dropdown-toggle no-arrow">
                        <span class="micon icon-copy dw dw-file-134" id="icon-sidebar"></span><span class="mtext">Document Type</span>
                    </a>
                </li>
                <!-- Pricing Rate -->
                <li>
                    <a href="calendar.html" class="dropdown-toggle no-arrow">
                        <span class="micon icon-copy dw dw-file-34" id="icon-sidebar"></span><span class="mtext">Pricing/Rate</span>
                    </a>
                </li>
                <!-- Record Management -->
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon icon-copy dw dw-file-46" id="icon-sidebar"></span><span class="mtext">Record Management </span>
                    </a>
                    <ul class="submenu">
                        <li><a href="ui-cards.html">Export</a></li>
                        <li><a href="ui-cards.html">Import</a></li>
                    </ul>
                </li>
                <!-- Company -->
                <li>
                    <a href="calendar.html" class="dropdown-toggle no-arrow">
                        <span class="micon icon-copy fa fa-cog" id="icon-sidebar"></span><span class="mtext">Company</span>
                    </a>
                </li>
                <!--                                              REMARK SECTION                                                       -->
                <li class="list-title">
                    <div class="sidebar-small-cap">REMARK SECTION</div>
                </li>
                <!-- Remark Export -->
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon icon-copy dw dw-add-file-1" id="icon-sidebar"></span><span class="mtext">Remark Export </span>
                    </a>
                    <ul class="submenu">
                        <li><a href="ui-buttons.html">Pre-Clearance</a></li>
                        <li><a href="ui-cards.html">Clearance</a></li>
                        <li><a href="ui-cards-hover.html">Post-Clearance</a></li>
                        <li><a href="ui-modals.html">E-File</a></li>
                    </ul>
                </li>
                <!-- Remark Import -->
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon icon-copy dw dw-add-file-2" id="icon-sidebar"></span><span class="mtext">Remark Import </span>
                    </a>
                    <ul class="submenu">
                        <li><a href="ui-buttons.html">Pre-Clearance</a></li>
                        <li><a href="ui-cards.html">Clearance</a></li>
                        <li><a href="ui-cards-hover.html">Post-Clearance</a></li>
                        <li><a href="ui-modals.html">E-File</a></li>
                    </ul>
                </li>
                <!--                                              SYSTEM SECTION                                                       -->
                <li class="list-title">
                    <div class="sidebar-small-cap">SYSTEM SECTION</div>
                </li>
                <!-- FAQ -->
                <li>
                    <a href="calendar.html" class="dropdown-toggle no-arrow">
                        <span class="micon icon-copy dw dw-question" id="icon-sidebar"></span><span class="mtext">FAQ</span>
                    </a>
                </li>
                <!-- Raise Ticket -->
                <li>
                    <a href="calendar.html" class="dropdown-toggle no-arrow">
                        <span class="micon icon-copy fa fa-support" id="icon-sidebar"></span><span class="mtext">Raise Ticket</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>