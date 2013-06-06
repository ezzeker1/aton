<div class="container-fluid inner-data-wrap">
    <div class="row-fluid">
        <div class="span12">    
            <div class="section-header green-title">
                <h1>طلب عرض سعر</h1>
            </div>    
            <div class="quote-wrap">

                <form  enctype="multipart/form-data" data-validate="parsley" action="<?php echo base_url('site/quote/send'); ?>" method="post" class="form-horizontal ">
                    <h2> </h2>
                    <div class="control-group">
                        <label for="name" class="control-label">الأسم  <strong>*</strong></label>
                        <div class="controls">
                            <input type="text" placeholder="الأسم" class="input-xlarge" name="name" data-required="true" data-trigger="change"   data-required="true" data-trigger="change"  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="inputEmail" class="control-label">الشركة</label>
                        <div class="controls">
                            <input type="text" placeholder="الشركة" class="input-xlarge" name="company">
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="inputPassword" class="control-label">الموقع: (محافظة – مدينة)  <strong>*</strong></label>
                        <div class="controls">
                            <input type="text" placeholder="الموقع: (محافظة – مدينة)   " id="inputPassword" class="input-xlarge" name="city" data-required="true" data-trigger="change"  /> 
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="inputPassword" class="control-label">رقم الهاتف  <strong>*</strong></label>
                        <div class="controls">
                            <input type="text" placeholder="رقم الهاتف" id="inputPassword" class="input-xlarge" name="phone"  data-required="true" data-trigger="change" data-type="number"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="inputEmail" class="control-label">الفاكس</label>
                        <div class="controls">
                            <input type="text" placeholder="الفاكس" class="input-xlarge" id="inputEmail" name="fax"  data-required="true" data-trigger="change" data-type="number"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="inputEmail" class="control-label">الايميل  <strong>*</strong></label>
                        <div class="controls">
                            <input type="text" placeholder="الايميل" class="input-xlarge" id="inputEmail" name="email" data-required="true" data-trigger="change" data-type="email" />
                        </div>
                    </div>

                    <h2>الاحتياج المائي</h2>
                    <div class="control-group">
                        <label for="inputPassword" class="control-label">الأحتياجات اليومية من الماء      <strong>*</strong></label>
                        <div class="controls">
                            <input type="text" placeholder="الأحتياجات اليومية من الماء    " id="inputPassword" class="input-xlarge"  name="daily_need"  data-required="true" data-trigger="change" data-type="number"/>
                            متر مكعب/يوم 
                        </div>
                    </div>
                    <div class="control-group">

                        <label for="inputPassword" class="control-label">مصدر المياه:    <strong>*</strong></label>
                        <div class="controls">

                            <label class="radio">
                                <input data-required="true" name="vertical_lift" type="radio" value="بئر"> بئر
                            </label>
                            <label class="radio">
                                <input data-required="true" name="vertical_lift" type="radio" value="نهر"> نهر
                            </label>
                            <label class="radio">
                                <input data-required="true" name="vertical_lift" type="radio" value="خزان"> لاخزان
                            </label>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="inputPassword" class="control-label">أقصي عمق للبئر  <strong>*</strong></label>
                        <div class="controls">
                            <input type="text" placeholder="أقصي عمق للبئر" id="inputPassword" class="input-xlarge" name="depth_well"  data-required="true" data-trigger="change" data-type="number"/>
                            متر
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="inputPassword" class="control-label">قطر ماسورة البئر  <strong>*</strong></label>
                        <div class="controls">
                            <input type="text" placeholder="قطر ماسورة البئر" id="inputPassword" class="input-xlarge" name="pipe_diameter"  data-required="true" data-trigger="change" data-type="number"/>
                            متر
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="inputPassword" class="control-label">منسوب الماء بالبئر  <strong>*</strong></label>
                        <div class="controls">
                            <input type="text" placeholder="منسوب الماء بالبئر" id="inputPassword" class="input-xlarge" name="water_level"  data-required="true" data-trigger="change" data-type="number"/>
                            متر
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="inputPassword" class="control-label">معدل الاسترداد  <strong>*</strong></label>
                        <div class="controls">
                            <input type="text" placeholder="معدل الاسترداد" id="inputPassword" class="input-xlarge" name="recovery_rate"   data-trigger="change" data-type="number"/>
                            متر مربع / ساعة
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="inputPassword" class="control-label">طول وقطر الأنابيب خارج طرمبة   <strong>*</strong></label>
                        <div class="controls">
                            <input type="text" placeholder="طول وقطر الأنابيب خارج طرمبة " id="inputPassword" class="input-xlarge" name="length_pipe" data-trigger="change" data-type="number" />
                            متر
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="inputPassword" class="control-label">درجة حرارة الماء من بئر  <strong>*</strong></label>
                        <div class="controls">
                            <input type="text" placeholder="درجة حرارة الماء من بئر" id="inputPassword" class="input-xlarge" name="temprature" data-trigger="change" data-type="number" />
                            مئوية 
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="inputPassword" class="control-label">نوع التطبيقات<strong>*</strong></label>
                        <div class="controls">

                            <label class="radio">
                                <input data-required="true"  name="water_quality" type="radio" value="ري"> ري 
                            </label>
                            <label class="radio">
                                <input data-required="true"  name="water_quality" type="radio" value="ثروة حيوانية "> ثروة حيوانية 
                            </label>
                            <label class="radio">
                                <input data-required="true" name="water_quality" type="radio" value="مياه للشرب"> مياه للشرب  
                            </label>
                            <label class="radio">
                                <input data-required="true" name="water_quality" type="radio" value="حمامات سباحة"> حمامات سباحة  
                            </label>
                            <label class="radio">
                                <input data-required="true" name="water_quality" type="radio" value="أخري"> أخري
                            </label>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="inputPassword" class="control-label"> هل يوجد خزان للمياه؟  <strong>*</strong></label>
                        <div class="controls">

                            <label class="radio">
                                <input data-required="true" name="tank_available" type="radio" value="yes"> نعم
                            </label>
                            <label class="radio">
                                <input data-required="true" name="tank_available" type="radio" value="no"> لا 
                            </label>
                        </div>

                    </div>
                    <h2>تركيب الطاقة الشمسية</h2>
                    <div class="control-group">
                        <label for="inputPassword" class="control-label">المسافة بين البئر وموقع الخلايا الشمسية  <strong>*</strong></label>
                        <div class="controls">
                            <input type="text" placeholder="المسافة بين البئر وموقع الخلايا الشمسية" name="cable_length" class="input-xlarge"/>
                            متر                                 
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="inputPassword" class="control-label">كيفية إمدادات الطاقة  <strong>*</strong></label>
                        <div class="controls">
                            <label class="radio">
                                <input data-required="true" name="power_supply" type="radio" value=" الطاقة الشمسية فقط" > الطاقة الشمسية فقط
                            </label>
                            <label class="radio">
                                <input data-required="true" name="power_supply" type="radio" value=" الطاقة الشمسية مع البطاريات" > الطاقة الشمسية مع البطاريات
                            </label>

                        </div>

                    </div>
                    <h2>إضافات أخرى </h2>
                    <div class="control-group">
                        <label for="inputSMS" class="control-label">إضافات</label>
                        <div class="controls">
                            <textarea placeholder=" إضافات" class="input-xlarge" rows="3" name="notes"></textarea>     
                        </div>    
                    </div>
                    <?php echo $this->notify->get(true); ?>
                    <div class="control-group">
                        <div class="controls">

                            <button class="btn" type="submit">إرسال  الطلب </button>
                        </div>
                    </div>
                </form>

            </div>          
        </div>
    </div>
    <!-- /.row --> 
</div>