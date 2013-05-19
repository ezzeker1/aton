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
    
    <div class="span3">    
    
     
           
 
    
    <div class="accordion" id="accordion2">
        <?php if(isset($categories)){  
                 foreach($categories as $category){ ?>
                <div class="accordion-group">
                  <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                    <?php echo $category->name_ar;?>
                    </a>
                  </div>
                    <?php if(isset($products)){
                             foreach($products as $product){
                                 if($product->category_id == $category->id){?>
                                 
                  <div id="collapseOne" class="accordion-body collapse in">
                    <div class="accordion-inner">
                      <?php echo $product->name_ar?>
                    </div>
                  </div>
 <?php                                       }            
                                                          }
                                                                           }
?>
                </div>
        <?php }}?>
              </div>
              
                  
    
    </div>
    <?php if(isset($products)){
     foreach ($products as $product){
   
?>
    <div class="span9">    
    <div class="section-header green-title">
        <h1><?php echo $product->name_ar;?></h1>
    </div>    
    <div class="products-list clearfix">    
   <div class="span4"><img src="<?php echo base_url(); ?>resources/site/images/product_list-1.jpg" width="297" height="249" alt="welcome img"></div> 
   <div class="span8"><?php echo $product->description_ar;?><a class="btn" href="<?php echo base_url('product/'.$product->id); ?>">المزيد</a></p>
    
     </div>  
    </div>  
 
    </div>
    <?php
          
     }
    }
    ?>
   
    
    </div>
    <!-- /.row --> 
    </div>
   <?=$pages?>