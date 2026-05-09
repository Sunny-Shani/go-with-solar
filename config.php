<?php

require_once __DIR__ . '/app/Database/Connection.php';

try {
    $conn = Connection::mysqli();
} catch (Throwable $exception) {
    error_log('Database connection failed: ' . $exception->getMessage());
    echo '<div class="alert alert-danger d-flex align-items-center mb-0" role="alert">
  <div>Something went wrong! Try again later. Error code: 401 config</div>
</div>';
}
