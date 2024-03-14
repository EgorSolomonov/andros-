<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<div class="section section--benefits section--no-padding js-benefits-carousel">
	<div class="benefits">
		<div class="swiper">
			<div class="swiper-wrapper">
				<? foreach ($arResult["ITEMS"] as $arItem) : ?>
					<? if ($arItem['PROPERTIES']['YANDEX_LINK']['VALUE']) : ?>
							<div class="swiper-slide" style="<? if ($arItem['PROPERTIES']['YANDEX_LINK']['VALUE']) : ?>cursor: pointer;" onclick="location.href='<?=$arItem['PROPERTIES']['YANDEX_LINK']['VALUE']?>'"<? endif ?>>
								<div class="benefits__item">
									<div class="h3"><?= $arItem['NAME'] ?></div>
									<p><?= $arItem['PREVIEW_TEXT'] ?></p>
								</div>
							</div>
					<? else : ?>
						<div class="swiper-slide">
							<div class="benefits__item">
								<div class="h3"><?= $arItem['NAME'] ?></div>
								<p><?= $arItem['PREVIEW_TEXT'] ?></p>
							</div>
						</div>
					<? endif ?>
				<? endforeach; ?>
			</div>
		</div>
		<div class="swiper__buttons">
			<div class="swiper__button swiper__button--prev js-button-left"></div>
			<div class="swiper__button swiper__button--next js-button-right"></div>
		</div>
	</div>
</div>