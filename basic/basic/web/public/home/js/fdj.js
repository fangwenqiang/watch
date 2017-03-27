/*function $(ID) {return document.getElementById(ID)}
var oMain=$("main"),
	oSmall=$("small"),
	oBig=$("big"),
	oFdj=$("fdj"),
	oBigImg=$("bigImg");

	oSmall.onmouseover=function(){
		oFdj.style.display="block";
		oBig.style.display="block";
	}
	oSmall.onmouseout=function(){
		oFdj.style.display="none";
		oBig.style.display="none";
	}
	oSmall.onmousemove=function(e){
		var event=e||window.event;
		var x=event.clientX-oMain.offsetLeft-oSmall.offsetLeft-oFdj.offsetWidth/2,
			y=event.clientY-oMain.offsetTop-oSmall.offsetTop-oFdj.offsetHeight/2;
			if(x<0) x=0;
			if(y<0) y=0;
			if(x>oSmall.offsetWidth-oFdj.offsetWidth) x=oSmall.offsetWidth-oFdj.offsetWidth;
			if(y>oSmall.offsetHeight-oFdj.offsetHeight) y=oSmall.offsetHeight-oFdj.offsetHeight;
		oFdj.style.left=x+"px";
		oFdj.style.top=y+"px";
		oBigImg.style.left=-x*2+"px";
		oBigImg.style.top=-y*2+"px";
}
*/

function FdjStyle(main){
	this.oMain=document.getElementById(main);
	this.oSmall=this.oMain.children[0];
	this.oBig=this.oMain.children[1];
	this.oFdj=this.oSmall.children[1];
	this.oBigImg=this.oBig.children[0];
}	
FdjStyle.prototype.bindEvent=function(){
	var that=this;
	this.oSmall.onmouseover=function(){
		that.show("block");
	}
	this.oSmall.onmouseout=function(){
		that.show("none");
	}
	this.oSmall.onmousemove=function(e){
		that.Change(e);
	}
}
FdjStyle.prototype.show=function(val){
		this.oFdj.style.display=val;
		this.oBig.style.display=val;
}
FdjStyle.prototype.Change=function(e){
	var event=e||window.event;
		var x=event.clientX-this.oMain.offsetLeft-this.oSmall.offsetLeft-this.oFdj.offsetWidth/2,
			y=event.clientY-this.oMain.offsetTop-this.oSmall.offsetTop-this.oFdj.offsetHeight/2;
			if(x<0) x=0;
			if(y<0) y=0;
			if(x>this.oSmall.offsetWidth-this.oFdj.offsetWidth) x=this.oSmall.offsetWidth-this.oFdj.offsetWidth;
			if(y>this.oSmall.offsetHeight-this.oFdj.offsetHeight) y=this.oSmall.offsetHeight-this.oFdj.offsetHeight;
		this.oFdj.style.left=x+"px";
		this.oFdj.style.top=y+"px";
		this.oBigImg.style.left=-x*2+"px";
		this.oBigImg.style.top=-y*2+"px";
}
