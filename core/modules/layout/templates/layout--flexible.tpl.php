<?php
/**
 * @file
 * Template for a single region layout.
 *
 * Variables:
 * - $title: The page title, for use in the actual HTML content.
 * - $messages: Status and error messages. Should be displayed prominently.
 * - $tabs: Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links: Array of actions local to the page, such as 'Add menu' on
 *   the menu administration interface.
 * - $classes: Array of classes to be added to the layout wrapper.
 * - $attributes: Additional attributes to be added to the layout wrapper.
 * - $content: An array of content, each item in the array is nameed to one
 *   region of the layout. This layout supports the following sections:
 *   - $content['header']
 *   - $content['top']
 *   - $content['content']
 *   - $content['footer']
 */
?>
<div class="layout--flexible layout <?php print implode(' ', $classes); ?>"<?php print backdrop_attributes($attributes); ?>>
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <!-- hardcoded here to dev stress free -->
  <?php if ($messages): ?>
    <div class="l-messages" role="status" aria-label="<?php print t('Status messages'); ?>">
      <?php print $messages; ?>
    </div>
  <?php endif; ?>

  <div class="layout-flexible-content">
  <?php foreach ($region_data as $name => $row): ?>
    <<?php print $row['element']; ?> data-row-id="<?php print $name; ?>" class="flexible-row <?php print 'l-' . $name; ?>" <?php print $row['row_id']; ?>>
      <div class="<?php print $row['row_class']; ?>">
        <?php if ($region_buttons): ?>
          <div class="layout-editor-region-buttons clearfix">
            <?php print $region_buttons[$name]; ?>
          </div>
        <?php endif; ?>
        <div class="l-flexible-row row">
        <?php foreach ($row['regions'] as $region): ?>
          <div class="l-col col-md-<?php print $region['region_md']; ?>">
            <?php if ($region_buttons): ?>
              <div class="layout-editor-region" id="layout-editor-region-<?php print $name; ?>" data-region-name="<?php print $name; ?>">
              <div class="layout-editor-region-title clearfix">
              <h2 class="label"><?php print $region['region_name']; ?></h2>
              </div>
              </div>
            <?php else: ?>
              <?php print $content[$region['content_key']]; ?>
            <?php endif; ?>

          </div>
        <?php endforeach; ?>
        </div>
      </div>
    </<?php print $row['element']; ?>>
  <?php endforeach; ?>
</div>
</div>
