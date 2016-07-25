<?php
/**
 * Gather (gather.php) - A parser for PHP
 *
 * @author      Sevans Duamel <sevansd@gmail.com>
 * @copyright   (c) Sevans Duamel
 * @link        https://github.com/duamelgroup/gather
 * @license     MIT
 */
// Set some configuration values
ini_set('session.use_cookies', 0);      // Don't send headers when testing sessions
ini_set('session.cache_limiter', '');   // Don't send cache headers when testing sessions
// Load our autoloader, and add our Test class namespace
$autoloader = require(__DIR__ . '/../vendor/autoload.php');
$autoloader->add('Gather\Tests', __DIR__);
$autoloader->add('Gather\Tests\Library', __DIR__);