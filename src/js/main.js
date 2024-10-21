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
});