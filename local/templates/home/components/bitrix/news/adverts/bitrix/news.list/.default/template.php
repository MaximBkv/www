<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
<div class="pt-5">
    <div class="container">
        <form class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="select-wrap">
                    <span class="icon icon-arrow_drop_down"></span>
                    <select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
                        <option value=""><?= GetMessage("SQUARE"); ?></option>
                        <option value="500">500</option>
                        <option value="700">700</option>
                        <option value="800">800</option>
                        <option value="1000">1000</option>
                        <option value="1500">1500</option>
                        <option value="2000">2000</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="select-wrap">
                    <span class="icon icon-arrow_drop_down"></span>
                    <select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
                        <option value=""><?= GetMessage("GARAGES"); ?></option>
                        <option value="garazh">Есть</option>
                        <option value="nogarazh">Нет</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="select-wrap">
                    <span class="icon icon-arrow_drop_down"></span>
                    <select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
                        <option value=""><?= GetMessage("FLOOR_COUNT"); ?></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="select-wrap">
                    <span class="icon icon-arrow_drop_down"></span>
                    <select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
                        <option value=""><?= GetMessage("STATUS"); ?></option>
                        <option value="for_sale"><?= GetMessage("FOR_SALE"); ?></option>
                        <option value="for_rent"><?= GetMessage("FOR_RENT"); ?></option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="select-wrap">
                    <span class="icon icon-arrow_drop_down"></span>
                    <select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
                        <option value=""><?= GetMessage("LOCATION"); ?></option>
                        <option value="United States"><?= GetMessage("UNITED_STATES"); ?></option>
                        <option value="United Kingdom"><?= GetMessage("UNITED_KINGDOM"); ?></option>
                        <option value="Canada"><?= GetMessage("CANADA"); ?></option>
                        <option value="Belgium"><?= GetMessage("BELGIUM"); ?></option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="select-wrap">
                    <span class="icon icon-arrow_drop_down"></span>
                    <select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
                        <option value=""><?= GetMessage("TOILET_COUNT"); ?></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="6">6</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="mb-4">
                    <div id="slider-range" class="border-primary"></div>
                    <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <input type="submit" class="btn btn-primary btn-block form-control-same-height rounded-0" value="<?= GetMessage("SEARCH"); ?>">
            </div>
        </form>
    </div>
</div>
<div class="site-section site-section-sm bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <div class="site-section-title">
                    <? if ($APPLICATION->GetTitle() == 'Объявления'): ?>
                        <h2><?= GetMessage("TITLE_PROPERTY"); ?></h2>
                    <? elseif($APPLICATION->GetTitle() == 'Мои объявления'): ?>
                        <h2><?= GetMessage("ADVERT_TITLE"); ?></h2>
                    <?endif?>

                </div>
            </div>
        </div>
        <div class="row mb-5">
            <? if ($arParams["DISPLAY_TOP_PAGER"]) : ?>
                <?= $arResult["NAV_STRING"]; ?><br />
            <? endif; ?>
            <? foreach($arResult["ITEMS"] as $arItem) : ?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="col-md-6 col-lg-4 mb-4" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <a href="<?= $arItem["DETAIL_PAGE_URL"]; ?>" class="prop-entry d-block">
                        <figure>
                            <img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"]; ?>" alt="<?= $arItem["NAME"]; ?>" class="img-fluid">
                        </figure>
                        <div class="prop-text">
                        <? if (!empty ( $arItem["DISPLAY_PROPERTIES"]["price"])):?>
                            <div class="inner">
                                <span class="price rounded">$<?= number_format($arItem["DISPLAY_PROPERTIES"]["price"]["VALUE"]); ?></span>
                                <h3 class="title"><?= $arItem["NAME"]; ?></h3>
                                <p class="location"><?= $arItem["DISPLAY_PROPERTIES"]["location"]["VALUE"]; ?></p>
                            </div>
                            <? endif ?>

                            <div class="prop-more-info">
                                <div class="inner d-flex">
                                    <? if (!empty ( $arItem["DISPLAY_PROPERTIES"]["ploshad"])):?>
                                    <div class="col">
                                        <span><?= GetMessage("SQUARE"); ?></span>
                                        <strong><?= $arItem["DISPLAY_PROPERTIES"]["ploshad"]["VALUE"]; ?>m<sup>2</sup></strong>
                                    </div>
                                    <? endif ?>
                                    <? if (!empty ($arItem["DISPLAY_PROPERTIES"]["floor_count"])):?>
                                    <div class="col">
                                        <span><?= GetMessage("FLOOR_COUNT"); ?></span>
                                        <strong><?= $arItem["DISPLAY_PROPERTIES"]["etazhi"]["VALUE"]; ?></strong>
                                    </div>
                                    <? endif ?>
                                    <? if (!empty ($arItem["DISPLAY_PROPERTIES"]["sanuzly"])):?>

                                    <div class="col">
                                        <span><?= GetMessage("TOILET_COUNT"); ?></span>
                                        <strong><?= $arItem["DISPLAY_PROPERTIES"]["sanuzly"]["VALUE"]; ?></strong>
                                    </div>
                                    <? endif ?>
                                    
                                    <div class="col">
                                        <?if ($arItem["DISPLAY_PROPERTIES"]["garazh"]["VALUE"] == 'Есть'):?>
                                            <span><?= GetMessage("GARAGES"); ?></span>
                                            <strong>Есть</strong>
                                        <?else:?>
                                            <span><?= GetMessage("GARAGES"); ?></span><strong>Нет</strong>
                                        <?endif;?>
                                    </div>
  
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <? endforeach; ?>
        </div>
        <? if ($arParams["DISPLAY_BOTTOM_PAGER"]) : ?>
            <br /><?= $arResult["NAV_STRING"]; ?>
        <? endif; ?>
    </div>
</div>