(function(window,$) {
	
	var _video;
	var _canvas;
	var _stream;
	var _$note;
	
	var WIDTH  = 400;
	var HEIGHT = 300;
	
	$(document).on('ready',function() {

		navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || window.navigator.mozGetUserMedia;
		window.URL = window.URL || window.webkitURL;

		_video  = document.getElementById('video');
		_canvas = document.getElementById('canvas');
		_stream = null;
		_$note  = $('#note');

		_canvas.setAttribute('width',WIDTH);
		_canvas.setAttribute('height',HEIGHT);

		navigator.getUserMedia({ video:true, audio:false }, function(stream) {

			_video.src = window.URL.createObjectURL(stream);
			_stream = stream;

			setInterval(onLoop,1000);

			return false;

		}, function(error) { console.log(error); });

		return false;

	});
	
	function onLoop() {

		var context = _canvas.getContext('2d');
		context.drawImage(video,0,0,WIDTH,HEIGHT);
		
		//ajax(getFormData(_canvas));
		ajax(_canvas.toDataURL('image/jpeg'));

		return false;

	}
	
	function getFormData(canvas) {
		
		var dataURL = canvas.toDataURL();
		var base64  = dataURL.split(',')[1];
		var data    = window.atob(base64);
		var length  = data.length;
		var buff    = new ArrayBuffer(length);
		var array   = new Uint8Array(buff);
		
		for (var i = 0; i < length; i++) {
			array[i] = data.charCodeAt(i);
		}
		
		var blob     = new Blob([array],{ type:'image/jpeg' });
		var formData = new FormData;
		
		formData.append('image',blob);
		
		return formData;
		
	}
	
	function ajax(image) {
		
		$.ajax({

			type : 'POST',
			url  : 'files/php/api.php',
			data : { data:image }

		}).done(function(data) {
			
			if (!data) return false;

			var json   = JSON.parse(data);
			var length = json.length;
			var array  = [];

			for (var i = 0; i < length; i++) {
				array.push(json[i]['@attributes'])
			}
			
			_$note.append('<p>' + (array[4].y - array[0].y) + '</p>');

			return false;

		});

		return false;
		
	}

	return false;
	
})(window,jQuery);

    
 