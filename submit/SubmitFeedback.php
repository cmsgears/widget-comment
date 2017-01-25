<?php
namespace cmsgears\widgets\comment\submit;

// Yii Imports
use \Yii;
use yii\helpers\Html;

// CMG Imports
use cmsgears\core\common\models\resources\ModelComment;

/**
 * It allows users to submit reviews for specific model using comment trait.
 */
class SubmitFeedback extends SubmitComment {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

    public $controller      = 'feedback';

    public $rating      	= true;

	public $type 			= ModelComment::TYPE_FEEDBACK;

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

	// SubmitFeedback ------------------------

}
