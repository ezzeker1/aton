<div class="span3">    
    <div class="accordion-wrap">
        <div id="accordion-container">
            <?php
            if (isset($categories)) {
                foreach ($categories as $category) {
                    ?>
                    <h2 class="accordion-header">       <?php echo localize($category, 'name'); ?></h2>
                    <div class="accordion-content">
                        <ul>
                            <?php
                            if (isset($side_products)) {
                                foreach ($side_products as $product) {
                                    if ($product->category_id == $category->id) {
                                        ?>
                                        <li><a href="<?php echo base_url('product/' . $product->id); ?>">          <?php echo localize($product, 'name'); ?></a></li>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <?php
                }
            }
            ?>
        </div>

    </div>
</div>