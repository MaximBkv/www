<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
ShowMessage($arParams["~AUTH_RESULT"]);
?>

<div class="site-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-8 mb-5">

				<form class="p-5 bg-white border" name="bform" method="post" target="_top" action="<?= $arResult["AUTH_URL"] ?>">
					<?
					if ($arResult["BACKURL"] <> '') {
					?>
						<input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>" />
					<?
					}
					?>
					<input type="hidden" name="AUTH_FORM" value="Y">
					<input type="hidden" name="TYPE" value="SEND_PWD">

					<p><? echo GetMessage("sys_forgot_pass_label") ?></p>

					<div class="row form-group">
						<div class="col-md-12 mb-3 mb-md-0">
							<label class="font-weight-bold" for="USER_LOGIN"><?= GetMessage("sys_forgot_pass_login1") ?></label>
							<input type="text" name="USER_LOGIN" id="USER_LOGIN" class="form-control" value="<?= $arResult["USER_LOGIN"] ?>" />

							<div><input type="hidden" name="USER_EMAIL" /></div>

						</div>
					</div>

					<div class="row form-group">
						<div class="col-md-12 mb-3 mb-md-0">
							<? echo GetMessage("sys_forgot_pass_note_email") ?>
						</div>
					</div>

					<? if ($arResult["PHONE_REGISTRATION"]) : ?>

						<div class="row form-group">
							<div class="col-md-12 mb-3 mb-md-0">
								<div><b><?= GetMessage("sys_forgot_pass_phone") ?></b></div>
								<div><input type="text" name="USER_PHONE_NUMBER" value="<?= $arResult["USER_PHONE_NUMBER"] ?>" /></div>
								<div><? echo GetMessage("sys_forgot_pass_note_phone") ?></div>
							</div>
						</div>

					<? endif; ?>

					<? if ($arResult["USE_CAPTCHA"]) : ?>

						<input type="hidden" name="captcha_sid" value="<?= $arResult["CAPTCHA_CODE"] ?>" />
						<img src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult["CAPTCHA_CODE"] ?>" width="180" height="40" alt="CAPTCHA" />
						<div><? echo GetMessage("system_auth_captcha") ?></div>
						<div><input type="text" name="captcha_word" maxlength="50" value="" /></div>

					<? endif ?>

					<div class="row form-group">
						<div class="col-md-12">
							<input type="submit" name="send_account_info" value="<?= GetMessage("AUTH_SEND") ?>" class="btn btn-primary  py-2 px-4 rounded-0" />
						</div>
					</div>

					<a href="<?= $arResult["AUTH_AUTH_URL"] ?>"><?= GetMessage("AUTH_AUTH") ?></a>

				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	document.bform.onsubmit = function() {
		document.bform.USER_EMAIL.value = document.bform.USER_LOGIN.value;
	};
	document.bform.USER_LOGIN.focus();
</script>