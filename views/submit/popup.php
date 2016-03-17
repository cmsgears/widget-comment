<?php $user = Yii::$app->user->getIdentity() ?>
<div id="popup-testimonial" class="popup">
    <div class="popup-bkg-filler"></div>
    <div class="popup-data popup-data-small">
        <span class="popup-close cmti cmti-close-c popup-close"></span>
        <div class="popup-wrap-title">
            <span class="popup-title-text"><?=$title?></span>
        </div>
        <div class="popup-elements align align-center">
            <div class="content content-90">
                <div class="form cmt-request" cmt-controller="<?=$controller?>" cmt-action="<?=$action?>" action="<?=$url?>" cmt-keep>
                    <textarea placeholder="Write here." name="ModelComment[content]"></textarea>
                    <div>
                        <span class='error' cmt-error='content'></span>
                    </div>
                    <?php if( isset( $user ) ) { ?>
                        <input type="hidden" name="ModelComment[name]" value="<?= $name ?>">
                        <input type="hidden" name="ModelComment[email]" value="<?= $email ?>">
                        <input type="hidden" name="ModelComment[rating]" value="<?=$rating?>">
                        <input type="hidden" name="ModelComment[parentId]" value="<?= $parentId ?>">
                        <input type="hidden" name="ModelComment[parentType]" value="<?= $parentType ?>">
                        <input type="hidden" name="ModelComment[type]" value="<?= $type ?>">
                    <?php } ?>
                    <a class="btn btn-medium cmt-click">SUBMIT</a>
                 </div>
                 <div class="message hidden-primary">
                     <h6><?=$successMessage?></h6>
                 </div>
            </div>
        </div>
    </div>
</div>