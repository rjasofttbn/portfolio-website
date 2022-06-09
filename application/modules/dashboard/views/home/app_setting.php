<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <h5 class="card-header"><?php echo html_escape((!empty($title) ? $title : null)) ?></h5>
            <div class="card-body">
                <?php
                echo form_open_multipart('#', 'class="form-inner"')
                ?>
                <input type="hidden" value="<?php echo $setting->id; ?>" id="id" name="id">

                <div class="form-group row">
                    <label for="title" class="col-sm-3"><?php echo display('application_title') ?> <i class="text-danger">*</i></label>
                    <div class="col-sm-9">
                        <input name="title" type="text" class="form-control" id="title" placeholder="<?php echo display('application_title') ?>" value="<?php echo html_escape($setting->title) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stname" class="col-sm-3"><?php echo "Store Name"; ?></label>
                    <div class="col-sm-9">
                        <input name="stname" type="text" class="form-control" id="stname" placeholder="<?php echo "Store Name"; ?>" value="<?php echo html_escape($setting->storename) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-sm-3"><?php echo display('address') ?></label>
                    <div class="col-sm-9">
                        <input name="address" type="text" class="form-control" id="address" placeholder="<?php echo display('address') ?>" value="<?php echo html_escape($setting->address) ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="settingemail" class="col-sm-3"><?php echo display('email') ?></label>
                    <div class="col-sm-9">
                        <input name="email" type="text" class="form-control" id="settingemail" placeholder="<?php echo display('email') ?>" value="<?php echo html_escape($setting->email) ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-sm-3"><?php echo display('phone') ?></label>
                    <div class="col-sm-9">
                        <input name="phone" type="number" class="form-control" id="phone" placeholder="<?php echo display('phone') ?>" value="<?php echo html_escape($setting->phone) ?>">
                    </div>
                </div>

                <?php if (!empty($setting->favicon)) { ?>
                    <div class="form-group row">
                        <label for="faviconPreview" class="col-sm-3"></label>
                        <div class="col-sm-9">
                            <img src="<?php echo base_url(html_escape($setting->favicon)) ?>" alt="Favicon" class="img-thumbnail" />
                        </div>
                    </div>
                <?php } ?>

                <div class="form-group row">
                    <label for="favicon" class="col-sm-3"><?php echo display('favicon') ?> </label>
                    <div class="col-sm-9">
                        <input type="file" name="favicon" id="favicon">
                        <input type="hidden" name="old_favicon" id="old_favicon" value="<?php echo html_escape($setting->favicon) ?>">
                    </div>
                </div>

                <?php if (!empty($setting->logo)) { ?>
                    <div class="form-group row">
                        <label for="logoPreview" class="col-sm-3"></label>
                        <div class="col-sm-9">
                            <img src="<?php echo base_url(html_escape($setting->logo)) ?>" alt="Picture" class="img-thumbnail" />
                        </div>
                    </div>
                <?php } ?>
                <div class="form-group row">
                    <label for="logo" class="col-sm-3"><?php echo display('backend_logo') ?><span class="text-danger">( 150×50 )</span></label>
                    <div class="col-sm-9">
                        <input type="file" name="logo" id="logo">
                        <input type="hidden" name="old_logo" id="old_logo" value="<?php echo html_escape($setting->logo) ?>">
                    </div>
                </div>
                <?php if (!empty($setting->logoTwo)) { ?>
                    <div class="form-group row">
                        <label for="logoTwoPreview" class="col-sm-3"></label>
                        <div class="col-sm-9">
                            <img src="<?php echo base_url(html_escape($setting->logoTwo)) ?>" id="logoTwoPreview" alt="Picture" class="img-thumbnail" />
                        </div>
                    </div>
                <?php } ?>
                <div class="form-group row">
                    <label for="logoTwo" class="col-sm-3"><?php echo display('website_logo'); ?><span class="text-danger f-s-12">( 150×50 )</span></label>
                    <div class="col-sm-9">
                        <input type="file" name="logoTwo" id="logoTwo">
                        <input type="hidden" name="old_logoTwo" id="old_logoTwo" value="<?php echo html_escape($setting->logoTwo) ?>">
                    </div>
                </div>
                <?php if (!empty($setting->logoThree)) { ?>
                    <div class="form-group row">
                        <label for="logoThreePreview" class="col-sm-3"></label>
                        <div class="col-sm-9">
                            <img src="<?php echo base_url(html_escape($setting->logoThree)) ?>" id="logoThreePreview" alt="Picture" class="img-thumbnail" />
                        </div>
                    </div>
                <?php } ?>
                <div class="form-group row">
                    <label for="logoThree" class="col-sm-3"><?php echo display('login_logo') ?><span class="text-danger f-s-12">( 150×50 )</span></label>
                    <div class="col-sm-9">
                        <input type="file" name="logoThree" id="logoThree">
                        <input type="hidden" name="old_logoThree" id="old_logoThree" value="<?php echo html_escape($setting->logoThree) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="currency" class="col-sm-3"><?php echo display('currency') ?></label>
                    <div class="col-sm-9">
                        <select name="currency" id="currency" class="form-control" data-placeholder="">
                            <option value="">-- select one --</option>
                            <?php foreach ($currencyList as $currency) { ?>
                                <option value="<?php echo html_escape($currency->curr_icon); ?>" <?php
                                                                                                    if ($setting->currency == $currency->curr_icon) {
                                                                                                        echo 'selected';
                                                                                                    }
                                                                                                    ?>>
                                    <?php echo html_escape($currency->currencyname); ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="currency_position" class="col-sm-3"><?php echo display('currency_position') ?></label>
                    <div class="col-sm-9">
                        <select name="currency_position" id="currency_position" class="form-control" data-placeholder="">
                            <option value="">-- select one --</option>
                            <option value="1" <?php
                                                if ($setting->currency_position == 1) {
                                                    echo 'selected';
                                                }
                                                ?>><?php echo display('left'); ?></option>
                            <option value="2" <?php
                                                if ($setting->currency_position == 2) {
                                                    echo 'selected';
                                                }
                                                ?>><?php echo display('right'); ?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="language" class="col-sm-3"><?php echo display('language') ?></label>
                    <div class="col-sm-9">
                        <?php echo form_dropdown('language', $languageList, html_escape($setting->language), 'class="form-control placeholder-single" id="language"') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="dateformat" class="col-sm-3"><?php echo display('date_format'); ?></label>
                    <div class="col-sm-9">
                        <select class="form-control placeholder-single" name="timeformat" id="dateformat">
                            <option value=""><?php echo display('date_format') ?></option>
                            <option value="d/m/Y" <?php
                                                    if ($setting->dateformat == "d/m/Y") {
                                                        echo "selected";
                                                    }
                                                    ?>>dd/mm/yyyy</option>
                            <option value="Y/m/d" <?php
                                                    if ($setting->dateformat == "Y/m/d") {
                                                        echo "selected";
                                                    }
                                                    ?>>yyyy/mm/dd</option>
                            <option value="d-m-Y" <?php
                                                    if ($setting->dateformat == "d-m-Y") {
                                                        echo "selected";
                                                    }
                                                    ?>>dd-mm-yyyy</option>
                            <option value="Y-m-d" <?php
                                                    if ($setting->dateformat == "Y-m-d") {
                                                        echo "selected";
                                                    }
                                                    ?>>yyyy-mm-dd</option>
                            <option value="m/d/Y" <?php
                                                    if ($setting->dateformat == "m/d/Y") {
                                                        echo "selected";
                                                    }
                                                    ?>>mm/dd/yyyy</option>
                            <option value="d M,Y" <?php
                                                    if ($setting->dateformat == "d M,Y") {
                                                        echo "selected";
                                                    }
                                                    ?>>dd M,yyyy</option>
                            <option value="d F,Y" <?php
                                                    if ($setting->dateformat == "d F,Y") {
                                                        echo "selected";
                                                    }
                                                    ?>>dd MM,yyyy</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="site_align" class="col-sm-3"><?php echo display('site_align') ?></label>
                    <div class="col-sm-9">
                        <?php echo form_dropdown('site_align', array('LTR' => display('left_to_right'), 'RTL' => display('right_to_left')), html_escape($setting->site_align), 'class="selectpicker placeholder-single form-control" data-live-search="true" id="site_align"') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="youtube_api_key" class="col-sm-3"><?php echo display('youtube_api_key') ?></label>
                    <div class="col-sm-8">
                        <input type="text" name="youtube_api_key" id="youtube_api_key" class="form-control" value="<?php echo html_escape($setting->youtube_api_key); ?>" placeholder="<?php echo display('youtube_api_key'); ?>">
                    </div>
                    <div class="col-sm-1">
                        <a href="https://developers.google.com/youtube/v3/getting-started" class="btn btn-success w-45" target="_new">Go</a>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="vimeo_api_key" class="col-sm-3"><?php echo display('vimeo_api_key') ?></label>
                    <div class="col-sm-8">
                        <input type="text" name="vimeo_api_key" id="vimeo_api_key" class="form-control" value="<?php echo html_escape($setting->vimeo_api_key); ?>" placeholder="<?php echo display('vimeo_api_key'); ?>">
                    </div>
                    <div class="col-sm-1">
                        <a href="https://www.youtube.com/watch?v=Wwy9aibAd54" class="btn btn-success w-45" target="_new">Go</a>
                    </div>
                </div>
                <?php if (!empty($setting->apps_logo)) { ?>
                    <div class="form-group row">
                        <label for="apps_logo" class="col-sm-3"></label>
                        <div class="col-sm-9">
                            <img src="<?php echo base_url(html_escape($setting->apps_logo)) ?>" alt="Picture" class="img-thumbnail appslogo_preview" />
                        </div>
                    </div>
                <?php } ?>
                <div class="form-group row">
                    <label for="appslogo" class="col-sm-3"><?php echo display('apps_logo') ?><span class="text-danger f-s-10">( 150×150 )</span></label>
                    <div class="col-sm-9">
                        <input type="file" name="appslogo" id="appslogo">
                        <input type="hidden" name="old_apps_logo" id="old_apps_logo" value="<?php echo html_escape($setting->apps_logo) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="apps_url" class="col-sm-3"><?php echo display('apps_url') ?></label>
                    <div class="col-sm-9">
                        <input type="text" name="apps_url" id="apps_url" class="form-control" value="<?php echo $setting->apps_url; ?>" placeholder="<?php echo display('apps_url'); ?>">
                    </div>
                </div>
                <?php if (!empty($setting->course_header_image)) { ?>
                    <div class="form-group row">
                        <label for="course_header_image" class="col-sm-3"></label>
                        <div class="col-sm-9">
                            <img src="<?php echo base_url(html_escape($setting->course_header_image)) ?>" alt="Picture" class="img-thumbnail course_header_image_preview" />
                        </div>
                    </div>
                <?php } ?>
                <div class="form-group row">
                    <label for="course_header_image" class="col-sm-3"><?php echo display('course_header_image'); ?><span class="text-danger f-s-10">( 1520×620 )</span></label>
                    <div class="col-sm-9">
                        <input type="file" name="course_header_image" id="course_header_image" class="form-control">
                        <input type="hidden" name="old_course_header_image" id="old_course_header_image" value="<?php echo html_escape($setting->course_header_image) ?>">
                    </div>
                </div>
                <?php if (!empty($setting->faculty_header_image)) { ?>
                    <div class="form-group row">
                        <label for="faculty_header_image" class="col-sm-3"></label>
                        <div class="col-sm-9">
                            <img src="<?php echo base_url(html_escape($setting->faculty_header_image)) ?>" alt="Picture" class="img-thumbnail faculty_header_image_preview" />
                        </div>
                    </div>
                <?php } ?>
                <div class="form-group row">
                    <label for="faculty_header_image" class="col-sm-3"><?php echo display('faculty_header_image'); ?><span class="text-danger f-s-10">( 1520×620 )</span></label>
                    <div class="col-sm-9">
                        <input type="file" name="faculty_header_image" id="faculty_header_image" class="form-control">
                        <input type="hidden" name="old_faculty_header_image" id="old_faculty_header_image" value="<?php echo html_escape($setting->faculty_header_image) ?>">
                    </div>
                </div>
                <?php if (!empty($setting->cart_header_image)) { ?>
                    <div class="form-group row">
                        <label for="cart_header_image" class="col-sm-3"></label>
                        <div class="col-sm-9">
                            <img src="<?php echo base_url(html_escape($setting->cart_header_image)) ?>" alt="Picture" class="img-thumbnail cart_header_image_preview" />
                        </div>
                    </div>
                <?php } ?>
                <div class="form-group row">
                    <label for="cart_header_image" class="col-sm-3"><?php echo display('cart_header_image'); ?><span class="text-danger f-s-10">( 1520×620 )</span></label>
                    <div class="col-sm-9">
                        <input type="file" name="cart_header_image" id="cart_header_image" class="form-control">
                        <input type="hidden" name="old_cart_header_image" id="old_cart_header_image" value="<?php echo html_escape($setting->cart_header_image) ?>">
                    </div>
                </div>
                <?php if (!empty($setting->checkout_header_image)) { ?>
                    <div class="form-group row">
                        <label for="checkout_header_image" class="col-sm-3"></label>
                        <div class="col-sm-9">
                            <img src="<?php echo base_url(html_escape($setting->checkout_header_image)) ?>" alt="Picture" class="img-thumbnail checkout_header_image_preview" />
                        </div>
                    </div>
                <?php } ?>
                <div class="form-group row">
                    <label for="checkout_header_image" class="col-sm-3"><?php echo display('checkout_header_image'); ?><span class="text-danger f-s-10">( 1520×620 )</span></label>
                    <div class="col-sm-9">
                        <input type="file" name="checkout_header_image" id="checkout_header_image" class="form-control">
                        <input type="hidden" name="old_checkout_header_image" id="old_checkout_header_image" value="<?php echo html_escape($setting->checkout_header_image) ?>">
                    </div>
                </div>
                <?php if (!empty($setting->profile_header_image)) { ?>
                    <div class="form-group row">
                        <label for="profile_header_image" class="col-sm-3"></label>
                        <div class="col-sm-9">
                            <img src="<?php echo base_url(html_escape($setting->profile_header_image)) ?>" alt="Picture" class="img-thumbnail profile_header_image_preview" />
                        </div>
                    </div>
                <?php } ?>
                <div class="form-group row">
                    <label for="profile_header_image" class="col-sm-3"><?php echo display('profile_header_image'); ?><span class="text-danger f-s-10">( 1520×620 )</span></label>
                    <div class="col-sm-9">
                        <input type="file" name="profile_header_image" id="profile_header_image" class="form-control">
                        <input type="hidden" name="old_profile_header_image" id="old_profile_header_image" value="<?php echo html_escape($setting->profile_header_image) ?>">
                    </div>
                </div>
                <?php if (!empty($setting->slider_backend_image)) { ?>
                    <div class="form-group row">
                        <label for="slider_backend_image" class="col-sm-3"></label>
                        <div class="col-sm-9">
                            <img src="<?php echo base_url(html_escape($setting->slider_backend_image)) ?>" alt="Picture" class="img-thumbnail slider_backend_image_preview" />
                        </div>
                    </div>
                <?php } ?>
                <div class="form-group row">
                    <label for="slider_backend_image" class="col-sm-3"><?php echo display('slider_backend_image'); ?><span class="text-danger f-s-10">( 1920×860 )</span></label>
                    <div class="col-sm-9">
                        <input type="file" name="slider_backend_image" id="slider_backend_image" class="form-control">
                        <input type="hidden" name="old_slider_backend_image" id="old_slider_backend_image" value="<?php echo html_escape($setting->slider_backend_image) ?>">
                    </div>
                </div>

                <?php if (!empty($setting->testimonial_backend_image)) { ?>
                    <div class="form-group row">
                        <label for="testimonial_backend_image" class="col-sm-3"></label>
                        <div class="col-sm-9">
                            <img src="<?php echo base_url(html_escape($setting->testimonial_backend_image)) ?>" alt="Picture" class="img-thumbnail testimonial_backend_image_preview" />
                        </div>
                    </div>
                <?php } ?>
                <div class="form-group row">
                    <label for="testimonial_backend_image" class="col-sm-3"><?php echo display('testimonial_backend_image'); ?><span class="text-danger f-s-10">( 1920×860 )</span></label>
                    <div class="col-sm-9">
                        <input type="file" name="testimonial_backend_image" id="testimonial_backend_image" class="form-control">
                        <input type="hidden" name="old_testimonial_backend_image" id="old_testimonial_backend_image" value="<?php echo html_escape($setting->testimonial_backend_image) ?>">
                    </div>
                </div>

                <?php if (!empty($setting->top_content_backend_image)) { ?>
                    <div class="form-group row">
                        <label for="top_content_backend_image" class="col-sm-3"></label>
                        <div class="col-sm-9">
                            <img src="<?php echo base_url(html_escape($setting->top_content_backend_image)) ?>" alt="Picture" class="img-thumbnail top_content_backend_image_preview" />
                        </div>
                    </div>
                <?php } ?>
                <div class="form-group row">
                    <label for="top_content_backend_image" class="col-sm-3"><?php echo display('top_content_backend_image'); ?><span class="text-danger f-s-10">( 1926×296 )</span></label>
                    <div class="col-sm-9">
                        <input type="file" name="top_content_backend_image" id="top_content_backend_image" class="form-control">
                        <input type="hidden" name="old_top_content_backend_image" id="old_top_content_backend_image" value="<?php echo html_escape($setting->top_content_backend_image) ?>">
                    </div>
                </div>

                <?php if (!empty($setting->investment_backend_image)) { ?>
                    <div class="form-group row">
                        <label for="investment_backend_image" class="col-sm-3"></label>
                        <div class="col-sm-9">
                            <img src="<?php echo base_url(html_escape($setting->investment_backend_image)) ?>" alt="Picture" class="img-thumbnail investment_backend_image_preview" />
                        </div>
                    </div>
                <?php } ?>
                <div class="form-group row">
                    <label for="investment_backend_image" class="col-sm-3"><?php echo display('investment_backend_image'); ?><span class="text-danger f-s-10">( 1920×860 )</span></label>
                    <div class="col-sm-9">
                        <input type="file" name="investment_backend_image" id="investment_backend_image" class="form-control">
                        <input type="hidden" name="old_investment_backend_image" id="old_investment_backend_image" value="<?php echo html_escape($setting->investment_backend_image) ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="timezone" class="col-sm-3"><?php echo display('timezone') ?></label>
                    <div class="col-sm-9">
                        <select name="timezone" id="timezone" class="form-control placeholder-single" required>
                            <option value=""><?php echo display('select_one'); ?></option>
                            <?php foreach (timezone_identifiers_list() as $value) { ?>
                                <option value="<?php echo html_escape($value) ?>" <?php echo html_escape((($setting->timezone == $value) ? 'selected' : null)) ?>><?php echo html_escape($value) ?></option>";
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="power_text" class="col-sm-3"><?php echo display('powered_by_text'); ?></label>
                    <div class="col-sm-9">
                        <textarea name="power_text" id="power_text" class="form-control" placeholder="<?php echo display('powered_by_text'); ?>" maxlength="140" rows="7"><?php echo html_escape($setting->powerbytxt) ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="footer_text" class="col-sm-3"><?php echo display('footer_text') ?></label>
                    <div class="col-sm-9">
                        <textarea name="footer_text" class="form-control" id="footer_text" placeholder="<?php echo display('footer_text') ?>" maxlength="140" rows="7"><?php echo html_escape($setting->footer_text) ?></textarea>
                    </div>
                </div>
                <div class="form-group offset-3 text-right">
                    <button type="button" onclick="appsetting_save()" class="btn btn-success w-md m-b-5"><?php echo display('save') ?></button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>