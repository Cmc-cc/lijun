<style>
    .app{
        position: fixed;
        top: 88%;
        right: 5px;
        z-index: 99999;
    }
    a.floatapp {
        border-radius: 4px;
        display: block;
        width: 40px;
        height: 40px;
        background-image: url(/web/images/app_wap.png);
        background-repeat: no-repeat;
        background-position: center top;
    }
</style>
<div class="app"><a title="APP下载" href="{{ $_system_config -> app_link }}" class="floatapp" target="_blank"></a></div>
