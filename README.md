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
use Lengbin\Jwt\TokenInterface;

/**
 * Class IndexController
 * @package App\Controller
 * @Controller()
 */
class IndexController extends AbstractController
{

    /**
     * @Inject()
     * @var TokenInterface
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
        //生成 刷新token
        // $exp = 11122;
        // $this->jwt->makeRefreshToken($exp);
        //验证
        // $this->jwt->verify($token);
        // 获得自定义参数
        // $this->jwt->getParams();
        //刷新token
        // $this->jwt->refreshToken();
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
