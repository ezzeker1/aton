<div class="main">
    <div class="container">
        <div class="row">
            <div class="span12">      	

                <div class="widget stacked ">

                    <div class="widget-header">
                        <i class="icon-pencil"></i>
                        <h3><?php echo $h3; ?></h3>
                    </div> <!-- /widget-header -->
                    <div class="widget-content">
                        <?php echo form_open('admin/settings/update'); ?>
                        <section id="tables">
                            <?php echo $table; ?>
                            <br>

                        </section>		
                        <section>
                            <?php echo $buttons; ?>
                        </section>
                        <?php echo form_close(); ?>
                    </div> <!-- /widget-content -->	
                </div> <!-- /widget -->
            </div> <!-- /span12 -->
        </div> <!-- /row -->
    </div> <!-- /container -->
</div>