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

        <?php foreach($about_us as $page) { ?>
               <div class="span4">    
            <div class="section-header green-title">
                <h1><?php echo lang($page->name); ?></h1>
            </div>    
            <div class="welcome-data">    
                <img src="<?php base_url(); ?>uploads/aboutus/<?php echo $page->name.'.jpg'; ?>" width="769" height="183" alt="welcome img">
                <h3><?php echo localize($page, 'title');  ?></h3>
                <p><?php echo localize($page, 'content');  ?></p>
            </div>      
        </div>
        <?php } ?>

    </div>
    <!-- /.row --> 
</div>