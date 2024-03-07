<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? if (!empty($arResult)) : ?>
	<ul class="mainMenu js-mainmenu">

		<?

		// d($arResult);
		$previousLevel = 0;
		foreach ($arResult as $arItem) :
		?>

			<? if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel) : ?>
				<?= str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"])); ?>
			<? endif ?>

			<? if ($arItem["IS_PARENT"]) : ?>

				<? if ($arItem["DEPTH_LEVEL"] == 1) : ?>
					<li class="mainMenu__item is-dd is-dd--full">
						<a href="<?= $arItem["LINK"] ?>" class="mainMenu__item_link <? if ($arItem["SELECTED"]) : ?>is-selected<? endif ?>"><?= $arItem["TEXT"] ?></a>
						<div class="nav nav--level-1 nav--catalog">
							<ul class="nav__inner is-custom-scrollbar">
							<? else : ?>
								<li class="nav__item is-dd is-open<? if ($arItem["SELECTED"]) : ?>is-selected<? endif ?>">
									<a href="<?= $arItem["LINK"] ?>" class="nav__item_link"><?= $arItem["TEXT"] ?></a>
									<ul class="nav nav--level-2">
									<? endif ?>

								<? else : ?>

									<? if ($arItem["PERMISSION"] > "D") : ?>

										<? if ($arItem["DEPTH_LEVEL"] == 1) : ?>
											<li class="mainMenu__item">
												<a href="<?= $arItem["LINK"] ?>" class="mainMenu__item_link <? if ($arItem["SELECTED"]) : ?>is-selectedroot-item<? endif ?>"><?= $arItem["TEXT"] ?></a>
											</li>
										<? else : ?>
											<li class="nav__item <? if ($arItem["SELECTED"]) : ?>is-selected<? endif ?>">
												<a class="nav__item_link <? if ($arItem["ADDITIONAL_LINKS"]["TOP_LABEL"] === "44" || $arItem["ADDITIONAL_LINKS"]["OFFERS"]) : ?>is-badge<? else : ?><? endif ?>" href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?><? if ($arItem["ADDITIONAL_LINKS"]["TOP_LABEL"] === "44") : ?><span class="badge">топ</span><? endif ?> <? if ($arItem["ADDITIONAL_LINKS"]["OFFERS"]) : ?><span class="badge"><?= $arItem["ADDITIONAL_LINKS"]["OFFERS"] ?></span><? endif ?></a>
											</li>
										<? endif ?>

									<? else : ?>

										<? if ($arItem["DEPTH_LEVEL"] == 1) : ?>
											<li class="nav__item">
												<a href="" class="nav__item_link <? if ($arItem["ADDITIONAL_LINKS"]["TOP_LABEL"] === "44") : ?>is-badge<? else : ?><? endif ?> <? if ($arItem["SELECTED"]) : ?>is-selected<? endif ?>" title="<?= GetMessage("MENU_ITEM_ACCESS_DENIED") ?>"><?= $arItem["TEXT"] ?></a>
											</li>
										<? else : ?>
											<li class="nav__item">
												<a href="" class="nav__item_link" title="<?= GetMessage("MENU_ITEM_ACCESS_DENIED") ?>"><?= $arItem["TEXT"] ?></a>
											</li>
										<? endif ?>

									<? endif ?>

								<? endif ?>

								<? $previousLevel = $arItem["DEPTH_LEVEL"]; ?>

							<? endforeach ?>

							<? if ($previousLevel > 1) : //close last item tags
							?>
								<?= str_repeat("</ul></li>", ($previousLevel - 1)); ?>
							<? endif ?>

									</ul>
									<div class="menu-clear-left"></div>
								<? endif ?>