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


///////////////////////////////////////////////////////////////
/// start of ---> submitting form data to the database 
///////////////////////////////////////////////////////////////



//php Creating a dynamic  query with PHP and MySQL
$setColumnName = array(); 
for ($i=0; $i < $col_count-2; $i++) { 
    $setColumnName[] = "`".$columns[$i]."`";
}
$setColumnName = "(" . implode(", ", $setColumnName).")";


if (isset($_POST['submit'])) {

    for ($i=1; $i < $col_count-2; $i++) { 
        $columnsNew[$i] = $_POST[$columns[$i]."_create"];
        $columnsNew[$i] = $database->escape_string($columnsNew[$i]);
    }

    $setValues = array(); 
    for ($i=1; $i < $col_count-2; $i++) { 
        $setValues[] = "'".$columnsNew[$i]."'";
    }
    $setValues = "(NULL, " . implode(", ", $setValues).")";


    $sql= "INSERT INTO `{$tableName}` {$setColumnName} VALUES {$setValues}";
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
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inventory</a></li>
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
                    <h4 class="m-b-0 text-white">New <?php echo $tableName; ?></h4>
                </div>
                <div class="card-block">
                    <form action="index?module=broker&tableName=<?php echo $tableName; ?>&objectCreate=true" method="post">
                        <div class="form-body">
                            <h3 class="card-title"><?php echo $tableName; ?> Info</h3>

                            <div class="row p-t-20">

<?php 
for ($i=1; $i < $col_count ; $i++) { 
    
    if ($columns[$i]==='Added By') {
        echo"<div class='col-md-3'>
        <div class='form-group'>";
        echo"<label class='control-label'>".$columns[$i]."</label>";
        echo"<input type='text' name='".$columns[$i]."_create"."' class='form-control' value='".$user_name."' disabled/>";
        echo"<small class='form-control-feedback'>".$columns[$i]."....."."</small>";
        echo" </div>
        </div>";
    } elseif($columns[$i]==='Insertion Date') {
        echo"<div class='col-md-3'>
        <div class='form-group'>";
        echo"<label class='control-label'>".$columns[$i]."</label>";
        echo"<input type='text' name='".$columns[$i]."_create"."' class='form-control' value='".date("Y/m/d") ." ". date("h:i:a")."' disabled/>";
        echo"<small class='form-control-feedback'>".$columns[$i]."....."."</small>";
        echo" </div>
        </div>";
    }elseif($columns[$i]!=='Type'){
        echo"<div class='col-md-3'>
        <div class='form-group'>";
        echo"<label class='control-label'>".$columns[$i]."</label>";
        echo"<input type='text' name='".$columns[$i]."_create"."' class='form-control' required/>";
        echo"<small class='form-control-feedback'>".$columns[$i]."....."."</small>";
        echo" </div>
        </div>";
    }
    
}
?>
                                    <div class="col-md-4 col-xs-6">
                                        <strong>Type</strong>
                                        <div class="form-group">
                                            <select id="myselect" name="Type_create" class="form-control form-control-line" required>
<?php
///////////////////////////////////////////////////////////////
/// Start of ------> 
///////////////////////////////////////////////////////////////
for ($i=0; $i < $BrokerTypeCount ; $i++) { 
    echo "<option value='".$Broker_Type_all["ID"][$i]."' >".$Broker_Type_all["Broker_Type"][$i]."</option>";
}
///////////////////////////////////////////////////////////////
/// End of of ------> 
///////////////////////////////////////////////////////////////
?>   
                                            </select>
                                        </div>
                                    </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-check"></i> Create</button>
                            <button type="button"  onclick="location.href='index?module=Broker&tableName=<?php echo $tableName; ?>&objecthome=true'" class="btn btn-inverse">Cancel</button>
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
