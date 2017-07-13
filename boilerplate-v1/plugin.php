<?php
/**
 * Plugin boilerplate for phpMussel.
 *
 * PLUGIN INFORMATION BEGIN
 *         Plugin Name: Boilerplate v1.
 *       Plugin Author: Caleb M / Maikuolan.
 *      Plugin Version: 2.0.0
 *    Download Address: https://github.com/phpMussel/plugin-boilerplate-v1
 *     Min. Compatible: 1.0.0-DEV+20170713
 *     Max. Compatible: -
 *        Tested up to: 1.0.0-DEV+20170713
 *       Last Modified: 2017.07.13
 * PLUGIN INFORMATION END
 *
 * This is a boilerplate that can be used for writing plugins for phpMussel.
 * You should change the information listed under "PLUGIN INFORMATION" as per
 * appropriate, for identifying and describing your plugin. Currently, this
 * information isn't parsed or used by phpMussel in any way, but, it's possible
 * this may change in the future, or, it could be potentially useful for plugin
 * management and other organisational purposes. All comments included in this
 * file are to assist you in writing your plugin and to explain the phpMussel
 * plugin system.
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
 * To execute a function or closure at a time other than the time of being
 * required, we register these functions and closures to a "plugin hook", and
 * you can do this by using the `$phpMussel['Register_Hook']` closure, as per
 * demonstrated herein.
 *
 * The `$phpMussel['Register_Hook']` closure accepts two parameters. The first
 * is a string, representing the name of the chosen function or closure to
 * execute at the desired point in the script; The second is a string to
 * instruct phpMussel which "plugin hook" it should register your function or
 * closure to.
 */
$phpMussel['Register_Hook']('HelloWorld', 'before_html_out');

/**
 * In the example given, we're registering the `$HelloWorld()` closure to the
 * `before_html_out` plugin hook, meaning that the `$HelloWorld()` closure will
 * be executed at the point in the script where the `before_html_out` plugin
 * hook exists.
 *
 * Below (after this phpDoc comment), is the aforementioned `$HelloWorld()`
 * closure, included as a demonstration.
 *
 * The `$phpMussel['Register_Hook']` closure can be called either before or
 * after the function or closure to be hooked; The order doesn't matter.
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
 * before_scan            - Executed during scan iteration, before beginning
 *                          each individual scan (not accounting for archives).
 *
 * during_scan            - Executed during each individual scan, before
 *                          cycling through any of the signature files.
 *
 * after_vt               - Executed during each individual scan, immediately
 *                          after the Virus Total API checks. Not triggered if
 *                          phpMussel prematurely terminates.
 *
 * after_scan             - Executed during scan iteration, after completing
 *                          each individual scan (not accounting for archives).
 *                          Not triggered if phpMussel prematurely terminates.
 *
 * before_html_out        - Executed after completing the scan of file uploads,
 *                          if/when a file upload is to be blocked, immediately
 *                          before displaying the "Upload Denied" message. Not
 *                          triggered when using CLI, and not triggered if
 *                          nothing is to be blocked.
 *
 * after_phpmussel        - Executed immediately before phpMussel normally
 *                          terminates. Not triggered if phpMussel prematurely
 *                          terminates.
 *
 * If you don't see what you need in the list above, additional hooks can be
 * requested via the issues page of the boilerplate repository or via the
 * issues page of the phpMussel repository.
 */
$HelloWorld = function () {
    echo 'Hello World.';
    die;
};
