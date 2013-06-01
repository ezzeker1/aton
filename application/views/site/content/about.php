<!-- inner page Header --> 
<div class="container-fluid no-padding">
    <div class="row-fluid">
        <div class="span12">

            <div class="header-img">
                <h1 class="inner-page-header"> <?php echo lang('about_aboutus'); ?></h1>
            </div>

        </div>
    </div>
</div>

<div class="container-fluid inner-data-wrap">
    <div class="row-fluid">

        <?php foreach($about_us as $page) { ?>
               <div class="span4">    
            <div class="section-header green-title">
                <h1><?php echo lang($page->name); ?></h1>
            </div>    
            <div class="welcome-data">    
                <img src="<?php base_url(); ?>resources/site/images/about-1.png" width="769" height="183" alt="welcome img">
                <h3><?php echo localize($page, 'title');  ?></h3>
                <p><?php echo localize($page, 'content');  ?></p>
            </div>      
        </div>
        <?php } ?>

    </div>
    <!-- /.row --> 
</div>