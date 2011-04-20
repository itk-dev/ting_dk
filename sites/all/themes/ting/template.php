<?php

/**
 *  theme_breadcrumb()
 */

function ting_breadcrumb($breadcrumb) {
  if (!empty($breadcrumb)) {
    $title = drupal_get_title();
    if (!empty($title)) {
      $breadcrumb[]=$title;
    }
    return '<div class="breadcrumb">'. implode(' > ', $breadcrumb) .'</div>';
  }
}

function ting_preprocess(&$vars, $hook) {

    global $theme_info;
    // Get the path to the theme to make the code more efficient and simple.
    $path = drupal_get_path('theme', $theme_info->name);
    
    // conditional styles
    // xpressions documentation  -> http://msdn.microsoft.com/en-us/library/ms537512.aspx

    // syntax for .info
    // top stylesheets[all][] = style/reset.css
    // ie stylesheets[ condition ][all][] = ie6.css
    // ------------------------------------------------------------------------

    // Check for IE conditional stylesheets.

    if (isset($theme_info->info['ie stylesheets'])) {
      $ie_css = array();

      // Format the array to be compatible with drupal_get_css().
      foreach ($theme_info->info['ie stylesheets'] as $condition => $media) {
        foreach ($media as $type => $styles) {
          foreach ($styles as $style) {
            $ie_css[$condition][$type]['theme'][$path . '/' . $style] = TRUE;
          }
        }
      }
      // Append the stylesheets to $styles, grouping by IE version and applying
      // the proper wrapper.
      foreach ($ie_css as $condition => $styles) {
        $vars['styles'] .= '<!--[' . $condition . ']>' . "\n" . drupal_get_css($styles) . '<![endif]-->' . "\n";
      }
    }
}

/* Slideshow controls changes */

function ting_views_slideshow_singleframe_control_previous($vss_id, $view, $options) {
  return l(t('<<'), '#', array(
    'attributes' => array(
      'class' => 'views_slideshow_singleframe_previous views_slideshow_previous',
      'id' => "views_slideshow_singleframe_prev_" . $vss_id,
    ),
    'fragment' => ' ',
    'external' => TRUE,
  ));
}

function ting_views_slideshow_singleframe_control_next($vss_id, $view, $options) {
  return l(t('>>'), '#', array(
    'attributes' => array(
      'class' => 'views_slideshow_singleframe_next views_slideshow_next',
      'id' => "views_slideshow_singleframe_next_" . $vss_id,
    ),
    'fragment' => ' ',
    'external' => TRUE,
  ));
}