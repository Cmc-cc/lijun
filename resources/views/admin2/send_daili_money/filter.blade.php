<div class="container-fluid" style="margin-bottom: 10px;">
    <form action="" method="get" id="searchForm">
        <div class="row">
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">选择代理</span>
                    <select name="member_id" id="member_id" class="form-control select2">
                        <option value="">--请选择--</option>
                        @foreach($_daili_list as $k => $v)
                            <option value="{{ $k }}" @if($member_id == $k) selected @endif>{{ $v }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">开始时间</span>
                    <input type="text" class="form-control" name="start_at" id="start_at" value="{{ $start_at }}" readonly>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">结束时间</span>
                    <input type="text" class="form-control" name="end_at" id="end_at" value="{{ $end_at }}" readonly>
                </div>
            </div>

        </div>
        <div class="row" style="margin-top: 5px;">
            <div class="col-lg-2 pull-right">
                <div class="input-group">
                    <button type="submit" class="btn btn-primary">搜索</button>&nbsp;
                    <button type="button" class="btn btn-warning" id="restSearchForm">重置</button>&nbsp;
                    <button type="button" class="btn btn-warning" onclick="location.href='/admin/daochu?member_id='+$('#member_id').val()+'&start_at='+$('#start_at').val()+'&end_at='+$('#end_at').val()">导出</button>&nbsp;
                </div>
            </div>
        </div>
    </form>
</div>