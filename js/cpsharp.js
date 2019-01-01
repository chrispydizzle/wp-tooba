var allowsubmit = true;

jQuery(document).ready(function () {
    adjust();
    setInterval(toggleScrollButton, 100);
    var form = jQuery('#quotation');
    form.submit(function (e) {
        console.log(e);

        var contactusform = jQuery('#contactus');
        var submitbutton = jQuery('#quotation').find('button');

        if (allowsubmit) {
            allowsubmit = false;
            TweenMax.to(contactusform, .25, {opacity: ".25", ease: Power2.easeOut});
        } else {
            return false;
        }

        jQuery.post({
            url: serverhelp.ajax_url,
            data: ({
                action: "contact_form", name: jQuery('#name').val(),
                email: jQuery('#email').val(), address: jQuery('#address').val(),
                phone: jQuery('#phone').val(),
                message: jQuery('#message').val()
            }),
            success: function (response) {
                allowsubmit = true;
                TweenMax.to(contactusform, 1, {opacity: "0", ease: Power2.easeOut});
                alert('Thanks, your message has been sent!');
            },
            error: function (response) {
                allowsubmit = true;
                TweenMax.to(contactusform, 1, {opacity: ".5", ease: Power2.easeOut});
            },
        });

        return false;
    });


    jQuery('.portfolio-post').on('mouseover touchstart', function (f) {
        var popoutTarget = jQuery(this).find('.popoutcontainer');
        var h4target = jQuery(this).find('h4');
        var boxtarget = jQuery(this).find('.hover-box');
        TweenMax.to(popoutTarget, .5, {bottom: '60px', ease: Power2.easeInOut});
        TweenMax.to(h4target, .5, {top: '40px', ease: Power2.easeInOut});
        TweenMax.to(boxtarget, .5, {opacity: '.9', ease: Power2.easeInOut});
    }).on('mouseleave touchend', function (f) {
        var popoutTarget = jQuery(this).find('.popoutcontainer');
        var h4target = jQuery(this).find('h4');
        var boxtarget = jQuery(this).find('.hover-box');

        TweenMax.to(popoutTarget, .25, {bottom: '100%', ease: Power2.easeInOut});
        TweenMax.to(h4target, .25, {top: '100%', ease: Power2.easeInOut});
        TweenMax.to(boxtarget, .25, {opacity: '0', ease: Power2.easeInOut});
    });

    jQuery('.lb-outerContainer').touchwipe({
        wipeLeft: function () {
            jQuery('.lb-next').click();
        },
        wipeRight: function () {
            jQuery('.lb-prev').click();
        },
        min_move_x: 20,
        min_move_y: 20,
        preventDefaultEvents: true
    });

    jQuery('#top').click(function () {
        TweenMax.to(window, 2, {scrollTo: {y: 0, autoKill: true}, ease: Power2.easeInOut});
    });

    jQuery('a').click(function () {
        const link = jQuery(this);
        if (link.parents('#top-menu').length > 0) {
            let anchor = link.attr('href');
            if (anchor.startsWith('#')) {
                anchor = anchor.substring(1);
                const location = jQuery("[data-anchor='" + anchor + "'");
                const position = location.offset().top;
                TweenMax.to(window, 2, {scrollTo: {y: position, autoKill: true}, ease: Power2.easeInOut});
                return false;
            }
        }
    });

    jQuery('.seemorelink').click(function () {
        let candidates = jQuery(this).parent().siblings('.hideme');
        if (candidates.length > 3) {
            candidates = candidates.slice(0, 3);
        } else {
            jQuery(this).css('opacity', '0');
        }

        candidates.addClass('showme');
        candidates.removeClass('hideme');

        return false;
    });

    jQuery('.product').click(function (t) {
        if (jQuery(t.target).hasClass('noretrigger')) return;
        const id = jQuery(this).attr('data-id');
        const order = jQuery(this).attr('data-order');
        const desc = jQuery(this).attr('data-description');
        jQuery.post({
            url: serverhelp.ajax_url,
            data: ({
                action: "get_items", ident: id, datadescription: desc
            }),
            success: function (response) {
                handleResponse(response);
            }
        });
    })
});

jQuery(document).resize(function () {
    adjust();
});


function submitform(f) {
    var contactusform = jQuery('#contactus');
    var submitbutton = jQuery('#quotation').find('button');

    if (allowsubmit) {
        allowsubmit = false;
        TweenMax.to(contactusform, .25, {opacity: ".25", ease: Power2.easeOut});
    } else {
        return false;
    }

    jQuery.post({
        url: serverhelp.ajax_url,
        data: ({
            action: "contact_form", name: jQuery('#name').val(),
            email: jQuery('#email').val(), address: jQuery('#address').val(),
            phone: jQuery('#phone').val(),
            message: jQuery('#message').val()
        }),
        success: function (response) {
            allowsubmit = true;
            TweenMax.to(contactusform, 1, {opacity: "0", ease: Power2.easeOut});
            alert('Thanks, your message has been sent!');
        },
        error: function (response) {
            allowsubmit = true;
            TweenMax.to(contactusform, 1, {opacity: ".5", ease: Power2.easeOut});
        },
    });

    return false;
}

function handleResponse(response) {
    console.log(response);
    const result = JSON.parse(response);
    const container = jQuery('#fcont' + result[0].Item_ID);
    const description = container.parent().parent().parent().parent().attr('data-description');
    container.empty();
    for (let i = 0; i < result.length; i++) {
        container.append('<a class="noretrigger" href="' + result[i].Item_Image_URL + '" data-title="' + description + '" data-lightbox="Item' + result[i].Item_ID + '">' + result[i].Item_Image_Description + '</a>');
    }

    const targetGuy = container.children(':first');

    targetGuy.click(function (e, t) {

    });

    targetGuy.click();
}

function adjust() {
    let tid = jQuery('.stretchto');
    for (let i = 0; i < tid.length; i++) {
        let titem = jQuery(tid[i]);
        let t = jQuery('#' + titem.attr('target'));
        let theight = t.height() + 40;
        let oheight = titem.height() + 40;
        theight = theight > oheight ? theight : oheight;
        titem.height(theight);
        t.height(theight);
        if (jQuery(window).width() < 769) {
            t.parent().height(theight * 2);
        } else {
            t.parent().height(theight);
        }
    }

    /*var hBoxes = jQuery('.inner-hover');
    for (var i = 0; i < hBoxes.length; i++) {
        var boxText = jQuery(hBoxes[i]).children('h4');
        var parentBox = jQuery(hBoxes[i]).parents('.hover-box');
        boxText.css('line-height', parentBox.height() + 'px');
        boxText.css('height', parentBox.height() + 'px');
        console.log(boxText.text() + '|' + parentBox.height());
    }*/
}

function toggleScrollButton() {
    var topbutton = jQuery('#top');

    var scrolltop = jQuery(window).scrollTop();
    var buttonstate = topbutton.attr('shown');

    if (scrolltop >= 150 && buttonstate === 'false') {
        TweenMax.to(topbutton, .5, {bottom: "2vh", opacity: ".75", ease: Power2.easeIn});
        topbutton.attr('shown', 'true');
    } else if (scrolltop < 150 && buttonstate === 'true') {
        TweenMax.to(topbutton, .5, {bottom: "-6vh", opacity: "0", ease: Power2.easeIn});
        topbutton.attr('shown', 'false');
    }
}