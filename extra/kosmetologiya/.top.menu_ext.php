<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
global $APPLICATION;
$aMenuLinksExt = $APPLICATION->IncludeComponent(
    "cube:menu.sections",
    "",
    array(
        "IS_SEF" => "Y",
        "SEF_BASE_URL" => "",
        "SECTION_PAGE_URL" => "#SECTION_CODE_PATH#/",
        "DETAIL_PAGE_URL" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#.html",
        "IBLOCK_ID" => "14",
        "DEPTH_LEVEL" => "3",
        "SECTION_ID" => "97",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000"
    ),
    false
);

$aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks);
