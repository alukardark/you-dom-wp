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
		$('.home .main-scaner-wrap, .home .main-scaner .advanced-search, .home .main-scaner .search').css({
			'visibility':'visible',
			'opacity':'1',
		});
	}, 100);
	setTimeout(function() {
		$('.main-inner .main-scaner-wrap, .main-inner .main-scaner .advanced-search, .main-inner .main-scaner .search').css({
			'visibility':'visible',
			'opacity':'1',
		});
	}, 500);


	$('.ownership-item-desc').readmore({
		speed: 375,
		collapsedHeight: 73,
		startOpen: false,
		moreLink: '<a class="ownership-item-desc-more" href="#">Читать полностью</a>',
		lessLink: '<a class="ownership-item-desc-more" href="#">Скрыть текст</a>',
	});


	countPhotos();


	$('form.wpcf7-form').append("<span class='desc-personal' style='font-family: GothaProMed, Helvetica, Arial, sans-serif;font-size:13px;color: #fff;width:420px;display:inline-block;padding-top:17px; text-align:center'>Нажимая на кнопку, вы даете <a style='color:#fff;font-size:13px;' target='_blank' href='/personal-information/'> согласие на обработку персональных данных</a></span>");

	if(!Cookies.get('confform-submit')){
		$('body').append("<div class='confform' style='position: fixed; width: 410px;height: auto;padding: 30px; color: #fff;background: #fdba39; box-shadow: 0px 10px 16.38px 1.62px rgba(109, 107, 107, 0.32);bottom: 10px;left: 100px;z-index: 1000;border-radius: 5px;'>На данном сайте используются cookie-файлы и другие аналогичные технологии. Если, прочитав это сообщение, вы остаетесь на сайте, это означает, что вы не возражаете против использования этих технологий.<div><br><a style='float:left;color:#fff;' class='confform-podr' href='/privacy-policy' target='_blank'>Подробнее</a><span style='float:right;cursor:pointer;cursor:pointer;color:#fff;' class='confform-submit'>Хорошо</span></div></div>");
	}

	$('.confform-submit').on('click', function(){
		Cookies.set('confform-submit', 'confform-submit', {expires :  365  });
		$('.confform').fadeOut(300);
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




    var my_link = location.pathname.split('/');
    $('header .nav li a').each(function() {
    	var url = $(this).attr('href');
    	var regV = '/'+my_link[1]+'/';
    	var result = url.match(regV);
    	if (result) {
    		$(this).toggleClass('active')
    	}
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
    	maxHeight: '',
    	single: true,
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
		$('.main-slide h1').css({
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


//Комнаты, сохранение множественного выбора в куки
// var buyRoomsId = [];
// if($('#buy .rooms input').each(function(){
//         if($(this).is(':checked')){
//             buyRoomsId.push(parseInt($(this)['context']['value']));
//         }
//     }))
//     $('#buy .rooms input').on('change', function(obj){
//         if (this.checked){
//             //Добавляем в массив элементы, при добавлении checked
//             buyRoomsId.push(parseInt(obj['currentTarget']['value']));
//         }else{
//             //Удаляем из массива элементы, при снятии checked
//             var thisValue = $(this)['context']['value'];
//             var thisId = buyRoomsId.indexOf(parseInt(thisValue));
//             buyRoomsId.splice(thisId,1);
//         }
//         Cookies.set('buyRoomsId', buyRoomsId);
//     });
// $('#buy .rooms li.ms-select-all').find('input').on('change', function(){
//     if (this.checked){
//         $('#buy .rooms input').each(function(){
//             buyRoomsId.push(parseInt($(this).val()));
//         });
//     }else{
//         buyRoomsId = [];
//     }
//     Cookies.set('buyRoomsId', buyRoomsId);
// });
// if($('#buy .rooms input').each(function(){
//             // if($(this).is(':checked')){
//             //     buysectionId.push(parseInt($(this)['context']['value']));
//             // }
//         }))
	// $('#buy .rooms input').on('change', function(obj){
	// 	if (this.checked){
	// 		Cookies.set('buyRoomsId', parseInt(obj['currentTarget']['value']));
	// 	}else{
	// 		Cookies.set('buyRoomsId', '');
	// 	}
	// });



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
            // if($(this).is(':checked')){
            //     buysectionId.push(parseInt($(this)['context']['value']));
            // }
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

				$('#buy .withRealtors').on('change', function(obj){
					if (this.checked){
						Cookies.set('buywithRealtors', parseInt(obj['currentTarget']['value']));
					}else{
						Cookies.set('buywithRealtors', '');
					}
				});


				$('#buy .search').click(function(){
					Cookies.set('buyPriceFrom', $('#buy .priceFrom').val());
					Cookies.set('buyPriceTo', $('#buy .priceTo').val());
					Cookies.set('buyRoomsFrom', $('#buy .roomsFrom').val());
					Cookies.set('buyRoomsTo', $('#buy .roomsTo').val());
				});
				$('.main-inner #buy .search').click(function(){
					Cookies.set('buySquareFrom', $('#buy .squareFrom').val());
					Cookies.set('buySquareTo', $('#buy .squareTo').val());
					Cookies.set('buyFloorFrom', $('#buy .floorFrom').val());
					Cookies.set('buyFloorTo', $('#buy .floorTo').val());
					Cookies.set('buyFloorsFrom', $('#buy .floorsFrom').val());
					Cookies.set('buyFloorsTo', $('#buy .floorsTo').val());
					Cookies.set('buyAddress', $('#buy .address').val());
					Cookies.set('buyDescription', $('#buy .description').val());
				});

				$('#buy .reset').click(function(){
                    // Cookies.set('buysectionId', '');
                    Cookies.set('buyTypeId', '');
                    //Cookies.set('buyRoomsId', '');
                    Cookies.set('buyDistrictId', '');
                    Cookies.set('buywithPhoto', '');
                    Cookies.set('buywithRealtors', '');
                    Cookies.set('buyPriceFrom', '');
                    Cookies.set('buyPriceTo', '');
                    Cookies.set('buySquareFrom', '');
                    Cookies.set('buySquareTo', '');
                    Cookies.set('buyFloorFrom', '');
                    Cookies.set('buyFloorTo', '');
                    Cookies.set('buyFloorsFrom', '');
                    Cookies.set('buyFloorsTo', '');
                    Cookies.set('buyFloorsTo', '');
                    Cookies.set('buyAddress', '');
                    Cookies.set('buyDescription', '');
                    Cookies.set('buyPriceFrom', '');
                    Cookies.set('buyPriceTo', '');
                    Cookies.set('buyRoomsFrom', '');
                    Cookies.set('buyRoomsTo', '');
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
    	}
    	if($('.nav-tabs li').eq(1).hasClass('active')){
    		Cookies.set('checkTabs', 1);
    	}
    	$('.nav-tabs li').click(function (e) {
    		if($('.nav-tabs li').eq(0).hasClass('active')){
    			Cookies.set('checkTabs', 2);
    		}
    		if($('.nav-tabs li').eq(1).hasClass('active')){
    			Cookies.set('checkTabs', 1);
    		}
    	})

    	$('header .nav li').eq(0).click(function (e) {
    		Cookies.set('checkTabs', 2);
    	})
    	$('header .nav li').eq(1).click(function (e) {
    		Cookies.set('checkTabs', 1);
    	})
    }

    paginationFunc();

    if(window.location.hash.toString()=='#arenda'){
    	$('.nav-tabs li').eq(1).find('a').click();
    }
    if(window.location.hash.toString()=='#prodazha'){
    	$('.nav-tabs li').eq(0).find('a').click();
    }


    $('.priceFrom.ui-spinner-input').val(addCommas($('.priceFrom.ui-spinner-input').val()));
    $('.priceTo.ui-spinner-input').val(addCommas($('.priceTo.ui-spinner-input').val()));
    $('.priceFrom.ui-spinner-input').on('input', function(){
        var $val = $(this).val().replace(/[^0-9]/gim,'');
        $val = $val.replace(/ /gi, '');
        $(this).val(addCommas($val));
    });
    $('.priceTo.ui-spinner-input').on('input', function(){
        var $val = $(this).val().replace(/[^0-9]/gim,'');
        $val = $val.replace(/ /gi, '');
        $(this).val(addCommas($val));
    });

    function priceMinMax($step){
    	$('.wrap-price span.ui-spinner').eq(0).find('.ui-spinner-up').off();
        $('.wrap-price span.ui-spinner').eq(1).find('.ui-spinner-up').off();
        $('.wrap-price span.ui-spinner').eq(0).find('.ui-spinner-down').off();
        $('.wrap-price span.ui-spinner').eq(1).find('.ui-spinner-down').off();

        $('.wrap-price span.ui-spinner').eq(0).find('.ui-spinner-up').mousedown(function(){
            return false;
        });
        $('.wrap-price span.ui-spinner').eq(0).find('.ui-spinner-down').mousedown(function(){
            return false;
        });
        $('.wrap-price span.ui-spinner').eq(0).find('.ui-spinner-up').on('click', function(){
            var $val = $('.priceFrom.ui-spinner-input').val();
            $val = $val.replace(/ /gi, '');
            if($val){
                var $valNew = parseInt($val)+$step;
            }else{
                var $valNew = $step;
            }
            $('.priceFrom.ui-spinner-input').val(addCommas($valNew));
        });
        $('.wrap-price span.ui-spinner').eq(0).find('.ui-spinner-down').on('click', function(){
            var $val = $('.priceFrom.ui-spinner-input').val();
            $val = $val.replace(/ /gi, '');
            if($val>0){
                var $valNew = parseInt($val)-$step;
            }else{
                $valNew = 0;
            }
            if($valNew<=0){
                $('.priceFrom.ui-spinner-input').val(0);
            }else{
                $('.priceFrom.ui-spinner-input').val(addCommas($valNew));
            }
        });

        $('.wrap-price span.ui-spinner').eq(1).find('.ui-spinner-up').mousedown(function(){
            return false;
        });
        $('.wrap-price span.ui-spinner').eq(1).find('.ui-spinner-down').mousedown(function(){
            return false;
        });

        $('.wrap-price span.ui-spinner').eq(1).find('.ui-spinner-up').on('click', function(){
            var $val = $('.priceTo.ui-spinner-input').val();
            $val = $val.replace(/ /gi, '');
            if($val){
                var $valNew = parseInt($val)+$step;
            }else{
                var $valNew = $step;
            }
            $('.priceTo.ui-spinner-input').val(addCommas($valNew));
        });
        $('.wrap-price span.ui-spinner').eq(1).find('.ui-spinner-down').on('click', function(){
            var $val = $('.priceTo.ui-spinner-input').val();
            $val = $val.replace(/ /gi, '');
            if($val>0){
                var $valNew = parseInt($val)-$step;
            }else{
                $valNew = 0;
            }
            if($valNew<=0){
                $('.priceTo.ui-spinner-input').val(0);
            }else{
                $('.priceTo.ui-spinner-input').val(addCommas($valNew));
            }
        });
    }

    if($('.nav-tabs li').eq(0).hasClass('active')){
    	priceMinMax(100000);
    	$("label[for='withRealtors']").show();
    }else if($('.nav-tabs li').eq(1).hasClass('active')){
    	priceMinMax(1000);
    	$("label[for='withRealtors']").hide();
    }
    $('.nav-tabs a').click(function () {
    	if($('.nav-tabs li').eq(0).hasClass('active')){
    		priceMinMax(100000);
    		$("label[for='withRealtors']").show();
    	}else if($('.nav-tabs li').eq(1).hasClass('active')){
    		priceMinMax(1000);
    		$("label[for='withRealtors']").hide();
    	}
    })




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
		ajaxFunc();
	});


});

var paginationFunc = function() {
	$(".listpage").on('click', function(e) {
		e.preventDefault();
		$(".filter-page").val($(this).html());
		$("form.buy").submit();
	})
}

var countPhotos = function(){
	$('.ownership-item').each(function(){
		var countLi = $(this).find('.ownership-item-images li').length;
		$(this).find('.phone-icon').text(countLi).show();
		$(this).find('.empty-photo').siblings('.phone-icon').hide();
	});
}
var check_favorites = function(){
	$('.ownership-item-favorites').off();
	$('.ownership-item-favorites').on('click', function(){
		$(this).toggleClass('ownership-item-favorites-check');
		$(this).parents('.ownership-item').toggleClass('ownership-item-favorites-check-bg');
	});
}
check_favorites();



var modalAddressAdmin = function(){
    // ymaps.ready(function () {

    	$('.footer-address a').off();
    	$('.footer-address a').on('click', function(){
    		var myMap = new ymaps.Map('YMapsIDAdmin', {
    			center: [53.767913, 87.133771],
    			zoom: 16,
    			controls: []
    		});
    		var myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
    			balloonContentBody: [
//                                    '<address>',
//                                    '<strong>Офис Яндекса в Москве</strong>',
//                                    '<br/>',
//                                    'Адрес: 119021, Москва, ул. Льва Толстого, 16',
//                                    '<br/>',
//                                    'Подробнее: <a href="https://company.yandex.ru/">https://company.yandex.ru</a>',
//                                    '</address>'
].join('')
}, {
	preset: 'islands#redDotIcon'
});
    		myMap.geoObjects.add(myPlacemark);
    		$('#modal-map-admin').on('hidden.bs.modal', function () {
    			myMap.destroy();
    		})

    	});

    // });
}
ymaps.ready(function () {
	modalAddressAdmin();
});




