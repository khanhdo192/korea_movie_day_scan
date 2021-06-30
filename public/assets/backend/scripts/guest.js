/**
 * The A List - BreadnTea
 * HaiNM - Team Tech
 * nguyenminhhai@breadntea.vn
 */

$(document).ready(function() {
	
	$('#btnCreate').click(function(event){
		event.preventDefault();
		createData();
	});
	
});

const createData = function(){
		
	let movieId = $('[name="movieId"]:checked').val();
	let upFile = $('#ipExcel')[0].files;
	
	if (typeof movieId === 'undefined') {
		showNotification('Chọn suất chiếu phim.',-1);
		return;
	}
	
	if (typeof upFile === 'undefined') {
		showNotification('Lỗi chưa nhận biết.',-1);
		return;
	}

	if (upFile.length < 1) {
		showNotification('Chưa chọn file.',-1);
		return;
	}
	
	let formData = new FormData();
	formData.append('movie_id', movieId);
	formData.append('file', upFile[0]);
	
	// AJAX request
	$.ajax({
		async: false,
		url: ajaxUrl.create,
		method: 'post',
		dataType: 'json',
		enctype: 'multipart/form-data',
		processData: false,
		contentType: false,
		headers: {
			[ajaxToken.header]: ajaxToken.hash
		},
		data: formData,
		beforeSend : function(){
			$('button, input').prop('disabled', true);
			$('a').addClass('disabled');
		},
	}).done(function (response) {
		ajaxToken.hash = response.data.rehash;
		$('button, input').prop('disabled', false);
		$('a').removeClass('disabled');
		if(response.error === 0){
			showNotification(response.messages,0);
			setTimeout(function(){
				let reUrl = response.data.reurl;
				window.location.replace(reUrl);
			}, 2000);
		}else{
			showNotification(response.messages,1);
		}
	}).fail(function (jqXHR, textStatus, errorThrown) {
		console.log('ajax fail');
	});
	
};