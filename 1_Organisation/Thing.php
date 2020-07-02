<?php
require_once 'top_nav.php';
?>

	<div>
		<nav class="navbar-default navbar-side" role="navigation" >
			<div class="sidebar-collapse">
				<ul class="nav" id="main-menu">
					<li>
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
					<li class="active-link">
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
	<div id="page-wrapper" >
		<div id="page-inner">
			<div class="row">
				<div class="col-md-12">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" onclick="addThingInterface()">Add Thing</a>
						</li>
						<li class=""><a data-toggle="tab" onclick="addThingsInRoomInterface()">Add To Room</a>
						</li>
						<li class=""><a data-toggle="tab" onclick = "addThingsInBuildingInterface()">Add To Building</a>
						</li>
					</ul>
					<!--tab content start-->
					<div class="tab-content" id="tab-content">
								
					</div><!--tab content close-->
				</div> <!--/.col-->
			</div><!-- /. ROW  -->
			<hr />
		</div><!-- /. PAGE INNER  -->
	</div><!-- /. PAGE WRAPPER  -->
	
</div><!--/. wrapper -->
 

<script src="../lib_js/ajax.js"></script>
<script src="../lib_js/javascript.js"></script>
<script src="js/my_javascript.js"></script>
<script src="js/Thing.js"></script>
<script type="text/javascript">(function(){addThingInterface()();}());</script>

<?php
	require_once 'footer.php';
?>


