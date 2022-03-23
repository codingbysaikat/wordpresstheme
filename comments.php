<div class="comments">
<h2 class="comments-tittle">

 <?php 
$next_cn= get_comments_number();
     if(1==$next_cn){
	        _e("1 Comments","next");
         
         }else{
	          echo $next_cn." ".__("Comments","next");
        }




 ?>


 </h2>
<div class="comments-list">
	<?php
wp_list_comments();
?>
<div class="comments-pagtion">
	<?php
	the_comments_pagination(array(
		'prev_text'=>'<'.__('previous comments','next'),
		'next_text'=>'>'.__('Next comments'),
	));


	?>

	
</div>
<?php
if(!comments_open()){
	_e("comments are closed","next");
}

?>
	
</div>

<div class="community-from">
	<?php
	comment_form();


	?>
	
</div>
	
</div>

