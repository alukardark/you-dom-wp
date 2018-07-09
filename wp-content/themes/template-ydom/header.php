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
    <meta name="format-detection" content="telephone=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">
    <meta name="description" content="Агентство недвижимости 'Твой дом' - продажа и аренда объектов недвижимости, новостройки Новокузнецка, Новосибирска.">
    <meta name="keywords" content="недвижимость, продажа недвижимости, аренда недвижимости, агентство недвижимости, ипотека, купить квартиру, аренда квартир, купить квартиру Новокузнецк, аренда Новокузнецк, новостройки Новосибирск">
    <meta property="og:image" content="<?=get_template_directory_uri();?>/img/og.jpg?>">
    <meta name="google-site-verification" content="k3xcBngp5E63SdVOzeeiGhOwavRxumPkKdp8lUV2VZA" />
    <meta name="yandex-verification" content="c30c2288eb5fa285" />


    <?php wp_head(); ?>
</head>
<body <?php body_class('load'); ?>>

    <div class="wrapper-page">

    <header class="wrapper-header">
        <div class="logo">
            <h2 class="nostyle"><a href="/" class="nostyle">Royal House</a></h2>
            <div class="header-desc">Агентство недвижимости</div>
        </div>

        <nav class="nav-wrap">
            <ul class="nav nostyle">
                <li><a href="/prodazha-arenda/" >Продажа</a></li>
                <li><a href="/prodazha-arenda/" >Аренда</a></li>
                <li><a href="/novostrojki/">Новостройки</a></li>
                <li><a href="/ipoteka/">Ипотека</a></li>
                <li><a href="/o-kompanii/">О компании</a></li>
            </ul>
        </nav>

        <div class="phone-wrap">
            <div class="header-phone"><?=get_field('settings_phone', 33)?></div>

            <a href="#" data-toggle="modal" data-target="#modal-callback" class="modal-callback">Заказать звонок</a>
        </div>
    </header>
    