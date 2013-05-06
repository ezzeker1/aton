<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap Elements :: Base Admin</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
    
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/bootstrap-responsive.min.css" rel="stylesheet">
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="./css/font-awesome.min.css" rel="stylesheet">
    
    <link href="./css/ui-lightness/jquery-ui-1.10.0.custom.min.css" rel="stylesheet">
    
    <link href="./css/base-admin-2.css" rel="stylesheet">
    <link href="./css/base-admin-2-responsive.css" rel="stylesheet">

    <link href="./css/custom.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<i class="icon-cog"></i>
			</a>
			
			<a class="brand" href="./index.html">
				Base Admin <sup>2.0</sup>				
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					<li class="dropdown">						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-cog"></i>
							Settings
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
							<li><a href="javascript:;">Account Settings</a></li>
							<li><a href="javascript:;">Privacy Settings</a></li>
							<li class="divider"></li>
							<li><a href="javascript:;">Help</a></li>
						</ul>						
					</li>
			
					<li class="dropdown">						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user"></i> 
							Rod Howard
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
							<li><a href="javascript:;">My Profile</a></li>
							<li><a href="javascript:;">My Groups</a></li>
							<li class="divider"></li>
							<li><a href="javascript:;">Logout</a></li>
						</ul>						
					</li>
				</ul>
			
				<form class="navbar-search pull-right">
					<input type="text" class="search-query" placeholder="Search">
				</form>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->
    



    
<div class="subnavbar">

	<div class="subnavbar-inner">
	
		<div class="container">

			<a class="btn-subnavbar collapsed" data-toggle="collapse" data-target=".subnav-collapse">
				<i class="icon-reorder"></i>
			</a>

			<div class="subnav-collapse collapse">
				<ul class="mainnav">
				
					<li class="">
						<a href="./index.html">
							<i class="icon-home"></i>
							<span>Home</span>
						</a>	    				
					</li>
					
					<li class="dropdown active">					
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-th"></i>
							<span>Components</span>
							<b class="caret"></b>
						</a>	    
					
						<ul class="dropdown-menu">
							<li><a href="./elements.html">Elements</a></li>
							<li><a href="./validation.html">Validation</a></li>
							<li><a href="./jqueryui.html">jQuery UI</a></li>
							<li><a href="./charts.html">Charts</a></li>
							<li><a href="./popups.html">Popups/Notifications</a></li>
						</ul> 				
					</li>
					
					<li class="dropdown">					
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-copy"></i>
							<span>Sample Pages</span>
							<b class="caret"></b>
						</a>	    
					
						<ul class="dropdown-menu">
							<li><a href="./pricing.html">Pricing Plans</a></li>
							<li><a href="./faq.html">FAQ's</a></li>
							<li><a href="./gallery.html">Gallery</a></li>
							<li><a href="./reports.html">Reports</a></li>
							<li><a href="./account.html">User Account</a></li>
						</ul> 				
					</li>
					
					<li class="dropdown">					
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-external-link"></i>
							<span>Extra Pages</span>
							<b class="caret"></b>
						</a>	
					
						<ul class="dropdown-menu">
							<li><a href="./login.php.html">Login</a></li>
							<li><a href="./signup.html">Signup</a></li>
							<li><a href="./error.html">Error</a></li>
							<li class="dropdown-submenu">
			                  <a tabindex="-1" href="#">Dropdown menu</a>
			                  <ul class="dropdown-menu">
			                    <li><a tabindex="-1" href="#">Second level link</a></li>
			                    <li><a tabindex="-1" href="#">Second level link</a></li>
			                    <li><a tabindex="-1" href="#">Second level link</a></li>
			                  </ul>
			                </li>
						</ul>    				
					</li>
				
				</ul>
			</div> <!-- /.subnav-collapse -->

		</div> <!-- /container -->
	
	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->
    
    

