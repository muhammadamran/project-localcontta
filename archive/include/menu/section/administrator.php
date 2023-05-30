<li class="section">
    <div>
        ADMINISTRATION SECTION
    </div>
</li>
<li class="<?= $uriSegments[2] == 'iou_adm_user.php' ||
                $uriSegments[2] == 'iou_adm_freight.php' ||
                $uriSegments[2] == 'iou_adm_cnee.php' ||
                $uriSegments[2] == 'iou_adm_shipper.php' ||
                $uriSegments[2] == 'iou_adm_trucker.php' ||
                $uriSegments[2] == 'iou_adm_docs.php' ||
                $uriSegments[2] == 'iou_adm_rate.php' ||
                $uriSegments[2] == 'iou_adm_record.php' ||
                $uriSegments[2] == 'iou_adm_remarks_im_prec.php' ||
                $uriSegments[2] == 'iou_adm_remarks_im_clea.php' ||
                $uriSegments[2] == 'iou_adm_remarks_im_post.php' ||
                $uriSegments[2] == 'iou_adm_remarks_im_file.php' ||
                $uriSegments[2] == 'iou_adm_remarks_ex_prec.php' ||
                $uriSegments[2] == 'iou_adm_remarks_ex_clea.php' ||
                $uriSegments[2] == 'iou_adm_remarks_ex_post.php' ||
                $uriSegments[2] == 'iou_adm_remarks_ex_file.php'
                ? 'active' : ''
            ?>">
    <a class="<?= $uriSegments[2] == 'iou_adm_user.php' ||
                    $uriSegments[2] == 'iou_adm_freight.php' ||
                    $uriSegments[2] == 'iou_adm_cnee.php' ||
                    $uriSegments[2] == 'iou_adm_shipper.php' ||
                    $uriSegments[2] == 'iou_adm_trucker.php' ||
                    $uriSegments[2] == 'iou_adm_docs.php' ||
                    $uriSegments[2] == 'iou_adm_rate.php' ||
                    $uriSegments[2] == 'iou_adm_record.php' ||
                    $uriSegments[2] == 'iou_adm_remarks_im_prec.php' ||
                    $uriSegments[2] == 'iou_adm_remarks_im_clea.php' ||
                    $uriSegments[2] == 'iou_adm_remarks_im_post.php' ||
                    $uriSegments[2] == 'iou_adm_remarks_im_file.php' ||
                    $uriSegments[2] == 'iou_adm_remarks_ex_prec.php' ||
                    $uriSegments[2] == 'iou_adm_remarks_ex_clea.php' ||
                    $uriSegments[2] == 'iou_adm_remarks_ex_post.php' ||
                    $uriSegments[2] == 'iou_adm_remarks_ex_file.php'
                    ? 'active' : ''
                ?>" href="#"><i class="fa fa-atlas fa-fw"></i> Administration<span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level">
        <li class="<?= $uriSegments[2] == 'iou_adm_user.php' ? 'show' : '' ?>">
            <a href="iou_adm_user.php"><i class="fas fa-caret-right" aria-hidden="true"></i> Management Users</a>
        </li>
        <li class="<?= $uriSegments[2] == 'iou_adm_freight.php' ? 'show' : '' ?>">
            <a href="iou_adm_freight.php"><i class="fas fa-caret-right" aria-hidden="true"></i> Upload Freight</a>
        </li>
        <li class="<?= $uriSegments[2] == 'iou_adm_cnee.php' ? 'show' : '' ?>">
            <a href="iou_adm_cnee.php"><i class="fas fa-caret-right" aria-hidden="true"></i> Consignee</a>
        </li>
        <li class="<?= $uriSegments[2] == 'iou_adm_shipper.php' ? 'show' : '' ?>">
            <a href="iou_adm_shipper.php"><i class="fas fa-caret-right" aria-hidden="true"></i> Shipper</a>
        </li>
        <li class="<?= $uriSegments[2] == 'iou_adm_trucker.php' ? 'show' : '' ?>">
            <a href="iou_adm_trucker.php"><i class="fas fa-caret-right" aria-hidden="true"></i> Trucker</a>
        </li>
        <li class="<?= $uriSegments[2] == 'iou_adm_docs.php' ? 'show' : '' ?>">
            <a href="iou_adm_docs.php"><i class="fas fa-caret-right" aria-hidden="true"></i> Document Type</a>
        </li>
        <li class="<?= $uriSegments[2] == 'iou_adm_rate.php' ? 'show' : '' ?>">
            <a href="iou_adm_rate.php"><i class="fas fa-caret-right" aria-hidden="true"></i> Pricing/Rate</a>
        </li>
        <!-- <li class="<?= $uriSegments[2] == 'iou_adm_remarks_im.php' ? 'show' : '' ?>">
            <a href="iou_adm_remarks_im.php"><i class="fas fa-caret-right" aria-hidden="true"></i> Set Remarks</a>
        </li> -->
        <!-- REMARKS EXPORT -->
        <li class="<?= $uriSegments[2] == 'iou_adm_remarks_ex_prec.php' ||
                        $uriSegments[2] == 'iou_adm_remarks_ex_clea.php' ||
                        $uriSegments[2] == 'iou_adm_remarks_ex_post.php' ||
                        $uriSegments[2] == 'iou_adm_remarks_ex_file.php'
                        ? 'active' : ''
                    ?>">
            <a href="#" style="background-color: skyblue;color: white"><i class="fas fa-folder-plus"></i> Set Remarks Export<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li class="<?= $uriSegments[2] == 'iou_adm_remarks_ex_prec.php' ? 'show' : '' ?>">
                    <a href="iou_adm_remarks_ex_prec.php">
                        <font style="font-weight: 600;">-</font> Re. Pre-Clearance
                    </a>
                </li>
                <li class="<?= $uriSegments[2] == 'iou_adm_remarks_ex_clea.php' ? 'show' : '' ?>">
                    <a href="iou_adm_remarks_ex_clea.php">
                        <font style="font-weight: 600;">-</font> Re. Clearance
                    </a>
                </li>
                <li class="<?= $uriSegments[2] == 'iou_adm_remarks_ex_post.php' ? 'show' : '' ?>">
                    <a href="iou_adm_remarks_ex_post.php">
                        <font style="font-weight: 600;">-</font> Re. Post-Clearance
                    </a>
                </li>
                <li class="<?= $uriSegments[2] == 'iou_adm_remarks_ex_file.php' ? 'show' : '' ?>">
                    <a href="iou_adm_remarks_ex_file.php">
                        <font style="font-weight: 600;">-</font> Re. E-File
                    </a>
                </li>
            </ul>
        </li>
        <!-- REMARKS IMPORT -->
        <li class="<?= $uriSegments[2] == 'iou_adm_remarks_im_prec.php' ||
                        $uriSegments[2] == 'iou_adm_remarks_im_clea.php' ||
                        $uriSegments[2] == 'iou_adm_remarks_im_post.php' ||
                        $uriSegments[2] == 'iou_adm_remarks_im_file.php'
                        ? 'active' : ''
                    ?>">
            <a href="#" style="background-color: skyblue;color: white"><i class="fas fa-folder-plus"></i> Set Remarks Import<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li class="<?= $uriSegments[2] == 'iou_adm_remarks_im_prec.php' ? 'show' : '' ?>">
                    <a href="iou_adm_remarks_im_prec.php">
                        <font style="font-weight: 600;">-</font> Re. Pre-Clearance
                    </a>
                </li>
                <li class="<?= $uriSegments[2] == 'iou_adm_remarks_im_clea.php' ? 'show' : '' ?>">
                    <a href="iou_adm_remarks_im_clea.php">
                        <font style="font-weight: 600;">-</font> Re. Clearance
                    </a>
                </li>
                <li class="<?= $uriSegments[2] == 'iou_adm_remarks_im_post.php' ? 'show' : '' ?>">
                    <a href="iou_adm_remarks_im_post.php">
                        <font style="font-weight: 600;">-</font> Re. Post-Clearance
                    </a>
                </li>
                <li class="<?= $uriSegments[2] == 'iou_adm_remarks_im_file.php' ? 'show' : '' ?>">
                    <a href="iou_adm_remarks_im_file.php">
                        <font style="font-weight: 600;">-</font> Re. E-File
                    </a>
                </li>
            </ul>
        </li>
    </ul>

<li class="<?= $uriSegments[2] == 'iou_adm_record_export.php' ||
                $uriSegments[2] == 'iou_adm_record_import.php'
                ? 'active' : ''
            ?>">
    <a class="<?= $uriSegments[2] == 'iou_adm_record_export.php' ||
                    $uriSegments[2] == 'iou_adm_record_import.php'
                    ? 'active' : ''
                ?>" href="#"><i class="fas fa-tasks"></i> Record Management<span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level">
        <li class="<?= $uriSegments[2] == 'iou_adm_record_export.php' ? 'show' : '' ?>">
            <a href="iou_adm_record_export.php"><i class="fas fa-caret-right" aria-hidden="true"></i> Export</a>
        </li>
        <li class="<?= $uriSegments[2] == 'iou_adm_record_import.php' ? 'show' : '' ?>">
            <a href="iou_adm_record_import.php"><i class="fas fa-caret-right" aria-hidden="true"></i> Import</a>
        </li>
    </ul>
</li>