<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?><p>
	<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "page",
		"AREA_FILE_SUFFIX" => "include"
	)
);?>

<?$APPLICATION->IncludeComponent("bitrix:map.yandex.view",".default",Array(
        "INIT_MAP_TYPE" => "HYBRID",
        "MAP_DATA" => "a:5:{s:10:
            \"yandex_lat\";d:54.707337846253914;s:10:
            \"yandex_lon\";d:20.578642461221364;s:12:
            \"yandex_scale\";i:16;s:10:
            \"PLACEMARKS\";a:1:{i:0;a:3:{s:3:
            \"LON\";d:20.5829274251;s:3:
            \"LAT\";d:54.7078476116;s:4:
            \"TEXT\";s:100:\"ООО \"1С-Битрикс\", г. Калининград, Московский проспект, 261.\";}}s:9:
            \"POLYLINES\";a:1:{i:0;a:3:{s:6:
            \"POINTS\";a:2:{i:0;a:2:{s:3:
            \"LAT\";d:54.707748780049165;s:3:
            \"LON\";d:20.577995674216798;}i:1;a:2:{s:3:
            \"LAT\";d:54.70704134712057;s:3:
            \"LON\";d:20.583708959423795;}}s:5:
            \"TITLE\";s:37:\"Московский проспект\";s:5:
            \"STYLE\";a:1:{s:9:
            \"lineStyle\";a:2:{s:11:
            \"strokeColor\";s:8:
            \"FFFF007F\";s:11:
            \"strokeWidth\";i:3;}}}}}",
        "MAP_WIDTH" => "600",
        "MAP_HEIGHT" => "500",
        "CONTROLS" => array(
            "TOOLBAR",
            "ZOOM",
            "SMALLZOOM",
            "MINIMAP",
            "TYPECONTROL",
            "SCALELINE"
        ),
        "OPTIONS" => array(
            "ENABLE_SCROLL_ZOOM",
            "ENABLE_DBLCLICK_ZOOM",
            "ENABLE_DRAGGING"
        ),
        "MAP_ID" => "yam_1"
    )
);?>
<br>
</p><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>