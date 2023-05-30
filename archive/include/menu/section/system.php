<li class="section">
    <div>
        SYSTEM SECTION
    </div>
</li>
<li class="<?= $uriSegments[2] == 'sys_help.php' ? 'active' : '' ?>">
    <a class="<?= $uriSegments[2] == 'sys_help.php' ? 'active' : '' ?>" href="#"><i class="fa fa-question-circle"></i> Help!<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li class="<?= $uriSegments[2] == 'sys_help.php' ? 'show' : '' ?>">
            <a href="sys_help.php"><i class="fas fa-caret-right" aria-hidden="true"></i> FAQ?</a>
        </li>
    </ul>
</li>