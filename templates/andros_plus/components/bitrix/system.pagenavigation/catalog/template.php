<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/** @var array $arParams */
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */

$this->setFrameMode(true);

if (!$arResult["NavShowAlways"]) {
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"] . "&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?" . $arResult["NavQueryString"] : "");
?>

<div class="section section--pagination ">
	<div class="pagination is-align-right">
		<? if ($arResult["bDescPageNumbering"] === true) : ?>
			<!-- если текущая страница не является последней  -->
			<? if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]) : ?>
				<? if ($arResult["bSavePage"]) : ?>
					<div class="pagination__item pagination__item--prev"><a class="pagination__item_link" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] + 1) ?>"><span><? echo GetMessage("round_nav_back") ?></span></a></div>
					<div class="pagination__item"><a class="pagination__item_link" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] + 1) ?>"><span>1</span></a></в>
					<? else : ?>
						<? if (($arResult["NavPageNomer"] + 1) == $arResult["NavPageCount"]) : ?>
							<div class="pagination__item pagination__item--prev"><a class="pagination__item_link" href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"><span><? echo GetMessage("round_nav_back") ?></span></a></div>
						<? else : ?>
							<div class="pagination__item pagination__item--prev"><a class="pagination__item_link" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] + 1) ?>"><span><? echo GetMessage("round_nav_back") ?></span></a></div>
						<? endif ?>
						<div class="pagination__item"><a class="pagination__item_link" href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"><span>1</span></a></div>
					<? endif ?>
				<? else : ?>
					<div class="pagination__item pagination__item--prev"><span class="pagination__item_link"><? echo GetMessage("round_nav_back") ?></span></div>
					<div class="pagination__item"><span class="pagination__item_link is-selected">1</span></div>
				<? endif ?>

				<?
				// отображает ссылки на предыдущие страницы перед текущей страницей и ссылки на следующие страницы после текущей страницы
				$arResult["nStartPage"]--;
				while ($arResult["nStartPage"] >= $arResult["nEndPage"] + 1) :
				?>
					<? $NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1; ?>

					<? if ($arResult["nStartPage"] == $arResult["NavPageNomer"]) : ?>
						<div class="pagination__item"><span class="pagination__item_link is-selected"><?= $NavRecordGroupPrint ?></span></div>
					<? else : ?>
						<div class="pagination__item"><a class="pagination__item_link" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>"><span><?= $NavRecordGroupPrint ?></span></a></div>
					<? endif ?>

					<? $arResult["nStartPage"]-- ?>
				<? endwhile ?>

				<? if ($arResult["NavPageNomer"] > 1) : ?>
					<? if ($arResult["NavPageCount"] > 1) : ?>
						<div class="pagination__item"><a class="pagination__item_link" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=1"><span><?= $arResult["NavPageCount"] ?></span></a></div>
					<? endif ?>
					<div class="pagination__item pagination__item--next"><a class="pagination__item_link" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] - 1) ?>"><span><? echo GetMessage("round_nav_forward") ?></span></a></div>
				<? else : ?>
					<? if ($arResult["NavPageCount"] > 1) : ?>
						<div class="pagination__item"><span class="pagination__item_link is-selected"><?= $arResult["NavPageCount"] ?></span></div>
					<? endif ?>
					<div class="pagination__item pagination__item--next"><span class="pagination__item_link"><? echo GetMessage("round_nav_forward") ?></span></div>
				<? endif ?>

			<? else : ?>

				<? if ($arResult["NavPageNomer"] > 1) : ?>
					<? if ($arResult["bSavePage"]) : ?>
						<div class="pagination__item pagination__item--prev"><a class="pagination__item_link" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] - 1) ?>"><span><? echo GetMessage("round_nav_back") ?></span></a></div>
						<div class="pagination__item"><a class="pagination__item_link" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=1"><span>1</span></a></div>
					<? else : ?>
						<? if ($arResult["NavPageNomer"] > 2) : ?>
							<div class="pagination__item pagination__item--prev"><a class="pagination__item_link" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] - 1) ?>"><span><? echo GetMessage("round_nav_back") ?></span></a></div>
						<? else : ?>
							<div class="pagination__item pagination__item--prev"><a class="pagination__item_link" href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"><span><? echo GetMessage("round_nav_back") ?></span></a></div>
						<? endif ?>
						<div class="pagination__item"><a class="pagination__item_link" href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"><span>1</span></a></div>
					<? endif ?>
				<? else : ?>
					<div class="pagination__item pagination__item--prev"><span class="pagination__item_link"><? echo GetMessage("round_nav_back") ?></span></div>
					<div class="pagination__item"><span class="pagination__item_link is-selected">1</span></div>
				<? endif ?>

				<?
				$arResult["nStartPage"]++;
				while ($arResult["nStartPage"] <= $arResult["nEndPage"] - 1) :
				?>
					<? if ($arResult["nStartPage"] == $arResult["NavPageNomer"]) : ?>
						<div class="pagination__item"><span class="pagination__item_link is-selected"><?= $arResult["nStartPage"] ?></span></div>
					<? else : ?>
						<div class="pagination__item"><a class="pagination__item_link" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>"><span><?= $arResult["nStartPage"] ?></span></a></div>
					<? endif ?>
					<? $arResult["nStartPage"]++ ?>
				<? endwhile ?>

				<? if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]) : ?>
					<? if ($arResult["NavPageCount"] > 1) : ?>
						<div class="pagination__item"><a class="pagination__item_link" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["NavPageCount"] ?>"><span><?= $arResult["NavPageCount"] ?></span></a></div>
					<? endif ?>
					<div class="pagination__item pagination__item--next"><a class="pagination__item_link" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] + 1) ?>"><span><? echo GetMessage("round_nav_forward") ?></span></a></div>
				<? else : ?>
					<? if ($arResult["NavPageCount"] > 1) : ?>
						<div class="pagination__item"><span class="pagination__item_link is-selected"><?= $arResult["NavPageCount"] ?></span></div>
					<? endif ?>
					<div class="pagination__item pagination__item--next"><span class="pagination__item_link"><? echo GetMessage("round_nav_forward") ?></span></div>
				<? endif ?>

				<? if ($arResult["bShowAll"]) : ?>
					<? if ($arResult["NavShowAll"]) : ?>
						<li class="bx-pag-all"><a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>SHOWALL_<?= $arResult["NavNum"] ?>=0" rel="nofollow"><span><? echo GetMessage("round_nav_pages") ?></span></a></li>
					<? else : ?>
						<li class="bx-pag-all"><a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>SHOWALL_<?= $arResult["NavNum"] ?>=1" rel="nofollow"><span><? echo GetMessage("round_nav_all") ?></span></a></li>
					<? endif ?>
				<? endif ?>
				</ul>
				<div style="clear:both"></div>

			<? endif ?>