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
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/base.min.css");
    // Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/custom.css");
    // // JS
    // Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/plugins.min.js");
    // Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/app.js");
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
                                    <div class="header__col header__col--nav">
                                        <nav class="nav__wrapper">
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
                                            <!--header menu END-->
                                        </nav>
                                    </div>
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