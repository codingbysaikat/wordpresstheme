<?php get_header()?>
<body <?php body_class(array("first-class","seconed-class"));?>>
<?php get_template_part("hero")?>

<div class="container text-center">
	
	<h3> Under The Tag  <?php echo single_tag_title(); ?> Posts</h3>

	
	
</div>

<div class="posts">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php
	while(have_posts()){
		the_post();

?>
    <div class="post<?php post_class();?>">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                   <a href="<?php the_permalink()?>"> <h2 class="post-title"><?php the_title();?></h2></a>
                </div>
                
            </div>
       

        </div>
    </div>

<?php
	}
?>
				
			</div>
			<div class="col-md-4">
				          <ul class="tag-manually">    
                                        <?php
                                  $tags = get_tags('post_tag'); //taxonomy=post_tag
    
                                     if ( $tags ) :
                                           foreach ( $tags as $tag ) : ?>
                                             <li class="tag-item-manually"><a class="tag" href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" title="<?php echo esc_attr( $tag->name ); ?>"><?php echo esc_html( $tag->name ); ?></a></li>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                               </ul>
                               <?php

                               $users = get_users( array( 'fields' => array( 'ID' ) ) );
                                         foreach($users as $user){
                                               print_r(get_user_meta ( $user->Name));
                                         }


                               ?>
                               <?php
                               wp_list_authors(  );


                               ?>



				
			</div>
			
		</div>
		
	</div>
	

</div>
