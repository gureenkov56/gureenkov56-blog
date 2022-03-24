document.addEventListener('DOMContentLoaded', () => {
	const editor = document.getElementById('editor'),
	addElementSpan = document.querySelectorAll('#addElement > span');

	console.log(editor);

	addElementSpan.forEach(span => {
		span.addEventListener('click', () => {
			const newElement = span.dataset.element;
			let nodeEl = document.createElement(newElement);
			nodeEl.setAttribute('contenteditable', true);
			nodeEl.setAttribute('title', newElement);

			editor.appendChild(nodeEl);
		})
	});



});