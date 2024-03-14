<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arViewModeList = array('LIST', 'LINE', 'TEXT', 'TILE');

$columnCountList = array('1', '2', '3', '4', '6', '12');

$arDefaultParams = array(
	'VIEW_MODE' => 'LIST',
	'SHOW_PARENT_NAME' => 'Y',
	'HIDE_SECTION_NAME' => 'N',
	'LIST_COLUMNS_COUNT' => '6'
);

$arParams = array_merge($arDefaultParams, $arParams);

if (!in_array($arParams['VIEW_MODE'], $arViewModeList))
	$arParams['VIEW_MODE'] = 'LIST';
if ('N' != $arParams['SHOW_PARENT_NAME'])
	$arParams['SHOW_PARENT_NAME'] = 'Y';
if ('Y' != $arParams['HIDE_SECTION_NAME'])
	$arParams['HIDE_SECTION_NAME'] = 'N';
if (!in_array($arParams['LIST_COLUMNS_COUNT'], $columnCountList))
	$arParams['LIST_COLUMNS_COUNT'] = '6';

$arResult['VIEW_MODE_LIST'] = $arViewModeList;

if (0 < $arResult['SECTIONS_COUNT']) {
	if ('LIST' != $arParams['VIEW_MODE']) {
		$boolClear = false;
		$arNewSections = array();
		foreach ($arResult['SECTIONS'] as &$arOneSection) {
			if (1 < $arOneSection['RELATIVE_DEPTH_LEVEL']) {
				$boolClear = true;
				continue;
			}
			$arNewSections[] = $arOneSection;
		}
		unset($arOneSection);
		if ($boolClear) {
			$arResult['SECTIONS'] = $arNewSections;
			$arResult['SECTIONS_COUNT'] = count($arNewSections);
		}
		unset($arNewSections);
	}
}

if (0 < $arResult['SECTIONS_COUNT']) {
	$boolPicture = false;
	$boolDescr = false;
	$arSelect = array('ID');
	$arMap = array();
	if ('LINE' == $arParams['VIEW_MODE'] || 'TILE' == $arParams['VIEW_MODE']) {
		reset($arResult['SECTIONS']);
		$arCurrent = current($arResult['SECTIONS']);
		if (!isset($arCurrent['PICTURE'])) {
			$boolPicture = true;
			$arSelect[] = 'PICTURE';
		}
		if ('LINE' == $arParams['VIEW_MODE'] && !array_key_exists('DESCRIPTION', $arCurrent)) {
			$boolDescr = true;
			$arSelect[] = 'DESCRIPTION';
			$arSelect[] = 'DESCRIPTION_TYPE';
		}
	}
	if ($boolPicture || $boolDescr) {
		foreach ($arResult['SECTIONS'] as $key => $arSection) {
			$arMap[$arSection['ID']] = $key;
		}
		$rsSections = CIBlockSection::GetList(array(), array('ID' => array_keys($arMap)), false, $arSelect);
		while ($arSection = $rsSections->GetNext()) {
			if (!isset($arMap[$arSection['ID']]))
				continue;
			$key = $arMap[$arSection['ID']];
			if ($boolPicture) {
				$arSection['PICTURE'] = intval($arSection['PICTURE']);
				$arSection['PICTURE'] = (0 < $arSection['PICTURE'] ? CFile::GetFileArray($arSection['PICTURE']) : false);
				$arResult['SECTIONS'][$key]['PICTURE'] = $arSection['PICTURE'];
				$arResult['SECTIONS'][$key]['~PICTURE'] = $arSection['~PICTURE'];
			}
			if ($boolDescr) {
				$arResult['SECTIONS'][$key]['DESCRIPTION'] = $arSection['DESCRIPTION'];
				$arResult['SECTIONS'][$key]['~DESCRIPTION'] = $arSection['~DESCRIPTION'];
				$arResult['SECTIONS'][$key]['DESCRIPTION_TYPE'] = $arSection['DESCRIPTION_TYPE'];
				$arResult['SECTIONS'][$key]['~DESCRIPTION_TYPE'] = $arSection['~DESCRIPTION_TYPE'];
			}
		}
	}
}



$arResult["SECTIONS_ON_MAIN"] = array();

foreach ($arResult['SECTIONS'] as &$depth1Section) {
	$arFilter = array("IBLOCK_ID" => $depth1Section["IBLOCK_ID"], "SECTION_ID" => $depth1Section["ID"], "ACTIVE" => "Y");
	$res = CIBlockSection::GetList(array(), $arFilter, false, array("UF_*"));

	while ($ob = $res->GetNextElement()) {
		$arFields = $ob->GetFields();

		// Запрос на элементы подразделов
		$arElementFilter = array("IBLOCK_ID" => $arFields["IBLOCK_ID"], "SECTION_ID" => $arFields["ID"], "ACTIVE" => "Y");
		$elementRes = CIBlockElement::GetList(array(), $arElementFilter);

		$depth2Section = array('SECTIONS_DEPTH_MORE_3' => array()); // Объявляем переменную $depth2Section

		while ($obElement = $elementRes->GetNextElement()) {
			$arElementFields = $obElement->GetFields();
			$depth2Section['SECTIONS_DEPTH_MORE_3'][] = array(
				'ID' => $arElementFields['ID'],
				'NAME' => $arElementFields['NAME'],
				'DETAIL_PAGE_URL' => $arElementFields['DETAIL_PAGE_URL'],
			);
		}

		// конечная переменная
		$arResult["SECTIONS_ON_MAIN"][] = array(
			"ID" => $arFields['ID'],
			"NAME" => $arFields['NAME'],
			"SECTION_PAGE_URL" => $arFields['SECTION_PAGE_URL'],
			"DESCRIPTION" => $arFields['DESCRIPTION'],
			"DETAIL_PICTURE" => $arFields['DETAIL_PICTURE'],
			"PICTURE" => $arFields['PICTURE'],
			"UF_SECTION_ON_MAIN" => $arFields['UF_SECTION_ON_MAIN'],
			"LVL_3" => $depth2Section['SECTIONS_DEPTH_MORE_3']
		);
	}
}

// d($arResult["SECTIONS_ON_MAIN"]);
