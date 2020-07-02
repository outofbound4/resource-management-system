<?php
require_once 'top_nav.php';
if(isset($_REQUEST['tabNo']))
{
	$tabNo = $_REQUEST['tabNo'];
}
else
	$tabNo = 0;

?>
</style>
	<div>
		<nav class='navbar-default navbar-side' role='navigation' >
			<div class='sidebar-collapse'>
				<ul class='nav' id='main-menu'>
					<li>
						<a href='home.php'><i class='fa fa-home fa-fw'></i>Home</a>
					</li>
					<li class='active-link'>
						<a href='Organisation_structure.php'><i class='fa fa-edit '></i>Organisation Structure </a>
					</li>
					<li>
						<a href='Class.php'><i class="fa fa-edit "></i>Class</a>
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
						<a href="Maintanance.php"><i class="fa fa-edit "></i>Maintanance </a>
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
	</div>
	<!-- Contenet start-->
	<div id='page-wrapper' >
		<div id='page-inner'>
			<div class='row'>
				<div class='col-md-12'>
					<ul class='nav nav-tabs'>
					<?php
						switch($tabNo)
						{
							case 2: ?>	<li class=''><a data-toggle='tab' onclick="addOrganisationInterface()">Organisation</a>
										</li>
										<li class='active'><a data-toggle='tab' onclick="addBuildingInterface()">Add Building</a>
										</li>
										<li class=''><a data-toggle='tab' onclick="addRoomInterface()">Add Room</a>
										</li>
										<li class=''><a data-toggle='tab' onclick="addRoomCapacityInterface()">Room Capacity</a>
										</li>
										<li class=''><a data-toggle='tab' onclick="addOrganisationPhoneInterface()">Add Phone</a>
										</li>
										<li class=''><a data-toggle='tab' onclick="addOrganisationEmailInterface()">Add Email</a>
										</li>
					<?php break;
							case 3: ?>	<li class=''><a data-toggle='tab' onclick="addOrganisationInterface()">Organisation</a>
										</li>
										<li class=''><a data-toggle='tab' onclick="addBuildingInterface()">Add Building</a>
										</li>
										<li class='active'><a data-toggle='tab' onclick="addRoomInterface()">Add Room</a>
										</li>
										<li class=''><a data-toggle='tab' onclick="addRoomCapacityInterface()">Room Capacity</a>
										</li>
										<li class=''><a data-toggle='tab' onclick="addOrganisationPhoneInterface()">Add Phone</a>
										</li>
										<li class=''><a data-toggle='tab' onclick="addOrganisationEmailInterface()">Add Email</a>
										</li>
					<?php break;
						   default: ?>  <li class='active'><a data-toggle='tab' onclick="addOrganisationInterface()">Organisation</a>
										</li>
										<li class=''><a data-toggle='tab' onclick="addBuildingInterface()">Add Building</a>
										</li>
										<li class=''><a data-toggle='tab' onclick="addRoomInterface()">Add Room</a>
										</li>
										<li class=''><a data-toggle='tab' onclick="addRoomCapacityInterface()">Room Capacity</a>
										</li>
										<li class=''><a data-toggle='tab' onclick="addOrganisationPhoneInterface()">Add Phone</a>
										</li>
										<li class=''><a data-toggle='tab' onclick="addOrganisationEmailInterface()">Add Email</a>
										</li>
					<?php }?>
					</ul>
					<div class='tab-content' id ='tab-content'>
					
					</div> <!--/.col-->
					
				</div>              
				<hr />
			</div><!-- /. ROW  -->
		</div><!-- /. PAGE INNER  -->
	</div><!-- /. PAGE WRAPPER  -->
	<!--/ . wrapper -->
<!--functions javaScript -->
<script src='../lib_js/ajax.js'></script>
<script src='../lib_js/javascript.js'></script>
<script src='js/my_javascript.js'></script>
<script src='js/organisation_structure.js'></script>
<?php
	switch($tabNo)
	{
		case 	2: ?><script type="text/javascript">(function(){addBuildingInterface();}());</script><?php break;
		case 	3: ?><script type="text/javascript">(function(){addRoomInterface();}());</script><?php break;
		default  : ?><script type="text/javascript">(function(){addOrganisationInterface();}());</script><?php
	}

	require_once 'footer.php';
?>