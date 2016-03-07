<?php

/* financial_planning.php
 * shared functions */

function print_file($name) {
    print file_get_contents($name);
}

function display_header() {
    print_file('header.html');
}

function display_footer() {
    print_file('footer.html');
}

function submitted() {
    return ($_SERVER['REQUEST_METHOD'] == 'POST');
}

?>
