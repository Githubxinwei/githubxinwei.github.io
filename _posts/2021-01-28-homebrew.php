---
layout: post
title: Mac M1上安装homebrew
date: 2021-01-28
categories: homebrew
tags: [mac,M1,homebrew]
description: Mac M1上安装homebrew
---


        Homebrew是一款Mac OS平台下的软件包管理工具，拥有安装、卸载、更新、查看、搜索等很多实用的功能。简单的一条指令，就可以实现包管理,而不用你关心各种依赖和文件路径的情况，十分方便快捷。相信很多小伙伴都有用Homebrew来安装以及管理软件的习惯。但截至目前, Homebrew 还没有完全适配Arm架构，很多小伙伴通过以前的方法安装之后可能会出现Homebrew使用不了的问题，本文就来教一下大家怎么解决这个问题。
        根据官方的说法，Arm版的Homebrew不再是安装在/usr/local/Homebrew目录下，而是把它放在了/opt/homebrew下面，由于很多软件包目前还没有适配 ARM 架构，无法通过 ARM 版 Homebrew 安装，因此我们还需要安装一份 X86 版的 Homebrew 备用。

        Arm版Homebrew的安装
        根据官方规划，ARM 版 Homebrew 必须安装在 /opt/homebrew 路径下，而非此前的 /usr/local/Homebrew。由于官方的安装脚本还未更新，可以通过如下命令手动安装：

        # 切换到/opt目录
        cd /opt
        # 创建homebrew目录
        mkdir homebrew
        # 修改目录所属用户
        sudo chown -R $(whoami) /opt/homebrew
        # 安装Arm版Homebrew
        curl -L https://github.com/Homebrew/brew/tarball/master | tar xz --strip 1 -C homebrew
        通过这种方法就可以成功安装Arm版的homebrew, 安装好后可通过以下命令查看相关信息：

        $ cd /opt/homebrew/bin
        $ ./brew config
        在我的环境里，可以看到以下输出：

        HOMEBREW_VERSION: 2.7.2
        ORIGIN: git://mirrors.ustc.edu.cn/brew.git
        HEAD: dad7dc6a1498b80770d98f2d7cd6fb927c300bbb
        Last commit: 5 days ago
        Core tap ORIGIN: git://mirrors.ustc.edu.cn/homebrew-core.git
        Core tap HEAD: ee536baed0736a407034267cc160a26b5d94dea7
        Core tap last commit: 4 days ago
        Core tap branch: master
        HOMEBREW_PREFIX: /opt/homebrew
        HOMEBREW_BOTTLE_DOMAIN: https://mirrors.ustc.edu.cn/homebrew-bottles
        HOMEBREW_CASK_OPTS: []
        HOMEBREW_MAKE_JOBS: 8
        Homebrew Ruby: 2.6.3 => /System/Library/Frameworks/Ruby.framework/Versions/2.6/usr/bin/ruby
        CPU: octa-core 64-bit arm_firestorm_icestorm
        Clang: 12.0 build 1200
        Git: 2.24.3 => /Library/Developer/CommandLineTools/usr/bin/git
        Curl: 7.64.1 => /usr/bin/curl
        macOS: 11.1-arm64
        CLT: 12.3.0.0.1.1607026830
        Xcode: N/A
        Rosetta 2: false
        可以看到，Arm版的homebrew的罗塞塔（Rosetta 2: false）是关闭的，也就是说对于我们的Macbook来说Homebrew就是Native的，而不是通过兼容模式运行。

        ❝
        「Rosetta」是苹果电脑公司发布的在Mac OS X上的一个二进制编译器软件。Rosetta可以让在Power PC平台上开发的软件在英特尔平台的麦金塔电脑上顺利运行。

        ❞
        X86版Homebrew的安装
        安装x86版的homebrew和以前的方法类似，只不过是要在安装命令前面加上arch -x86_64来指定一下x86架构：

        arch -x86_64 /bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install.sh)"
        有些同学执行上面这条命令时可能会遇到网络问题，解决的方法有两个，一个是科学上网，这里就不展开描述了；另一个就是使用国内的源来安装：

        # 利用国内源来安装X86版本的Homebrew
        arch -x86_64 /bin/zsh -c "$(curl -fsSL https://gitee.com/cunkai/HomebrewCN/raw/master/Homebrew.sh)"
        X86版本的Homebrew使用时需要在brew前加上arch -x86_64, 比如安装redis的命令为arch -x86_64 brew install redis。安装好之后我们同样可以使用类似方法查看相关信息：

        $ cd /usr/local/Homebrew/bin
        $ arch -x86_64 ./brew config
        在我的环境里，可以看到以下输出：

        HOMEBREW_VERSION: 2.7.3
        ORIGIN: https://github.com/Homebrew/brew
        HEAD: a7d7b703696d6d01eda4d4716257ccb0dbe3ab5a
        Last commit: 4 hours ago
        Core tap ORIGIN: git://mirrors.ustc.edu.cn/homebrew-core.git
        Core tap HEAD: 457a6750d89d2c492dad8ff1fcb8daddd90995db
        Core tap last commit: 30 minutes ago
        Core tap branch: master
        HOMEBREW_PREFIX: /usr/local
        HOMEBREW_BOTTLE_DOMAIN: https://mirrors.ustc.edu.cn/homebrew-bottles
        HOMEBREW_CASK_OPTS: []
        HOMEBREW_MAKE_JOBS: 8
        Homebrew Ruby: 2.6.3 => /System/Library/Frameworks/Ruby.framework/Versions/2.6/usr/bin/ruby
        CPU: octa-core 64-bit westmere
        Clang: 12.0 build 1200
        Git: 2.24.3 => /Library/Developer/CommandLineTools/usr/bin/git
        Curl: 7.64.1 => /usr/bin/curl
        macOS: 11.1-x86_64
        CLT: 12.3.0.0.1.1607026830
        Xcode: N/A
        Rosetta 2: true
        可以看到，X86版的homebrew的罗塞塔（Rosetta 2: true）是开启的。

        区分两个版本的Homebrew
        安装好以后我们的电脑上就有了两个版本的homebrew，一个是arm版的一个是x86版的。为了避免两个 homebrew 相冲突，我的做法是我的做法是将这两个homebrew“重新命个名”，将下面的内容加到～/.zshrc：

        $ vim ~/.zshrc

        # x86
        export PATH="/usr/local/bin:$PATH"
        alias  abrew='arch -x86_64 /usr/local/bin/brew'

        # arm
        export PATH="/opt/homebrew/bin:$PATH"
        alias  brew='/opt/homebrew/bin/brew'
        保存退出后执行一下source ~/.zshrc使配置生效。这样以后我在安装软件的时候用brew install xxx就是用的arm版的homebrew来安装，用abrew install xxx的时候就是用的x86版的homebrew来安装。那么我们什么时候使用arm版的homebrew来安装软件，什么时候又使用intel的来安装呢?

        我的建议是：

        对于命令行（CLI）程序：

        可以优先尝试使用 ARM 版 Homebrew 安装，保证获得针对新架构编译的版本，实现最佳的运行效果。但注意：

        有的软件包已经兼容新架构、但还没有发布相应的编译版，需要安装的过程中在本地编译，耗时会相对很长；
        如果软件包还没有兼容新架构，使用 ARM 版 Homebrew 安装会报错，此时可以换用 X86 版 Homebrew 安装。
        对于「图形界面（GUI）程序」，即通过 Homebrew Cask 安装的 .app 程序：对于这类软件，Homebrew 起的作用只是从官方渠道下载这些软件的安装包，然后安装到 /Applications 路径（及执行安装脚本，如果有）。因此无论其是否针对新架构优化，通过任一版本 Homebrew 都可以安装。考虑到日后维护方便，建议「直接用 ARM 版 Homebrew 安装」即可。

        Homebrew换源
        由于用国外的源安装软件会比较慢，下面我们就来给homebrew换一下源，这里我用的是中科大的源，首先我们更换Arm版的源：

        # 替换brew.git
        cd "$(brew --repo)"
        git remote set-url origin git://mirrors.ustc.edu.cn/brew.git

        # 替换homebrew-core.git
        cd "$(brew --repo)/Library/Taps/homebrew/homebrew-core"
        git remote set-url origin git://mirrors.ustc.edu.cn/homebrew-core.git
        接下来是更换X86版本的：

        # 替换brew.git
        cd "$(abrew --repo)"
        git remote set-url origin git://mirrors.ustc.edu.cn/brew.git

        # 替换homebrew-core.git
        cd "$(abrew --repo)/Library/Taps/homebrew/homebrew-core"
        git remote set-url origin git://mirrors.ustc.edu.cn/homebrew-core.git
        最后还要在~/.zshrc中加入以下内容来替换Homebrew Bottles源，Arm版和X86版的一样：

        $ vim ~/.zshrc
        export HOMEBREW_BOTTLE_DOMAIN=https://mirrors.ustc.edu.cn/homebrew-bottles
        保存退出后执行source ~/.zshrc就可以了，然后叫可以利用brew config 和abrew config来查看下源是否替换成功了！