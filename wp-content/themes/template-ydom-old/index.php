<?php get_header();?>

    <div class="main">
        <div class="main-slide">
            <h2 id="rev-4">Продажа и аренда недвижимости</h2>
            <br>
            <div id="rev-5" class="main-slide-desc">
                Более 1500 объектов по Кемеровской области
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
                        $_COOKIE['buyRoomsId'] = str_replace(array("[","]"), array("", ""), $_COOKIE['buyRoomsId']);
                        $_COOKIE['buyDistrictId'] = str_replace(array("[","]"), array("", ""), $_COOKIE['buyDistrictId']);
                        $_COOKIE['buysectionId'] = str_replace(array("[","]"), array("", ""), $_COOKIE['buysectionId']);
                        ?>
                        <div class="main-scaner-wrap">
                            <select class="type" multiple="multiple" name="filter[typeId][]">
                                <?
                                // $res = types();
                                foreach ($res->item as $i): ?>
                                    <option <?if($_COOKIE['buyTypeId'] && in_array($i->id, explode(',',$_COOKIE['buyTypeId']))){echo 'selected';}?> value='<?=$i->id?>'><?=$i->name?></option>
                                <? endforeach; ?>
                            </select>
                            <select class="rooms" multiple="multiple" name="filter[rooms][]">
                                <option <?if($_COOKIE['buyRoomsId'] && in_array(1, explode(',',$_COOKIE['buyRoomsId']))){echo 'selected';}?> value="1">1-к.</option>
                                <option <?if($_COOKIE['buyRoomsId'] && in_array(2, explode(',',$_COOKIE['buyRoomsId']))){echo 'selected';}?> value="2">2-к.</option>
                                <option <?if($_COOKIE['buyRoomsId'] && in_array(3, explode(',',$_COOKIE['buyRoomsId']))){echo 'selected';}?> value="3">3-к.</option>
                                <option <?if($_COOKIE['buyRoomsId'] && in_array(4, explode(',',$_COOKIE['buyRoomsId']))){echo 'selected';}?> value="4">4-к.</option>
                                <option <?if($_COOKIE['buyRoomsId'] && in_array(5, explode(',',$_COOKIE['buyRoomsId']))){echo 'selected';}?> value="5">более 4-к.</option>
                            </select>
                            <div class="price-cont">
                                <input readonly="readonly" name="filter[priceFrom]" type="text"  class="amount">
                                <input readonly="readonly" name="filter[priceTo]" type="text"  class="amount-two">
                                <div class="slider-range"></div>
                            </div>
                            <select class="city" multiple="multiple" name="filter[cityId]">
                                <option <? if(!$_COOKIE['cityId']){echo 'selected';} if($_COOKIE['cityId'] && in_array(321, explode(',',$_COOKIE['cityId']))){echo 'selected';} ?> value="321" >Новокузнецк</option>
                                <option <?if($_COOKIE['cityId'] && in_array(649, explode(',',$_COOKIE['cityId']))){echo 'selected';}?> value="649"  >Новосибирск</option>
                            </select>
                            <select class="region" multiple="multiple" name="filter[districts][]">
                                <?
                                // $res = districts();
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
                    Вот почему из огромного количества компаний, большинство людей, отдают предпочтение именно нам:
                </div>
                <ul class="why-agency-list nostyle">
                    <li class="why-agency-item" data-text="Скрытый текст (0 % комиссии за услуги компании)">
                        <div class="why-agency-pick" style="background-image: url(<?=get_template_directory_uri();?>/img/commission.png)"></div>
                        <p>0 % комиссии за услуги компании</p>
                    </li>
                    <li class="why-agency-item" data-text="Скрытый текст (Бесплатное оформление ипотеки)">
                        <div class="why-agency-pick" style="background-image: url(<?=get_template_directory_uri();?>/img/mortgage.png)"></div>
                        <p>Бесплатное оформление ипотеки</p>
                    </li>
                    <li class="why-agency-item" data-text="Скрытый текст (Ипотека с господдержкой от 9,5%)">
                        <div class="why-agency-pick" style="background-image: url(<?=get_template_directory_uri();?>/img/mortgages-support.png)"></div>
                        <p>Ипотека с господдержкой от 9,5%</p>
                    </li>
                    <li class="why-agency-item" data-text="Скрытый текст (Всегда одинаковые цены с застройщиками)">
                        <div class="why-agency-pick" style="background-image: url(<?=get_template_directory_uri();?>/img/prices-developers.png)"></div>
                        <p>Всегда одинаковые цены с застройщиками</p>
                    </li>
                </ul>

                <div class="row-consultation">
                    <div class="consultation-left">
                        <h3>Получите профессиональную консультацию за 15 минут</h3>
                        <div class="why-agency-desc-next">
                            Оставьте свои контактные данные, мы с вами свяжемся в ближайшее время
                        </div>
                    </div>

                    <form action="#" class="callback">
                        <input type="text" class="name" placeholder="Имя">
                        <input type="text" class="phone" placeholder="+7(___)-___-__-__">
                        <input type="submit" class="submit">
                    </form>
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
                <div class="reviews-desc">С нами квартиру нашли уже более <span class="reviews-desc-bold">250</span> человек</div>

                <ul class="reviews-slider nostyle">
                    <li>
                        <div class="img">
                            <img src="<?=get_template_directory_uri();?>/img/avatar.jpg" alt="avatar">
                        </div>
                        <div class="reviews-slider-col">
                            <div class="title">
                                Мария, 29 лет, г. Новокузнецк
                            </div>
                            <p class="text">Обратилась в компанию «Твой — Дом» за помощью в выборе 1-ой квартиры в Новостройке. Менеджер оказался отзывчивый, показал много квартир, когда выбрала, помог с оформлением документов. Большое спасибо вам)</p>

                        </div>
                    </li>
                    <li>
                        <div class="img">
                            <img src="<?=get_template_directory_uri();?>/img/avatar.jpg" alt="avatar">
                        </div>
                        <div class="reviews-slider-col">
                            <div class="title">
                                Мария, 29 лет, г. Новокузнецк
                            </div>
                            <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius hic ipsam molestiae nulla quasi reprehenderit temporibus. Accusantium architecto aspernatur, corporis cum dolor et hic maiores pariatur sequi sunt, voluptates voluptatibus!</p>

                        </div>
                    </li>
                    <li>
                        <div class="img">
                            <img src="<?=get_template_directory_uri();?>/img/avatar.jpg" alt="avatar">
                        </div>
                        <div class="reviews-slider-col">
                            <div class="title">
                                Мария, 29 лет, г. Новокузнецк
                            </div>
                            <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, delectus laudantium quas reiciendis vero voluptas.</p>

                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </div>
<?php
get_footer();
