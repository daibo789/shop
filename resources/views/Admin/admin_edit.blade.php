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
<div class="panel admin-panel margin-top">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>编辑管理员</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" onsubmit="return false;" id="form-admin-edit">
      <div class="form-group">
        <div class="label">
          <label>管理员角色：</label>
        </div>
        <div class="field">
          <select name="role" class="input w50">
            {{ $role = $adminInfo->role}}
            @if ($role==0)
            <option value="0" selected ="selected">超级管理员</option>
            @else
            <option value="0" >超级管理员</option>
            @endif
          
            @if ($role==1)
            <option value="1" selected ="selected">普通管理员</option>
            @else
            <option value="1" >普通管理员</option>
            @endif

          </select>
          <div class="tips">不选择上级分类默认为0级超级管理员</div>
        </div>
      </div>
  
      <input type="hidden" name="id" value="{{$adminInfo->id}}"> 
      <div class="form-group">
        <div class="label">
          <label>管理员用户名：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="{{$adminInfo->username}}" disabled="disabled"  id='username'/>
          <input type="hidden" name="username" value="{{$adminInfo->username}}"> 
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>管理员密码：</label>
        </div>
        <div class="field">
          <input type="password" value="{{$adminInfo->pass}}" class="input" name="pass" id="pass" />
        </div>
      </div>
    
      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        
        <div class="field">
          <button class="button bg-main icon-check-square-o" onclick="formAdminEdit(this,'{{$adminInfo->id}}')" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body>


<!-- script 处理 -->
<script type="text/javascript">
//edit管理员
function formAdminEdit(obj,id){
 
  var str = $("#form-admin-edit").serialize();

  $.post('/admin/admin/'+id,{str:str,'_token':'{{csrf_token()}}','_method':'PATCH'},function(data){
     if (data == 1) {//成功
      alert('操作成功');
     window.history.go(-1);
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
</script>
</html>