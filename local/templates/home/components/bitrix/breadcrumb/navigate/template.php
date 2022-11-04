<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

global $APPLICATION;

if (empty($arResult)) {
    return "";
}

$itemSize = count($arResult);

$layoutResult = '
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(' . SITE_TEMPLATE_PATH . '/images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <h1 class="mb-2">' . $arResult[$itemSize - 1]["TITLE"] . '</h1>';

                    for ($index = 0; $index < $itemSize; $index++) {

                        $pageTitle = htmlspecialcharsex($arResult[$index]["TITLE"]);
                        $point = ($index > 0 ? '<span class="mx-2 text-white">&bullet;</span>' : '');

                        if ($arResult[$index]["LINK"] <> "" && $index != $itemSize - 1) {
                            $layoutResult .= $point . '<a href="' . $arResult[$index]["LINK"] . '"title="' . $pageTitle . '">' . $pageTitle . '</a>';
                        } else {
                            $layoutResult .= $point . '<strong class="text-white">' . $pageTitle . '</strong>';
                        }
                    }

$layoutResult .= '</div></div></div></div>';
return $layoutResult;