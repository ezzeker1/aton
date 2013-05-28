<!-- inner page Header --> 
<div class="container-fluid no-padding">
    <div class="row-fluid">
        <div class="span12">

            <div class="header-img">
                <h1 class="inner-page-header">منتجاتنا</h1>
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
                        <div class="span4"><img src="<?php echo base_url(); ?>resources/site/images/product_list-1.jpg" width="297" height="249" alt="welcome img"></div> 
                        <div class="span8"><?php echo localize($product, 'description'); ?><a class="btn" href="<?php echo base_url('product/' . $product->id); ?>">المزيد</a></p>

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