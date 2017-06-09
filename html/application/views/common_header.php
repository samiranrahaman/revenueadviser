<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Profit and Loss</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="description" content="A INUBAAN Software Product" />
	<meta name="keywords" content="Profit,loss,revenue,adviser" />
	<meta name="author" content="Inubaan Software" />
  <!-- Bootstrap 3.3.6 -->
 <!-- <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">-->
 <!-- Bootstrap Core CSS -->
<link href="<?php echo base_url();?>css/dashboard/bootstrap.min.css" rel='stylesheet' type='text/css' />
 
  <!-- Custom CSS -->
<link href="<?php echo base_url();?>css/dashboard/style.css" rel='stylesheet' type='text/css' />
  <!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url();?>css/fonts/css/font-awesome.min.css">
  
  
<!--<link href="<?php echo base_url();?>css/dashboard/font-awesome.css" rel="stylesheet"> -->
 <!-- Graph CSS -->
<link href="<?php echo base_url();?>css/dashboard/lines.css" rel='stylesheet' type='text/css' />   

  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>css/ionicons.min.css">
 
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>css/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>css/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
   <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini" ng-app="myApp">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="javascript:void(0);" class="logo">
      <img height="40" src="<?php echo base_url();?>images/logogg.png">
    </a>

    <!-- Header Navbar: style can be found in header.less -->
   <!-- <nav class="navbar navbar-static-top">-->
   <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
         
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
	  <a><img src="<?php echo base_url();?>/images/male-circle-512.png" style="width: 40px;"/>
	     <b>Welcome,</b> <?php echo $user_info->user_first_name.' '.$user_info->user_last_name; ?>
	  </a> 
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
            <!--<li class="dropdown user user-menu">
             <a class="btn bar-danger"style="background-color: red;color: white;/*! padding: 1px; *//*! border-radius: 91px 133px 99px 102px; */border: 1px solid #201c1c;" href="<?php echo base_url();?>index.php/feedback" target="_blank">Feedback</a>   
          </li> -->
		  <li>
		  <div class="dlbtn"> <a  href="<?php echo base_url();?>index.php/feedback" target="_blank">Feedback</a> </div>
		  </li>
		  <li class="dropdown user user-menu">
           <a href="<?php echo base_url();?>profile" style="color: black;" ><i style="color: black;"  class="fa fa-user"></i>Profile</a> 
          </li>
           <li class="dropdown user user-menu">
             <a href="#" data-toggle="modal" style="color: black;" data-target="#change"><i style="color: black;"  class="fa fa-key" aria-hidden="true"></i>Change Password</a>  
          </li> 
          <li class="dropdown user user-menu">
           <a href="<?php echo base_url();?>index.php/Login/logout" style="color: black;" ><i style="color: black;"  class="fa fa-sign-out"></i>Logout</a> 
          </li>
		   
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li -->
        </ul>
      </div>

    </nav>
  </header>

 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->

      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!--  Change Password Model-->

 <div class="example-modal">
        <div class="modal fade" tabindex="-1" id="change" name="change">
          <div class="modal-dialog modal-sm ui-corner-all">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Change Password</h4>
				<p id="errordiv"></p>
                <form name="changeForm" id="changeForm" method="post">
                <div class="modal-body">
                <div id="alert123" name="alert123" role="alert" style="display:none;" >                    
                </div>
                  
                    <div class="form-group" id="div111">  
                        <label for="recipient-name" class="form-control-label">Current password</label>       
                        <input type="text" class="form-control" id="curr_pswd" name="curr_pswd" required /> 
                    </div>  
                     <div class="form-group" id="div112">  
                        <label for="recipient-name" class="form-control-label">New password</label>       
                        <input type="text" class="form-control" id="new_pswd" name="new_pswd" required /> 
                    </div>  
                     <div class="form-group" id="div113">  
                        <label for="recipient-name" class="form-control-label">Confirm password</label>       
                        <input type="text" class="form-control" id="conf_pswd" name="conf_pswd" required /> 
                    </div>                            
                  
                </div>
               <div class="modal-footer">
                <button type="button" id="closemodel11" name="closemodel11" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary has-spinner"  onclick="changePassword()"
                id="changingPassword"><span  id="hide_name">Submit</span></button>
              </div>
			  </form>
            </div>
          <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>
     <!-- /Chnage Password -->
    </div>

<!-- jQuery 2.2.0 -->
<script src="<?php echo base_url();?>AdminLTE/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>AdminLTE/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>AdminLTE/dist/js/app.min.js"></script>

<script>
function changePassword()
{
	var curr_pswd=$("#curr_pswd").val();
	var new_pswd=$("#new_pswd").val();
	var conf_pswd=$("#conf_pswd").val();
	//alert(curr_pswd);
	$.ajax({
		  method: "POST",
		  url: "<?php echo base_url();?>login/changePassword",
		  data: { curr_pswd:curr_pswd, new_pswd:new_pswd,conf_pswd:conf_pswd}
		})
		  .done(function( msg ) {
			//alert(msg);
			if(msg=='0')
			{
				$("#errordiv").html("Confirm Password Not Matched");
			}
			if(msg=='1')
			{
				$("#errordiv").html("Password Not Matched");
			}
			if(msg=='2')
			{
				$("#errordiv").html("Password Updated Successfully");
			}
		  });
}
</script>


