function showid(oid){
	var obj=document.getElementById(oid);
	obj.style.display=obj.style.display=="none"?"block":"none";
	return false;
}

//w是图片宽度,h是图片高度, w=0时按高度缩小, h=0时按宽度缩小
function drawpic(obj,w,h){
	if (w==0)	{if (obj.clientHeight>h){obj.style.height=h+'px';}return true;}
	
	if (h==0)	{if (obj.clientWidth>w){obj.style.width=w+'px';}return true;}
	
	if (obj.clientHeight/obj.clientWidth>(h/w))
	{obj.style.height=h+'px';}
	else
	{obj.style.width=w+'px';}
}

//更换验证码
function chgvcode(){
	var obj=document.getElementById("verify");
	obj.src=obj.src+"?rnd=2";
	return false;
}

function $$(n){
	var obj=document.getElementById(n);
	return obj;
}
//显示子菜单
function showmenu(n){
	$$('menu'+n).style.display='block';
}
//隐藏子菜单
function hidemenu(n){
	$$('menu'+n).style.display='none';
}