<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)) : ?>
	<!-- <ul id="horizontal-multilevel-menu">

		<?
		$previousLevel = 0;
		foreach ($arResult as $arItem) : ?>

			<? if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel) : ?>
				<?= str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"])); ?>
			<? endif ?>

			<? if ($arItem["IS_PARENT"]) : ?>

				<? if ($arItem["DEPTH_LEVEL"] == 1) : ?>
					<li><a href="<?= $arItem["LINK"] ?>" class="<? if ($arItem["SELECTED"]) : ?>root-item-selected<? else : ?>root-item<? endif ?>"><?= $arItem["TEXT"] ?></a>
						<ul>
						<? else : ?>
							<li<? if ($arItem["SELECTED"]) : ?> class="item-selected" <? endif ?>><a href="<?= $arItem["LINK"] ?>" class="parent"><?= $arItem["TEXT"] ?></a>
								<ul>
								<? endif ?>

							<? else : ?>

								<? if ($arItem["PERMISSION"] > "D") : ?>

									<? if ($arItem["DEPTH_LEVEL"] == 1) : ?>
										<li><a href="<?= $arItem["LINK"] ?>" class="<? if ($arItem["SELECTED"]) : ?>root-item-selected<? else : ?>root-item<? endif ?>"><?= $arItem["TEXT"] ?></a></li>
									<? else : ?>
										<li<? if ($arItem["SELECTED"]) : ?> class="item-selected" <? endif ?>><a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>
					</li>
				<? endif ?>

			<? else : ?>

				<? if ($arItem["DEPTH_LEVEL"] == 1) : ?>
					<li><a href="" class="<? if ($arItem["SELECTED"]) : ?>root-item-selected<? else : ?>root-item<? endif ?>" title="<?= GetMessage("MENU_ITEM_ACCESS_DENIED") ?>"><?= $arItem["TEXT"] ?></a></li>
				<? else : ?>
					<li><a href="" class="denied" title="<?= GetMessage("MENU_ITEM_ACCESS_DENIED") ?>"><?= $arItem["TEXT"] ?></a></li>
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
	<div class="menu-clear-left"></div> -->
<? endif ?>

<? //d($arResult);
?>

<? if (!empty($arResult)) : ?>
	<div class="header__col header__col--nav">
		<nav class="nav__wrapper">
			<ul class="mainMenu js-mainmenu">

				<? foreach ($arResult as $arItem) : ?>
					<? if ($arItem['PERMISSION'] === "Z") : ?>
						<? //d($arItem);
						?>
						<li class="mainMenu__item is-dd is-dd--full">
							<a href="<?= $arItem["LINK"] ?>" class="<? if ($arItem["SELECTED"]) : ?>root-item-selected<? else : ?>root-item<? endif ?> mainMenu__item_link"><?= $arItem["TEXT"] ?></a>
							 <div class="nav nav--level-1 nav--catalog">
							<ul class="nav__inner is-custom-scrollbar">
								<li class="nav__item is-dd is-open"> <a href="cosmetology.html" class="nav__item_link">Инъекционная
										косметология</a>
									<ul class="nav nav--level-2">
										<li class="nav__item"> <a href="cosmetology.html" class="nav__item_link">Коррекция мимических морщин
												ботулотоксином</a></li>
									</ul>
								</li>


							</ul>
						</div> 
						</li>

						<!-- <li class="mainMenu__item is-dd">
					<a href="cosmetology.html" class="mainMenu__item_link">Косметология</a>


					<ul class="nav nav--level-1 nav--catalog">
						<li class="nav__item"> <a href="index.html" class="nav__item_link">Коррекция мимических морщин
								ботулотоксином</a></li>
					</ul>

				</li> -->
					<? else : ?>
						<li class="mainMenu__item is-dd is-dd--full">
							<a href="<?= $arItem["LINK"] ?>" class="<? if ($arItem["SELECTED"]) : ?>root-item-selected<? else : ?>root-item<? endif ?> mainMenu__item_link"><?= $arItem["TEXT"] ?></a>
						</li>
					<? endif ?>
				<? endforeach ?>
			</ul>
		</nav>
	</div>
<? endif ?>