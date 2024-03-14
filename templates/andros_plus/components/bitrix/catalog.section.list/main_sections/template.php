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
         <? foreach ($arResult["SECTIONS_ON_MAIN"] as $index => $item) : ?>
            <? if ($item['UF_SECTION_ON_MAIN']) : ?>
               <? if ($index <= 5) : ?>
                  <div class="card">
                     <div class="card__image ratio ratio--catalog">
                        <a href="<?= $item['SECTION_PAGE_URL'] ?>" class="ratio__item card__image_link">
                           <picture>
                              <source data-srcset="<?= CFile::GetPath($item['DETAIL_PICTURE']) ?>" srcset="<?= SITE_TEMPLATE_PATH ?>/assets/blank.png" type="image/webp">
                              <img class="lazyload card__image_src" src="<?= SITE_TEMPLATE_PATH ?>/assets/blank.png" data-src="<?= CFile::GetPath($item['DETAIL_PICTURE']) ?>" alt>
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

                              <a href="cosmetology.html" class="btn btn--bordered btn--bordered-second size--lg">Все процедуры</a>
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
               <? endif ?>
            <? endif ?>
         <? endforeach ?>

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