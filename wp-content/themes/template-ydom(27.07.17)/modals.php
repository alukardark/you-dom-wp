<div class="modal fade" id="modal-callback" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div type="button" class="close modal__close" data-dismiss="modal" aria-label="Close">
                    <span class="top"></span>
                    <span class="middle"></span>
                    <span class="bottom"></span>
                </div>
                <h4 class="modal-title" >Заказать звонок</h4>
            </div>
            <div class="modal-body">
                <p>Оставьте свои контактные данные, мы с вами свяжемся в ближайшее время и ответим на все интересующие вопросы</p>
                <?echo do_shortcode("[contact-form-7 id=\"64\" title=\"Заказать звонок\"]");?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-number-admin" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div type="button" class="close modal__close" data-dismiss="modal" aria-label="Close">
                    <span class="top"></span>
                    <span class="middle"></span>
                    <span class="bottom"></span>
                </div>
                <h4 class="modal-title" >Заказать звонок</h4>
            </div>
            <div class="modal-body">
                <p>Оставьте свои контактные данные, мы с вами свяжемся в ближайшее время</p>
                <?echo do_shortcode("[contact-form-7 id=\"64\" title=\"Заказать звонок\"]");?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-map-address" tabindex="-1" role="dialog" style="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div type="button" class="close modal__close" data-dismiss="modal" aria-label="Close">
                    <span class="top"></span>
                    <span class="middle"></span>
                    <span class="bottom"></span>
                </div>
                <div class="modal-title">Объект на карте</div>
            </div>
            <div class="modal-body">
                <div id="YMapsID"  style="width: 100%; height: 600px;margin-bottom: 10px;"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-map-clusterer" tabindex="-1" role="dialog" style="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div type="button" class="close modal__close" data-dismiss="modal" aria-label="Close">
                    <span class="top"></span>
                    <span class="middle"></span>
                    <span class="bottom"></span>
                </div>
                <div class="modal-title">Объекты на карте</div>
            </div>
            <div class="modal-body">
<!--                <div id="YMapsID"  style="width: 100%; height: 600px;margin-bottom: 10px;"></div>-->
                <div id="mapId" ></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-map-admin" tabindex="-1" role="dialog" style="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div type="button" class="close modal__close" data-dismiss="modal" aria-label="Close">
                    <span class="top"></span>
                    <span class="middle"></span>
                    <span class="bottom"></span>
                </div>
                <div class="modal-title">Объект на карте</div>
            </div>
            <div class="modal-body">
                <div id="YMapsIDAdmin"  style="width: 100%; height: 600px;margin-bottom: 10px;"></div>
            </div>
        </div>
    </div>
</div>