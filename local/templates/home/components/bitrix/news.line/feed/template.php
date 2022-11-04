<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? $this->setFrameMode(true); ?>

<div class="row mb-5">
    <div class="col-12">
        <div class="site-section-title">
            <h2><?= GetMessage("TITLE_PROPERTY"); ?></h2>
        </div>
    </div>
</div>
<div class="row mb-5">
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="col-md-6 col-lg-4 mb-4" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <a href="<?= $arItem["DETAIL_PAGE_URL"]; ?>" class="prop-entry d-block">
                <figure>
                    <img alt="<?= $arItem["PREVIEW_PICTURE"]["ORIGINAL_NAME"]; ?>" src="<?= $arItem["PREVIEW_PICTURE"]["SAFE_SRC"] ?>" class="img-fluid">
                </figure>
                <div class="prop-text">
                    <div class="inner">
                        <span class="price rounded">$<?= number_format($arItem["PROPERTY_PRICE_VALUE"]); ?></span>
                        <h3 class="title"><?= $arItem["NAME"]; ?></h3>
                    </div>
                    <div class="prop-more-info">
                        <div class="inner d-flex">
                            <?if(!empty($arItem["PROPERTY_PLOSHAD_VALUE"])):?>
                                <div class="col">
                                <span><?= GetMessage("SQUARE"); ?></span>
                                    <strong>
                                        <?= $arItem["PROPERTY_PLOSHAD_VALUE"]; ?><?= GetMessage("SQUARE_UNIT"); ?>
                                    </strong>
                                </div>

                            <?endif;?>

                            <?if(!empty($arItem["PROPERTY_FLOOR_COUNT_VALUE"])):?>
                                <div class="col">
                                <span><?= GetMessage("FLOORS"); ?></span><strong><?= $arItem["PROPERTY_ETAZHI_VALUE"]; ?></strong>
                                </div>

                            <?endif;?>
                            <?if(!empty($arItem["PROPERTY_TOILET_COUNT_VALUE"])):?>
                            <div class="col">
                                <span><?= GetMessage("TOILETS"); ?></span><strong><?= $arItem["PROPERTY_SANUZLY_VALUE"]; ?></strong>
                            </div>
                            <?endif;?>

                            <div class="col">
                            <?if($arItem["PROPERTY_GARAZH_VALUE"] == 'Есть'):?>
                                <span><?= GetMessage("GARAGES"); ?></span><strong><?= $arItem["PROPERTY_GARAZH_VALUE"]; ?></strong>
                            <?else:?>
                                <span><?= GetMessage("GARAGES"); ?></span><strong>нет</strong>

                                <?endif;?>

                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    <?endforeach;?>
</div>