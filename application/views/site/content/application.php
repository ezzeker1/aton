<!-- inner page Header --> 
<div class="container-fluid no-padding">
    <div class="row-fluid">
        <div class="span12">
            <div class="header-img">

            </div>
        </div>
    </div>
</div>
<div class="container-fluid inner-data-wrap">
    <div class="row-fluid">
        <div class="span8">
            <div class="section-header">
                <h1><?php echo localize($application, 'title'); ?></h1>
            </div>
            <div class="welcome-data">
                <div class="callbacks_container">
                    <ul class="rslides" id="slider3">
                        <?php
                        if (isset($images)) {
                            foreach ($images as $image) {
                                ?>
                                <li>
                                    <img src="<?php echo $image['url']; ?>" alt="" />
                                   
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
                <p><?php echo localize($application, 'description'); ?></p>
            </div>
            <?php
            $path = realpath(APPPATH . '../uploads/applications/' . $application->id . '/pdf/' . $application->id . '.pdf');
            if (is_file($path)) {
                ?>
                <a href="<?php echo base_url() . 'uploads/applications/' . $application->id . '/pdf/' . $application->id . '.pdf'; ?>">
                    <h1><?php echo lang('download_pdf')?></h1>
                </a>
            <?php } ?>

        </div>
        <div class="span4">
            <div class="section-header">
                <h1><?php echo lang('related_products'); ?></h1>
            </div>
            <div class="same-as-products">
                <ul>
                    <?php
                    if (isset($related_products)) {
                        foreach ($related_products as $product) {
                            ?>
                            <li>
                                <a href="<?php echo base_url('product/' . $product->id); ?>">
                                    <h4>  <?php echo localize($product, 'name'); ?></h4>
                                </a>
                                <p> <?php echo localize($product, 'description'); ?></p>
                            </li>
                        <?php
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>  
    </div>
    <!-- /.row --> 
</div>