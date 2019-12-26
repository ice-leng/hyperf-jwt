<?php
return [
    //加密类型, 支持类型请看 supportedAlgs
    'alg'        => 256,
    //私钥，可以是字符串也可以是文件路径
    'privateKey' => '',
    //公钥，可以是字符串也可以是文件路径
    'publicKey'  => '',
    //key,
    'key'        => 'ice',
    //发行人
    'iss'        => '',
    //接受者
    'aud'        => '',
    //在多少秒之前不可使用
    'nbf'        => 0,
    //过期时间
    'exp'        => 7200,
    // 黑名单缓存类，
    'cache'      => \Hyperf\Cache\Cache::class,
];
