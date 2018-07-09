jQuery(document).ready(function($) {

    var ms_ie = false;
    var ua = window.navigator.userAgent;
    var old_ie = ua.indexOf('MSIE ');
    var new_ie = ua.indexOf('Trident/');
    if ((old_ie > -1) || (new_ie > -1)) {
        ms_ie = true;
    }
    if ( ms_ie ) {
        console.log('IE');
    }


    setTimeout(function() {
        $('.main-scaner-wrap').css({
            'visibility':'visible',
            'opacity':'1',
        });

    }, 100);


    $('.ownership-item-desc').readmore({
        speed: 375,
        collapsedHeight: 72,
        moreLink: '<a class="ownership-item-desc-more" href="#">Читать полностью</a>',
        lessLink: '<a class="ownership-item-desc-more" href="#">Скрыть текст</a>',
    });


    $('.ownership-item').each(function(){
        var countLi = $(this).find('.ownership-item-images li').length;
        $(this).find('.phone-icon').text(countLi).show();
        $(this).find('.empty-photo').siblings('.phone-icon').hide();
    });



    // //Смена текста, на наведении
    // $('.why-agency-item').hover(function(){
    //     var dataText = $(this).data('text')
    //     $('.why-agency-desc').text(dataText);
    //     var delay = 0.01;
    //     if ( !ms_ie ) {
    //         stepAnimateText('.fade-text','bounceInDown', 0.01);
    //     }
    //     return false;
    // });
    // // Animate function
    // function stepAnimateText(element, animation, delay){
    //     var text = $(element).text();
    //     var curr = '';
    //     for (var i=0; i < text.length; i++){
    //         var character = text.charAt(i);
    //         $(element).html(curr+'<span class="'+animation+'" style="-webkit-animation-delay: '+i*delay+'s; animation-delay: '+i*delay+'s">'+character +"</span>");
    //         curr = $(element).html();
    //     }
    // }
    // var defaultText = $('.why-agency-desc').text();
    //  $('.why-agency-item').mouseleave(function(){
    //      $('.why-agency-desc').text(defaultText);
    //      if ( !ms_ie ) {
    //          stepAnimateText('.fade-text','bounceInDown', 0.01);
    //      }
    //      return false;
    //  });
    // if ( !ms_ie ) {
    //     stepAnimateText('.fade-text','bounceInDown', 0.01);
    // }

    //Смена текста, на наведении
    $('.why-agency-item').hover(function(){
        var dataText = $(this).data('text');
        $('.why-agency-desc').css('opacity','0');
        $('.why-agency-desc').stop(true).animate({'opacity':'1'}, {
            duration: 500
        });

        $('.why-agency-desc').text(dataText);

    });
    var defaultText = $('.why-agency-desc').text();
    $('.why-agency-item').mouseleave(function(){

        $('.why-agency-desc').css('opacity','0');
        $('.why-agency-desc').stop(true).animate({'opacity':'1'}, {
            duration: 500
        });

        $('.why-agency-desc').text(defaultText);

    });


    $('.reviews-slider').slick({
        dots: false,
        infinite: true,
        speed: 500,
        fade: false,
        swipe: false,
        // nextArrow: $('.btn-next')
    });

    setTimeout(function() {
        $('.reviews-slider').css({
            'visibility':'visible',
            'opacity':'1',
        });
    }, 100);

    $('.scrollTop').click(function(e){
        $('html,body').animate({scrollTop: 0}, 'slow');
        return false;
    });

    $('.scroll-bottom').click(function(e){
        var href = $(this).attr('href');
        if($(href).length){
            $('html, body').animate({
                scrollTop: $(href).offset().top-$('nav').outerHeight()
            }, 850 );
        }
        return false;
    });



    $('form .phone').mask('+7(999)-999-99-99', { 'placeholder': '+7(___)-___-__-__' });










    // $('.nav-tabs a').on('shown.bs.tab', function (e) {
    //     e.target // activated tab
    //     e.relatedTarget // previous tab
    //
    //     //arenda-slider
    //     $( ".arenda .slider-range" ).slider({
    //         range: true,
    //         min: 500000,
    //         max: 3000000,
    //         step: 10000,
    //         slide: function( event, ui ) {
    //             if ( (ui.values[0] + 250000) >= ui.values[1] ) {
    //                 return false;
    //             }
    //             $( ".arenda .amount" ).val( addCommas("$" + ui.values[ 0 ]));
    //             $( ".arenda .amount-two" ).val( addCommas("$" + ui.values[ 1 ]));
    //         }
    //     });
    //     $( ".arenda .amount" ).val(addCommas("$" + $(".arenda .slider-range").slider( "values", 0 )));
    //     $( ".arenda .amount-two" ).val(addCommas("$" + $(".arenda .slider-range").slider( "values", 1 )));
    //     $(".arenda .amount").change(function(){
    //         var value1=$(".arenda .amount").val();
    //         value1 = value1.replace(/\$/gi, '');
    //         value1 = value1.replace(/ /gi, '');
    //         $(".slider-range").slider("values",1,value1);
    //     });
    //     $(".arenda .amount-two").change(function(){
    //         var value2=$(".arenda .amount-two").val();
    //         value2 = value2.replace(/\$/gi, '');
    //         value2 = value2.replace(/ /gi, '');
    //         $(".arenda .slider-range").slider("values",1,value2);
    //     });
    //
    //
    // })


    //buy-slider
    var buyPriceFrom = 0;
    var buyPriceTo = 2000000;
    if(Cookies.get('buyPriceFrom') && Cookies.get('buyPriceTo')){
        buyPriceFrom = Cookies.get('buyPriceFrom').replace(/\$/g,"").replace(/ /g,"");
        buyPriceTo = Cookies.get('buyPriceTo').replace(/\$/g,"").replace(/ /g,"");
        var buyPrice = [buyPriceFrom, buyPriceTo];
    }else{
        var buyPrice = [ 750000, 2000000 ];
    }
    $( ".buy .slider-range" ).slider({
        range: true,
        // min: 500000,
        min: 0,
        max: 3000000,
        step: 10000,
        values: buyPrice,
        slide: function( event, ui ) {
            if ( (ui.values[0] + 250000) >= ui.values[1] ) {
                return false;
            }
            $( ".buy .amount" ).val( addCommas("$" + ui.values[ 0 ]));
            $( ".buy .amount-two" ).val( addCommas("$" + ui.values[ 1 ]));
        }
    });
    $( ".buy .amount" ).val(addCommas("$" + $(".buy .slider-range").slider( "values", 0 )));
    $( ".buy .amount-two" ).val(addCommas("$" + $(".buy .slider-range").slider( "values", 1 )));
    $(".buy .amount").change(function(){
        var value1=$(".buy .amount").val();
        value1 = value1.replace(/\$/gi, '');
        value1 = value1.replace(/ /gi, '');

        $(".slider-range").slider("values",1,value1);
    });
    $(".buy .amount-two").change(function(){
        var value2=$(".buy .amount-two").val();
        value2 = value2.replace(/\$/gi, '');
        value2 = value2.replace(/ /gi, '');

        $(".buy .slider-range").slider("values",1,value2);
    });


    //arenda-slider
    $( ".arenda .slider-range" ).slider({
        range: true,
        min: 500000,
        max: 3000000,
        step: 10000,
        values: [ 750000, 2000000 ],
        slide: function( event, ui ) {
            if ( (ui.values[0] + 250000) >= ui.values[1] ) {
                return false;
            }
            $( ".arenda .amount" ).val( addCommas("$" + ui.values[ 0 ]));
            $( ".arenda .amount-two" ).val( addCommas("$" + ui.values[ 1 ]));
        }
    });
    $( ".arenda .amount" ).val(addCommas("$" + $(".arenda .slider-range").slider( "values", 0 )));
    $( ".arenda .amount-two" ).val(addCommas("$" + $(".arenda .slider-range").slider( "values", 1 )));
    $(".arenda .amount").change(function(){
        var value1=$(".arenda .amount").val();
        value1 = value1.replace(/\$/gi, '');
        value1 = value1.replace(/ /gi, '');

        $(".slider-range").slider("values",1,value1);
    });
    $(".arenda .amount-two").change(function(){
        var value2=$(".arenda .amount-two").val();
        value2 = value2.replace(/\$/gi, '');
        value2 = value2.replace(/ /gi, '');

        $(".arenda .slider-range").slider("values",1,value2);
    });



    function addCommas(nStr)
    {
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

    $('select.type').multipleSelect({
        placeholder: "Тип жилья",
        allSelected: 'Все типы',
        selectAllText: 'Выбрать все',
        selectAllDelimiter: ['',''],
        minimumCountSelected: 2,
        countSelected: '|# of % selected|',
        ellipsis: true,
        maxHeight: ''
    });
    $('select.rooms').multipleSelect({
        placeholder: "Комнат",
        allSelected: '1-к., 2-к....',
        selectAllText: 'Выбрать все',
        selectAllDelimiter: ['',''],
        minimumCountSelected: 2,
        countSelected: '|# of % selected|',
        ellipsis: true,
        maxHeight: ''
    });
    $('select.city').multipleSelect({
        placeholder: "Город",
        allSelected: false,
        selectAllText: 'Выбрать все',
        selectAll: false,
        single: true,
        selectAllDelimiter: ['',''],
        countSelected: '|# of % selected|',
        ellipsis: true,
        maxHeight: ''
    });
    $('select.region').multipleSelect({
        placeholder: "Район",
        allSelected: 'Все районы',
        selectAllText: 'Выбрать все',
        selectAllDelimiter: ['',''],
        minimumCountSelected: 2,
        countSelected: '|# of % selected|',
        ellipsis: true,
        maxHeight: ''
    });
    $('select.sections').multipleSelect({
        placeholder: "Тип собственности",
        allSelected: false,
        selectAllText: 'Выбрать все',
        selectAll: false,
        single: true,
        selectAllDelimiter: ['',''],
        countSelected: '|# of % selected|',
        ellipsis: true,
        maxHeight: ''
    });


    //custom input=number
    $('.wrap-square input').spinner();




//эффект появления текста и картинок
    function BlockRevealersInit() {
        rev4 = new RevealFx(document.querySelector('#rev-4'), {
            isContentHidden: true,
            revealSettings : {
                bgcolor: '#ffbb38',
                delay: 250,
                onCover: function(contentEl, revealerEl) {
                    contentEl.style.opacity = 1;
                }
            }
        }),
            rev5 = new RevealFx(document.querySelector('#rev-5'), {
                isContentHidden: true,
                revealSettings : {
                    bgcolor: '#ffbb38',
                    delay: 500,
                    onCover: function(contentEl, revealerEl) {
                        contentEl.style.opacity = 1;
                    }
                }
            });

        setTimeout(function() {
            $('.main-slide h2').css({
                'opacity':'1',
            });
        }, 100);
        setTimeout(function() {
            $('.main-slide-desc').css({
                'opacity':'1',
            });
        }, 100);
        rev4.reveal();
        rev5.reveal();

    }
    if($('#rev-4').length || $('#rev-5').length){
        BlockRevealersInit();
    }





    var buyTypeId = [];
    if($('#buy .type input').each(function(){
            if($(this).is(':checked')){
                buyTypeId.push(parseInt($(this)['context']['value']));
            }
        }))
    //console.log(Cookies.get('buyTypeId'));
        $('#buy .type input').on('change', function(obj){
            if (this.checked){
                //Добавляем в массив элементы, при добавлении checked
                buyTypeId.push(parseInt(obj['currentTarget']['value']));
            }else{
                //Удаляем из массива элементы, при снятии checked
                var thisValue = $(this)['context']['value'];
                //console.log('thisValue: '+thisValue);
                var thisId = buyTypeId.indexOf(parseInt(thisValue));
                //console.log('thisId: '+thisId)
                buyTypeId.splice(thisId,1);
            }
            Cookies.set('buyTypeId', buyTypeId);
        });
    $('#buy .type li.ms-select-all').find('input').on('change', function(){
        if (this.checked){
            $('#buy .type input').each(function(){
                // if(isNaN($(this).val())){
                //     $(this).attr('value', '0');
                // }
                buyTypeId.push(parseInt($(this).val()));
            });
        }else{
            buyTypeId = [];
            // $('#buy .type input').each(function(){
            //     $(this).removeAttr('checked');
            // });
        }
        Cookies.set('buyTypeId', buyTypeId);
    });



    var buyRoomsId = [];
    if($('#buy .rooms input').each(function(){
            if($(this).is(':checked')){
                buyRoomsId.push(parseInt($(this)['context']['value']));
            }
        }))
        $('#buy .rooms input').on('change', function(obj){
            if (this.checked){
                //Добавляем в массив элементы, при добавлении checked
                buyRoomsId.push(parseInt(obj['currentTarget']['value']));
            }else{
                //Удаляем из массива элементы, при снятии checked
                var thisValue = $(this)['context']['value'];
                var thisId = buyRoomsId.indexOf(parseInt(thisValue));
                buyRoomsId.splice(thisId,1);
            }
            Cookies.set('buyRoomsId', buyRoomsId);
        });
    $('#buy .rooms li.ms-select-all').find('input').on('change', function(){
        if (this.checked){
            $('#buy .rooms input').each(function(){
                buyRoomsId.push(parseInt($(this).val()));
            });
        }else{
            buyRoomsId = [];
        }
        Cookies.set('buyRoomsId', buyRoomsId);
    });



    var buyDistrictId = [];
    if($('#buy .region input').each(function(){
            if($(this).is(':checked')){
                buyDistrictId.push(parseInt($(this)['context']['value']));
            }
        }))
        $('#buy .region input').on('change', function(obj){
            if (this.checked){
                //Добавляем в массив элементы, при добавлении checked
                buyDistrictId.push(parseInt(obj['currentTarget']['value']));
            }else{
                //Удаляем из массива элементы, при снятии checked
                var thisValue = $(this)['context']['value'];
                var thisId = buyDistrictId.indexOf(parseInt(thisValue));
                buyDistrictId.splice(thisId,1);
            }
            Cookies.set('buyDistrictId', buyDistrictId);
        });
    $('#buy .region li.ms-select-all').find('input').on('change', function(){
        if (this.checked){
            $('#buy .region input').each(function(){
                buyDistrictId.push(parseInt($(this).val()));
            });
        }else{
            buyDistrictId = [];
        }
        Cookies.set('buyDistrictId', buyDistrictId);
    });



    var buysectionId = [];
    if($('#buy .sections input').each(function(){
            if($(this).is(':checked')){
                buysectionId.push(parseInt($(this)['context']['value']));
            }
        }))
        $('#buy .sections input').on('change', function(obj){
            if (this.checked){
                Cookies.set('buysectionId', parseInt(obj['currentTarget']['value']));
            }else{
                Cookies.set('buysectionId', '');
            }
            // $('#buy form').submit();
        });



    if($('#buy .city input').each(function(){
            if($(this).is(':checked')){
                buysectionId.push(parseInt($(this)['context']['value']));
            }
        }))
        $('#buy .city input').on('change', function(obj){
            if (this.checked){
                Cookies.set('cityId', parseInt(obj['currentTarget']['value']));
            }else{
                Cookies.set('cityId', '');
            }
            $('#buy form').submit();
        });



    $('#buy .withPhoto').on('change', function(obj){
        if (this.checked){
            Cookies.set('buywithPhoto', parseInt(obj['currentTarget']['value']));
        }else{
            Cookies.set('buywithPhoto', '');
        }
    });




    $('#buy .search').click(function(){
        Cookies.set('buyPriceFrom', $('#buy .price-cont .amount').val());
        Cookies.set('buyPriceTo', $('#buy .price-cont .amount-two').val());

    });
    $('.main-inner #buy .search').click(function(){
        Cookies.set('buyPriceFrom', $('#buy .price-cont .amount').val());
        Cookies.set('buyPriceTo', $('#buy .price-cont .amount-two').val());
        Cookies.set('buySquareFrom', $('#buy .squareFrom').val());
        Cookies.set('buySquareTo', $('#buy .squareTo').val());
        Cookies.set('buyFloorFrom', $('#buy .floorFrom').val());
        Cookies.set('buyFloorTo', $('#buy .floorTo').val());
        Cookies.set('buyFloorsFrom', $('#buy .floorsFrom').val());
        Cookies.set('buyFloorsTo', $('#buy .floorsTo').val());
    });

    $('#buy .reset').click(function(){
        // Cookies.set('buysectionId', '');
        Cookies.set('buyTypeId', '');
        Cookies.set('buyRoomsId', '');
        Cookies.set('buyDistrictId', '');
        Cookies.set('buywithPhoto', '');
        Cookies.set('buyPriceFrom', '');
        Cookies.set('buyPriceTo', '');
        Cookies.set('buySquareFrom', '');
        Cookies.set('buySquareTo', '');
        Cookies.set('buyFloorFrom', '');
        Cookies.set('buyFloorTo', '');
        Cookies.set('buyFloorsFrom', '');
        Cookies.set('buyFloorsTo', '');
        Cookies.set('buyFloorsTo', '');
    });




    $('.nav-tabs a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    })




    if(window.location.pathname.toString()=='/prodazha-arenda/'){
        //Табы на слайде
        $('header .nav a').eq(0).click(function(e){
            e.preventDefault();
            $(this).addClass('active').parent('li').siblings('li').children('a').removeClass('active');
            $('.nav-tabs li').eq(0).find('a').click();

            $('.ms-parent.sections .ms-drop.bottom li').eq('0').show();
            $('.ms-parent.sections .ms-drop.bottom li').eq('1').show();
            $('.ms-parent.sections .ms-drop.bottom li').eq('2').hide();
            $('.ms-parent.sections .ms-drop.bottom li').eq('3').hide();
        });
        $('header .nav a').eq(1).click(function(e){
            e.preventDefault();
            $(this).addClass('active').parent('li').siblings('li').children('a').removeClass('active')
            $('.nav-tabs li').eq(1).find('a').click();

            $('.ms-parent.sections .ms-drop.bottom li').eq('0').hide();
            $('.ms-parent.sections .ms-drop.bottom li').eq('1').hide();
            $('.ms-parent.sections .ms-drop.bottom li').eq('2').show();
            $('.ms-parent.sections .ms-drop.bottom li').eq('3').show();

            Cookies.set('buysectionId', parseInt($('.ms-parent.sections .bottom li.selected').find('input').attr('value')));
        });
        $('.nav-tabs a').click(function (e) {
            if($('.nav-tabs li').eq(0).hasClass('active')){
                $('select.sections').multipleSelect('uncheckAll');
                $('select.sections').multipleSelect('setSelects', [2]);
                $('header .nav a').eq(0).addClass('active').parent('li').siblings('li').children('a').removeClass('active');

                $('.ms-parent.sections .ms-drop.bottom li').eq('0').show();
                $('.ms-parent.sections .ms-drop.bottom li').eq('1').show();
                $('.ms-parent.sections .ms-drop.bottom li').eq('2').hide();
                $('.ms-parent.sections .ms-drop.bottom li').eq('3').hide();

                if($('#rev-4').length){
                    $('#rev-4').text('Продажа недвижимости');
                    BlockRevealersInit();
                }
            }else if($('.nav-tabs li').eq(1).hasClass('active')){
                $('select.sections').multipleSelect('uncheckAll');
                $('select.sections').multipleSelect('setSelects', [1]);
                $('header .nav a').eq(1).addClass('active').parent('li').siblings('li').children('a').removeClass('active');

                $('.ms-parent.sections .ms-drop.bottom li').eq('0').hide();
                $('.ms-parent.sections .ms-drop.bottom li').eq('1').hide();
                $('.ms-parent.sections .ms-drop.bottom li').eq('2').show();
                $('.ms-parent.sections .ms-drop.bottom li').eq('3').show();

                if($('#rev-4').length){
                    $('#rev-4').text('Аренда недвижимости');
                    BlockRevealersInit();
                }
            }

            Cookies.set('buysectionId', parseInt($('.ms-parent.sections .bottom li.selected').find('input').attr('value')));
        });




        if( Cookies.get('checkTabs') == 1 || Cookies.get('buysectionId') == 1){
            $('header .nav a').eq(1).addClass('active').parent('li').siblings('li').children('a').removeClass('active');
            $('.nav-tabs li').eq(1).addClass('active').siblings('li').removeClass('active');
            $('select.sections').multipleSelect('setSelects', [1]);
            $('.ms-parent.sections .ms-drop.bottom li').eq('0').hide();
            $('.ms-parent.sections .ms-drop.bottom li').eq('1').hide();
            $('.ms-parent.sections .ms-drop.bottom li').eq('2').show();
            $('.ms-parent.sections .ms-drop.bottom li').eq('3').show();
        }
        if(Cookies.get('buysectionId') == 3){
            $('header .nav a').eq(1).addClass('active').parent('li').siblings('li').children('a').removeClass('active');
            $('.nav-tabs li').eq(1).addClass('active').siblings('li').removeClass('active');
            $('select.sections').multipleSelect('setSelects', [3]);
            $('.ms-parent.sections .ms-drop.bottom li').eq('0').hide();
            $('.ms-parent.sections .ms-drop.bottom li').eq('1').hide();
            $('.ms-parent.sections .ms-drop.bottom li').eq('2').show();
            $('.ms-parent.sections .ms-drop.bottom li').eq('3').show();
        }

        if( Cookies.get('checkTabs') == 2 || Cookies.get('buysectionId') == 2){
            $('header .nav a').eq(0).addClass('active').parent('li').siblings('li').children('a').removeClass('active');
            $('.nav-tabs li').eq(0).addClass('active').siblings('li').removeClass('active');
            $('select.sections').multipleSelect('setSelects', [2]);
            $('.ms-parent.sections .ms-drop.bottom li').eq('0').show();
            $('.ms-parent.sections .ms-drop.bottom li').eq('1').show();
            $('.ms-parent.sections .ms-drop.bottom li').eq('2').hide();
            $('.ms-parent.sections .ms-drop.bottom li').eq('3').hide();
        }
        if(Cookies.get('buysectionId') == 4){
            $('header .nav a').eq(0).addClass('active').parent('li').siblings('li').children('a').removeClass('active');
            $('.nav-tabs li').eq(0).addClass('active').siblings('li').removeClass('active');
            $('select.sections').multipleSelect('setSelects', [4]);
            $('.ms-parent.sections .ms-drop.bottom li').eq('0').show();
            $('.ms-parent.sections .ms-drop.bottom li').eq('1').show();
            $('.ms-parent.sections .ms-drop.bottom li').eq('2').hide();
            $('.ms-parent.sections .ms-drop.bottom li').eq('3').hide();
        }

        if( !Cookies.get('checkTabs') && !Cookies.get('buysectionId')){
            $('header .nav a').eq(0).addClass('active').parent('li').siblings('li').children('a').removeClass('active');
            $('.nav-tabs li').eq(0).addClass('active').siblings('li').removeClass('active');
            $('select.sections').multipleSelect('setSelects', [2]);
            $('.ms-parent.sections .ms-drop.bottom li').eq('0').show();
            $('.ms-parent.sections .ms-drop.bottom li').eq('1').show();
            $('.ms-parent.sections .ms-drop.bottom li').eq('2').hide();
            $('.ms-parent.sections .ms-drop.bottom li').eq('3').hide();
        }

        if($('.nav-tabs li').eq(0).hasClass('active')){
            if($('#rev-4').length){
                $('#rev-4').text('Продажа недвижимости');
                BlockRevealersInit();
            }
        }else if($('.nav-tabs li').eq(1).hasClass('active')){
            if($('#rev-4').length){
                $('#rev-4').text('Аренда недвижимости');
                BlockRevealersInit();
            }
        }




        $('#buy .search').click(function(){
            Cookies.set('checkTabs', '');
        });
        $('#buy .reset').click(function(){
            Cookies.set('checkTabs', '');
        });

    }


    if(window.location.pathname.toString()=='/'){
        Cookies.set('buysectionId', '');
        if($('.nav-tabs li').eq(0).hasClass('active')){
            Cookies.set('checkTabs', 2);
            console.log(Cookies.get('checkTabs'));
        }
        if($('.nav-tabs li').eq(1).hasClass('active')){
            Cookies.set('checkTabs', 1);
            console.log(Cookies.get('checkTabs'));
        }
        $('.nav-tabs li').click(function (e) {
            if($('.nav-tabs li').eq(0).hasClass('active')){
                Cookies.set('checkTabs', 2);
                console.log(Cookies.get('checkTabs'));
            }
            if($('.nav-tabs li').eq(1).hasClass('active')){
                Cookies.set('checkTabs', 1);
                console.log(Cookies.get('checkTabs'));
            }
        })

        $('header .nav li').eq(0).click(function (e) {
            Cookies.set('checkTabs', 2);
        })
        $('header .nav li').eq(1).click(function (e) {
            Cookies.set('checkTabs', 1);
        })
    }

    MyFunc_1();




    if(window.location.hash.toString()=='#arenda'){
        $('.nav-tabs li').eq(1).find('a').click();
    }
    if(window.location.hash.toString()=='#prodazha'){
        $('.nav-tabs li').eq(0).find('a').click();
    }




});



$(window).on('scroll load resize orienationchange', function() {

    //Вверху - скрываем кнопку scrollTop
    var wScroll = $(this).scrollTop();
    if(wScroll<750){
        $('.scrollTop').css('opacity', '0');
        $('.scrollTop').css('visibility', 'hidden');
    }else{
        $('.scrollTop').css('opacity', '1');
        $('.scrollTop').css('visibility', 'visible');
    }

    if($('.how-working-list').length){
        var posWorking = $('.how-working-list').offset().top-$('.how-working-list').outerHeight()-200;
    }
    var currentScroll = $(window).scrollTop();

    //При скролле до how-working-list, происходит анимация, и появление эллементов
    if(posWorking<=currentScroll){
        if(!$('.how-working-img').hasClass('oneChance')){
            rev1 = new RevealFx(document.querySelector('#rev-img-1'), {
                revealSettings : {
                    bgcolor: '#ffbb38',
                    delay: 0,
                    onCover: function(contentEl, revealerEl) {
                        contentEl.style.opacity = 1;
                        $('.how-working-item').eq(0).find('.how-working-desc').addClass('wayp-visible opacity-num');
                        $('.how-working-item').eq(0).addClass('wayp-visible opacity-num');
                    }
                }
            });

            rev1.reveal();
        }
        if(!$('.how-working-img').hasClass('oneChance')){
            rev2 = new RevealFx(document.querySelector('#rev-img-2'), {
                revealSettings : {
                    bgcolor: '#ffbb38',
                    delay: 250,
                    onCover: function(contentEl, revealerEl) {
                        contentEl.style.opacity = 1;
                        $('.how-working-item').eq(1).find('.how-working-desc').addClass('wayp-visible opacity-num');
                        $('.how-working-item').eq(1).addClass('wayp-visible opacity-num');
                    }
                }
            });

            rev2.reveal();
        }
        if(!$('.how-working-img').hasClass('oneChance')){
            rev3 = new RevealFx(document.querySelector('#rev-img-3'), {
                revealSettings : {
                    bgcolor: '#ffbb38',
                    delay: 500,
                    onCover: function(contentEl, revealerEl) {
                        contentEl.style.opacity = 1;
                        $('.how-working-item').eq(2).find('.how-working-desc').addClass('wayp-visible opacity-num');
                        $('.how-working-item').eq(2).addClass('wayp-visible opacity-num');
                    }
                }
            });

            rev3.reveal();
        }
        if(!$('.how-working-img').hasClass('oneChance')){
            rev4 = new RevealFx(document.querySelector('#rev-img-4'), {
                revealSettings : {
                    bgcolor: '#ffbb38',
                    delay: 750,
                    onCover: function(contentEl, revealerEl) {
                        contentEl.style.opacity = 1;
                        $('.how-working-item').eq(3).find('.how-working-desc').addClass('wayp-visible opacity-num');
                        $('.how-working-item').eq(3).addClass('wayp-visible opacity-num');
                    }
                }
            });

            rev4.reveal();
        }
        if(!$('.how-working-img').hasClass('oneChance')){
            rev5 = new RevealFx(document.querySelector('#rev-img-5'), {
                revealSettings : {
                    bgcolor: '#ffbb38',
                    delay: 1000,
                    onCover: function(contentEl, revealerEl) {
                        contentEl.style.opacity = 1;
                        $('.how-working-item').eq(4).find('.how-working-desc').addClass('wayp-visible opacity-num');
                        $('.how-working-item').eq(4).addClass('wayp-visible opacity-num');
                    }
                }
            });

            rev5.reveal();
        }
        if(!$('.how-working-img').hasClass('oneChance')){
            rev6 = new RevealFx(document.querySelector('#rev-img-6'), {
                revealSettings : {
                    bgcolor: '#ffbb38',
                    delay: 1250,
                    onCover: function(contentEl, revealerEl) {
                        contentEl.style.opacity = 1;
                        $('.how-working-item').eq(5).find('.how-working-desc').addClass('wayp-visible opacity-num');
                        $('.how-working-item').eq(5).addClass('wayp-visible opacity-num');
                    }
                }
            });

            rev6.reveal();
        }

        //Анимация должна проигрываться лишь единожды
        $('.how-working-img').addClass('oneChance');
    }
});


$(window).on('load', function() {
    $("body").removeClass("load");
});


jQuery(document).ready(function($) {
    $('.show-more').on('click', function(){
        MyFunc();
    });


});

var MyFunc_1 = function() {
    $(".listpage").on('click', function(e) {
        e.preventDefault();
        $(".filter-page").val($(this).html());
        $("form.buy").submit();
    })
}


var MyFunc = function() {
    var nextpage = $('.show-more').data('curpage') + 1;
    $('.show-more').css('opacity', 0.3);


    $.ajax({
        url: "/wp-admin/admin-ajax.php",
        type: "POST",

        data: {
            action: 'get_result_url',
            "PAGE_NUMBER": nextpage,
        },
        success: function(data) {
            // console.log(data);
            $('.my-pagination').remove();
            $('.show-more').remove();
            $('.ownership-list').append(data);
            $('.show-more').on('click', function(){
                MyFunc();
            });
            MyFunc_1();
//								$('#container').append(data[0].address);
//								$('#container').append("<br>");
//								$('#container').append(data[1].address);
//								$('#container').append('<hr>');
//
//                 $('.show-more').css('opacity', 1);
//                 $('.show-more').data('curpage', nextpage);

        }

        // dataType: "json"
    });
}