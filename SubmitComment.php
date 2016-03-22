<?php
namespace cmsgears\widgets\comment;

// Yii Imports
use \Yii;
use yii\helpers\Html;

// CMG Imports
use cmsgears\core\common\models\entities\ModelComment;

use cmsgears\core\common\services\ModelCommentService;

/**
 * It allows users to submit comments for specific model using comment trait.
 */
class SubmitComment extends \cmsgears\core\common\base\Widget {

	// Variables ---------------------------------------------------

	// Public Variables --------------------

	public $ajax			= true;
	public $ajaxUrl			= null;			// CMT App Request - Submit Path
    public $controller      = 'comment'; 	// CMT App Request - Controller
    public $action          = 'create'; 	// CMT App Request - Action

    public $title           = null;	// Title for Submit Form
    public $successMessage  = null;	// Message displayed after success. It can be used to override default message sent back by server.

	/**
	 * Check whether rating is required.
	 */
    public $rating      = false;

	/**
	 * Parent Id used to submit comment
	 */
    public $parentId	= null;

	/**
	 * Parent Slug used to find parent in case parent id is not available
	 */
    public $parentSlug	= null;

	/**
	 * Parent type
	 */
    public $parentType  = null;

	/**
	 * Comment type among comment, review or testimonial.
	 */
	public $type 		= ModelComment::TYPE_COMMENT;

    public $templateDir = '@cmsgears/widget-comment/views/submit';

    public $template    = 'simple';

	// Private Variables --------------------

	// Constructor and Initialisation ------------------------------

	// yii\base\Object ----------------------

    public function init() {

        parent::init();

		// Do init tasks
    }

	// Instance Methods --------------------------------------------

	// yii\base\Widget ----------------------

	/**
	 * @inheritdoc
	 */
    public function run() {

		return $this->renderWidget();
    }

	// SubmitComment ------------------------

	public function renderWidget( $config = [] ) {

		$formHtml		= [];

		$commentsHtml[]	= $this->render( $this->template, [
								'ajax' => $this->ajax, 'ajaxUrl' => $this->ajaxUrl, 'controller' => $this->controller, 'action' => $this->action,
								'title' => $this->title, 'successMessage' => $this->successMessage,
								'rating' => $this->rating,
								'parentId' => $this->parentId, 'parentSlug' => $this->parentSlug, 'parentType' => $this->parentType, 'type' => $this->type
							]);

		$commentsHtml	= implode( '', $commentsHtml );

		return Html::tag( 'div', $commentsHtml, $this->options );
	}
}

?>