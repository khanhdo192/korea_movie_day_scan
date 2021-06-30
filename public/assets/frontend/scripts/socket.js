var ws = null;

$(document).ready(function() {

	if ('WebSocket' in window) {
		WSConnect();
	} else {
		console.log('the browser doesn\'\t support WebSocket');
	}
	
});

const WSConnect = function() {

	let protocol = 'ws';
	let host = window.location.host;

    if (window.location.protocol.includes('https')) {
        protocol = 'wss';
    }

	ws = new WebSocket(protocol +'://' + host + ':8888/live');
	
	ws.onopen = function(e) {
		console.log('WebSocket is connected!');
		ws.send('Message to send');
	};

	ws.onmessage = function (e) {
		console.log(e.data);
	};

	// Websocket is closed. 
	ws.onclose = function(e) { 
		setTimeout(function() {
			WSConnect();
		}, 3000);
	};

	ws.onerror = function(e) {
		console.error('Socket encountered error: ', e.message, 'Closing socket');
		ws.close();
	};

};