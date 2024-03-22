<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
use Bitrix\Catalog\ProductTable;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 *
 *  _________________________________________________________________________
 * |	Attention!
 * |	The following comments are for system use
 * |	and are required for the component to work correctly in ajax mode:
 * |	<!-- items-container -->
 * |	<!-- pagination-container -->
 * |	<!-- component-end -->
 */

$this->setFrameMode(true);

if (!empty($arResult['NAV_RESULT'])) {
	$navParams =  array(
		'NavPageCount' => $arResult['NAV_RESULT']->NavPageCount,
		'NavPageNomer' => $arResult['NAV_RESULT']->NavPageNomer,
		'NavNum' => $arResult['NAV_RESULT']->NavNum
	);
} else {
	$navParams = array(
		'NavPageCount' => 1,
		'NavPageNomer' => 1,
		'NavNum' => $this->randString()
	);
}

$showTopPager = false;
$showBottomPager = true;
$showLazyLoad = false;

if ($arParams['PAGE_ELEMENT_COUNT'] > 0 && $navParams['NavPageCount'] > 1) {
	$showTopPager = $arParams['DISPLAY_TOP_PAGER'];
	$showBottomPager = $arParams['DISPLAY_BOTTOM_PAGER'];
	$showLazyLoad = $arParams['LAZY_LOAD'] === 'Y' && $navParams['NavPageNomer'] != $navParams['NavPageCount'];
}

$templateLibrary = array('popup', 'ajax', 'fx');
$currencyList = '';

if (!empty($arResult['CURRENCIES'])) {
	$templateLibrary[] = 'currency';
	$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
	'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
	'TEMPLATE_LIBRARY' => $templateLibrary,
	'CURRENCIES' => $currencyList,
	'USE_PAGINATION_CONTAINER' => $showTopPager || $showBottomPager,
);
unset($currencyList, $templateLibrary);

$elementEdit = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT');
$elementDelete = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE');
$elementDeleteParams = array('CONFIRM' => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));

$positionClassMap = array(
	'left' => 'product-item-label-left',
	'center' => 'product-item-label-center',
	'right' => 'product-item-label-right',
	'bottom' => 'product-item-label-bottom',
	'middle' => 'product-item-label-middle',
	'top' => 'product-item-label-top'
);

$discountPositionClass = '';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION'])) {
	foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos) {
		$discountPositionClass .= isset($positionClassMap[$pos]) ? ' ' . $positionClassMap[$pos] : '';
	}
}

$labelPositionClass = '';
if (!empty($arParams['LABEL_PROP_POSITION'])) {
	foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos) {
		$labelPositionClass .= isset($positionClassMap[$pos]) ? ' ' . $positionClassMap[$pos] : '';
	}
}

$arParams['~MESS_BTN_BUY'] = ($arParams['~MESS_BTN_BUY'] ?? '') ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_BUY');
$arParams['~MESS_BTN_DETAIL'] = ($arParams['~MESS_BTN_DETAIL'] ?? '') ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_DETAIL');
$arParams['~MESS_BTN_COMPARE'] = ($arParams['~MESS_BTN_COMPARE'] ?? '') ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_COMPARE');
$arParams['~MESS_BTN_SUBSCRIBE'] = ($arParams['~MESS_BTN_SUBSCRIBE'] ?? '') ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_SUBSCRIBE');
$arParams['~MESS_BTN_ADD_TO_BASKET'] = ($arParams['~MESS_BTN_ADD_TO_BASKET'] ?? '') ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_ADD_TO_BASKET');
$arParams['~MESS_NOT_AVAILABLE'] = ($arParams['~MESS_NOT_AVAILABLE'] ?? '') ?: Loc::getMessage('CT_BCS_TPL_MESS_PRODUCT_NOT_AVAILABLE');
$arParams['~MESS_NOT_AVAILABLE_SERVICE'] = ($arParams['~MESS_NOT_AVAILABLE_SERVICE'] ?? '') ?: Loc::getMessage('CP_BCS_TPL_MESS_PRODUCT_NOT_AVAILABLE_SERVICE');
$arParams['~MESS_SHOW_MAX_QUANTITY'] = ($arParams['~MESS_SHOW_MAX_QUANTITY'] ?? '') ?: Loc::getMessage('CT_BCS_CATALOG_SHOW_MAX_QUANTITY');
$arParams['~MESS_RELATIVE_QUANTITY_MANY'] = ($arParams['~MESS_RELATIVE_QUANTITY_MANY'] ?? '') ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['MESS_RELATIVE_QUANTITY_MANY'] = ($arParams['MESS_RELATIVE_QUANTITY_MANY'] ?? '') ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['~MESS_RELATIVE_QUANTITY_FEW'] = ($arParams['~MESS_RELATIVE_QUANTITY_FEW'] ?? '') ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_FEW');
$arParams['MESS_RELATIVE_QUANTITY_FEW'] = ($arParams['MESS_RELATIVE_QUANTITY_FEW'] ?? '') ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_FEW');

