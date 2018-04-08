<?php
include("DB.php");
 ?>
 <?php if (!empty($_GET))
  var_dump($_GET);

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>jQuery Datatable example</title>

    <!-- <link href="css/bootstrap.min.css" rel="stylesheet" /> -->
    <!-- <link href="css/bootstrap-datepicker.min.css" rel="stylesheet" /> -->
    <!-- <link href="css/jquery.dataTables.min.css" rel="stylesheet" /> -->
    <!-- <link href="css/font-awesome.min.css" rel="stylesheet" /> -->

    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>

    <script src="js/rangeSearch.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/plugin.js"></script>

</head>
<script>



</script>
<body>
  <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div>
      <input type="text" name="test"/>
      <button>submit</button>
    </div>
  </form>

    <div class="container filter">

        <div class="page-header">
            <h2 class="text-center">jQuery DataTable example</h2>
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="checkbox">
                                    <input class="checkbox" id="showDeletedData" name="searchby-column" type="checkbox">
                                    <label for="column-name"><span></span>Show deleted Data</label>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">

                    </div>
                    <div class="row">
                      <div class="form-group">
                       <label for="sel1">Select list:</label>
                       <select class="form-control" id="selGender">
                         <option id="all">ALL</option>
                         <option id="male">M</option>
                         <option id="female">F</option>
                       </select>
                      </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="page-header">
                    <h4>Filter using 2 dates</h4>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Start Date Input Field</label>
                        <div class="input-group date">
                            <input type="text" class="form-control" placeholder="Select a start date" id="start-date"><span class="input-group-addon"><i class="icon-calendar"></i></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">End Date Input Field</label>
                        <div class="input-group date">
                            <input type="text" class="form-control" placeholder="Select a end date" id="end-date"><span class="input-group-addon"><i class="icon-calendar"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <br />
            <div class="row">

                <div class="col-lg-12">
                  <form  method="post">
                    <button type='submit' name='update' value='update' formAction='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>'>Update</button>

                    <table id="example" class="table table-sripted display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Check</th>
                                <th id="col_emp_no">Emp No</th>
                                <th id="col_birth_date">Birth Date</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th id="col_gender">Gender</th>
                                <th id="col_hire">Hire Date</th>
                            </tr>
                            <tr>
                                <th><input type="checkbox" class="check" value="1"/></th>
                                <th><input id="emp_no" type="text" value="" /></th>
                                <th><input id="birth_date" value="" /></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>


                        <tbody id="tbody">
                          <?php
                          $DB = new DB();
                          $arr = $DB->getEmployees();
                          foreach($arr as $r){ ?>
                            <tr>
                              <td><input type="checkbox"  name="<?= $r[0] ?>" class="check" value="1"/></td>
                              <td><?= $r[0] ?></td>
                              <td><?= $r[1] ?></td>
                              <td><?= $r[2] ?></td>
                              <td><?= $r[3] ?></td>
                              <td><?= $r[4] ?></td>
                              <td><?= $r[5] ?></td>
                            </tr>
                          <?php
                            }
                           ?>
                        </tbody>
                        <button type="submit">Submit</button>
                    </table>
                  </form>
                </div>
            </div>
        </div>

    </div>

</body>
</html>
