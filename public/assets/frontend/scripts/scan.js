
var timeOut = 0;
var tokenTag = $('#token');
var btnTag = $('#btnSubmit');

$(document).ready(function(){
	
	autoFocus();
	
	$('#btnClear').click(function(event){
		event.preventDefault();
		resetDefault();
		
		let btn = $('#btnSubmit');
		if(btn.hasClass('disabled') == false){
			btn.addClass('disabled');
		}
		if(btn.hasClass('acitve') == true){
			btn.removeClass('acitve');
		}
		autoFocus();
		$(this).css('display','none');
	});

	$('#btnSubmit').click(function(event){
		event.preventDefault();
		let tokenValue = tokenTag.val();
		activedQRCode(tokenValue);
	});
	
	tokenTag.keyup(function(){
		let text = this.value.toUpperCase();
		$(this).val(text);
	});
	
	tokenTag.on('input', function()
	{
		let value = this.value;
		let delay = this.delay;
		$('#btnClear').css('display','block');
		clearTimeout(delay);
		
		delay = setTimeout(function()
		{
			value = value.toUpperCase();
			
			if(value.length !== 8 || value.search('KMD') > 0){
				console.log('Token not vaild');
				setAlert('Mã không hợp lệ');
				return;
			}
			
			let obj = dataQRCode.find(o => o.token === value);
			console.log(obj);
			if(typeof obj === 'undefined'){
				setAlert('Chưa tìm thấy thông tin');
				return;
			}
			
			let mName = obj.name_vi + ' - ' + obj.name_en;
			let mStart = obj.started_at;
			let mLocation = '(' + obj.location + ')';
			let gName = obj.name;
			let gEmail = obj.email;
			let gPhone = obj.phone;
			
			$('#movieName').text(mName);
			$('#movieTime').text(mStart);
			$('#movieLocation').text(mLocation);
			
			$('#guestName').text(gName);
			$('#guestPhone').text(gEmail);
			$('#guestMail').text(gPhone);
			
			//console.log(this.value);
			/* call ajax request here */
			isActivedQRCode(value);
		}.bind(this), 500);
		
	});

});	

const isActivedQRCode = function(_token)
{
	if(!_token){return;}

	// AJAX request
	$.ajax({
		async: false,
		url: ajaxUrl.isActive,
		method: 'post',
		dataType: 'json',
		headers: {
			[ajaxToken.header]: ajaxToken.hash
		},
		data: {
			token: _token
		},
		beforeSend : function(){},
	}).done(function (response) {
		
		ajaxToken.hash = response.data.rehash;
		setAlert(response.messages);
		let amount = response.data.amount;
		let total = response.data.total;
		autoTotal(amount, total);
		if(response.error === 0){
			if(btnTag.hasClass('disabled') == true){
				btnTag.removeClass('disabled');
			}
			if(btnTag.hasClass('acitve') == false){
				btnTag.addClass('acitve');
			}
			btnTag.prop('disabled', false);
		}else{
			if(btnTag.hasClass('disabled') == false){
				btnTag.addClass('disabled');
			}
			if(btnTag.hasClass('acitve') == true){
				btnTag.removeClass('acitve');
			}
			btnTag.prop('disabled', true);
		}
	}).fail(function (jqXHR, textStatus, errorThrown) {
		console.log('ajax fail');
	});
}

const activedQRCode = function(_token){
	
	if(!_token){return;}
	
	// AJAX request
	$.ajax({
		async: false,
		url: ajaxUrl.active,
		method: 'post',
		dataType: 'json',
		headers: {
			[ajaxToken.header]: ajaxToken.hash
		},
		data: {
			token: _token
		},
		beforeSend : function(){},
	}).done(function (response) {
		ajaxToken.hash = response.data.rehash;
		
		let amount = response.data.amount;
		let total = response.data.total;
		autoTotal(amount, total);
		
		if(response.error === 0){
			setAlert(response.messages);
			showNotification(response.messages,0);
			
			if(btnTag.hasClass('disabled') == false){
				btnTag.addClass('disabled');
			}
			if(btnTag.hasClass('acitve') == true){
				btnTag.removeClass('acitve');
			}
			btnTag.prop('disabled', true);
			
			autoFocus();
			$('#token').val('');
			/*setTimeout(function(){
				resetDefault();
			}, 2000);*/
		}else{
			showNotification(response.messages,1);
		}
	}).fail(function (jqXHR, textStatus, errorThrown) {
		console.log('ajax fail');
	});
}

const resetDefault = function(){
	$('#token').val('');
	$('#status').text('');
	$('#movieName').text('Thông Tin Vé');
	$('#movieTime').text('');
	$('#movieLocation').text('');
	$('#guestName').text('');
	$('#guestPhone').text('');
	$('#guestMail').text('');
}

const setAlert = function(_text){
	$('#status').text(_text);
}

const autoFocus = function(_text){
	tokenTag.focus();
}

const autoTotal = function(_amount, _total){
	let amount = _amount;
	let total = _total;
	if(amount || total){
		amount = amount*2;
		total = total*2;

		$('#total').text(total);
		if(amount >= total){
			$('#bar').css('width', 100+'%');
			$('#amount').text(amount);
		}
		else{
			let width_count = amount * 100 / total;
			$('#bar').css('width', width_count+'%');
			$('#amount').text(amount);
		}
	}
	
}