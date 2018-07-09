<?php get_header();?>
    <div class="main main-inner">
        <div class="main-slide">
            <div class="wrapper">
                <h2 id="rev-4">Продажа недвижимости</h2>
                <br>
                <div id="rev-5" class="main-slide-desc">
                    Более 1500 объектов по Кемеровской области
                </div>
            </div>

            <ul class="nav-tabs wrapper nostyle">
                <li class="active"><a href="#buyFake">Купить</a></li>
                <li><a href="#rent">Арендовать</a></li>
            </ul>

            <div class="tab-content wrapper">
                <div class="tab-pane fade in active" id="buy">

                    <form method="POST" action="" class="main-scaner buy">
                        <?
                        $_COOKIE['buyTypeId'] = str_replace(array("[","]"), array("", ""), $_COOKIE['buyTypeId']);
                        $_COOKIE['buyRoomsId'] = str_replace(array("[","]"), array("", ""), $_COOKIE['buyRoomsId']);
                        $_COOKIE['buyDistrictId'] = str_replace(array("[","]"), array("", ""), $_COOKIE['buyDistrictId']);
                        $_COOKIE['buysectionId'] = str_replace(array("[","]"), array("", ""), $_COOKIE['buysectionId']);
                        ?>
                        <input class="filter-page" type="hidden" name="filter[page]" value="1">
                        <div class="main-scaner-wrap">
                            <select class="type" multiple="multiple" name="filter[typeId][]">
                                <?
                                $res = types();
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
                                <option disabled <?if($_COOKIE['cityId'] && in_array(649, explode(',',$_COOKIE['cityId']))){echo 'selected';}?> value="649"  >Новосибирск</option>
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
                        <div class="main-scaner-wrap">
                            <select class="sections" multiple="multiple" name="filter[sectionId][]">
                                <option <?if($_COOKIE['buysectionId'] && in_array(2, explode(',',$_COOKIE['buysectionId']))){echo 'selected';}?>  value="2">Продажа жилой</option>
                                <option disabled <?if($_COOKIE['buysectionId'] && in_array(4, explode(',',$_COOKIE['buysectionId']))){echo 'selected';}?> value="4" >Продажа коммерческой</option>
                                <option <?if($_COOKIE['buysectionId'] && in_array(1, explode(',',$_COOKIE['buysectionId']))){echo 'selected';}?> value="1" >Аренда жилой</option>
                                <option disabled <?if($_COOKIE['buysectionId'] && in_array(3, explode(',',$_COOKIE['buysectionId']))){echo 'selected';}?> value="3" >Аренда коммерческой</option>
                            </select>
                            <input type="text" class="address" name="filter[address]" placeholder="Адрес">
                            <input type="text" class="description" name="filter[description]" placeholder="Описание">
                            <div class="withPhoto-wrap">
                                <input <?if($_COOKIE['buywithPhoto'] && in_array(1, explode(',',$_COOKIE['buywithPhoto']))){echo 'checked';}?> id="withPhoto" type="checkbox" class="withPhoto"name="filter[withPhoto]"  value="1">
                                <label for="withPhoto">С фото</label>
                            </div>
                        </div>
                        <div class="main-scaner-wrap">
                            <div class="wrap-square">
                                <span>Площадь от </span><input value="<?if($_COOKIE['buySquareFrom']){echo $_COOKIE['buySquareFrom'];}?>" min="0" name="filter[squareFrom]" class="squareFrom" type="number" >
                                <span>до </span><input value="<?if($_COOKIE['buySquareTo']){echo $_COOKIE['buySquareTo'];}?>" min="0"  name="filter[squareTo]" class="squareTo" type="number" >
                                <span>м<sup>2</sup></span>
                            </div>
                            <div class="wrap-square wrap-floor">
                                <span>Этаж от </span><input value="<?if($_COOKIE['buyFloorFrom']){echo $_COOKIE['buyFloorFrom'];}?>" min="0" name="filter[floorFrom]" class="floorFrom" type="number" >
                                <span>до </span><input value="<?if($_COOKIE['buyFloorTo']){echo $_COOKIE['buyFloorTo'];}?>" min="0"  name="filter[floorTo]" class="floorTo" type="number" >
                            </div>
                            <div class="wrap-square wrap-floors">
                                <span>Этажность дома от </span><input value="<?if($_COOKIE['buyFloorsFrom']){echo $_COOKIE['buyFloorsFrom'];}?>" min="0"name="filter[floorsFrom]" class="floorsFrom" type="number" >
                                <span>до </span><input value="<?if($_COOKIE['buyFloorsTo']){echo $_COOKIE['buyFloorsTo'];}?>" min="0" name="filter[floorsTo]" class="floorsTo" type="number" >
                            </div>
                            <div class="wrap-map">
                                <button class="open-map" id="openMapFilterButton" type="button" class="" data-toggle="modal" data-target="#modalMapFilter">Объекты на карте</button>
                            </div>
                        </div>
                        <!--                        <a href="#" class="advanced-search">Сбросить фильры</a>-->
                        <input type="submit" name="filter[reset]" class="advanced-search reset" value="Сбросить фильры">
                        <input type="submit" name="filter[search]" class="search" value="Найти">
                    </form>

                </div>

            </div>
        </div>

        <div class="catalog">
            <div class="wrapper">
                <div class="wrap-map-contain" style="height: 900px;width: 960px;">
                    <div id="map"></div>
                </div>
                <?
                $items_res_list = get_result();
                $rooms = $_POST['filter']['rooms'];
                if (empty($items_res_list)):
                ?>
                    <div class="empty-result">Ничего не найдено.</div>
                <?endif;?>
                <ul class="nostyle ownership-list">
                    <?
                    //                    echo "<pre>";
                    //                    //print_r($_POST );
                    //                    echo "<br>";
                    //                    //print_r($_COOKIE);
                    //                    echo "</pre>";

                    foreach ($items_res_list as $item):
                        if($rooms) {
                            //Игнорируем не выбранные комнаты:
                            if (!in_array('5', $rooms)) {
                                echo '!';
                                if (!in_array($item->rooms, $rooms)) continue;
                            }elseif (in_array('5', $rooms) && count($rooms)>1){
                                echo '?';
                                if (!in_array($item->rooms, $rooms) && !($item->rooms>4) && !empty($item->rooms)) continue;
                            }elseif(in_array('5', $rooms)){
                                echo '/';
                                if (!($item->rooms>4) && !empty($item->rooms)) continue;
                            }

                        }
                        echo "<span class='date'>$item->created</span>";
                        ?>
                        <li class="ownership-item">
                            <ul class="nostyle ownership-item-images">

                                <?if($item->photos->item):?>
                                    <?foreach ($item->photos->item as $itemPhoto):?>
                                        <li>
                                            <a href="<?=$itemPhoto?>" data-fancybox="<?=$item->id?>" data-type="image">
                                                <span class="self-image" style="background-image: url(<?=$itemPhoto?>);"></span>
                                            </a>
                                        </li>
                                    <?endforeach;?>
                                <?elseif (!$item->photos->item):?>
                                    <li class="empty-photo">
                                        <img src="<?=get_template_directory_uri();?>/img/empty-photo.png">
                                    </li>
                                <?endif;?>
                                <div class="phone-icon"></div>
                            </ul>

                            <ul class="nostyle ownership-item-info">
                                <li class="ownership-item-left">
                                    <ul class="nostyle">
                                        <li class="ownership-item-title"><?=$item->type?></li>
                                        <li class="ownership-item-address"><?=$item->address?></li>
                                        <li class="ownership-item-attributes">
                                            <ul class="nostyle">
                                                <li class="ownership-item-rooms">Количество комнат: <span><?=$item->rooms?>-к</span></li>
                                                <li class="ownership-item-rooms">Этаж: <span><?=$item->floor?></span></li>
                                                <li class="ownership-item-area">Общая площадь: <span><?=$item->square?> м<sup>2</sup></span></li>
                                                <li class="ownership-item-storeys">Этажность: <span><?=$item->floors?></span></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li class="ownership-item-right">
                                    <ul class="nostyle">
                                        <li class="ownership-item-price"><?=format_price($item->price, $item->currency)?></li>
                                        <li class="ownership-item-maps"><a href="#">Смотреть на карте</a></li>
                                        <?if ($item->phones->item):?>
                                            <li class="ownership-item-phone"><?=format_phone($item->phones->item)?></li>
                                        <?endif;?>

                                    </ul>
                                </li>
                            </ul>

                            <div class="ownership-item-desc">
                                <?=$item->description?>
                            </div>
                            <!--<a href="#" class="ownership-item-desc-more">Читать полностью</a>-->
                        </li>

                    <?endforeach;?>
                </ul>

                <!--                <ul class="my-pagination nostyle">-->
                <!--                    <li><a class="pagination-prev" href=""></a></li>-->
                <!--                    <li><a href="">1</a></li>-->
                <!--                    <li><a href="">2</a></li>-->
                <!--                    <li><a  class="active"  href="">3</a></li>-->
                <!--                    <li><a href="">...</a></li>-->
                <!--                    <li><a href="">33</a></li>-->
                <!--                    <li><a class="pagination-after" href=""></a></li>-->
                <!--                </ul>-->
                <?
                showPagination();
                ?>
                
            </div>
        </div>
    </div>
<?php
get_footer();
