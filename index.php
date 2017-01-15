<?php

require 'DB.php';

$DB = new DB(require 'config.php');

echo 'SELECT:<br/>';

$select = $DB->select('test');

var_dump($select);
echo '<br/>';
echo 'INSERT: <br/>';

$DB->insert('test',
        [
            'test_text' => 'Example_Text'
        ]);
echo 'UPDATE: <br/>';

$DB->update('test',
        [
            'test_text' => 'Changed_Text'
        ],
        [
            'test_id' => '1'
        ]);
echo 'DELETE: <br/>';

$DB->delete('test',
        [
           'test_text' => 'Example_text'
        ]);