var modalMap = function(){
    // ymaps.ready(function () {

    	$('.ownership-item-maps a').off();
    	$('.ownership-item-maps a').on('click', function(){
    		var latitude = $(this).data('latitude');
    		var longitude = $(this).data('longitude');
    		var myMap = new ymaps.Map('YMapsID', {
    			center: [latitude, longitude],
    			zoom: 16,
    			controls: []
    		});
    		var myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
    			balloonContentBody: [
//                                    '<address>',
//                                    '<strong>Офис Яндекса в Москве</strong>',
//                                    '<br/>',
//                                    'Адрес: 119021, Москва, ул. Льва Толстого, 16',
//                                    '<br/>',
//                                    'Подробнее: <a href="https://company.yandex.ru/">https://company.yandex.ru</a>',
//                                    '</address>'
].join('')
}, {
	preset: 'islands#redDotIcon'
});
    		myMap.geoObjects.add(myPlacemark);
    		$('#modal-map-address').on('hidden.bs.modal', function () {
    			myMap.destroy();
    		})

    	});

    // });
}
ymaps.ready(function () {
	modalMap();
});
$('#modal-map-clusterer').on('shown.bs.modal', function () {
	ymaps.ready(modalMapList);
})
function modalMapList() {

	var dataItems = $(".hiddenDataItems").text();
	var groups = [{
		name: "Name",
		style: "islands#redIcon",
		items: []
	}];

	dataItems = JSON.parse(dataItems);
	for(var key in dataItems) {
        if(ajaxData.$admin_phone == null){
            $adminPhone = dataItems[key]['phones'][0];
            $name = "<br><b>Имя: </b>"+dataItems[key]['name'][0];
        }else{
            $adminPhone = ajaxData.$admin_phone;
            $name = '';
        }
		
        var $count = Object.keys(dataItems[key]['photosItem']).length;
        groups[0].items.push(
            {   'center': [dataItems[key]['latitude'][0], dataItems[key]['longitude'][0]],
                'name': "<div class='hint-header'>"+dataItems[key]['rooms'][0]+" "+dataItems[key]['type'][0]+" "+dataItems[key]['square'][0]+' '+dataItems[key]['floor'][0]+'/'+dataItems[key]['floors'][0]+" эт."+"</div>"+"<div class='hint-body row'>"+"<div class='col-md-12'>"+"<b>Адрес:</b> "+dataItems[key]['address'][0]+" <br> <b>Район:</b> "+dataItems[key]['district'][0]+" <br> <b>Цена:</b>  "+dataItems[key]['price'][0]+" руб."+$name+"<br><b>Телефон: </b>"+$adminPhone+"<br><button onclick=$('[data-fancybox="+dataItems[key]['id'][0]+"]').first().click();  class='openFancyBox'>Фото: "+$count+"</button>"+"</div>"+"</div>"+"<div class='hint-bottom'>"+dataItems[key]['description'][0]+"</div>"
            }
        );
    }

    // Создание экземпляра карты.
    var myMap = new ymaps.Map('mapId', {
    	center: [53.757547, 87.136044],
    	zoom: 14
    }, {
    	searchControlProvider: 'yandex#search'
    }),
    // Контейнер для меню.
    menu = $('<ul class="menu"/>');

    for (var i = 0, l = groups.length; i < l; i++) {
    	createMenuGroup(groups[i]);
    }

    function createMenuGroup (group) {
        // Пункт меню.
        var menuItem = $('<li><a href="#">' + group.name + '</a></li>'),
        // Коллекция для геообъектов группы.
        collection = new ymaps.GeoObjectCollection(null, { preset: group.style }),
        // Контейнер для подменю.
        submenu = $('<ul class="submenu"/>');

        // Добавляем коллекцию на карту.
        myMap.geoObjects.add(collection);
        // Добавляем подменю.
        menuItem
        .append(submenu)
            // Добавляем пункт в меню.
            .appendTo(menu)
            // По клику удаляем/добавляем коллекцию на карту и скрываем/отображаем подменю.
            .find('a')
            .bind('click', function () {
            	if (collection.getParent()) {
            		myMap.geoObjects.remove(collection);
            		submenu.hide();
            	} else {
            		myMap.geoObjects.add(collection);
            		submenu.show();
            	}
            });
            for (var j = 0, m = group.items.length; j < m; j++) {
            	createSubMenu(group.items[j], collection, submenu);
            }
        }

        function createSubMenu (item, collection, submenu) {
        // Пункт подменю.
        var submenuItem = $('<li><a href="#">' + item.name + '</a></li>'),
        // Создаем метку.
        placemark = new ymaps.Placemark(item.center, { balloonContent: item.name });

        // Добавляем метку в коллекцию.
        collection.add(placemark);
        // Добавляем пункт в подменю.
        submenuItem
        .appendTo(submenu)
            // При клике по пункту подменю открываем/закрываем баллун у метки.
            .find('a')
            .bind('click', function () {
            	if (!placemark.balloon.isOpen()) {
            		placemark.balloon.open();
            	} else {
            		placemark.balloon.close();
            	}
            	return false;
            });
        }

    // Добавляем меню в тэг BODY.
    // menu.appendTo($('body'));
    // Выставляем масштаб карты чтобы были видны все группы.



    myMap.setBounds(myMap.geoObjects.getBounds());

    $('#modal-map-clusterer').on('hidden.bs.modal', function () {
    	myMap.destroy();
    })
}

