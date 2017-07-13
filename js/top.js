window.onload = function(){
	var tbtn = document.getElementById('btn');
	var timer = null;
	var isTop = true;
	
	window.onscroll = function(){
		tbtn.style.display = "block";
		
	}
	
	
	tbtn.onclick = function(){
		timer = setInterval(function(){
				var tTop = document.body.scrollTop||document.documentElement.scrollTop;
				document.body.scrollTop = document.documentElement.scrollTop -= 120;
		
		if(tTop == 0){
			clearInterval(timer);
		}
		},30);
		
		
	
	
	}
}