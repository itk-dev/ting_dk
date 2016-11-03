<?php
// $Id: index.php,v 1.94 2007/12/26 08:46:48 dries Exp $

/**
 * @file
 * The PHP page that serves all page requests on a Drupal installation.
 *
 * The routines here dispatch control to the appropriate handler, which then
 * prints the appropriate page.
 *
 * All Drupal code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
 */

if (!empty($_SERVER['REQUEST_URI'])) {
  list($path) = explode('?', $_SERVER['REQUEST_URI'], 2);
  $_REQUEST['q'] = $_GET['q'] = trim($path, '/');
}

require_once __DIR__ . '/index.php';
