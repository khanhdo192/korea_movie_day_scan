/**
 * The A List - BreadnTea
 * HaiNM - Team Tech
 * nguyenminhhai@breadntea.vn
 */
$(document).ready(function() {
	
	$('#btnCreate').click(function(event){
		event.preventDefault();
		ajaxCall();
	});
	
	function ajaxCall(){
		ajaxReq = $.ajax({
			async: false,
			url: ajaxUrl.userCreate,
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