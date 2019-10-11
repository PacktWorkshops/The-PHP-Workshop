<?php

require 'MailingListRecipient.php';

$recipient = new MailingListRecipient('jdoe@acme.com','John','Doe');

$requestBody = json_encode($recipient);
echo $requestBody.PHP_EOL;
