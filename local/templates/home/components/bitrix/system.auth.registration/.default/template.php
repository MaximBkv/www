<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>


<? $arResult["USER_PROPERTIES"] = $GLOBALS["USER_FIELD_MANAGER"]->GetUserFields(
	"USER",
	$arResult["ID"],
); ?>


<div class="site-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-8 mb-5">

				<? if ($arResult["SHOW_EMAIL_SENT_CONFIRMATION"]) : ?>
					<p><? echo GetMessage("AUTH_EMAIL_SENT") ?></p>
				<? endif; ?>

				<? if (!$arResult["SHOW_EMAIL_SENT_CONFIRMATION"] && $arResult["USE_EMAIL_CONFIRMATION"] === "Y") : ?>
					<p><? echo GetMessage("AUTH_EMAIL_WILL_BE_SENT") ?></p>
				<? endif ?>



				<form class="p-5 bg-white border" method="post" action="<?= $arResult["AUTH_URL"] ?>" name="bform" enctype="multipart/form-data">
					<input type="hidden" name="AUTH_FORM" value="Y" />
					<input type="hidden" name="TYPE" value="REGISTRATION" />

					<?
					ShowMessage($arParams["~AUTH_RESULT"]);
					if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR'])
						ShowMessage($arResult['ERROR_MESSAGE']);
					?>



					<b><?= GetMessage("AUTH_REGISTER") ?></b>

					<div class="row form-group">
						<div class="col-md-12 mb-3 mb-md-0">
							<label class="font-weight-bold" for="USER_NAME"><?= GetMessage("AUTH_NAME") ?></label>
							<input type="text" name="USER_NAME" id="USER_NAME" class="form-control" value="<?= $arResult["USER_NAME"] ?>">
						</div>
					</div>

					<div class="row form-group">
						<div class="col-md-12 mb-3 mb-md-0">
							<label class="font-weight-bold" for="USER_LAST_NAME"><?= GetMessage("AUTH_LAST_NAME") ?></label>
							<input type="text" name="USER_LAST_NAME" id="USER_LAST_NAME" class="form-control" value="<?= $arResult["USER_LAST_NAME"] ?>">
						</div>
					</div>

					<div class="row form-group">
						<div class="col-md-12 mb-3 mb-md-0">
							<label class="font-weight-bold" for="USER_LOGIN"><span class="starrequired">*</span><?= GetMessage("AUTH_LOGIN_MIN") ?></label>
							<input type="text" name="USER_LOGIN" id="USER_LOGIN" class="form-control" value="<?= $arResult["USER_LOGIN"] ?>">
						</div>
					</div>

					<div class="row form-group">
						<div class="col-md-12">
							<label class="font-weight-bold" for="USER_PASSWORD"><span class="starrequired">*</span><?= GetMessage("AUTH_PASSWORD_REQ") ?></label>
							<input type="password" name="USER_PASSWORD" id="USER_PASSWORD" maxlength="255" value="<?= $arResult["USER_PASSWORD"] ?>" class="form-control" autocomplete="off">
						</div>
					</div>

					<div class="row form-group">
						<div class="col-md-12">
							<label class="font-weight-bold" for="USER_CONFIRM_PASSWORD"><span class="starrequired">*</span><?= GetMessage("AUTH_CONFIRM") ?></label>
							<input type="password" name="USER_CONFIRM_PASSWORD" id="USER_CONFIRM_PASSWORD" maxlength="255" value="<?= $arResult["USER_CONFIRM_PASSWORD"] ?>" class="form-control" autocomplete="off">
						</div>
					</div>

					<? if ($arResult["EMAIL_REGISTRATION"]) : ?>
						<div class="row form-group">
							<div class="col-md-12">
								<label class="font-weight-bold" for="USER_EMAIL"><? if ($arResult["EMAIL_REQUIRED"]) : ?><span class="starrequired">*</span><? endif ?><?= GetMessage("AUTH_EMAIL") ?></label>
								<input type="text" name="USER_EMAIL" id="USER_EMAIL" maxlength="255" value="<?= $arResult["USER_EMAIL"] ?>" class="form-control">
							</div>
						</div>
					<? endif ?>

					<? if ($arResult["PHONE_REGISTRATION"]) : ?>
						<div class="row form-group">
							<div class="col-md-12">
								<label class="font-weight-bold" for="USER_PHONE_NUMBER"><? if ($arResult["EMAIL_REQUIRED"]) : ?><span class="starrequired">*</span><? endif ?><?= GetMessage("main_register_phone_number") ?></label>
								<input type="text" name="USER_PHONE_NUMBER" id="USER_PHONE_NUMBER" maxlength="255" value="<?= $arResult["USER_PHONE_NUMBER"] ?>" class="form-control">
							</div>
						</div>
					<? endif ?>

					<tbody>

						<? // ********************* User properties ***************************************************
						?>
						<div class="row form-group">
							<div class="col-md-12">
							<label class="font-weight-bold"><span class="starrequired">*</span><?= trim($arParams["USER_PROPERTY_NAME"]) <> '' ? $arParams["USER_PROPERTY_NAME"] : "Выберите группу пользоваетлей" ?></label>

								<? foreach ($arResult["USER_PROPERTIES"] as $FIELD_NAME => $arUserField) : ?>

									
									<?= $arUserField["EDIT_FORM_LABEL"] ?>:

									<? $APPLICATION->IncludeComponent(
										"bitrix:system.field.edit",
										$arUserField["USER_TYPE"]["USER_TYPE_ID"],
										array(
											"bVarsFromForm" => $arResult["bVarsFromForm"],
											"arUserField" => $arUserField,
											"form_name" => "bform"
										),
										null,
										array("HIDE_ICONS" => "Y")
									); ?>

									

								<? endforeach; ?>
							</div>
						</div>
						<? // ******************** /User properties ***************************************************

						/* CAPTCHA */
						if ($arResult["USE_CAPTCHA"] == "Y") {
						?>

							<? echo GetMessage("CAPTCHA_REGF_TITLE") ?><br />
							<input type="hidden" name="captcha_sid" value="<?= $arResult["CAPTCHA_CODE"] ?>" />
							<img src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult["CAPTCHA_CODE"] ?>" width="180" height="40" alt="CAPTCHA" /><br /><br />

							<span class="starrequired">*</span><?= GetMessage("CAPTCHA_REGF_PROMT") ?>:<br />
							<input type="text" name="captcha_word" maxlength="50" value="" autocomplete="off" /><br /><br />

						<?
						}
						/* CAPTCHA */
						?>

						<? $APPLICATION->IncludeComponent(
							"bitrix:main.userconsent.request",
							"",
							array(
								"ID" => COption::getOptionString("main", "new_user_agreement", ""),
								"IS_CHECKED" => "Y",
								"AUTO_SAVE" => "N",
								"IS_LOADED" => "Y",
								"ORIGINATOR_ID" => $arResult["AGREEMENT_ORIGINATOR_ID"],
								"ORIGIN_ID" => $arResult["AGREEMENT_ORIGIN_ID"],
								"INPUT_NAME" => $arResult["AGREEMENT_INPUT_NAME"],
								"REPLACE" => array(
									"button_caption" => GetMessage("AUTH_REGISTER"),
									"fields" => array(
										rtrim(GetMessage("AUTH_NAME"), ":"),
										rtrim(GetMessage("AUTH_LAST_NAME"), ":"),
										rtrim(GetMessage("AUTH_LOGIN_MIN"), ":"),
										rtrim(GetMessage("AUTH_PASSWORD_REQ"), ":"),
										rtrim(GetMessage("AUTH_EMAIL"), ":"),
									)
								),
							)
						); ?>


						<div class="row form-group">
							<div class="col-md-12">
								<input type="submit" name="Register" value="<?= GetMessage("AUTH_REGISTER") ?>" class="btn btn-primary  py-2 px-4 rounded-0" />
							</div>
						</div>

						<p><? echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"]; ?></p>
						<p><span class="starrequired">*</span><?= GetMessage("AUTH_REQ") ?></p>

						<p><a href="<?= $arResult["AUTH_AUTH_URL"] ?>" rel="nofollow"><b><?= GetMessage("AUTH_AUTH") ?></b></a></p>

						<script type="text/javascript">
							document.bform.USER_NAME.focus();
						</script>

				</form>
			</div>
		</div>
	</div>
</div>