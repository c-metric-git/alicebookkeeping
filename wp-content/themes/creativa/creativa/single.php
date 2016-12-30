<?php 
wp_reset_postdata();
get_header(); 

?>

<?php 
  global $post;
  $creativa_options = creativa_get_options();
  creativa_set_post_count($post->ID);

  $single_layout = $creativa_options['opt-blog-page-style'];

  if ($single_layout == 1 || $single_layout == 3) {
    $section_class = 'col-md-9 sidebar-content';
    $sidebar_class = 'col-md-3';
    $content_class = 'sidebar-right';
  }
  elseif ($single_layout == 2) {
    $section_class = 'col-md-9 col-md-push-3 sidebar-content';
    $sidebar_class = 'col-md-3 col-md-pull-9';
    $content_class = 'sidebar-left';
  }

  if ($single_layout == 1 || $single_layout == 2) {
    $post_template = '';
  }
  elseif ($single_layout == 3) {
    $post_template = 'clean';
  }

  if (!post_password_required() ) { 
    get_template_part('includes/post-layout/single-templates/post', $post_template );
  } else { ?>
  
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <?php echo get_the_password_form();  ?>
          </div>
        </div>
      </div>
    </div>

  <?php }

?>

<?php if (comments_open()) { ?>
  <div class="content-separated comment-section <?php if (isset($content_class)) echo esc_attr($content_class); ?> section">
    <div class="container">
      <div class="row">
        <div class="<?php echo esc_attr($section_class);  ?>">
            <div class="comments-area" id="comments">
              <?php comments_template('', true); ?>
            </div> <!-- end comments-area -->
        </div>
        <div class="<?php echo esc_attr($sidebar_class);  ?>">
          <ul class="prev-next_posts">
          <?php
            // next post
            $next_post = get_previous_post();
            if ($next_post) {
              echo '<li>';
                echo '<a href="'. get_permalink($next_post->ID) .'">';
                  echo '<div class="prev-next-post_title">';
                  echo '<span class="font-secondary">'. esc_html__('Previous Post &#8594;', 'creativa') .'</span>';
                  echo '<div class="heading">'. esc_html($next_post->post_title) .'</div>';
                  echo '</div>';
                  $image_id = get_post_thumbnail_id($next_post->ID);
                  $image_url = wp_get_attachment_image_src( $image_id, 'medium');
                  echo '<div class="prev-next-post_thumb" style="background-image: url('. esc_url($image_url[0]) .');"></div>';
                echo '</a>';
              echo '</li>';
            }

            // previous post
            $previous_post = get_next_post();          
            if ($previous_post) {
              echo '<li>';
                echo '<a href="'. get_permalink($previous_post->ID) .'">';
                  echo '<div class="prev-next-post_title">';
                  echo '<span class="font-secondary">'. esc_html__('&#8592; Next Post', 'creativa') .'</span>';
                  echo'<div class="heading">'. esc_html($previous_post->post_title) .'</div>';
                  echo '</div>';
                  $image_id = get_post_thumbnail_id($previous_post->ID);
                  $image_url = wp_get_attachment_image_src( $image_id, 'medium');
                  echo '<div class="prev-next-post_thumb" style="background-image: url('. esc_url($image_url[0]) .');"></div>';
                echo '</a>';
              echo '</li>';
            }
          ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<?php get_footer(); ?>