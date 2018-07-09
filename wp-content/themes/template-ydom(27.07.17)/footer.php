<footer>
    <div class="wrapper">

        <div class="footer-left">
            <ul class="footer-nav nostyle">
                <li><a href="/prodazha-arenda/" >Продажа</a></li>
                <li><a href="/prodazha-arenda/" >Аренда</a></li>
                <li><a href="/novostrojki/">Новостройки</a></li>
                <li><a href="/ipoteka/">Ипотека</a></li>
                <li><a href="/o-kompanii/">О компании</a></li>
            </ul>
            <ul class="footer-cont nostyle">
                <li class="footer-address"><a href="#" data-toggle="modal" data-target="#modal-map-admin"><?=get_field('settings_address', 33)?></a></li>
                <li data-toggle="modal" data-target="#modal-callback" class="footer-phone"><?=get_field('settings_phone', 33)?></li>
                <li class="footer-email"><a href="mailto:<?=get_field('settings_email', 33)?>"><?=get_field('settings_email', 33)?></a></li>
                <li class="social">
                    <a target='_blank' class="instagram" href="<?=get_field('settings_instagram', 33)?>"></a>
                    <a target='_blank' class="vk" href="<?=get_field('settings_vk', 33)?>"></a>
                    <a target='_blank' class="odnoklassniki" href="<?=get_field('settings_ok', 33)?>"></a>
                    <a target='_blank' class="twitter" href="<?=get_field('settings_twitter', 33)?>"></a>
                    <a target='_blank' class="facebook" href="<?=get_field('settings_facebook', 33)?>"></a>
                </li>
               
            </ul>
        </div>


        <div class="footer-right">
            <div class="comp">Твой дом, 2017</div>
            <a class="copyriht" href="/copyright/">Информация для правообладателей</a>
            <a class="copyriht" href="/privacy/">Политика конфиденциальности</a>
            <a href="http://www.web-axioma.ru/" class="axioma nostyle" target="_blank">Axioma</a>
        </div>


    </div>
</footer>
<div class="scrollTop"></div>
<a href="#scrollRes" class="scrollRes" style="display: none"></a>
<!--<div id="mapId"></div>-->
<?get_template_part('modals')?>

<?php wp_footer(); ?>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter45233073 = new Ya.Metrika({
                    id:45233073,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/45233073" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-102157642-1', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>
