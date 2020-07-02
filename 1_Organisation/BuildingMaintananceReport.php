<?php
require_once 'top_nav.php';

require_once('../config/FolderPath.php');
require_once root . '1_Organisation/classes/BuildingMaintananceDataClass.php';

$BuildingMaintananceData_object_array = BuildingMaintananceData::getAllBuildingMaintananceData();
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
					<li>
						<a href="Thing.php"><i class="fa fa-edit "></i>Thing Manage </a>
					</li>
					<li>
						<a href="guarden.php"><i class="fa fa-edit "></i>Guarden </a>
					</li>
					<li>
						<a href="Maintanance.php"><i class="fa fa-edit "></i>Maintanance </a>
					</li>
					<li class="active-link">
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
						<li><a href ='ThingMaintananceReport.php'>Thing Maintanance</a>
						</li>
						<li class="active"><a href ='BuildingMaintananceReport.php'>Building Maintanance</a>
						</li>
						<li><a href ='TotalThingsReport.php'>Total Things</a>
						</li>
						<li><a href='RoomThingsReport.php'>Room Things</a>
						</li>
						<li><a href='ThingsOutsideRoom.php'>Out Side Room Things</a>
						</li>
					</ul>
					<!--tab content start-->
					<div class="tab-content" id="tab-content">
						<div class="row">
                			<div class="col-md-12">
                				<?php
                					echo 	"<div class='card'>
                        						<div class='card-header'>
                            						<strong class='card-title'>&nbsp</strong>
                        						</div>
                        						<div class='card-body'>
                          							<table id='bootstrap-data-table' class='table table-striped table-bordered'>
	                          							<thead>
							                              <tr class='danger'>
							                                <th>ID</th>
							                                <th>Thing Name</th>
							                                <th>Repair Name</th>
							                                <th>Cost in Rs.</th>
							                              </tr>
							                            </thead>
							                            <tbody>";

	                          								foreach ($BuildingMaintananceData_object_array as $BuildingMaintananceData_object)
	                          								{
	                          									echo "<tr>
										                                <th>".$BuildingMaintananceData_object->ID."</th>
										                                <th>".$BuildingMaintananceData_object->BuildingData_object->NAME."</th>
										                                <th>".$BuildingMaintananceData_object->NAME."</th>
										                                <th>".$BuildingMaintananceData_object->COST."</th>
										                              </tr>";
	                          								}
	                          			
	                          		echo				"</tbody>
                          							</table>
                          						</div>
                          					</div>";
                				?>
                			</div>
                		</div>
                		<div class='row text-center'>
                			<form method='post' action='PDFReport/BuildingMaintananceReportGenerate.php'>
	                			<button class='btn btn-success'><span class='fa fa-download'></span>&nbsp Generate</button>
	                		</form>
                		</div>
					</div><!--tab content close-->
				</div> <!--/.col-->
			</div><!-- /. ROW  -->
			<hr />
		</div><!-- /. PAGE INNER  -->
	</div><!-- /. PAGE WRAPPER  -->
	
</div><!--/. wrapper -->

<script src="../lib_js/ajax.js"></script>
<?php
	require_once 'footer.php';
?>
<!-- DataTables -->
<script src="../assets/datatable/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
<script src="../assets/datatable/DataTables-1.10.16/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">

 	$(document).ready(function() {
        $('#bootstrap-data-table').DataTable();
    } );

</script>