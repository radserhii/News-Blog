import axios from "axios/index";

axios.get('/api/styles')
    .then(response => {
        $('body').css('background-color', response.data.styles.body);
        $('.navbar-laravel').css('background-color', response.data.styles.navbar);

    })
    .catch(error => {
        console.log(error);
    });

$('._card').hover(function () {
        $('._price', this).css({'color': 'green', 'font-weight': 'bold', 'font-size': '90%'});
        $("._discount", this).fadeIn(1000);
    },
    function () {
        $('._price', this).css({'color': '', 'font-weight': 'normal', 'font-size': '100%'});
        $("._discount", this).fadeOut(1000);
    });

window.onbeforeunload = function () {
    return "You're leaving the site.";
};
$(document).ready(function () {
    $('a').click(function () {
        window.onbeforeunload = null;
    });
    $('button').click(function () {
        window.onbeforeunload = null;
    });
    $('form').submit(function () {
        window.onbeforeunload = null;
    });
});


