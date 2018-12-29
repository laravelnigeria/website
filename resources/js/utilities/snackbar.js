/**
 * Snackbar is the notification function to display quick notifications on the site.
 *
 * @param message
 */
export default (message, type = 'error') => {
    let snackbar = document.getElementById('snackbar');
    snackbar.innerHTML = message;
    snackbar.className = `show ${type}`;
    setTimeout(() => (snackbar.className = snackbar.className.replace(`show ${type}`, '')), 3000);
};
