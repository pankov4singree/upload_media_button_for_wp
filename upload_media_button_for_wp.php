<?php
wp_enqueue_media();
echo '<a href="#" id="insert-my-media" class="button">Add my media</a>'; ?>
<script type="text/javascript">
    jQuery(function ($) {
        var frame;
        $(document).ready(function () {
            $('#insert-my-media').on('click', function (event) {
                event.preventDefault();
                if (frame) {
                    frame.open();
                    return;
                }
                frame = wp.media({
                    title: 'Select or Upload Media Of Your Chosen Persuasion',
                    button: {
                        text: 'Use this media'
                    },
                    library: {type: 'audio/mpeg'},
                    multiple: false  // Set to true to allow multiple files to be selected
                });

                frame.on('select', function () {
                    var selection = frame.state().get('selection');
                    selection.map(function (attachment) {
                        attachment = attachment.toJSON();
                        console.log(attachment);
                    });
                });
                frame.open();
            });
        });
    });
</script>