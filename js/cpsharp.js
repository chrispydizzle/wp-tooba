jQuery(document).ready(function () {
    adjust();

    jQuery('a').click(function () {
        // return false;
    });

    jQuery('.seemorelink').click(function (){
        var candidates = jQuery(this).parent().siblings('.hideme');
        if(candidates.length > 3) {
            candidates = candidates.slice(0, 3);
        }
        else{
            jQuery(this).css('opacity', '0');
        }

        candidates.addClass('showme');
        candidates.removeClass('hideme');

        return false;
    });

    jQuery('.product').click(function(t) {
        if(jQuery(t.target).hasClass('noretrigger')) return;
        var id = jQuery(this).attr('data-id');
        var order = jQuery(this).attr('data-order');
        jQuery.post({
            url: serverhelp.ajax_url,
            data: ({
                action: "get_items", ident: id
            }),
            success: function (response){
                console.log(response);
                var result = JSON.parse(response);
                var container = jQuery('#fcont' + result[0].Item_ID);
                container.empty();
                for (var i = 0; i < result.length; i++) {
                    container.append('<a class="noretrigger" href="'+ result[i].Item_Image_URL +'" data-lightbox="Item'+ result[i].Item_ID+'">'+ result[i].Item_Image_Description+ '</a>');
                }

                var targetGuy = container.children(':first');

                targetGuy.click(function(e,t){
                    // return false;
                });

                    targetGuy.click();

                /*lightbox.option({
                    'resizeDuration': 200,
                    'wrapArount': true,
                    'imageFadeDuration': 600,
                    'showImageNumberLabel': true
                })*/
            }
        });
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

