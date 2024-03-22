<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>
<div class="container">





  <div class="page page--static">
    <!-- section breadcrumbs -->
    <div class="section section--breadcrumbs">
      <div class="breadcrumbs">
        <div class="breadcrumbs__item">
          <a href="index.html" class="breadcrumbs__item_link">
            Главная
          </a>
        </div>
        <div class="breadcrumbs__item">
          <a href="index.html" class="breadcrumbs__item_link">
            Контакты
          </a>
        </div>
      </div>
    </div>
    <!-- section breadcrumbs END -->

    <div class="section section--contacts">
      <div class="section__header">
        <div class="section__header_title">
          <h1>Контакты</h1>
        </div>
      </div>
      <div class="section__content">

        <div class="contacts">
          <div class="contacts__col contacts__col--details">

            <div class="contacts__list">
              <div class="contacts__list_item contacts__list_item--location">
                <? $APPLICATION->IncludeFile(
                  SITE_TEMPLATE_PATH . "/include/footer/address.php",
                  array(),
                  array("MODE" => "text", "NAME" => 'Адрес')
                ) ?>
              </div>
              <div class="contacts__list_item contacts__list_item--phone">
                <? $APPLICATION->IncludeFile(
                  SITE_TEMPLATE_PATH . "/include/footer/phone.php",
                  array(),
                  array("MODE" => "text", "NAME" => 'Телефон')
                ) ?>
              </div>
              <div class="contacts__list_item contacts__list_item--email">
                <? $APPLICATION->IncludeFile(
                  SITE_TEMPLATE_PATH . "/include/footer/mail.php",
                  array(),
                  array("MODE" => "text", "NAME" => 'Мэйл')
                ) ?>
              </div>
              <div class="contacts__list_item contacts__list_item--worktime">
                <? $APPLICATION->IncludeFile(
                  SITE_TEMPLATE_PATH . "/include/footer/work-schedule.php",
                  array(),
                  array("MODE" => "text", "NAME" => 'Время работы')
                ) ?>
              </div>
            </div>
          </div>
          <div class="contacts__col contacts__col--map">
            <div class="contacts__map">
              <div class="ratio__item">
                <? $APPLICATION->IncludeComponent(
                  "bitrix:map.yandex.view",
                  "",
                  array(),
                  false
                ); ?>
              </div>
            </div>
          </div>
        </div>
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
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>