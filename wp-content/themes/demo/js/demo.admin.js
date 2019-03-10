jQuery(document).ready(function($){
    let mediaUploader; 
    $("#upload-button").click(function(e){
        e.preventDefault();
        if(mediaUploader){
            mediaUploader.open();
            return;
        }
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose a Profile Picture',
            button:{
                text: 'Choose picture'
            },
            multiple: false
        })
        mediaUploader.on('select', function(){
            let attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#profile-picture').val(attachment.url);
        });

        mediaUploader.open();
    });
});