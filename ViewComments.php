<?php
namespace cmsgears\widgets\comment;

// Yii Imports
use \Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

// CMG Imports
use cmsgears\core\common\config\CoreGlobal;

use cmsgears\core\common\models\mappers\ModelComment;

use cmsgears\core\frontend\services\mappers\ModelCommentService;

use cmsgears\core\common\utilities\CodeGenUtil;

/**
 * It shows the Comments for model type or a single model. It can also retrieve child comments using baseId of parent comment.
 */
class ViewComments extends \cmsgears\core\common\base\Widget {

	// Variables ---------------------------------------------------

	// Public Variables --------------------

	/**
	 * Parent Id used to access comments for single parent model.
	 */
	public $parentId	= null;

	/**
	 * Parent type to get comments specific to a parent if parent Id is provided else all comments for a particular parent type.
	 */
	public $parentType	= null;

	/**
	 * Comment type among comment, review or testimonial.
	 */
	public $type		= ModelComment::TYPE_COMMENT;

	// Pagination
	public $pagination	= true;
	public $paging		= true;	// If paging is false, scroll/action based paging can be used to show remaining pages
	public $ajaxUrl		= null;
	public $ajaxPaging	= true;
	public $limit		= 5;
	public $pageInfo	= null;
	public $pageLinks	= null;

	// Private Variables --------------------

	protected $models	= [];

	// Constructor and Initialisation ------------------------------

	// yii\base\Object

    public function init() {

        parent::init();

		// Pagination
		if( $this->pagination ) {

			$dataProvider	= null;

			// Init models
			if( $this->parentId == null ) {

				$dataProvider	= ModelCommentService::getPaginationByParentType( $this->parentType, $this->type );
				$this->models	= $dataProvider->getModels();
			}
			else {

				$dataProvider	= ModelCommentService::getPaginationByParent( $this->parentId, $this->parentType, $this->type );
				$this->models	= $dataProvider->getModels();
			}

			// Init Paging
			if( $this->paging ) {

				$pagination			= $dataProvider->getPagination();
				$this->pageInfo		= CodeGenUtil::getPaginationDetail( $dataProvider );
				$this->pageLinks	= LinkPager::widget( [ 'pagination' => $pagination ] );
			}
		}
		// Use non pagination methods to retrieve all at once
		else {

			if( $this->parentId == null ) {

				$this->models	= ModelCommentService::getByParentType( $this->parentType, $this->type );
			}
			else {

				$this->models	= ModelCommentService::getByParent( $this->parentId, $this->parentType, $this->type );
			}
		}
    }

	// Instance Methods --------------------------------------------

	// yii\base\Widget ----------------------

	/**
	 * @inheritdoc
	 */
    public function run() {

		return $this->renderWidget();
    }

	// ViewComments -------------------------

	public function renderWidget( $config = [] ) {

		$comments		= $this->models;
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