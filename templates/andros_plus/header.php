<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
IncludeTemplateLangFile(__FILE__);
$curPage = $APPLICATION->GetCurPage();
?>
<!DOCTYPE html>
<html lang="ru" class="no-js">

<head>
    <?

    use Bitrix\Main\Page\Asset;
    // Bitrix files connection
    $APPLICATION->ShowHead();
    // CSS
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/page-demo.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/base.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/custom.css");
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
                <div class="header__inner" style="<? if ($curPage !== "/") : ?>background: #f8efe9;<? endif; ?>">
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
                            <? $APPLICATION->IncludeFile(
                                SITE_TEMPLATE_PATH . "/include/header/phone.php",
                                array(),
                                array("MODE" => "text", "NAME" => 'Телефон')
                            ) ?>
                        </div>
                        <div class="header__col header__col--worktime">
                            <? $APPLICATION->IncludeFile(
                                SITE_TEMPLATE_PATH . "/include/header/work_time.php",
                                array(),
                                array("MODE" => "text", "NAME" => 'Время работы')
                            ) ?>
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
                                    <? $APPLICATION->IncludeFile(
                                        SITE_TEMPLATE_PATH . "/include/header/youtube.php",
                                        array(),
                                        array("MODE" => "text", "NAME" => 'youtube')
                                    ) ?>
                                </div>
                                <div class="userbar__item userbar__item--whatsapp">
                                    <? $APPLICATION->IncludeFile(
                                        SITE_TEMPLATE_PATH . "/include/header/whatsapp.php",
                                        array(),
                                        array("MODE" => "text", "NAME" => 'whatsapp')
                                    ) ?>
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
                                            <?
                                            // $APPLICATION->IncludeComponent(
                                            //     "bitrix:menu",
                                            //     "horizontal_multilevel_custom",
                                            //     array(
                                            //         "ROOT_MENU_TYPE" => "top",
                                            //         "MENU_CACHE_TYPE" => "A",
                                            //         "MENU_CACHE_TIME" => "36000000",
                                            //         "MENU_CACHE_USE_GROUPS" => "N",
                                            //         "MENU_CACHE_GET_VARS" => array(),
                                            //         "MAX_LEVEL" => "3",
                                            //         "CHILD_MENU_TYPE" => "top",
                                            //         "USE_EXT" => "Y",
                                            //         "DELAY" => "N",
                                            //         "ALLOW_MULTI_SELECT" => "N"
                                            //     ),
                                            //     false
                                            // ); 

                                            ?>
                                            <ul class="mainMenu js-mainmenu" itemscope="" itemtype="http://schema.org/SiteNavigationElement">
                                                <? $APPLICATION->IncludeComponent(
                                                    "bitrix:catalog.section.list",
                                                    "header_menu_lvl2",
                                                    array(
                                                        "ADD_SECTIONS_CHAIN" => "N",
                                                        "CACHE_FILTER" => "N",
                                                        "CACHE_GROUPS" => "Y",
                                                        "CACHE_TIME" => "36000000",
                                                        "CACHE_TYPE" => "A",
                                                        "COUNT_ELEMENTS" => "Y",
                                                        "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
                                                        "FILTER_NAME" => "sectionsFilter",
                                                        "IBLOCK_ID" => "14",
                                                        "IBLOCK_TYPE" => "catalog",
                                                        "SECTION_CODE" => "",
                                                        "SECTION_FIELDS" => array(
                                                            0 => "",
                                                            1 => "",
                                                        ),
                                                        "SECTION_ID" => $_REQUEST["SECTION_ID"],
                                                        "SECTION_URL" => "",
                                                        "SECTION_USER_FIELDS" => array(
                                                            0 => "",
                                                            1 => "",
                                                        ),
                                                        "SHOW_PARENT_NAME" => "Y",
                                                        "TOP_DEPTH" => "3",
                                                        "VIEW_MODE" => "LINE",
                                                        "COMPONENT_TEMPLATE" => "header_menu_lvl2"
                                                    ),
                                                    false
                                                ); ?>
                                                <li class="mainMenu__item">
                                                    <a href="/oborudovanie/" class="mainMenu__item_link">Оборудование</a>
                                                </li>
                                                <li class="mainMenu__item">
                                                    <a href="/laboratoriya/" class="mainMenu__item_link">Лаборатория</a>
                                                </li>
                                                <li class="mainMenu__item">
                                                    <a href="/aktsii/" class="mainMenu__item_link">Акции</a>
                                                </li>
                                                <li class="mainMenu__item">
                                                    <a href="/spetsialisty/" class="mainMenu__item_link">Специалисты</a>
                                                </li>
                                                <li class="mainMenu__item">
                                                    <a href="/o-klinike/" class="mainMenu__item_link">О клинике</a>
                                                </li>
                                                <li class="mainMenu__item">
                                                    <a href="/kontakty/" class="mainMenu__item_link">Контакты</a>
                                                </li>
                                                <!-- <li class="nav__item nav__item--lvl1">
                                                    <a href="/problemy/" class="nav__link nav__link--lvl1">Ваша проблема</a>
                                                    <span class="nav__toggle js-toggle"></span>
                                                    <ul class="nav__submenu nav__submenu--lvl2">
                                                        <? $APPLICATION->IncludeComponent(
                                                            "bitrix:news.list",
                                                            "header_menu",
                                                            array(
                                                                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                                                "ADD_SECTIONS_CHAIN" => "N",
                                                                "AJAX_MODE" => "N",
                                                                "AJAX_OPTION_ADDITIONAL" => "",
                                                                "AJAX_OPTION_HISTORY" => "N",
                                                                "AJAX_OPTION_JUMP" => "N",
                                                                "AJAX_OPTION_STYLE" => "N",
                                                                "CACHE_FILTER" => "N",
                                                                "CACHE_GROUPS" => "Y",
                                                                "CACHE_TIME" => "36000000",
                                                                "CACHE_TYPE" => "A",
                                                                "CHECK_DATES" => "Y",
                                                                "DETAIL_URL" => "",
                                                                "DISPLAY_BOTTOM_PAGER" => "N",
                                                                "DISPLAY_DATE" => "Y",
                                                                "DISPLAY_NAME" => "Y",
                                                                "DISPLAY_PICTURE" => "Y",
                                                                "DISPLAY_PREVIEW_TEXT" => "Y",
                                                                "DISPLAY_TOP_PAGER" => "N",
                                                                "FIELD_CODE" => array(
                                                                    0 => "",
                                                                    1 => "",
                                                                ),
                                                                "FILTER_NAME" => "",
                                                                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                                                "IBLOCK_ID" => "9",
                                                                "IBLOCK_TYPE" => "services",
                                                                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                                                "INCLUDE_SUBSECTIONS" => "Y",
                                                                "MESSAGE_404" => "",
                                                                "NEWS_COUNT" => "10",
                                                                "PAGER_BASE_LINK_ENABLE" => "N",
                                                                "PAGER_DESC_NUMBERING" => "N",
                                                                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                                                "PAGER_SHOW_ALL" => "N",
                                                                "PAGER_SHOW_ALWAYS" => "N",
                                                                "PAGER_TEMPLATE" => ".default",
                                                                "PAGER_TITLE" => "Новости",
                                                                "PARENT_SECTION" => "",
                                                                "PARENT_SECTION_CODE" => "",
                                                                "PREVIEW_TRUNCATE_LEN" => "",
                                                                "PROPERTY_CODE" => array(
                                                                    0 => "",
                                                                    1 => "",
                                                                ),
                                                                "SET_BROWSER_TITLE" => "N",
                                                                "SET_LAST_MODIFIED" => "N",
                                                                "SET_META_DESCRIPTION" => "N",
                                                                "SET_META_KEYWORDS" => "N",
                                                                "SET_STATUS_404" => "N",
                                                                "SET_TITLE" => "N",
                                                                "SHOW_404" => "N",
                                                                "SORT_BY1" => "SORT",
                                                                "SORT_BY2" => "SORT",
                                                                "SORT_ORDER1" => "ASC",
                                                                "SORT_ORDER2" => "ASC",
                                                                "STRICT_SECTION_CHECK" => "N",
                                                                "COMPONENT_TEMPLATE" => "header_menu"
                                                            ),
                                                            false
                                                        ); ?>
                                                    </ul>
                                                </li> -->
                                            </ul>
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

        <main class="content-wrap">