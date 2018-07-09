<?php get_header();?>

    <div class="main">
        <div class="main-slide">
            <h1 id="rev-4">Вся недвижимость в одном месте</h1>
            <br>
            <div id="rev-5" class="main-slide-desc">
                Продажа и аренда
            </div>

            <ul class="nav-tabs wrapper nostyle">
                <li class="active"><a href="#buyFake">Купить</a></li>
                <li><a href="#rent">Арендовать</a></li>
            </ul>

            <div class="tab-content wrapper">
                <div class="tab-pane fade in active" id="buy">
                    <form method="POST" action="/prodazha-arenda/" class="main-scaner buy">
                        <?
                        $_COOKIE['buyTypeId'] = str_replace(array("[","]"), array("", ""), $_COOKIE['buyTypeId']);
                        $_COOKIE['buyDistrictId'] = str_replace(array("[","]"), array("", ""), $_COOKIE['buyDistrictId']);
                        $_COOKIE['buysectionId'] = str_replace(array("[","]"), array("", ""), $_COOKIE['buysectionId']);
                        ?>
                        <div class="main-scaner-wrap">
                            <select class="type" multiple="multiple" name="filter[typeId][]">
                                <?
                                $res = types();
                                $settings_type = get_field('settings_type', 33);
                                foreach ($res->item as $i): ?>
                                    <?if(!in_array($i->id, $settings_type)){ continue; }?>
                                    <option <?if($_COOKIE['buyTypeId'] && in_array($i->id, explode(',',$_COOKIE['buyTypeId']))){echo 'selected';}?> value='<?=$i->id?>'><?=$i->name?></option>
                                <? endforeach; ?>
                            </select>
                            <div class="wrap-square wrap-rooms">
                                <span>Комнат от </span><input value="<?if($_COOKIE['buyRoomsFrom']){echo $_COOKIE['buyRoomsFrom'];}?>" min="0" name="filter[roomsFrom]" class="roomsFrom" type="number" >
                                <span>до </span><input value="<?if($_COOKIE['buyRoomsTo']){echo $_COOKIE['buyRoomsTo'];}?>" min="0"  name="filter[roomsTo]" class="roomsTo" type="number" >
                            </div>
                            <div class="price-cont">
                                <div class="wrap-square wrap-price">
                                    <span>Цена от </span>
                                    <input value="<?if($_COOKIE['buyPriceFrom']){echo $_COOKIE['buyPriceFrom'];}?>" min="0" name="filter[priceFrom]" type="text" class="priceFrom" >
                                    <span>до </span>
                                    <input value="<?if($_COOKIE['buyPriceTo']){echo $_COOKIE['buyPriceTo'];}?>" min="0"  name="filter[priceTo]" type="text" class="priceTo" >
                                    <span>руб.</span>
                                </div>
                            </div>
                            <select class="city" multiple="multiple" name="filter[cityId]">
                                <?$settings_city =  get_field('settings_city', 33);?>
                                <option <?if(!in_array(321, $settings_city)){ echo "disabled"; }?> <? if(!$_COOKIE['cityId']){echo 'selected';} if($_COOKIE['cityId'] && in_array(321, explode(',',$_COOKIE['cityId']))){echo 'selected';} ?> value="321" >Новокузнецк</option>
                                <option <?if(!in_array(649, $settings_city)){ echo "disabled"; }?> <?if($_COOKIE['cityId'] && in_array(649, explode(',',$_COOKIE['cityId']))){echo 'selected';}?> value="649"  >Новосибирск</option>
                            </select>
                            <select class="region" multiple="multiple" name="filter[districts][]">
                                <?
                                $res = districts();
                                foreach ($res as $i):
                                    ?>
                                    <option <?if($_COOKIE['buyDistrictId'] && in_array($i->id, explode(',',$_COOKIE['buyDistrictId']))){echo 'selected';}?> value='<?=$i->id?>'><?=$i->name?></option>
                                <?endforeach;?>
                            </select>
                        </div>
                        <a href="/prodazha-arenda/" class="advanced-search">Расширенный поиск</a>
                        <input type="submit" name="filter[search]" class="search" value="Найти">
                    </form>
                </div>
            </div>
            <a href="#why-agency" class="scroll-bottom nostyle"></a>
        </div>

        <div class="why-agency" id="why-agency">
            <div class="wrapper">
                <h2 class="nostyle">Почему именно наше агентство?</h2>
                <div class="why-agency-desc fade-text">
                    <?=get_field('why_choose_descr', 113)?>
                </div>
                <ul class="why-agency-list nostyle">
                    <li class="why-agency-item" data-text="<?=get_field('why_choose_descr_hedden', 103)?>">
                        <div class="why-agency-pick" style="background-image: url(<?=get_field('why_choose_img', 103)?>)"></div>
                        <p><?=get_field('why_choose_descr', 103)?></p>
                    </li>
                    <li class="why-agency-item" data-text="<?=get_field('why_choose_descr_hedden', 105)?>">
                        <div class="why-agency-pick" style="background-image: url(<?=get_field('why_choose_img', 105)?>)"></div>
                        <p><?=get_field('why_choose_descr', 105)?></p>
                    </li>
                    <li class="why-agency-item" data-text="<?=get_field('why_choose_descr_hedden', 107)?>">
                        <div class="why-agency-pick" style="background-image: url(<?=get_field('why_choose_img', 107)?>)"></div>
                        <p><?=get_field('why_choose_descr', 107)?></p>
                    </li>
                    <li class="why-agency-item" data-text="<?=get_field('why_choose_descr_hedden', 109)?>">
                       <div class="why-agency-pick" style="background-image: url(<?=get_field('why_choose_img', 109)?>)"></div>
                        <p><?=get_field('why_choose_descr', 109)?></p>
                    </li>
                </ul>

                <div class="row-consultation">
                    <div class="consultation-left">
                        <h3>Получите профессиональную консультацию за 15 минут</h3>
                        <div class="why-agency-desc-next">
                            Оставьте свои контактные данные, наш специалист свяжется с вами
                        </div>
                    </div>

                   <?echo do_shortcode("[contact-form-7 id=\"64\" title=\"Заказать звонок\" html_class=\"callback\"]");?>
                </div>



            </div>
        </div>

        <div class="how-working ">
            <div class="wrapper">
                <h2>Как мы работаем</h2>
                <ul class="how-working-list nostyle">
                    <li class="how-working-item">
                        <div id="rev-img-1"  class="how-working-img" style="background-image: url(<?=get_template_directory_uri();?>/img/how-working-item-1.jpg);"></div>
                        <div class="how-working-desc">Вы выбираете квартиру</div>
                    </li>
                    <li class="how-working-item">
                        <div id="rev-img-2"  class="how-working-img" style="background-image: url(<?=get_template_directory_uri();?>/img/how-working-item-2.jpg);"></div>
                        <div class="how-working-desc">Мы проводим осмотр</div>
                    </li>
                    <li class="how-working-item">
                        <div id="rev-img-3"  class="how-working-img" style="background-image: url(<?=get_template_directory_uri();?>/img/how-working-item-3.jpg);"></div>
                        <div class="how-working-desc">Вы вносите аванс</div>
                    </li>
                    <li class="how-working-item">
                        <div id="rev-img-4"  class="how-working-img" style="background-image: url(<?=get_template_directory_uri();?>/img/how-working-item-4.jpg);"></div>
                        <div class="how-working-desc">Мы бронируем квартиру</div>
                    </li>
                    <li class="how-working-item">
                        <div id="rev-img-5"  class="how-working-img" style="background-image: url(<?=get_template_directory_uri();?>/img/how-working-item-5.jpg);"></div>
                        <div class="how-working-desc">Оформляем документы и заключаем договор</div>
                    </li>
                    <li class="how-working-item">
                        <div id="rev-img-6"  class="how-working-img" style="background-image: url(<?=get_template_directory_uri();?>/img/how-working-item-6.jpg);"></div>
                        <div class="how-working-desc">Проводим сделку, вы заселяетесь в квартиру</div>
                    </li>


                </ul>
            </div>
        </div>

        <div class="reviews">
            <div class="wrapper">
                <h2>Отзывы о нашей работе</h2>
                <div class="reviews-desc">С нами квартиру нашли уже более <span class="reviews-desc-bold"><?=get_field('settings_count_peoples', 33)?></span> человек</div>
                <ul class="reviews-slider nostyle">
                    <?php
                    global $post;
                    $reviews_list = array('post_type' => 'reviews', 'order' => 'ASC','numberposts' => -1);
                    $reviews_list = get_posts( $reviews_list );
                    foreach( $reviews_list as $post ){
                        setup_postdata($post);?>
                        <li>
                            <div class="img"><img src="<?the_field('reviews_img')?>" alt="<?the_field('reviews_text')?>"></div>
                            <div class="reviews-slider-col">
                                <div class="title">
                                    <?the_field('reviews_title')?>
                                </div>
                                <p class="text"><?the_field('reviews_text')?></p>
                            </div>
                        </li>
                    <?}?>
                </ul>
            </div>
        </div>
    </div>

<?php
get_footer();
