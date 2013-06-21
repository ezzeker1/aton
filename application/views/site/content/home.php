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
            <h1><?php echo lang('home_common_application'); ?></h1>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row-fluid">
        <?php
        if (isset($home_applications)) {
            foreach ($home_applications as $application) {
                ?>
                <div class="span3">
                    <div class="products">
                        <img src="<?php if(isset($application->images[0]['thumb_url']) ) echo $application->images[0]['thumb_url'] ; ?>" alt="<?php echo localize($application, 'title'); ?>">
                        <h3><?php echo localize($application, 'title'); ?></h3>
                        <p><?php echo substr( localize($application, 'description'),0,300);   ?></p>
                     
                        <a class="btn" href="<?php echo base_url('applications/'.$application->id); ?>"><?php echo lang('more'); ?></a>
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
                <h1><?php echo localize($page_home, 'title'); ?></h1>
            </div>

            <div class="welcome-data">

                <img src="<?php echo base_url(); ?>resources/site/images/welcome.jpg" width="769" height="183" alt="welcome img">

                <p>
                    <?php echo localize($page_home, 'content'); ?> 
                </p>


            </div>   


        </div>
        <div class="span4">
            <div class="partners-wrap">
                <h1 class="green-title" style="font-size:15px; font-weight: bold;"><?php echo lang('home_distributor_of'); ?></h1>
                <div class="partners" >

                    <!-- Elastislide Carousel -->
                    <ul  >
                        <li><a href="#"><img src="<?php base_url(); ?>resources/site/images/lorentz-logo.png" alt="Lorentz" /></a></li>
                        <li><a href="#"><img src="<?php base_url(); ?>resources/site/images/suntech.jpg" alt="Sun tech" /></a></li>
                        <li><a href="#"><img src="<?php base_url(); ?>resources/site/images/deka.jpg" alt="Deka solar" /></a></li>
                        <li><a href="#"><img src="<?php base_url(); ?>resources/site/images/candian.jpg" alt="Canadian solar" /></a></li>
							 					
                    </ul>
                    <!-- End Elastislide Carousel -->

                </div>

                <div class="quotation">
                    <h1 class="green-title"><?php echo lang('home_quote');?>  </h1>
                    <br class="clear"/>
                    <p><?php echo lang('home_quote_text');?></p>
                    <a class="" href="<?php echo base_url('quote'); ?>"><?php echo lang('more'); ?></a>

                </div>
                <br><br><br><br><br><br>
            </div>
        </div>  
    </div>
    <!-- /.row --> 
</div>