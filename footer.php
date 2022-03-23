<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php
                  if(is_active_sidebar("footer-left-post-widgets")){
                    dynamic_sidebar("footer-left-post-widgets");
                }


                ?>
                
                
            </div>
            <div class="col-md-6">
                
            </div>
        </div>
    </div>
</div>
<?php wp_footer();?>
</body>
</html>