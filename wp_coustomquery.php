<?php
//Template Name:wp_custom query

?>

<?php get_header()?>
<body <?php body_class(array("first-class","seconed-class"));?>>
<?php get_template_part("hero")?>

<div class="col-md-8 container text-center">
	
	<h3> write some thing <?php single_tag_title(); ?></h3>

	
	
</div>

<div class="posts">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php
				$paged          = get_query_var( "paged" ) ? get_query_var( "paged" ) : 1;
        $posts_per_page = 2;
        $post_ids       = array( 43,35, 39);
        $_p             = new WP_Query( array(
            'posts_per_page' => $posts_per_page,
            'post__in'       => $post_ids,
            'orderby'        => 'post__in',
            'paged'          => $paged
        ) );
				
	while($_p ->have_posts()){
		$_p->the_post();
	
	

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
	wp_reset_query();
	
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
<!-- Add the pagination functions here. -->
<div class="container post-pagination">
	<div class="row">
		
		<div class=" col-md-8">
			<?php
                    echo paginate_links( array(
                        'total' => ceil( count( $post_ids ) / $posts_per_page )
                    ) );
                    ?>
		</div>
		
	</div>
	
</div>
<?php get_footer()?>