$arParams['MESS_BTN_LAZY_LOAD'] = $arParams['MESS_BTN_LAZY_LOAD'] ?: Loc::getMessage('CT_BCS_CATALOG_MESS_BTN_LAZY_LOAD');

$obName = 'ob' . preg_replace('/[^a-zA-Z0-9_]/', 'x', $this->GetEditAreaId($navParams['NavNum']));
$containerName = 'container-' . $navParams['NavNum'];

if ($showTopPager) {
?>
	<div data-pagination-num="<?= $navParams['NavNum'] ?>">
		<!-- pagination-container -->
		<?= $arResult['NAV_STRING'] ?>
		<!-- pagination-container -->
	</div>
<?
}

// d($arResult);
?>
<!--section injections-->
<div class="section section--no-margin section--injections bx-<?= $arParams['TEMPLATE_THEME'] ?>" data-entity="<?= $containerName ?>">

	<?
	foreach ($arResult['ITEM_ROWS'] as $rowData) {
		$rowItems = $arResult['ITEMS'];
	?>

		<div class="section__content">
			<div class="injectionsGrid">
				<? foreach ($arResult["ITEMS"] as $index => $item) : ?>
					<!--card-->
					<div class="card">
						<div class="card__image">
							<a href="<?= $item['DETAIL_PAGE_URL'] ?>" class="card__image_link">
								<span class="badges">
									<? if ($item['PROPERTIES']['OFFERS']['VALUE']) : ?>
										<span class="badges__item badges__item--top"><?= $item['PROPERTIES']['OFFERS']['VALUE'] ?></span>
									<? elseif ($item['PROPERTIES']['TOP_LABEL']['VALUE']) : ?>
										<span class="badges__item badges__item--top"><?= $item['PROPERTIES']['OFFERS']['VALUE'] ?></span>
									<? else : ?>
										<span class="badges__item badges__item--top" style='display:none'></span>
									<? endif ?>
								</span>


								<picture>
									<source data-srcset="<?= CFile::GetPath($item['PREVIEW_PICTURE']['ID']) ?>" srcset="<?= CFile::GetPath($item['PREVIEW_PICTURE']['ID']) ?>" type="image/webp">
									<img class="lazyload card__imageSrc" src="<?= CFile::GetPath($item['PREVIEW_PICTURE']['ID']) ?>" data-src="<?= CFile::GetPath($item['PREVIEW_PICTURE']['ID']) ?>" alt='<?= $item['NAME'] ?>'>
								</picture>
							</a>
						</div>
						<div class="card__details">
							<div class="card__details__top">
								<div class="card__title">
									<h3><a href="<?= $item['DETAIL_PAGE_URL'] ?>" class="card__title_link"><?= $item['NAME'] ?></a></h3>
									<div class="card__toolbar">

										<div class="price price--rub price--default">от <?= $item['PROPERTIES']['PRICE']['VALUE'] ?></div>
										<div class="price__rating">
											<?= $item['PROPERTIES']['AGE']['VALUE'] ?>
										</div>

									</div>
								</div>
								<div class="card__result">
									<span class="link link--ico link--ico-result">Результат процедуры</span>
								</div>
								<div class="card__desc">
									<?= $item['PROPERTIES']['RESULT']['VALUE'] ?>
								</div>
							</div>

							<div class="card__details_bottom">
								<a href="<?= $item['DETAIL_PAGE_URL'] ?>" class="btn btn--bordered size--lg">Подробнее</a>
								<button class="btn btn--bordered size--lg" type="button" onclick="popupApp.open('appointment');">Записаться</button>
							</div>
						</div>
					</div>
					<!--card END-->
				<? endforeach ?>
			</div>
		</div>
</div>
<!--section injections END-->

<?
		break;
	}
?>
<?
if ($showBottomPager) {
?>
	<!-- section pagination -->
	<div data-pagination-num="<?= $navParams['NavNum'] ?>">
		<!-- pagination-container -->
		<?= $arResult['NAV_STRING'] ?>
		<!-- pagination-container -->
	</div>
	<!-- section pagination END -->
<?
}
?>

<?
if ($showLazyLoad) {
?>
	<div class="row bx-<?= $arParams['TEMPLATE_THEME'] ?>">
		<div class="btn btn-default btn-lg center-block" style="margin: 15px;" data-use="show-more-<?= $navParams['NavNum'] ?>">
			<?= $arParams['MESS_BTN_LAZY_LOAD'] ?>
		</div>
	</div>
<?
}

