@extends('admin.layouts.main')
@section('content')
     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">代理报表</h3>
             </div>
             <div class="panel-body">
                 @include('admin.report.filter')
                    <div class="bootstrap-table">
                    	<div class="fixed-table-toolbar"></div>
                    	<div class="fixed-table-container" style="padding-bottom: 0px;">
                    		<div class="fixed-table-header" style="display: none;">
                    			<table></table>
                    		</div>
                    		<div class="fixed-table-body">
                    			<div class="fixed-table-loading" style="top: 42px; display: none;">正在努力地加载数据中，请稍候……</div>
                    			<table id="table" class="table table-hover table-striped">
                    				<thead class="">
                    					<tr>
                    						<th class="detail" rowspan="1">
                    							<div class="fht-cell"></div>
                    						</th>
                    						<th  data-field="name">
                    							<div class="th-inner ">代理名稱</div>
                    							<div class="fht-cell"></div>
                    						</th>
                    						<th  data-field="agent_mode">
                    							<div class="th-inner ">下级人数</div>
                    							<div class="fht-cell"></div>
                    						</th>
                    						<th  data-field="agent_mode">
                    							<div class="th-inner ">代理模式</div>
                    							<div class="fht-cell"></div>
                    						</th>
                    						<th  data-field="total_recharge">
                    							<div class="th-inner ">總充值</div>
                    							<div class="fht-cell"></div>
                    						</th>
                    						<th  data-field="total_dividend">
                    							<div class="th-inner ">總紅利</div>
                    							<div class="fht-cell"></div>
                    						</th>
                    						<th  data-field="total_drawing">
                    							<div class="th-inner ">總提款</div>
                    							<div class="fht-cell"></div>
                    						</th>
                    						<th  data-field="real_profit">
                    							<div class="th-inner ">實際總利潤</div>
                    							<div class="fht-cell"></div>
                    						</th>
                    						
                    						<!--<th  data-field="give_money">-->
                    						<!--	<div class="th-inner ">输赢</div>-->
                    						<!--	<div class="fht-cell"></div>-->
                    						<!--</th>-->
                    						<!--<th  data-field="profit">-->
                    						<!--	<div class="th-inner ">有效投注额</div>-->
                    						<!--	<div class="fht-cell"></div>-->
                    						<!--</th>-->
                    						<!--<th  data-field="give_money">-->
                    						<!--	<div class="th-inner ">总投注额</div>-->
                    						<!--	<div class="fht-cell"></div>-->
                    						<!--</th>-->
                    						
                    						<th  data-field="rate">
                    							<div class="th-inner ">分成</div>
                    							<div class="fht-cell"></div>
                    						</th>
                    						<th  data-field="fc_res">
                    							<div class="th-inner ">分成結果</div>
                    							<div class="fht-cell"></div>
                    						</th>
                    						
                    					</tr>
                    				</thead>
                    				<tbody>
                    				    @foreach($data as $v)
                        					<tr data-index="0">
                        						<td>
                        						    @if($v->teamAllCount)
                        							<a class="detail-icon"  >
                        								<i class="glyphicon glyphicon-minus icon-minus" data-level="1" data-id="{{$v->id}}" data-status="1" style="display:none;cursor:pointer"></i>
                        								<i class="glyphicon glyphicon-plus icon-plus" data-level="1" data-id="{{$v->id}}" data-status="0" style="cursor:pointer"></i>
                        							</a>
                        							@endif
                        						</td>
                        						<td >{{$v->name}}(代理)</td>
                        						<td >{{$v->teamAllCount}}</td>
                        						<td >盈利分成(分層)</td>
                        						<td >{{$v->rechargeTotal}}</td>
                        						<td >{{$v->dividendTotal}}</td>
                        						<td >{{$v->drawingTotal}}</td>
                        						<td >{{$v->yingkui}}</td>
                        						
                        						<td >{{$v->agent_fencheng}}%</td>
                        						
                        						<td >
                        							<span style="color:black">0</span>
                        						</td>
                        					</tr>
                        					
                    					@endforeach
                    				</tbody>
                    			</table>
                    		</div>
                    	</div>
                    </div>
                 <div class="clearfix">
                     <div class="pull-left" style="margin: 0;">
                         <p>总共 <strong style="color: red">{{ $data->total() }}</strong> 条</p>
                     </div>
                     <div class="pull-right" style="margin: 0;">
                        {!! $data->appends(['member_id' => $member_id, 'start_at' => $start_at, 'end_at' => $end_at])->links() !!}
                     </div>
                 </div>

             </div>
         </div>

     </section><!-- /.content -->
