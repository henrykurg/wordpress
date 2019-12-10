function YrmBackendPro() {
    this.init();
}

YrmBackendPro.prototype.init = function () {
    this.buttonIconChange();
    this.removeChangedIcon();
    this.changeHidenContentFontSize();
    this.changeInnerContentWidth();
};

YrmBackendPro.prototype.changeInnerContentWidth = function() {
    var fontSize = jQuery('#hidden-inner-width');

    if(!fontSize.length) {
        return false;
    }

    fontSize.change(function () {
       var val = jQuery(this).val();
       jQuery('.yrm-inner-content-wrapper').css({'width': val});
    });
};

YrmBackendPro.prototype.changeHidenContentFontSize = function() {
    var fontSize = jQuery('#hidden-content-font-size');

    if(!fontSize.length) {
        return false;
    }

    fontSize.change(function () {
       var val = jQuery(this).val()+'px';
       jQuery('.yrm-inner-content-wrapper').css({'font-size': val});
    });
};

YrmBackendPro.prototype.removeChangedIcon = function() {
    var removeButton = jQuery('#js-button-upload-image-remove-button');

    if(!removeButton.length) {
        return false;
    }

    removeButton.bind('click', function () {
        var buttonIcon = jQuery('#yrm-button-icon');
        var defaultUrl = buttonIcon.attr('data-default-url');

        jQuery('.yrm-icon-container-preview').css({'background-image': 'url("' + defaultUrl+ '") !important'});
        jQuery('.yrm-arrow-img').css({'background-image': 'url("' + defaultUrl+ '") !important;'});
        jQuery('.yrm-remove-changed-image-wrapper').addClass('yrm-hide');
        buttonIcon.val(defaultUrl);
    });
};

YrmBackendPro.prototype.buttonIconChange = function() {
    var supportedImageTypes = ['image/bmp', 'image/png', 'image/jpeg', 'image/jpg', 'image/ico', 'image/gif'];
    var custom_uploader;
    jQuery('#js-button-upload-image-button').click(function(e) {
        e.preventDefault();

        /* Extend the wp.media object */
        custom_uploader = wp.media.frames.file_frame = wp.media({
            titleFF: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false,
            library: {
                type: 'image'
            }
        });
        /* When a file is selected, grab the URL and set it as the text field's value */
        custom_uploader.on('select', function () {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            if (supportedImageTypes.indexOf(attachment.mime) === -1) {
                alert(SGPB_JS_LOCALIZATION.imageSupportAlertMessage);
                return;
            }
            jQuery('.yrm-icon-container-preview').css({'background-image': 'url("' + attachment.url + '")'});
            jQuery('.yrm-arrow-img').css({'background-image': 'url("' + attachment.url + '")'});
            jQuery('.yrm-remove-changed-image-wrapper').removeClass('yrm-hide');
            jQuery('#yrm-button-icon').val(attachment.url);
        });
        /* If the uploader object has already been created, reopen the dialog */
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
    });
};

jQuery(document).ready(function () {
   new  YrmBackendPro();
});