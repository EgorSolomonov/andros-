<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? //d($arResult["ITEMS"]); 
?>

<div class="homeBanner__column">
	<div class="swiper ">
		<div class="swiper-wrapper">
			<? foreach ($arResult["ITEMS"] as $arItem) : ?>
				<div class="swiper-slide" style="background-image: <?= $arItem['PREVIEW_PICTURE']['SRC'] ?>;">
					<div class="slide">
						<div class="slide__title">
							<div class="h1"><?= $arItem['NAME'] ?></div>
						</div>
						<div class="slide__description">
							<p><?= $arItem['DETAIL_TEXT'] ?></p>
						</div>
						<div class="slide__buttons">
							<a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="btn btn--bordered btn--bordered-second size--lg">Подробно</a>
						</div>
					</div>
				</div>
			<? endforeach; ?>
		</div>
	</div>
	<div class="swiper__controls">
		<div class="swiper__arrow swiper__arrow--prev js-button-left"></div>
		<div class="swiper__pager js-pagination"></div>
		<div class="swiper__arrow swiper__arrow--next js-button-right"></div>
	</div>

</div>