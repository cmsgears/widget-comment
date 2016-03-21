<form id='frm-comment' class='row clearfix max-cols-100 cmt-request' cmt-controller='<?= $controller ?>' cmt-action='<?= $action ?>' action='<?= $ajaxUrl ?>'>
	<div class="spinner max-area-cover">
		<div class="valign-center cmti cmti-2x cmti-spinner-1 spin"></div>
	</div>
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
    <div class='col12x6'>
        <div class='frm-icon-element'>
            <i class='icon icon-secondary fa fa-envelope-o valign-center'></i>
            <div class='clear-none'>
                <textarea name='ModelComment[content]' placeholder='Write here...'></textarea>
            </div> 
        </div>
    </div>
    <?php if( $rating ) { ?>
	    <div class='clear'>
	        <div class='box-rating rating-secondary clearfix'>
	            <?= Yii::$app->formDesigner->getRatingStars( null, 5, true ) ?>
	        </div>
	        <input type='hidden' name='ModelComment[rating]' id='rating-count'>
	        <span class='error' cmt-error='rating'></span> 
	    </div>
	<?php } ?>
    <input type='hidden' name='ModelComment[parentId]' value='<?= $parentId ?>'>
    <input type='hidden' name='parentSlug' value='<?= $parentSlug ?>'>
    <input type='hidden' name='ModelComment[parentType]' value='<?= $parentType ?>'>
    <input type='hidden' name='ModelComment[type]' value='<?= $type ?>'>
    <input type='submit' class='element-medium right' value="Submit">  
    <div class='filler-height filler-height-medium'> </div>
    <div class='message font-size font-size-tiny'></div>
</form>