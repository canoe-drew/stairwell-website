<?php
/**
 * Pico configuration
 *
 * This is the configuration file for {@link Pico}. It comes loaded with the
 * default values, which can be found in {@link Pico::getConfig()} (see
 * {@path "lib/Pico.php"}).
 *
 * To override any of the default settings below, copy this file to
 * {@path "config/config.php"}, uncomment the line, then make and
 * save your changes.
 *
 * @author  Gilbert Pellegrom
 * @link    http://picocms.org
 * @license http://opensource.org/licenses/MIT
 * @version 1.0
 */

/*
 * BASIC
 */
$config['site_title'] = 'Stairwell Carollers';              // Site title
// $config['base_url'] = '';                    // Override base URL (e.g. http://example.com)
//$config['rewrite_url'] = null;               // A boolean indicating forced URL rewriting

/*
 * Multilingual site titles
 */
$config['site_titles'] = array();
$config['site_titles']['en'] = 'The Stairwell Carollers';              // Site title - English
$config['site_titles']['fr'] = 'Les Chanteurs Stairwell';              // Site title - French

/*
 * THEME
 */
//$config['theme'] = 'default';                // Set the theme (defaults to "default")
$config['theme'] = 'stairwell';                // Set the theme (defaults to "default")
 /*$config['twig_config'] = array(              // Twig settings
     'cache' => false,                        // To enable Twig caching change this to a path to a writable directory
     'autoescape' => false,                   // Auto-escape Twig vars
     'debug' => true                         // Enable Twig debug
 );*/

/*
 * CONTENT
 */
// $config['date_format'] = '%D %T';            // Set the PHP date format as described here: http://php.net/manual/en/function.strftime.php
// $config['pages_order_by'] = 'alpha';         // Order pages by "alpha" or "date"
// $config['pages_order'] = 'asc';              // Order pages "asc" or "desc"
// $config['content_dir'] = 'content-sample/';  // Content directory
// $config['content_ext'] = '.md';              // File extension of content files to serve

/*
 * TIMEZONE
 */
// $config['timezone'] = 'UTC';                 // Timezone may be required by your php install

/*
 * PLUGINS
 */
// $config['DummyPlugin.enabled'] = false;      // Force DummyPlugin to be disabled

// $config['author'] = 'Stairwell Carollers';

/*
 * CUSTOM
 */
// $config['custom_setting'] = 'Hello';         // Can be accessed by {{ config.custom_setting }} in a theme

$config['extra_css'] = '/assets/restricted/css/myfonts.css';



/*
 * Site-wide meta keywords
 */
$config['site_wide_keywords'] = 'Ottawa choirs, Ottawa choir,Christmas,Christmas carols,renaissance,madrigals,choral,vocal,ensemble,carols,carollers,carolers, Christmas music,music,Ottawa,a cappella,acappella, CD,chamber choir,Ottawa choral,Chistmas lyrics,song lyrics';
/*
 * Category menu settings
 */
$config['pages_order_by'] = 'position';             // Needed by PicoCategorizedPages
$config['pages_order'] = 'asc';                 // Order pages "asc" or "desc"
$config['categories_order'] = 'asc';              // Order categories "asc" or "desc"

$config['PicoCategorizedPages.enabled'] = true;    // Force PicoCategorizedPages to be enabled

$config['PicoMenuHiding.enabled'] = true;

$config['PicoXMLSitemap.enabled'] = false;

$config['PicoMultiLanguage.enabled'] = true;

/*
 * Set up for the at_navigation plugin
 * https://github.com/ahmet2106/pico-navigation
 */
$config['at_navigation']['class'] = 'nav';

$config['at_navigation']['id'] = 'at-navigation';
$config['at_navigation']['class'] = 'at-navigation';

$config['at_navigation']['class_li'] = 'list-item';
$config['at_navigation']['class_a'] = 'link-item';

$config['at_navigation']['exclude']['single'] = array('a/site', 'another/site');
$config['at_navigation']['exclude']['folder'] = array('a/folder', 'another/folder');
