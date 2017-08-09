<?php
namespace cmsgears\widgets\comment\show;

// Yii Imports
use Yii;

// CMG Imports
use cmsgears\core\common\config\CommentProperties;

use cmsgears\core\common\models\base\CoreTables;
use cmsgears\core\common\models\resources\ModelComment;

/**
 * It shows the Comments for model type or a single model. It can also retrieve child comments using baseId of parent comment.
 */
class ShowComments extends \cmsgears\core\common\base\PageWidget {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

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

	public $status		= ModelComment::STATUS_APPROVED;

	// Protected --------------

	// Private ----------------

	// Traits ------------------------------------------------------

	// Constructor and Initialisation ------------------------------

	public function init() {

		parent::init();

		$commentProperties	= CommentProperties::getInstance();

		$this->limit		= $commentProperties->getCommentsLimit();
	}

	public function initModels( $config = [] ) {

		$commentProperties		= CommentProperties::getInstance();
		$modelCommentService	= Yii::$app->factory->get( 'modelCommentService' );

		// Comments are disabled
		if( $this->type == ModelComment::TYPE_COMMENT && !$commentProperties->isComments() ) {

			return;
		}

		if( !$this->autoload ) {

			// Pagination
			if( $this->pagination ) {

				$commentTable			= CoreTables::TABLE_MODEL_COMMENT;
				$conditions[ 'type' ]	= $this->type;

				if( isset( $this->status ) ) {

					$conditions[ "$commentTable.status" ]	= $this->status;
				}

				// Init models
				if( $this->parentId == null ) {

					$this->dataProvider		= $modelCommentService->getPageByParentType( $this->parentType, [ 'conditions' => $conditions, 'limit' => $this->limit ] );
					$this->modelPage		= $this->dataProvider->getModels();
				}
				else {

					$this->dataProvider		= $modelCommentService->getPageByParent( $this->parentId, $this->parentType, [ 'conditions' => $conditions, 'limit' => $this->limit ] );
					$this->modelPage		= $this->dataProvider->getModels();
				}
			}
			// Use non pagination methods to retrieve all at once
			else {

				if( $this->parentId == null ) {

					$this->modelPage	= $modelCommentService->getByParentType( $this->parentType, $this->type );
				}
				else {

					$this->modelPage	= $modelCommentService->getByParent( $this->parentId, $this->parentType, $this->type );
				}
			}
		}
	}

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// yii\base\Widget --------

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	public function renderWidget( $config = [] ) {

		$commentProperties	= CommentProperties::getInstance();

		// Comments are disabled
		if( $this->type == ModelComment::TYPE_COMMENT && !$commentProperties->isComments() ) {

			return;
		}

		return parent::renderWidget( $config );
	}

	// ShowComments --------------------------

}
