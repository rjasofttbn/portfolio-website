<form action="" method="post">
    <div class="form-group row">
        <label for="c_media_type" class="col-sm-3 label font_bold"><?php echo display('media_type') ?> <i class="text-danger"> *</i></label>
        <div class="col-sm-9">
            <select id="media_type" class="form-control text_font" name="media_type">
                <option name="event" value="event" <?php
                                                    if ($edit_data->media_type == 'event') {
                                                        echo 'selected';
                                                    }
                                                    ?>>Event</option>
                <option name="tv_coverage" value="tv_coverage" <?php
                                                                if ($edit_data->media_type == 'tv_coverage') {
                                                                    echo 'selected';
                                                                }
                                                                ?>>TV Coverage</option>

                <option name="digital_media" value="digital_media" <?php
                                                                    if ($edit_data->media_type == 'digital_media') {
                                                                        echo 'selected';
                                                                    }
                                                                    ?>>Digital Media</option>
                <option name="print_media" value="print_media" <?php
                                                                if ($edit_data->media_type == 'print_media') {
                                                                    echo 'selected';
                                                                }
                                                                ?>>Print Media</option>
                <option name="press_realese" value="press_realese" <?php
                                                                    if ($edit_data->media_type == 'press_realese') {
                                                                        echo 'selected';
                                                                    }
                                                                    ?>>Press Realese</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="c_title" class="col-sm-3 label font_bold"><?php echo display('title') ?> <i class="text-danger"> *</i></label>
        <div class="col-sm-9">
            <input name="c_title" type="text" class="form-control text_font" id="c_title" placeholder="<?php echo display('title') ?>" value="<?php echo html_escape($edit_data->title); ?>" required>
        </div>
    </div>
    <div class="form-group row" id="link">
        <label for="c_link" class="col-sm-3 label font_bold"><?php echo display('link') ?> <i class="text-danger"> </i></label>
        <div class="col-sm-9">
            <input name="c_link" type="text" class="form-control text_font" id="c_link" placeholder="<?php echo display('link') ?>" value="<?php echo html_escape($edit_data->link); ?>">
        </div>
    </div>
    <div class="form-group row" id="description1">
        <label for="description" class="col-sm-3 label font_bold"><?php echo display('description') ?> <i class="text-danger"> </i></label>
        <div class="col-sm-9">
            <textarea name="c_description" class="form-control text_font" placeholder="<?php echo display('descriptions') ?>" id="c_description" rows="4" cols="50"><?php echo html_escape($edit_data->description); ?></textarea>
        </div>
    </div>
    <div class="form-group row" id="pic1">
        <label for="picture" class="col-sm-3 label font_bold"><?php echo display('picture') ?> </label>
        <div class="col-sm-9">
            <input name="c_picture" type="file" class="form-control" id="c_picture">
            <span class="text-danger m-t-10 f-s-10">( 152×52 )</span>
            <input type="hidden" name="old_picture" id="old_picture" value="<?php echo html_escape($edit_data->picture) ?>">
            <?php if ($edit_data->picture) { ?>
                <div class="img_border">
                    <img src="<?php echo base_url(html_escape($edit_data->picture)); ?>" alt="<?php echo html_escape($edit_data->title); ?>" width="25%">
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12 div_padding">
            <input type="hidden" name="media_id" value="<?php echo html_escape($edit_data->media_id); ?>">
            <button type="button" class="btn btn-success w-md m-b-5 font_bold text-white " onclick="media_infoupdate('<?php echo html_escape($edit_data->media_id) ?>')"><?php echo display('update') ?></button>
        </div>
    </div>
</form>
<script src="<?php echo base_url('assets/plugins/ckeditor/ckeditor.active.js'); ?>"></script>
<script src="<?php echo base_url('application/modules/dashboard/assets/js/media.js') ?>"></script>

<script>
    $(document).ready(function() {
        $('#media_type').on('change', function() {
            if (this.value == 'event') {
                $('#link').hide();
                $('#pic1').show();
                $('#description1').show();
            } else if (this.value == 'tv_coverage') {
                $('#link').show();
                $('#description1').hide();
            } else if (this.value == 'digital_media') {
                $('#link').hide();
                $('#description1').hide();
                $('#description1').show();
            } else if (this.value == 'print_media') {
                $('#link').hide();
                $('#description1').hide();
                $('#pic1').show();
            } else if (this.value == 'press_realese') {
                $('#link').hide();
                $('#pic1').hide();
                $('#description1').show();
            }
        });
    });
</script>