<?php
require_once __DIR__ . '/koneksi.php';

session_name('INVENTARISSESSID');

$openSession = static function ($path, $name) {
    return true;
};

$closeSession = static function () {
    return true;
};

$readSession = static function ($id) use ($pdo) {
    $stmt = $pdo->prepare('SELECT session_data FROM app_sessions WHERE session_id = ?');
    $stmt->execute([$id]);
    $data = $stmt->fetchColumn();

    return $data === false ? '' : $data;
};

$writeSession = static function ($id, $data) use ($pdo) {
    $stmt = $pdo->prepare(
        'INSERT INTO app_sessions (session_id, session_data, last_activity)
         VALUES (?, ?, ?)
         ON CONFLICT (session_id) DO UPDATE
         SET session_data = EXCLUDED.session_data, last_activity = EXCLUDED.last_activity'
    );

    return $stmt->execute([$id, $data, time()]);
};

$destroySession = static function ($id) use ($pdo) {
    $stmt = $pdo->prepare('DELETE FROM app_sessions WHERE session_id = ?');
    return $stmt->execute([$id]);
};

$collectSessions = static function ($maxLifetime) use ($pdo) {
    $stmt = $pdo->prepare('DELETE FROM app_sessions WHERE last_activity < ?');
    $stmt->execute([time() - $maxLifetime]);
    return $stmt->rowCount();
};

session_set_save_handler(
    $openSession,
    $closeSession,
    $readSession,
    $writeSession,
    $destroySession,
    $collectSessions
);

register_shutdown_function('session_write_close');
session_start();