var ajaxFunc = function() {
	var nextpage = $('.show-more').data('curpage') + 1;
    // $('.show-more').css('opacity', 0.3);
    $('.show-more').hide();
    $('.show-more.show-more-loader').show();


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
            	ajaxFunc();
            });
            paginationFunc();
            countPhotos();
            check_favorites();
            ymaps.ready(function () {
            	modalMap();
            });

            var hiddenDataItems = $('.hiddenDataItems').text();
            hiddenDataItems = hiddenDataItems.replace(/\[/gi, '').replace(/\]/gi, '')+',';
            var hiddenDataItemsAjax = $('.hiddenDataItemsAjax').text();
            hiddenDataItemsAjax = hiddenDataItemsAjax.replace(/\[/gi, '').replace(/\]/gi, '');
            $('.hiddenDataItems').text('['+hiddenDataItems+hiddenDataItemsAjax+']');
            $('.hiddenDataItemsAjax').remove();
            $('.ownership-item-desc').readmore({
                speed: 375,
                collapsedHeight: 73,
                startOpen: false,
                moreLink: '<a class="ownership-item-desc-more" href="#">Читать полностью</a>',
                lessLink: '<a class="ownership-item-desc-more" href="#">Скрыть текст</a>',
            });
            
        }

        // dataType: "json"
    });
}
// $(window).on('load', function() {
//     $("a.scrollRes").mPageScroll2id({
//         scrollSpeed: 500,
//         scrollEasing: "easeInOutExpo",
//         onComplete:function(){
//             Cookies.set('scrollPage', '');
//         }
//     });
//     $('#buy .search').click(function(){
//         Cookies.set('scrollPage', 'true');
//     });
//     if(Cookies.get('scrollPage') == 'true'){
//         $("a.scrollRes").click();
//     }

// })
jQuery(document).ready(function($) {
        $("a.scrollRes").mPageScroll2id({
        scrollSpeed: 500,
        scrollEasing: "easeInOutExpo",
        onComplete:function(){
            Cookies.set('scrollPage', '');
        }
    });
    $('#buy .search').click(function(){
        Cookies.set('scrollPage', 'true');
    });
    if(Cookies.get('scrollPage') == 'true'){
        $("a.scrollRes").click();
    }
});