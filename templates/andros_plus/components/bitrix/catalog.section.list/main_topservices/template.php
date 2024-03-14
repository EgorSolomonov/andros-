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
               <div class="swiper-slide">
                  <!--card-->
                  <div class="card">
                     <div class="card__image ratio ratio--catalog">
                        <a href="specialist.html" class="ratio__item ratio__item--cover card__image_link">
                           <span class="badges">
                              <span class="badges__item badges__item--top">Топ</span>
                           </span>

                           <picture>
                              <source data-srcset="assets/top-1.webp" srcset="assets/blank.png" type="image/webp">
                              <img class="lazyload card__image_src" src="assets/blank.png" data-src="assets/top-1.jpg" alt>
                           </picture>
                           <span class="card__description">
                              <span class="card__title">
                                 <span class="h2">Консультация гинеколога</span>
                              </span>
                              <span class="card__price">
                                 <span class="prices">
                                    <span class="price price--rub price--default"> от 1 500 р.</span>
                                 </span>
                              </span>
                           </span>
                        </a>
                     </div>
                  </div>
                  <!--card END-->
               </div>
            </div>
         </div>
         <div class="swiper__buttons">
            <div class="swiper__button swiper__button--prev js-button-left"></div>
            <div class="swiper__button swiper__button--next js-button-right"></div>
         </div>
      </div>
   </div>
</div>