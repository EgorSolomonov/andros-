
<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();



foreach ($arResult['SECTIONS'] as &$arOneSection) {
	//dump($arOneSection);
	/* if (1 < $arOneSection['RELATIVE_DEPTH_LEVEL'])
			{
				$boolClear = true;
				continue;
			} */
	if ($arOneSection["DEPTH_LEVEL"] > "1") {
		$arNewSections[] = $arOneSection;
	}
}
unset($arOneSection);

$arResult['SECTIONS_DEPTH_MORE_1'] = $arNewSections;

unset($arNewSections);

foreach ($arResult['SECTIONS_DEPTH_MORE_1'] as $key => $section) {

	$depth[$section["IBLOCK_SECTION_ID"]][$key] = $section;
}
$arResult['SECTIONS_DEPTH_MORE_1'] = $depth;

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



foreach ($arResult['SECTIONS_DEPTH_MORE_1'] as &$depth1Section) {
	if ($depth1Section) {
		foreach ($depth1Section as &$depth2Section) {
			$arFilter = array("IBLOCK_ID" => $depth2Section["IBLOCK_ID"], "SECTION_ID" => $depth2Section["ID"], "ACTIVE" => "Y");
			$res = CIBlockElement::GetList(array(), $arFilter);

			while ($ob = $res->GetNextElement()) {
				$arFields = $ob->GetFields();
				$arProps = $ob->GetProperties();
				$depth2Section['SECTIONS_DEPTH_MORE_3'][] = array(
					'ID' => $arFields['ID'],
					'NAME' => $arFields['NAME'],
					'DETAIL_PAGE_URL' => $arFields['DETAIL_PAGE_URL'],
					"TOP_LABEL" => $arProps['TOP_LABEL'],
					"OFFERS" => $arProps['OFFERS']
				);
			}
		}
	}
}
