<!-- inner page Header --> 
<div class="container-fluid no-padding">
    <div class="row-fluid">
        <div class="span12">

            <div class="header-img">
                <h1 class="inner-page-header"><?php echo localize($product, 'name'); ?></h1>
            </div>

        </div>
    </div>
</div>


<div class="container-fluid inner-data-wrap">
    <div class="row-fluid">

        <?php $this->load->view('site/common/side_products'); ?>

        <div class="span9">         
            <div class="product-detail clearfix">
                <div class="span8">
                    <h1 class="product_custom_header"><?php echo localize($product, 'name'); ?></h1>
                    <p><?php echo localize($product, 'description'); ?></p>
                </div>   
                <div class="span4"><img src="<?php echo base_url().'uploads/products/'.$product->id.'/'.$product->id.'.jpg';  ?>" width="297" height="249" alt="welcome img">
                    <div class="section-header">
                        <h1><?php echo lang('download_pdf'); ?></h1>
                    </div>
                    <div class="download-book">
                        <ul>
                            <li class="clearfix"><a href=""><?php echo lang('download'); ?></a><span class="uk-flag"></span></li>
                        </ul>
                    </div>


                </div> 

            </div>  

        </div>



    </div>
    <!-- /.row --> 
</div>