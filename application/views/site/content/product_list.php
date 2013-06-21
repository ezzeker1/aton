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

        <?php $this->load->view('site/common/side_products'); ?>

        <div class="span9">  
            <?php
            if (isset($products)) {
                foreach ($products as $product) {
                    ?>
                    <div class="section-header green-title">
                        <h1><?php echo localize($product, 'name'); ?></h1>
                    </div>    
                    <div class="products-list clearfix">    
                        <div class="span4"><img src="<?php echo base_url() . 'uploads/products/medium/' . $product->id . '.jpg'; ?>" width="297" height="249" alt="welcome img"></div> 
                        <div class="span8"><?php echo localize($product, 'description'); ?><a class="btn" href="<?php echo base_url('product/' . $product->id); ?>"><?php echo lang('more'); ?></a></p>

                        </div>  
                    </div>  

                    <?php
                }
            }
            ?>

            <div class="pagination pagination-centered">
                <?= $pages ?>
            </div>

        </div>



    </div>
    <!-- /.row --> 
</div>