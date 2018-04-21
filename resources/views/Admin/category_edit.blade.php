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
          <input type="text" class="input w50" value="{{$categoryInfo->catName}}" name="catName" id='catName'/>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>分类关键字：</label>
        </div>
        <div class="field">
          <input type="text" value="{{$categoryInfo->key_word}}" class="input" name="key_word" id="key_word" />
        </div>
      </div>

       <div class="form-group">
        <div class="label">
          <label>分类描述：</label>
        </div>
        <div class="field">
          <input type="text" value="{{$categoryInfo->destext}}" class="input" name="destext" id="destext" />
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>分类排序：</label>
        </div>
        <div class="field">
          <input type="number"  min="1" class="input" value="{{$categoryInfo->sort}}" name="sort" id="sort" />
        </div>
      </div>


      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" onclick="formAdminEdit({{$categoryInfo->id}})" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body>


<!-- script 处理 -->
<script type="text/javascript">



//添加管理员
function formAdminEdit(id){
 
  var str = $("#form-admin-add").serialize();
  $.post('/admin/category/'+id,{str:str,'_token':'{{csrf_token()}}','_method':'PATCH'},function(data){
     if (data == 1) {//成功
        alert('操作成功');
         window.history.go(-1);
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