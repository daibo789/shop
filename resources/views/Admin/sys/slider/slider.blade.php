<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="/style/admin/css/pintuer.css">
<link rel="stylesheet" href="/style/admin/css/admin.css">
<script src="/style/admin/js/jquery.js"></script>
<script src="/style/admin/js/pintuer.js"></script>

<!-- 上传插件的 -->
<link href="/uploadify/uploadify.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/uploadify/jquery.uploadify.min.js"></script>


</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 轮播列表</strong></div>
  <div class="padding border-bottom">  
  <button type="button" class="button border-yellow" onclick="window.location.href='#add'"><span class="icon-plus-square-o"></span> 添加轮播</button>
  </div>
  <table class="table table-hover text-center">
    <tr>
      <th width="5%">ID</th>
      <th width="20%">图片</th>
      <th width="5%">名称</th>
      <th width="20%">描述</th>
      <th width="5%">排序</th>
      <th width="20%">操作</th>
    </tr>
   
    <tr>
      <td>1</td>     
      <td><img src="/style/admin/images/11.jpg" alt="" width="120" height="50" /></td>     
      <td>首页焦点图</td>
      <td>描述文字....</td>
      <td>1</td>
      <td><div class="button-group">
      <a class="button border-main" href="#add"><span class="icon-edit"></span> 修改</a>
      <a class="button border-red" href="javascript:void(0)" onclick="return del(1,1)"><span class="icon-trash-o"></span> 删除</a>
      </div></td>
    </tr>

    
  </table>
</div>





<div class="panel admin-panel margin-top" id="add">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 增加内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="">    
      <div class="form-group">
        <div class="label">
          <label>标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="title" data-validate="required:请输入标题" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>URL：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="url" value=""  />
          <div class="tips"></div>
        </div>
      </div>

      </div> 
      <div id="fileQueue">上传图片</div>
      <input type="file" name="" id="file_upload" />
     


      <div class="form-group">
        <div class="label">
          <label>描述：</label>
        </div>
        <div class="field">
          <textarea type="text" class="input" name="note" style="height:120px;" value=""></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>排序：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="sort" value="0"  data-validate="required:,number:排序必须为数字" />
          <div class="tips"></div>
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
<script type="text/javascript">
function del(id,mid){
  if(confirm("您确定要删除吗?")){
  
  }
};


    $(function() {
            $("#file_upload").uploadify({
              //设置文本
              'buttonText':'图片上传',
              'script': '/admin/shangchuan',
              //设置文件传输的数据
              'formData':{
                '_token':'{{csrf_token()}}',
              },
             
              'height'  : '30',
              'width'   : '120',
              'cancelImg': '/uploadify/cancel.png',
                //动画
              'swf'   : '/uploadify/uploadify.swf',
              //上传的地址
              'uploader' : '/admin/shangchuan',
              
              //上传成功回调
              'onUploadSuccess':function(file,data,response){//每一个文件上传成功时触发该事件。

                        //$('#img_show').html('<img src="'+data+'" width="200" height="250"  />');
               }
            });
    });
</script>
</html>