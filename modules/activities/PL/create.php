<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Inventory</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Activities</a></li>
                <li class="breadcrumb-item active">New Activity</li>
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
    <button onclick="location.href='index?module=Activities'" class="btn pull-left hidden-sm-down btn-success"><i class="mdi mdi-arrow-left-bold"></i> Back</button>
    </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block"> 
                    <form action="index?module=activities&create=true" method="post">
                        <div class="form-body">
                            <h4 class="card-title"> New Activity <small> For Unit ID <code>11-11-20</code></small></h4>
                            <!-- Nav tabs -->
                            <div class="vtabs col-md-12">
                                <ul class="nav nav-tabs tabs-vertical" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home4" role="tab" aria-expanded="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Ticket Data</span> </a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile4" role="tab" aria-expanded="false"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Installment Plan</span></a> </li>
                                    <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages4" role="tab" aria-expanded="false"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Messages</span></a> </li> -->
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane p-20 active" id="home4" role="tabpanel" aria-expanded="true">
                                            <h3>Ticket Info </h3>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Unit ID</label>
                                                        <input type="text" id="" name="unit_id" class="form-control" value="11-11-20" placeholder="11-11-20" disabled/>
                                                        <small class="form-control-feedback">Unite ID: 11-11-20 </small>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Seller</label>
                                                        <input type="text" id="ProjectName" name="ProjectName" class="form-control" value="root@localhost" placeholder="root@localhost" disabled/>
                                                        <small class="form-control-feedback">Seller Name.... </small>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Direct Manager</label>
                                                        <input type="text" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                        <small class="form-control-feedback">Manager Name.... </small>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Seller Assistant </label>
                                                        <input type="text" id="ProjectName" name="ProjectName" class="form-control" placeholder="" />
                                                        <small class="form-control-feedback">Seller Assistant if Available.... </small>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Seller Assistant Direct Manager</label>
                                                        <input type="text" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                        <small class="form-control-feedback">if Available.... </small>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Section Head</label>
                                                        <input type="text" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                        <small class="form-control-feedback">Section Head Name.... </small>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Sale Type</label>
                                                        <input type="text" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                        <small class="form-control-feedback">Section Head Name.... </small>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Broker</label>
                                                        <input type="text" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Signed Contract</label>
                                                        <input type="text" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Cheque Submitted</label>
                                                        <input type="text" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Filled Claim</label>
                                                        <input type="text" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Cheque Submitted</label>
                                                        <input type="text" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Cheque Submitted</label>
                                                        <input type="text" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                    </div>
                                                </div>
                                            </div>                           
                                    </div>
                                    <div class="tab-pane p-20" id="profile4" role="tabpanel" aria-expanded="true">
                                        <h3>Installment Info </h3>
                                        <div class="row">
                                            <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Garage Requested</label>
                                                        <input type="text" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                    </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Project Name</label>
                                                    <input type="text" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                    <small class="form-control-feedback">Pro Name.... </small>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Project Name</label>
                                                    <input type="text" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                    <small class="form-control-feedback">Pro Name.... </small>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Project Name</label>
                                                    <input type="text" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                    <small class="form-control-feedback">Pro Name.... </small>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Project Name</label>
                                                    <input type="text" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                    <small class="form-control-feedback">Pro Name.... </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="tab-pane p-20" id="messages4" role="tabpanel" aria-expanded="false">3</div> -->
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-check"></i> Create</button>
                            <button type="button" onclick="location.href='index?module=Activities'" class="btn btn-inverse">Cancel</button>
                        </div>
                    </form>
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
