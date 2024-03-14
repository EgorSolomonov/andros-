<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? //d($arResult["ITEMS"]);
?>

<div class="section section--carousel section--specialists ">
	<div class="section__header section__header--center">
		<div class="section__header_title">
			<div class="h1">Специалисты направления</div>
		</div>
		<div class="section__header_subtitle">
			В клинике Андрос+ принимают только квалифицированные специалисты
		</div>
	</div>
	<div class="section__content">
		<div class="cardsGrid cardsGrid--carousel specialistsGrid js-cards-carousel">
			<div class="swiper">
				<div class="swiper-wrapper">
					<? foreach ($arResult["ITEMS"] as $arItem) : ?>
						<div class="swiper-slide">
							<!--card-->
							<div class="card">
								<div class="card__image ratio ratio--catalog">
									<a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="ratio__item card__image_link">

										<picture>
											<source data-srcset="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" srcset="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" type="image/webp">
											<img class="lazyload card__image_src" src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" data-src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt='<?= $arItem['NAME'] ?>'>
										</picture>
									</a>
								</div>
								<div class="card__title">
									<h3><a href="<?= $arItem['DETAIL_PAGE_URL'] ?>"><?= $arItem['NAME'] ?></a></h3>
								</div>
								<div class="card__description">
									<p><?= $arItem['PROPERTIES']['SPECIALITY']['VALUE'] ?></p>
									<p><?= $arItem['PROPERTIES']['EXPERIENCE']['VALUE'] ?></p>
								</div>
							</div>
							<!--card END-->
						</div>
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