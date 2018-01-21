<?php
// Yii Imports
use cmsgears\core\common\base\Captcha;

$model		= $widget->model;
$captcha	= $widget->captcha;
$title		= $widget->title;
$success	= $widget->success;
$rating		= $widget->rating;
$type		= $widget->type;

$user		= Yii::$app->user->getIdentity();

$ajaxUrl		= $widget->ajaxUrl;
$cmtApp			= $widget->cmtApp;
$cmtController	= $widget->cmtController;
$cmtAction		= $widget->cmtAction;
?>
<form id="frm-comment" class="form row max-cols-100" cmt-app="<?= $cmtApp ?>" cmt-controller="<?= $cmtController ?>" cmt-action="<?= $cmtAction ?>" action="<?= $ajaxUrl ?>">
	<div class="max-area-cover spinner">
		<div class="valign-center cmti cmti-2x cmti-spinner-1 spin"></div>
	</div>

	<?php if( !isset( $user ) ) { ?>
	    <div class="col col12x6">
	        <div class="frm-icon-element">
	            <i class="icon fa fa-user"></i>
	            <input type="text" name="ModelComment[name]" placeholder="Name" />
	        </div>
	        <span class="error" cmt-error="name"></span>
	        <div class="frm-icon-element">
	            <i class="icon fa fa-at"></i>
	            <input type="text" name="ModelComment[email]" placeholder="Email" />
	        </div>
	        <span class="error" cmt-error="email"></span>
	    </div>
	<?php } else { ?>
	    <div class="col col12x6">
	        <div class="frm-icon-element">
	            <i class="icon fa fa-user"></i>
	            <input type="text" name="ModelComment[name]" placeholder="Name" value="<?= $user->username ?>" />
	        </div>
	        <span class="error" cmt-error="name"></span>
	        <div class="frm-icon-element">
	            <i class="icon fa fa-at"></i>
	            <input type="text" name="ModelComment[email]" placeholder="Email" value="<?= $user->email ?>" />
	        </div>
	        <span class="error" cmt-error="email"></span>
	    </div>
    <?php } ?>

    <div class="col col12x6">
		<div class="frm-icon-element">
			<i class="icon fa fa-envelope-o"></i>
			<textarea name="ModelComment[content]" placeholder="Write here..."></textarea>
			<span class="error" cmt-error="content"></span>
		</div>
    </div>

    <?php if( $widget->rating ) { ?>
	    <div class="clear">
	        <div class="box-rating rating-secondary clearfix">
	            <?= Yii::$app->formDesigner->getRatingStars( null, 5, true ) ?>
	        </div>
			<input id="rating-count" type="hidden" name="ModelComment[rating]" />
			<span class="error" cmt-error="rating"></span>
	    </div>
	<?php } ?>

	<div class="filler-height filler-height-medium"></div>

	<?php if( !isset( $user ) ) { ?>
		<div class="clear captcha-wrap">
			<?= Captcha::widget( [ 'name' => 'ModelComment[captcha]', 'captchaAction' =>  '/core/site/captcha', 'options' => [ 'placeholder' => 'Captcha Key*' ] ] ) ?>
			<div class="warning">Click on the captcha image to get new code.</div>
			<div class="error" cmt-error="captcha"></div>
		</div>
	<?php } ?>

	<input type="hidden" name='ModelComment[type]' value="<?=$type?>">
    <input type="submit" class='element-medium right' value="Submit">

    <div class="filler-height"></div>
	<div class="message success"></div>
	<div class="message warning"></div>
	<div class="message error"></div>
	<div class="filler-height"> </div>
</form>
