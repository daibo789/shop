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
  <div class="panel-head"><strong class="icon-reorder"> 会员列表</strong></div>
  <div class="padding border-bottom">
    <button type="button" class="button border-yellow" onclick="window.location.href='#add'"><span class="icon-plus-square-o"></span> 添加会员</button>
  </div>
  <table class="table table-hover text-center">
    <tr>
      <th width="5%">ID</th>
      <th width="15%">会员名称</th>
      <th width="15%">图片</th>
      <th width="10%">操作</th>
    </tr>


    <tr>
      <td>1</td>
      <td>会员</td>
      <td>图片</td>
      <td><div class="button-group"> <a class="button border-main" href="cateedit.html"><span class="icon-edit"></span> 修改</a> <a class="button border-red" href="javascript:void(0)" onclick="return del(1,2)"><span class="icon-trash-o"></span> 删除</a> </div></td>
    </tr>
 
  </table>
</div>


<!-- 底部添加界面 -->
<div class="panel admin-panel margin-top">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加会员</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="">
      <div class="form-group">
        <div class="label">
          <label>会员角色：</label>
        </div>
        <div class="field">
          <select name="pid" class="input w50">
            <option value="0">普通角色</option>
            <option value="1">客户会员</option>
          </select>
          <div class="tips">不选择上级分类默认为0级会员</div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>会员用户名：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="title" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>会员密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input" name="s_title" />
        </div>
      </div>
    
      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body>
</html>