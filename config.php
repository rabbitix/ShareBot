<?php
require "Telegram.php";
require "TelegramErrorLogger.php";
$configFile = file_get_contents(__DIR__ . '/cereditional.json');
$config = json_decode($configFile);
$token = $config->token;
$chnl_id = $config->channel_id;

define("TOKEN", $token);
define("CHANNEL_ID", $chnl_id);

$bot = new Telegram(TOKEN);
$content = array(
    'chat_id' => CHANNEL_ID,
    'text' => '',
    'disable_notification' => true
);
function send_link($link)
{
    global $content;
    global $bot;
    $content['text'] = $link;

    return $bot->sendMessage($content);
}