<?php
/**
 * Plugin boilerplate for phpMussel.
 *
 * PLUGIN INFORMATION BEGIN
 *         Plugin Name: Boilerplate v1.
 *       Plugin Author: Caleb M / Maikuolan.
 *      Plugin Version: 1.0.2
 *    Download Address: https://github.com/phpMussel/plugin-boilerplate-v1
 *     Min. Compatible: 1.0.0-DEV
 *     Max. Compatible: -
 *        Tested up to: 1.0.0-DEV
 *       Last Modified: 2016.10.12
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
 * The `$phpMussel['Register_Hook']` closure accepts three parameters. The
 * first is a string, representing the name of the chosen function or closure
 * to execute at the desired point in the script; The second is a string to
 * instruct phpMussel which "plugin hook" it should register your function or
 * closure to; The third is an optional string or array of strings representing
 * which variables need to be parsed to your function or closure from the scope
 * that it'll be executed from (though take in mind that for functions, you can
 * call or reference $phpMussel by using the "global" statement within your
 * function, and for closures, you can call or reference $phpMussel by using
 * the "use" feature of closures, and so, it isn't always necessary to "parse
 * in" variables from the calling scope via this third input).
 */
$phpMussel['Register_Hook']('HelloWorld', 'before_html_out');

/**
 * In the example given, we're registering the `$HelloWorld()` closure to the
 * `before_html_out` plugin hook, meaning that the `$HelloWorld()` closure will
 * be executed at the point in the script where the `before_html_out` plugin
 * hook exists. Our `$HelloWorld()` closure doesn't require any external
 * variables, so, in this case, we're omitting the optional third parameter of
 * the `$phpMussel['Register_Hook']` closure.
 *
 * Below (after this phpDoc comment), is the aforementioned `$HelloWorld()`
 * closure, included as a demonstration.
 *
 * Before that, though, let's assume that we actually did need to parse in a
 * variable to our closure, and let's assume this variable is named `$input`.
 * We could do this like this:
 *
 * `$phpMussel['Register_Hook']('HelloWorld', 'before_html_out', 'input');`
 *
 * Or alternatively, let's assume that we needed to parse in three different
 * variables, respectively named `$param1`, `$param2` and `$param3`. This, we
 * could do this like this:
 *
 * `$phpMussel['Register_Hook']('HelloWorld', 'before_html_out', array('param1', 'param2' ,'param3'));`
 *
 * This optional third parameter is always parsed as an numeric array of the
 * names of the variables being parsed to the function or closure, or as a
 * string containing the name of the single variable being parsed to the
 * function or closure. Any non-array data returned will be discarded by the
 * script, whereas any array data returned will be parsed back to the original
 * scope as variables, whereby the element keys represent the variable names
 * and the element values represent the variable values (note, though, that
 * when parsing variables back to the `$phpMussel` global, it's simpler and
 * easier to just declare `$phpMussel` as a global using a "global" statement
 * for in the case of functions, or, for in the case of closures, making use of
 * the "use" feature of closures, to reference back to `$phpMussel`, rather
 * than relying on the behaviour of the plugin system for handling returned
 * values).
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
 *                          The scope is the `phpMusselR()` function.
 *
 * during_scan            - Executed during each individual scan, before
 *                          cycling through any of the signature files. The
 *                          scope is the `phpMusselD()` function.
 *
 * after_vt               - Executed during each individual scan, immediately
 *                          after the Virus Total API checks. The scope is the
 *                          `phpMusselD()` function. Not triggered if phpMussel
 *                          prematurely terminates.
 *
 * after_scan             - Executed during scan iteration, after completing
 *                          each individual scan (not accounting for archives).
 *                          The scope is the `phpMussel()` function. Not
 *                          triggered if phpMussel prematurely terminates.
 *
 * before_html_out        - Executed after completing the scan of file uploads,
 *                          if/when a file upload is to be blocked, immediately
 *                          before displaying the "Upload Denied" message. The
 *                          scope is global. Not triggered when using CLI, and
 *                          not triggered if nothing is to be blocked.
 *
 * after_phpmussel        - Executed immediately before phpMussel normally
 *                          terminates. The scope is global. Not triggered if
 *                          phpMussel prematurely terminates.
 *
 * If you don't see what you need in the list above, additional hooks can be
 * requested via the issues page of the boilerplate repository or via the
 * issues page of the phpMussel repository.
 *
 * @param array $input A numeric array, containing one string, which matches
 *      the contents of the $hello variable, as per its state from the calling
 *      scope of the registered hook.
 * @return array An array containing a single string, which is a modified copy
 *      of the original $hello variable.
 */
$HelloWorld = function () {
    echo 'Hello World.';
    die;
};

/**
 * Or alternatively, if we wanted to return some values to the calling scope,
 * rather than simply killing the request, we could do this:
 *
 * $HelloWorld = function () {
 *     echo 'Hello World.';
 *     $value1 = 'AAA';
 *     $value2 = 'BBB';
 *     $value3 = 'CCC';
 *     return array('value1' => $value1, 'value2' => $value2, 'value3' => $value3);
 * };
 *
 * And if we needed to parse in some variable (let's say, for example, we
 * needed to parse in a variable named "foo", append the number 42 to it, and
 * then return the value of "foo" back to the calling scope), we could do this:
 *
 * $HelloWorld = function ($input) {
 *     // Use of the parameter name "input" is arbitrary, but remember that
 *     // this data is always parsed in as a numeric array, and so, to get
 *     // "foo", we need to look for it in our array. Let's assume our array
 *     // only contains 1 key-value pair.
 *     echo 'Hello World.';
 *     $foo = $input[0];
 *     $foo += 42;
 *     return array('foo' => $foo);
 * };
 */
