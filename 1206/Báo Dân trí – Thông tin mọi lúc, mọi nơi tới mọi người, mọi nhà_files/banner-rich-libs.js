var jsTimeout = new Number();
var jsTimeDelay = 60;
var jsAcceleration = 0.2;
var jsVelocity = 3;

function jsAnimate(div_id, attr, value)
{
	var _originValue = new Number();
	var _splitArr = new Array();
	
	_splitArr = String(document.getElementById(div_id).style[attr]).split("px");	
	_originValue = parseInt(_splitArr[0]);
	clearTimeout(jsTimeout);
	if (parseInt(value) > _originValue)
	{
		jsTimeout = setTimeout('animateProcess("'+div_id+'", "'+attr+'", "increase", "'+_originValue+'", "'+value+'", 1)', jsTimeDelay);
	} else if (parseInt(value) < _originValue)
	{
		jsTimeout = setTimeout('animateProcess("'+div_id+'", "'+attr+'", "increase", "'+_originValue+'", "'+value+'", 1)', jsTimeDelay);
	}
}

function animateProcess(div_id, attr, type, begin, end, timing)
{
	clearTimeout(jsTimeout);
	var _distance = (jsAcceleration * Math.pow(parseInt(timing),2)) / 2 + jsVelocity * parseInt(timing);
	var _s = new Number();
	switch (type)
	{
		case "increase":
			_s = parseInt(begin) + parseInt(_distance);
			if (_s >= parseInt(end))
			{
				document.getElementById(div_id).style[attr]	= end + "px";
			} else {
				document.getElementById(div_id).style[attr]	= _s + "px";
				timing++;
				jsTimeout = setTimeout('animateProcess("'+div_id+'", "'+attr+'", "'+type+'", "'+_s+'", "'+end+'", '+timing+')', jsTimeDelay);
			}
			break;
		case "decrease":
			_s = parseInt(begin) - parseInt(_distance);
			if (_s <= parseInt(end))
			{
				document.getElementById(div_id).style[attr]	= end + "px";
			} else {
				document.getElementById(div_id).style[attr]	= _s + "px";
				timing++;
				jsTimeout = setTimeout('animateProcess("'+div_id+'", "'+attr+'", "'+type+'", "'+_s+'", "'+end+'", '+timing+')', jsTimeDelay);
			}
			break;
	}
}

function hookExpand(objID, val, isExpand){
	var obj = document.getElementById(objID);
	if (obj==null) return;

	if (isExpand){
		// Scroll to this Obj
		var desty = obj.offsetTop;
		var thisNode = obj;
		while (thisNode.offsetParent && 
			  (thisNode.offsetParent != document.body)) {
		  thisNode = thisNode.offsetParent;
		  desty += thisNode.offsetTop;
		}
		window.scrollTo(0, desty);
	}
	
	obj.style.clip = val;
}

function hookExpandOverflow(objID, val, isExpand){
	var obj = document.getElementById(objID);
	if (obj==null) return;
	obj.style.clip = val;
	if (isExpand){
		// Scroll to this Obj
		var desty = obj.offsetTop;
		var thisNode = obj;
		while (thisNode.offsetParent && 
			  (thisNode.offsetParent != document.body)) {
		  thisNode = thisNode.offsetParent;
		  desty += thisNode.offsetTop;
		}
		window.scrollTo(0, desty);
		
		// Remove parent overflow: hidden
		var pNode = obj.parentNode;
		while (pNode.parentNode&& 
			  (pNode.parentNode!= document.body)) {
			if (pNode.style.overflow != 'visible') pNode.style.overflow = 'visible';
			if (parseInt(pNode.offsetHeight)>=500) break;
			pNode = pNode.parentNode; 
		}
	}
}