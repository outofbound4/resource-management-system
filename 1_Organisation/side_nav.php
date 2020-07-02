<?php
$root = $_SERVER['DOCUMENT_ROOT'] . '/ResourceManagementSystem/';
require_once $root.'1_Organisation/package/Session.php';
$session = new SessionManager();
if(!$session->checkVariable('userid'))
{
    echo "Unauthorised used.....Login first..!!";
    exit();
}
?>
<nav class="navbar-default navbar-side" role="navigation" id='sidenave'>
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="active-link">
                <a href="home.php"><i class="fa fa-home fa-fw"></i>Home</a>
            </li>
            <li>
                <a href="Organisation_structure.php"><i class="fa fa-edit "></i>Organisation Structure </a>
            </li>
			<li>
                <a href="Class.php"><i class="fa fa-edit "></i>Class</a>
            </li>
            <li>
                <a href="Department.php"><i class="fa fa-edit "></i>Department</a>
            </li>
            <li>
                <a href="Thing.php"><i class="fa fa-edit "></i>Thing Manage </a>
            </li>
            <li>
                <a href="guarden.php"><i class="fa fa-edit "></i>Guarden </a>
            </li>
             <li>
                <a href="Maintanance.php"><i class="fa fa-edit "></i>Maintainance </a>
            </li>
            <li>
                <a href="ThingMaintananceReport.php"><i class="fa fa-edit "></i>Report </a>
            </li>
            <li>
                <a href="About.php"><i class="fa fa-edit "></i>About </a>
            </li>
        </ul>
	</div>
</nav>
<!-- /. NAV SIDE  -->
