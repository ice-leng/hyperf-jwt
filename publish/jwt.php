<?php
return [
    'alg'    => 'HMACSHA256',
    'key'    => 'ice',
    // jwt 过期时间
    'exp'    => 2 * 3600,
    // 刷新token 过期时间
    'ttl'    => 24 * 3600 * 30,
    // 是否 单点登录
    'sso'    => false,
    //如果开启 单点登录，请设置 key
    'ssoKey' => 'id',
];
