<?php
/**
 * Plugin boilerplate for phpMussel.
 *
 * PLUGIN INFORMATION BEGIN
 *         Plugin Name: Boilerplate v1.
 *       Plugin Author: Caleb M / Maikuolan.
 *      Plugin Version: 2.0.0
 *    Download Address: https://github.com/phpMussel/plugin-boilerplate-v1
 *     Min. Compatible: 1.0.0
 *     Max. Compatible: -
 *        Tested up to: 1.9.1
 *       Last Modified: 2019.03.19
 * PLUGIN INFORMATION END
 *
 * This is a boilerplate that can be used for writing plugins for phpMussel.
 * You should change the information listed under "PLUGIN INFORMATION" as per
 * appropriate, for identifying and describing your plugin. This information
 * isn't currently used by phpMussel in any way, but it could possibly be
 * useful for plugin management and other related purposes in the future. All
 * comments included in this file are to assist you in writing your plugin and
 * to explain the phpMussel plugin system, but don't need to be kept (i.e., you
 * can delete them later so that your plugin looks cleaner, if you want).
 */

/**
 * Prevents direct access (the plugin should only be called from the phpMussel
 * plugin system).
 */
if (!defined('phpMussel')) {
    die('[phpMussel] This should not be accessed directly.');
}

/**
 * You can write whatever you want for your plugin; The `plugin.php` file will
 * be required into phpMussel immediately after the `functions.php` file has
 * been required. Anything you don't want immediately executed at the time of
 * being required should be contained by functions or closures.
 *
 * To execute a function, class, or closure at a time other than when first
 * required into PHP, we register these functions and closures to a "plugin
 * hook", and you can do this by using the `$phpMussel['Register_Hook']`
 * closure, as demonstrated below.
 *
 * The `$phpMussel['Register_Hook']` closure accepts two parameters. The first
 * is a string, representing the name of the chosen function, class, or closure
 * to execute at the desired point in the script; The second is a string to
 * instruct phpMussel which "plugin hook" it should be registered to.
 */
$phpMussel['Register_Hook']('HelloWorld', 'before_html_out');

/**
 * In the example given, we're registering the `$HelloWorld()` closure to the
 * `before_html_out` plugin hook, meaning that the `$HelloWorld()` closure will
 * be executed at the point in the script where the `before_html_out` plugin
 * hook exists. The closure in question is inclued below, as an example.
 *
 * In this plugin example, the plugin prints "Hello World." to the screen of
 * the user whenever their uploads are denied, and then kills the request (thus
 * effectively replacing the default "Access Denied" page with a simple "Hello
 * World." message).
 *
 * When you've finished your plugin and you're ready to deploy it, it should be
 * deployed to a directory as follows: %vault%/plugins/%pluginName%/*
 *
 * Where %vault% is the path to the phpMussel vault directory and %pluginName%
 * is the name of a directory (usually, the name of the plugin) for containing
 * all of your plugin files and data.
 *
 * Currently available hooks and their description (listed by execution order):
 *
 * after_scan - Executed during scan iteration, after completing each
 *      individual scan (not accounting for archives). Not triggered if
 *      phpMussel prematurely terminates.
 *
 * after_vt - Executed immediately after the code responsible for performing
 *      API lookups to Virus Total.
 *
 * ArchiveRecursor_start - Executed whenever the archive recursor is called.
 *
 * before_chameleon_detections - Executed immediately before the code
 *      responsible for handling chameleon attack detections.
 *
 * before_domains_api_lookup - Executed immediately before the code responsible
 *      for performing API lookups to check domains and URLs detected within
 *      data being scanned.
 *
 * before_html_out - Executed after completing the scan of file uploads,
 *      if/when a file upload is to be blocked, immediately before displaying
 *      the "Upload Denied" message. Not triggered when using CLI, and not
 *      triggered if nothing is to be blocked.
 *
 * before_scan - Executed during scan iteration, before beginning each
 *      individual scan (not accounting for archives).
 *
 * before_vt - Executed immediately before the code responsible for performing
 *      API lookups to Virus Total.
 *
 * DataHandler_start - Executed whenever the data handler is called.
 *
 * during_scan - Executed during each individual scan, before cycling through
 *      any of the signature files.
 *
 * frontend_before - Executed whenever the front-end is accessed.
 *
 * MetaDataScan_start - Executed whenever the metadata scanner is called.
 *
 * new_sigfile - Executed when phpMussel begins working through a new signature
 *      file during the scan process.
 *
 * new_sigfile_type - Executed when phpMussel checks over a new particular type
 *      or class of signature files, in preparation to begin working through
 *      all the signature files of that particular type or class.
 *
 * Recursor_start - Executed whenever the recursor is called.
 *
 * If you don't see what you need in the list above, additional hooks can be
 * requested via the issues page of the boilerplate repository or via the
 * issues page of the phpMussel repository.
 */
$HelloWorld = function () {
    echo 'Hello World.';
    die;
};
