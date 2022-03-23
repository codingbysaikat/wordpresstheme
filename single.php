<?php get_header()?>

<body <?php body_class();?>>
<?php get_template_part("hero")?>
<div class="container">
    <div class="row">
        <?php
        if(is_active_sidebar("next-single-post-widgets")){

            ?>
            <div class='col-md-8 '>
            <?php
        }else{
            ?>
            <div class='col-md-10 offset-md-1 '>
                <?php
            
        }

        ?>
        
        
            
<div class="posts">
    <?php
    while(have_posts()){
        the_post();

?>
    <div class="post <?php post_class();?>">
        <div class="container">
            <div class="row">
                
                <div class="col-md-12 ">
                    <h2 class="post-title"><?php the_title();?></h2>
                </div>
                <div class="col-md-12 ">
                    <p>
                        <strong><?php the_author();?></strong><br/>
                        <?php echo  get_the_date()."<br>"; ?>
                        <?php 
                        if(has_post_format( 'image' )){
                            echo "<span class='dashicons dashicons-format-image'></span>";

                        }else if(has_post_format( 'video' )){
                            echo "<span class='dashicons dashicons-editor-video'></span>";
                        }
                        ?> 
                    </p>

                    

  
                </div>
            </div>
            <div class="row ">
                
                <div class="col-md-12 ">
                    <div class="col-md-12">
                    <div class="slider">
                        <?php
                        if ( class_exists( 'Attachments' ) ){
                        $attachments = new Attachments( 'slider' );
                        if($attachments->exist()){

                            while( $attachment = $attachments->get() ){

                                ?>
                                <div class="slider-image">
                                    <?php echo $attachments->image('large');?>

                                </div>
                                <?php
                            }

                        }
                    }



                        ?>
                        
                    </div>
                    
                </div>
                    <p>
                        <?php
                        if(has_post_thumbnail()){
                            $thumbnail_url= get_the_post_thumbnail_url(null, "large");
                            echo'<a href="'.$thumbnail_url.'" data-featherlight="image">';
                            the_post_thumbnail("large",array("class"=>"img-fluid"));
                            echo"</a>";


                        }       
                                         
                                         ?>
                    </p>
                    
                        <?php
                        
                            the_content();
                             wp_link_pages();
                    if ( get_post_format() == "image" && class_exists( "CMB2" ) ):

                            $next_camera_model = get_post_meta(get_the_ID(),"_next_camara_modal",true);
                            $next_camara_location =get_post_meta(get_the_ID(),"_next_location",true);
                        $next_Licensed= get_post_meta(get_the_ID(),"_next_lic",true); 
                             $next_Licensed_info= get_post_meta(get_the_ID(),"_next_licensed_info",true);
                             $next_data=get_post_meta(get_the_ID(),"_next_data",true)
                         
                        ?>
                        <div class="metainfo">
                            <strong>Camera Model: </strong> 
                            <?php echo esc_html($next_camera_model); ?><br/>
                            <strong>Location: </strong>
                            <?php
                            
                             echo esc_html( $next_camara_location );
                            ?>
                            <br/>
                            <strong>Date: </strong>
                            <?php echo esc_html($next_data); ?><br/>
                            <?php if ($next_Licensed): ?>
                    <?php echo esc_html($next_Licensed_info); ?>
                                    <?php endif; ?>
                                    <?php
                                    $next_image= get_post_meta(get_the_ID(),"_next_image_id",true);
                                    
                                    $next_image_details=wp_get_attachment_image_src($next_image,'large');
                                    echo "<image src='".esc_url($next_image_details[0])."'/>";

                                    ?>
                        </div>
                     <?php endif; ?>

   
                </div>
                 <?php if ( !post_password_required()): ?>
                    
               
                <div class="col-md-12 ">
                        <?php
                        comments_template();
                        ?>
                        
                    </div>
                     <?php endif ?>
            </div>

        </div>
    </div>

<?php
    }
?>

</div>

     </div>
     <?php
     if( is_active_sidebar("next-single-post-widgets")){
        ?>
        <div class="col-md-4">
            <?php
            if(is_active_sidebar("next-single-post-widgets")){
                dynamic_sidebar("next-single-post-widgets");

            }


            ?>
        </div>

        <?php
     }

     ?>

        <div class="authorsection">
            <div class="row">
                <div class="col-md-3 authorimage">
                    <?php

                    echo get_avatar(get_the_author_meta("id"));
                    ?>
                    
                </div>
                <div class="col-md-9">
                    <h4> <?php echo get_the_author_meta("display_name");?></h4>
                    <p><?php echo get_the_author_meta("description")?></p>
                    
                </div>
                
            </div>

            
        </div>
        
    </div>
    
</div>

<?php get_footer()?>
