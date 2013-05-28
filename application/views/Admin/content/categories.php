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
					<ul class="nav nav-tabs">
					  <li class="active">
					    <a data-toggle="tab" href="#en">English</a>
					  </li>
					  <li class=""><a data-toggle="tab" href="#ar">Arabic</a></li>
					</ul>
                                    
					<br />

                                        <form data-validate="parsley" action="<?php echo base_url('admin/Categories/'.$controller_action); ?>" method="post" id="validation-form" class="form-horizontal ">
						
                                        <div class="tab-content">
                                            <div id="en" class="tab-pane active">

                                              <fieldset>
						    <div class="control-group">
						      <label class="control-label" for="category_name">Category Name </label>
						      <div class="controls">
                                                          <input data-required="true" data-trigger="change" type="text" class="input-large" name="category_name_en"id="name" value="<?php echo get_product_info($category_info,'name_en'); ?>">
						      </div>
						    </div>
						    
						    <div class="control-group">
						      <label class="control-label" for="category_description">Category Description</label>
						      <div class="controls">
						        <textarea class="span4 rich" name="category_description_en"id="message" rows="4"><?php echo get_product_info($category_info,'description_en');?></textarea>
						      </div>
						    </div>
						    
				         
						  </fieldset>
    
                                                </div>
                                        <div id="ar" class="tab-pane">              
                                              <fieldset>
						    <div class="control-group">
						      <label class="control-label" for="category_name">اسم </label>
						      <div class="controls">
                                                            <input data-required="true" data-trigger="change"  type="text" class="input-large" name="category_name_ar"id="name" value="<?php echo get_product_info($category_info,'name_ar'); ?>">
						      </div>
						    </div>
						    
						    <div class="control-group">
						      <label class="control-label" for="category_description">تفصيل</label>
						      <div class="controls">
						        <textarea class="span4 rich" name="category_description_ar" id="message" rows="4" ><?php echo get_product_info($category_info,'description_ar'); ?></textarea>
						      </div>
						    </div>
						  </fieldset>
                                        </div>
                                        </div>
                                              				          
						    <div class="form-actions">
						      <button type="submit" class="btn btn-danger btn"><?php echo $action_label;?></button>&nbsp;&nbsp;
						      <button type="reset" class="btn">Cancel</button>
						    </div>
						</form>
					
				</div> <!-- /widget-content -->
					
			</div> <!-- /widget -->					
			
	    </div> <!-- /span12 -->     	
      	
      	
      </div> <!-- /row -->

    </div> <!-- /container -->
    
</div> <!-- /main -->