<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        
        <div class="pull-left info">
          <?php //echo $user_info->user_first_name.' '.$user_info->user_last_name;
		     //print_r($user_info);
			  $subscription=$user_info->subscription;
			 if($subscription=='affiliate')
			 {
				 echo "Affiliate";
			 }
			 if($subscription=='plan1A')
			 {
				 echo "Basic Monthly ";
			 }
			 if($subscription=='plan1B')
			 {
				  echo "Basic Yearly ";
			 }
			 if($subscription=='plan2A')
			 {
				 echo "Professional Monthly";
			 }
			 if($subscription=='plan2B')
			 {
				 echo "Professional Yearly";
			 }
			 if($subscription=='plan3A')
			 {
				 echo "Business Monthly";
			 }
			 if($subscription=='plan3B')
			 {
				 echo "Business Yearly";
			 }
		  ?>
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
        <br/>
        <br/>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
     
			 <li class="active treeview">

  			  <a href="#">
  				<i class="fa fa-dashboard"></i> <span>Revenue Advizer</span> <i class="fa fa-angle-left pull-right"></i>
  			  </a>
			
  			  <ul class="treeview-menu">
			    <li><a href="<?php echo base_url();?>index.php/welcome"><i class="fa fa-eye "></i>Welcome</a></li>
            <li><a href="<?php echo base_url();?>index.php/dashboard"><i class="fa fa-dashboard "></i>Dashboard</a></li>
			
			<li class="treeview">

  			  <a href="#">
  				<i class="fa fa-database"></i> <span>Reports</span> <i class="fa fa-angle-left pull-right"></i>
  			  </a>
  			  <ul class="treeview-menu">
			     <li><a href="<?php echo base_url();?>index.php/reports/daily_reports"><i class="fa fa-dashboard "></i>Daily Reports</a></li>
				 <li><a href="<?php echo base_url();?>index.php/reports/yearly_reports"><i class="fa fa-dashboard "></i>Yearly Reports</a></li>
			    
			   
			  </ul>
			</li>
			 <li><a href="<?php echo base_url();?>index.php/reports"><i class="fa fa-product-hunt "></i>My Products</a></li>
			
			<li><a href="<?php echo base_url();?>index.php/newproductadd"><i class="fa fa-dashboard "></i>Add New Product</a></li>
			<li><a href="<?php echo base_url();?>index.php/simulator"><i class="fa  fa-cog"></i>Simulator</a></li>
			<!--<li><a href="<?php echo base_url();?>index.php/Dashboard"><i class="fa fa-book "></i>Daily Data</a></li>-->
			<li><a href="<?php echo base_url();?>index.php/miscellaneous"><i class="fa fa-book "></i>Miscellaneous</a></li>
			<!--<li><a href="<?php echo base_url();?>index.php/Dashboard"><i class="fa  fa-th "></i>Fixed charges</a></li>-->
	        <li><a href="<?php echo base_url();?>index.php/Intregation"><i class="fa  fa-cog"></i>Intregation</a></li>
			<!--<li><a href="<?php echo base_url();?>index.php/Suppliercost"><i class="fa  fa-cog"></i>Supplier Cost</a></li>-->
			 <li><a target="_blank" href="<?php echo base_url();?>contact"><i class="fa  fa-info"></i>Contact Us</a></li>
			 <li><a target="_blank"  href="<?php echo base_url();?>contact"><i class="fa  fa-ticket "></i>Support</a></li>
			 </ul> 	
			 </li>
		</ul>
    </section>
    <!-- /.sidebar -->
  </aside>
