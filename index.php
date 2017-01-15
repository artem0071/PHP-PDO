<?php

require 'DB.php';

$DB = new DB(require 'config.php');

echo 'SELECT:<br/>';


// to SELECT from DB
$select = $DB->select('test');
var_dump($select);

// to INSERT in DB
$DB->insert('test',
        [
            'test_text' => 'Example_Text'
        ]);

// to UPDATE DB
$DB->update('test',
        [
            'test_text' => 'Changed_Text'
        ],
        [
            'test_id' => '1'
        ]);

// to DELETE from DB
$DB->delete('test',
        [
           'test_text' => 'Example_text'
        ]);