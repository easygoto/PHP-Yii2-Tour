# 系统设计思路

## 模块分离

```
modules/dawn: 测试使用的模块,公用模块
modules/gen: 经过改变的代码生成器
modules/oa: 本是OA系统,可细分成用户/云盘/办公/客户/行政/流程等模块(后续分离)
```

## 基础组件/工具

```
core/components/BaseService.php
抽象数据服务, 封装了增删改查大部分的逻辑, 采用 OO + 函数式编程

core/RouteRule.php
路由定义层, 有基础 restful 风格的路由, 传统式的控制器/动作路由
```
