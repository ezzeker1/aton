<script type="text/javascript">
        $(document).ready(function() {
	var oTable = $('#big_table').dataTable( {
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": '<?php echo base_url();?>admin/<?php echo $this->uri->segment(2); ?>/datatable',
                "sPaginationType": "full_numbers",
                "iDisplayStart ":20,
                "oLanguage": {
            "sProcessing": "<img id=\"datatable_loader\" src='<?php echo base_url(); ?>style/images/ajax-loader_dark.gif'>"
        },  
        "fnInitComplete": function() {
                oTable.fnAdjustColumnSizing();
                init_spinner('<?php echo $this->uri->segment(2); ?>');
         },
        'fnServerData': function(sSource, aoData, fnCallback)
            {
              $.ajax
              ({
                'dataType': 'json',
                'type'    : 'POST',
                'url'     : sSource,
                'data'    : aoData,
                'success' : fnCallback
              });
             
            }
	} );
} );
</script>
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
                                    <section>
                                 <?php echo $buttons; ?>
                                    </section>
				<section id="tables">
					<h3><?php echo $tableTitle; ?></h3>
                                        <?php echo $this->table->generate(); ?>
						      <br>
						         
						</section>		
				</div> <!-- /widget-content -->	
			</div> <!-- /widget -->
	    </div> <!-- /span12 -->
      </div> <!-- /row -->
    </div> <!-- /container -->
</div>