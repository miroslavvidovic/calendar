<?php
require_once __DIR__. '/../../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include __DIR__ . '/../../web/WorkEventForm.php';
}
else {
  include __DIR__ . '/DFormData.php';
}

?>