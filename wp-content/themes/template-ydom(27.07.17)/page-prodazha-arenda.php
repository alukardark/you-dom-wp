<?php get_header();?>
    <div class="main main-inner">
        <div class="main-slide">
            <div class="wrapper">
                <h1 id="rev-4">Продажа недвижимости</h1>
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
                        $_COOKIE['buyDistrictId'] = str_replace(array("[","]"), array("", ""), $_COOKIE['buyDistrictId']);
                        $_COOKIE['buysectionId'] = str_replace(array("[","]"), array("", ""), $_COOKIE['buysectionId']);
                        ?>
                        <input class="filter-page" type="hidden" name="filter[page]" value="1">
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
                                    <input value="<?if($_COOKIE['buyPriceFrom']){echo $_COOKIE['buyPriceFrom'];}?>" min="0" name="filter[priceFrom]" type="text" class="priceFrom">
                                    <span>до </span>
                                    <input value="<?if($_COOKIE['buyPriceTo']){echo $_COOKIE['buyPriceTo'];}?>" min="0"  name="filter[priceTo]" type="text" class="priceTo">
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
                        <?
                        $settings_sectionId = get_field('settings_sectionId', 33);
                        ?>
                        <div class="main-scaner-wrap">
                            <select class="sections" multiple="multiple" name="filter[sectionId][]">
                                <?$settings_sectionId = get_field('settings_sectionId', 33);?>
                                <option <?if($_COOKIE['buysectionId'] && in_array(2, explode(',',$_COOKIE['buysectionId']))){echo 'selected';}?>  value="2">Продажа жилой</option>
                                <option <?if(!$settings_sectionId || !in_array(4, $settings_sectionId)){ echo "disabled"; }?> <?if($_COOKIE['buysectionId'] && in_array(4, explode(',',$_COOKIE['buysectionId']))){echo 'selected';}?> value="4" >Продажа коммерческой</option>
                                <option <?if($_COOKIE['buysectionId'] && in_array(1, explode(',',$_COOKIE['buysectionId']))){echo 'selected';}?> value="1" >Аренда жилой</option>
                                <option <?if(!$settings_sectionId || !in_array(3, $settings_sectionId)){ echo "disabled"; }?> <?if($_COOKIE['buysectionId'] && in_array(3, explode(',',$_COOKIE['buysectionId']))){echo 'selected';}?> value="3" >Аренда коммерческой</option>
                            </select>
                            <input value="<?if($_COOKIE['buyAddress']){echo $_COOKIE['buyAddress'];}?>" type="text" class="address" name="filter[address]" placeholder="Адрес" maxlength="255">
                            <input value="<?if($_COOKIE['buyDescription']){echo $_COOKIE['buyDescription'];}?>" type="text" class="description" name="filter[description]" placeholder="Описание" maxlength="255">
                            <div class="withPhoto-wrap">
                                <input <?if($_COOKIE['buywithPhoto'] && in_array(1, explode(',',$_COOKIE['buywithPhoto']))){echo 'checked';}?> id="withPhoto" type="checkbox" class="withPhoto" name="filter[withPhoto]"  value="1">
                                <label for="withPhoto">С фото</label>

                                <?php if (get_field('settings_with-realtors', 33) == 1): ?>
                                    <input <?if($_COOKIE['buywithRealtors'] && in_array(1, explode(',',$_COOKIE['buywithRealtors']))){echo 'checked';}?>  id="withRealtors" type="checkbox" class="withRealtors" name="filter[withRealtors]"  value="1">
                                    <label for="withRealtors">С риэлторами</label>
                                <?php endif ?>
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
                                <button class="open-map" data-toggle="modal" data-target="#modal-map-clusterer" type="button">Объекты на карте</button>
                            </div>
                        </div>
                        <input type="submit" name="filter[reset]" class="advanced-search reset" value="Сбросить фильры">
                        <input type="submit" name="filter[search]" class="search" value="Найти">
                    </form>

                </div>

            </div>
        </div>

        <div class="catalog">
            <div class="wrapper">
                <?
                $items_res_list = get_result();
                if (empty($items_res_list)):
                    ?>
                    <div class="empty-result">Ничего не найдено.</div>
                <?endif;?>
                <ul class="nostyle ownership-list" id="scrollRes">
                    <?
                    foreach ($items_res_list as $item):
                        if(!empty($item->latitude) && !empty($item->longitude) && !empty($item->address)){
                            $dataItems[] = [
                            'latitude' => $item->latitude,
                            'longitude' => $item->longitude,
                            'address' => $item->address,
                            'price' => $item->price,
                            'description' => $item->description,
                            'district' => $item->district,
                            'phones' => $item->phones->item,
                            'type' => $item->type,
                            'rooms' => $item->rooms,
                            'square' => $item->square,
                            'floor' => $item->floor,
                            'floors' => $item->floors,
                            'id' => $item->id,
                            'photosItem' => $item->photos->item,
                            'name' => $item->name,
                            ];
                        }
                        ?>
                        <li class="ownership-item">
                            <?if($item->isRealtor==-1){?><div class="isRealtor"><?=$item->isRealtor?></div><?}?>
                                
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
                                        <li class="ownership-item-title"><span class="ownership-item-favorites"></span><?=$item->type?></li>
                                        <li class="ownership-item-address"><?=$item->address?></li>
                                        <li class="ownership-item-attributes">
                                            <ul class="nostyle">
                                                <?if(empty($item->rooms)): $item->rooms .= '-';?>
                                                <?elseif(!empty($item->rooms)): $item->rooms .= '-к';?>
                                                <?endif;?>
                                                <?if(empty($item->floor)) $item->floor .= '-';?>
                                                <?if(empty($item->square)): $item->square .= '-';?>
                                                <?elseif(!empty($item->square)): $item->square .= ' м<sup>2</sup>';?>
                                                <?endif;?>
                                                <?if(empty($item->floors)) $item->floors .= '-';?>
                                                <li class="ownership-item-rooms">Количество комнат: <span><?=$item->rooms?></span></li>
                                                <li class="ownership-item-rooms">Этаж: <span><?=$item->floor?></span></li>
                                                <li class="ownership-item-area">Общая площадь: <span><?=$item->square?></span></li>
                                                <li class="ownership-item-storeys">Этажность: <span><?=$item->floors?></span></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li class="ownership-item-right">
                                    <ul class="nostyle">
                                        <li class="ownership-item-price"><?=format_price($item->price, $item->currency)?></li>
                                        <li class="ownership-item-maps" <?if(empty($item->latitude)):?>style="visibility: hidden;"<?endif;?>><a data-toggle="modal" data-target="#modal-map-address" data-latitude="<?=$item->latitude?>"  data-longitude="<?=$item->longitude?>" href="#">Смотреть на карте</a></li>
                                        <?php if (is_super_admin()): ?>
                                            <li class="ownership-item-name"><?=$item->name?></li>
                                        <?php endif ?>
                                        <?if ($item->phones->item):?>
                                            <li class="ownership-item-phone">
                                            <!-- <?//=format_phone($item->phones->item)?> -->
                                                <?php if (is_super_admin()): ?>
                                                <?=format_phone($item->phones->item)?>
                                                <?php else:?>
                                                    <span data-toggle="modal" data-target="#modal-number-admin" type="button"><?=get_field('settings_phone', 33)?></span>
                                                <?php endif ?>
                                            </li>
                                        <?endif;?>

                                    </ul>
                                </li>
                            </ul>

                            <div class="ownership-item-desc">
                                <?=$item->description?>
                            </div>
                        </li>

                    <?endforeach;?>
                    <div class="hiddenDataItems"><?=json_encode($dataItems, JSON_UNESCAPED_UNICODE)?></div>
                </ul>
                <?
                showPagination();
                ?>
            </div>
        </div>
    </div>
<?php
get_footer();
