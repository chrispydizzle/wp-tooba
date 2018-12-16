jQuery(document).ready(function () {
    adjust();

    jQuery('a').click(function () {
        return false;
    });

    jQuery('.seemorelink').click(function (){
        var candidates = jQuery(this).parent().siblings('.hideme');
        if(candidates.length > 3) {
            candidates = candidates.slice(0, 3);
        }
        else{
            jQuery(this).css('opacitygit', '0');
        }

        candidates.addClass('showme');
        candidates.removeClass('hideme');

        return false;
    });

    jQuery('.product').click(function() {
        console.log(jQuery(this).attr('data-id'));
        console.log(jQuery(this).attr('data-order'));
    })
});

jQuery(document).resize(function () {
    adjust();
});

function adjust(){
    let tid = jQuery('.stretchto');
    for (let i = 0; i < tid.length; i++) {
        let titem = jQuery(tid[i]);
        let t = jQuery('#' + titem.attr('target'));
        let theight = t.height();
        titem.height(theight);
        t.parent().height(theight);

    }
}

