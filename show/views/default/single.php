<?php
// Yii Imports
use yii\helpers\Html;

// CMG Imports
use cmsgears\core\common\utilities\DateUtil;
use cmsgears\core\common\utilities\CodeGenUtil;

$rating			= $model->rating;
$commentDate	= DateUtil::getDateFromDateTime( $model->createdAt );
$avatar			= Yii::getAlias( "@images" ).'/user-icon-2.png';

if( isset( $model->creator->avatar ) ) {

	$avatar = CodeGenUtil::getImageThumbTag( $model->creator->avatar, [ 'class' => 'fluid circled1' ] );
}
else {

	$avatar = "<img class=\"fluid circled circled1\" src=\"{$avatar}\">";
}

?>
<div <?= Html::renderTagAttributes( $widget->modelOptions ) ?>>
	<div class="col12x2">
		<?=$avatar?>
		<p class="text bold italic font-size font-size-small align align-center"> <?= ucfirst( $model->name ) ?> </p>
	</div>
	<div class="col12x10">
	   <div class="review clearfix">
            <div class="box-rating rating-secondary">
                <?= yii::$app->formDesigner->getRatingStars( [ 'selected' => $rating ] ); ?>
            </div>
			<p class="font-size font-size-large-7"><?= $model->content ?></p>
			<div class="filler-height filler-height-default"> </div>
			<div class="row">
				<p class="bold"><?= $commentDate ?></p>
			</div>
		</div>
	</div>
</div>
