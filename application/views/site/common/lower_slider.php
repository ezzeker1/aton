<div class="container-fluid demo-1">
    <div class="row-fluid">
        <div class="span12">
            <div class="section-header">
                <h1><?php echo lang('home_latest_products'); ?></h1>
            </div>
            <!-- Elastislide Carousel -->
            <ul id="carousel" class="elastislide-list">
                <?php
                if (isset($home_products)) {
                    foreach ($home_products as $product) {
                        ?>
                        <li><a href="<?php echo base_url('product/' . $product->id); ?>"><img src="<?php echo base_url() . 'uploads/products/medium/' . $product->id . '.jpg'; ?>" alt="<?php echo localize($product, 'name'); ?>" /></a>
                            <h1><?php echo localize($product, 'name'); ?></h1>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
            <!-- End Elastislide Carousel -->
        </div>   
    </div>
    <!-- /.row --> 
</div>