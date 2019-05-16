# YII2 BASIC 源码之旅

## 心得(以后再整理系列)

```php
vendor/yiisoft/yii2/web/Application.php->handleRequest:
    1. 判断 $this->catchAll 是否要拦截所有页面
    2. 解析网址和参数
    3. 通过 $this->runAction($route, $params) 运行 route

vendor/yiisoft/yii2/web/Request.php->resolve:
    1. 直接委托 Yii::$app->getUrlManager()->parseRequest($this) 来处理网址
    2. $_GET = $params + $_GET, 存疑点: 数组相加是合并?

vendor/yiisoft/yii2/web/UrlManager.php->parseRequest:
    1. $this->enablePrettyUrl 两条路. false 是根据网址, true 是根据路由列表
    2. 如果根据路由列表, 框架会遍历所有路由, 根据正则匹配(貌似是最左匹配原则), 交给路由对象自己来处理(UrlRule->parseRequest)
        2.1 buildRules: 生成路由规则, 规则为 "/^((?:(GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS),)*(GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS))\\s+(.*)$/"
        2.2 组件的路由优先匹配
    3. 列表中没有匹配到, 若开启 enableStrictParsing, 则立即返回 false, 若关闭, 还会去 normalizer 组件中寻找

vendor/yiisoft/yii2/web/UrlRule.php->parseRequest:
    1. 规则和 mode 设置相关, PARSING_ONLY, CREATION_ONLY 等, 一些简单的处理
```
