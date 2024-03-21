<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? //d($arResult["ITEMS"]);
?>
<? foreach ($arResult["ITEMS"] as $index => $arItem) : ?>
	<div class="side__img" data-id="<?= $index ?>">
		<picture>
			<source srcset="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" data-srcset="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" type="image/webp" media="(min-width: 576px)">
			<source class="lazyload" srcset="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" data-srcset="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" media="(max-width: 575px)" type="image/webp">
			<source srcset="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" data-srcset="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" media="(min-width: 575px)">
			<img class="lazyload" src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" data-srcset="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt>
		</picture>
	</div>
<? endforeach; ?>

<div class="container">
	<div class="homeBanner__column">
		<div class="swiper ">
			<div class="swiper-wrapper">
				<? foreach ($arResult["ITEMS"] as $index => $arItem) : ?>
					<div class="swiper-slide" data-sideimg="<?= $index ?>">
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
</div>