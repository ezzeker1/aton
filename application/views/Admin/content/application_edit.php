<div class="main">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="widget stacked">	
                    <div class="widget-header">
                        <i class="icon-check"></i>
                        <h3><?php echo $h3; ?></h3>
                    </div> <!-- /widget-header -->
                    <div class="widget-content">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a data-toggle="tab" href="#en">English</a>
                            </li>
                            <li class=""><a data-toggle="tab" href="#ar">Arabic</a></li>
                        </ul>
                        <br />
                        <form  enctype="multipart/form-data" data-validate="parsley" action="<?php echo base_url('admin/applications/' . $controller_action); ?>" method="post" id="validation-form" class="form-horizontal ">
                            <div class="tab-content">

                                <div id="en" class="tab-pane active">
                                    <fieldset>
                                        <div class="control-group">
                                            <label class="control-label" for="title_en">Product Name </label>
                                            <div class="controls">
                                                <input data-required="true" data-trigger="change"  type="text" class="input-large" name="title_en"id="name" value="<?php echo set_input($application, 'ttle_en'); ?>">
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="description_en">Product Description</label>
                                            <div class="controls">
                                                <textarea data-required="true" data-trigger="change" class="span4 rich" name="description_en" id="message" rows="4"><?php echo set_input($application, 'description_en'); ?></textarea>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div id="ar" class="tab-pane">     
                                    <fieldset>
                                        <div class="control-group">
                                            <label class="control-label" for="title_ar">اسم  </label>
                                            <div class="controls">
                                                <input data-required="true" data-trigger="change"  type="text" class="input-large" name="title_ar"id="name" value="<?php echo set_input($application, 'ttle_ar'); ?>">
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="description_ar">تفصيل</label>
                                            <div class="controls">
                                                <textarea data-required="true" data-trigger="change" class="span4 rich" name="description_ar" id="message" rows="4" ><?php echo set_input($application, 'description_ar'); ?></textarea>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="categoryNameSelect">Photo </label>
                                    <div class="controls">
                                        <?php
                                        foreach ($related_products as $id => $product) {
                                            ?>
                                            <label class="checkbox">
                                                <?php echo $product; ?>
                                                <input type="checkbox" value="<?php echo $id; ?>" name="related_products[]">
                                            </label>
                                        <?php }
                                        ?>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="categoryNameSelect">Photo </label>
                                    <div class="controls">

                                        <input type="file" name="userfile[]" t class="btn"  multiple/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="application_pdf">PDF</label>
                                    <div class="controls">

                                        <input name="application_pdf" id="application_pdf" type='file'  style="display:none !important;"/>
                                        <input class="btn" name='upload_btn' value="Browse"  type='button' onclick="trigger_upload('application_pdf')"/> 
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
