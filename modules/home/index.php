<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
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
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Daily Sales</h4>
                    <div class="text-right">
                        <h2 class="font-light m-b-0"><i class="ti-arrow-up text-success"></i> $120</h2>
                        <span class="text-muted">Todays Income</span>
                    </div>
                    <span class="text-success">80%</span>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 80%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Weekly Sales</h4>
                    <div class="text-right">
                        <h2 class="font-light m-b-0"><i class="ti-arrow-up text-info"></i> $5,000</h2>
                        <span class="text-muted">Todays Income</span>
                    </div>
                    <span class="text-info">30%</span>
                    <div class="progress">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 30%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Monthly Sales</h4>
                    <div class="text-right">
                        <h2 class="font-light m-b-0"><i class="ti-arrow-up text-purple"></i> $8,000</h2>
                        <span class="text-muted">Todays Income</span>
                    </div>
                    <span class="text-purple">60%</span>
                    <div class="progress">
                        <div class="progress-bar bg-purple" role="progressbar" style="width: 60%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Yearly Sales</h4>
                    <div class="text-right">
                        <h2 class="font-light m-b-0"><i class="ti-arrow-down text-danger"></i> $12,000</h2>
                        <span class="text-muted">Todays Income</span>
                    </div>
                    <span class="text-danger">80%</span>
                    <div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 80%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- Row -->
    <!-- Row -->

    <!-- Row -->
    <!-- Row -->
    <div class="row">
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Sales of the Month</h4>
                    <div id="sales-donute" style="width: 100%; height: 300px;"></div>
                    <div class="round-overlap m-t-20"><i class="mdi mdi-cart"></i></div>
                    <ul class="list-inline m-t-30 text-center">
                        <li><i class="fa fa-circle text-purple"></i> Item A</li>
                        <li><i class="fa fa-circle text-success"></i> Item B</li>
                        <li><i class="fa fa-circle text-info"></i> Item C</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Sales Prediction</h4>
                            <div class="d-flex flex-row">
                                <div class="align-self-center">
                                    <span class="display-6">$3528</span>
                                    <h6 class="text-muted">(150-165 Sales)</h6>
                                </div>
                                <div class="ml-auto">
                                    <div id="gauge-chart" style="width: 150px; height: 150px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Sales Difference</h4>
                            <div class="d-flex flex-row">
                                <div class="align-self-center">
                                    <span class="display-6">$4316</span>
                                    <h6 class="text-muted">(150-165 Sales)</h6>
                                </div>
                                <div class="ml-auto">
                                    <div class="ct-chart" style="width: 120px; height: 120px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-block">
                    <div class="d-flex flex-row">
                        <div class=""><img src="assets/images/users/1.jpg" alt="user" class="img-circle" width="100" /></div>
                        <div class="p-l-20">
                            <h3 class="font-medium">Daniel Kristeen</h3>
                            <h6>UIUX Designer</h6>
                            <button class="btn btn-success"><i class="ti-plus"></i> Follow</button>
                        </div>
                    </div>
                    <div class="row m-t-40">
                        <div class="col b-r">
                            <h2 class="font-light">14</h2>
                            <h6>Photos</h6>
                        </div>
                        <div class="col b-r">
                            <h2 class="font-light">54</h2>
                            <h6>Videos</h6>
                        </div>
                        <div class="col">
                            <h2 class="font-light">145</h2>
                            <h6>Tasks</h6>
                        </div>
                    </div>
                </div>
                <div>
                    <hr />
                </div>
                <div class="card-block">
                    <p class="text-center aboutscroll">
                        Lorem ipsum dolor sit ametetur adipisicing elit, sed do eiusmod tempor incididunt adipisicing elit, sed do eiusmod tempor incididunLorem ipsum dolor sit ametetur adipisicing elit, sed do eiusmod tempor incididuntt
                    </p>
                    <ul class="list-icons d-flex flex-item text-center p-t-10">
                        <li class="col">
                            <a href="javascript:void(0)" data-toggle="tooltip" title="" data-original-title="Website"><i class="fa fa-globe font-20"></i></a>
                        </li>
                        <li class="col">
                            <a href="javascript:void(0)" data-toggle="tooltip" title="" data-original-title="twitter"><i class="fa fa-twitter font-20"></i></a>
                        </li>
                        <li class="col">
                            <a href="javascript:void(0)" data-toggle="tooltip" title="" data-original-title="Facebook"><i class="fa fa-facebook-square font-20"></i></a>
                        </li>
                        <li class="col">
                            <a href="javascript:void(0)" data-toggle="tooltip" title="" data-original-title="Youtube"><i class="fa fa-youtube-play font-20"></i></a>
                        </li>
                        <li class="col">
                            <a href="javascript:void(0)" data-toggle="tooltip" title="" data-original-title="Linkd-in"><i class="fa fa-linkedin-square font-20"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->
    <!-- Row -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Recent Chats</h4>
                    <div class="chat-box">
                        <!--chat Row -->
                        <ul class="chat-list">
                            <!--chat Row -->
                            <li>
                                <div class="chat-img"><img src="assets/images/users/1.jpg" alt="user" /></div>
                                <div class="chat-content">
                                    <h5>James Anderson</h5>
                                    <div class="box bg-light-info">Lorem Ipsum is simply dummy text of the printing & type setting industry.</div>
                                </div>
                                <div class="chat-time">10:56 am</div>
                            </li>
                            <!--chat Row -->
                            <li>
                                <div class="chat-img"><img src="assets/images/users/2.jpg" alt="user" /></div>
                                <div class="chat-content">
                                    <h5>Bianca Doe</h5>
                                    <div class="box bg-light-success">It’s Great opportunity to work.</div>
                                </div>
                                <div class="chat-time">10:57 am</div>
                            </li>
                            <!--chat Row -->
                            <li class="odd">
                                <div class="chat-content">
                                    <div class="box bg-light-inverse">I would love to join the team.</div>
                                    <br />
                                </div>
                                <div class="chat-time">10:58 am</div>
                            </li>
                            <!--chat Row -->
                            <li class="odd">
                                <div class="chat-content">
                                    <div class="box bg-light-inverse">Whats budget of the new project.</div>
                                    <br />
                                </div>
                                <div class="chat-time">10:59 am</div>
                            </li>
                            <!--chat Row -->
                            <li>
                                <div class="chat-img"><img src="assets/images/users/3.jpg" alt="user" /></div>
                                <div class="chat-content">
                                    <h5>Angelina Rhodes</h5>
                                    <div class="box bg-light-primary">Well we have good budget for the project</div>
                                </div>
                                <div class="chat-time">11:00 am</div>
                            </li>
                            <!--chat Row -->
                        </ul>
                    </div>
                </div>
                <div class="card-block b-t">
                    <div class="row">
                        <div class="col-8">
                            <textarea placeholder="Type your message here" class="form-control b-0"></textarea>
                        </div>
                        <div class="col-4 text-right">
                            <button type="button" class="btn btn-info btn-circle btn-lg"><i class="fa fa-paper-plane-o"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Recent Messages</h4>
                    <div class="message-box">
                        <div class="message-widget message-scroll">
                            <!-- Message -->
                            <a href="#">
                                <div class="user-img"><img src="assets/images/users/1.jpg" alt="user" class="img-circle" /> <span class="profile-status online pull-right"></span></div>
                                <div class="mail-contnet">
                                    <h5>Pavan kumar</h5>
                                    <span class="mail-desc">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been.</span> <span class="time">9:30 AM</span>
                                </div>
                            </a>
                            <!-- Message -->
                            <a href="#">
                                <div class="user-img"><img src="assets/images/users/2.jpg" alt="user" class="img-circle" /> <span class="profile-status busy pull-right"></span></div>
                                <div class="mail-contnet">
                                    <h5>Sonu Nigam</h5>
                                    <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span>
                                </div>
                            </a>
                            <!-- Message -->
                            <a href="#">
                                <div class="user-img"><span class="round">A</span> <span class="profile-status away pull-right"></span></div>
                                <div class="mail-contnet">
                                    <h5>Arijit Sinh</h5>
                                    <span class="mail-desc">Simply dummy text of the printing and typesetting industry.</span> <span class="time">9:08 AM</span>
                                </div>
                            </a>
                            <!-- Message -->
                            <a href="#">
                                <div class="user-img"><img src="assets/images/users/4.jpg" alt="user" class="img-circle" /> <span class="profile-status offline pull-right"></span></div>
                                <div class="mail-contnet">
                                    <h5>Pavan kumar</h5>
                                    <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span>
                                </div>
                            </a>
                            <!-- Message -->
                            <a href="#">
                                <div class="user-img"><img src="assets/images/users/1.jpg" alt="user" class="img-circle" /> <span class="profile-status online pull-right"></span></div>
                                <div class="mail-contnet">
                                    <h5>Pavan kumar</h5>
                                    <span class="mail-desc">Welcome to the Elite Admin</span> <span class="time">9:30 AM</span>
                                </div>
                            </a>
                            <!-- Message -->
                            <a href="#">
                                <div class="user-img"><img src="assets/images/users/2.jpg" alt="user" class="img-circle" /> <span class="profile-status busy pull-right"></span></div>
                                <div class="mail-contnet">
                                    <h5>Sonu Nigam</h5>
                                    <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span>
                                </div>
                            </a>
                            <!-- Message -->
                            <a href="#">
                                <div class="user-img"><img src="assets/images/users/3.jpg" alt="user" class="img-circle" /> <span class="profile-status away pull-right"></span></div>
                                <div class="mail-contnet">
                                    <h5>Arijit Sinh</h5>
                                    <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span>
                                </div>
                            </a>
                            <!-- Message -->
                            <a href="#">
                                <div class="user-img"><img src="assets/images/users/4.jpg" alt="user" class="img-circle" /> <span class="profile-status offline pull-right"></span></div>
                                <div class="mail-contnet">
                                    <h5>Pavan kumar</h5>
                                    <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->
    <!-- Row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-block">
                    <select class="custom-select pull-right">
                        <option selected>January</option>
                        <option value="1">February</option>
                        <option value="2">March</option>
                        <option value="3">April</option>
                    </select>
                    <h4 class="card-title">Projects of the Month</h4>
                    <div class="table-responsive m-t-40">
                        <table class="table stylish-table">
                            <thead>
                                <tr>
                                    <th colspan="2">Assigned</th>
                                    <th>Name</th>
                                    <th>Priority</th>
                                    <th>Budget</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width: 50px;"><span class="round">S</span></td>
                                    <td>
                                        <h6>Sunil Joshi</h6>
                                        <small class="text-muted">Web Designer</small>
                                    </td>
                                    <td>Elite Admin</td>
                                    <td><span class="label label-light-success">Low</span></td>
                                    <td>$3.9K</td>
                                </tr>
                                <tr class="active">
                                    <td>
                                        <span class="round"><img src="assets/images/users/2.jpg" alt="user" width="50" /></span>
                                    </td>
                                    <td>
                                        <h6>Andrew</h6>
                                        <small class="text-muted">Project Manager</small>
                                    </td>
                                    <td>Real Homes</td>
                                    <td><span class="label label-light-info">Medium</span></td>
                                    <td>$23.9K</td>
                                </tr>
                                <tr>
                                    <td><span class="round round-success">B</span></td>
                                    <td>
                                        <h6>Bhavesh patel</h6>
                                        <small class="text-muted">Developer</small>
                                    </td>
                                    <td>MedicalPro Theme</td>
                                    <td><span class="label label-light-danger">High</span></td>
                                    <td>$12.9K</td>
                                </tr>
                                <tr>
                                    <td><span class="round round-primary">N</span></td>
                                    <td>
                                        <h6>Nirav Joshi</h6>
                                        <small class="text-muted">Frontend Eng</small>
                                    </td>
                                    <td>Elite Admin</td>
                                    <td><span class="label label-light-success">Low</span></td>
                                    <td>$10.9K</td>
                                </tr>
                                <tr>
                                    <td><span class="round round-warning">M</span></td>
                                    <td>
                                        <h6>Micheal Doe</h6>
                                        <small class="text-muted">Content Writer</small>
                                    </td>
                                    <td>Helping Hands</td>
                                    <td><span class="label label-light-danger">High</span></td>
                                    <td>$12.9K</td>
                                </tr>
                                <tr>
                                    <td><span class="round round-danger">N</span></td>
                                    <td>
                                        <h6>Johnathan</h6>
                                        <small class="text-muted">Graphic</small>
                                    </td>
                                    <td>Digital Agency</td>
                                    <td><span class="label label-light-danger">High</span></td>
                                    <td>$2.6K</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-block">
                    <select class="custom-select pull-right">
                        <option selected>Today</option>
                        <option value="1">Weekly</option>
                    </select>
                    <h4 class="card-title">Weather Report</h4>
                    <div class="d-flex align-items-center flex-row m-t-30">
                        <div class="p-2 display-5 text-info">
                            <i class="wi wi-day-showers"></i> <span>73<sup>°</sup></span>
                        </div>
                        <div class="p-2">
                            <h3 class="m-b-0">Saturday</h3>
                            <small>Ahmedabad, India</small>
                        </div>
                    </div>
                    <table class="table no-border">
                        <tr>
                            <td>Wind</td>
                            <td class="font-medium">ESE 17 mph</td>
                        </tr>
                        <tr>
                            <td>Humidity</td>
                            <td class="font-medium">83%</td>
                        </tr>
                        <tr>
                            <td>Pressure</td>
                            <td class="font-medium">28.56 in</td>
                        </tr>
                        <tr>
                            <td>Cloud Cover</td>
                            <td class="font-medium">78%</td>
                        </tr>
                        <tr>
                            <td>Ceiling</td>
                            <td class="font-medium">25760 ft</td>
                        </tr>
                    </table>
                    <hr />
                    <ul class="list-unstyled row text-center city-weather-days">
                        <li class="col">
                            <i class="wi wi-day-sunny"></i><span>09:30</span>
                            <h3>70<sup>°</sup></h3>
                        </li>
                        <li class="col">
                            <i class="wi wi-day-cloudy"></i><span>11:30</span>
                            <h3>72<sup>°</sup></h3>
                        </li>
                        <li class="col">
                            <i class="wi wi-day-hail"></i><span>13:30</span>
                            <h3>75<sup>°</sup></h3>
                        </li>
                        <li class="col">
                            <i class="wi wi-day-sprinkle"></i><span>15:30</span>
                            <h3>76<sup>°</sup></h3>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4">
            <div class="card">
                <img class="card-img-top img-responsive" src="assets/images/big/img1.jpg" alt="Card" />
                <div class="card-block">
                    <ul class="list-inline font-14">
                        <li class="p-l-0">20 May 2016</li>
                        <li><a href="javascript:void(0)" class="link">3 Comment</a></li>
                    </ul>
                    <h3 class="font-normal">Featured Hydroflora Pots Garden &amp; Outdoors</h3>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-4">
            <div class="card">
                <img class="card-img-top img-responsive" src="assets/images/big/img2.jpg" alt="Card" />
                <div class="card-block">
                    <ul class="list-inline font-14">
                        <li class="p-l-0">20 May 2016</li>
                        <li><a href="javascript:void(0)" class="link">3 Comment</a></li>
                    </ul>
                    <h3 class="font-normal">Featured Hydroflora Pots Garden &amp; Outdoors</h3>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-4">
            <div class="card">
                <img class="card-img-top img-responsive" src="assets/images/big/img4.jpg" alt="Card" />
                <div class="card-block">
                    <ul class="list-inline font-14">
                        <li class="p-l-0">20 May 2016</li>
                        <li><a href="javascript:void(0)" class="link">3 Comment</a></li>
                    </ul>
                    <h3 class="font-normal">Featured Hydroflora Pots Garden &amp; Outdoors</h3>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- Row -->
    <!-- Row -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Recent Comments</h4>
                </div>
                <!-- ============================================================== -->
                <!-- Comment widgets -->
                <!-- ============================================================== -->
                <div class="comment-widgets">
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row">
                        <div class="p-2">
                            <span class="round"><img src="assets/images/users/1.jpg" alt="user" width="50" /></span>
                        </div>
                        <div class="comment-text w-100">
                            <h5>James Anderson</h5>
                            <p class="m-b-5">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has beenorem Ipsum is simply dummy text of the printing and type setting industry.</p>
                            <div class="comment-footer">
                                <span class="text-muted pull-right">April 14, 2016</span>
                                <span class="label label-light-info">Pending</span>
                                <span class="action-icons">
                                    <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                                    <a href="javascript:void(0)"><i class="ti-check"></i></a>
                                    <a href="javascript:void(0)"><i class="ti-heart"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row active">
                        <div class="p-2">
                            <span class="round"><img src="assets/images/users/2.jpg" alt="user" width="50" /></span>
                        </div>
                        <div class="comment-text active w-100">
                            <h5>Michael Jorden</h5>
                            <p class="m-b-5">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has beenorem Ipsum is simply dummy text of the printing and type setting industry..</p>
                            <div class="comment-footer">
                                <span class="text-muted pull-right">April 14, 2016</span>
                                <span class="label label-light-success">Approved</span>
                                <span class="action-icons active">
                                    <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                                    <a href="javascript:void(0)"><i class="icon-close"></i></a>
                                    <a href="javascript:void(0)"><i class="ti-heart text-danger"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row">
                        <div class="p-2">
                            <span class="round"><img src="assets/images/users/3.jpg" alt="user" width="50" /></span>
                        </div>
                        <div class="comment-text w-100">
                            <h5>Johnathan Doeting</h5>
                            <p class="m-b-5">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has beenorem Ipsum is simply dummy text of the printing and type setting industry.</p>
                            <div class="comment-footer">
                                <span class="text-muted pull-right">April 14, 2016</span>
                                <span class="label label-light-danger">Rejected</span>
                                <span class="action-icons">
                                    <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                                    <a href="javascript:void(0)"><i class="ti-check"></i></a>
                                    <a href="javascript:void(0)"><i class="ti-heart"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row">
                        <div class="p-2">
                            <span class="round"><img src="assets/images/users/4.jpg" alt="user" width="50" /></span>
                        </div>
                        <div class="comment-text w-100">
                            <h5>James Anderson</h5>
                            <p class="m-b-5">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has beenorem Ipsum is simply dummy text of the printing and type setting industry..</p>
                            <div class="comment-footer">
                                <span class="text-muted pull-right">April 14, 2016</span>
                                <span class="label label-light-info">Pending</span>
                                <span class="action-icons">
                                    <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                                    <a href="javascript:void(0)"><i class="ti-check"></i></a>
                                    <a href="javascript:void(0)"><i class="ti-heart"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-block">
                    <button class="pull-right btn btn-sm btn-rounded btn-success" data-toggle="modal" data-target="#myModal">Add Task</button>
                    <h4 class="card-title">To Do list</h4>
                    <!-- ============================================================== -->
                    <!-- To do list widgets -->
                    <!-- ============================================================== -->
                    <div class="to-do-widget m-t-20">
                        <!-- .modal for add task -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add Task</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" placeholder="Enter Your Name" />
                                            </div>
                                            <div class="form-group">
                                                <label>Email address</label>
                                                <input type="email" class="form-control" placeholder="Enter email" />
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Submit</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                        <ul class="list-task todo-list list-group m-b-0" data-role="tasklist">
                            <li class="list-group-item" data-role="task">
                                <div class="checkbox checkbox-info">
                                    <input type="checkbox" id="inputSchedule" name="inputCheckboxesSchedule" />
                                    <label for="inputSchedule" class=""> <span>Schedule meeting with</span> </label>
                                </div>
                                <ul class="assignedto">
                                    <li><img src="assets/images/users/1.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Steave" /></li>
                                    <li><img src="assets/images/users/2.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Jessica" /></li>
                                    <li><img src="assets/images/users/3.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Priyanka" /></li>
                                    <li><img src="assets/images/users/4.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Selina" /></li>
                                </ul>
                            </li>
                            <li class="list-group-item" data-role="task">
                                <div class="checkbox checkbox-info">
                                    <input type="checkbox" id="inputCall" name="inputCheckboxesCall" />
                                    <label for="inputCall" class=""> <span>Give Purchase report to</span> <span class="label label-light-danger">Today</span> </label>
                                </div>
                                <ul class="assignedto">
                                    <li><img src="assets/images/users/3.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Priyanka" /></li>
                                    <li><img src="assets/images/users/4.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Selina" /></li>
                                </ul>
                            </li>
                            <li class="list-group-item" data-role="task">
                                <div class="checkbox checkbox-info">
                                    <input type="checkbox" id="inputBook" name="inputCheckboxesBook" />
                                    <label for="inputBook" class=""> <span>Book flight for holiday</span> </label>
                                </div>
                                <div class="item-date">26 jun 2017</div>
                            </li>
                            <li class="list-group-item" data-role="task">
                                <div class="checkbox checkbox-info">
                                    <input type="checkbox" id="inputForward" name="inputCheckboxesForward" />
                                    <label for="inputForward" class=""> <span>Forward all tasks</span> <span class="label label-light-warning">2 weeks</span> </label>
                                </div>
                                <div class="item-date">26 jun 2017</div>
                            </li>
                            <li class="list-group-item" data-role="task">
                                <div class="checkbox checkbox-info">
                                    <input type="checkbox" id="inputRecieve" name="inputCheckboxesRecieve" />
                                    <label for="inputRecieve" class=""> <span>Recieve shipment</span> </label>
                                </div>
                                <div class="item-date">26 jun 2017</div>
                            </li>
                            <li class="list-group-item" data-role="task">
                                <div class="checkbox checkbox-info">
                                    <input type="checkbox" id="inputpayment" name="inputCheckboxespayment" />
                                    <label for="inputpayment" class=""> <span>Send payment today</span> </label>
                                </div>
                                <div class="item-date">26 jun 2017</div>
                            </li>
                            <li class="list-group-item" data-role="task">
                                <div class="checkbox checkbox-info">
                                    <input type="checkbox" id="inputForward2" name="inputCheckboxesd" />
                                    <label for="inputForward2" class=""> <span>Important tasks</span> <span class="label label-light-success">2 weeks</span> </label>
                                </div>
                                <ul class="assignedto">
                                    <li><img src="assets/images/users/1.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Assign to Steave" /></li>
                                    <li><img src="assets/images/users/2.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Assign to Jessica" /></li>
                                    <li><img src="assets/images/users/4.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Assign to Selina" /></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
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
