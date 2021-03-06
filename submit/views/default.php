<?php
// CMG Imports
use cmsgears\core\common\base\Captcha;

$model			= $widget->model;
$captcha		= $widget->captcha;
$title			= $widget->title;
$success		= $widget->success;
$rating			= $widget->rating;
$ratingClass	= $widget->ratingClass;

$user = Yii::$app->core->getUser();

$ajaxUrl		= $widget->ajaxUrl;
$cmtApp			= $widget->cmtApp;
$cmtController	= $widget->cmtController;
$cmtAction		= $widget->cmtAction;
?>
<form class="form row max-cols-100" cmt-app="<?= $cmtApp ?>" cmt-controller="<?= $cmtController ?>" cmt-action="<?= $cmtAction ?>" action="<?= $ajaxUrl ?>">
	<div class="max-area-cover spinner">
		<div class="valign-center cmti cmti-2x cmti-spinner-1 spin"></div>
	</div>
	<?php if( empty( $user ) ) { ?>
	    <div class="col col12x6">
	        <div class="frm-icon-element">
	            <i class="icon fa fa-user"></i>
	            <input type="text" name="Comment[name]" placeholder="Name" />
	        </div>
	        <span class="error" cmt-error="name"></span>
	        <div class="frm-icon-element">
	            <i class="icon fa fa-at"></i>
	            <input type="text" name="Comment[email]" placeholder="Email" />
	        </div>
	        <span class="error" cmt-error="email"></span>
	    </div>
	<?php } else { ?>
	    <div class="col col12x6">
	        <div class="frm-icon-element">
	            <i class="icon fa fa-user"></i>
				<input type="text" name="Comment[name]" placeholder="Name" value="<?= $user->getName() ?>" readonly="" />
	        </div>
	        <span class="error" cmt-error="name"></span>
	        <div class="frm-icon-element">
	            <i class="icon fa fa-at"></i>
	            <input type="text" name="Comment[email]" placeholder="Email" value="<?= $user->email ?>" readonly="" />
	        </div>
	        <span class="error" cmt-error="email"></span>
	    </div>
    <?php } ?>
    <div class="col col12x6">
		<div class="frm-icon-element">
			<i class="icon fa fa-envelope-o"></i>
			<textarea name="Comment[content]" placeholder="Write here..."></textarea>
			<span class="error" cmt-error="content"></span>
		</div>
    </div>
    <?php if( $widget->rating ) { ?>
	    <div class="clear">
			<?= Yii::$app->formDesigner->getRatingField(
				[ 'modelName' => 'Comment', 'fieldName' => 'rating', 'class' => $ratingClass ]
			)?>
			<span class="error" cmt-error="rating"></span>
	    </div>
	<?php } ?>
	<div class="filler-height filler-height-medium"></div>
	<?php if( !isset( $user ) ) { ?>
		<div class="clear captcha-wrap">
			<?= Captcha::widget( [ 'name' => 'Comment[captcha]', 'captchaAction' =>  '/core/site/captcha', 'options' => [ 'placeholder' => 'Captcha Key*' ] ] ) ?>
			<div class="warning">Click on the captcha image to get new code.</div>
			<div class="error" cmt-error="captcha"></div>
		</div>
	<?php } ?>
    <input type="submit" class="frm-element-medium right" value="Submit" />

    <div class="filler-height"></div>

	<div class="message success"></div>
	<div class="message warning"></div>
	<div class="message error"></div>
	<div class="filler-height"> </div>
</form>
