<?php
//Страница корзины
?>
<?php get_header();?>
   
<?php if(have_posts()) : while(have_posts()): the_post()?>


<p><?php the_content();?></p>
<?php endwhile; else:?>
    Записей нет
<?php endif;?>
<?php get_footer();?>