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
	public $url  		= null;

	/**
	 * Comment type among comment, review or testimonial.
	 */
	public $type 		= ModelComment::TYPE_COMMENT;
	
	public $rating 		= true;

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

    public $templateDir = '@cmsgears/widget-comment/views';
    
    public $template    = 'submit';

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

		$viewPath		= $this->template . '/simple'; 

		$commentsHtml[]	= $this->render( $viewPath, [ 
								'url' => $this->url, 'type' => $this->type, 'rating' => $this->rating,
								'parentId' => $this->parentId, 'parentSlug' => $this->parentSlug, 'parentType' => $this->parentType
							]);

		$commentsHtml	= implode( '', $commentsHtml );

		return Html::tag( 'div', $commentsHtml, $this->options );
	}
}

?>