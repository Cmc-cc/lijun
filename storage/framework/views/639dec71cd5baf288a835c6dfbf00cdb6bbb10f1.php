<header class="main-header">

    <!-- Logo -->
    <a href="javascript:;" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>代</b>理</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>代理</b>-后台</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="<?php echo e(asset('/node_modules/admin-lte/dist/img/user2-160x160.jpg')); ?>" class="user-image" alt="User Image">
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs"><?php echo e($_daili->name); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="<?php echo e(asset('/node_modules/admin-lte/dist/img/user2-160x160.jpg')); ?>" class="img-circle" alt="User Image">

                            <p>
                                <?php echo e($_daili->name); ?> - <?php if($_daili->is_daili == 1): ?>代理<?php endif; ?>
                                <small><?php echo e($_daili->created_at); ?></small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="/daili/personal" class="btn btn-default btn-flat">个人资料</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo e(route('daili.login.out')); ?>" class="btn btn-default btn-flat">安全退出</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                
                
                
            </ul>
        </div>
    </nav>
</header>