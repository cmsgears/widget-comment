<?php
// Yii Imports
use cmsgears\core\common\base\Captcha;

$model				= $widget->model;
$ajax				= $widget->ajax;
$ajaxUrl			= $widget->ajaxUrl;
$controller      	= $widget->controller;
$action          	= $widget->action;
$captcha			= $widget->captcha;
$title           	= $widget->title;
$successMessage  	= $widget->successMessage;
$rating      		= $widget->rating;
$type				= $widget->type;

$user				= Yii::$app->user->getIdentity();
?>
<form id='frm-comment' class='row clearfix max-cols-100 cmt-request' cmt-controller='<?= $controller ?>' cmt-action='<?= $action ?>' action='<?= $ajaxUrl ?>'>
	<div class="spinner max-area-cover">
		<div class="valign-center cmti cmti-2x cmti-spinner-1 spin"></div>
	</div>

	<?php if( !isset( $user ) ) { ?>
	    <div class='col12x6'>
	        <div class='frm-icon-element'>
	            <i class='icon fa fa-user valign-center'></i>
	            <div class='clear-none'>
	                <input type='text' name='ModelComment[name]' placeholder='Name'>
	            </div>
	        </div>
	        <span class='error' cmt-error='name'></span>
	        <div class='frm-icon-element'>
	            <i class='icon fa fa-at valign-center'></i>
	            <div class='clear-none'>
	                <input type='text' name='ModelComment[email]' placeholder='Email'>
	            </div>
	        </div>
	        <span class='error' cmt-error='email'></span>
	    </div>
	<?php } else { ?>
	    <div class='col12x6'>
	        <div class='frm-icon-element'>
	            <i class='icon fa fa-user valign-center'></i>
	            <div class='clear-none'>
	                <input type='text' name='ModelComment[name]' placeholder='Name' value="<?=$user->username?>">
	            </div>
	        </div>
	        <span class='error' cmt-error='name'></span>
	        <div class='frm-icon-element'>
	            <i class='icon fa fa-at valign-center'></i>
	            <div class='clear-none'>
	                <input type='text' name='ModelComment[email]' placeholder='Email' value="<?=$user->email?>">
	            </div>
	        </div>
	        <span class='error' cmt-error='email'></span>
	    </div>
    <?php } ?>

    <div class='col12x6'>
        <div class='frm-icon-element'>
            <i class='icon icon-secondary fa fa-envelope-o valign-center'></i>
            <div class='clear-none'>
                <textarea name='ModelComment[content]' placeholder='Write here...'></textarea>
            </div>
        </div>
        <span class='error' cmt-error='content'></span>
    </div>

    <?php if( $widget->rating ) { ?>
	    <div class='clear'>
	        <div class='box-rating rating-secondary clearfix'>
	            <?= Yii::$app->formDesigner->getRatingStars( null, 5, true ) ?>
	        </div>
	        <input type='hidden' name='ModelComment[rating]' id='rating-count'>
	        <span class='error' cmt-error='rating'></span>
	    </div>
	<?php } ?>

	<div class='filler-height filler-height-medium'> </div>

	<?php if( !isset( $user ) ) { ?>
		<div class='clear wrap-captcha'>
			<?= Captcha::widget( [ 'name' => 'ModelComment[captcha]', 'captchaAction' =>  '/core/site/captcha', 'options' => [ 'placeholder' => 'Captcha Key*' ] ] ) ?>
			<div class="warning">Click on the captcha image to get new code.</div>
			<div class="error" cmt-error="captcha"></div>
		</div>
	<?php } ?>

	<input type='hidden' name='ModelComment[type]' value="<?=$type?>">
    <input type='submit' class='element-medium right' value="Submit">

    <div class='filler-height filler-height-medium'> </div>

    <div class='message font-size font-size-tiny'></div>
</form>
