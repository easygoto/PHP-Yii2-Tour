### YII2 BASIC 源码之旅

#### 路由

##### 路由规则

> 1. 在处理 Request 的时候, 会用到配置文件中预定义的规则

> 2. 只有开启 enablePrettyUrl, 会从所有的规则中遍历, 只返回最开始匹配到的规则
```
Yii::$app->getUrlManager()->parseRequest($this);
```

> 3. 若开启 enableStrictParsing, 代表如果不在规则列表中即返回 false, 若关闭则会从普通的规则列表中寻找

> 4. url 是通过 UrlRule 来解析的, 网址会转成小写, 且路由会转成相应的正则表达式. 例如  api/v1/user/(<id:\d+> 会转成 #^api/v1/user/(?P<abf396750>\d+)$#u 的正则表达式