$signer = new \Bitrix\Main\Security\Sign\Signer;
$signedTemplate = $signer->sign($templateName, 'catalog.section');
$signedParams = $signer->sign(base64_encode(serialize($arResult['ORIGINAL_PARAMETERS'])), 'catalog.section');
?>
<script>
	BX.message({
		BTN_MESSAGE_BASKET_REDIRECT: '<?= GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_BASKET_REDIRECT') ?>',
		BASKET_URL: '<?= $arParams['BASKET_URL'] ?>',
		ADD_TO_BASKET_OK: '<?= GetMessageJS('ADD_TO_BASKET_OK') ?>',
		TITLE_ERROR: '<?= GetMessageJS('CT_BCS_CATALOG_TITLE_ERROR') ?>',
		TITLE_BASKET_PROPS: '<?= GetMessageJS('CT_BCS_CATALOG_TITLE_BASKET_PROPS') ?>',
		TITLE_SUCCESSFUL: '<?= GetMessageJS('ADD_TO_BASKET_OK') ?>',
		BASKET_UNKNOWN_ERROR: '<?= GetMessageJS('CT_BCS_CATALOG_BASKET_UNKNOWN_ERROR') ?>',
		BTN_MESSAGE_SEND_PROPS: '<?= GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_SEND_PROPS') ?>',
		BTN_MESSAGE_CLOSE: '<?= GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE') ?>',
		BTN_MESSAGE_CLOSE_POPUP: '<?= GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE_POPUP') ?>',
		COMPARE_MESSAGE_OK: '<?= GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_OK') ?>',
		COMPARE_UNKNOWN_ERROR: '<?= GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_UNKNOWN_ERROR') ?>',
		COMPARE_TITLE: '<?= GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_TITLE') ?>',
		PRICE_TOTAL_PREFIX: '<?= GetMessageJS('CT_BCS_CATALOG_PRICE_TOTAL_PREFIX') ?>',
		RELATIVE_QUANTITY_MANY: '<?= CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_MANY']) ?>',
		RELATIVE_QUANTITY_FEW: '<?= CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_FEW']) ?>',
		BTN_MESSAGE_COMPARE_REDIRECT: '<?= GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT') ?>',
		BTN_MESSAGE_LAZY_LOAD: '<?= CUtil::JSEscape($arParams['MESS_BTN_LAZY_LOAD']) ?>',
		BTN_MESSAGE_LAZY_LOAD_WAITER: '<?= GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_LAZY_LOAD_WAITER') ?>',
		SITE_ID: '<?= CUtil::JSEscape($component->getSiteId()) ?>'
	});
	var <?= $obName ?> = new JCCatalogSectionComponent({
		siteId: '<?= CUtil::JSEscape($component->getSiteId()) ?>',
		componentPath: '<?= CUtil::JSEscape($componentPath) ?>',
		navParams: <?= CUtil::PhpToJSObject($navParams) ?>,
		deferredLoad: false,
		initiallyShowHeader: '<?= !empty($arResult['ITEM_ROWS']) ?>',
		bigData: <?= CUtil::PhpToJSObject($arResult['BIG_DATA']) ?>,
		lazyLoad: !!'<?= $showLazyLoad ?>',
		loadOnScroll: !!'<?= ($arParams['LOAD_ON_SCROLL'] === 'Y') ?>',
		template: '<?= CUtil::JSEscape($signedTemplate) ?>',
		ajaxId: '<?= CUtil::JSEscape($arParams['AJAX_ID'] ?? '') ?>',
		parameters: '<?= CUtil::JSEscape($signedParams) ?>',
		container: '<?= $containerName ?>'
	});
</script>

<!-- section callback form -->
<? $APPLICATION->IncludeComponent(
	"bitrix:form.result.new",
	"callback_form",
	array(
		"COMPONENT_TEMPLATE" => "callback_form",
		"WEB_FORM_ID" => "1",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"USE_EXTENDED_ERRORS" => "Y",
		"SEF_MODE" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"LIST_URL" => "",
		"EDIT_URL" => "",
		"SUCCESS_URL" => "",
		"CHAIN_ITEM_TEXT" => "",
		"CHAIN_ITEM_LINK" => "",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
); ?>
<!-- section callback END -->

<!--section carousel specialists -->
<?
global $arrFilter;
// d($arResult);
$arrFilter = array("PROPERTY_CATALOG_LINKS_VALUE" => str_contains($arResult['VARIABLES']['SECTION_CODE_PATH'], "meditsina") ? "meditsina" : "kosmetologiya");
?>
<? $APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"main_specialist_carousel",
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_IMG_HEIGHT" => "101",
		"DISPLAY_IMG_WIDTH" => "136",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "arrFilter",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "11",
		"IBLOCK_TYPE" => "specialists",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "30",
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
			0 => "SPECIALITY",
			1 => "EXPERIENCE",
			2 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "main_specialist_carousel",
		"USE_RSS" => "Y",
		"TITLE_RSS" => "Главные новости информационного портала"
	),
	false
); ?>
<!--section carousel specialists END-->

<!-- section text -->
<div class="section section--text ">
	<div class="section__header">
		<div class="section__header_title">
			<h3><?= $arResult['NAME'] ?> в Ессентуках</h3>
		</div>
	</div>
	<div class="section__content">
		<? if ($arResult['IPROPERTY_VALUES']['SECTION_META_DESCRIPTION']) : ?>
			<div class="editor">
				<p><?= $arResult['IPROPERTY_VALUES']['SECTION_META_DESCRIPTION'] ?></p>
			</div>
		<? endif ?>
	</div>
</div>
<!-- section text END -->

<!-- component-end -->