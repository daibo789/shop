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
  <div class="panel-head"><strong class="icon-reorder"> 管理员列表</strong></div>
  <div class="padding border-bottom">
    <button type="button" class="button border-yellow" onclick="window.location.href='#add'"><span class="icon-plus-square-o"></span> 管理员会员</button>
  </div>
  <table class="table table-hover text-center">
    <tr>
      <th width="5%">ID</th>
      <th width="15%">会员名称</th>
      <th width="15%">图片</th>
      <th width="10%">操作</th>
    </tr>

    @foreach($admins as $value)
    <tr>
      <td>{{$value->id}}</td>
      <td>{{$value->name}}</td>
      <td>图片</td>
      <td>
        <div class="button-group"> <a class="button border-main" href="/admin/admin/{{$value->id}}/edit"><span class="icon-edit"></span> 修改</a> 
         <a class="button border-red" href="javascript:void(0)" onclick="return del(this,'{{$value->id}}')"><span class="icon-trash-o"></span> 删除</a> </div>
      </td>
    </tr>
    @endforeach
   
  </table>
</div>
<!-- 底部分页 -->
<div class="panel admin-panel" style="float:right">
    {{ $admins->links()}}
</div> 
<div style="clear:both"></div>       

<!-- 底部添加界面 -->
<div class="panel admin-panel margin-top">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加管理员</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" onsubmit="return false;" id="form-admin-add">
      <div class="form-group">
        <div class="label">
          <label>管理员角色：</label>
        </div>
        <div class="field">
          <select name="role" class="input w50">
            <option value="0">超级管理员</option>
            <option value="1">普通管理员</option>
          </select>
          <div class="tips">不选择上级分类默认为0级超级管理员</div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>管理员用户名：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="username" id='username'/>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>管理员密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input" name="pass" id="pass" />
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
          alert('您的信息未修改');
              // if (data['username']) {
              //   alert(data['username']);
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
  $.post('/admin/admin',{str:str,'_token':'{{csrf_token()}}'},function(data){
     if (data == 1) {//成功
      $('#username').val('') ;
      $('#pass').val('') ;
      window.location.reload() ;
     }else if(data){
          if (data['username']) {
            alert(data['username']);
          }else if(data['pass']){
            alert(data['pass']);
          }
     }else{
        alert('操作失败');
     }

  });
}
</script>
</html>