<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide">
    <div class="carousel-inner">
        <?php
        if (isset($slider_images)) {
            foreach ($slider_images as $key => $image) {
                ?>
                <div class="item <?php echo $key == 0 ? 'active' : ''; ?>"> <img src="<?php echo $image['url']; ?>" alt="">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1 class="lead"> <?php echo humanize(strip_ext(basename($image['url']))); ?> </h1>

                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">›</a> <a class="right carousel-control" href="#myCarousel" data-slide="next">‹</a> </div>
<!-- /.carousel --> 

<div class="container-fluid">
    <div class="row-fluid">
        <div class="section-header">
            <h1><?php echo lang('home_latest_products'); ?></h1>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row-fluid">
        <?php
        if (isset($home_products)) {
            foreach ($home_products as $product) {
                ?>
                <div class="span3">
                    <div class="products">
                        <img src="<?php base_url(); ?>resources/site/images/pro-1.jpg" alt="product 1">
                        <h3><?php echo localize($product, 'name'); ?></h3>
                        <p><?php echo substr( localize($product, 'description'),0,300);   ?></p>
                     
                        <a class="btn" href="<?php echo base_url('product/'.$product->id); ?>"><?php echo lang('more'); ?></a>
                    </div>        
                </div>
                <?php
            }
        }
        ?>

    </div>
    <!-- /.row --> 
</div>

<div class="container-fluid">
    <div class="row-fluid">

        <div class="span8">

            <div class="section-header green-title">
                <h1><?php echo lang('home_welcome') ?></h1>
            </div>

            <div class="welcome-data">

                <img src="<?php base_url(); ?>resources/site/images/welcome-img.jpg" width="769" height="183" alt="welcome img">
                <h3><?php echo localize($page_home, 'title'); ?></h3>
                <p>
                    <?php echo localize($page_home, 'content'); ?> 
                </p>


            </div>   


        </div>
        <div class="span4">
            <div class="partners-wrap">
                <h1 class="green-title"><?php echo lang('home_distributor_of'); ?></h1>
                <div class="partners-slider demo-2">

                    <!-- Elastislide Carousel -->
                    <ul id="carousel-2" class="elastislide-list">
                        <li><a href="#"><img src="<?php base_url(); ?>resources/site/images/lorentz-logo.png" alt="image01" /></a></li>
                        <li><a href="#"><img src="<?php base_url(); ?>resources/site/images/lorentz-logo.png" alt="image02" /></a></li>
                        <li><a href="#"><img src="<?php base_url(); ?>resources/site/images/lorentz-logo.png" alt="image03" /></a></li>
                        <li><a href="#"><img src="<?php base_url(); ?>resources/site/images/lorentz-logo.png" alt="image04" /></a></li>
                        <li><a href="#"><img src="<?php base_url(); ?>resources/site/images/lorentz-logo.png" alt="image01" /></a></li>
                        <li><a href="#"><img src="<?php base_url(); ?>resources/site/images/lorentz-logo.png" alt="image02" /></a></li>
                        <li><a href="#"><img src="<?php base_url(); ?>resources/site/images/lorentz-logo.png" alt="image03" /></a></li>									 					
                    </ul>
                    <!-- End Elastislide Carousel -->

                </div>

                <div class="quotation">
                    <h1 class="green-title"><?php echo lang('home_quote');?>  </h1>
                    <p><?php echo lang('home_quote_text');?></p>
                    <a class="" href="<?php echo base_url('quote'); ?>"><?php echo lang('more'); ?></a>

                </div>
                <br><br><br><br><br><br>
            </div>
        </div>  
    </div>
    <!-- /.row --> 
</div>