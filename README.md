# 介绍
原作者: https://github.com/flutterbest/easytbk

淘宝联盟、京东联盟、多多进宝、唯享客、苏宁推客SDK封装，该项目长期维护，如发现问题，请提交PR。

- 在原有的基础上升级到支持laravel9-laravel10
- 忽略掉了唯品会sdk报不符合规范错误
- 修复苏宁目录大小写问题

仅支持laravel5-laravel10，这不是可以直接拿来用的返利系统。


# 联系方式

微信：lc_wx_demo




# 安装
1、安装扩展包，该扩展包只支持laravel

```bash
composer require lccong/easytbk
```


2、执行下面的命令，然后修改config/easytbk.php

```bash
php artisan vendor:publish --provider "lccong\EasyTBK\ServiceProvider"
```

# 初始化SDK
每个平台SDK的具体调用方法参考各平台的文档

1、淘宝SDK初始化

```php
<?php
use lccong\EasyTBK\Factory;
use lccong\EasyTBK\taobao\request\TbkItemInfoGetRequest;

$client = Factory::taobao ();
$req = new TbkItemInfoGetRequest();
$req->setNumIids ($numIids);
return $client->execute ($req);
```

2、京东SDK初始化

```php
<?php
use lccong\EasyTBK\Factory;
use lccong\EasyTBK\jingdong\request\JdUnionGoodsPromotiongoodsinfoQueryRequest;

$jd = Factory::jingdong();
$req = new JdUnionGoodsPromotiongoodsinfoQueryRequest();
$req->setSkuIds("$itemid");
return $jd->execute($req);
```

3、拼多多SDK初始化

```php
<?php
use lccong\EasyTBK\Factory;
use lccong\EasyTBK\pinduoduo\request\DdkGoodsDetailRequest;

$pdd = Factory::pinduoduo();
$req = new DdkGoodsDetailRequest();
$req->setGoodsIdList("[$itemid]");
return  $pdd->execute($req);
```

4、唯品会SDK初始化
```php
<?php
use lccong\EasyTBK\Factory;
use lccong\EasyTBK\Vip\Request\PidGenRequest;
use lccong\EasyTBK\Vip\Request\UnionPidServiceClient;

// 唯品会官方的sdk写的比较垃圾，用法和其他平台稍微不一样
// 忽略掉了唯品会sdk报不符合规范错误
$service= UnionPidServiceClient::getService();
Factory::vip();
$pidGenRequest1 = new PidGenRequest();
$pidNameList2 = array();
$pidNameList2[0] = "value";
$pidGenRequest1->pidNameList = $pidNameList2;
$pidGenRequest1->requestId = "requestId";
dd($service->genPidWithOauth($pidGenRequest1));
```

5、苏宁连联盟SDK初始化

```php
<?php
use lccong\EasyTBK\Factory;
use lccong\EasyTBK\suning\Request\netalliance\CouponproductQueryRequest;

$c = Factory::suning();
$req = new CouponproductQueryRequest();
$req->setPageNo("1");
$req->setPageSize("10");
$req->setPositionId("12");
$resp = $c->execute($req);
dd($resp);
```
