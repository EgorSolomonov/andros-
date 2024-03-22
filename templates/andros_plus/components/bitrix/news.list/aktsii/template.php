<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$showBottomPager = true;

if (!empty($arResult['NAV_RESULT'])) {
  $navParams =  array(
    'NavPageCount' => $arResult['NAV_RESULT']->NavPageCount,
    'NavPageNomer' => $arResult['NAV_RESULT']->NavPageNomer,
    'NavNum' => $arResult['NAV_RESULT']->NavNum
  );
} else {
  $navParams = array(
    'NavPageCount' => 1,
    'NavPageNomer' => 1,
    'NavNum' => $this->randString()
  );
}
?>
<? //d($arResult); 
?>

<div class="container">

  <div class="page page--static">
    <!-- section breadcrumbs -->
    <div class="section section--breadcrumbs">
      <div class="breadcrumbs">
        <div class="breadcrumbs__item">
          <a href="/" class="breadcrumbs__item_link">
            Главная
          </a>
        </div>
        <div class="breadcrumbs__item">
          <a href="index.html" class="breadcrumbs__item_link">
            Акции на медицину и косметологию
          </a>
        </div>
      </div>
    </div>
    <!-- section breadcrumbs END -->

    <div class="section section--actions">
      <div class="section__header">
        <div class="section__header_title">
          <h1>Акции на медицину и косметологию</h1>
        </div>
      </div>
      <div class="section__content">
        <!--card-->
        <div class="cardsGrid cardsGrid--default cardsGrid--action">

          <? foreach ($arResult["ITEMS"] as $item) : ?>
            <div class="card">
              <div class="card__image ratio ratio--1by1">
                <a href="<?= $item['DETAIL_PAGE_URL'] ?>" class="ratio__item card__image_link">

                  <picture>
                    <source data-srcset="<?= CFile::GetPath($item['PREVIEW_PICTURE']['ID']) ?>" srcset="<?= SITE_TEMPLATE_PATH ?>/assets/blank.png" type="image/webp">
                    <img class="lazyload card__image_src" src="<?= SITE_TEMPLATE_PATH ?>/assets/blank.png" data-src="<?= CFile::GetPath($item['PREVIEW_PICTURE']['ID']) ?>" alt>
                  </picture>
                </a>
              </div>
              <div class="card__date">
                <?= $item['PREVIEW_TEXT'] ?>
              </div>
              <div class="card__details">
                <div class="card__title">
                  <h3><a href="<?= $item['DETAIL_PAGE_URL'] ?>"><?= $item['NAME'] ?></a></h3>

                </div>
                <div class="card__btn">
                  <a href="<?= $item['DETAIL_PAGE_URL'] ?>" class="btn btn--bordered btn--ico btn--ico-more"> </a>
                </div>
              </div>
            </div>
          <? endforeach ?>
        </div>

        <!-- section pagination -->
        <?
        if ($showBottomPager) {
        ?>
          <!-- section pagination -->
          <div data-pagination-num="<?= $navParams['NavNum'] ?>">
            <!-- pagination-container -->
            <?= $arResult['NAV_STRING'] ?>
            <!-- pagination-container -->
          </div>
          <!-- section pagination END -->
        <?
        }
        ?>
        <!-- section pagination END -->
        <!--card END-->
      </div>
    </div>

    <!-- section callback form -->
    <? $APPLICATION->IncludeComponent(
      "bitrix:form.result.new",
      "callback_form",
      array(
        "COMPONENT_TEMPLATE" => "callback_form",
        "WEB_FORM_ID" => "1",
        "IGNORE_CUSTOM_TEMPLATE" => "N",
        "USE_EXTENDED_ERRORS" => "Y",
        "SEF_MODE" => "N",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
        "LIST_URL" => "",
        "EDIT_URL" => "",
        "SUCCESS_URL" => "",
        "CHAIN_ITEM_TEXT" => "",
        "CHAIN_ITEM_LINK" => "",
        "VARIABLE_ALIASES" => array(
          "WEB_FORM_ID" => "WEB_FORM_ID",
          "RESULT_ID" => "RESULT_ID",
        )
      ),
      false
    ); ?>
    <!-- section callback END -->
  </div>

</div>