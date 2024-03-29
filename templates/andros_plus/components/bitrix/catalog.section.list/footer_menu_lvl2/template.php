<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
$curPage = $APPLICATION->GetCurPage();

foreach ($arResult['SECTIONS'] as &$arSection) {
	$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
	$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
?>
	<li class="nav__item">
		<a href="<?= $arSection["SECTION_PAGE_URL"] ?>" class="nav__item_link <? if (str_contains($curPage, $arSection['CODE'])) : ?>is-selected<? endif ?>">
			<?= $arSection["NAME"] ?>
		</a>
	</li>
<?
}
