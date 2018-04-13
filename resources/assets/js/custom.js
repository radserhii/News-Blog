import axios from "axios/index";

axios.get('/api/styles')
    .then(response => {
        console.log(response.data.styles);
        $('body').css('background-color', response.data.styles.body);
        $('.navbar-laravel').css('background-color', response.data.styles.navbar);

    })
    .catch(error => {
        console.log(error);
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

    // axios.get('/api/styles')
    //     .then(response => {
    //         console.log(response.data.styles);
    //         $('body').css('background-color', response.data.styles.body);
    //         $('.navbar-laravel').css('background-color', response.data.styles.navbar);
    //
    //     })
    //     .catch(error => {
    //         console.log(error);
    //     })
    // $('body').css('background-color', '#ffffff');
    // $('.navbar-laravel').css('background-color', 'red');
});


