<div class="main">
    <div class="container">
      <div class="row">
      	<div class="span12">
      		<div class="widget stacked">	
				<div class="widget-header">
					<i class="icon-check"></i>
                                        <h3><?php echo $widget_header;?></h3>
				</div> <!-- /widget-header -->
				<div class="widget-content">
					<ul class="nav nav-tabs">
					  <li class="active">
					    <a data-toggle="tab" href="#en">English</a>
					  </li>
					  <li class=""><a data-toggle="tab" href="#ar">Arabic</a></li>
					</ul>
					<br />
                                        <form  enctype="multipart/form-data" data-validate="parsley" action="<?php echo base_url('admin/products/'.$controller_action); ?>" method="post" id="validation-form" class="form-horizontal ">
                                    <div class="tab-content">
                                          <div class="control-group">
				            <label class="control-label" for="categoryNameSelect">Select Category</label>
				            <div class="controls">
                                                
                                                <?php echo form_dropdown('categoryNameSelect', $category_names, isset($product->category_id)?$product->category_id: 0, ' data-error-message="You have to select category" data-min="1" id="validateSelect"'); ?>
                                                
				            </div>
				          </div>
                                        <div id="en" class="tab-pane active">
                                            <fieldset>
						    <div class="control-group">
						      <label class="control-label" for="product_name_en">Product Name </label>
						      <div class="controls">
                                                          <input data-required="true" data-trigger="change"  type="text" class="input-large" name="product_name_en"id="name" value="<?php echo set_input($product_info,'name_en'); ?>">
						      </div>
						    </div>
						    
						    <div class="control-group">
						      <label class="control-label" for="product_description">Product Description</label>
						      <div class="controls">
						        <textarea data-required="true" data-trigger="change" class="span4 rich" name="product_description_en" id="message" rows="4"><?php echo set_input($product_info,'description_en'); ?></textarea>
						      </div>
						    </div>
						  </fieldset>
                                        </div>
                                        <div id="ar" class="tab-pane">     
                                           <fieldset>
						    <div class="control-group">
						      <label class="control-label" for="product_name_ar">اسم  </label>
						      <div class="controls">
                                                        <input data-required="true" data-trigger="change"  type="text" class="input-large" name="product_name_ar"id="name" value="<?php echo set_input($product_info,'name_ar'); ?>">
						      </div>
						    </div>
						    
						    <div class="control-group">
						      <label class="control-label" for="product_description">تفصيل</label>
						      <div class="controls">
						        <textarea data-required="true" data-trigger="change" class="span4 rich" name="product_description_ar" id="message" rows="4" ><?php echo set_input($product_info,'description_ar'); ?></textarea>
						      </div>
						    </div>
                                         </fieldset>
                                         </div>
                                          <div class="control-group">
				            <label class="control-label" for="categoryNameSelect">Photo </label>
                                                <div class="controls">
                                                  
                                                    <input  name="product_picture" id="product_picture" type='file' onchange="readURL(this,'product_picture_display');" style="display:none !important;"/>
                                                    <input class="btn" name='upload_btn' value="Browse"  type='button' onclick="trigger_upload('product_picture')"/> 
                                                   
                                                </div>
				          </div>
                                        <div class="control-group">
                                            <div class="controls">
                                                <img  id="product_picture_display" class="instant_display" src="<?php if(isset($product_img)){echo base_url().'uploads/products/small/'.$product_img;}else{echo base_url()."resources/admin/img/no_img.jpg";} ?>"/>  
                                               </div>
                                        </div>
                                    
                                          <div class="control-group">
				            <label class="control-label" for="categoryNameSelect">PDF</label>
                                                <div class="controls">

                                                   <input name="product_pdf" id="product_pdf" type='file'  style="display:none !important;"/>
                                                   <input class="btn" name='upload_btn' value="Browse"  type='button' onclick="trigger_upload('product_pdf')"/> 
                                                </div>
				          </div>
                                        </div>
                                            
                                        <div class="form-actions">
                                                <button type="submit" class="btn btn-danger btn"><?php echo $form_action_button; ?></button>&nbsp;&nbsp;
                                                <button type="reset" class="btn">Cancel</button>
                                        </div>
                                    </form>
				</div> <!-- /widget-content -->
			</div> <!-- /widget -->					
	    </div> <!-- /span12 -->     	
      </div> <!-- /row -->
    </div> <!-- /container -->
</div> <!-- /main -->
