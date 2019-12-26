<p align="center">
    <a href="https://hyperf.io/" target="_blank">
        <img src="https://hyperf.oss-cn-hangzhou.aliyuncs.com/hyperf.png" height="100px">
    </a>
    <h1 align="center">Hyperf Swagger</h1>
    <br>
</p>

If You Like This Please Give Me Star

Install
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require lengbin/hyperf-swagger
```

or add

```
"lengbin/hyperf-swagger": "*"
```
to the require section of your `composer.json` file.


Request
-------
```
"zircote/swagger-php": "2.0.14"
```

If want to test api .
Please look [annocation](https://blog.csdn.net/dyt19941205/article/details/79025266)


Configs
-----
``` php
    /config/autoload/server.php
    
    return [
        ......
        
        settings => [
            ......
        
            // 静态资源
            'document_root' => BASE_PATH . '/public',
            'static_handler_locations' => ['/'],
            'enable_static_handler' => true,

            ......
        ],

        ......
    ]
```

Publish
-------
```php
      
php ./bin/hyperf.php vendor:publish lengbin/hyperf-swagger

```

Usage
-----
```php

<?php

namespace App\Controller;

use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;
use Lengbin\Hyperf\Swagger\Swagger;

/**
 * Class SwaggerController
 * @package App\Controller
 * @Controller()
 */
class SwaggerController extends AbstractController
{

    /**
     * @Inject()
     * @var Swagger
     */
    public $swagger;

    /**
     * @GetMapping(path="/swaager")
     */
    public function index()
    {
        return $this->swagger->html();
    }

    /**
     * @GetMapping(path="/swagger/api")
     */
    public function api()
    {
        // 扫码目录path
        $path = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'swagger';
        return $this->swagger->api([
            $path,
        ]);
    }
    
    /**
     * @GetMapping(path="/swagger/generator")
     */
    public function generator()
    {
        return $this->swagger->generator($this->request);
    }

    /**
     * @RequestMapping(path="/swagger/annotation", methods={"GET", "POST"})
     */
    public function annotation()
    {
        // 扫码目录path, 生成注释文档目录
        $path = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'swagger';
        return ['code' => 0, 'message' => 'Success', 'data' => $this->swagger->annotation($this->request, $path)];
    }

}

```

Todo list
--------
 - [x] Swagger Ui2
 - [x] Swagger Ui3
 - [x] Read Swaager Annotation Generator Openapi
 - [x] [Swaager Generator Annotation](https://github.com/ice-leng/vue-swagger)
 - [ ] Other Swagger Ui Theme


Screenshots
-----------
![SwaggerUi3](./image/SwaggerUi3.0.png)
![SwaggerUi2](./image/SwaggerUi2.0.jpg)
![main](./image/main.png)
![definition](./image/definition.png)
