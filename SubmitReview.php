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

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

    public $controller      = 'review';

    public $rating      	= true;

	public $type 			= ModelComment::TYPE_REVIEW;

	// Protected --------------

	// Private ----------------

	// Traits ------------------------------------------------------

	// Constructor and Initialisation ------------------------------

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// yii\base\Widget --------

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// SubmitReview --------------------------

}
