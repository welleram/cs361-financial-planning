<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        include 'jsmith_functions.php';
        
        echo "test page";
        
        create_table_users($con);
        create_table_accounts($con);
        create_table_incomes($con);
        create_table_expenses($con);
        
        ?>
    </body>
</html>
