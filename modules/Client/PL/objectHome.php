<?php

///////////////////////////////////////////////////////////////
/// start of ---> getting Object details
///////////////////////////////////////////////////////////////
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
$sql_get_table_data = "SELECT * FROM `{$tableName}`";
$get_table_data = $database->query($sql_get_table_data);
$objectRowCount = $get_table_data->num_rows;

//     // output data of each row into multidimension Array 
for ($objectdata = array();$row = $get_table_data->fetch_assoc();$objectdata[] = $row);



///////////////////////////////////////////////////////////////
/// End of ---> getting Object details
///////////////////////////////////////////////////////////////



/////////////////////////////////////////////////////////////
// start of ---> delete Object if requested
/////////////////////////////////////////////////////////////
if (isset($_GET['deleteObjectId'])) {
    $deleteObjectId = $_GET['deleteObjectId'];
    $sql_delete_object= "DELETE  FROM `{$tableName}` WHERE `{$columns[0]}`='".$deleteObjectId."'";
    $object_delete= $database->query($sql_delete_object);
}
/////////////////////////////////////////////////////////////
// End of ---> delete Object if requested
/////////////////////////////////////////////////////////////


?>
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0"><?php echo htmlentities($tableName); ?></h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inventory</a></li>
                <li class="breadcrumb-item active">All <?php echo htmlentities($tableName); ?> Configuration</li>
            </ol>
        </div>
        <div class="col-md-6 col-4 align-self-center">
            <button class="right-side-toggle waves-effect waves-light btn-info btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
            <button onclick="location.href='index?module=Client&tableName=<?php echo $tableName; ?>&objectCreate=true'" class="btn pull-right hidden-sm-down btn-success"><i class="mdi mdi-plus-circle"></i> Create</button>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
     <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Data Export</h4>
                    <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    
<?php
foreach ($columns as $coloumnName)
{
    echo "<th>" . $coloumnName . "</th>";
}

?>
    
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
<?php
for($x = 0; $x < 5; $x++)
{
    echo "<th>" . $columns[$x] . "</th>";
}

?>
    
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
<?php
for ($row = 0;$row < $objectRowCount;$row++)
{
    echo "<tr>";
    for ($col = 0;$col < 5;$col++)
    {
        echo "<td>" . $objectdata[$row][$columns[$col]] . "</td> ";
    }

    echo "<td>
    <a href='index?module=Client&tableName={$tableName}&objectEditeId=".$objectdata[$row][$columns[0]]."' data-toggle='tooltip' data-original-title='Edit'> <i class='fa fa-pencil text-inverse m-r-10'></i></a>
    <a href='index?module=Client&tableName={$tableName}&objecthome=true&deleteObjectId=".$objectdata[$row][$columns[0]]."' data-toggle='tooltip' data-original-title='delete'> <i class='fa fa-trash'></i></a></td> </tr>";
}

?>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
