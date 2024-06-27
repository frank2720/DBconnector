<?php

require 'bootstrap.php';
$sql = file_get_contents($_ENV['DB_FILE_NAME']);

$statement = <<<EOS
$sql
EOS;

try {
    $createTable = $db -> exec($statement);
    echo "Succes!\n";
} catch (\PDOException $e) {
    exit($e->getMessage());
}
