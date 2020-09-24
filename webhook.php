<?php
use App\WebhookController;

require __DIR__ . '/bootstrap.php';

(new WebhookController())->handle();
