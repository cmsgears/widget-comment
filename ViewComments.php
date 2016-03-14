<?php
namespace cmsgears\widgets\comment;

// Yii Imports
use \Yii;
use yii\helpers\Html;

// CMG Imports
use cmsgears\listing\common\config\ListingGlobal;

use cmsgears\core\common\models\entities\ModelComment;

use cmsgears\core\common\services\ModelCommentService;

/**
 * It shows the Comments for model type or a single model. It can also retrieve child comments using baseId of parent comment.
 */
class ViewComments extends \cmsgears\core\common\base\Widget {

	// Variables ---------------------------------------------------

	// Public Variables --------------------

	/**
	 * Ajax url to retrieve comments.
	 */
	public $url  		= null;

	/**
	 * Retrieve all comments via ajax if true, else get only child comments using ajax if set to false. The view should support 
	 * ajax having appropriate triggers to accomplish ajax nature.
	 */
	public $ajax  		= false;

	/**
	 * Comment type among comment, review or testimonial.
	 */
	public $type		= ModelComment::TYPE_COMMENT;

	/**
	 * Parent Id used to access comments for single parent model.
	 */
	public $parentId	= null;

	/**
	 * Parent type to get comments specific to a parent if parent Id is provided else all comments for a particular parent type.
	 */
	public $parentType	= null;

	public $templateDir	= '@cmsgears/widget-comment/views';

	// Private Variables --------------------

	/**
	 * Used in case comments need to be retrieved without using ajax for initial request.
	 */
	private $comments	= null;

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

		$this->getComments();

		return $this->renderWidget();
    }

	protected function getComments() {

		if( !$this->ajax ) {

			if( $this->parentId == null ) {

				$this->comments	= ModelCommentService::findApprovedByParentType( $this->parentType, $this->type );
			}
			else {

				$this->comments	= ModelCommentService::findApprovedByParent( $this->parentId, $this->parentType, $this->type );
			}
		}
	}

	public function renderWidget( $config = [] ) {

		$comments		= $this->comments;
		$commentsHtml	= [];

		// Path
		$commentPath	= $this->template . '/comment';
		$wrapperPath	= $this->template . '/wrapper';

		if( isset( $comments ) && count( $comments ) > 0 ) {

			foreach( $comments as $comment ) {
 
				$commentsHtml[] = $this->render( $commentPath, [ 'comment' => $comment ] );
			}
		}

		$commentsHtml	= implode( '', $commentsHtml );

		$commentsHtml 	= $this->render( $wrapperPath, [ 'commentsHtml' => $commentsHtml ] );

		return Html::tag( 'ul', $commentsHtml, $this->options );
	}
}

?>