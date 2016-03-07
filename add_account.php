<?php

/* add_account.php
 * add an account */

/* shared functions */
require 'financial_planning.php';

/* display html page header */
display_header();

/* display and process add account form */
if (!submitted()) {
    /* display add account form */
    print_file('add_account.html');
} else {
    /* store data in an array */
    $array = $_POST;
    /* TODO: insert into database */
    /* temporarily display contents of array */
    echo '<pre>';
    print_r($array);
    echo '</pre>';
    echo '<a href="" class="btn btn-primary">Go back</a>';
}

/* display html page footer */
display_footer();

?>
