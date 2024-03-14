<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Косметология");
?><? $APPLICATION->IncludeComponent(
		"bitrix:catalog.section.list",
		"main_custom",
		array(
			"ADDITIONAL_COUNT_ELEMENTS_FILTER" => "additionalCountFilter",	// Дополнительный фильтр для подсчета количества элементов в разделе
			"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
			"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
			"CACHE_GROUPS" => "Y",	// Учитывать права доступа
			"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
			"CACHE_TYPE" => "A",	// Тип кеширования
			"COUNT_ELEMENTS" => "Y",	// Показывать количество элементов в разделе
			"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",	// Показывать количество
			"FILTER_NAME" => "sectionsFilter",	// Имя массива со значениями фильтра разделов
			"HIDE_SECTIONS_WITH_ZERO_COUNT_ELEMENTS" => "Y",	// Скрывать разделы с нулевым количеством элементов
			"HIDE_SECTION_NAME" => "N",
			"IBLOCK_ID" => "14",	// Инфоблок
			"IBLOCK_TYPE" => "catalog",	// Тип инфоблока
			"SECTION_CODE" => "97",	// Код раздела
			"SECTION_FIELDS" => array(	// Поля разделов
				0 => "",
				1 => "",
			),
			"SECTION_ID" => $_REQUEST["SECTION_ID"],	// ID раздела
			"SECTION_URL" => "#SECTION_CODE_PATH#",	// URL, ведущий на страницу с содержимым раздела
			"SECTION_USER_FIELDS" => array(	// Свойства разделов
				0 => "",
				1 => "",
			),
			"SHOW_PARENT_NAME" => "Y",	// Показывать название раздела
			"TOP_DEPTH" => "2",	// Максимальная отображаемая глубина разделов
			"VIEW_MODE" => "LINE",	// Вид списка подразделов
			"COMPONENT_TEMPLATE" => "main_custom"
		),
		false
	); ?><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>