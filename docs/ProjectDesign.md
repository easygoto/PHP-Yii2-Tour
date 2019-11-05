### 软件架构

```puml
@startwbs
* 传统系统分层结构
** Model(数据)
** Controller(控制器)
*** Route(路由)
*** Service(服务)
** View(页面)
@endwbs
```

```puml
@startwbs
* 计划业务分层结构
** 后端业务分层结构
*** Model(数据层)
*** Service(业务逻辑)
*** Route(地址映射)
** 前端业务分层结构
*** Model(数据及数据转换层)
*** Component(页面及组件)
@endwbs
```

```puml
@startwbs
* 全局工具
** Container: 全局变量
** Component: 有依赖关系
** Library: 无依赖关系的单一功能
** Helper: 业务相关的工具
@endwbs
```

### 目标

- [x] 查询列表 sort 代表排序, 传输字段名称, 多个名称使用 "," 分割, "-" 代表倒序
- [ ] 前后端均用 json 传输参数, json 中键名均用驼峰式命名, 数值均为强类型
- [x] 只返回需要返回给前端的字段, 拒绝冗余/敏感字段传输给前端
- [ ] 添加/编辑/删除必须增加操作日志, 查看按情况增加操作日志
- [ ] 改变其他的参数不得改变接口本身的作用, 操作若涉及多功能必须在后端封装成一个事务安全的接口
- [ ] 后端所有业务功能均使用 Result 传输, 需要一个检查链

### 组件

#### BaseService

- allByAttr
- lists
- listsByAttr
- exists
- existsByAttr
- get
- getByAttr
- save
- add
- edit
- editByAttr
- delete
- deleteByAttr



