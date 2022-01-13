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
                                            <div class="ribbon-wrapper">
                                                <div class="ribbon ribbon-bookmark ribbon-info">Unit Data</div>
                                                <p class="ribbon-content">check out the unit data</p>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Unit ID</label>
                                                        <input type="text" id="" name="unit_id" class="form-control" value="<?php echo htmlentities($unitId);?>" placeholder="<?php echo htmlentities($unitId);?>" disabled/>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Building No</label>
                                                        <input type="text" id="" name="unit_id" class="form-control" value="11" placeholder="11" disabled/>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label"> Unit Area </label>
                                                        <input type="text" id="" name="unit_id" class="form-control" value="110" placeholder="110" disabled/>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label"> Basic Meter Price </label>
                                                        <input type="text" id="" name="unit_id" class="form-control" value="1030" placeholder="110" disabled/>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label"> Unit Basic Price </label>
                                                        <input type="text" id="" name="unit_id" class="form-control" value="90010" placeholder="110" disabled/>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">  Usufruct Meter Price </label>
                                                        <input type="number" id="" name="unit_id" class="form-control" value="10010" placeholder="110" disabled/>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label"> Usufruct Area </label>
                                                        <input type="text" id="" name="unit_id" class="form-control" value="10010" placeholder="110" required/>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Garage Price</label>
                                                        <input type="text" id="ProjectName" name="ProjectName" class="form-control" placeholder="5000" disabled/>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="ribbon-wrapper">
                                                <div class="ribbon ribbon-bookmark ribbon-info">Employee Data</div>
                                                <!-- <p class="ribbon-content">check out the unit data</p> -->
                                            </div>
                                            <div class="row"> 
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
                                                        <select id="Location" name="Location" class="form-control form-control-line" required>
                                                            <option value="1">Ahmed mahmoud</option>
                                                            <option value="2">root</option>   
                                                            <option value="3">Admin</option>      
                                                            <option value="4">Muhammad Soliman</option>  
                                                            <option value="4">Essam</option>                                                         
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Seller Assistant </label>
                                                        <select id="Location" name="Location" class="form-control form-control-line" >
                                                            <option value="">Select One if available</option>
                                                            <option value="1">Ahmed mahmoud</option>
                                                            <option value="2">root</option>   
                                                            <option value="3">Admin</option>      
                                                            <option value="4">Muhammad Soliman</option>  
                                                            <option value="4">Essam</option>                                                         
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Seller Assistant Direct Manager</label>
                                                        <select id="Location" name="Location" class="form-control form-control-line" >
                                                            <option value="">Select One if available</option>
                                                            <option value="1">Ahmed mahmoud</option>
                                                            <option value="2">root</option>   
                                                            <option value="3">Admin</option>      
                                                            <option value="4">Muhammad Soliman</option>  
                                                            <option value="4">Essam</option>                                                         
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Section Head</label>
                                                        <select id="Location" name="Location" class="form-control form-control-line" required>
                                                            <option value="1">Ahmed mahmoud</option>
                                                            <option value="2">root</option>   
                                                            <option value="3">Admin</option>      
                                                            <option value="4">Muhammad Soliman</option>  
                                                            <option value="4">Essam</option>                                                         
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Sale Type</label>
                                                        <select id="Location" name="Location" class="form-control form-control-line" required>
                                                            <option value="1">Direct</option>
                                                            <option value="2">Indirect</option>                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Broker</label>
                                                        <select id="Location" name="Location" class="form-control form-control-line" required>
                                                            <option value="2">Ahmed Mahmoud</option>
                                                            <option value="1">Adel Ali</option>                                                            
                                                        </select>
                                                    </div>
                                                </div>                                                                                                                                
                                                <div class="col-md-3">
                                                    <div class="">
                                                        <label class="control-label">Comment</label>
                                                        <textarea style="resize: vertical;" name="" rows="4"></textarea>
                                                    </div>
                                                </div>
                                            </div> 
                                            <hr>
                                            <div class="ribbon-wrapper">
                                                <div class="ribbon ribbon-bookmark ribbon-info">Activity input</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Payment Type</label>
                                                        <select id="Location" name="Location" class="form-control form-control-line" required>
                                                            <option value="1">Installment</option>
                                                            <option value="2">Cash</option>                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Refunded</label>
                                                        <select id="Location" name="Location" class="form-control form-control-line" required>
                                                            <option value="0">No</option>
                                                            <option value="1">Yes</option>                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Signed Contract</label>
                                                        <select id="Location" name="Location" class="form-control form-control-line" required>
                                                            <option value="0">No</option>
                                                            <option value="1">Yes</option>                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Cheque Submitted</label>
                                                        <select id="Location" name="Location" class="form-control form-control-line" required>
                                                            <option value="0">No</option>
                                                            <option value="1">Yes</option>                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Filled Claim</label>
                                                        <select id="Location" name="Location" class="form-control form-control-line" required>
                                                            <option value="0">No</option>
                                                            <option value="1">Yes</option>                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                        <label class="control-label">Creation Date</label>
                                                        <input type="text" id="ProjectName" name="ProjectName" class="form-control" placeholder="01/18/2022" disabled/>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">created_by</label>
                                                        <input type="text" id="ProjectName" name="ProjectName" class="form-control" value="root@localhost" placeholder="root@localhost" disabled/>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Creator Manager</label>
                                                        <input type="text" id="ProjectName" name="ProjectName" class="form-control" placeholder="" Disabled/>
                                                    </div>
                                                </div>
                                            </div>                          
                                    </div>
                                    <div class="tab-pane p-20" id="profile4" role="tabpanel" aria-expanded="true">
                                        <h3>Installment Info </h3>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Maintenance Feest %</label>
                                                    <input type="number" id="ProjectName" name="ProjectName" class="form-control" placeholder="" disabled/>
                                                    <small class="form-control-feedback">3 mean 3%.... </small>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Interest %</label>
                                                    <input type="number" id="ProjectName" name="ProjectName" class="form-control" placeholder="" disabled/>
                                                    <small class="form-control-feedback">3 mean 3%.... </small>
                                                </div>
                                            </div>
                                        </div> 
                                        <hr>
                                        <div class="row">   
                                            <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Garage Requested</label>                                                    
                                                        <select id="Location" name="Location" class="form-control form-control-line" required>
                                                            <option value="0">No</option>
                                                            <option value="1">Yes</option>                                                            
                                                        </select>
                                                    </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Installment Discount %</label>
                                                    <input type="number" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                    <small class="form-control-feedback">3 mean 3%.... </small>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Installment Years</label>
                                                    <input type="number" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                    <small class="form-control-feedback">3 years for example </small>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Other Discount % </label>
                                                    <input type="number" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                    <small class="form-control-feedback">3 mean 3%.... </small>
                                                </div>
                                            </div>
                                        </div> 
                                        <hr>
                                        <div class="row">     
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Annual Payment Amount</label>
                                                    <input type="number" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                    <small class="form-control-feedback">For Example : 300 LE.... </small>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Down Payment Amount</label>
                                                    <input type="number" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                    <small class="form-control-feedback">3000 LE for Example.... </small>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Receiving Payment Amount</label>
                                                    <input type="number" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                </div>
                                            </div>
                                        </div> 
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Annual Payment %</label>
                                                    <input type="number" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                    <small class="form-control-feedback">3 Mean %.... </small>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Down Payment %</label>
                                                    <input type="number" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                    <small class="form-control-feedback">3 mean 3%.... </small>
                                                </div>
                                            </div> 
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Receiving Payment %</label>
                                                    <input type="number" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                    <small class="form-control-feedback">3 mean 3%.... </small>
                                                </div>
                                            </div>
                                        </div> 
                                        <hr>
                                        <div class="row">       
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Annual With Rate</label>
                                                    <input type="number" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                    <small class="form-control-feedback">For Example : 30000 LE.... </small>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Down Payment After Interest</label>
                                                    <input type="number" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                    <small class="form-control-feedback">3000 LE for Example.... </small>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Installment Amount</label>
                                                    <input type="number" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Intrest Amount</label>
                                                    <input type="number" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                    <small class="form-control-feedback">2000 LE for Example.... </small>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Meter Price After Interest </label>
                                                    <input type="number" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Meter Price With Discount </label>
                                                    <input type="number" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Receiving Payment Amount After Interest</label>
                                                    <input type="number" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Remaining Amount</label>
                                                    <input type="number" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Total Discout Amount</label>
                                                    <input type="number" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Total Price After Interest</label>
                                                    <input type="number" id="ProjectName" name="ProjectName" class="form-control" placeholder="" required/>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-actions">
                                                <button name="submit" class="btn btn-success"><i class="mdi mdi-calculator"></i> Calculate</button>
                                                <button type="button" onclick="location.href='index?module=Activities'" class="btn btn-inverse">Cancel</button>
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
