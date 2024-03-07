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

<!--section appointment-->
<div class="section section--appointments">
   <div class="section__header section__header--center">
      <div class="section__header_title">
         <h1>Направления клиники Андрос+</h1>
      </div>
      <div class="section__header_subtitle">
         Услуги и процедуры с объяснениями и рекомендациями, собранные в удобные и понятные разделы.
         Осталось только выбрать.
      </div>
   </div>
   <div class="section__content">

      <div class="cardsGrid cardsGrid--default cardsGrid--appointments appointmentsGrid">
         <!--card-->
         <div class="card">
            <div class="card__image ratio ratio--catalog">
               <a href="cosmetology.html" class="ratio__item card__image_link">

                  <picture>
                     <source data-srcset="assets/cosmetology-1.webp" srcset="assets/blank.png" type="image/webp">
                     <img class="lazyload card__image_src" src="assets/blank.png" data-src="assets/cosmetology-1.jpg" alt>
                  </picture>
               </a>
               <div class="card__nav">
                  <div class="card__nav_inner is-custom-scrollbar">
                     <div class="nav nav--arrows">
                        <div class="nav__item">
                           <a href="cosmetology.html" class="nav__item_link">Коррекция мимических морщин ботулотоксином</a>
                        </div>
                        <div class="nav__item">
                           <a href="cosmetology.html" class="nav__item_link">Контурная пластика</a>
                        </div>
                        <div class="nav__item">
                           <a href="cosmetology.html" class="nav__item_link">Увеличение губ</a>
                        </div>
                        <div class="nav__item">
                           <a href="cosmetology.html" class="nav__item_link">Биоревитализация</a>
                        </div>
                        <div class="nav__item">
                           <a href="cosmetology.html" class="nav__item_link">Плазмотерапия</a>
                        </div>
                        <div class="nav__item">
                           <a href="cosmetology.html" class="nav__item_link">Мезотерапия</a>
                        </div>
                        <div class="nav__item">
                           <a href="cosmetology.html" class="nav__item_link">Плацентарная терапия</a>
                        </div>
                     </div>

                     <a href="cosmetology.html" class="btn btn--bordered btn--bordered-second size--lg">Все процедуры</a>
                  </div>
               </div>
            </div>
            <div class="card__title">
               <h2><a href="cosmetology.html">Иньекционная косметология</a></h2>
            </div>
            <div class="card__description">
               В разделе собраны процедуры, которые помогут в омоложении, лифтинге и коррекции лица и тела
            </div>
         </div>

         <!--card END-->
      </div>
   </div>
   <div class="section__footer">
      <div class="section__footer_item">
         <a href="/" class="btn size--lg">Все направления медицины</a>
      </div>
      <div class="section__footer_item">
         <a href="/" class="btn size--lg">Все направления косметологии</a>
      </div>
   </div>
</div>
<!--section appointment END-->