**nginx配置文件的部分**

```nginx
server{
	listen 443 ssl ;
	server_name test.sa;

    #修改自带Server头
    more_set_headers 'Server:my-server';
    
    #添加自定义Header
    add_header X-TEST "value-test";
    add_header Strict-Transport-Security "max-age=31536000; includeSubDomains; preload";
    
    root /www/admin/xxx/xxxx/;
	
    #URL重写[语法:rewrite 正则表达式 重写为的地址 标记](重写为的地址中用$1\$2等匹配正则中的子项),标记有4个分别是:
    #last:本条规则匹配完成后继续向下匹配新的location URI规则。（浏览器地址栏URL地址不变）
    #break：本条规则匹配完成后，终止匹配，不再匹配后面的规则。（浏览器地址栏URL地址不变）
    #redirect:302重定向
    #permanent:301重定向
	rewrite ^(.*)$ $1 permanent;

	#SSL相关
	ssl_protocols TLSv1.1 TLSv1.2;
    ssl_ciphers ECDHE-RSA-AES128-GCM-SHA256:ECDHE:ECDH:AES:HIGH:!NULL:!aNULL:!MD5:!ADH:!RC4:!DH:!DHE;
    ssl_prefer_server_ciphers on; # 设置协商加密算法时，优先使用我们服务端的加密套件，而不是客户端浏览器的加密套件。如果只配置了加密套件，而未设置此项，加密套件的设定就没有意义了。
	ssl_certificate /usr/local/phpstudy/certs/xxx/xxxx.crt;
	ssl_certificate_key /usr/local/phpstudy/certs/xxx/xxxx.key;

	location / {
		root /www/admin/xxx/xxxx/;
		index index.php index.html;
	}
}
```

**(未完待续)**

