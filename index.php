<?php

/* index.php
 * main application page */

/* shared functions */
require 'financial_planning.php';

/* display html page header */
print_file('header_login.html');

/* display main page */
print_file('index.html');

/* display html page footer */
display_footer();

?>
