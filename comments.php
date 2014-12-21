


<?php if(isset($_SESSION['user'])) { ?>
    <div class="row" style="margin-top:10px;">
    <div class="well well-sm">
        <div class="row" id="post-review-box" style=";">
            <div class="col-md-12">
                <form accept-charset="UTF-8" action="#" method="POST">
                    <textarea class="form-control animated" cols="40" id="new-review" name="name" placeholder="Enter your review here..." rows="3"></textarea>
                    <input type="hidden" id="comment_product" value="<?php echo $viewProd->prodId ?>">
                    <div class="text-right">
                        <a class="btn btn-danger btn-sm" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
                        <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                        <button class="btn btn-success media-body" style="margin-top:5px;" type="submit" id="comment_submit">Comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
<?php } ?>

    <div id="success_msg">
        <br>
        <?php include('scripts/comments_load.php');?>
    </div>
