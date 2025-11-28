<?php
$db = __DIR__ . '/database/database.sqlite';
if (!file_exists($db)) {
    echo "DB NOT FOUND\n";
    exit(1);
}
try {
    $pdo = new PDO('sqlite:' . $db);
    $res = $pdo->query("SELECT name FROM sqlite_master WHERE type='table' AND name='conversations'");
    if ($res && $res->fetch(PDO::FETCH_ASSOC)) {
        echo "FOUND\n";
    } else {
        echo "NOT FOUND\n";
        $all = $pdo->query("SELECT name FROM sqlite_master WHERE type='table'")->fetchAll(PDO::FETCH_COLUMN);
        echo "Tables:\n";
        foreach ($all as $t) {
            echo $t . PHP_EOL;
        }
    }
} catch (Exception $e) {
    echo 'ERROR: ' . $e->getMessage() . PHP_EOL;
}
