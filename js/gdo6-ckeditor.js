"use strict";
$(function() {
	var nodes = document.querySelectorAll('textarea.wysiwyg');
	var len = nodes.length;
	var i = 0;
	for (i = 0; i < len; i++) {
		$(nodes[i]).removeAttr('required');
		ClassicEditor.create(nodes[i], {
			alignment: {
				options: ['left', 'right', 'center']
			},
			toolbar: ['Heading', 'alignment', 'Indent', 'Outdent', '|', 
				'FontColor', 'FontBackgroundColor', 'FontSize', '|',
				'Italic', 'Bold', 'Underline', 'Strikethrough', 'Subscript', 'Superscript',
				'Highlight', 'HorizontalLine', '|',
				'SpecialCharacters', '|', 
				'bulletedList', 'numberedList', '|',
				'insertTable', '|',
				'ImageUpload', 'ImageInsert', 'MediaEmbed', 'HtmlEmbed', 'Link', 'Code', 'CodeBlock', '|',
				],
//			ckfinder: {
//				uploadUrl: 'index.php?mo=CKEditor&me=Upload&command=QuickUpload&type=Images&responseType=json'
//			},
	        simpleUpload: {
				uploadUrl: 'index.php?mo=CKEditor&me=Upload&_ajax=1&_fmt=json',
	            withCredentials: true,
			},
			image: {
				toolbar: [
					'imageStyle:full',
					'imageStyle:side',
					'|',
					'imageTextAlternative'
				]
			},
	        table: {
	            contentToolbar: [
	                'tableColumn', 'tableRow', 'mergeTableCells',
	                'tableProperties', 'tableCellProperties'
	            ],
	            tableProperties: {
	            },
	            tableCellProperties: {
	            }
	        }
	 		
		}).
		then(function(editor){
		}).
		catch(function(err){
			console.error(err);
		});
	}
});
