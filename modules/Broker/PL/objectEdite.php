<?php

///////////////////////////////////////////////////////////////
/// start of ---> getting Object details
///////////////////////////////////////////////////////////////
$objectEditeId = $_GET['objectEditeId'];
$tableName = $_GET['tableName'];
// $_SESSION['tableName'] = $tableName;
// $tableName =$_SESSION['tableName'];

// getting colomn count
$sql_get_col_count = "SELECT count(*) FROM information_schema.`COLUMNS` c WHERE TABLE_NAME = '{$tableName}'";
$get_col_count = $database->query($sql_get_col_count);

while ($row = $get_col_count->fetch_array())
{
    $col_count = (int)$row[0];
}

// getting colomn Names
$sql_get_col_name = "SELECT COLUMN_NAME FROM information_schema.`COLUMNS` c WHERE TABLE_NAME = '{$tableName}'";
$get_col_name = $database->query($sql_get_col_name);

while ($row = $get_col_name->fetch_assoc())
{
    $columns[] = $row["COLUMN_NAME"];
}



// getting table data
$sql_get_table_data = "SELECT * FROM `{$tableName}` WHERE {$columns[0]}={$objectEditeId}";
$get_table_data = $database->query($sql_get_table_data);
$objectRowCount = $get_table_data->num_rows;

//     // output data of each row into multidimension Array 
for ($objectdata = array();$row = $get_table_data->fetch_array();$objectdata[] = $row);


///////////////////////////////////////////////////////////////
/// start of ---> submitting form data to the database 
///////////////////////////////////////////////////////////////



//php Creating a dynamic  query with PHP and MySQL


if (isset($_POST['submit'])) {

    for ($i=1; $i < $col_count; $i++) { 
        $columnsNew[$i] = $_POST[$columns[$i]."_edite"];
        $columnsNew[$i] = $database->escape_string($columnsNew[$i]);
    }

    $setValues = array(); 
    for ($i=1; $i < $col_count; $i++) { 
        $setValues[] = "`".$columns[$i]."`='".$columnsNew[$i]."'";
    }
    $setValues = "SET " . implode(", ", $setValues);


    $sql= "UPDATE `{$tableName}` {$setValues}  WHERE {$columns[0]}={$objectEditeId}";
    $object_dml= $database->query($sql); 

} 
///////////////////////////////////////////////////////////////
/// End of ---> submitting form data to the database 
///////////////////////////////////////////////////////////////

?>
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0"><?php echo htmlentities($tableName); ?> Configuration</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inventory </a></li>
                <li class="breadcrumb-item active">New <?php echo htmlentities($tableName); ?></li>
            </ol>
        </div>
        <div class="col-md-6 col-4 align-self-center">
            <button class="right-side-toggle waves-effect waves-light btn-info btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-3">
            <button onclick="location.href='index?module=broker&tableName=<?php echo $tableName?>&objecthome=true'" class="btn pull-left hidden-sm-down btn-success"><i class="mdi mdi-arrow-left-bold"></i> Back</button>
        </div>
    </div>
    <br />
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">New Status</h4>
                </div>
                <div class="card-block">
                    <form action="index?module=broker&tableName=<?php echo $tableName; ?>&objectEditeId=<?php echo $objectEditeId; ?>" method="post">
                        <div class="form-body">
                            <h3 class="card-title"><?php echo $tableName; ?> Info</h3>

                            <div class="row p-t-20">
<?php
for ($row = 0;$row < $objectRowCount;$row++)
{
    for ($col = 1;$col < $col_count;$col++)
    {
    echo"<div class='col-md-3'>
    <div class='form-group'>";
    echo"<label class='control-label'>".$columns[$col]."</label>";
    echo"<input type='text' name='".$columns[$col]."_edite"."' class='form-control' placeholder='".$objectdata[$row][$columns[$col]]."' value='".$objectdata[$row][$columns[$col]]."'/>";
    echo"<small class='form-control-feedback'>".$columns[$col]."....."."</small>";
    echo" </div>
    </div>";
    }

}

?>


                        </div>
                        <div class="form-actions">
                            <button type="submit" name="submit"  class="btn btn-success"><i class="fa fa-check"></i> Save </button>
                            <button type="button" onclick="location.href='index?module=broker&tableName=<?php echo $tableName; ?>&objecthome=true'" class="btn btn-inverse">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->

    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <div class="right-sidebar">
        <div class="slimscrollright">
            <div class="rpanel-title">
                Theme Panel <span><i class="ti-close right-side-toggle"></i></span>
            </div>
            <div class="r-panel-body">
                <ul id="themecolors" class="m-t-20">
                    <li><b>With Light sidebar</b></li>
                    <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                    <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                    <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                    <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                    <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                    <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                    <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                    <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                    <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                    <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                    <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                    <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                    <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme">12</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
