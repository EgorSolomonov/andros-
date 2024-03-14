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
//dump($arResult['SECTIONS_DEPTH_MORE_1']);
foreach ($arResult['SECTIONS'] as &$arSection) {
	$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
	$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
?>
	<li class="mainMenu__item is-dd is-dd--full">
		<a class="mainMenu__item_link" href="<?= $arSection["LINK"] ?>"> <?= $arSection["NAME"] ?> </a>
		<div class="nav nav--level-1 nav--catalog">
			<ul class="nav__inner is-custom-scrollbar">
				<? foreach ($arResult['SECTIONS_DEPTH_MORE_1'][$arSection['ID']] as $key => $depth2) : ?>
					<li class="nav__item is-dd is-open">
						<a href="<?= $depth2["SECTION_PAGE_URL"] ?>" class="nav__item_link">
							<?= $depth2["NAME"] ?>
						</a>
						<ul class="nav nav--level-2">
							<? foreach ($depth2['SECTIONS_DEPTH_MORE_3'] as $key => $depth3) :
								// d($depth3);
							?>
								<li class="nav__item">
									<a href="<?= $depth3["DETAIL_PAGE_URL"] ?>" class="nav__item_link <? if ($depth3["TOP_LABEL"]['VALUE'] == "Да" || $depth3["OFFERS"]['VALUE']) : ?>is-badge<? endif ?>">
										<?= $depth3["NAME"] ?> <? if ($depth3["TOP_LABEL"]['VALUE'] == "Да") : ?><span class="badge">топ</span><? endif ?> <? if ($depth3["OFFERS"]['VALUE']) : ?><span class="badge"><?= $depth3["OFFERS"]['VALUE'] ?></span><? endif ?>
									</a>
								</li>
							<? endforeach; ?>
						</ul>
					</li>
				<? endforeach; ?>
			</ul>
		</div>
	</li>


<?
}
unset($arSection);
