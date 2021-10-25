<p align="center">
	<strong>非官方即时通信SDK easy-im</strong>
</p>

<p align="center">
	<strong>开源地址：</strong> <a target="_blank" href='https://gitee.com/whereof/easy-im'>Gitee</a> | <a target="_blank" href='https://github.com/whereof/easy-im'>Github</a> 
</p>
<p align="center">
	<strong>开发者文档：</strong> <a target="_blank" href='https://github.com/whereof/easy-im/wiki'>wiki</a>
</p>
<p align="center">
    <a href="https://packagist.org/packages/whereof/easy-im" target="_blank">
        <img class="badge" src="http://poser.pugx.org/whereof/easy-im/v">
     </a><a href="https://packagist.org/packages/whereof/easy-im" target="_blank">
        <img class="badge" src="http://poser.pugx.org/whereof/easy-im/downloads">
     </a><a href="https://packagist.org/packages/whereof/easy-im" target="_blank">
        <img class="badge" src="http://poser.pugx.org/whereof/easy-im/v/unstable">
     </a><a href="https://packagist.org/packages/whereof/easy-im" target="_blank">
        <img class="badge" src="http://poser.pugx.org/whereof/easy-im/license">
     </a><a href="https://packagist.org/packages/whereof/easy-im" target="_blank">
        <img class="badge" src="http://poser.pugx.org/whereof/easy-im/require/php">
     </a>
</p>

> 非官方即时通信SDK，支持腾讯IM，环信IM，极光IM，融云IM，网易云信IM等


## 安装

~~~~
composer require whereof/easy-im
~~~~

## 请求日志开启

~~~
\whereof\easyIm\Kernel\BaseClient::$request_log=true;
~~~

## 案例

### [腾讯IM](https://cloud.tencent.com/product/im) 

~~~
$config = [
  'appId'      => '5978322198',
  'identifier' => 'administrator',
  'secretKey'  => 'nfugb53xtlhyfq2kgiriganruyoagh93it1zwysmh2tmj5tnnmuqhd2og5ofktjt',
];
$im = whereof\easyIm\Factory::Tencent($config);
// 自定义请求(账号同步到云端)
$params = [
    'Identifier' => 'easyim',
    'Nick'       => 'easyim',
    'FaceUrl'    => 'https://github.com/whereof/easy-im',
];
$im->request->send('im_open_login_svc/account_import', $params);
~~~

### [环信IM](https://www.easemob.com/) 

~~~
$config = [
  'appKey'       => '',
  'clientId'     => '',
  'clientSecret' => '',
  'orgName'      => '',
  'appName'      => '',
];
$im = whereof\easyIm\Factory::Huanxin($config);

// 自定义请求(账号同步到云端)
$params = [
    'username' => 'easyim',
    'password' => '123456',
    'nickname' => 'easyim'
];
$im->request->send('post', 'users', $params);
~~~

### [极光IM](https://www.jiguang.cn/im)

~~~
$config = [
  'appKey'       => '',
  'masterSecret' => '',
];
$im = whereof\easyIm\Factory::Jiguang($config);

// 自定义请求(账号同步到云端)
$params = [[
    'username' => 'easyim',
    'password' => '123456',
]];
$im->request->send('post', 'v1/users/', $params);

//IM REST Report V2
//获取消息
$im->request->send('get', 'v2/messages?count=500&begin_time=2015-11-02 10:10:10&end_time=2015-11-02 10:10:12',[],true);
~~~

### [融云IM](https://www.jiguang.cn/im) 

~~~
$config = [
  'appKey'    => '',
  'appSecret' => '',
];
$im = whereof\easyIm\Factory::RongCloud($config);

// 自定义请求(账号同步到云端)
$params=[
    'userId' => 'easyim',
    'name'   => 'easyim',
];
$im->request->send('user/getToken.json', $params);
~~~
###  [网易云信IM](https://yunxin.163.com/) 

~~~
$config = [
  'appKey'    => '',
  'appSecret' => '',
];
$im = whereof\easyIm\Factory::Yunxin($config);
// 自定义请求（账号同步到云端）
$params = [
    'accid' => 'easyim',
    'name'  => 'easyim',
];
$im->request->send('nimserver/user/create.action', $params);
~~~




## 支持厂商

- [腾讯IM](https://cloud.tencent.com/product/im) 
- [环信IM](https://www.easemob.com/) 
- [极光IM](https://www.jiguang.cn/im)
- [融云IM](https://www.jiguang.cn/im) 
- [网易云信IM](https://yunxin.163.com/) 



##  加入我们

如果你认可我们的开源项目，有兴趣为 easy-im 的发展做贡献，竭诚欢迎加入我们一起开发完善。无论是[报告错误](https://github.com/whereof/easy-im/issues)或是 Pull Request 开发，那怕是修改一个错别字也是对我们莫大的帮助。



##  关于我
https://github.com/whereof/whereof


##  许可协议
[MIT](https://opensource.org/licenses/MIT)
