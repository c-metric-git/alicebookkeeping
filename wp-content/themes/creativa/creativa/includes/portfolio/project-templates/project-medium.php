<?php 

$creativa_options = creativa_get_options();
$content_width = creativa_get_content_width();

if ($creativa_options['opt-project-layout-med-sidebar'] == 1) {
  $section_class = 'col-md-9 sidebar-content';
  $sidebar_class = 'col-md-3';
  $content_class = 'sidebar-right';
}
elseif ($creativa_options['opt-project-layout-med-sidebar'] == 2) {
  $section_class = 'col-md-9 col-md-push-3 sidebar-content';
  $sidebar_class = 'col-md-3 col-md-pull-9';
  $content_class = 'sidebar-left';
}

$project_link = $creativa_options['opt-project-link'];
$project_link_url = $creativa_options['opt-project-link-url'];
$project_link_target = $creativa_options['opt-project-link-target'];

?>

<div class="content project-details section single--section project-layout--medium <?php echo esc_attr($content_class) ?>">

  <div class="container">

    <div class="row">

      <?php if ($project_link != 3) { ?>

      <div class="<?php echo esc_attr($section_class) ?>">

        <?php 

        if ($creativa_options['opt-project-image-gallery'] == 1) {
          $project_gallery_style = 'image-slider royalSlider rsCreativa rsNavInner rsArrowHover';
        }
        elseif ($creativa_options['opt-project-image-gallery'] == 2) {
          $project_gallery_style = 'project-image-inline';
        }

        ?>

        <?php 

          $project_gallery = $creativa_options['opt-meta-project-gallery']; 
          $project_attachments = explode(',', $project_gallery);

          if ($project_gallery) {
            echo '<div class="project-gallery '. $project_gallery_style. '" data-nav="nav_bullets" data-autoplay="0">';

              $content_width = round($content_width * .75, 0);
              $image_w = $content_width;
              $image_h = '';

              foreach ($project_attachments as $project_attachment) {
                echo '<div class="rsContent">'; 
                $project_video = wp_prepare_attachment_for_js( $project_attachment );
                $check_video = ($project_video['caption'] == '[video]' ? 'data-rsVideo="'. esc_attr(esc_url($project_video['alt'])) .'"' : '');

                
                $image_src = wp_get_attachment_image_src($project_attachment, 'full');

                if ($image_src[1] >= $content_width) {
                  $image = aq_resize( $image_src[0], $image_w, $image_h, true, false );
                } else {
                  $image = $image_src;
                }

                
                if ($creativa_options['opt-project-image-gallery'] == 2 && $project_video['caption'] == '[video]') {
                  echo '<div class="fit-vid">';
                  $video_link = $project_video['alt'];
                  echo creativa_convert_videos(esc_url($video_link));
                  echo '</div>';
                } 
                else {
                  echo '<img class="rsImg" src="'. esc_url($image[0]) .'" width="'. esc_attr($image[1]) .'" height="'. esc_attr($image[2]) .'"  alt="" '. $check_video .' />';
                }
                
       
                echo '</div>';
              }

            echo '</div>';
          }

        ?>

      </div>

      <div class="<?php echo esc_attr($sidebar_class) ?> project-content">

 
        <div class="project__description">
          <?php the_content(); ?>
        </div>

      </div>

      <?php } else { ?> 
        <div class="col-md-12">

        <?php if ($project_link == 3 && !empty($project_link_url)) { ?>
          <h3 class="single__portfolio__url">
            <a href="<?php echo esc_url($project_link_url) ?>" <?php if ($project_link_target == true) echo 'target="_blank"'; ?>><?php echo esc_html($project_link_url) ?></a>
          </h3>
        <?php } ?>

        </div>
      <?php } // endif project link 3 ?>
    </div>
    
  </div>

</div>


