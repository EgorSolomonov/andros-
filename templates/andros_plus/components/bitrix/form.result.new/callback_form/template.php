<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?
// d($arResult);
?>
<div class="section section--callback ">
	<div class="r_box section__inner">
		<div class="section__header">
			<div class="section__header_title">
				<h3> Не можете понять<br>
					какая процедура или услуга<br> необходима?</h3>
			</div>
		</div>
		<div class="section__content">
			<div class="form form--callback">
				<div class="form__header">
					<div class="form__header_title">
						Оставьте заявку и мы подберем ту процедуру, котороя подойдет именно вам.

					</div>
				</div>
				<div class="form__content">
					<form name="<?= $arResult['arForm']['SID'] ?>" action="/?bitrix_include_areas=Y&amp;clear_cache=Y" method="POST" enctype="multipart/form-data" class="js-form-callback">
						<?= bitrix_sessid_post() ?>
						<input type="hidden" name="WEB_FORM_ID" value="<?= $arResult["arForm"]["ID"] ?>" />
						<div class="error-msg"></div>
						<div class="form__group_cols">
							<div class="form__group">
								<div class="form__group_control">
									<!-- <input type="text" class="input size--lg" data-required placeholder="Имя"> -->
									<?= $arResult['funcGetInputHtml']($arResult["QUESTIONS"]["NAME"], $arResult['arrVALUES']) ?>
								</div>
								<div class="form__group_hints"></div>
							</div>
							<div class="form__group">
								<div class="form__group_control">
									<!-- <input type="tel" class="input size--lg" data-required placeholder="+ 7"> -->
									<?= $arResult['funcGetInputHtml']($arResult["QUESTIONS"]["PHONE"], $arResult['arrVALUES']) ?>
								</div>
								<div class="form__group_hints"></div>
							</div>
							<div class="form__group">
								<div class="form__group_control">
									<!-- <button type="submit" name="web_form_submit" value="Отправить" class="btn btn--submit size--lg">Отправить</button> -->
									<input type="submit" name="web_form_submit" value="Отправить" class="btn btn--submit size--lg">
								</div>
							</div>
						</div>
						<div class="form__group form__group--nomargin">
							<div class="c_input c_input--checkbox">
								<!-- <input type="checkbox" data-required id="checkbox-1" name="checkbox1" checked class="input c_input__control"> -->
								<?= $arResult['funcGetInputHtml']($arResult["QUESTIONS"]["checkbox1"], $arResult['arrVALUES']) ?>
								<label for="checkbox-1" class="c_input__label">Кликая на кнопку «Отправить» вы соглашаетесь на
									обработку ваших персональных данных</label>
							</div>
						</div>
						<div class="form__group form__group--complete">
							<div class="alert alert--no-border alert--success">Сообщение успешно отправлено, спасибо!</div>
						</div>
					</form>
				</div>
				<div class="form__footer">
					<button class="btn" onclick="popupApp.open('appointment');">Оставить заявку</button>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	ajaxForm(document.getElementsByName('<?= $arResult['arForm']['SID'] ?>')[0], '<?= $templateFolder ?>/request_form/ajax.php')
</script>