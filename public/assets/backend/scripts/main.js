/**
 * The A List - BreadnTea
 * HaiNM - Team Tech
 * nguyenminhhai@breadntea.vn
 */

$(document).ready(function() {
	
	FacebookSDK();

	var ajaxReq;

	$('.dropdown-menu').each(function(){
		let _this = $(this);
		_this.bind('click', function(e) {
			e.stopPropagation();
		});
	});
	
	$('.capitalize').each(function() {
		let myText = $(this).text();
		let reText = myText.charAt(0).toUpperCase() + myText.slice(1);
		$(this).text(reText);
	});
	
	$('#btnLogout').click(function(event){
		event.preventDefault();
		ajaxCall();
	});
	
	function ajaxCall(){
		
		ajaxReq = $.ajax({
			async: false,
			url: ajaxUrl.logout,
			method: 'post',
			dataType: 'json',
            headers: {
                'X-CSRF-Token': ajaxToken.hash
            },
			beforeSend : function(){
				//$('button, input').prop('disabled', true);
				//$('a').addClass('disabled');
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
				showNotification(response.messages,1);
			}
		});
		
		ajaxReq.fail(function (jqXHR, textStatus, errorThrown) {
			console.log('ajax fail');
		});
	};
	
});

const FacebookSDK = function() {
	window.fbAsyncInit = function() {
		FB.init({
			appId      : '807524040095735',
			cookie     : true,
			xfbml      : true,
			version    : 'v9.0'
		});

		FB.AppEvents.logPageView();
	};

	(function(d, s, id){
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "https://connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
};