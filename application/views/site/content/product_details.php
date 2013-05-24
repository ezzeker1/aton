<!-- inner page Header --> 
<div class="container-fluid no-padding">
    <div class="row-fluid">
        <div class="span12">

            <div class="header-img">
                <h1 class="inner-page-header">أسم المنتج</h1>
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
                    <h4><?php echo localize($product, 'name'); ?></h4>
                    <p><?php echo localize($product, 'description'); ?></p>
                    <div class="products-features">
                        <div class="section-header">
                            <h1>فوائد المنتج</h1>
                        </div>
                        <ul>
                            <li>فوائد</li>
                            <li>فوائد</li>
                            <li>فوائد</li>
                            <li>فوائد</li>
                            <li>فوائد</li>
                        </ul>
                    </div>

                    <div class="products-features">
                        <div class="section-header">
                            <h1>مميزات المنتج</h1>
                        </div>
                        <ul>
                            <li>مميزات </li>
                            <li>مميزات </li>
                            <li>مميزات </li>
                            <li>مميزات </li>
                            <li>مميزات </li>
                        </ul>
                    </div>

                </div>   
                <div class="span4"><img src="<?php echo base_url(); ?>resources/site/images/product_list-1.jpg" width="297" height="249" alt="welcome img">
                    <div class="section-header">
                        <h1>تحميل كتيب وصف المنتج</h1>
                    </div>
                    <div class="download-book">
                        <ul>
                            <li class="clearfix"><a href="">تحميل</a><span class="uk-flag"></span></li>
                        </ul>
                    </div>


                </div> 

            </div>  

        </div>



    </div>
    <!-- /.row --> 
</div>