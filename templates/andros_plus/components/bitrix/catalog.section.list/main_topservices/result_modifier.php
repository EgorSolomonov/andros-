<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

// $arResult["SECTIONS_ON_MAIN"] = array();

// foreach ($arResult['SECTIONS'] as &$depth1Section) {
// 	$arFilter = array("IBLOCK_ID" => $depth1Section["IBLOCK_ID"], "SECTION_ID" => $depth1Section["ID"], "ACTIVE" => "Y");
// 	$res = CIBlockSection::GetList(array(), $arFilter, false, array("UF_*"));

// 	while ($ob = $res->GetNextElement()) {
// 		$arFields = $ob->GetFields();

// 		// Запрос на элементы подразделов
// 		$arElementFilter = array("IBLOCK_ID" => $arFields["IBLOCK_ID"], "SECTION_ID" => $arFields["ID"], "ACTIVE" => "Y");
// 		$elementRes = CIBlockElement::GetList(array(), $arElementFilter);

// 		$depth2Section = array('SECTIONS_DEPTH_MORE_3' => array()); // Объявляем переменную $depth2Section

// 		while ($obElement = $elementRes->GetNextElement()) {
// 			$arElementFields = $obElement->GetFields();
// 			$depth2Section['SECTIONS_DEPTH_MORE_3'][] = array(
// 				'ID' => $arElementFields['ID'],
// 				'NAME' => $arElementFields['NAME'],
// 				'DETAIL_PAGE_URL' => $arElementFields['DETAIL_PAGE_URL'],
// 			);
// 		}

// 		// конечная переменная
// 		$arResult["SECTIONS_ON_MAIN"][] = array(
// 			"ID" => $arFields['ID'],
// 			"NAME" => $arFields['NAME'],
// 			"SECTION_PAGE_URL" => $arFields['SECTION_PAGE_URL'],
// 			"DESCRIPTION" => $arFields['DESCRIPTION'],
// 			"DETAIL_PICTURE" => $arFields['DETAIL_PICTURE'],
// 			"PICTURE" => $arFields['PICTURE'],
// 			"UF_SECTION_ON_MAIN" => $arFields['UF_SECTION_ON_MAIN'],
// 			"LVL_3" => $depth2Section['SECTIONS_DEPTH_MORE_3']
// 		);
// 	}
// }

// d($arResult);
