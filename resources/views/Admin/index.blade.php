<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>bb菜</title>
    <meta name="keywords" content="简单,实用,网站后台,后台管理,管理系统,网站模板" />
    <meta name="description" content="简单实用网站后台管理系统网站模板下载。" /> 
    <link rel="stylesheet" href="/style/admin/css/pintuer.css">
    <link rel="stylesheet" href="/style/admin/css/admin.css">
    <script src="/style/admin/js/jquery.js"></script>   
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
    <h1><img src="images/y.jpg" class="radius-circle rotate-hover" height="50" alt="" />bb菜后台管理中心</h1>
  </div>
  <div class="head-l"><a class="button button-little bg-green" href="" target="_blank"><span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp;<a href="##" class="button button-little bg-blue"><span class="icon-wrench"></span> 清除缓存</a> &nbsp;&nbsp;<a class="button button-little bg-red" href="login.html"><span class="icon-power-off"></span> 退出登录</a> </div>
</div>

<div class="leftnav">
  <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
  <h2><span class="icon-user"></span>基本设置</h2>
  <ul style="display:display">
     <li><a href="/admin/admin/" target="right"><span class="icon-caret-right"></span>管理员管理</a></li>
    <li><a href="/admin/user/" target="right"><span class="icon-caret-right"></span>会员管理</a></li>
    <li><a href="/admin/category/" target="right"><span class="icon-caret-right"></span>分类管理</a></li>
  </ul>   
  <h2><span class="icon-pencil-square-o"></span>系统管理</h2>
  <ul>
    <li><a href="/admin/sys/config" target="right"><span class="icon-caret-right"></span>系统管理</a></li>
    <li><a href="/admin/sys/ads" target="right"><span class="icon-caret-right"></span>广告管理</a></li>
    <li><a href="/admin/sys/adsType" target="right"><span class="icon-caret-right"></span>分类广告管理</a></li>
    <li><a href="/admin/sys/slider" target="right"><span class="icon-caret-right"></span>轮播管理</a></li> 
  </ul>  
</div>

<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
    $(this).next().slideToggle(200);  
    $(this).toggleClass("on"); 
  })
  $(".leftnav ul li a").click(function(){
      $("#a_leader_txt").text($(this).text());
      $(".leftnav ul li a").removeClass("on");
    $(this).addClass("on");
  })
});
</script>
<ul class="bread">
  <li><a href="{:U('Index/info')}" target="right" class="icon-home"> 首页</a></li>
  <li><a href="##" id="a_leader_txt">网站信息</a></li>
  <li><b>当前语言：</b><span style="color:red;">中文</php></span>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;切换语言：<a href="##">中文</a> &nbsp;&nbsp;<a href="##">英文</a> </li>
</ul>
<div class="admin">
  <iframe scrolling="auto" rameborder="0" src="/admin/user" name="right" width="100%" height="100%"></iframe>
</div>
</body>
</html>