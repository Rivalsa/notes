# yarn常用命令

下载yarn

```bash
npm i yarn -g
```

查看版本

```bash
yarn -v
```

查看配置列表

```bash
yarn config list
```

修改包的下载服务器地址（配置为淘宝镜像）

```bash
yarn config set registry https://registry.npm.taobao.org
```

下载包

```bash
yarn add XXX
```

全局安装包

```bash
yarn global add XXX
```

查看全局安装的位置

```bash
yarn global dir
```

删除全局包

```bash
yarn global remove XXX

```

> **简写**
>
> `yarn create XXX`命令可以看作如下两条命令的简写：
>
> ```bash
> yarn global add create-XXX
> create-XXX
> ```