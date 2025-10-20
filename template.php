<?php if( ! defined( "B_PROLOG_INCLUDED" ) || B_PROLOG_INCLUDED !== true ) die();
/** @var array $arParams */
/** @var array $arResult */

/** @var string $templateFolder */

use Bitrix\Main\Localization\Loc;

$webFormName = "appointment";
$successID = "success-".$webFormName;
$popupID = "popup-".$webFormName;
?>
<div class="modal" id="<?php echo $popupID ?>" style="display: none;">
        <div class="modal-content">
		<div class="form modal-form">
			<?php echo $arResult["FORM_HEADER"] ?>
				<?php echo $arResult["QUESTIONS"]["URL"]["HTML_CODE"] ?>
                                <div class="modal__inner modal__inner--m-100">
                                        <input type="hidden" name="web_form_submit" value="Y">
                                        <div class="modal-head">
                                                <div class="modal-head__bar">
                                                        <div class="modal-title h4"><?php echo Loc::getMessage( "WEBFORM_APPOINTMENT_TITLE" ) ?></div>
                                                        <button class="modal-close icon" type="button" data-fancybox-close>
                                                                <svg class="svg-sprite-icon icon-close">
                                                                        <use xlink:href="<?php echo SITE_TEMPLATE_PATH ?>/static/images/svg/symbol/sprite.svg#close"></use>
                                                                </svg>
                                                        </button>
                                                </div>
                                                <div class="error-msg"></div>
                                        </div>
					<div class="modal-body modal-body--visit">
						<div class="modal-body__inner">
							<div class="modal-form__fields row">
								<?php if( isset( $arResult["QUESTIONS"]["SERVICE"]["CUSTOM_VALUES"] ) && count( $arResult["QUESTIONS"]["SERVICE"]["CUSTOM_VALUES"] ) > 0 ) { ?>
									<div class="modal-form__fields-item">
										<div class="form-item" data-validate="data-validate">
											<div class="form-item__group border">
												<div class="form-item__label"
													 data-default="<?php echo $arResult["QUESTIONS"]["SERVICE"]["CAPTION"] ?>"
													 data-change="Услуга">
													<?php echo $arResult["QUESTIONS"]["SERVICE"]["CAPTION"] ?>
												</div>
												<div class="form-select">
													<button class="form-select__btn" type="button">
														<span class="form-select__btn-txt"></span>
														<span class="form-select__btn-icon icon">
														<svg class="svg-sprite-icon icon-down">
															<use xlink:href="<?php echo SITE_TEMPLATE_PATH ?>/static/images/svg/symbol/sprite.svg#down"></use>
														</svg>
													</span>
													</button>
													<div class="form-select__dropdown border">
														<div class="form-select__dropdown-backdrop"></div>
														<div class="form-select__dropdown-inner">
															<div class="form-select__head">
																<div class="form-select__head-line"></div>
																<div class="form-select__head-title h5"><?php echo $arResult["QUESTIONS"]["SERVICE"]["CAPTION"] ?></div>
															</div>
															<div class="form-select__dropdown-content"
																 data-simplebar="data-simplebar"
																 data-simplebar-auto-hide="false">
																<div class="form-select__search">
																	<input class="form-select__search-input"
																		   type="text"
																		   placeholder="<?php echo Loc::getMessage( "SEARCH_LABEL" ) ?>"/>
																	<div class="form-select__search-icon icon">
																		<svg class="svg-sprite-icon icon-search-2">
																			<use xlink:href="<?php echo SITE_TEMPLATE_PATH ?>/static/images/svg/symbol/sprite.svg#search-2"></use>
																		</svg>
																	</div>
																</div>
																<div class="form-select__list">
																	<?php foreach( $arResult["QUESTIONS"]["SERVICE"]["CUSTOM_VALUES"] as $service ) { ?>
																		<div class="form-select__list-item">
																			<label class="form-select__label select-label">
																				<input type="radio"
																					   name="service-select"
																					   data-id="<?php echo $service["ID"] ?>"
																					   data-value="<?php echo $service["NAME"] ?>"/>
																				<span><?php echo $service["NAME"] ?></span>
																			</label>
																		</div>
																	<?php } ?>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>
								<?php if( isset( $arResult["QUESTIONS"]["SPECIALIST"]["CUSTOM_VALUES"] ) && count( $arResult["QUESTIONS"]["SPECIALIST"]["CUSTOM_VALUES"] ) ) { ?>
									<div class="modal-form__fields-item">
										<div class="form-item" data-validate="data-validate">
											<div class="form-item__group border">
												<div class="form-item__label"
													 data-default="<?php echo $arResult["QUESTIONS"]["SPECIALIST"]["CAPTION"] ?>"
													 data-change="Специалист">
													<?php echo $arResult["QUESTIONS"]["SPECIALIST"]["CAPTION"] ?>
												</div>
												<div class="form-select">
													<button class="form-select__btn" type="button">
														<span class="form-select__btn-txt"> </span>
														<span class="form-select__btn-icon icon">
															<svg class="svg-sprite-icon icon-down">
																<use xlink:href="<?php echo SITE_TEMPLATE_PATH ?>/static/images/svg/symbol/sprite.svg#down"></use>
															</svg>
														</span>
													</button>
													<div class="form-select__dropdown border">
														<div class="form-select__dropdown-backdrop"></div>
														<div class="form-select__dropdown-inner">
															<div class="form-select__head">
																<div class="form-select__head-line"></div>
																<div class="form-select__head-title h5"><?php echo $arResult["QUESTIONS"]["SPECIALIST"]["CAPTION"] ?></div>
															</div>
															<div class="form-select__dropdown-content"
																 data-simplebar="data-simplebar"
																 data-simplebar-auto-hide="false">
																<div class="form-select__search">
																	<input class="form-select__search-input"
																		   type="text"
																		   placeholder="<?php echo Loc::getMessage( "SEARCH_LABEL" ) ?>"/>
																	<div class="form-select__search-icon icon">
																		<svg class="svg-sprite-icon icon-search-2">
																			<use xlink:href="<?php echo SITE_TEMPLATE_PATH ?>/static/images/svg/symbol/sprite.svg#search-2"></use>
																		</svg>
																	</div>
																</div>
																<div class="form-select__list">
																	<?php foreach( $arResult["QUESTIONS"]["SPECIALIST"]["CUSTOM_VALUES"] as $specialist ) { ?>
																		<div class="form-select__list-item">
																			<label class="form-select__label select-label">
																				<input type="radio"
																					   name="form_radio_SPECIALIST"
																					   data-name="specialist-select"
																					   data-id="<?php echo $specialist["ID"] ?>"
																					   data-value="<?php echo $specialist["NAME"] ?>"/>
																				<span><?php echo $specialist["NAME"] ?></span>
																			</label>
																		</div>
																	<?php } ?>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>
								<?php if( is_array( $arResult["QUESTIONS"]["DATE"] ) ) { ?>
									<div class="modal-form__fields-item modal-form__fields-item--50">
										<div class="form-item">
											<div class="form-item__group border top-label">
												<div class="form-item__label">
													<?php echo $arResult["QUESTIONS"]["DATE"]["CAPTION"] ?>
												</div>
												<div class="form-item__field">
													<?php echo $arResult["QUESTIONS"]["DATE"]["HTML_CODE"] ?>
													<div class="form-item__icon icon form-item__icon--right">
														<svg class="svg-sprite-icon icon-calendar">
															<use xlink:href="<?php echo SITE_TEMPLATE_PATH ?>/static/images/svg/symbol/sprite.svg#calendar"></use>
														</svg>
													</div>
												</div>
												<div class="form-item__calendar border"></div>
											</div>
										</div>
									</div>
								<?php } ?>
								<?php if( is_array( $arResult["QUESTIONS"]["TIME"] ) ) { ?>
									<div class="modal-form__fields-item modal-form__fields-item--50">
										<div class="form-item">
											<div class="form-item__group border top-label">
												<div class="form-item__label"
													 data-default="<?php echo $arResult["QUESTIONS"]["TIME"]["CAPTION"] ?>"
													 data-change="<?php echo $arResult["QUESTIONS"]["TIME"]["CAPTION"] ?>">
													<?php echo $arResult["QUESTIONS"]["TIME"]["CAPTION"] ?>
												</div>
												<div class="form-select form-select--time">
													<button class="form-select__btn clock" type="button">
														<span class="form-select__btn-txt">--:--</span>
														<span class="form-select__btn-icon icon">
															<svg class="svg-sprite-icon icon-clock">
																<use xlink:href="<?php echo SITE_TEMPLATE_PATH ?>/static/images/svg/symbol/sprite.svg#clock"></use>
															</svg>
														</span>
													</button>
													<div class="form-select__dropdown border">
														<div class="form-select__dropdown-backdrop"></div>
														<div class="form-select__dropdown-inner">
															<div class="form-select__head">
																<div class="form-select__head-line"></div>
																<div class="form-select__head-title h5"><?php echo $arResult["QUESTIONS"]["TIME"]["CAPTION"] ?></div>
															</div>
															<div class="form-select__dropdown-content form-select__dropdown-content--times">
																<div class="form-select__times row">
																	<?php foreach( $arResult["QUESTIONS"]["TIME"]["STRUCTURE"] as $time ) { ?>
																		<div class="form-select__times-item">
																			<label class="form-select__time select-label">
																				<input type="radio"
																					   name="form_radio_TIME"
																					   data-value="<?php echo $time["MESSAGE"] ?>"
																					   id="<?php echo $time["ID"] ?>"
																					   value="<?php echo $time["ID"] ?>"
																				/>
																				<span class="btn-sm"><?php echo $time["MESSAGE"] ?></span>
																			</label>
																		</div>
																	<?php } ?>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>
								<div class="modal-form__fields-item modal-form__fields-item--50">
									<div class="form-item" data-validate data-validate-box="NAME">
										<div class="form-item__group border">
											<div class="form-item__label">
												<?php echo $arResult["QUESTIONS"]["NAME"]["CAPTION"] ?>
											</div>
											<div class="form-item__field">
												<?php echo $arResult["QUESTIONS"]["NAME"]["HTML_CODE"] ?>
											</div>
										</div>
										<div class="form-item__error">Текст ошибки</div>
									</div>
								</div>
								<div class="modal-form__fields-item modal-form__fields-item--50">
									<div class="form-item" data-validate data-validate-box="PHONE">
										<div class="form-item__group border top-label">
											<div class="form-item__label">
												<?php echo $arResult["QUESTIONS"]["PHONE"]["CAPTION"] ?>
											</div>
											<div class="form-item__field">
												<?php echo $arResult["QUESTIONS"]["PHONE"]["HTML_CODE"] ?>
											</div>
										</div>
										<div class="form-item__error">Текст ошибки</div>
									</div>
								</div>
								<div class="modal-form__fields-item">
									<div class="form-item">
										<div class="form-item__group border top-label">
											<div class="form-item__label">
												<?php echo $arResult["QUESTIONS"]["COMMENT"]["CAPTION"] ?>
											</div>
											<div class="form-item__field">
												<?php echo $arResult["QUESTIONS"]["COMMENT"]["HTML_CODE"] ?>
											</div>
										</div>
									</div>
								</div>
                                                                <div class="modal-form__fields-item modal-form__fields-item--50 modal-form__fields-item--captcha modal-form__fields-item--captcha-input">
                                                                        <div class="form-item" data-validate-box="0">
										<div class="form-item__group border">
											<div class="form-item__label">
												<?php echo Loc::getMessage( "WEBFORM_CAPTCHA_TEXT" ) ?>
											</div>
											<div class="form-item__field">
												<?php echo str_replace( "inputtext", "form-input", $arResult["CAPTCHA_FIELD"] ) ?>
											</div>
										</div>
									</div>
								</div>
                                                                <div class="modal-form__fields-item modal-form__fields-item--50 modal-form__fields-item--captcha modal-form__fields-item--captcha-image">
                                                                        <div class="form-item">
                                                                                <?php echo $arResult["CAPTCHA_IMAGE"] ?>
                                                                        </div>
                                                                </div>
							</div>
						</div>
					</div>
                                        <div class="modal-foot">
                                                <div class="modal-form__foot">
                                                        <div class="modal-form__foot-left">
                                                                <button class="modal-form__btn btn btn-gradient" type="submit">
                                                                        <?php echo $arResult["arForm"]["BUTTON"] ?>
                                                                </button>
                                                        </div>
                                                        <div class="modal-form__foot-txt">
                                                                <div class="modal-form__txt"><?php echo Loc::getMessage( "WEBFORM_ACCEPTANCE_START_TEXT" ) ?>
                                                                        <a class="gradient-link text-gradient-2"
                                                                           href="<?php echo Loc::getMessage( "WEBFORM_ACCEPTANCE_LINK_VALUE" ) ?>">
                                                                                <?php echo Loc::getMessage( "WEBFORM_ACCEPTANCE_LINK_LABEL" ) ?>
                                                                        </a>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
			<?php echo $arResult["FORM_FOOTER"] ?>
		</div>
	</div>

	<?php if( ! IS_POPUPS_AJAX ) { ?>
		<script>
			webformSubmitHandler(
				document.getElementsByName( "<?php echo $arResult["arForm"]["SID"]?>" )[0],
				"<?php echo SITE_TEMPLATE_PATH ?>/include/ajax_webform.php",
				"<?php echo $successID ?>"
			);
		</script>
	<?php } ?>
	<div class="modal" id="<?php echo $successID ?>" style="display: none;">
		<div class="modal-content modal-content--m-rounded">
			<div class="modal-success">
				<div class="modal__inner">
                                        <div class="modal-head modal-head--success">
                                                <div class="modal-head__bar">
                                                        <div class="modal-title h4"><?php echo Loc::getMessage( "WEBFORM_APPOINTMENT_TITLE" ) ?></div>
                                                        <button class="modal-close icon modal-close--m-sm" type="button" data-fancybox-close>
                                                                <svg class="svg-sprite-icon icon-close">
                                                                        <use xlink:href="<?php echo SITE_TEMPLATE_PATH ?>/static/images/svg/symbol/sprite.svg#close"></use>
                                                                </svg>
                                                        </button>
                                                </div>
                                        </div>
					<div class="modal-body modal-body--success">
						<div class="modal-txt text-normal grey-color">
							<?php echo Loc::getMessage( "WEBFORM_SUCCESS_TEXT" ) ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
