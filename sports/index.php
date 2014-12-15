<!--2nd Design-->
<html>
<title>SportsFeed</title>
<head>
<script src="jquery.min.js"></script>

</head>
<style>
#write
{
	position:fixed; 
	visibility:hidden;
}
.mbx
{
	width:100%;
	height:90%;
}
.spc
{
	float:left;
	height:90%;
	width:2%;
	
	opacity:0.1;
}
.rects
{
	float:left;
	z-index:100;
	height:90%;
	width:12%;
	background-color:#666;
	
}
.transp
{
	height:100%;
	width:100%;
	background-color:#FFF;
	opacity:0.5;
}
.wrt
{
	font-family:jerseyLetters;
	font-weight:bold;	
}
.rects:hover{
	-webkit-animation:scl 2s ;
	-webkit-animation-fill-mode:forwards;
}

@-webkit-keyframes scl{
	0%   {-webkit-transform:scale(1,1);
	}
	100% {-webkit-transform:scale(1.1,1.1)}
	
}
.transp:hover{
  -webkit-animation:trsp 2s;
  -webkit-animation-iteration-count:1;
  -webkit-animation-fill-mode:forwards;
  
}

@-webkit-keyframes trsp{
	0%  {opacity:0.5;}
  100%  {opacity:0}
}


</style>
<script>

var xvar;
var vyar;
var chk;
document.addEventListener("mousemove",function(e){
	xvar=e.clientX||e.pageX;
	vyar=e.clientY||e.pageY;
	
	chk = document.elementFromPoint(xvar, vyar);
	
	for(var i=0;i<7;i++)
	{
	    if(document.getElementsByClassName("transp").item(i)==chk)
	    {
	     var par=chk.parentNode;
	    	
	     if((par.children[0]))
	     {
		 var chld=par.children[0];
		 chld.style.visibility="visible";
	     }
		}
		else
	    { 
		 var par=document.getElementsByClassName("transp").item(i).parentNode;
	     par.children[0];
		
	     if((par.children[0].getAttribute('id'))=="write")
	     {
		 var chld=par.children[0];
		 chld.style.visibility="hidden";
	     }
		
			 
		}
	
	
	}
});

</script>
<body background="indexpage/bck-1.jpg">

<div id="container" class="mbx">

<div class="spc"></div>

<a href="footballpage.php?id=2"><div class="rects" style=" background-image:url(indexpage/fbl2.jpg)">
<div id="write" >
<img src="indexpage/fbl_1.jpg"/>
</div>
<div class="transp"></div>
</div>
</a>
<div class="spc"></div>

<a href="badminton.php?id=4"><div class="rects" style="background-image:url(indexpage/bd1.jpg)">
<div id="write" >
<img src="indexpage/bdm_1.jpg"/></div>
<div class="transp"></div>
</div>
</a>

<div class="spc"></div>

<a href="volleypage.php?id=3"><div class="rects" style="background-image:url(indexpage/vb1.jpg)">
<div id="write" >
<img src="indexpage/vbl_1.jpg">
</div>
<div class="transp"></div>
</div>
</a>

<div class="spc"></div>

<a href="./crik/crik.php"><div class="rects" style="background-image:url(indexpage/cric1.jpg)">
<div id="write" >
<img src="indexpage/crc_1.jpg">
</div>
<div class="transp"></div>
</div>
</a>
<div class="spc"></div>

<a href="handball.php?id=5"><div class="rects" style="background-image:url(indexpage/hb1.jpg)">
<div id="write" >
<img src="indexpage/hbl_1.jpg">
</div>
<div class="transp"></div>
</div>
</a>
<div class="spc"></div>

<a href="hockey.php?id=6"><div class="rects" style="background-image:url(indexpage/hk1.jpg)">
<div id="write" >
<img src="indexpage/hk_1.jpg">
</div>
<div class="transp"></div>
</div>
</a>
<div class="spc"></div>

<a href="bbhome.php?id=1"><div class="rects" style="background-image:url(indexpage/bb1.jpg)">
<div id="write" >
<img  src="indexpage/bbl_1.jpg">
</div>
<div class="transp"></div>
</div>
</a>
<div class="spc"></div>

</div>

</body>
</html>
