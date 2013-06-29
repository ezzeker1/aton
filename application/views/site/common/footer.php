<div class="container-fluid">
    <div class="row-fluid">
        <!-- FOOTER -->
        <footer class="clearfix">
            <ul class="pull-left Social">
                <li>
                    <a href="#" class="Twitter" rel="tooltip" title="Twitter">Twitter</a>
                </li>
                <li>
                    <a href="#" class="Facebook" rel="tooltip" title="Facebook">Facebook</a>
                </li>
                <li>
                    <a href="#" class="YouTube" rel="tooltip" title="YouTube">YouTube</a>
                </li> 
            </ul>
            <p>
                <?php echo lang('copyrights'); ?>
            </p>
        </footer>
    </div>
    <!-- /.row --> 
</div>

</div>
<!-- /.container --> 
</div>
<!-- /.container-fluid --> 

<!-- Le javascript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<?php echo load_js($assets_js, 'site'); ?>
<script>


    $('html, body').animate({
        scrollTop: $("#notify").offset().top
    }, 2000);
    !function($) {
        $(function() {
            // carousel demo
            $('#myCarousel').carousel()
        })
    }(window.jQuery)
</script>
<script>
    !function($) {
        $(function() {
            // carousel demo
            $('#myCarousel').carousel({
                interval: 3000
            })
        })
    }(window.jQuery)
</script>

<script>
    $(function() {
        // Slideshow 3
        $("#slider3").responsiveSlides({
            auto: true,
            pager: false,
            nav: true,
            speed: 500,
            namespace: "callbacks",
            before: function() {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function() {
                $('.events').append("<li>after event fired.</li>");
            }
        });

    });



</script>
</body>
</html>