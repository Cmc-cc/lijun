<?php
Route::group(['domain' => env('ADMIN_URL')],function ($router) {$router->get('/', 'Admin\AuthController@getLogin')->name('admin.init');});
Route::group(['domain' => 123],function ($router) {$router->get('/', 'Daili\AuthController@getLogin')->name('daili.init');});
Route::get('/maintain', 'Web\IndexController@maintain')->name('web.maintain');
Route::group(['prefix' => 'm','namespace' => 'Wap', 'middleware' => 'web.maintain'],function ($router)
{
    $router->get('api_check', 'IndexController@api_check')->name('wap.api_check');
    $router->get('auto_auto', 'LoginController@auto_auto')->name('wap.auto_auto');
    $router->get('usdt_pointer', 'IndexController@usdt_pointer')->name('wap.usdt_pointer');//获取系统配置
    $router->get('fs_money', 'IndexController@fs_money')->name('wap.fs_money');//获取系统配置
    $router->post('sysconfig', 'LoginController@sysconfig')->name('wap.sysconfig');//获取系统配置
    $router->get('refresh_ml2', 'IndexController@refresh_ml2')->name('wap.refresh_ml2');
    $router->get('tongzhi', 'IndexController@tongzhi')->name('wap.tongzhi');
    
    $router->get('usdt', 'IndexController@usdt')->name('wap.usdt');
    $router->post('usdt', 'IndexController@post_usdt')->name('wap.post_usdt');
    $router->get('app_login', 'IndexController@app_login')->name('wap.app_login');
    $router->get('service', 'IndexController@service')->name('wap.service');
    $router->get('membermoney', 'IndexController@membermoney')->name('wap.membermoney');
        
    $router->get('article_type','IndexController@article_type')->name('wap.article_type');
    $router->get('article_detail','IndexController@article_detail')->name('wap.article_detail');
    
    $router->post('qrcode','IndexController@qrcode')->name('wap.qrcode');
    
    $router->get('red','IndexController@red')->name('wap.red');
    
    $router->get('user_fsjl','IndexController@user_fsjl')->name('wap.user_fsjl');
    
    $router->get('index_py', 'IndexController@index_py')->name('wap.index_py');
    $router->get('/', 'IndexController@index')->name('wap.index');
    $router->get('/index2', 'IndexController@index2')->name('wap.index2');
    $router->get('pt/live_game_list', 'IndexController@pt_live_game_list')->name('pt.live_game_list');
    $router->get('pt/rng_game_list', 'IndexController@pt_rng_game_list')->name('pt.rng_game_list');
    $router->get('png/rng_game_list', 'IndexController@png_rng_game_list')->name('png.rng_game_list');
    $router->get('ttg/rng_game_list', 'IndexController@ttg_rng_game_list')->name('ttg.rng_game_list');
    $router->get('gg/rng_game_list', 'IndexController@gg_rng_game_list')->name('gg.rng_game_list');
    $router->get('dt/rng_game_list', 'IndexController@dt_rng_game_list')->name('dt.rng_game_list');
    $router->get('cq9/rng_game_list', 'IndexController@cq9_rng_game_list')->name('cq9.rng_game_list');
    $router->get('login', 'LoginController@showLoginForm')->name('wap.login');
    $router->post('login', 'LoginController@postLogin')->name('wap.login.post');
    
    $router->get('changelang', 'LoginController@changelang')->name('game.gameList');
    
    $router->any('logout', 'LoginController@logout')->name('wap.logout');
    $router->get('register', 'IndexController@register')->name('wap.register');
    $router->post('register', 'IndexController@postRegister')->name('wap.register.post');
    
    $router->get('agentregister', 'IndexController@agentregister')->name('wap.agentregister');
    $router->post('agentregister', 'IndexController@postagentregister')->name('wap.agentregister.post');
    
    $router->get('msgcode', 'IndexController@msgcode')->name('wap.msgcode');
    $router->get('rmsgcode', 'IndexController@rmsgcode')->name('wap.rmsgcode');
    $router->get('bindphone', 'IndexController@bindphone')->name('wap.bindphone');
    $router->post('bindphone', 'IndexController@postbindphone')->name('wap.bindphone.post');
    
    $router->get('ag/eGame_list', 'IndexController@ag_eGame_list')->name('wap.ag_eGame_list');
    $router->get('mg/eGame_list', 'IndexController@mg_eGame_list')->name('wap.mg_eGame_list');
    $router->get('nav', 'IndexController@nav')->name('wap.nav');
    $router->get('activity_list', 'IndexController@activity_list')->name('wap.activity_list');
    
    
    
    $router->get('activity_detail/{id}', 'IndexController@activity_detail')->name('wap.activity_detail');
    $router->get('activity_detail_api/{id}', 'IndexController@activity_detail_api')->name('wap.activity_detail_api');
    Route::group(['middleware' => 'auth.member:member'],function ($router){
        $router->get('zhuanpan', 'IndexController@zhuanpan')->name('wap.zhuanpan');
        $router->get('zhuan', 'IndexController@zhuan')->name('wap.zhuan');
        
        
        $router->get('userinfo', 'IndexController@userinfo')->name('wap.userinfo');
        $router->get('chongzi_tixian', 'IndexController@chongzi_tixian')->name('wap.chongzi_tixian');
        $router->get('agent', 'IndexController@agent')->name('wap.agent');
        $router->get('agent_apply', 'IndexController@agent_apply')->name('wap.agent_apply');
        $router->post('agent_apply', 'IndexController@post_agent_apply')->name('wap.post_agent_apply');
        $router->get('set_phone', 'IndexController@set_phone')->name('wap.set_phone');
        $router->post('set_phone', 'IndexController@post_set_phone')->name('wap.post_set_phone');
        $router->get('bind_bank', 'IndexController@bind_bank')->name('wap.bind_bank');
        $router->post('bind_bank', 'IndexController@post_bind_bank')->name('wap.post_bind_bank');
        $router->get('drawing', 'IndexController@drawing')->name('wap.drawing');
        $router->post('drawing', 'IndexController@post_drawing')->name('wap.post_drawing');
        $router->get('drawing_record', 'IndexController@drawing_record')->name('wap.drawing_record');
        $router->get('game_record', 'IndexController@game_record')->name('wap.game_record');
        $router->get('recharge_record', 'IndexController@recharge_record')->name('wap.recharge_record');
        $router->get('transfer_record', 'IndexController@transfer_record')->name('wap.transfer_record');
        $router->get('daili_money_log', 'IndexController@daili_money_log')->name('wap.daili_money_log');
        $router->get('member_offline', 'IndexController@member_offline')->name('wap.member_offline');
        $router->get('member_offline_recharge', 'IndexController@member_offline_recharge')->name('wap.member_offline_recharge');
        $router->get('member_offline_drawing', 'IndexController@member_offline_drawing')->name('wap.member_offline_drawing');
        $router->get('member_offline_sy', 'IndexController@member_offline_sy')->name('wap.member_offline_sy');
        $router->get('recharge', 'IndexController@recharge')->name('wap.recharge');
        $router->get('weixin_pay', 'IndexController@weixin_pay')->name('wap.weixin_pay');
        $router->post('weixin_pay', 'IndexController@post_weixin_pay')->name('wap.post_weixin_pay');
        $router->get('ali_pay', 'IndexController@ali_pay')->name('wap.ali_pay');
        $router->post('ali_pay', 'IndexController@post_ali_pay')->name('wap.post_ali_pay');
        $router->get('bank_pay', 'IndexController@bank_pay')->name('wap.bank_pay');
        $router->post('bank_pay', 'IndexController@post_bank_pay')->name('wap.post_bank_pay');
        $router->get('qq_pay', 'IndexController@qq_pay')->name('wap.qq_pay');
        $router->post('qq_pay', 'IndexController@post_qq_pay')->name('wap.post_qq_pay');
        $router->get('third_bank_pay', 'IndexController@third_bank_pay')->name('wap.third_bank_pay');
        $router->get('third_pay_scan', 'IndexController@third_pay_scan')->name('wap.third_pay_scan');
        $router->get('third_pay_app', 'IndexController@third_pay_app')->name('wap.third_pay_app');
        $router->get('recharge_record', 'IndexController@recharge_record')->name('wap.recharge_record');
        $router->get('reset_password', 'IndexController@reset_password')->name('wap.reset_password');
        $router->get('reset_password2', 'IndexController@reset_password2')->name('wap.reset_password2');
        $router->post('reset_login_password', 'IndexController@reset_login_password')->name('wap.reset_login_password');
        $router->post('reset_qk_password', 'IndexController@reset_qk_password')->name('wap.reset_qk_password');
        $router->get('transfer', 'IndexController@transfer')->name('wap.transfer');
        $router->post('transfer', 'IndexController@post_transfer')->name('wap.post_transfer');
        $router->get('transfer_record', 'IndexController@transfer_record')->name('wap.transfer_record');
        $router->get('msg', 'IndexController@msg')->name('wap.msg');
        
       $router->get('bank', 'IndexController@bank')->name('wap.bank');
       $router->post('set_bank', 'IndexController@setBank')->name('wap.set_bank');
       
       
       $router->get('drawing_record_api', 'IndexController@drawing_record_api')->name('wap.drawing_record_api');
        $router->get('game_record_api', 'IndexController@game_record_api')->name('wap.game_record_api');
        $router->get('recharge_record_api', 'IndexController@recharge_record_api')->name('wap.recharge_record_api');
        $router->get('transfer_record_api', 'IndexController@transfer_record_api')->name('wap.transfer_record_api');
        $router->get('user_fsjl_api','IndexController@user_fsjl_api')->name('wap.user_fsjl_api');
        
    });
});
Route::group(['namespace' => 'Web', 'middleware' => 'web.maintain'],function ($router)
{
    
    Route::get('deleteimg','IndexController@deleteimg')->name('web.deleteimg');
    Route::get('/', 'IndexController@index')->name('web.index');
    Route::get('notice', 'IndexController@notice')->name('web.notice');
    
    Route::get('sport', 'IndexController@sport')->name('web.sport');
    Route::get('live', 'IndexController@live')->name('web.live');
    Route::get('e-battle', 'IndexController@ebattle')->name('web.e-battle');
    Route::get('keno', 'IndexController@keno')->name('web.keno');
    Route::get('e-game', 'IndexController@eGame2')->name('web.e-game');
    Route::get('fishing', 'IndexController@fishing')->name('web.fishing');
    
    Route::get('activities', 'IndexController@activityList')->name('web.activityList');
    Route::get('activity/{id}', 'IndexController@activityDetail')->name('web.activityDetail');
    Route::get('liveCasino', 'IndexController@liveCasino')->name('web.liveCasino');
    Route::get('poker', 'IndexController@poker')->name('web.poker');
    Route::get('hongbao', 'IndexController@hongbao')->name('web.hongbao');
    Route::get('eGame', 'IndexController@eGame')->name('web.eGame');
    Route::get('esports', 'IndexController@esports')->name('web.esports');
    Route::get('lottory', 'IndexController@lottory')->name('web.lottory');
    Route::get('catchFish', 'IndexController@catchFish')->name('web.catchFish');
    Route::get('pic', 'IndexController@pic')->name('web.pic');
    Route::get('red', 'IndexController@red_index')->name('web.red');
    Route::get('novice_guidance', 'IndexController@novice_guidance')->name('web.novice_guidance');
    $router->get('term', 'IndexController@term')->name('web.term');
    $router->get('help', 'IndexController@help')->name('web.help');
     $router->get('about', 'IndexController@about')->name('web.about');
    $router->get('r', 'IndexController@register_one')->name('web.register_one');
    $router->post('register_one', 'IndexController@post_register_one')->name('web.post_register_one');
    $router->get('login', 'IndexController@login')->name('web.login');
    $router->get('l', 'IndexController@login2')->name('web.login2');
    $router->get('register_two', 'IndexController@register_two')->name('web.register_two');
    $router->post('register_two', 'IndexController@post_register_two')->name('web.post_register_two');
    $router->get('register_success', 'IndexController@register_success')->name('web.register_success');

});
Route::group(['prefix' => 'member','namespace' => 'Member'],function ($router)
{
    $router->post('upload', 'IndexController@upload')->name('wap.upload');
    $router->post('login', 'LoginController@postLogin')->name('member.login.post');
    $router->any('logout', 'LoginController@logout')->name('member.logout');
    $router->get('password/request', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    $router->post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::group(['middleware' => 'auth.member:member'],function ($router){
        
        $router->get('/getNowMoney', 'IndexController@getNowMoney')->name('member.getNowMoney');
        
        
        $router->get('/new_bank_pay', 'IndexController@new_bank_pay')->name('member.new_bank_pay');
		$router->get('/ali_pay_xin', 'IndexController@ali_pay_xin')->name('member.ali_pay_xin');
		$router->get('/weixin_pay_xin', 'IndexController@weixin_pay_xin')->name('member.weixin_pay_xin');
		$router->get('/usdt_pay_xin', 'IndexController@usdt_pay_xin')->name('member.usdt_pay_xin');
		$router->get('/member_drawing_xin', 'IndexController@member_drawing_xin')->name('member.member_drawing_xin');
		$router->get('/indoor_transfer_xin', 'IndexController@indoor_transfer_xin')->name('member.indoor_transfer_xin');
		$router->get('/singlenote_report_xin', 'IndexController@singlenote_report_xin')->name('member.singlenote_report_xin');
		$router->get('/customer_report_xin', 'IndexController@customer_report_xin')->name('member.customer_report_xin');
		$router->get('/login_psw_xin', 'IndexController@login_psw_xin')->name('member.login_psw_xin');
		$router->get('/safe_psw_xin', 'IndexController@safe_psw_xin')->name('member.safe_psw_xin');
		$router->get('/getNowMoney', 'IndexController@getNowMoney')->name('member.getNowMoney');
		$router->get('/message_list_xin', 'IndexController@message_list_xin')->name('member.message_list_xin');
		$router->get('/my_activity_xin', 'IndexController@my_activity_xin')->name('member.my_activity_xin');
		$router->get('/complaint_proposal_xin', 'IndexController@complaint_proposal_xin')->name('member.complaint_proposal_xin');
		$router->get('/send_fs', 'IndexController@send_fs')->name('member.send_fs');
		
        
        $router->get('/userCenter', 'IndexController@userCenter')->name('member.userCenter');
        $router->get('/bank_load', 'IndexController@bank_load')->name('member.bank_load');
        $router->get('/account_load', 'IndexController@account_load')->name('member.account_load');
        $router->get('/update_bank_info', 'IndexController@update_bank_info')->name('member.update_bank_info');
        $router->post('/update_bank_info', 'IndexController@post_update_bank_info')->name('member.post_update_bank_info');
        $router->get('/message_list', 'IndexController@message_list')->name('member.message_list');
        $router->get('/messageList', 'AsyncController@messageList')->name('member.messageList');
        $router->get('/safe_psw', 'IndexController@safe_psw')->name('member.safe_psw');
        $router->get('/login_psw', 'IndexController@login_psw')->name('member.login_psw');
        $router->post('update_qk_password', 'IndexController@update_qk_password')->name('member.update_qk_password');
        $router->post('update_login_password', 'IndexController@update_login_password')->name('member.update_login_password');
        $router->get('/finance_center', 'IndexController@finance_center')->name('member.finance_center');
        $router->get('/member_drawing', 'IndexController@bank')->name('member.member_drawing');
        $router->get('/indoor_transfer', 'IndexController@indoor_transfer')->name('member.indoor_transfer');
        $router->get('recharge_type', 'IndexController@recharge_type')->name('member.recharge_type');
        $router->get('/weixin_pay', 'IndexController@weixin_pay')->name('member.weixin_pay');
        $router->post('/weixin_pay', 'IndexController@post_weixin_pay')->name('member.post_weixin_pay');
        $router->get('/ali_pay', 'IndexController@ali_pay')->name('member.ali_pay');
        $router->post('/ali_pay', 'IndexController@post_ali_pay')->name('member.post_ali_pay');
        $router->get('/qq_pay', 'IndexController@qq_pay')->name('member.qq_pay');
        $router->post('/qq_pay', 'IndexController@post_qq_pay')->name('member.post_qq_pay');
        $router->get('/bank_pay', 'IndexController@bank_pay')->name('member.bank_pay');
        $router->post('/bank_pay', 'IndexController@post_bank_pay')->name('member.post_bank_pay');
        $router->post('drawing', 'IndexController@post_drawing')->name('member.drawing');
        $router->post('/transfer', 'IndexController@post_transfer')->name('member.post_transfer');
        $router->post('/transfer_all', 'IndexController@post_transfer_all')->name('member.post_transfer_all');
        $router->get('/customer_report', 'IndexController@customer_report')->name('member.customer_report');
        $router->get('/rechargeList', 'AsyncController@rechargeList')->name('member.rechargeList');
        $router->get('/drawingList', 'AsyncController@drawingList')->name('member.drawingList');
        $router->get('/transferList', 'AsyncController@transferList')->name('member.transferList');
        $router->get('/gameRecordList', 'AsyncController@gameRecordList')->name('member.gameRecordList');
        $router->get('/dividendList', 'AsyncController@dividendList')->name('member.dividendList');
        $router->get('/service_center', 'IndexController@service_center')->name('member.service_center');
        $router->get('/complaint_proposal', 'IndexController@complaint_proposal')->name('member.complaint_proposal');
        $router->post('/feedback', 'IndexController@post_feedback')->name('member.post_feedback');
        $router->post('/post_agent_apply', 'IndexController@post_agent_apply')->name('member.post_agent_apply');
        $router->get('third_bank_pay', 'IndexController@third_bank_pay')->name('member.third_bank_pay');
        $router->get('third_pay_scan', 'IndexController@third_pay_scan')->name('member.third_pay_scan');
        //Route::post('pay', 'PayController@pay')->name('pay');
        Route::post('pay_scan', 'PayController@pay_scan')->name('pay_scan');
        Route::post('pay_app', 'PayController@pay_app')->name('pay_app');
        $router->get('third_quick_pay_apply', 'IndexController@third_quick_pay_apply')->name('member.third_quick_pay_apply');
        //
        $router->get('distillRed', 'IndexController@distillRed')->name('member.distillRed');
        //
        $router->post('one_transfer', 'IndexController@one_transfer')->name('member.one_transfer');
        $router->post('tixian_shuaxin', 'IndexController@tixian_shuaxin')->name('member.tixian_shuaxin');
        $router->post('chongzhi_shuaxin', 'IndexController@chongzhi_shuaxin')->name('member.chongzhi_shuaxin');
         $router->get('/bank', 'IndexController@bank')->name('member.bank');

        $router->get('/promotion_apply', 'IndexController@promotion_apply')->name('member.promotion_apply');
        $router->get('/npromotion', 'IndexController@npromotion')->name('member.npromotion');
        $router->get('/acc-transfer', 'IndexController@pc_transfer')->name('member.acc-transfer');
        $router->get('/customer_report_3', 'IndexController@customer_report_3')->name('member.customer_report_3');
    });
});
Route::group(['domain' => env('AGENT_URL'), 'prefix' => 'daili','namespace' => 'Daili'],function ($router){
    Route::get('/login', ['as' => 'daili.login','uses' => 'AuthController@getLogin']);
    Route::post('/login', ['as' => 'daili.login.post','uses' => 'AuthController@postLogin']);
    Route::get('/loginOut', ['as' => 'daili.login.out','uses' => 'AuthController@getLoginOut']);
    Route::group(['middleware' => ['auth.daili']], function($router){
        $router->get('/', 'DailiController@index')->name('daili.index');
        Route::resource("user", 'UserController');
        Route::get('personal', ['as' => 'user.personal', 'uses' => 'AuthController@getPersonal']);
        Route::post('personal', ['as' => 'user.personal.post', 'uses' => 'AuthController@postPersonal']);
        Route::get('member_daili', 'MemberDailiController@index')->name('daili.member_daili');
        Route::get('member_daili/sy', 'MemberDailiController@member_offline_sy')->name('daili.member_offline_sy');
        Route::get('member_offline', 'MemberOfflineController@index')->name('daili.member_offline');
        Route::get('member_offline/create', 'MemberOfflineController@create')->name('daili.member_offline.create');
        Route::post('member_offline/store', 'MemberOfflineController@store')->name('daili.member_offline.store');
        Route::get('member_offline_recharge', 'MemberOfflineRechargeController@index')->name('daili.member_offline_recharge');
        Route::get('member_offline_drawing', 'MemberOfflineDrawingController@index')->name('daili.member_offline_drawing');
        Route::get('member_offline_dividend', 'MemberOfflineDividendController@index')->name('daili.member_offline_dividend');
        Route::get('member_offline_game_record', 'MemberOfflineGameRecordController@index')->name('daili.member_offline_game_record');
        Route::get('daili_money_log', 'DailiMoneyLogController@index')->name('daili.daili_money_log');
        
        Route::get('report', 'ReportController@index')->name('daili.report');
        Route::get('team', 'ReportController@team')->name('daili.team');
    });
});

Route::get('gameRecordStatis', 'Admin\GameRecordController@gameRecordStatis')->name('gameRecordStatis');
Route::get('statistics', 'Admin\MemberOfflineGameRecordController@statistics')->name('statistics');
Route::get('api/credit', 'Api\ApiClientController@credit')->name('api.credit');
Route::get('api/balance/{id}/{api_name}', 'Api\ApiClientController@balance')->name('api.balance');
Route::any('upload', 'UploadController@upload')->name('upload.post');
Route::any('pay/notify', 'Member\PayController@notify')->name('pay.notify');
Route::any('pay/return', 'Member\PayController@pay_return')->name('pay.return');
Route::get('pay/success', 'Member\PayController@success')->name('pay.success');
Route::get('kit/captcha/{tmp}', 'Web\WebBaseController@captcha');
Route::get('kit/mbk/{tmp}','Web\WebBaseController@mbk');
Route::get('v_sms', 'Web\WebBaseController@sendSms')->name('sendSms');
Route::any('pt_v', 'Api\PtController@vali')->name('pt.validate');
Route::any('ebet_v', 'Api\EbetController@verifya')->name('verifya');
Route::any('gd_v', 'Api\GdController@verify_gd')->name('gd.verify');
Route::post('pay', 'Member\PayController@pay')->name('pay');
Route::get('v', 'Web\WebBaseController@v')->name('v');

 Route::get('report/index_dingshi', 'Admin\ReportController@index_dingshi')->name('report.index_dingshi');
 
Route::group(['domain' => env('ADMIN_URL'), 'prefix' => 'admin','namespace' => 'Admin'],function ($router){
    $router->get('daochu4', 'YonghujiluController@daochu4')->name('admin.daochu4');
    Route::resource('yonghu_jilu', 'YonghujiluController');
    $router->any('uploadfile', 'SystemConfigController@uploadfile')->name('admin.uploadfile');
    
    $router->get('daochu', 'SendDailiMoneyController@daochu')->name('admin.daochu');
    $router->get('team', 'ReportController@team')->name('admin.team');
    $router->get('daochu2', 'ReportController@daochu2')->name('admin.daochu2');
    $router->post('redAdd','RedController@add')->name('admin.redAdd');
    $router->get('destroy/{id}','RedController@destroy')->name('admin.destroy');
    $router->get('giveNumAdd/{id}','RedController@giveNumAdd')->name('admin.giveNumAdd');
    $router->post('editGiveNum/{id}','RedController@editGiveNum')->name('admin.editGiveNum');
    $router->get('giveindex','RedController@giveindex')->name('admin.giveindex');
    Route::get('/login', ['as' => 'admin.login','uses' => 'AuthController@getLogin']);
    Route::post('/login', ['as' => 'admin.login.post','uses' => 'AuthController@postLogin']);
    Route::get('/loginOut', ['as' => 'admin.login.out','uses' => 'AuthController@getLoginOut']);
    $router->get('jiaoban', 'AdminController@jiaoban')->name('admin.jiaoban');
    
    $router->get('jiaobanlist', 'AdminController@jiaobanlist')->name('admin.jiaobanlist');
    
    $router->get('apilog', 'AdminController@apilog')->name('admin.apilog');
    
    
    $router->get('hk_notice', 'AdminController@hk_notice')->name('admin.hk_notice');
    $router->get('tk_notice', 'AdminController@tk_notice')->name('admin.tk_notice');
    $router->get('tips_on', 'AdminController@tips_on')->name('admin.tips_on');
    $router->get('fs_notice', 'AdminController@fs_notice')->name('admin.fs_notice');
    $router->get('dl_notice', 'AdminController@dl_notice')->name('admin.dl_notice');
    Route::get('charts_data','AdminController@getChartsDataAjax')->name('admin.charts_data');

    Route::group(['middleware' => ['authorize']], function($router){
        Route::resource('member_money', 'MoneyLogController');
        Route::resource('member_mlmoney', 'MoneyMlLogController');
        Route::get('recharge/reindex', 'RechargeController@reindex')->name('recharge.reindex');
        Route::get('drawing/reindex', 'DrawingController@reindex')->name('drawing.reindex');
        Route::get('report/index', 'ReportController@index')->name('report.index');
       
        
        $router->get('/', 'AdminController@index')->name('admin.index');
        Route::resource("user", 'UserController');
        Route::get('personal', ['as' => 'user.personal', 'uses' => 'UserController@getPersonal']);
        Route::post('personal', ['as' => 'user.personal.post', 'uses' => 'UserController@postPersonal']);
        Route::get('role/relation/{id}', ['as' => 'role.relation', 'uses' => 'RoleController@showRelation']);
        Route::post('role/relation/{id}', ['as' => 'role.relation.post', 'uses' => 'RoleController@relation']);
        Route::resource("role", 'RoleController');
        Route::get('bank_card/check/{id}/{status}', 'BankCardController@check')->name('bank_card.check');
        Route::resource("bank_card", 'BankCardController');
        Route::resource("system_config", 'SystemConfigController');
        Route::resource("black_list_ip", 'BlackListIpController');
        Route::resource("admin_action_money_log", 'AdminActionMoneyLogController');
        Route::resource("admin_login_log", 'AdminLoginLogController');
        Route::resource("ctr", 'CtrController');
        Route::resource("monitor", 'MonitorController');
        Route::get('about/check/{id}/{status}', 'AboutController@check')->name('about.check');
        Route::resource("about", 'AboutController');
        Route::get('member/check/{id}/{status}', 'MemberController@check')->name('member.check');
        Route::get('member/getMoney', 'MemberController@getMoney')->name('member.get_money');
        Route::get('member/assign/{id}', 'MemberController@assign')->name('member.assign');
        Route::post('member/assign/{id}', 'MemberController@post_assign')->name('member.post_assign');
        Route::get('member/showGameRecordInfo/{id}', 'MemberController@showGameRecordInfo')->name('member.showGameRecordInfo');
        Route::get('member/showRechargeInfo/{id}', 'MemberController@showRechargeInfo')->name('member.showRechargeInfo');
        Route::get('member/showDrawingInfo/{id}', 'MemberController@showDrawingInfo')->name('member.showDrawingInfo');
        Route::get('member/showDividendInfo/{id}', 'MemberController@showDividendInfo')->name('member.showDividendInfo');
        Route::get('member/checkBalance/{id}', 'MemberController@checkBalance')->name('member.checkBalance');
        Route::get('member/showTransfer/{id}', 'MemberController@showTransfer')->name('member.showTransfer');
        Route::resource('member', 'MemberController');
        Route::post('dividend/del', 'DividendController@delete')->name('dividend.del');
        Route::resource('dividend', 'DividendController');
        Route::resource('member_login_log', 'MemberLoginLogController');
        Route::post('game_record/del', 'GameRecordController@delete')->name('game_record.del');
        Route::resource('game_record', 'GameRecordController');
        Route::post('transfer/del', 'TransferController@delete')->name('transfer.del');
        Route::resource('transfer', 'TransferController');
        Route::resource('fs_level', 'FsLevelController');
        Route::resource('send_fs', 'SendFsController');
        Route::resource('fs', 'FsController');
        Route::resource('member_daili_apply', 'MemberDailiApplyController');
        Route::resource('member_daili', 'MemberDailiController');
        Route::resource('member_offline', 'MemberOfflineController');
        Route::resource('member_offline_recharge', 'MemberOfflineRechargeController');
        Route::resource('member_offline_drawing', 'MemberOfflineDrawingController');
        Route::resource('member_offline_dividend', 'MemberOfflineDividendController');
        Route::resource('member_offline_game_record', 'MemberOfflineGameRecordController');
        Route::get('daili_money_log/show_by_id/{id}', 'DailiMoneyLogController@show_by_id')->name('daili_money_log.show_by_id');
        Route::resource('daili_money_log', 'DailiMoneyLogController');
        Route::resource('send_daili_money', 'SendDailiMoneyController');
        Route::resource('yj_level', 'YjLevelController');
        Route::put('recharge_weixin/confirm/{id}', 'RechargeWeixinController@confirm')->name('recharge_weixin.confirm');
        Route::resource('recharge_weixin', 'RechargeWeixinController');
        Route::put('recharge_ali/confirm/{id}', 'RechargeAliController@confirm')->name('recharge_ali.confirm');
        Route::resource('recharge_ali', 'RechargeAliController');
        Route::put('recharge_bank/confirm/{id}', 'RechargeBankController@confirm')->name('recharge_bank.confirm');
        Route::resource('recharge_bank', 'RechargeBankController');
        Route::resource('money_report', 'MoneyReportController');
        
        Route::get('change_log', 'RechargeBankController@change_log')->name('recharge_bank.change_log');
        
        
        Route::put('recharge/confirm/{id}', 'RechargeController@confirm')->name('recharge.confirm');
        Route::resource('recharge', 'RechargeController');
        Route::put('drawing/confirm/{id}', 'DrawingController@confirm')->name('drawing.confirm');
        Route::resource('drawing', 'DrawingController');
        Route::get('activity/check/{id}/{status}', 'ActivityController@check')->name('activity.check');
        Route::resource('activity', 'ActivityController');
        Route::get('system_notice/check/{id}/{status}', 'SystemNoticeController@check')->name('system_notice.check');
        Route::get('system_notice/qingchu', 'SystemNoticeController@qingchu')->name('system_notice.qingchu');
        Route::resource('system_notice', 'SystemNoticeController');
        Route::resource('message', 'MessageController');
        Route::get('apple/check/{id}/{status}', 'AppleController@check')->name('apple.check');
        
        Route::get('apple/url', 'AppleController@url')->name('apple.url');
        Route::get('apple/urledit', 'AppleController@urledit')->name('apple.urledit');
        
        
        Route::resource('apple', 'AppleController');
        Route::get('tcg_game_list/check/{id}/{status}', 'TcgGameListController@check')->name('tcg_game_list.check');
        Route::get('tcg_game_list/pull', 'TcgGameListController@pull')->name('tcg_game_list.pull');
        Route::resource('tcg_game_list', 'TcgGameListController');
        Route::get('game_list/check/{id}/{status}', 'GameListController@check')->name('game_list.check');
        Route::get('game_list/pull', 'GameListController@pull')->name('game_list.pull');
        Route::resource('game_list', 'GameListController');
        Route::get('feedback/check/{id}/{status}', 'FeedbackController@check')->name('feedback.check');
        Route::resource('feedback', 'FeedbackController');
        Route::get('red/check/{id}/{status}', 'RedController@check')->name('red.check');
        Route::get('red/giveNumCheck/{id}/{status}', 'RedController@giveNumCheck')->name('red.giveNumCheck');
        Route::resource('red', 'RedController');
        Route::resource('banner', 'BannerController');
        Route::resource('template', 'TemplateController');
        Route::get('template/set/{id}/{client_type}','TemplateController@set')->name('template.set');
        
        Route::resource('url', 'UrlController');
        Route::get('url/store', 'UrlController@store')->name('url.store');
        Route::post('url/add', 'UrlController@add')->name('url.add');
        Route::post('url/edit2', 'UrlController@edit2')->name('url.edit2');
        
        Route::get('url/destroy', 'UrlController@destroy')->name('url.destroy');
        Route::get('url/check', 'UrlController@check')->name('url.check');
        
        
        Route::post('transfer_all', 'MemberController@transfer_all')->name('transfer_all');
        
        Route::get('clear/do', 'MessageController@cleardo')->name('cleardo');
        
        
    });
});
Route::group(['namespace' => 'Api'],function ($router){
    $router->get('api/rechargeListen', 'SelfController@rechargeListen')->name('api.rechargeListen');
    $router->get('api/fasttran', 'SelfController@fasttran')->name('api.fasttran');
    $router->get('api/jokerorder','SelfController@jokerorder')->name('web.jokerorder');
    $router->get('api/jokerorder2','SelfController@jokerorder2')->name('web.jokerorder2');
    $router->get('api/qiyouorder','SelfController@qiyouorder')->name('web.qiyouorder');
    $router->get('api/qiyouorder2','SelfController@qiyouorder2')->name('web.qiyouorder2');
    
    $router->get('api/qiyoutran','SelfController@qiyoutran')->name('web.qiyoutran');
    $router->get('api/jokertran','SelfController@jokertran')->name('web.jokertran');
    //自动返水
    $router->get('api/waterback','SelfController@waterback')->name('web.jokerorder');
	$router->get('api/daily','SelfController@daily')->name('web.daily');
	 $router->get('api/game_record', 'ApiClientController@index')->name('api.game_record.index');
    $router->get('game/game_record', 'SelfController@game_record')->name('game.game_record');
	$router->get('game/game_recordbu', 'SelfController@game_recordbu')->name('game.game_recordbu');
	$router->get('game/game_recordcj', 'SelfController@game_recordcj')->name('game.game_recordcj');
	
	$router->get('api/user', 'SelfController@searchUser')->name('game.searchUser');
	$router->get('api/login', 'SelfController@searchLogin')->name('game.searchLogin');
	
	
    //$router->get('api/game_record', 'ApiClientController@index')->name('api.game_record.index');
    //$router->get('game/game_record', 'SelfController@game_record')->name('game.game_record');
	
	
	
	
	
    $router->get('api/spacemoney', 'SelfController@spacemoney')->name('game.spacemoney');
    
    $router->get('api/apiauto', 'SelfController@apiauto')->name('web.apiauto');
    //不需要登陆试玩地址

    $router->post('api/wallet_balance', 'ApiClientController@wallet_balance')->name('member.api.wallet_balance');
    $router->get('game/playGame', 'SelfController@login')->name('game.playGame');
    
    $router->get('game/gameList', 'SelfController@gameList')->name('game.gameList');
    
    $router->get('api/clean', 'SelfController@clean')->name('game.clean');
    $router->post('api/credit_all', 'SelfController@credit_all')->name('game.credit_all');
    $router->get('api/jokergame', 'SelfController@jokergame')->name('game.jokergame');
    $router->get('api/testgame', 'SelfController@testgame')->name('game.testgame');
    $router->get('api/fastorder', 'SelfController@fastorder')->name('game.fastorder');
    
    
    Route::group(['middleware' => 'auth.member:member'], function($router){
        $router->get('api/check', 'ApiClientController@check')->name('member.api.check');
        $router->post('transfer/all', 'ApiClientController@transfer_all')->name('transfer_all');

    });
    Route::get('api/userTotal', 'SelfController@userTotal')->name('api.userTotal');
    
    
 

});

Route::get('api/gamelist', 'Web\IndexController@gamelist')->name('api.gamelist');

Route::get('api/zhuanchu', 'Web\IndexController@gamelist')->name('api.gamelist');
Route::get('repullBettingHistoryApiClient','PlayerController@repullBettingHistoryApiClient');  //获取投注历史记录接口
