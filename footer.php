<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package INTERCON
 */
?>

	<footer class=" footer">
        <div class="wrapper-footer font-light ">
            <div class="grid-footer">
                <div class="grid-footer__item">
                    <ul class="social-menu">
                        <li class="social-item"><a href=" <?php echo get_option_isp('isp_theme_options_vk');?> "><i class="fa fa-2x fa-vk"></i></a></li>
                        <li class="social-item"><a href="<?php echo get_option_isp('isp_theme_options_fb');?>"><i class="fa fa-2x fa-facebook"></i></a></li>
                        <li class="social-item"><a href="<?php echo get_option_isp('isp_theme_options_yutube');?>"><i class="fa fa-2x fa-youtube"></i></a></li>
                    </ul>
                    <p class="font-light">Интеркон Воронеж. Ленина 73</p>
                    <p class="font-light">Интернет Провайдер</p>
                </div>
                <div class="grid-footer__item">
                <?php get_template_part( 'template-parts/nav', 'footer' ); ?>
                </div>
            </div>
        </div>
    </footer>
    </main>    
</div>
<?php wp_footer(); ?>

<!-- BEGIN JIVOSITE CODE {literal} -->

<!-- <script type='text/javascript'>

(function(){ var widget_id = 'boiwvfTcLc';var d=document;var w=window;function l(){
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; 
var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
</script>
 -->


<!-- {/literal} END JIVOSITE CODE -->


        <!-- <script type="text/javascript" encoding="utf-8">
        var _tbEmbedArgs = _tbEmbedArgs || [];
        (function () {
            var u =  "https://widget.textback.io/widget";
            _tbEmbedArgs.push(['widgetId', '38c9c542-3482-4f8b-be51-661205b045b4']);
            _tbEmbedArgs.push(['baseUrl', u]);

            var d = document, g = d.createElement('script'), s = d.getElementsByTagName('script')[0];
            g.type = 'text/javascript';
            g.charset = "utf-8";
            g.defer = true;
            g.async = true;
            g.src = u + '/widget.js';
            s.parentNode.insertBefore(g, s);
        })();

    
        //_tbOnWidgetReady = function() {
        //  console.log('TextBack widget is ready.');
        //};

        //_tbOnWidgetClick = function(channel) {
        //  console.log('TextBack channel ' + channel + ' was clicked.');
        //};
</script> -->

<!-- Begin LeadBack code {literal} -->
<!-- <script>
    var _emv = _emv || [];
    _emv['campaign'] = 'e5fb88b398b0427b1223235e';
    
    (function() {
        var em = document.createElement('script'); em.type = 'text/javascript'; em.async = true;
        em.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'leadback.ru/js/leadback.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(em, s);
    })();
</script> -->
<!-- End LeadBack code {/literal} -->
</body>
</html>
