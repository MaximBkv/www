<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>

<div class="site-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-8 mb-5">

				<form class="p-5 bg-white border" name="system_auth_form<?= $arResult["RND"] ?>" method="post" target="_top" action="<?= $arResult["AUTH_URL"] ?>">
					<? if ($arResult["BACKURL"] <> '') : ?>
						<input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>" />
					<? endif ?>
					<? foreach ($arResult["POST"] as $key => $value) : ?>
						<input type="hidden" name="<?= $key ?>" value="<?= $value ?>" />
					<? endforeach ?>
					<input type="hidden" name="AUTH_FORM" value="Y" />
					<input type="hidden" name="TYPE" value="AUTH" />



					<div class="row form-group">
						<div class="col-md-12 mb-3 mb-md-0">
							<label class="font-weight-bold" for="USER_LOGIN"><?= GetMessage("AUTH_LOGIN") ?>:</label>
							<input type="text" name="USER_LOGIN" id="USER_LOGIN" class="form-control" value="">
							<script>
								BX.ready(function() {
									var loginCookie = BX.getCookie("<?= CUtil::JSEscape($arResult["~LOGIN_COOKIE_NAME"]) ?>");
									if (loginCookie) {
										var form = document.forms["system_auth_form<?= $arResult["RND"] ?>"];
										var loginInput = form.elements["USER_LOGIN"];
										loginInput.value = loginCookie;
									}
								});
							</script>
						</div>
					</div>

					<div class="row form-group">
						<div class="col-md-12">
							<label class="font-weight-bold" for="USER_PASSWORD"><?= GetMessage("AUTH_PASSWORD") ?></label>
							<input type="password" name="USER_PASSWORD" id="USER_PASSWORD" class="form-control" autocomplete="off">
						</div>
					</div>

					<? if ($arResult["STORE_PASSWORD"] == "Y") : ?>
						<div class="row form-group">
							<div class="col-md-12">
								<input type="checkbox" id="USER_REMEMBER_frm" name="USER_REMEMBER" value="Y" />
								<label for="USER_REMEMBER_frm" title="<?= GetMessage("AUTH_REMEMBER_ME") ?>"><? echo GetMessage("AUTH_REMEMBER_SHORT") ?></label>
							</div>
						</div>
					<? endif ?>


					<? if ($arResult["CAPTCHA_CODE"]) : ?>

						<? echo GetMessage("AUTH_CAPTCHA_PROMT") ?>:<br />
						<input type="hidden" name="captcha_sid" value="<? echo $arResult["CAPTCHA_CODE"] ?>" />
						<img src="/bitrix/tools/captcha.php?captcha_sid=<? echo $arResult["CAPTCHA_CODE"] ?>" width="180" height="40" alt="CAPTCHA" /><br /><br />
						<input type="text" name="captcha_word" maxlength="50" value="" />

					<? endif ?>

					<div class="row form-group">
						<div class="col-md-12">

							<?
							ShowMessage($arParams["~AUTH_RESULT"]);
							if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR'])
								ShowMessage($arResult['ERROR_MESSAGE']);
							?>

							<input type="submit" name="Login" value="<?= GetMessage("AUTH_LOGIN_BUTTON") ?>" class="btn btn-primary  py-2 px-4 rounded-0">
						</div>
					</div>


					<? if ($arResult["NEW_USER_REGISTRATION"] == "Y") : ?>

						<noindex><a href="<?= $arResult["AUTH_REGISTER_URL"] ?>" rel="nofollow"><?= GetMessage("AUTH_REGISTER") ?></a></noindex><br />

					<? endif ?>


					<noindex><a href="<?= $arResult["AUTH_FORGOT_PASSWORD_URL"] ?>" rel="nofollow"><?= GetMessage("AUTH_FORGOT_PASSWORD_2") ?></a></noindex>


				</form>
			</div>
		</div>
	</div>
</div>