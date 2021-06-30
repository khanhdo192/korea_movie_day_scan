/**
 * The A List - BreadnTea
 * HaiNM - Team Tech
 * nguyenminhhai@breadntea.vn
 */
$(document).ready(function() {
	
	var ajaxReq;
	
	$('#btnLogin').click(function(event){
		event.preventDefault();
		ajaxCall();
	});
	
	$('#formLogin').on('keydown', function(event) {
		if (event.which == 13 || event.keyCode == 13) {
			event.preventDefault();
			ajaxCall();
		}
	});

	function ajaxCall(){

		let account = $('[name=account]').val();
		let password = $('[name=password]').val();

		ajaxReq = $.ajax({
			async: false,
			url: ajaxUrl.login,
			method: 'post',
			dataType: 'json',
            headers: {
                'X-CSRF-Token': ajaxToken.hash
            },
			data: {
				account: account,
				password: password
			},
			beforeSend : function(){
				$('button, input').prop('disabled', true);
				$('a').addClass('disabled');
			},
		});

		// AJAX request
		ajaxReq.done(function (response) {
			ajaxToken.hash = response.data.rehash;
			if(response.error === 0){
				showNotification(response.messages,0);
				setTimeout(function(){
					let reUrl = response.data.reurl;
					window.location.replace(reUrl);
				}, 2000);
			}else{
				$('button, input').prop('disabled', false);
				$('a').removeClass('disabled');
				showNotification(response.messages,1);
			}
		});
		
		ajaxReq.fail(function (jqXHR, textStatus, errorThrown) {
			console.log('ajax fail');
		});
	};

});