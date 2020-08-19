<p align="center">
    <a href="https://hyperf.io/" target="_blank">
        <img src="https://hyperf.oss-cn-hangzhou.aliyuncs.com/hyperf.png" height="100px">
    </a>
    <h1 align="center">Hyperf Jwt</h1>
    <br>
</p>

If You Like This Please Give Me Star

Install
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require lengbin/hyperf-jwt
```

or add

```
"lengbin/hyperf-jwt": "*"
```
to the require section of your `composer.json` file.


Request [详情](https://github.com/ice-leng/jwt)
-------
```
"lengbin/jwt": "dev-master"
```

Configs
-----
``` php
    /config/autoload/jwt.php
    
    return [
        'alg' => 'HMACSHA256',
        'key' => 'ice',
        // jwt 过期时间
        'exp' => 2 * 3600,
        // 刷新token 过期时间
        'ttl' => 24 * 3600 * 30,
        // 是否 单点登录
        'sso' => false
    ];
```


Publish
-------
```php
      
php ./bin/hyperf.php vendor:publish lengbin/hyperf-jwt

```

Usage
-----
```php

<?php

namespace App\Controller;

use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;
use Lengbin\Jwt\JwtInterface;

/**
 * Class IndexController
 * @package App\Controller
 * @Controller()
 */
class IndexController extends AbstractController
{

    /**
     * @Inject()
     * @var JwtInterface
     */
    public $jwt;

    /**
     * @RequestMapping(path="/", methods={"get", "post"})
     *
     * @return array
     */
    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();
        // 生成token
        $token = $this->jwt->makeToken([
             'method'  => $method,
             'message' => "Hello {$user}.",
         ]);
        // 生成 刷新token
        // $this->jwt->generate($exp);
        // 生成 刷新token
        // $this->jwt->generateRefreshToken();
        // 验证 获得自定义参数
        // $this->jwt->verifyToken($token);
        //注销
        // $this->jwt->logout();
        return [
            'method'  => $method,
            'message' => "Hello {$user}.",
            'token'   => $token,
        ];
    }

}

```
