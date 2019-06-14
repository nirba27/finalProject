<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'mail\vendor\autoload.php';
use \Mailjet\Resources;

$apikey = 'd65de45897d6faaa2da6b71797a05b5e';
$apisecret = 'f52b5942f5dc53903511c7fa240693b9';

$mj = new \Mailjet\Client(($apikey), ($apisecret),true,['version' => 'v3.1']);
$body = [
    'Messages' => [
        [
            'From' => [
                'Email' => "nirbenami27@gmail.com",
                'Name' => "Me"
            ],
            'To' => [
                [
                    'Email' => "nirba27@gmail.com",
                    'Name' => "You"
                ]
            ],
            'Subject' => "My first Mailjet Email!",
            'TextPart' => "Greetings from Mailjet!",
            'HTMLPart' => "<h3>Dear passenger 1, welcome to <a href=\"https://www.mailjet.com/\">Mailjet</a>!</h3><br />May the delivery force be with you!"
        ]
    ]
];
$response = $mj->post(Resources::$Email, ['body' => $body]);
$response->success() && var_dump($response->getData());
?>
Then use the code sample to send a message.

Example API Response:

{
"Messages": [
{
"Status": "success",
"To": [
{
"Email": "passenger@mailjet.com",
"MessageUUID": "1ab23cd4-e567-8901-2345-6789f0gh1i2j",
"MessageID": "1234567890987654321",
"MessageHref": "https://api.mailjet.com/v3/message/1234567890987654321"
}
],
}
]
}
