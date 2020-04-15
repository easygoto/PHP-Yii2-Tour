## 自定义设计思路

- [模块分离](README.md#1-模块分离)
- [基础组件](README.md#2-基础组件)
    - [有代码提示的Yii::$app](README.md#21-有代码提示的-application)
    - [二次封装的服务](README.md#22-二次封装的服务)
    - [错误信息管理](README.md#23-错误信息管理)
- [个性化的Gii组件](README.md#3-gen-组件)
- [API文档](README.md#4-注释文档)

### 1 模块分离

```
后台设计具体流程
Request
  └-> 路由 RouteRule
    └-> 校验是否登录 CheckTokenFilter
      └-> 校验参数合法性 Validator
        └-> 流程链条 ProcessChain
          └-> 基础服务方法 BaseService
            └-> 结果注入 InjectionTool
              └-> 日志记录器 LogBehaviors
                └-> 返回结果 ReturnResult
                  └-> Response
```

```
传统的 MVC 分层架构
  |-- Model(数据)
    |-- Service(服务, 大型网站)
  |-- Controller(控制器)
    |-- Route(路由, Laravel)
  |-- View(页面)
    |-- (大型网站前端独成体系)

计划业务分层结构
  |-- 后端业务分层结构
    |-- Orm(数据模型映射层)
    |-- Service(主要业务逻辑层)
    |-- Route(路由映射控制器层)
  |-- 前端结构
    |-- (大型网站前端独成体系)
```

```
modules/dawn: 测试使用的模块,公用模块
modules/gen: 经过改变的代码生成器
modules/oa: 本是OA系统,可细分成用户/云盘/办公/客户/行政/流程等模块(后续分离)
```

> 目标

- [x] 查询列表 sort 代表排序, 传输字段名称, 多个名称使用 "," 分割, "-" 代表倒序
- [x] 前后端均用 json 传输参数, json 中键名均用驼峰式命名, 数值均为强类型
- [x] 只返回需要返回给前端的字段, 拒绝冗余/敏感字段传输给前端
- [ ] 添加/编辑/删除必须增加操作日志, 查看按情况增加操作日志
- [ ] 改变其他的参数不得改变接口本身的作用, 操作若涉及多功能必须在后端封装成一个事务安全的接口
- [ ] 后端所有业务功能均使用 Result 传输, 需要一个检查链

### 2 基础组件

#### 2.1 有代码提示的 Application

> Yii 框架的组件使用的是服务定位模式, 没有组件的代码提示, 如 Yii::$app->redis 的方法在 IDE 中列举不出, 特意封装了 [app\web\Application](core/Application.php) 以增加代码提示

```php
$redis = \app\web\Yii::$app->redis;
$redis->get('test');
$redis->hmset('test_hash', 'key1', 'val1', 'key2', 'val2');
$redis->hmget('test_hash', 'key1', 'key2');
```

#### 2.2 二次封装的服务

> 因业务大部分是 CURD, 而 Model 层会根据数据库的表迭代相对不稳定, 所以就把一些基本的逻辑封装到 BaseService 中
>
> 抽象数据服务, 封装了增删改查大部分的逻辑, 采用 OO + 函数式编程, 源码为 [app\core\components](core/components/BaseService.php)
>
> 封装了处理结果(转换强类型, 包含/排除字段), 关键字筛选(条件/排序)等方法

- [ ] 后续 BaseService 转成 ServiceTrait
- [x] allByAttr 根据条件获取所有, 有条目限制
- [x] listsByAttr 根据条件获取列表
- [x] existsByAttr 根据条件判断是否存在
- [x] getByAttr 根据条件获取详情
- [ ] save 保存(无则添加, 有则编辑)
- [x] addOne 添加
- [ ] addAll 批量添加
- [x] editOneByAttr 根据条件编辑
- [ ] editAllByAttr 根据条件批量编辑
- [x] deleteOneByAttr 根据条件删除
- [ ] deleteAllByAttr 根据条件批量删除

```php
# 直接继承 BaseService, CURD 的写法会更简单
class GoodsService extends BaseService
{
    public function allNotDelete(array $keywords = [])
    {
        $keywords['is_delete'] = false;
        return $this->allByAttr($keywords, fn (ActiveQuery $query) => $this->handleFilter($query, $keywords));
    }
}
```

#### 2.3 错误信息管理

> 正常来说, 系统中必然有很多错误信息, 为了防止错误信息的变更或者多语言的支持, 所有的信息都将使用常量代替, 约定在 [app\core\containers\Message](core/containers/Message.php) 中定义
>
> 注意事项, ModelService 和 ModelMessage 有一定的耦合性, ./services/ModelService => ./containers/messages/ModelMessage
>
> prefix() 方法, 是设置错误信息前缀的方法

### 3 Gen 组件

> 个性化更改 gii 组件, 调整为适合自己的组件

### 4 注释文档

> 系统采用 Swagger 的注释和文档
