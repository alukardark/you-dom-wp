<?
add_action( 'wp_ajax_get_result_url', 'get_result_url' );
add_action( 'wp_ajax_nopriv_get_result_url', 'get_result_url' );
function get_result_url() {
//    $url = get_result('AJAX');
    $items_res_list = get_result(true);
    $rooms = $_POST['filter']['rooms'];
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

    <?endforeach;
    showPagination(true);
}


