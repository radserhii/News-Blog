window.onbeforeunload = function() {
    return "You're leaving the site.";
};
$(document).ready(function() {
    $('a[rel!=ext]').click(function() { window.onbeforeunload = null; });
    $('form').submit(function() { window.onbeforeunload = null; });
});