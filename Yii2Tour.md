# 源码之旅

## "研途"存疑点

- [x] `\yii\base\Module::runAction` 为何使用 oldController 把当前的 controller 保存起来?
    - 是因为之后的操作会改变其 controllerId, 先把保护起来, 防止本控制器中的 id 被其他的控制器更改
    - 控制器中的 runAction 也是同样处理 actionId, 先把它保护起来, 因为 runAction 用的非常普遍, 很容易就被其他的方法改掉

## 执行过程研究

### 请求层面

```
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

### 路由层面

> \yii\web\Application::handleRequest
>
> \yii\base\Module::runAction
>
> \yii\base\Controller::runAction
>
> \yii\base\InlineAction::runWithParams

1. 接受一个 Request 返回一个 Response
1. 调用 Request 解析网址和参数, 拿到结果通过 runAction 寻找控制器(优先匹配非模块中的控制器)
1. 通过控制器的 runAction 寻找动作, actionId 被限制成 `/^(?:[a-z0-9_]+-)*[a-z0-9_]+$/`
1. 找到其模块所有的 beforeAction, 依次执行
1. 使用 `call_user_func_array(...)` 执行自己的方法
1. 依次执行其模块所有的 afterAction

## 数据验证器

[数据验证器的文件夹](vendor/yiisoft/yii2/validators)

1. 默认所有的验证器都在此文件夹下, 可以自定义 Validator, Validator 中 $builtInValidators 定义类型和验证器的映射
1. on/except 可以根据场景决定 使用/不使用 某验证器, 场景可以根据 scenarios 属性来指定
1. 对于各验证器的 message 属性, {attribute} 代表着 Model::attributeLabels 中定义的属性, {value} 代表着 Model 的当前值

