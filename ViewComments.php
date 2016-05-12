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

use cmsgears\core\common\services\mappers\ModelCommentService;

use cmsgears\core\common\utilities\CodeGenUtil;

/**
 * It shows the Comments for model type or a single model. It can also retrieve child comments using baseId of parent comment.
 */
class ViewComments extends \cmsgears\core\common\base\PageWidget {

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

	// Constructor and Initialisation ------------------------------

	public function initModels( $config = [] ) {

		// Pagination
		if( $this->pagination ) {

			// Init models
			if( $this->parentId == null ) {

				$this->dataProvider		= ModelCommentService::getPaginationByParentType( $this->parentType, [ 'type' => $this->type, 'limit' => $this->limit ] );
				$this->modelPage		= $this->dataProvider->getModels();
			}
			else {

				$this->dataProvider		= ModelCommentService::getPaginationByParent( $this->parentId, $this->parentType, [ 'type' => $this->type, 'limit' => $this->limit ] );
				$this->modelPage		= $this->dataProvider->getModels();
			}
		}
		// Use non pagination methods to retrieve all at once
		else {

			if( $this->parentId == null ) {

				$this->modelPage	= ModelCommentService::getByParentType( $this->parentType, $this->type );
			}
			else {

				$this->modelPage	= ModelCommentService::getByParent( $this->parentId, $this->parentType, $this->type );
			}
		}
	}

	// Instance Methods --------------------------------------------

	// ViewComments -------------------------
}

?>