<div class="container-fluid" style="margin-bottom: 10px;">
    <form action="" method="get" id="searchForm">
        <div class="row">
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">用户名</span>
                    <input type="text" class="form-control" name="name" placeholder="关键字" value="{{ $name }}">
                </div>
            </div>
              <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">姓名</span>
                    <input type="text" class="form-control" name="account" placeholder="关键字" value="{{ $account }}">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">状态</span>
                    <select name="status" id="status" class="form-control">
                        <option value="">--请选择--</option>
                        <option value="2" @if(2 == $status) selected @endif>提款成功</option>
                        <option value="3" @if(3 == $status) selected @endif>提款失败</option>
                    </select>
                </div>
            </div>
        </div>
       
        <div class="row" style="margin-top:10px">
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
            
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">审核开始时间</span>
                    <input type="text" class="form-control" name="updated_start_at" id="updated_start_at" value="{{ $updated_start_at }}" readonly>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">审核结束时间</span>
                    <input type="text" class="form-control" name="updated_end_at" id="updated_end_at" value="{{ $updated_end_at }}" readonly>
                </div>
            </div>
           
        </div>
        <div class="row" style="margin-top: 5px;">
            <div class="col-lg-2 pull-right">
                <div class="input-group">
                    <button type="submit" class="btn btn-primary">搜索</button>&nbsp;
                    <button type="button" class="btn btn-warning" id="restSearchForm">重置</button>&nbsp;
                </div>
            </div>
        </div>
    </form>
</div>