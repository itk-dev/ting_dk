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

?>