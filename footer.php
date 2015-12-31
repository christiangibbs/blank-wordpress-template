  <footer class="site-footer">

    <!-- Footer Widgets -->
    <div class="footer-widgets clearfix">
      <?php if ( is_active_sidebar('footer-left')) : ?>
      <div class="footer-widget-area">
        <?php dynamic_sidebar('footer-left'); ?>
      </div>
      <?php endif; ?>
      <?php if ( is_active_sidebar('footer-middle-left')) : ?>
      <div class="footer-widget-area">
        <?php dynamic_sidebar('footer-middle-left'); ?>
      </div>
      <?php endif; ?>
      <?php if ( is_active_sidebar('footer-middle-right')) : ?>
      <div class="footer-widget-area">
        <?php dynamic_sidebar('footer-middle-right'); ?>
      </div>
      <?php endif; ?>
      <?php if ( is_active_sidebar('footer-right')) : ?>
      <div class="footer-widget-area">
        <?php dynamic_sidebar('footer-right'); ?>
      </div>
      <?php endif; ?>
    </div>

    <!-- Footer Menu -->
    <nav class="site-nav">
      <?php
        $args = array (
          'theme_location' => 'footer'
        );
      ?>
      <?php wp_nav_menu($args); ?>
    </nav>

    <p><?php bloginfo('name'); ?> - &copy; <?php echo date('Y'); ?></p>
  </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
