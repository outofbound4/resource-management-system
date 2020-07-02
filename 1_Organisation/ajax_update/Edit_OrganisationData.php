
<html>
	<head>
		<title></title>
	</head>
<body>

	<div class='text-center'>
		<form class='form-horizontal col-md-offset-1' id='gui'>
			<div class='form-group col-md-11'>
				<label for='nameOrg'>Name :</label>
				<input type='text' class='form-control col-md-8' id='nameOrg' placeholder='Org Name here' name='name' value =<?php $Organisation_object->NAME ?> selected>
			</div>
			<div class='form-group col-md-11'>
				<label for='address'>Address :</label>
				<input type='text' class='form-control' id='address' placeholder='Enter Address here' name='address' value=<?php $Organisation_object->ADDRESS ?> selected>
			</div>
			<div class='form-group col-md-11'>
				<label for='land'>Land :</label>
				<input type='number' class='form-control' id='land' placeholder='Enter Land here' name='land' value = <?php $Organisation_object->LAND ?> selected>
			</div>
			<div class='form-group text-center col-md-11'>
				<button type='button' class='btn btn-success' onclick="EditOrganisationData('gui');" value='add'>Add</button>
				&nbsp
				<button type='reset' class='btn btn-default' value='reset'>Reset</button>
			</div>
		</form>
	</div>
</body>

</html>
