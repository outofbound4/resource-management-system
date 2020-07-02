<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Resource Management System</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!--data Table-->
    <link rel="stylesheet" href="../assets/datatable/DataTables-1.10.16/css/dataTables.bootstrap.min.css">
	<!--Ajax loader -->
	<link href="../assets/css/ajax.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <!--css for page-->
    <link href="css/myCustomPage.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
      
                <div class="row">
                <div class="col-md-12">
                  <?php
                   echo "<div class='card'>
                        <div class='card-header'>
                            <strong class='card-title'>Data Table</strong>
                        </div>
                        <div class='card-body'>
                          <table id='bootstrap-data-table' class='table table-striped table-bordered'>
                            <thead>
                              <tr class='danger'>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Salary</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr class='danger'>
                                <td>Tiger Nixon</td>
                                <td><button class='btn button-danger'>aaa</button></td>
                                <td>Edinburgh</td>
                                <td>$320,800</td>
                              </tr>
                              <tr>
                                <td>Garrett Winters</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>$170,750</td>
                              </tr>
                              <tr>
                                <td>Ashton Cox</td>
                                <td>Junior Technical Author</td>
                                <td>San Francisco</td>
                                <td>$86,000</td>
                              </tr>
                              <tr>
                                <td>Cedric Kelly</td>
                                <td>Senior Javascript Developer</td>
                                <td>Edinburgh</td>
                                <td>$433,060</td>
                              </tr>
                              <tr>
                                <td>Airi Satou</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>$162,700</td>
                              </tr>
                              <tr>
                                <td>Brielle Williamson</td>
                                <td>Integration Specialist</td>
                                <td>New York</td>
                                <td>$372,000</td>
                              </tr>
                              <tr>
                                <td>Herrod Chandler</td>
                                <td>Sales Assistant</td>
                                <td>San Francisco</td>
                                <td>$137,500</td>
                              </tr>
                              <tr>
                                <td>Rhona Davidson</td>
                                <td>Integration Specialist</td>
                                <td>Tokyo</td>
                                <td>$327,900</td>
                              </tr>
                              <tr>
                                <td>Colleen Hurst</td>
                                <td>Javascript Developer</td>
                                <td>San Francisco</td>
                                <td>$205,500</td>
                              </tr>
                              <tr>
                                <td>Sonya Frost</td>
                                <td>Software Engineer</td>
                                <td>Edinburgh</td>
                                <td>$103,600</td>
                              </tr>
                              <tr>
                                <td>Jena Gaines</td>
                                <td>Office Manager</td>
                                <td>London</td>
                                <td>$90,560</td>
                              </tr>
                              <tr>
                                <td>Quinn Flynn</td>
                                <td>Support Lead</td>
                                <td>Edinburgh</td>
                                <td>$342,000</td>
                              </tr>
                              <tr>
                                <td>Charde Marshall</td>
                                <td>Regional Director</td>
                                <td>San Francisco</td>
                                <td>$470,600</td>
                              </tr>
                              <tr>
                                <td>Donna Snider</td>
                                <td>Customer Support</td>
                                <td>New York</td>
                                <td>$112,000</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>
                <div class='row'>
                  <div class='col-md-12 text-center'>
                    <button class='btn btn-danger'>Print</button>
                  </div>";
                  ?>
                </div>


                </div>
            

<!--  Jquery Core Script -->
<script src="../assets/js/jquery-1.10.2.js"></script>
<!--  Core Bootstrap Script -->
<script src="../assets/js/bootstrap.min.js"></script>
<!--  Custom Scripts -->
<script src="../assets/js/custom.js"></script>
<!-- DataTables -->
<script src="../assets/datatable/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
<script src="../assets/datatable/DataTables-1.10.16/js/dataTables.bootstrap.min.js"></script>

 <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table').DataTable();
        } );
</script>
</body>
</html>