<div class="main">

    <div class="container">

      <div class="row">
      	
      	<div class="span12">      		
      		
      		<div class="widget stacked ">
      			
      			<div class="widget-header">
      				<i class="icon-pencil"></i>
      				<h3>Bootstrap Elements</h3>
  				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					
				<br />
					
					<section id="buttons">
					<h3>Buttons</h3>
					
					<a href="javascript:;" class="btn btn-large btn-primary">Primary Button</a>&nbsp;&nbsp;&nbsp;
					<a href="javascript:;" class="btn btn-large btn-secondary">Secondary Button</a>&nbsp;&nbsp;&nbsp;
					<a href="javascript:;" class="btn btn-large btn-tertiary">Tertiary Button</a>&nbsp;&nbsp;&nbsp;
					<a href="javascript:;" class="btn btn-large">Default Button</a>
						      
						</section>
				
				<br />
				<br />
				<br />
				<br />
					
					
					
					<section id="accordions">
					    <h3>Accordion</h3>
				          
						
						<div class="accordion" id="basic-accordion">
				            <div class="accordion-group">
				              <div class="accordion-heading">
				                <a class="accordion-toggle" data-toggle="collapse" data-parent="#basic-accordion" href="#collapseOne">
				                  Collapsible Group Item #1
				                </a>
				              </div>
				              <div id="collapseOne" class="accordion-body in collapse">
				                <div class="accordion-inner">
				                  <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt.</p>
				                  
				                  <p>Vivamus ac velit eget turpis pharetra placerat bibendum at risus. Vestibulum a sodales mauris. Curabitur et nibh nunc.</p>
				                </div>
				              </div>
				            </div>
				            <div class="accordion-group">
				              <div class="accordion-heading">
				                <a class="accordion-toggle" data-toggle="collapse" data-parent="#basic-accordion" href="#collapseTwo">
				                  Collapsible Group Item #2
				                </a>
				              </div>
				              <div id="collapseTwo" class="accordion-body collapse">
				                <div class="accordion-inner">
				                  <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqu.</p>
				                  
				                  <p>Vivamus ac velit eget turpis pharetra placerat bibendum at risus. Vestibulum a sodales mauris. Curabitur et nibh nunc.</p>
				                </div>
				              </div>
				            </div>
				            <div class="accordion-group">
				              <div class="accordion-heading">
				                <a class="accordion-toggle" data-toggle="collapse" data-parent="#basic-accordion" href="#collapseThree">
				                  Collapsible Group Item #3
				                </a>
				              </div>
				              <div id="collapseThree" class="accordion-body collapse">
				                <div class="accordion-inner">
				                  <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3.</p>
				                  
				                  <p>Vivamus ac velit eget turpis pharetra placerat bibendum at risus. Vestibulum a sodales mauris. Curabitur et nibh nunc.</p>
				                  
				                </div>
				              </div>
				            </div>
				          </div>
							      
							</section>
							
							
							
							
							
							<br />
				<br />
				<br />
				
				
				
				
				
				<section id="progress-bars">
					<h3>Progress Bars</h3>
					
					<br />
					
					<h5>Primary Progress</h5>
					
					<div class="progress progress-primary">
						<div class="bar" style="width: 12%"></div> <!-- /.bar -->				
					</div> <!-- /.progress -->
					
					<div class="progress progress-primary progress-striped active">
						<div class="bar" style="width: 25%"></div> <!-- /.bar -->				
					</div> <!-- /.progress -->
					
					<br />
					
					<h5>Secondary Progress</h5>
					
					<div class="progress progress-secondary">
						<div class="bar" style="width: 37%"></div> <!-- /.bar -->				
					</div> <!-- /.progress -->
					
					<div class="progress progress-secondary progress-striped active">
						<div class="bar" style="width: 50%"></div> <!-- /.bar -->				
					</div> <!-- /.progress -->
					
					<br />
					
					<h5>Tertiary Progress</h5>
					
					<div class="progress progress-tertiary">
						<div class="bar" style="width: 63%"></div> <!-- /.bar -->				
					</div> <!-- /.progress -->
					
					<div class="progress progress-tertiary progress-striped active">
						<div class="bar" style="width: 75%"></div> <!-- /.bar -->				
					</div> <!-- /.progress -->
					
				</section>
							
							
				
					
							
							<br />
							<br />
							<br />
							
							<section id="modals">
					<h3>Modal</h3>
					
					<a class="btn" data-toggle="modal" href="#myModal" >Launch Modal</a>
						      
						</section>
						
						
						
						<br />
			    <br />
			    <br />
			    <br />
			    
				
				
				
			    
				<section id="dropdowns">
				    <h3>Dropdowns</h3>
				    
				    
				    
				    <div class="dropdown clearfix">
	              <ul class="dropdown-menu" style="display: block; position: static; margin-bottom: 5px; width: 180px;">
	                <li><a tabindex="-1" href="javascript:;"><i class="icon-star"></i> Action</a></li>
	                <li><a tabindex="-1" href="javascript:;"><i class="icon-asterisk"></i> Another action</a></li>
	                <li><a tabindex="-1" href="javascript:;"><i class="icon-bookmark"></i> Something else here</a></li>
	                <li class="divider"></li>
	                <li class="dropdown-submenu">
	                  <a tabindex="-1" href="javascript:;">More options</a>
	                  <ul class="dropdown-menu">
	                    <li><a tabindex="-1" href="javascript:;">Second level link</a></li>
	                    <li><a tabindex="-1" href="javascript:;">Second level link</a></li>
	                    <li><a tabindex="-1" href="javascript:;">Second level link</a></li>
	                    <li><a tabindex="-1" href="javascript:;">Second level link</a></li>
	                    <li><a tabindex="-1" href="javascript:;">Second level link</a></li>
	                  </ul>
	                </li>
	              </ul>
	            </div>
						      
						</section>
						
						
						
						
						
						<br />
				<br />
				<br />
				<br />



				<section id="paginations">
					<h3>Pagination</h3>
					
					<div class="pagination">
					  <ul>
					    <li><a href="javascript:;">Prev</a></li>
					    <li class="active">
					      <a href="javascript:;">1</a>
					    </li>
					    <li><a href="javascript:;">2</a></li>
					    <li><a href="javascript:;">3</a></li>
					    <li><a href="javascript:;">4</a></li>
					    <li><a href="javascript:;">Next</a></li>
					  </ul>
					</div>
						      
						</section>

				<br />
				<br />
				<br />
				
				
				
				
				
				
				
				<section id="tables">
					<h3>Tables</h3>
					
					
					
					<table class="table table-bordered table-striped table-highlight">
						        <thead>
						          <tr>
						            <th>#</th>
						            <th>First Name</th>
						            <th>Last Name</th>
						            <th>Username</th>
						          </tr>
						        </thead>
						        <tbody>
						          <tr>
						            <td>1</td>
						            <td>Michael</td>
						            <td>Jordan</td>
						            <td>@mjordan</td>
						          </tr>
						          <tr>
						            <td>2</td>
						            <td>Magic</td>
						            <td>Johnson</td>
						            <td>@mjohnson</td>
						          </tr>
						          <tr>
						            <td>3</td>
						            <td>Larry</td>
						            <td>the Bird</td>
						            <td>@twitter</td>
						          </tr>
						          <tr>
						            <td>4</td>
						            <td>Charles</td>
						            <td>Barkley</td>
						            <td>@cbark</td>
						          </tr>
						          <tr>
						            <td>5</td>
						            <td>Karl</td>
						            <td>Malone</td>
						            <td>@kmalone</td>
						          </tr>
						        </tbody>
						      </table>
						      
						      
						      <br />
						      
						      
					<table class="table table-bordered table-striped">
						        <thead>
						          <tr>
						            <th>#</th>
						            <th>First Name</th>
						            <th>Last Name</th>
						            <th>Username</th>
						          </tr>
						        </thead>
						        <tbody>
						          <tr>
						            <td>1</td>
						            <td>Michael</td>
						            <td>Jordan</td>
						            <td>@mjordan</td>
						          </tr>
						          <tr>
						            <td>2</td>
						            <td>Magic</td>
						            <td>Johnson</td>
						            <td>@mjohnson</td>
						          </tr>
						          <tr>
						            <td>3</td>
						            <td>Larry</td>
						            <td>the Bird</td>
						            <td>@twitter</td>
						          </tr>
						          <tr>
						            <td>4</td>
						            <td>Charles</td>
						            <td>Barkley</td>
						            <td>@cbark</td>
						          </tr>
						          <tr>
						            <td>5</td>
						            <td>Karl</td>
						            <td>Malone</td>
						            <td>@kmalone</td>
						          </tr>
						        </tbody>
						      </table>
						      
						      
						      
						<br />
						
						
						      
						</section>
					      
						
					
					
					
				</div> <!-- /widget-content -->
					
			</div> <!-- /widget -->
      		
	    </div> <!-- /span12 -->
      	
      </div> <!-- /row -->

    </div> <!-- /container -->
    
