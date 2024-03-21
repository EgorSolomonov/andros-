<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<div class="section section--carousel section--video">
	<div class="section__header section__header--center">
		<div class="section__header_title">
			<h2>Будьте с нами онлайн</h2>
		</div>
		<div class="section__header_subtitle">
			Понятным языком рассказываем об услугах, инновациях, даем профессиональные советы
		</div>
	</div>
	<div class="section__content">
		<div class="cardsGrid cardsGrid--carousel cardsGrid--video specialistsGrid js-cards-carousel">
			<div class="swiper">
				<div class="swiper-wrapper">
					<? foreach ($arResult["ITEMS"] as $arItem) : ?>
						<div class="swiper-slide">
							<!--card-->
							<div class="card">
								<div class="card__image ratio ratio--catalog">
									<a href="https://www.youtube.com/<?= $arItem['PROPERTIES']['VIDEO']['VALUE'] ?>" data-fancybox="video" class="ratio__item ratio__item--contain card__image_link r_thumbitem r_thumbitem--video">

										<picture>
											<source data-srcset="<?= CFile::GetPath($arItem['PREVIEW_PICTURE']['ID']) ?>" srcset="<?= CFile::GetPath($arItem['PREVIEW_PICTURE']['ID']) ?>" type="image/webp">
											<img class="lazyload card__image_src" src="<?= CFile::GetPath($arItem['PREVIEW_PICTURE']['ID']) ?>" data-src="<?= CFile::GetPath($arItem['PREVIEW_PICTURE']['ID']) ?>" alt='<?= $arItem['NAME'] ?>'>
										</picture>
									</a>
								</div>
								<div class="card__title">
									<h3><?= $arItem['NAME'] ?></h3>
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