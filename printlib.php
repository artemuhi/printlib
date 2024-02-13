<?php
define("MAX_CHAR", 32);
define("MAX_STR", 32);
define("ESC", "\x1b");
define("GS", "\x1d");
define("LF", "\x0a");
define("PORT", "/dev/usb/lp0");
function rawlen($data) {
    if (strlen($data)<255 and strlen($data)<MAX_CHAR) {
        return hex2bin(dechex(strlen($data)));
    } else {
        return false;
    }
}
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
    if (rawlen($data)) {
        $lp=fopen(PORT, 'w');
        fwrite($lp, "\x1dh\x50");
        fwrite($lp, "\x1dH\x02");
        fwrite($lp, "\x1df\x01");
        fwrite($lp, "\x1dk\x49");
        fwrite($lp, rawlen($data));
        fwrite($lp, $data);
        fwrite($lp, "\x0a");
        fclose($lp);
        return true;
    } else {
        return false;
    }
}
function printean13($data) {}
function printean8($data) {}
?>