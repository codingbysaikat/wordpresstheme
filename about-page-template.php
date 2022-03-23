<?php
/*
*Template Name: about template

*/

?>
<?php get_header()?>
<body <?php body_class();?>>
<?php get_template_part("hero")?>
<div class="container text-center">
	<div class="row">
	<?php the_content();?>		
	</div>
	
</div>
<div class="row">
	<div class="col-md-4 text-center offset-md-2 " >
	<div class=" tastimonal slider ">
		<?php
                        if ( class_exists( 'Attachments' ) ){
                        $attachments = new Attachments( 'testimonial' );
                        if($attachments->exist()){

                            while( $attachment = $attachments->get() ){

                                ?>
                                <div class="slider-image2  ">
                                    <?php echo $attachments->image('large');?>
                                    <h4><?php echo esc_html($attachments->field('name'));?></h4>
                                    <p><?php echo esc_html($attachments->field('testimonial'));?></p>
                                    <p>
                                    	<?php echo esc_html($attachments->field('position'));?>
                                    	<strong>
                                    		<?php echo esc_html($attachments->field('company'));?>
                                    	</strong>
                                    </p>


                                </div>
                                <?php
                            }

                        }
                    }



                        ?>

		
	</div>
	
</div>
</div>


<?php get_footer()?>
</body>