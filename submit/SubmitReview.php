<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

namespace cmsgears\widgets\comment\submit;

// CMG Imports
use cmsgears\core\common\models\resources\ModelComment;

/**
 * SubmitReview allows users to submit reviews for specific model using comment trait.
 *
 * @since 1.0.0
 */
class SubmitReview extends SubmitComment {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	public $rating	= true;

	public $type	= ModelComment::TYPE_REVIEW;

	public $cmtController = 'review';

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
