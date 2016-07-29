<?php
namespace cmsgears\widgets\comment\submit;

// Yii Imports
use \Yii;
use yii\helpers\Html;

// CMG Imports
use cmsgears\core\common\models\resources\ModelComment;

/**
 * It allows users to submit testimonails for specific model using comment trait.
 */
class SubmitTestimonial extends SubmitComment {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

    public $controller      = 'testimonial';

    public $rating      	= true;

	public $type 			= ModelComment::TYPE_TESTIMONIAL;

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
