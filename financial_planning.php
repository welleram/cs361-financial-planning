<?php

/* financial_planning.php
 * shared functions */

function print_file($name) {
    print file_get_contents($name);
}

function display_header() {
    print_file('header.html');
}

function display_header_login() {
    print_file('header_login.html');
}

function display_footer() {
    print_file('footer.html');
}



?>
