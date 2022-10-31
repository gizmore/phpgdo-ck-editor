"use strict";
let nodes = document.querySelectorAll('div.wysiwyg.gdt-editor-ckeditor textarea');
for (let i in nodes) {
	let node = nodes[i];
	if (node.removeAttribute) {
		createEditor(node);
		node.removeAttribute('required');
	}
}

function createEditor(node) {
	let uploadUrl = window.GDO.href('CKEditor', 'Upload');
	window.ClassicEditor.create(node, {
	    simpleUpload: {
            // The URL that the images are uploaded to.
            uploadUrl: uploadUrl,

            // Enable the XMLHttpRequest.withCredentials property.
            withCredentials: true,

            // Headers sent along with the XMLHttpRequest to the upload server.
//            headers: {
//                'X-CSRF-TOKEN': 'CSRF-Token',
//                Authorization: 'Bearer <JSON Web Token>'
//            }
        }
	
	});
}
