<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<html lang="ru" class="no-js">

<head>
    <?

    use Bitrix\Main\Page\Asset;
    // Bitrix files connection
    $APPLICATION->ShowHead();
    // CSS
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/base.min.css?_v=20240223161603");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/custom.css?_v=20240223161603");
    // JS
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/plugins.min.js?_v=20240223161603");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/app.js?_v=20240223161603");
    // TAGS AND FILES
    $asset = Asset::getInstance();
    $asset->addString("<link rel='apple-touch-icon' sizes='180x180' href='{$asset->getAssetPath("/assets/apple-touch-icon.png")}' />");
    $asset->addString("<link type='image/png' sizes='32x32' href='{$asset->getAssetPath("/assets/favicon-32x32.png")}' />");
    $asset->addString("<link type='image/png' sizes='16x16' href='{$asset->getAssetPath("/assets/favicon-16x16.png")}' />");
    $asset->addString("<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=5'>");
    $asset->addString("<meta http-equiv='X-UA-Compatible' content='IE=edge'>");
    ?>
    <title><? $APPLICATION->ShowTitle() ?></title>
</head>

<body class="index__page">
    <div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
    <!-- layout -->
    <div class="layout-wrapper is-bg">
        <!--header-->
        <header class="header">
            <div class="container">
                <div class="header__inner">
                    <div class="header__row header__row--top">
                        <div class="header__col header__col--logo">
                            <div class="logo">
                                <? $APPLICATION->IncludeFile(
                                    SITE_TEMPLATE_PATH . "/include/header/logo.php",
                                    array(),
                                    array("MODE" => "text", "NAME" => 'Логотип')
                                ) ?>
                            </div>
                        </div>

                        <div class="header__col header__col--location">
                            <div class="location">
                                <div class="location__item">
                                    г. Ессентуки, ул. Разумовского,7
                                </div>
                                <div class="location__item">
                                    <a href="/" class="link link--ico link--arrow-angle">Как проехать?</a>
                                </div>
                            </div>
                        </div>
                        <div class="header__col header__col--phone">
                            <a href="tel:+79888604300" class="h3">+7(988) 860-43-00</a>
                        </div>
                        <div class="header__col header__col--worktime">
                            Пн-Пт с 9:00 до 20:00
                        </div>


                        <div class="header__col header__col--userbar">
                            <div class="userbar">
                                <div class="userbar__item userbar__item--appointment" onclick="popupApp.open('appointment');">
                                    <span class="userbar__item_icon i-appointment"></span>
                                </div>
                                <div class="userbar__item userbar__item--search">
                                    <span class="userbar__item_icon i-search" onclick="popupApp.open('search');"></span>
                                </div>
                                <div class="userbar__item userbar__item--youtube">
                                    <a href="index.html" class="userbar__item_icon i-youtube js-search-toggle"></a>
                                </div>
                                <div class="userbar__item userbar__item--whatsapp">
                                    <a href="index.html" class="userbar__item_icon i-whatsapp"></a>
                                </div>
                                <div class="userbar__item userbar__item--blind">
                                    <a href="index.html" class="userbar__item_icon i-blind"></a>
                                </div>
                                <div class="userbar__item userbar__item--menu js-toggle-mobile-nav">
                                    <span class="userbar__item_icon i-nav"></span>
                                </div>

                            </div>
                        </div>


                    </div>

                    <div class="header__row header__row--bottom">
                        <div class="header__col header__col--slide c_slide c_slide--base c_slide--header-menu">
                            <div class="c_slide__inner">
                                <div class="c_slide__header">
                                    <div class="c_slide__header_close" onclick="menuApp.reset();"></div>
                                    <div class="c_slide__header_title">
                                        Меню
                                    </div>
                                </div>
                                <div class="c_slide__content is-custom-scrollbar">

                                    <!--header menu-->
                                    <? $APPLICATION->IncludeComponent(
                                        "bitrix:menu",
                                        "horizontal_multilevel_custom",
                                        array(
                                            "ROOT_MENU_TYPE" => "top",
                                            "MENU_CACHE_TYPE" => "A",
                                            "MENU_CACHE_TIME" => "36000000",
                                            "MENU_CACHE_USE_GROUPS" => "N",
                                            "MENU_CACHE_GET_VARS" => array(),
                                            "MAX_LEVEL" => "3",
                                            "CHILD_MENU_TYPE" => "top",
                                            "USE_EXT" => "Y",
                                            "DELAY" => "N",
                                            "ALLOW_MULTI_SELECT" => "Y"
                                        ),
                                        false
                                    ); ?>
                                    <!-- <div class="header__col header__col--nav">
                                        <nav class="nav__wrapper">
                                            <ul class="mainMenu js-mainmenu">
                                                <li class="mainMenu__item is-dd is-dd--full">
                                                    <a href="plastic.html" class="mainMenu__item_link">Медицина</a>
                                                    <div class="nav nav--level-1 nav--catalog">
                                                        <ul class="nav__inner is-custom-scrollbar">
                                                            <li class="nav__item is-dd is-open"> <a href="cosmetology.html" class="nav__item_link">Инъекционная
                                                                    косметология</a>
                                                                <ul class="nav nav--level-2">
                                                                    <li class="nav__item"> <a href="cosmetology.html" class="nav__item_link">Коррекция мимических морщин
                                                                            ботулотоксином</a></li>
                                                                    <li class="nav__item"> <a href="cosmetology.html" class="nav__item_link is-badge">Контурная пластика <span class="badge">топ</span></a></li>
                                                                    <li class="nav__item"> <a href="cosmetology.html" class="nav__item_link">Увеличение губ</a></li>
                                                                    <li class="nav__item"> <a href="cosmetology.html" class="nav__item_link is-selected">Биоревитализация</a></li>
                                                                    <li class="nav__item"> <a href="cosmetology.html" class="nav__item_link">Плазмотерапия</a></li>
                                                                    <li class="nav__item"> <a href="cosmetology.html" class="nav__item_link">Мезотерапия</a></li>
                                                                    <li class="nav__item"> <a href="cosmetology.html" class="nav__item_link">Плацентарная терапия</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="nav__item is-dd is-open"> <a href="cosmetology.html" class="nav__item_link">Аппаратная
                                                                    косметология</a>
                                                                <ul class="nav nav--level-2">
                                                                    <li class="nav__item"> <a href="cosmetology.html" class="nav__item_link">Фотоомоложение</a></li>
                                                                    <li class="nav__item"> <a href="cosmetology.html" class="nav__item_link is-badge">Удаление пигментных пятен<span class="badge">-25%</span></a></li>
                                                                    <li class="nav__item"> <a href="cosmetology.html" class="nav__item_link">Удаление сосудистых звездочек, сосудов,
                                                                            капиляров</a></li>
                                                                    <li class="nav__item"> <a href="cosmetology.html" class="nav__item_link">Карбокситерапия</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="nav__item is-dd is-open"> <a href="cosmetology.html" class="nav__item_link">Лечение проблемной
                                                                    кожи</a>
                                                                <ul class="nav nav--level-2">
                                                                    <li class="nav__item"> <a href="cosmetology.html" class="nav__item_link">Розацея</a></li>
                                                                    <li class="nav__item"> <a href="cosmetology.html" class="nav__item_link">Эритроз</a></li>
                                                                    <li class="nav__item"> <a href="cosmetology.html" class="nav__item_link">Акне</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="nav__item is-dd is-open"> <a href="cosmetology.html" class="nav__item_link">Чистка лица</a>
                                                                <ul class="nav nav--level-2">
                                                                    <li class="nav__item"> <a href="cosmetology.html" class="nav__item_link">Ультразвуковая</a></li>
                                                                    <li class="nav__item"> <a href="cosmetology.html" class="nav__item_link">Комбинированная (ультразвук+механич.)</a>
                                                                    </li>
                                                                    <li class="nav__item"> <a href="cosmetology.html" class="nav__item_link">Атравматическая Holy land Anubis
                                                                            (Барселона)</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>

                                                <li class="mainMenu__item is-dd">
                                                    <a href="cosmetology.html" class="mainMenu__item_link">Косметология</a>


                                                    <ul class="nav nav--level-1 nav--catalog">
                                                        <li class="nav__item"> <a href="index.html" class="nav__item_link">Коррекция мимических морщин
                                                                ботулотоксином</a></li>
                                                        <li class="nav__item"> <a href="index.html" class="nav__item_link">Контурная пластика</a></li>
                                                        <li class="nav__item"> <a href="index.html" class="nav__item_link">Увеличение губ</a></li>
                                                        <li class="nav__item"> <a href="index.html" class="nav__item_link is-selected">Биоревитализация</a></li>
                                                        <li class="nav__item"> <a href="index.html" class="nav__item_link">Плазмотерапия</a></li>
                                                        <li class="nav__item"> <a href="index.html" class="nav__item_link">Мезотерапия</a></li>
                                                        <li class="nav__item"> <a href="index.html" class="nav__item_link">Плацентарная терапия</a></li>
                                                    </ul>


                                                </li>
                                                <li class="mainMenu__item">
                                                    <a href="directions.html" class="mainMenu__item_link">Оборудование</a>
                                                </li>
                                                <li class="mainMenu__item">
                                                    <a href="404.html" class="mainMenu__item_link">Лаборатория</a>
                                                </li>

                                                <li class="mainMenu__item">
                                                    <a href="action.html" class="mainMenu__item_link">Акции</a>
                                                </li>
                                                <li class="mainMenu__item">
                                                    <a href="specialists.html" class="mainMenu__item_link">Специалисты</a>
                                                </li>
                                                <li class="mainMenu__item">
                                                    <a href="demo.html" class="mainMenu__item_link">О клинике</a>
                                                </li>
                                                <li class="mainMenu__item">
                                                    <a href="contacts.html" class="mainMenu__item_link">Контакты</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div> -->
                                    <!--header menu END-->

                                </div>
                                <div class="c_slide__footer">



                                    <div class="menu_contacts">
                                        <div class="menu_contacts__item menu_contacts__item--phone">
                                            <a href="tel:+79888604300" class="h3">+7(988) 860-43-00</a>
                                        </div>
                                        <div class="menu_contacts__item menu_contacts__item--location">

                                            <div class="location">
                                                <div class="location__item">
                                                    г. Ессентуки, ул. Разумовского,7
                                                </div>
                                                <div class="location__item">
                                                    <a href="/" class="link link--ico link--arrow-angle">Как проехать?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="header__col header__col--appointment">
                            <button class="btn" onclick="popupApp.open('appointment');">Записаться</button>
                        </div>
                    </div>


                </div>
            </div>


        </header>
        <!--header end-->