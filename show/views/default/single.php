<?php
// Yii Imports
use yii\helpers\Html;

// CMG Imports
use cmsgears\core\frontend\config\SiteProperties;

use cmsgears\core\common\utilities\DateUtil;
use cmsgears\core\common\utilities\CodeGenUtil;

$rating	= $model->rating;
$date	= DateUtil::getDateFromDateTime( $model->createdAt );

$avatar		= SiteProperties::getInstance()->getDefaultAvatar();
$avatarUrl	= isset( $model->creator ) ? CodeGenUtil::getFileUrl( $model->creator->avatar, [ 'image' => $avatar ] ) : Yii::getAlias( "@images" ) . "/$avatar";
?>
<div <?= Html::renderTagAttributes( $widget->modelOptions ) ?>>
	<div class="col12x2">
		<img class="fluid circled circled1 avatar" src="<?= $avatarUrl ?>" />
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
				<p class="bold"><?= $date ?></p>
			</div>
		</div>
	</div>
</div>
