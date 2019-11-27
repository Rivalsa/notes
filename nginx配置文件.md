**nginx配置文件的部分**

```nginx
server{
	listen 443 ssl ;
	server_name test.sa;

    #修改自带Server头
    more_set_headers 'Server:my-server';
    
    #添加自定义Header
    add_header 字段 "数据";
    add_header X-TEST "value-test";
    
    root /www/admin/test.sa_80/wwwroot/;
	
    #URL重写[语法:rewrite 正则表达式 重写为的地址 标记](重写为的地址中用$1\$2等匹配正则中的子项),标记有4个分别是:
    #last:本条规则匹配完成后继续向下匹配新的location URI规则。（浏览器地址栏URL地址不变）
    #break：本条规则匹配完成后，终止匹配，不再匹配后面的规则。（浏览器地址栏URL地址不变）
    #redirect:302重定向
    #permanent:301重定向
	rewrite ^(.*)$ $1 permanent;

	#SSL相关
	ssl_protocols TLSv1 TLSv1.1 TLSv1.2;
	ssl_certificate /usr/local/phpstudy/certs/test.sa/test.sa_nginx_public.crt;
	ssl_certificate_key /usr/local/phpstudy/certs/test.sa/test.sa_nginx.key;

	location / {
		root /www/admin/test.sa_80/wwwroot/;
		index index.php index.html;
	}
}
```

**(未完待续)**

