<?
//ob_start();
if(session_id() == '')
    session_start();
//if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['filter']['typeId']){
//    header('Location:'.$_SERVER['REQUEST_URI']);
//}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">
<meta name="description" content="">
<meta name="keywords" content="">

<?php wp_head(); ?>
</head>
<body <?php body_class('load'); ?>>
    <header class="wrapper-header">
        <div class="logo">
            <h1 class="nostyle"><a href="/" class="nostyle">Твой дом</a></h1>
            <!--<div class="header-desc">Агентство недвижимости</div>-->
            <div class="header-desc">Официальный представитель <br> компании <a target="_blank" href="https://nk.etagi.com/">
                    <img src="<?=get_template_directory_uri();?>/img/logo-etagi.png" alt="nk.etagi.com">
                </a>
            </div>
        </div>

        <nav class="nav-wrap">
            <ul class="nav nostyle">
                <li><a href="/prodazha/" >Продажа</a></li>
                <li><a href="/prodazha/" >Аренда</a></li>
                <li><a href="#">Новостройки</a></li>
                <li><a href="#">Ипотека</a></li>
                <li><a href="#">О компании</a></li>
            </ul>
        </nav>

        <div class="phone-wrap">
            <div class="header-phone">8(909) 518-55-55</div>
            <a class="modal-callback">Заказать звонок</a>
        </div>
    </header>
    