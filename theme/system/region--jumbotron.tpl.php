<?php
/**
 * @file
 * region--jumbotron.tpl.php
 */
$uri = theme_get_setting('hero_path');
$path = file_create_url($uri);
?>
<!-- #jumbotron -->
<div class="region-jumbotron clearfix" <?php print 'style="background-image:url(' . $path . ');"' ?>>
  <div class="tint"></div>
  <!-- jumbotron-inside -->
  <div class="jumbotron-inside container clearfix">
    <?php if ($page['preface']): ?>
        <?php print render($page['preface']); ?>
    <?php endif; ?>
    <div class="row">
      <?php //if ($page['preface_first']): ?>
        <?php print render($page['preface_first']); ?>
      <?php //endif; ?>
      <?php //if ($page['preface_second']): ?>
        <?php print render($page['preface_second']); ?>
      <?php //endif; ?>
    </div>
  </div>
</div>