</div> <!-- /main -->
    
    
    
 
<div class="extra">

	<div class="container">

		<div class="row">
			
			<div class="span3">
				
				<h4>About</h4>
				
				<ul>
					<li><a href="javascript:;">About Us</a></li>
					<li><a href="javascript:;">Twitter</a></li>
					<li><a href="javascript:;">Facebook</a></li>
					<li><a href="javascript:;">Google+</a></li>
				</ul>
				
			</div> <!-- /span3 -->
			
			<div class="span3">
				
				<h4>Support</h4>
				
				<ul>
					<li><a href="javascript:;">Frequently Asked Questions</a></li>
					<li><a href="javascript:;">Ask a Question</a></li>
					<li><a href="javascript:;">Video Tutorial</a></li>
					<li><a href="javascript:;">Feedback</a></li>
				</ul>
				
			</div> <!-- /span3 -->
			
			<div class="span3">
				
				<h4>Legal</h4>
				
				<ul>
					<li><a href="javascript:;">License</a></li>
					<li><a href="javascript:;">Terms of Use</a></li>
					<li><a href="javascript:;">Privacy Policy</a></li>
					<li><a href="javascript:;">Security</a></li>
				</ul>
				
			</div> <!-- /span3 -->
			
			<div class="span3">
				
				<h4>Settings</h4>
				
				<ul>
					<li><a href="javascript:;">Consectetur adipisicing</a></li>
					<li><a href="javascript:;">Eiusmod tempor </a></li>
					<li><a href="javascript:;">Fugiat nulla pariatur</a></li>
					<li><a href="javascript:;">Officia deserunt</a></li>
				</ul>
				
			</div> <!-- /span3 -->
			
		</div> <!-- /row -->

	</div> <!-- /container -->

</div> <!-- /extra -->


    
    
<div class="footer">
		
	<div class="container">
		
		<div class="row">
			
			<div id="footer-copyright" class="span6">
				&copy; 2012-13 Jumpstart UI.
			</div> <!-- /span6 -->
			
			<div id="footer-terms" class="span6">
				Theme by <a href="http://jumpstartui.com" target="_blank">Jumpstart UI</a>
			</div> <!-- /.span6 -->
			
		</div> <!-- /row -->
		
	</div> <!-- /container -->
	
</div> <!-- /footer -->
    

<div class="modal fade hide" id="myModal">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h3>Modal header</h3>
  </div>
  <div class="modal-body">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </div>
  <div class="modal-footer">
    <a href="javascript:;" class="btn" data-dismiss="modal">Close</a>
    <a href="javascript:;" class="btn btn-primary">Save changes</a>
  </div>
</div>



<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="./js/libs/jquery-1.8.3.min.js"></script>
<script src="./js/libs/jquery-ui-1.10.0.custom.min.js"></script>
<script src="./js/libs/bootstrap.min.js"></script>

<script src="./js/Application.js"></script>


  </body>
</html>
