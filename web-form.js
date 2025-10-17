document.addEventListener( 'DOMContentLoaded', () => {
	addRefreshCaptchaListener()
} )

function reInitWebform(slide) {
	let form = slide.el.querySelector('[name^="webform_"]')
	let success = slide.el.querySelector('[id^="success-"]')
	
	if( form && success ) {
		webformSubmitHandler(form, `${THEME_DIR}/include/ajax_webform.php`, success.id)
		
		let urlFrom = form.querySelector(`input[value="${POPUPS_URL}"]`)
		if( urlFrom ) {
			urlFrom.value = CURRENT_PAGE;
		}
	}
	
	addRefreshCaptchaListener()
}

// Web forms
function webformSubmitHandler( obForm, link, successID ) {
	BX.bind(
		obForm,
		"submit",
		BX.proxy(
			function ( e ) {
				BX.PreventDefault( e );
				
				obForm.getElementsByClassName( "error-msg" )[0].innerHTML = "";
				
				let xhr = new XMLHttpRequest(),
					alertBox = obForm.getElementsByClassName( "error-msg" )[0]
				xhr.open( "POST", link );
				
				xhr.onload = function () {
					if ( xhr.status != 200 ) {
						alert( `Ошибка ${xhr.status}: ${xhr.statusText}` );
					} else {
						try {
							var json = JSON.parse( xhr.responseText );
							
							if ( ! json.success ) {
								hideErrorsFields( obForm );
								
								showErrorsFields( json, obForm )
								
								refreshCaptcha( obForm )
							} else { // Успешная отправка формы
								hideErrorsFields( obForm );
								
								obForm.reset();
								
								Fancybox.close();
								Fancybox.show( [ {
									dragToClose: false,
									src: `#${successID}`,
									type: "inline",
								} ] );
								
								console.log('location: ', location)
								
								setTimeout( () => {
									location.reload()
								}, 3000 )
							}
						} catch ( e ) {
							alertBox.innerHTML = `Ваши действия нам кажутся подозрительными. Попробуйте перезагрузить страницу и повторно заполнить форму.`;
							console.error( "Ошибка парсинга JSON:", e );
						}
					}
				};
				
				xhr.onerror = function () {
					alert( "Запрос не удался" );
				};
				
				// Передаем все данные из формы
				xhr.send( new FormData( obForm ) );
			},
			obForm,
			link
		)
	);
}

function hideErrorsFields( obForm ) {
	let formInputs = obForm.querySelectorAll( 'input, textarea, select' );
	formInputs.forEach( function ( input ) {
		let currentElem = input.closest( '[data-validate-box]' );
		if ( currentElem ) {
			currentElem.classList.remove( 'error' )
		}
	} );
}

function showErrorsFields( json, obForm ) {
	let alertBox = obForm.getElementsByClassName( "error-msg" )[0]
	if ( json.errors && typeof json.errors === 'string' ) {
		alertBox.innerHTML = json.errors;
	} else if ( json.errors && Object.keys( json.errors ).length > 0 ) {
		for ( var debugInfo in json.errors ) {
			if ( +debugInfo === 0 ) {
				alertBox.innerHTML = json.errors[debugInfo];
			}
			
			var field = obForm.querySelector( `[data-validate-box="${debugInfo}"]` );
			var text = obForm.querySelector( `[data-validate-box="${debugInfo}"] .form-item__error` );
			
			if ( field ) {
				field.classList.add( 'error' )
			}
			if ( text ) {
				text.innerText = json.errors[debugInfo];
			}
		}
	}
}

function addRefreshCaptchaListener() {
	var captchaInputs = document.querySelectorAll( '[name="captcha_sid"]' );
	if ( captchaInputs ) {
		captchaInputs.forEach( captcha => {
			var image = captcha.nextElementSibling
			if ( image ) {
				image.addEventListener( 'click', () => {
					captcha.value = getCaptchaSid();
					image.src = `/bitrix/tools/captcha.php?captcha_sid=${captcha.value}⁠&` + Math.random();
				} )
			}
		} )
	}
}

function refreshCaptcha( obForm ) {
	let captcha = obForm.querySelector( '[name="captcha_sid"]' );
	if ( captcha ) {
		var image = captcha.nextElementSibling
		if ( image ) {
			image.click();
		}
	}
}

function getCaptchaSid() {
	let newCaptchaSid = '';
	BX.ajax( {
		url: `${THEME_DIR}/include/ajax_captcha.php`,
		method: 'GET',
		dataType: 'html',
		timeout: 0,
		// async: true,
		async: false, // ВАЖНО - если переключить в true - отдает пустой результат
		processData: true,
		scriptsRunFirst: false, // МАГИЯ ЭРМИТАЖА ТУТ
		emulateOnload: false,
		start: true,
		// cache: false,
		cache: true,
		onsuccess: function ( data ) {
			newCaptchaSid = data;
			return newCaptchaSid;
		}
	} )
	return newCaptchaSid;
}