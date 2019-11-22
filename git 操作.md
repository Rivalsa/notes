# Git 操作

**配置信息**

```git
git config --global user.name "Rivalsa"
git config --global user.email "sa@rivalsa.cn"
```

**初始化**

```git
git init
```

**所有文件放入暂存区**

```git
git add .
```

**查看当前仓库里所有文件的状态**

```git
git status
```

**查看一个文件修改了哪一部分**

```git
git diff 文件名
```
**缓存区文件提交到本地仓库**

```git
git commit -m"描述"
```

**撤销为暂存的修改**

```git
git restore 文件名(或.)
```

**撤销已添加到暂存区的修改**

```git
git restore --staged 文件名(或.)
```

**查看所有版本**

```git
git log
```

**回退到某版本**

```git
git reset --hard 版本号
```

**查看每一次命令记录**

```git
git reflog
```

**创建密钥**

```git
ssh-keygen -t rsa -b 4096 -C "your_email@example.com"
```

*密钥创建在~/.ssh/*

**推送到远程仓库master分支**

```git
git push origin master
```

*可以在`push`后面加`-f`参数来强制`push`*

**关联origin到某个远程仓库**

```git
git remote add origin https://github.com/******/*****.git
```

**查看当前origin**

```git
git remote show origin
```

**修改origin地址**

```git
git remote set-url origin https://github.com/******/*****.git
```

**删除origin地址**

```git
git remote rm origin
```

**创建分支**

```git
git branch 分支名
```

**查看分支**

```git
git branch
```

**切换分支**

```git
git checkout 分支名
```

