<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="/style/Admin/css/pintuer.css">
<link rel="stylesheet" href="/style/Admin/css/admin.css">
<script src="/style/Admin/js/jquery.js"></script>
<script src="/style/Admin/js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 分类列表</strong></div>
  <div class="padding border-bottom">
    <button type="button" class="button border-yellow" onclick="window.location.href='#add'"><span class="icon-plus-square-o"></span> 添加分类</button>
  </div>
  <table class="table table-hover text-center">
    <tr>
      <th width="5%">ID</th>
      <th width="5%">PID</th>
      <th width="5%">PATH</th>
      <th width="15%">分类名称</th>
      <th width="5%">分类级别</th>
      <th width="20%">操作</th>
    </tr>

    @foreach($categorys as $value)
    <tr>
      <td>{{$value->id}}</td>
      <td>{{$value->pid}}</td>
      <td>{{$value->path}}</td>
      <td>{{$value->catName}}</td>
      <td>图片</td>
      <td>
        <div class="button-group"> <a class="button border-main" href="/admin/category/{{$value->id}}/edit"><span class="icon-edit"></span> 修改</a> 
         <a class="button border-red" href="javascript:void(0)" onclick="return del(this,'{{$value->id}}')"><span class="icon-trash-o"></span> 删除</a> </div>
      </td>
    </tr>
    @endforeach
   
  </table>
</div>
<!-- 底部分页 -->
<div class="panel admin-panel" style="float:right">
    {{$categorys->links()}}
</div> 
<div style="clear:both"></div>       

<!-- 底部添加界面 -->
<div class="panel admin-panel margin-top">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>分类管理</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" onsubmit="return false;" id="form-admin-add">
      <div class="form-group">
        <div class="label">
          <label>上级分类：</label>
        </div>
        <div class="field">
          <select name="pid" class="input w50">
            <option value="0" selected="selected">1级分类</option>
            
             <!-- 第一级分类 -->
            @foreach ($categorys_all as $value)
            {{$count = substr_count($value->path,'-')}}
            <option value="{{$value->id}}" >{{str_repeat('-', $count)}}{{$value->catName}}</option>
            <!-- 第二级分类 -->
                @foreach ($value->zi as $value2)

                {{$count2 = substr_count($value2->path,'-')}}
                <option value="{{$value2->id}}" >{{str_repeat('-', $count2)}}{{$value2->catName}}</option>

                 <!-- 第三级分类 -->
                      @foreach ($value2->zi as $value3)
                      {{$count3 = substr_count($value3->path,'-')}}
                      <option value="{{$value3->id}}" >{{str_repeat('-', $count3)}}{{$value3->catName}}</option>
                      @endforeach

                @endforeach

            @endforeach
            
         
          </select>
            <input type="hidden" name="path" id="path" value="0-">
          <div class="tips">不选择上级分类默认为1级分类</div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>分类标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="catName" id='catName'/>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>分类关键字：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="key_word" id="key_word" />
        </div>
      </div>

       <div class="form-group">
        <div class="label">
          <label>分类描述：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="destext" id="destext" />
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>分类排序：</label>
        </div>
        <div class="field">
          <input type="number"  min="1" class="input" value="1" name="sort" id="sort" />
        </div>
      </div>


      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" onclick="formAdminAdd()" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body>


<!-- script 处理 -->
<script type="text/javascript">


//删除管理员
function del(id,mid){

  if(confirm("您确定要删除吗?")){      
    $.post('/admin/admin/'+mid,{'_token':'{{csrf_token()}}','_method':'DELETE'},function(data){

        if (data == 1) {//成功
          window.location.reload();
         }else if(data){

              // if (data['username']) {
                // alert(data['catName'][0]);
              // }else if(data['pass']){
              //   alert(data['pass']);
              // }
         }else{
            alert('操作失败');
         }
    });

  }
};

//添加管理员
function formAdminAdd(){
 
  var str = $("#form-admin-add").serialize();
  $.post('/admin/category',{str:str,'_token':'{{csrf_token()}}'},function(data){
     if (data == 1) {//成功

      window.location.reload() ;
     }else if(data){
          if (data['catName']) {
            alert(data['catName']);
          }
     }else{
        alert('操作失败');
     }

  });
}
</script>
</html>