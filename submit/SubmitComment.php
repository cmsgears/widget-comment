<?php
namespace cmsgears\widgets\comment\submit;

// Yii Imports
use Yii;
use yii\helpers\Html;

// CMG Imports
use cmsgears\core\common\config\CommentProperties;

use cmsgears\core\common\models\resources\ModelComment;

use cmsgears\core\common\base\Widget;

/**
 * It allows users to submit comments for specific model using comment trait.
 */
class SubmitComment extends Widget {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	public $model			= null; // Model for which comment need to be submitted

    public $captcha			= true; // Used to show captcha based on configuration instead of user availability.

    public $title			= null;	// Title for Submit Form.
    public $success			= null;	// Success Message displayed after submit. It can be used to override default message sent back by server.

    /**
	 * Comment type among comment, review or testimonial.
	 */
	public $type			= ModelComment::TYPE_COMMENT;

	/**
	 * Check whether rating is required.
	 */
    public $rating      	= false;
	public $ratingClass		= null;

	public $ajax			= true;
	public $ajaxUrl			= null; // CMT App Request - Submit Path

	// CMT JS Framework to handle ajax request
	public $cmtApp			= 'comment';
    public $cmtController	= 'comment';
    public $cmtAction		= 'create';

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

	public function renderWidget( $config = [] ) {

		$commentProperties	= CommentProperties::getInstance();
		$user				= Yii::$app->user->getIdentity();

		// Comments are disabled by admin
		if( !$commentProperties->isComments() ) {

			return;
		}

		// User is not logged in and public comments are disabled by admin for whole app
		if( !isset( $user ) && $commentProperties->isUserComments() ) {

			return;
		}

		$widgetHtml = $this->render( $this->template, [ 'widget' => $this ] );

		if( $this->wrap ) {

			return Html::tag( 'div', $widgetHtml, $this->options );
		}

		return $widgetHtml;
	}

	// SubmitComment -------------------------

}
