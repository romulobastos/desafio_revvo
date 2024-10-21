// custom scripts
document.addEventListener("DOMContentLoaded", function() {
	// is the first access
	if (!localStorage.getItem("homeModal")) {
		// show modal
		var myModal = new bootstrap.Modal(document.getElementById('popupModal'), {
			backdrop: 'static',
			keyboard: false
		});
		myModal.show();
		
		// save access in localstorage
		localStorage.setItem("homeModal", "true");
	}

	// tooltip
	const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
	const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

	// delete confirmation
	if (document.getElementById('deleteCourseModal')) {
		var deleteModal = document.getElementById('deleteCourseModal');
		deleteModal.addEventListener('show.bs.modal', function (event) {
			// pressed button and course id
			var button = event.relatedTarget;
			var courseId = button.getAttribute('data-id');
			// confirm button and define id
			var confirmDelete = document.getElementById('confirmDelete');
			confirmDelete.href = "?action=delete&id=" + courseId;
		});
	}
  
});

// generate slug
function generateSlug() {
	const title = document.getElementById('title').value;
	let slug = title.toLowerCase();
	// remove special chars
	slug = slug.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
	// remove alphanumerics (keep hifens)
	slug = slug.replace(/[^\w\s-]/g, '');
	// replace blank spaces and underscore
	slug = slug.trim().replace(/\s+/g, '-').replace(/_+/g, '-');
	document.getElementById('slug').value = slug;
}