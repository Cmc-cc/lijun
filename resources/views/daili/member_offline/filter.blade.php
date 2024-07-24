<div class="container-fluid" style="margin-bottom: 10px;">
    <form action="" method="get" id="searchForm">
        <div class="row">
            <div class="col-lg-2">
                <div class="input-group">
                    <span class="input-group-addon">状态</span>
                    <select name="status" id="status" class="form-control">
                        <option value="">--请选择--</option>
                        @foreach(config('platform.member_status') as $k =>$v)
                            <option value="{{ $k }}" @if(is_numeric($status) && $k == $status) selected @endif>{{ $v }}</option>
                            @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="input-group">
                    <span class="input-group-addon">类型</span>
                    <select name="is_daili" id="is_daili" class="form-control">
                        <option value="">--请选择--</option>
                        <option value="0" @if(is_numeric($is_daili) && 0 == $is_daili) selected @endif>会员</option>
                        <option value="1" @if(is_numeric($is_daili) && 1 == $is_daili) selected @endif>代理</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="input-group">
                    <span class="input-group-addon">账户</span>
                    <input type="text" class="form-control" name="name" value="{{ $name }}">
                </div>
            </div>
        </div>
        <div class="row" style="margin-bottom: 5px;">
            <div class="col-lg-3 pull-right">
                <div class="input-group">
                    <button type="submit" class="btn btn-primary">搜索</button>&nbsp;
                    <button type="button" class="btn btn-warning" id="restSearchForm">重置</button>&nbsp;
                    <a class="btn btn-danger" href="{{ route('daili.member_offline.create') }}?type=0">生成下线会员</a>
                    <a class="btn btn-danger" href="{{ route('daili.member_offline.create') }}?type=1" style="margin-left:5px;">生成下线代理</a>
                </div>
            </div>
        </div>
    </form>
</div>