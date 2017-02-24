#!/usr/bin/php
<?php

chdir(dirname(__FILE__));
require_once 'common.php';
require_once '../tests/path2class.func.php';
require_once '../library/HTMLPurifier/Bootstrap.php';
assertCli();

/**
 * @file
 * Generates an include stub for users who do not want to use the autoloader.
 * When new files are added to HTML Purifier's main codebase, this file should
 * be called.
 */

chdir(dirname(__FILE__) . '/../library/');
$FS = new FSTools();

$exclude_dirs = array(
    'HTMLPurifier/Language/',
    'HTMLPurifier/ConfigSchema/',
    'HTMLPurifier/Filter/',
    'HTMLPurifier/Printer/',
    /* These should be excluded, but need to have ConfigSchema support first

    */
);
$exclude_files = array(
    'HTMLPurifier/Lexer/PEARSax3.php',
    'HTMLPurifier/Lexer/PH5P.php',
    'HTMLPurifier/Printer.php',
);

// Determine what files need to be included:
echo 'Scanning for files... ';
$raw_files = $FS->globr('.', '*.php');
if (!$raw_files) throw new Exception('Did not find any PHP source files');
$files = array();
foreach ($raw_files as $file) {
    $file = substr($file, 2); // rm leading './'
    if (strncmp('standalone/', $file, 11) === 0) continue; // rm generated files
    if (substr_count($file, '.') > 1) continue; // rm meta files
    $ok = true;
    foreach ($exclude_dirs as $dir) {
        if (strncmp($dir, $file, strlen($dir)) === 0) {
            $ok = false;
            break;
        }
    }
    if (!$ok) continue; // rm excluded directories
    if (in_array($file, $exclude_files)) continue; // rm excluded files
    $files[] = $file;
}
echo "done!\n";

// Reorder list so that dependencies are included first:

/**
 * Returns a lookup array of dependencies for a file.
 *
 * @note This functions expects that format $name extends $parent on one line
 *
 * @param string $file
 *      File to check dependencies of.
 * @return array
 *      Lookup array of files the file is dependent on, sorted accordingly.
 */
function get_dependency_lookup($file)
{
    static $cache = array();
    if (isset($cache[$file])) return $cache[$file];
    if (!file_exists($file)) {
        echo "File doesn't exist: $file\n";
        return array();
    }
    $fh = fopen($file, 'r');
    $deps = array();
    while (!feof($fh)) {
        $line = fgets($fh);
        if (strncmp('class', $line, 5) === 0) {
            // The implementation here is fragile and will break if we attempt
            // to use interfaces. Beware!
            $arr = explode(' extends ', trim($line, ' {'."\n\r"), 2);
            if (count($arr) < 2) break;
            $parent = $arr[1];
            $dep_file = HTMLPurifier_Bootstrap::getPath($parent);
            if (!$dep_file) break;
            $deps[$dep_file] = true;
            break;
        }
    }
    fclose($fh);
    foreach (array_keys($deps) as $file) {
        // Extra dependencies must come *before* base dependencies
        $deps = get_dependency_lookup($file) + $deps;
    }
    $cache[$file] = $deps;
    return $deps;
}

/**
 * Sorts files based on dependencies. This functions is lazy and will not
 * group files with dependencies together; it will merely ensure that a file
 * is never included before its dependencies are.
 *
 * @param $files
 *      Files array to sort.
 * @return
 *      Sorted array ($files is not modified by reference!)
 */
function dep_sort($files)
{
    $ret = array();
    $cache = array();
    foreach ($files as $file) {
        if (isset($cache[$file])) continue;
        $deps = get_dependency_lookup($file);
        foreach (array_keys($deps) as $dep) {
            if (!isset($cache[$dep])) {
                $ret[] = $dep;
                $cache[$dep] = true;
            }
        }
        $cache[$file] = true;
        $ret[] = $file;
    }
    return $ret;
}

$files = dep_sort($files);

// Build the actual include stub:

$version = trim(file_get_contents('../VERSION'));

// stub
$php = "<?php

/**
 * @file
 * This file was auto-generated by generate-includes.php and includes all of
 * the core files required by HTML Purifier. Use this if performance is a
 * primary concern and you are using an opcode cache. PLEASE DO NOT EDIT THIS
 * FILE, changes will be overwritten the next time the script is run.
 *
 * @version $version
 *
 * @warning
 *      You must *not* include any other HTML Purifier files before this file,
 *      because 'require' not 'require_once' is used.
 *
 * @warning
 *      This file requires that the include path contains the HTML Purifier
 *      library directory; this is not auto-set.
 */

";

foreach ($files as $file) {
    $php .= "require '$file';" . PHP_EOL;
}

echo "Writing HTMLPurifier.includes.php... ";
file_put_contents('HTMLPurifier.includes.php', $php);
echo "done!\n";

$php = "<?php

/**
 * @file
 * This file was auto-generated by generate-includes.php and includes all of
 * the core files required by HTML Purifier. This is a convenience stub that
 * includes all files using dirname(__FILE__) and require_once. PLEASE DO NOT
 * EDIT THIS FILE, changes will be overwritten the next time the script is run.
 *
 * Changes to include_path are not necessary.
 */

\$__dir = dirname(__FILE__);

";

foreach ($files as $file) {
    $php .= "require_once \$__dir . '/$file';" . PHP_EOL;
}

echo "Writing HTMLPurifier.safe-includes.php... ";
file_put_contents('HTMLPurifier.safe-includes.php', $php);
echo "done!\n";

// vim: et sw=4 sts=4
