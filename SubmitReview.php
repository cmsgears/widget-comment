<?php
namespace cmsgears\widgets\comment;

// Yii Imports
use \Yii;
use yii\helpers\Html;

// CMG Imports
use cmsgears\core\common\models\mappers\ModelComment;

/**
 * It allows users to submit reviews for specific model using comment trait.
 */
class SubmitReview extends SubmitComment {

	// Variables ---------------------------------------------------

	// Public Variables --------------------

    public $controller      = 'review';

    public $rating      	= true;

	public $type 			= ModelComment::TYPE_REVIEW;

	// Private Variables --------------------

	// Constructor and Initialisation ------------------------------

	// Instance Methods --------------------------------------------

	// SubmitReview -------------------------
}

?>