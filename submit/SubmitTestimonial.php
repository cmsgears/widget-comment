<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

namespace cmsgears\widgets\comment\submit;

/**
 * SubmitFeedback allows users to submit testimonials for specific model using comment trait.
 *
 * @since 1.0.0
 */
class SubmitTestimonial extends SubmitComment {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	public $title = 'Submit your Testimonial'; // Title for Submit Form.

	public $options = [ 'class' => 'box box-basic box-comment-submit box-testimonial-submit' ];

	public $rating = true;

	public $cmtController = 'testimonial';

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

	// SubmitTestimonial ---------------------

}
