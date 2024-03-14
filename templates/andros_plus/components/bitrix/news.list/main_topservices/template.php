<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? //d($arResult["ITEMS"]);
?>

<div class="section section--topservices">
	<div class="section__header section__header--center">
		<div class="section__header_title">
			<img class="lazyload" src="<?= SITE_TEMPLATE_PATH ?>/assets/blank.png" data-src="<?= SITE_TEMPLATE_PATH ?>/assets/top-services-heading.svg" alt="top">
			<div class="h2">услуг клиники</div>
		</div>
		<div class="section__header_subtitle">Выбор наших клиентов</div>
		<div class="section__header_links">
			<a href="cosmetology.html" class="btn size--lg">Смотреть все услуги</a>
		</div>

	</div>
	<div class="section__content">
		<div class="cardsGrid cardsGrid--carousel cardsGrid--top-services js-top-carousel">
			<div class="swiper">
				<div class="swiper-wrapper">
					<? foreach ($arResult["ITEMS"] as $arItem) : ?>
						<? if ($arItem['PROPERTIES']['TOP_LABEL']['VALUE'] === 'Да') : ?>
							<div class="swiper-slide">
								<!--card-->
								<div class="card">
									<div class="card__image ratio ratio--catalog">
										<a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="ratio__item ratio__item--cover card__image_link">
											<span class="badges">
												<span class="badges__item badges__item--top">Топ</span>
											</span>

											<picture>
												<source data-srcset="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" srcset="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" type="image/webp">
												<img class="lazyload card__image_src" src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" data-src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt='<?= $arItem['NAME'] ?>'>
											</picture>
											<span class="card__description">
												<span class="card__title">
													<span class="h2"><?= $arItem['NAME'] ?></span>
												</span>
												<span class="card__price">
													<span class="prices">
														<span class="price price--rub price--default"> от <?= $arItem['PROPERTIES']['PRICE']['VALUE'] ?> р.</span>
													</span>
												</span>
											</span>
										</a>
									</div>
								</div>
								<!--card END-->
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
</div>