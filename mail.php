<?php


if (isset($_POST['submit'])) {

    $user_name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    $emailFrom = trim(filter_input(INPUT_POST, 'emailFrom', FILTER_SANITIZE_EMAIL));
    $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    $message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    $message .= "\n\n" . $user_name . ' - ' . $phone;
    $headers = 'From: ' . $emailFrom;
    $mailTo = 'main@tlvtv.co.il';

    mail($mailTo, $user_name, $message, $headers);

    header("Location: ./page-contact.html?mail=sent");
} else {

    header("Location: ./page-contact.html?mail=not_sent");
}
