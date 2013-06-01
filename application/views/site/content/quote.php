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
                        <label for="name" class="control-label">اسمك بالكامل</label>
                        <div class="controls">
                            <input type="text" placeholder="اسمك بالكامل" class="input-xlarge" name="name" data-required="true" data-trigger="change"   data-required="true" data-trigger="change"  >
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="inputEmail" class="control-label">الشركة</label>
                        <div class="controls">
                            <input type="text" placeholder="الشركة" class="input-xlarge" name="company">
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="inputPassword" class="control-label">المدينة</label>
                        <div class="controls">
                            <input type="text" placeholder="المدينة" id="inputPassword" class="input-xlarge" name="city" data-required="true" data-trigger="change"  > 
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="inputPassword" class="control-label">رقم الهاتف</label>
                        <div class="controls">
                            <input type="text" placeholder="رقم الهاتف" id="inputPassword" class="input-xlarge" name="phone"  data-required="true" data-trigger="change" data-type="number">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="inputEmail" class="control-label">الفاكس</label>
                        <div class="controls">
                            <input type="text" placeholder="الفاكس" class="input-xlarge" id="inputEmail" name="fax"  data-required="true" data-trigger="change" data-type="number">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="inputEmail" class="control-label">الايميل</label>
                        <div class="controls">
                            <input type="text" placeholder="الايميل" class="input-xlarge" id="inputEmail" name="email" data-required="true" data-trigger="change" data-type="email" >
                        </div>
                    </div>

                    <h2>الاحتياج المائي</h2>
                    <div class="control-group">
                        <label for="inputPassword" class="control-label">الاحتياجات اليومية</label>
                        <div class="controls">
                            <input type="text" placeholder="الاحتياجات اليومية" id="inputPassword" class="input-xlarge"  name="daily_need"  data-required="true" data-trigger="change" data-type="number">
                            متر مربع / يوم
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="inputPassword" class="control-label">مجموع رفع الرأسي</label>
                        <div class="controls">
                            <input type="text" placeholder="مجموع رفع الرأسي" id="inputPassword" class="input-xlarge" name="vertical_lift"  data-required="true" data-trigger="change" data-type="number">
                            متر
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="inputPassword" class="control-label">عمق البئر</label>
                        <div class="controls">
                            <input type="text" placeholder="عمق البئر" id="inputPassword" class="input-xlarge" name="depth_well"  data-required="true" data-trigger="change" data-type="number">
                            متر
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="inputPassword" class="control-label">مستوى الماء الساكن</label>
                        <div class="controls">
                            <input type="text" placeholder="مستوى الماء الساكن" id="inputPassword" class="input-xlarge" name="water_level"  data-required="true" data-trigger="change" data-type="number">
                            متر
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="inputPassword" class="control-label">معدل الاسترداد</label>
                        <div class="controls">
                            <input type="password" placeholder="معدل الاسترداد" id="inputPassword" class="input-xlarge" name="recovery_rate"   data-trigger="change" data-type="number">
                            متر مربع / ساعة
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="inputPassword" class="control-label">طول من الأنابيب</label>
                        <div class="controls">
                            <input type="password" placeholder="طول من الأنابيب" id="inputPassword" class="input-xlarge" name="length_pipe" data-trigger="change" data-type="number" >
                            متر
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="inputPassword" class="control-label">درجة حرارة الماء من بئر</label>
                        <div class="controls">
                            <input type="password" placeholder="درجة حرارة الماء من بئر" id="inputPassword" class="input-xlarge" name="temprature" data-trigger="change" data-type="number" >
                            مئوية 
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="inputPassword" class="control-label">نوعية المياه</label>
                        <div class="controls">
                            <textarea placeholder=" نوعية المياه" class="input-xlarge" rows="3" name="water_quality"></textarea>     
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="inputPassword" class="control-label"> خزان التخزين متوفرة؟</label>
                        <div class="controls">
                            <label class="checkbox">
                                <input name="tank_available[]" type="checkbox" > نعم
                            </label>
                            <label class="checkbox">
                                <input name="tank_available[]" type="checkbox" > لا 
                            </label>
                        </div>    


                    </div>
                    <h2>تركيب الطاقة الشمسية</h2>
                    <div class="control-group">
                        <label for="inputPassword" class="control-label">طول الكابل</label>
                        <div class="controls">
                            <input type="text" placeholder="طول الكابل" name="cable_length" class="input-xlarge">
                            متر                                 
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="inputPassword" class="control-label">إمدادات الطاقة</label>
                        <div class="controls">
                            <label class="checkbox">
                                <input name="power_supply[]" type="checkbox" > الطاقة الشمسية مباشرة
                            </label>
                            <label class="checkbox">
                                <input name="power_supply[]" type="checkbox" > بطارية
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