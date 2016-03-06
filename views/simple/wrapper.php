<?php if( isset( $commentsHtml ) && strlen( $commentsHtml ) > 0 ) {
    
    echo $commentsHtml;
} else { ?>
    <p class='align align-center padding padding-medium-v'>No Reviews Found.</p>
<?php } ?>