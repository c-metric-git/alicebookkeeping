<?php
/*
Template Name: Full Width Clean Page
*/
get_header(); ?>

<?php if (!post_password_required() ) { ?> 
  <div class="content full-width-page">
    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; endif; ?>
  </div>
<?php } else { ?>
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php echo get_the_password_form(); ?>
        </div>
      </div>  
    </div>
  </section>
<?php } ?> 

<?php get_footer(); ?>