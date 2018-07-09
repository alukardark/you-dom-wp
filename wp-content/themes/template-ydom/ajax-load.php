<?
add_action( 'wp_ajax_get_result_url', 'get_result_url' );
add_action( 'wp_ajax_nopriv_get_result_url', 'get_result_url' );
function get_result_url() {
//    $url = get_result('AJAX');
    $items_res_list = get_result(true);
//    $rooms = $_POST['filter']['rooms'];
    foreach ($items_res_list as $item):
//        if($rooms) {
//            //Игнорируем не выбранные комнаты:
//            if (!in_array('5', $rooms)) {
//                echo '!';
//                if (!in_array($item->rooms, $rooms)) continue;
//            }elseif (in_array('5', $rooms) && count($rooms)>1){
//                echo '?';
//                if (!in_array($item->rooms, $rooms) && !($item->rooms>4) && !empty($item->rooms)) continue;
//            }elseif(in_array('5', $rooms)){
//                echo '/';
//                if (!($item->rooms>4) && !empty($item->rooms)) continue;
//            }
//        }
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
            <?php if (is_super_admin()): ?>
                <?if($item->isRealtor==-1){?><div class="isRealtor"><?=$item->isRealtor?></div><?}?>
            <?endif?>
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
                        <?php if (is_super_admin()): ?>
                            <li class="ownership-item-sources"><?echo get_field_object('settings_sources', 33)['choices'][(int)$item->sourcesId->item]?></li>
                        <?php endif ?>
                        <li class="ownership-item-price"><?if(!empty($item->price) && $item->sectionId!=1 && $item->sectionId!=3){?><a href="/ipoteka/" class="ipoteka-ico">%<span>Расчет ипотеки<span></a><?}?><?=format_price($item->price, $item->currency)?></li>
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
            <!--<a href="#" class="ownership-item-desc-more">Читать полностью</a>-->
        </li>

    <?endforeach;?>
    <div class="hiddenDataItemsAjax"><?=json_encode($dataItems, JSON_UNESCAPED_UNICODE)?></div>
    <?
    showPagination(true);
    wp_die();
}


