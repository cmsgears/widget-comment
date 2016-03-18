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

	/**
	 * Ajax url accepting comments
	 */
	public $url             = null;
    public $title           = null;
    public $successMessage  = null;
    public $controller      = null;
    public $action          = null;

	/**
	 * Comment type among comment, review or testimonial.
	 */
	public $type 		= ModelComment::TYPE_COMMENT;

	/**
	 * Parent Id used to submit comment
	 */
    public $parentId	= null;
    
    public $rating      = null;

	/**
	 * Parent Slug used to find parent in case parent id is not available
	 */
    public $parentSlug	= null;

	/**
	 * Parent type
	 */
    public $parentType  = null;

    public $templateDir = '@cmsgears/widget-comment/views/submit';
    
    public $template    = 'simple';

	// Private Variables --------------------

	// Constructor and Initialisation ------------------------------

	// yii\base\Object

    public function init() {

        parent::init();

		// Do init tasks
    }

	// Instance Methods --------------------------------------------

	// yii\base\Widget

	/**
	 * @inheritdoc
	 */
    public function run() {

		return $this->renderWidget();
    }

	public function renderWidget( $config = [] ) {

		$formHtml		= [];

		$commentsHtml[]	= $this->render( $this->template, [ 
								'url' => $this->url, 'type' => $this->type, 'rating' => $this->rating,
								'parentId' => $this->parentId, 'parentSlug' => $this->parentSlug, 'parentType' => $this->parentType,
								'title' => $this->title, 'successMessage' => $this->successMessage,
								'controller' => $this->controller,
								'action' => $this->action
							]);

		$commentsHtml	= implode( '', $commentsHtml );

		return Html::tag( 'div', $commentsHtml, $this->options );
	}
}

?>