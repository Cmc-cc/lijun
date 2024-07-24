@extends('wap.template.theme5.layouts.main')
@section('content')
    <div class="layout mt12">
        <input id="newbtn" type="button" onclick="clickadd();" class="confirm-sub mt30" value="新增银行卡"
               style="display: block;">
        <div class="wtdCard-content" style="display: none;">
            <table class="form-t mt12 wtdCard" id="cardlist" style="width:100%;">
                <tbody>
                <tr>
                    <td>
                        <label>账号:</label>
                        <span id="userId">we2016</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>姓名:</label>
                        <span id="TrueName"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>银行:</label>
                        <span id="openBank"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>卡号:</label>
                        <span id="bankCard"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>支行:</label>
                        <span id="bankMeg"></span>
                    </td>
                </tr>

                </tbody>
            </table>
            <input type="button" onclick="javascript:history.back(-1);" class="confirm-sub mt30" value="返 回">
        </div>
        <form id="form_card" method="post" style="display: none;" action="{{ route('wap.post_bind_bank') }}">
            <div class="modal-hd">
                <a id="close" class="right modal-close close-reveal-modal"></a>

                <h2>新增取款银行卡</h2>
            </div>
            <div class="login-wrap clearboth">
                <ul class="mod-forms-2">
                    <li>
                        <label>开户姓名</label>
                        <div class="form-ipt">
                            <input type="text" id="account" maxlength="50" class="txt-ipt" name="bank_username">
                        </div>
                    </li>
                    <li>
                        <label>银行名称</label>
                        <div class="form-ipt">

                            <select id="bankname" name="bank_name">
                                <option value="">--请选择--</option>
                                @foreach(\App\Models\Base::$BANK_TYPE as $v)
                                    <option value="{{ $v }}"
                                            @if($_member->bank_name == $v) selected @endif>{{ $v }}</option>
                                @endforeach
                            </select>
                        </div>
                    </li>
                    <li>
                        <label>开户账号</label>
                        <div class="form-ipt">
                            <input type="number" id="card" maxlength="18" name="bank_card" class="txt-ipt" warning="请输入开户账号">
                        </div>
                    </li>
                    <li>
                        <label>开户行</label>
                        <div class="form-ipt">
                            <input type="text" id="banknode" maxlength="50" class="txt-ipt"
                                   placeholder="示例：河南商丘工商银行五一路支行" warning="请输入开户行信息" name="bank_branch_name">
                            <p><span class="tips">如<font color="red">工行</font>需填写此项，示例：河南商丘工商银行五一路支行</span></p>
                        </div>
                    </li>
                </ul>

                <div class="mt10">
                    <a class="log-btn reg-btn" href="javascript:void(0);" style="color:gary;margin-bottom: 10px;width: 100%"
                       onclick="$('#form_card')[0].reset();$('#form_card').hide();$('#newbtn').show();$('#cardlist').show();">取消</a>
                    <a style="width: 100%" class="log-btn forget-psw-btn ajax-submit-btn" href="javascript:void(0);" >提交</a>
                </div>
            </div>
        </form>
    </div>
@endsection