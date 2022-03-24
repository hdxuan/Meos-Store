<?php

// Define App Directories
defined('ROOT') ?: define('ROOT', dirname(dirname(__DIR__))); // ổ đĩa 

defined('DS') ?: define('DS', DIRECTORY_SEPARATOR);

defined('APP') ?: define('APP', ROOT . DS . 'App');
defined('CONF') ?: define('CONF', APP . DS . 'Configs');
defined('CONT') ?: define('CONT', APP . DS . 'Controllers');
defined('CORE') ?: define('CORE', APP . DS . 'Core');
defined('MODEL') ?: define('MODEL', APP . DS . 'Models');
defined('VIEW') ?: define('VIEW', APP . DS . 'Views');
defined('PUBLIC_DIR_IMAGES') ?:  define('PUBLIC_DIR_IMAGES', ROOT . DS . 'public' . DS . 'img'); // lấy hình vào


// databases constant-- k thay đổi
$database = require(CONF . DS . 'database.php');

defined('DB_HOSTNAME') ?: define('DB_HOSTNAME', $database['db_hostname']);
defined('DB_USERNAME') ?: define('DB_USERNAME', $database['db_username']);
defined('DB_PASSWORD') ?: define('DB_PASSWORD', $database['db_password']);
defined('DB_NAME') ?: define('DB_NAME', $database['db_name']);

// require file 

require_once(CORE . DS . "App.php");
require_once(CORE . DS . "Controller.php");
require_once(CORE . DS . "Database.php");

//navigation constant
$site = require(CONF . DS . 'site.php');
defined('SITE') ?: define('SITE', $site);

defined('DOCUMENT_ROOT') ?:  define('DOCUMENT_ROOT', SITE['document Root']);
defined('PUBLIC_URL') ?: define('PUBLIC_URL', DOCUMENT_ROOT . '/public'); // lấy dữ liệu ra
defined('IMAGES_URL') ?:  define('IMAGES_URL', PUBLIC_URL .  '/img');

// defined('UPLOAD_URL') ?:  define('UPLOAD_URL', PUBLIC_URL .  '/uploads');
// defined('AVATAR_URL') ?:  define('AVATAR_URL', PUBLIC_URL .  '/uploads/avatar');


defined('IMAGES_PRODUCT_URL') ?:  define('IMAGES_PRODUCT_URL', PUBLIC_URL . '/img/products');
defined('IMAGES_BLOG_URL') ?:  define('IMAGES_BLOG_URL', PUBLIC_URL . '/img/blogs');
defined('IMAGES_MENU_URL') ?:  define('IMAGES_MENU_URL', PUBLIC_URL . '/img/menu');

defined('ICONS_URL') ?:  define('ICONS_URL', PUBLIC_URL . '/img/icons');
defined('IMAGES_CATEGORY_URL') ?:  define('IMAGES_CATEGORY_URL', PUBLIC_URL . '/img/categories');

// sidebar admin
$adminSide = require(CONF . DS . "admin_sidebar.php");
defined('ADMIN_SIDEBAR') ?: define('ADMIN_SIDEBAR', $adminSide);
