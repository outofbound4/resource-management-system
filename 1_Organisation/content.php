<?php
require_once('../config/FolderPath.php');
require_once root.'1_Organisation/package/Session.php';
require_once root . '1_Organisation/classes/HomePageDataClass.php';

$HomePageData_object = HomePageData::getHomePageData();

$session = new SessionManager();
if(!$session->checkVariable('userid'))
{
    echo "Unauthorised used.....Login first..!!";
    exit();
}
?>

<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
            	<div class="alert alert-success text-center">
				 	<h2><strong>Welcome to Resource Management System</strong></h2>
				</div>
            	 <div class="alert alert-success text-center">
				 	<h5><strong>Summary of the month of <?php echo date('M Y'); ?></strong></h5>
				</div>
				<div>
					<table class='table table-striped table-bordered table-hover'>
						<tr class='info'>
							<td>Total Things comes this Month : </td>
							<td><?php echo trim($HomePageData_object->ThingsThisMonth); ?></td>
						</tr>
					</table>
				</div>
				<div class="alert alert-success text-center">
				 	<h4><strong>Total Summary</strong></h4>
				</div>
				<div>
					<table class='table table-striped table-bordered table-hover'>
						<tr class='info'>
							<td>Total Things : </td>
							<td> <?php echo $HomePageData_object->TotalThings; ?></td>
						</tr>
						<tr class='warning'>
							<td>Total Distributed Things : </td>
							<td><?php echo $HomePageData_object->TotalDistributedThing; ?></td>
						</tr>
						<tr class='danger'>
							<td>Total Undistributed Things : </td>
							<td><?php echo $HomePageData_object->TotalUndistributedThing; ?></td>
						</tr>
						<tr class='success'>
							<td>Total Building : </td>
							<td> <?php echo sizeof($HomePageData_object->BuildingData_object_array); ?></td>
						</tr>
						<?php
							$row_class = array("success", "info", "warning", "danger");
							$rcl = count($row_class);
							$rci=0;
							foreach ($HomePageData_object->BuildingData_object_array as $BuildingData_object) 
							{
								if($rcl==$rci)$rci=0;
								$noOfRooms_inBuilding = RoomData::getRoomCountByBuildingId($BuildingData_object->ID)->noOfRooms;
						?>
								<tr class='<?php echo $row_class[$rci++]; ?>'>
									<td>No. Of Rooms In <?php echo $BuildingData_object->NAME; ?> : </td>
									<td> <?php echo $noOfRooms_inBuilding; ?></td>
								</tr>
						<?php
							}
						?>
					</table>
				</div>
            </div> <!--/.col-->
        </div><!-- /. ROW  -->
        <hr />
    </div><!-- /. PAGE INNER  -->
</div><!-- /. PAGE WRAPPER  -->

</div><!-- /. Wrapper -->