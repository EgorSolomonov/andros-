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

<!-- section breadcrumbs -->
<div class="section section--breadcrumbs">
   <div class="breadcrumbs">
      <div class="breadcrumbs__item">
         <a href="/" class="breadcrumbs__item_link">
            Главная
         </a>
      </div>
      <div class="breadcrumbs__item">
         <a href="<?= $arResult['SECTION']["SECTION_PAGE_URL"] ?>" class="breadcrumbs__item_link">
            <?= $arResult['SECTION']["NAME"] ?>
         </a>
      </div>
   </div>
</div>
<!-- section breadcrumbs END -->

<!--section injections-->
<div class="section section--services">
   <div class="section__header">
      <div class="section__header_title">
         <h2><?= $arResult['SECTION']["NAME"] ?></h2>
      </div>
      <div class="section__header_subtitle">
         Процедуры с объяснениями и рекомендациями, собранные в удобные и понятные разделы. Осталось только выбрать.
      </div>
   </div>
   <div class="section__content">

      <div class="cardsGrid cardsGrid--default cardsGrid--appointments appointmentsGrid" style="margin-bottom: min(max(3.125rem, 4.375vw), 4.375rem);">
         <!--card-->
         <? foreach ($arResult["SECTIONS_ON_MAIN"] as $index => $item) : ?>
            <div class="card">
               <div class="card__image ratio ratio--catalog">
                  <a href="<?= $item['SECTION_PAGE_URL'] ?>" class="ratio__item card__image_link">
                     <picture>
                        <source data-srcset="<?= CFile::GetPath($item['DETAIL_PICTURE']) ?>" srcset="<?= SITE_TEMPLATE_PATH ?>/css/blank.png" type="image/webp">
                        <img class="lazyload card__image_src" src="<?= SITE_TEMPLATE_PATH ?>/css/blank.png" data-src="<?= CFile::GetPath($item['DETAIL_PICTURE']) ?>" alt="<?= $item['NAME'] ?>">
                     </picture>
                  </a>
                  <div class="card__nav">
                     <div class="card__nav_inner is-custom-scrollbar">
                        <div class="nav nav--arrows">
                           <? foreach ($item['LVL_3'] as $subItem) : ?>
                              <div class="nav__item">
                                 <a href="<?= $subItem['DETAIL_PAGE_URL'] ?>" class="nav__item_link"><?= $subItem['NAME'] ?></a>
                              </div>
                           <? endforeach ?>
                        </div>

                        <a href="<?= $item['SECTION_PAGE_URL'] ?>" class="btn btn--bordered btn--bordered-second size--lg">Все процедуры</a>
                     </div>
                  </div>
               </div>
               <div class="card__title">
                  <h2><a href="<?= $item['SECTION_PAGE_URL'] ?>"><?= $item['NAME'] ?></a></h2>
               </div>
               <div class="card__description">
                  <?= $item['DESCRIPTION'] ?>
               </div>
            </div>
         <? endforeach ?>

         <!--card END-->
      </div>
   </div>
</div>

<!--section injections END-->