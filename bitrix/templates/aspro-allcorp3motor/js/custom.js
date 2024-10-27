$(function() {
    let headerPhonesToggle = $('.header-top-contacts-toggle');
    if (headerPhonesToggle.length) {
        let headerPhonesContainer = $('.header-top-contacts');

        headerPhonesToggle.on('click', function() {
            headerPhonesToggle.toggleClass('header-top-contacts-toggle--active');
        });

        $('body').on('click', function(e) {
            if (
                !headerPhonesToggle.is(e.target) &&
                headerPhonesToggle.has(e.target).length === 0 &&
                !headerPhonesContainer.is(e.target) &&
                headerPhonesContainer.has(e.target).length === 0
            ) {
                headerPhonesToggle.removeClass('header-top-contacts-toggle--active');
            }
        });
    }
});