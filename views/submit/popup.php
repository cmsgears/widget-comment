<?php $user = Yii::$app->user->getIdentity() ?>
<div id="popup-testimonial" class="popup">
    <div class="popup-bkg-filler"></div>
    <div class="popup-data popup-data-small">
        <span class="popup-close cmti cmti-close-c popup-close"></span>
        <div class="popup-wrap-title">
            <span class="popup-title-text"><?= $widget->title ?></span>
        </div>
        <div class="popup-elements align align-center">
            <div class="content content-90">
                <div class="form cmt-request" cmt-controller="<?= $widget->controller ?>" cmt-action="<?= $widget->action ?>" action="<?= $widget->ajaxUrl ?>">
                    <textarea placeholder="Write here." name="ModelComment[content]"></textarea>
                    <div>
                        <span class='error' cmt-error='content'></span>
                    </div>
                    <?php if( isset( $user ) ) { ?>
                        <input type="hidden" name="ModelComment[name]" value="<?= $user->name ?>">
                        <input type="hidden" name="ModelComment[email]" value="<?= $user->email ?>">
                        <input type="hidden" name="ModelComment[rating]" value="<?=$widget->rating?>">
                        <input type="hidden" name="ModelComment[parentId]" value="<?= $widget->parentId ?>">
                        <input type="hidden" name="ModelComment[parentType]" value="<?= $widget->parentType ?>">
                        <input type="hidden" name="ModelComment[type]" value="<?= $widget->type ?>">
                    <?php } ?>
                    <a class="btn btn-medium cmt-click">SUBMIT</a>
                 </div>
                 <div class="message hidden-primary">
                     <h6><?= $widget->successMessage ?></h6>
                 </div>
            </div>
        </div>
    </div>
</div>