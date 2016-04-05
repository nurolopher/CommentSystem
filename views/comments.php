<div class="panel panel-default">
    <div class="panel-body">
        <h3>Comments</h3>

        <div id="comments-container">
            <?php

            /** @var Comment $comment */
            foreach ($comments as $comment) {
                ?>
                <div class="row">
                    <div class="col-md-8">
                        <p>
                            <?php echo $comment->getContent(); ?>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-info">
                            <?php echo $comment->getCreatedAt(); ?>
                        </p>
                    </div>
                </div>
                <hr/>
                <?php
            }
            ?>
        </div>
    </div>
</div>
