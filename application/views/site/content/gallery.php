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

        <div class="span12">    
            <div class="section-header green-title">
                <h1><?php echo lang('gallery'); ?></h1>
            </div>    
            <div class="content">
                <div id="rg-gallery" class="rg-gallery">
                    <div class="rg-thumbs">
                        <!-- Elastislide Carousel Thumbnail Viewer -->
                        <div class="es-carousel-wrapper">
                            <div class="es-nav">
                                <span class="es-nav-prev">Previous</span>
                                <span class="es-nav-next">Next</span>
                            </div>
                            <div class="es-carousel">
                                <ul>
                                    <?php foreach($images as $image) { ?>
                                    <li>
                                        <a href="#">
                                            <img src="<?php echo $image['thumb_url']; ?>"
                                                 data-large="<?php echo $image['url']; ?>" 
                                                 alt="<?php echo $image['caption']; ?>" 
                                                 data-description="<?php echo $image['caption']; ?>" />
                                        </a>
                                    </li>   
                                    <?php }?>
                                </ul>
                            </div>
                        </div>
                        <!-- End Elastislide Carousel Thumbnail Viewer -->
                    </div><!-- rg-thumbs -->
                </div><!-- rg-gallery -->
            </div><!-- content -->
        </div>
    </div>
    <!-- /.row --> 
</div>
