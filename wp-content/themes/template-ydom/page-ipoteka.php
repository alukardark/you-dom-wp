<?php get_header();?>
    <div class="type-page ipoteka-page">
        <div class="wrapper">
            <h1 id="rev-4" class="main-slide-desc">Помощь в ипотечном кредитовании</h1><div id="rev-5"></div>
            <?
            while (have_posts()) : the_post();
                $content_page =  get_the_content();
            endwhile;  wp_reset_query();

            $query = new WP_Query( array(
                'posts_per_page'=>'-1',
                'post_type'  => 'banks',
            ) );
            while ( $query->have_posts() ) : the_post();
                $query->the_post();
            endwhile;
            $banks_city =  get_field_object('banks_city')['choices'];
            ?>

            <div class="main-scaner-wrap">
                <select class="city" name="city">
                    <? foreach ($banks_city as $banks_city_key=>$banks_city_item):?>
                        <option value="<?=$banks_city_key?>"><?=$banks_city_item?></option>
                    <?endforeach;?>
                </select>
                <div class="wrap-square wrap-bankPrice">
                    <span>Стоимость недвижимости </span><input name="" class="bankPrice" type="text" ><span>руб.</span>
                </div>
                <div class="wrap-square wrap-firstPay">
                    <span>Первоначальный взнос </span><input name="" class="firstPay" type="text" ><span>руб.</span>
                </div>
            </div>

            <div class="main-scaner-wrap" style="border-bottom: 0">
            <div class="wrap-square wrap-term">
                <span>Срок ипотеки </span><input id="amount" type="number" min="1" max="20" name="" class="term" type="text" value="1">
            </div>
            <div class="wrap-slider-range">
                <div class="slider-range"></div>
                <span class="min-range">1 год</span>
                <span class="max-range">20 лет</span>
            </div>
            </div>

            <p class="blankText"></p>
            <p class="blankTextTwo"></p>

            <button class="searchBanks">Рассчитать</button>

            <? $banks = new WP_Query( array( 'post_type' => 'banks') );
            if ( $banks->have_posts() ) : while ( $banks->have_posts() ) : $banks->the_post(); ?>
                <ul class="result-banks" style="display: none">
                    <li class="banks-title"><?php the_title(); ?></li>
                    <li class="banks-rate"><?php echo get_field('banks_rate');  ?></li>
                    <li class="banks-city"><?php echo get_field('banks_city');  ?></li>
                    <li class="banks-link"><?php echo get_field('banks_link');  ?></li>
                    <li class="banks-img" style="width: 150px;height: 150px;"><img style="max-width: 100%" src="<?php echo get_field('banks_img');  ?>" alt=""></li>
                    <li class="resultMonthlyPayment"></li>
                </ul>
            <?php endwhile; endif; ?>

            <div class="resultBanks" style="display: none">
                <table>
                    <tr>
                        <th>Банк:</th>
                        <th>Процентная ставка:</th>
                        <th>Платеж от:</th>
                    </tr>
                </table>
            </div>
            <?=$content_page?>
        </div>
    </div>

    <script>
        $(function(){

            function addCommas(nStr){
                nStr += '';
                x = nStr.split('.');
                x1 = x[0];
                x2 = x.length > 1 ? '.' + x[1] : '';
                var rgx = /(\d+)(\d{3})/;
                while (rgx.test(x1)) {
                    x1 = x1.replace(rgx, '$1' + ' ' + '$2');
                }
                return x1 + x2;
            }

            $('.term').on('input', function(){
                if($(this).val() == 0){
                    $(this).val(1);
                }
            });

            $('button.searchBanks').click(function(){
                if($('.bankPrice').val()==''){
                    $('.resultBanks').fadeOut(300);
                    $('.blankText').text('Поле "Стоимость недвижимости" заполнено некорректно.').fadeIn(300);
                    $('.blankTextTwo').fadeOut(300, function(){
                        $('.blankTextTwo').text('')
                    });
                    return false;
                }else if($('.bankPrice').length){

                    $('.blankText').fadeOut(300, function(){
                        $('.blankText').text('')
                    });
                }

                if((parseInt($('.firstPay').val().replace(/[^0-9]/gim,'')))>=(parseInt($('.bankPrice').val().replace(/[^0-9]/gim,'')))){
                    $('.resultBanks').fadeOut(300);
                    $('.blankText').fadeOut(300, function(){
                        $('.blankText').text('')
                    });
                    $('.blankTextTwo').text('Первоначальный взнос не должен превышать стоимость.').fadeIn(300);

                    return false;
                }else if($('.bankPrice').length || (parseInt($('.firstPay').val().replace(/[^0-9]/gim,'')))<(parseInt($('.bankPrice').val().replace(/[^0-9]/gim,'')))){
                    $('.blankTextTwo').fadeOut(300, function(){
                        $('.blankTextTwo').text('')
                    });
                }

                $('.resultBanks').fadeOut(300, function(){
                    var city = $('.city').val();
                    var bankPrice = $('.bankPrice').val().replace(/[^0-9]/gim,'');
                    var firstPay = $('.firstPay').val().replace(/[^0-9]/gim,'');
                    var term = $('.term').val()*12;
                    var rate = $('.rate').val();
                    var firstPay = bankPrice - firstPay;
                    $('.resultBanks table tr').not('tr:nth-of-type(1)').remove();
                    $('.banks-city').each(function(){
                        if($('.city').val() == $(this).text()){
                            var banksTitle = $(this).parent('.result-banks').children('.banks-title').text();
                            var banksRate = $(this).parent('.result-banks').children('.banks-rate').text();
                            var banksLink = $(this).parent('.result-banks').children('.banks-link').text();
                            var banksImg = $(this).parent('.result-banks').children('.banks-img').children('img').attr('src');
                            var monthlyPayment = Math.round(
                                firstPay * (banksRate / 1200 + (banksRate / 1200) / (Math.pow((1 + banksRate / 1200), term) - 1))
                            );
                            $('.resultBanks table').append('<tr><td><a rel="nofollow" target="_blank" href="'+banksLink+'"><img style="display:block;max-width: 200px" src="'+banksImg+'"></a></td><td>'+banksRate+'%</td><td>'+addCommas(monthlyPayment)+' руб.</td></tr>');
                        }
                    });
                }).fadeIn(300);
            });
        });
    </script>
<?php
get_footer();