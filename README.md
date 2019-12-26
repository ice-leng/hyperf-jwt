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


Request
-------
```
"lengbin/jwt": "dev-master"
```

If want to test api .
Please look [annocation](https://blog.csdn.net/dyt19941205/article/details/79025266)


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
use Lengbin\Jwt\OauthInterface;

/**
 * Class IndexController
 * @package App\Controller
 * @Controller()
 */
class IndexController extends AbstractController
{

    /**
     * @Inject()
     * @var OauthInterface
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
        $token = $this->jwt->makeToken([
             'method'  => $method,
             'message' => "Hello {$user}.",
         ]);

        // $this->jwt->makeRefreshToken(11122);
        // $this->jwt->verify($token);
        // $this->jwt->claimsAsArray();
        // $this->jwt->refreshToken();
        // $this->jwt->logout();
        return [
            'method'  => $method,
            'message' => "Hello {$user}.",
            'token'   => $token,
        ];
    }

}


```
