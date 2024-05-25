<?php
$ts_pw = posix_getpwuid(posix_getuid());
$ts_mycnf = parse_ini_file($ts_pw['dir'] . "/replica.my.cnf");
$mysqli = new mysqli('enwiki.analytics.db.svc.wikimedia.cloud', $ts_mycnf['user'], $ts_mycnf['password'], 'enwiki_p');
unset($ts_mycnf, $ts_pw);

$stmt = $mysqli->prepare('select * from page where page_id = ?');
$id = 843020;
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
print_r($result->fetch_all(MYSQLI_BOTH));
?>
