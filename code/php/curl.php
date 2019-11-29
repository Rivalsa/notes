<?php
// header需要以数组的方式提交,如array('key1:value1','key2:value2')
function _SendData($curl,$https = true,$method = 'get',$header = '',$data = '')
{
	$ch=curl_init(); // 初始化
	curl_setopt($ch,CURLOPT_URL,$curl);
	curl_setopt($ch,CURLOPT_HEADER,false); // 设置不需要头信息
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true); // 获取页面内容，但不输出
	if($https)
	{
    	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE); // 不做服务器认证
    	curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE); // 不做客户端认证
	}
	if($method==='post')
	{
    	curl_setopt($ch, CURLOPT_POST,true); // 设置请求是post方式
    	curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // 设置post请求数据
	}
	if($header)
	{
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	}
	$str=curl_exec($ch); // 执行访问
	curl_close($ch); // 关闭curl，释放资源
	return $str;    
}
?>