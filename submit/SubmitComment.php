<?php
namespace cmsgears\widgets\comment\submit;

// Yii Imports
use \Yii;
use yii\helpers\Html;

// CMG Imports
use cmsgears\core\common\config\CoreGlobal;

use cmsgears\core\common\models\resources\ModelComment;

/**
 * It allows users to submit comments for specific model using comment trait.
 */
class SubmitComment extends \cmsgears\core\common\base\Widget {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	public $model			= null; // Model for which comment need to be submitted

	public $ajax			= true;
	public $ajaxUrl			= null; // CMT App Request - Submit Path

    public $controller      = 'comment'; // CMT App Request - Controller
    public $action          = 'create'; // CMT App Request - Action

    public $captcha			= true; // Used to show captcha based on configuration instead of user availability.

    public $title           = null;	// Title for Submit Form.
    public $successMessage  = null;	// Message displayed after success. It can be used to override default message sent back by server.

	/**
	 * Check whether rating is required.
	 */
    public $rating      	= false;

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

		$formHtml = $this->render( $this->template, [ 'widget' => $this ] );

		return Html::tag( 'div', $formHtml, $this->options );
	}

	// SubmitComment -------------------------
}
