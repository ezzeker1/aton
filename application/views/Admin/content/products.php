<div class="main">

    <div class="container">

      <div class="row">
      	
      	<div class="span12">
      		
      		<div class="widget stacked">
					
				<div class="widget-header">
					<i class="icon-check"></i>
					<h3>Add Category</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<br />
					<div class="control-group">
				            <label class="control-label" for="categoryNameSelect">Select Category</label>
				            <div class="controls">
				              <select id="validateSelect" name="categoryNameSelect">
				                <option value="">Select...</option>
				                <?php foreach($category_names as $category_name)
                                                echo"<option value='".$category_name->name."'>".$category_name->name."</option>";
				                ?>
				              </select>
				            </div>
				          </div>
                                        <form action=<?echo base_url()?>Admin/Categories/add_product method="post" id="validation-form" class="form-horizontal ">
						<fieldset>
						    <div class="control-group">
						      <label class="control-label" for="product_name">Product Name </label>
						      <div class="controls">
                                                          <?php echo '<font color="red">'.form_error('product_name').'</font>'; ?>
                                                        <input type="text" class="input-large" name="product_name"id="name">
						      </div>
						    </div>
						    
						    <div class="control-group">
						      <label class="control-label" for="product_description">Product Description</label>
						      <div class="controls">
						        <textarea class="span4" name="product_description"id="message" rows="4"></textarea>
						      </div>
						    </div>
						    
				          
						    <div class="form-actions">
						      <button type="submit" class="btn btn-danger btn">Add</button>&nbsp;&nbsp;
						      <button type="reset" class="btn">Cancel</button>
						    </div>
						  </fieldset>
						</form>
					
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

