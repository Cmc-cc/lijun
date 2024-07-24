@extends('wap.template.theme9.layouts.main')
@section('content')
    <link href="{{ asset('wap/theme9/css/register.css') }}" rel="stylesheet">
    <section id="content">
        <div id="page-title">申请代理</div>
        <section id="register" class="agent ng-scope">
            <form name="agentForm" class="form-horizontal ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength" action="{{ route('wap.post_agent_apply') }}" method="post">
                <fieldset class="group-border">

                    <div class="form-group">
                        <label class="control-label">
                            <i class="fa fa-star fa-required"></i>
                            QQ
                        </label>
                        <div class="control-div">
                            <input name="qq" class="form-control ng-pristine ng-empty ng-invalid ng-invalid-required ng-valid-maxlength ng-touched" type="text" maxlength="50">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">
                            <i class="fa fa-star fa-required"></i>
                            联系电话
                        </label>
                        <div class="control-div">
                            <input name="phone" class="form-control ng-pristine ng-empty ng-invalid ng-invalid-required ng-valid-maxlength ng-touched" type="text" maxlength="50">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">
                            <i class="fa fa-star fa-required"></i>
                            申请理由
                        </label>
                        <div class="control-div">
                            <textarea name="about" id="dailiContent" class="partner-content form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" placeholder="请尽量注明您的优势" required=""></textarea>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <button id="btn-submit" class="submit ng-binding ajax-submit-btn" >立即申请</button>
                </fieldset>
            </form>
        </section>
    </section>
@endsection