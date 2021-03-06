<div class="main">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="widget stacked">		
                    <div class="widget-header">
                        <i class="icon-th-large"></i>
                        <h3>Image Gallery</h3>
                    </div> <!-- /widget-header -->		
                    <div class="widget-content">

                        <ul class="gallery-container">

                            <?php foreach ($images as $image) { ?>
                                <li>

                                    <a href="<?php echo $image['url']; ?>" class="ui-lightbox">
                                        <img src="<?php echo $image['thumb_url']; ?>" alt="" />
                                    </a>

                                    <a href="<?php echo $image['url']; ?>" class="preview"></a>
                                    <a class="btn btn-small btn-danger confirm-popup btn-warning" 
                                       href="<?php echo base_url('admin/gallery/delete/' . basename($image['url'] ). '/gallery?backuri=gallery'); ?>">
                                        <i class="btn-icon-only icon-remove">X</i>										
                                    </a>
                                </li>
                            <?php } ?>

                        </ul>

                    </div> <!-- /widget-content -->			
                </div> <!-- /widget -->						
            </div> <!-- /span12 -->     	
        </div> <!-- /row -->
        <div class="row">
            <div class="span12">
                <div class="widget stacked">			
                    <div class="widget-header">
                        <i class="icon-check"></i>
                        <h3>Add new photo</h3>
                    </div> <!-- /widget-header -->	
                    <div class="widget-content">
                        <br />
                        <form data-validate="parsley"  method="POST"  enctype="multipart/form-data" action="<?php echo base_url('admin/gallery/add/gallery?backuri=gallery'); ?>" id="validation-form" class="form-horizontal">
                            <fieldset>
                                <div class="control-group">
                                    <label class="control-label" for="name">Caption</label>
                                    <div class="controls">
                                        <input data-required="true" data-trigger="change" data-type="alphanum" type="text" class="input-large" name="caption" id="name">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="email">Upload photo</label>
                                    <div class="controls">
                                        <input type="file" class="input-large" name="userfile" id="photo">
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-danger btn">Add</button>
                                    <button type="reset" class="btn">Cancel</button>
                                </div>
                            </fieldset>
                        </form>

                    </div> <!-- /widget-content -->

                </div> <!-- /widget -->					
            </div>
        </div>

    </div> <!-- /container -->
</div> <!-- /main -->