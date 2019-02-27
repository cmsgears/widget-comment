<?php
$model			= $widget->model;
$ajax			= $widget->ajax;
$ajaxUrl		= $widget->ajaxUrl;
$controller     = $widget->controller;
$action         = $widget->action;
$captcha		= $widget->captcha;
$title          = $widget->title;
$successMessage	= $widget->successMessage;
$rating      	= $widget->rating;
?>
<div id="popup-testimonial" class="popup">
    <div class="popup-bkg-filler"></div>
    <div class="popup-data popup-data-small">
        <span class="popup-close cmti cmti-close-c popup-close"></span>
        <div class="popup-wrap-title">
            <span class="popup-title-text"><?= $title ?></span>
        </div>
        <div class="popup-elements align align-center">
            <div class="content content-90">
                <div class="form cmt-request" cmt-controller="<?= $controller ?>" cmt-action="<?= $action ?>" action="<?= $ajaxUrl ?>">
					<div class="spinner max-area-cover">
						<div class="valign-center cmti cmti-2x cmti-spinner-1 spin"></div>
					</div>
                    <textarea placeholder="Write here." name="ModelComment[content]"></textarea>
                    <div>
                        <span class='error' cmt-error='content'></span>
                    </div>
                    <a class="btn btn-medium cmt-click">SUBMIT</a>
                 </div>
                 <div class="message hidden-primary">
                     <h6><?= $widget->successMessage ?></h6>
                 </div>
            </div>
        </div>
    </div>
</div>
