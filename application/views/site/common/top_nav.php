<body>
    <div class="container-fluid wood-Bg">
        <div class="container all-data-wrap"> 
            <!-- NAVBAR
            ================================================== -->
            <div class="navbar-wrapper"> 
                <!-- Wrap the .navbar in .container to center it within the absolutely positioned parent. -->
                <div class="container">

                    <div class="container">
                        <div class="row-fluid">

                            <div class="span10 logo-wrap clearfix">
                                <div class="slogan pull-right span4">
                                    <h1>شركة أتون لأنظمة الطاقة الشمسية ذ.م.م.</h1>
                                </div>
                                <div class="logo pull-left span3"><a class="brand" href="index.htm"><img src="<?php base_url(); ?>resources/site/images/logo.png" width="192" height="77" alt="Aton logo"></a></div> 
                            </div>      

                        </div>
                        <!-- /.row --> 
                    </div>
                    <div class="navbar navbar-inverse">        
                        <div class="navbar-inner span10"> 

                            <div class="flags pull-left">
                                <ul class="clearfix">
                                    <li><a href="<?php echo base_url('home/change_locale/english?back_url=' . $this->uri->uri_string()); ?>"><img src="<?php echo base_url(); ?>resources/site/images/uk-flag.png" width="32" height="25" alt="uk-flag"></a></li>
                                    <li><a href="<?php echo base_url('home/change_locale/arabic?back_url=' . $this->uri->uri_string()); ?>"><img src="<?php echo base_url(); ?>resources/site/images/arabic-flag.png" width="32" height="25" alt="arabic-flag"></a></li>
                                </ul>
                            </div>


                            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>


                            <div class="nav-collapse collapse">
                                <ul class="nav">
                                    <li><a href="<?php echo base_url('home'); ?>">الرئيسية</a></li>
                                    <li class="dropdown <?php echo isset($application_active) ? 'active' : ''; ?>"><a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">التطبيقات   <b class="caret"></b></a>
                                        <ul class="dropdown-menu ">
                                            <li><a href="<?php echo base_url('applications'); ?>">التطبيق  الأول</a></li>
                                            <li><a href="<?php echo base_url('applications'); ?>">التطبيق  الثانى</a></li>
                                            <li><a href="<?php echo base_url('applications'); ?>">التطبيق  الثالث</a></li>                    
                                            <li><a href="<?php echo base_url('applications'); ?>">التطبيق  الرابع</a></li>
                                            <li><a href="<?php echo base_url('applications'); ?>">التطبيق  الخامس</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown <?php echo isset($product_active) ? 'active' : ''; ?> "><a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">المنتجات  <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <?php foreach ($categories as $category) { ?>
                                                <li> <a href="<?php echo base_url('category/' . $category->id); ?>">  <?php echo localize($category, 'name'); ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li class="<?php echo isset($gallery_active) ? 'active' : ''; ?>"> <a href="<?php echo base_url('gallery'); ?>">معرض الصور</a></li>
                                    <li class="<?php echo isset($about_active) ? 'active' : ''; ?>"><a href="<?php echo base_url('about-us'); ?>">من نحن</a></li>
                                    <li class="<?php echo isset($contact_active) ? 'active' : ''; ?>"> <a href="<?php echo base_url('contact-us'); ?>">الاتصال بنا</a></li>
                                </ul>

                                <!--/.nav-collapse --> 
                            </div>
                            <!-- /.navbar-inner --> 
                        </div>
                        <!-- /.navbar --> 

                    </div>
                </div>
            </div>
            <!-- /.container --> 