  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <!--      <li data-target="#myCarousel" data-slide-to="3"></li>
              <li data-target="#myCarousel" data-slide-to="4"></li> -->
    </ol>
    <div class="carousel-inner">
      <?php 
        $args = array(
          'post_type' => 'slider', 
          'posts_per_page' => 5,
          'orderby' => 'date',
          'order' => 'desc',
          'exclude' => '',
          'post_status' => 'publish'
        );
    
        $slider = get_posts($args); ?>
      <?php $count = 0; ?>
      <?php foreach($slider as $slide): ?>
      <div class="carousel-item <?php echo ($count == 0) ? 'active' : ''; ?>">
          <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($slide->ID)) ?>" class="img-responsive d-block w-100"/>
          <div class="carousel-caption d-md-block animated fadeInUp" style="animation-name: fadeInUp;animation-delay: 1s;animation-duration: 2s;">
              <h4><?php echo $slide->post_title; ?></h4>
              <p><?php echo $slide->post_content; ?></p>
          </div>
      </div>
      <?php $count++; ?>
    <?php endforeach; ?>
    </div>
    <button class="carousel-control-prev" type="button" data-target="#myCarousel" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#myCarousel" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </button>
  </div>