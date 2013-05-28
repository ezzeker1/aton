<!-- inner page Header -->
<div class="container-fluid no-padding">
    <div class="row-fluid">
        <div class="span12">
            <div class="header-img">
                <h1 class="inner-page-header">الأتصال بنا</h1>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid inner-data-wrap">
    <div class="row-fluid">
        <div class="span12">
            <div class="section-header green-title">
                <h1>مكاتبنا</h1>
            </div>
            <br /> 
            <iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.eg/maps?f=q&amp;ie=UTF8&amp;t=m&amp;ll=30.103319,31.383407&amp;spn=0.000232,0.000266&amp;z=19&amp;output=embed"></iframe>
            <br /> <br /> 
        </div>
        <div class="row-fluid">
            <div class="span4">
                <div class="section-header green-title">
                    <h1>معلومات الاتصال</h1>
                </div>
                <p>
                    <?php echo localize($page, 'content'); ?>
                </p>
                <hr>
                <div class="contact-info">
                    <ul>
                          <li> <i class="icon-globe" ></i> <?php echo  $settings->address; ?></li>
                        <li> <i class="icon-bullhorn" ></i><?php echo $settings->phone; ?></li>                 
                        <li> <i class="icon-envelope" ></i> <a href="mailto:info@aton.com.eg"><?php echo $settings->email; ?></a> </li>
                    </ul>
                </div>
            </div>

            <div class="span8">
                <div class="section-header green-title">
                    <h1>ابعث برسالة الينا</h1>
                </div>
                <form class="form-horizontal" data-validate="parsley"
                      id="registerHere" method='post' action="<?php echo base_url('site/home/contact_mail'); ?>" >
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="input01">الاسم</label>
                            <div class="controls">
                                <input data-required="true" data-trigger="change"   type="text" class="input-xlarge" id="user_name" name="user_name">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="input01">الايميل</label>
                            <div class="controls">
                                <input  data-required="true" data-trigger="change"  type="text" class="input-xlarge" id="user_email" name="user_email">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="input01">موضوع الرسالة</label>
                            <div class="controls">
                                <input  data-required="true" data-trigger="change"   type="text" class="input-xlarge" id="pwd" name="user_subject">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="input01">الرسالة</label>
                            <div class="controls">
                                <textarea  data-required="true" data-trigger="change"  cols="" rows="" class="input-xlarge" id="cpwd" name="user_message"></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="input01"></label>
                            <div class="controls">
                                <button type="submit" class="btn" rel="tooltip" title="Send Message"> إرسال </button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row --> 
</div>