@endsection
@section("after.js")
     <script>
         $(function(){
             $('.show-cate').click(function(){
                 var url = $(this).attr('data-uri');
                 layer.open({
                     type: 2,
                     title: '发放佣金记录表',
                     shadeClose: false,
                     shade: 0.8,
                     area: ['60%', '90%'],
                     content: url
                 });
             })
         });
         
         
            $('body').on('click','.glyphicon',function(){
                var id = $(this).data('id');
                var level = $(this).data('level');
                var status = $(this).data('status');
                var that = $(this);
                if(status == 1){
                    //关闭
                    // that.parent().parent().parent().next().remove();
                    $('.ttt').each(function(){
                        if($(this).data('id')==id){
                            $(this).parent().parent().parent().remove()
                        }
                    })
                    that.hide();
                    that.next().show();
                }else{
                    //打开
                    level = level+1;
                    var lll = '';
                    var lll2 = '';
                    for(var i = 1;i<level;i++){
                        lll += '';
                        lll2 += '';
                    }
                    $.ajax({
                        url:'/admin/team',
                        data:{id:id,start_at:$('#start_at').val(),end_at:$('#end_at').val()},
                        success:function(res){
                            
                            that.hide();
                            that.prev().show();
                            var html =`<tr><td colspan="12"><table class="table table-hover table-striped ttttt"><thead class="">
                    					<tr>
                    						<th class="detail" rowspan="1">
                    							<div class="fht-cell"></div>
                    						</th>
                    						<th  data-field="name">
                    							<div class="th-inner ">代理名稱</div>
                    							<div class="fht-cell"></div>
                    						</th>
                    						<th  data-field="agent_mode">
                    							<div class="th-inner ">下级人数</div>
                    							<div class="fht-cell"></div>
                    						</th>
                    						<th  data-field="agent_mode">
                    							<div class="th-inner ">代理模式</div>
                    							<div class="fht-cell"></div>
                    						</th>
                    						<th  data-field="total_recharge">
                    							<div class="th-inner ">總充值</div>
                    							<div class="fht-cell"></div>
                    						</th>
                    						<th  data-field="total_dividend">
                    							<div class="th-inner ">總紅利</div>
                    							<div class="fht-cell"></div>
                    						</th>
                    						<th  data-field="total_drawing">
                    							<div class="th-inner ">總提款</div>
                    							<div class="fht-cell"></div>
                    						</th>
                    						<th  data-field="real_profit">
                    							<div class="th-inner ">實際總利潤</div>
                    							<div class="fht-cell"></div>
                    						</th>
                    						
                    						<th  data-field="rate">
                    							<div class="th-inner ">分成</div>
                    							<div class="fht-cell"></div>
                    						</th>
                    						<th  data-field="fc_res">
                    							<div class="th-inner ">分成結果</div>
                    							<div class="fht-cell"></div>
                    						</th>
                    						
                    					</tr>
                    				</thead>`;
                            for(var i = 0;i<res.length;i++){
                                var v = res[i];
                                html += `<tr data-id="`+id+`" class="ttt">
                    								<td>`+lll2;
                    				if(v.teamAllCount > 0){
                    				    html += `<a class="detail-icon">
                    										<i class="glyphicon glyphicon-minus icon-minus" data-level="`+level+`" data-id="`+v.id+`" data-status="1" style="display:none;cursor:pointer"></i>
                        								    <i class="glyphicon glyphicon-plus icon-plus" data-level="`+level+`" data-id="`+v.id+`" data-status="0" style="cursor:pointer"></i>
                    									</a>`;
                    				}
                    									
                    							html +=	`</td>
                    													<td >`+lll+v.name;
                    				if(v.is_daili==1){
                    				    html += '(代理)';
                    				}									
                    													html += `</td>
                    													<td >`+v.teamAllCount+`</td>
                    													<td >盈利分成(分層)</td>
                    													<td >`+v.rechargeTotal+`</td>
                    													<td >`+v.dividendTotal+`</td>
                    													<td >`+v.drawingTotal+`</td>
                    													<td >`+v.yingkui+`</td>
                    													
                    													<td >`+v.agent_fencheng+`%</td>
                    													<td >0</td>
                    													
                    							</tr>`;
                            }
                            html += '</table></td></tr>';
                    		that.parent().parent().parent().after(html);
                        }
                    })
                }
            })
            
            // $('.glyphicon-plus').eq(0).click()
     </script>
@endsection