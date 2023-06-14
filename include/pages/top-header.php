<div class="header">
    <div class="header-left">
        <div class="menu-icon dw dw-menu"></div>
        <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
        <div class="header-search">
            <div class="vl-and-font">
                <div class="vl"></div>
                <div class="j-font">
                    <div class="apps-company">
                        <div>
                            <font class="font-apps">Localcontta</font>
                        </div>
                        <div style="margin-top: -5px;">
                            <font class="font-company">PT. Kuehne Nagel Indonesia</font>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-right">
        <!-- Clock -->
        <div class="dashboard-setting user-notification" style="margin-top: -10px;display: flex;align-items: center;">
            <i class="icon-copy dw dw-wall-clock1" style="font-size: 20px;"></i>
            <div style="margin-left: 5px;font-size: 14px;" id="ct"></div>
        </div>
        <!-- Branches -->
        <div class="dashboard-setting user-notification" style="margin-top: -10px;display: flex;align-items: center;">
            <i class="icon-copy dw dw-pin" style="font-size: 22px;"></i>
            <div style="margin-left: 5px;font-size: 14px;">Branches: <?= $_SESSION['BRANCHES']; ?></div>
        </div>
        <!-- End Clock -->
        <div class="user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                    <i class="icon-copy dw dw-notification"></i>
                    <span class="badge notification-active"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="notification-list mx-h-350 customscroll">
                        <ul>
                            <li>
                                <div>
                                    <img src="assets/app/svg/no-data.svg" alt="No Data">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-setting user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                    <i class="dw dw-settings2"></i>
                </a>
            </div>
        </div>
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <!-- <span class="user-icon"> -->
                    <!-- <img src="assets/vendors/images/photo1.jpg" alt=""> -->
                    <!-- </span> -->
                    <div class="header-profiles">
                        <?php
                        $FName = substr($_SESSION['FIRST_NAME'], 0, 1);
                        $LName = substr($_SESSION['LAST_NAME'], 0, 1);
                        ?>
                        <font style="text-transform: uppercase;"><?= $FName ?><?= $LName ?></font>
                    </div>
                    <!-- <span class="user-name"><?= $_SESSION['FIRST_NAME'] ?></span> -->
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
                    <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
                    <a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a>
                    <a class="dropdown-item" href="logout.php"><i class="dw dw-logout"></i> Log Out</a>
                </div>
            </div>
        </div>
    </div>
</div>