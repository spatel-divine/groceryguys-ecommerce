$(document).ready(function() {
	
	$('.fileuploadermaincls').fileuploader({
        extensions: ['jpg', 'jpeg', 'png'],
		changeInput: ' ',
		fileMaxSize:5,
		// limit: setLimit_img,
		theme: 'thumbnails',
        enableApi: true,
		addMore: true,
		required:true,
		maxWidth : 450,
		maxHeight : 600,
		thumbnails: {
			box: '<div class="fileuploader-items">' +
                      '<ul class="fileuploader-items-list">' +
					      '<li class="fileuploader-thumbnails-input" id="main-file"><div class="fileuploader-thumbnails-input-inner">+</div></li>' +
                      '</ul>' +
                  '</div>',
			item: '<li class="fileuploader-item">' +
				       '<div class="fileuploader-item-inner">' +
                           '<div class="thumbnail-holder">${image}</div>' +
                           '<div class="actions-holder">' +
                               '<a class="fileuploader-action fileuploader-action-remove" title="Remove"><i class="remove"></i></a>' +
                           '</div>' +
                       	   '<div class="progress-holder">${progressBar}</div>' +
                       '</div>' +
                   '</li>',
			item2: '<li class="fileuploader-item">' +
				       '<div class="fileuploader-item-inner">' +
                           '<div class="thumbnail-holder">${image}</div>' +
                           '<div class="actions-holder">' +
                               '<a class="fileuploader-action fileuploader-action-remove" title="Remove"><i class="remove"></i></a>' +
                           '</div>' +
                       '</div>' +
				   '</li>',
			startImageRenderer: true,
			canvasImage: false,
			_selectors: {
				list: '.fileuploader-items-list',
				item: '.fileuploader-item',
				start: '.fileuploader-action-start',
				retry: '.fileuploader-action-retry',
				remove: '.fileuploader-action-remove'
			},
			onItemShow: function(item, listEl) {
				var plusInput = listEl.find('.fileuploader-thumbnails-input');
				
				plusInput.insertAfter(item.html);
				
				if(item.format == 'image') {
					item.html.find('.fileuploader-item-icon').hide();
				}
			}
		},
		afterRender: function(listEl, parentEl, newInputEl, inputEl) {
			var plusInput = listEl.find('.fileuploader-thumbnails-input'),
				api = $.fileuploader.getInstance(inputEl.get(0));
		
			plusInput.on('click', function() {
				api.open();
			});
			if(media != '')
			{
				var data = jQuery.parseJSON(media);
				$.each(data, function(i, item) {
					if(item.media != ''){
						var img = "'"+item.media+"'";
						var ext = item.media.split('.').pop();
						var show_img = item.media+'?'+new Date().getTime();
							html_tag = '<li class="fileuploader-item file-type-image file-ext-jpg test" style="width: 23%;"><div class="fileuploader-item-inner">';
							// html_tag += '<input type="checkbox" id="iscompcard_selected"name="iscompcard_selected">';
							html_tag += '<div class="thumbnail-holder"><div class="fileuploader-item-image">';
							html_tag += '<img src="'+show_img+'" draggable="false">';
							html_tag += '</div></div>';
							
							html_tag += '<div class="actions-holder">';
								html_tag += '<a class="fileuploader-action fileuploader-action-remove remove_image" id="img_remove"'+item.id+'  title="Remove" onclick="remove_image('+item.id+', '+img+');"><i class="remove"></i></a>';
								html_tag += '<a class="fileuploader-action fileuploader-action-remove remove_image_" title="Remove"><i class="remove"><input type="hidden" name="product_image_id[]" value="'+item.id+'" ></i></a>';
							html_tag += '</div>';
							
							html_tag += '<div class="progress-holder"></div>';

							html_tag += '</div></li>'; 
						//}

						$(html_tag).insertBefore("#main-file");
					}
				});
			}
		},
    });
});