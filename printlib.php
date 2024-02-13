<?php
define("MAX_CHAR", 32);
define("MAX_STR", 32);
define("ESC", "\x1b");
define("GS", "\x1d");
define("LF", "\x0a");
define("PORT", "/dev/usb/lp0");
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
function printcode128($data) {}
function printean13($data) {}
function printean8($data) {}
?>