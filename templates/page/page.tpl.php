<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 */
?>
<header id="header" class="header" role="header">
  <div class="container">
    <?php if ($logo): ?>
      <a class="logo navbar-btn pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
      </a>
    <?php endif; ?>
    <?php print $site_name; ?>
    <nav class="navbar navbar-default" role="navigation">
      
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
          <span class="sr-only"><?php print t('Toggle navigation'); ?></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div> <!-- /.navbar-header -->

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="navbar-collapse">
        <?php if ($main_menu): ?>
          <ul id="main-menu" class="menu nav navbar-nav">
            <?php print render($main_menu); ?>
          </ul>
        <?php endif; ?>
        <!-- views exposed search -->
        <?php
          $block = block_load('dkan_sitewide', 'dkan_sitewide_search_bar');
          if($block):
            $search = _block_get_renderable_array(_block_render_blocks(array($block)));
            print render($search);
          endif;
        ?>
        <!-- dkan user menu -->
        <?php
          $block = block_load('dkan_sitewide', 'dkan_sitewide_user_menu');
          if($block):
            $search = _block_get_renderable_array(_block_render_blocks(array($block)));
            print render($search);
          endif;
        ?>
      </div><!-- /.navbar-collapse -->
    </nav><!-- /.navbar -->
  </div> <!-- /.container -->
</header>

<?php if ($is_front) : ?>
  <?php 
    // Get the file path to the hero image.
    theme_get_setting('hero_path');
    if(!empty($uri)):
      $uri = $uri;
    else :
      $uri = 'profiles/dkan/themes/contrib/nuboot/assets/images/hero.jpg';
    endif;
    $path = file_create_url($uri);
  ?>
  <!-- #featured -->
  <div id="featured" class="clearfix" <?php print 'style="background-image:url(' . $path . ');"' ?>>
    <div class="tint"></div>
    <div class="container">
        <!-- #featured-inside -->
        <div class="featured-inside" class="clearfix">
            <div class="row">
                <div class="col-md-6">
                  <?php print render($page['preface_first']); ?>
                </div>
                <div class="col-md-6">
                  <?php print render($page['preface_second']); ?>
                </div>
            </div>
        </div>
        <!-- EOF: #featured-inside -->
    </div>
  </div>
  <!-- EOF:#featured -->
<?php endif; ?>

<?php if ($page['highlighted']):?>
  <!-- #top-content -->
  <div id="top-content" class="clearfix">
      <div class="container">

          <!-- #top-content-inside -->
          <div id="top-content-inside" class="clearfix">
              <div class="row">
                  <div class="col-md-12">
                  <?php print render($page['highlighted']); ?>
                  </div>
              </div>
          </div>
          <!-- EOF:#top-content-inside -->

      </div>
  </div>
  <!-- EOF: #top-content -->
<?php endif; ?>

<div id="main-wrapper">
  <div id="main" class="main">
    <div class="container">
      <header role="banner" id="page-header">
        <?php if (!empty($site_slogan)): ?>
          <p class="lead"><?php print $site_slogan; ?></p>
        <?php endif; ?>

        <?php print render($page['header']); ?>
      </header> <!-- /#page-header -->

      <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
      <?php print $messages; ?>
      <?php if (!empty($page['help'])): ?>
        <?php print render($page['help']); ?>
      <?php endif; ?>
    </div>

    <div class="main-row">
      <div class="container">

        <?php if (!empty($page['sidebar_first'])): 
            $main_col = "col-sm-9"; 
          ?>
          <aside class="col-sm-3" role="complementary">
            <?php print render($page['sidebar_first']); ?>
          </aside>  <!-- /#sidebar-first -->
        <?php  
        else :
            $main_col = "";
        endif; ?>

        <section class="<?php print $main_col; ?>"> 
          <a id="main-content"></a>
          <?php print render($title_prefix); ?>
          <?php if (!empty($title)): ?>
            <h1 class="page-header"><?php print $title; ?></h1>
          <?php endif; ?>
          <?php print render($title_suffix); ?>
          <?php if (!empty($tabs)): ?>
            <?php print render($tabs); ?>
          <?php endif; ?>
          <?php if (!empty($action_links)): ?>
            <ul class="action-links"><?php print render($action_links); ?></ul>
          <?php endif; ?>
          <?php print render($page['content']); ?>
        </section>

        <?php if (!empty($page['sidebar_second'])): ?>
          <aside class="col-sm-3" role="complementary">
            <?php print render($page['sidebar_second']); ?>
          </aside>  <!-- /#sidebar-second -->
        <?php endif; ?>
      </div>
    </div>

    <?php if ($page['bottom_content']):?>
      <!-- #bottom-content -->
      <div id="bottom-content" class="clearfix">
        <div class="container">
          <!-- #bottom-content-inside -->
          <div id="bottom-content-inside" class="clearfix">
            <div class="row">
              <div class="col-md-12">
                <?php print render($page['bottom_content']); ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <?php print render($page['postscript_first']); ?>
              </div>
              <div class="col-md-6">
                <?php print render($page['postscript_second']); ?>
              </div>
            </div>
          </div>
          <!-- EOF:#bottom-content-inside -->
        </div>
      </div>
      <!-- EOF: #bottom-content -->
    <?php endif; ?>

  </div> <!-- /#main -->
</div> <!-- /#main-wrapper -->

<footer id="footer" class="footer" role="footer">
  <div class="container">
    <!-- #footer-inside -->
    <div id="footer-inside" class="clearfix">
      <div class="row">
        <div class="col-md-3">
          <?php if ($page['footer_first']):?>
          <div class="footer-area">
          <?php print render($page['footer_first']); ?>
          </div>
          <?php endif; ?>
        </div>

        <div class="col-md-3">
          <?php if ($page['footer_second']):?>
          <div class="footer-area">
          <?php print render($page['footer_second']); ?>
          </div>
          <?php endif; ?>
        </div>

        <div class="col-md-3">
          <?php if ($page['footer_third']):?>
          <div class="footer-area">
          <?php print render($page['footer_third']); ?>
          </div>
          <?php endif; ?>
        </div>

        <div class="col-md-3">
          <?php if ($page['footer_fourth']):?>
          <div class="footer-area">
          <?php print render($page['footer_fourth']); ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <!-- EOF: #footer-inside -->
    <?php if ($copyright): ?>
      <small class="copyright pull-left"><?php print $copyright; ?></small>
    <?php endif; ?>
    <small class="pull-right"><?php print render($page['footer']); ?></small>
  </div>
</footer>