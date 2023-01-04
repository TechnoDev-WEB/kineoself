(function($) {

    jQuery('body').trigger('post-load');

    $(document).ready(function() {

        /**
         * Submit Search Form on click
         */
        let search_submit = $("form .input-group-addon");
        if (search_submit.length != 0) {
            search_submit.on("click", function() {
                $(this).closest("form").submit();
            });
        }

    });

    // $(document).ready(function(){

    // });

    /* Validation Events for changing response CSS classes */
    document.addEventListener('wpcf7invalid', function(event) {
        $('.wpcf7-response-output').addClass('alert alert-danger');
    }, false);
    document.addEventListener('wpcf7spam', function(event) {
        $('.wpcf7-response-output').addClass('alert alert-warning');
    }, false);
    document.addEventListener('wpcf7mailfailed', function(event) {
        $('.wpcf7-response-output').addClass('alert alert-warning');
    }, false);
    document.addEventListener('wpcf7mailsent', function(event) {
        $('.wpcf7-response-output').addClass('alert alert-success');
    }, false);

    $('.card-title > a').click(function(event) {
        console.log("Work");
        event.preventDefault();
        return false;

    });

    $('.card-title').click(function(event) {
        console.log("Worksss");
        event.preventDefault();
        return false;
    });

}(jQuery))