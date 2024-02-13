<?php
define("MAX_CHAR", 32);
define("MAX_STR", 32);
define("ESC", "\x1b");
define("GS", "\x1d");
define("LF", "\x0a");
define("PORT", "/dev/usb/lp0");
function rawlen($data) {}
function initprint() {
    return file_put_contents(PORT, ESC . "@");
}
function println($data) {
    if (strlen($data)<MAX_CHAR) {
        return file_put_contents(PORT, $data . LF);
    } else {
        return false;
    }
}
function printcode39($data) {}
function printcode128($data) {
    $lp=fopen(PORT, 'w');
    fwrite($lp, "\x1b@");
    fwrite($lp, "\x1dh\x50");
    fwrite($lp, "\x1dH\x02");
    fwrite($lp, "\x1df\x01");
    fwrite($lp, "\x1dk\x49");
    fwrite($lp, rawlen($data))
    fwrite($lp, $data);
    fwrite($lp, "\x0a");
    fclose($lp);
}
function printean13($data) {}
function printean8($data) {}
?>