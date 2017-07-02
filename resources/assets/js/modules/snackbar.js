/**
 * Snackbar is the notification function to display quick notifications on the site.
 *
 * @param message
 */
window.showSnackBar = (message) => {
    let snackbar;
    snackbar = document.getElementById("snackbar");
    snackbar.className = "show";
    snackbar.innerHTML = message;
    setTimeout(function(){ snackbar.className = snackbar.className.replace("show", ""); }, 3000);
};