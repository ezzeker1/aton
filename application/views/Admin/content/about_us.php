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

                        <form  enctype="multipart/form-data"  action="<?php echo base_url('admin/pages/aboutus'); ?>" method="post" id="validation-form" class="form-horizontal ">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a data-toggle="tab" href="#en">English</a>
                                </li>
                                <li class=""><a data-toggle="tab" href="#ar">Arabic</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="en" class="tab-pane active">

                                    <?php foreach ($about as $page) { ?>
                                        <input name="name[]" value="<?php echo $page->name; ?>" type="hidden"/>
                                        <div class="control-group">
                                            <label for="name" class="control-label">Title</label>
                                            <div class="controls">
                                                <input type="text" id="title_en" name="title_en[]" class="input-large" value="<?php echo isset($page->title_en) ? $page->title_en : $this->input->post('title_en'); ?>">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="message" class="control-label">Content</label>
                                            <div class="controls">
                                                <textarea rows="4" id="message" name="content_en[]" class="span4 rich"><?php echo isset($page->content_en) ? $page->content_en : $this->input->post('content_en'); ?></textarea>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>

                                <div id="ar" class="tab-pane">
                                    <?php foreach ($about as $page) { ?>
                                        <div class="control-group">
                                            <label for="name" class="control-label">اسم</label>
                                            <div class="controls">
                                                <input type="text" id="name" name="title_ar[]" class="input-large" value="<?php echo isset($page->title_ar) ? $page->title_ar : $this->input->post('title_ar'); ?>">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="message" class="control-label">تفصيل</label>
                                            <div class="controls">
                                                <textarea rows="4" id="message" name="content_ar[]" class="span4 rich"><?php echo isset($page->content_ar) ? $page->content_ar : $this->input->post('content_ar'); ?></textarea>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-danger btn">Save</button>&nbsp;&nbsp;
                                <button type="reset" class="btn">Cancel</button>
                            </div>
                        </form>
                    </div> <!-- /widget-content -->




                </div> <!-- /widget -->					

            </div> <!-- /span12 -->     	

        </div> <!-- /row -->
    </div> <!-- /container -->
</div>