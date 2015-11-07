<?php ?>
<ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        
        <li class="treeview">
          <a href="<?php echo $this->webroot.'Admin/dynamic_pages'?>">
            <i class="fa fa-pie-chart"></i>
            <span>CMS</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>              
        </li>
        
        <li class="treeview">
          <a href="<?php echo $this->webroot.'Admin/products'; ?>">
            <i class="fa fa-pie-chart"></i>
            <span>Product Management</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>              
        </li>
        
        <li class="treeview">
          <a href="<?php echo $this->webroot.'Admin/offers'; ?>">
            <i class="fa fa-pie-chart"></i>
            <span>Offer Management</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>              
        </li>
        
        
        <!--<li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>CMS</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php //echo $this->webroot.'pages/charts/chartjs'; ?>"><i class="fa fa-circle-o"></i> View</a></li>
            <li><a href="<?php //echo $this->webroot.'pages/charts/morris'; ?>"><i class="fa fa-circle-o"></i> Edit</a></li>
            <li><a href="<?php //echo $this->webroot.'pages/charts/morris'; ?>"><i class="fa fa-circle-o"></i> Delete</a></li>
          </ul>
        </li>-->
        
        <!--<li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li>-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Layout Options</span>
            <span class="label label-primary pull-right">4</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $this->webroot.'pages/layout/top-nav'; ?>"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="<?php echo $this->webroot.'pages/layout/boxed'; ?>"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="<?php echo $this->webroot.'pages/layout/fixed'; ?>"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="<?php echo $this->webroot.'pages/layout/collapsed-sidebar'; ?>"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul>
        </li>
        <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span> <small class="label pull-right bg-green">new</small>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $this->webroot.'pages/charts/chartjs'; ?>"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="<?php echo $this->webroot.'pages/charts/morris'; ?>"><i class="fa fa-circle-o"></i> Morris</a></li>
            <!--<li><a href="<?php echo $this->webroot.'pages/charts/flot'; ?>"><i class="fa fa-circle-o"></i> Flot</a></li>-->
            <li><a href="<?php echo $this->webroot.'pages/charts/inline'; ?>"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $this->webroot.'pages/UI/general'; ?>"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="<?php echo $this->webroot.'pages/UI/icons'; ?>"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="<?php echo $this->webroot.'pages/UI/buttons'; ?>"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="<?php echo $this->webroot.'pages/UI/sliders'; ?>"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="<?php echo $this->webroot.'pages/UI/timeline'; ?>"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="<?php echo $this->webroot.'pages/UI/modals'; ?>"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href=<?php echo $this->webroot.'pages/forms/general'; ?>"><i class="fa fa-circle-o"></i> General Elements</a></li>
            <li><a href="<?php echo $this->webroot.'pages/forms/advanced'; ?>"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="<?php echo $this->webroot.'pages/forms/editors'; ?>"><i class="fa fa-circle-o"></i> Editors</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $this->webroot.'pages/tables/simple'; ?>"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="<?php echo $this->webroot.'pages/tables/data'; ?>"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li>
        <li>
          <a href="<?php echo $this->webroot.'pages/calendar.php'; ?>">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <small class="label pull-right bg-red">3</small>
          </a>
        </li>
        <li>
          <a href="<?php echo $this->webroot.'pages/mailbox/mailbox.html'; ?>">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <small class="label pull-right bg-yellow">12</small>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Examples</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $this->webroot.'pages/examples/invoice'; ?>"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="<?php echo $this->webroot.'pages/examples/profile'; ?>"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="<?php echo $this->webroot.'pages/examples/login'; ?>"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="<?php echo $this->webroot.'pages/examples/register'; ?>"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="<?php echo $this->webroot.'pages/examples/lockscreen'; ?>"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="<?php echo $this->webroot.'pages/examples/error_one'; ?>"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="<?php echo $this->webroot.'pages/examples/error_two'; ?>"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li><a href="<?php echo $this->webroot.'pages/examples/blank'; ?>"><i class="fa fa-circle-o"></i> Blank Page</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>
        <li><a href="<?php echo $this->webroot.'documentation/index.php'; ?>"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">LABELS</li>
            <li><a href="<?php echo $this->webroot.'pages/UI/general'; ?>"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="<?php echo $this->webroot.'pages/UI/general'; ?>"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="<?php echo $this->webroot.'pages/UI/general'; ?>"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
          </ul>