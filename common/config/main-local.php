<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;port=8888;dbname=speedLinkDB;unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
//  On Line
// return [
//     'components' => [
//         'db' => [
//             'class' => 'yii\db\Connection',
//             'dsn' => 'mysql:host=fdb6.awardspace.net;port=3306;dbname=2509450_speedlink',
//             'username' => '2509450_speedlink',
//             'password' => 'speedLink2017',
//             'charset' => 'utf8',
//         ],
//         'mailer' => [
//             'class' => 'yii\swiftmailer\Mailer',
//             'viewPath' => '@common/mail',
//             // send all mails to a file by default. You have to set
//             // 'useFileTransport' to false and configure a transport
//             // for the mailer to send real emails.
//             'useFileTransport' => true,
//         ],
//     ],
// ];
