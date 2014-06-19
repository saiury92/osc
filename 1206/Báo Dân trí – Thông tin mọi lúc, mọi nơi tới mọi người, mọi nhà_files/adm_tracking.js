if(void 0===ADM_AdsTracking){var ADM_AdsTracking={version:"1.0.0",paramFlash:{},checkBrowser:function(){var b=!1,a;a=navigator.appName;var c=navigator.userAgent+"",d,e=c.match(/(opera|chrome|safari|firefox|msie)\/?\s*(\.?\d+(\.\d+)*)/i);null==e&&-1==c.indexOf("MSIE")&&-1!=c.indexOf("Trident/")?(a=-1,null!=/Trident\/.*rv:([0-9]{1,}[.0-9]{0,})/.exec(c)&&(a=RegExp.$1),e=["MSIE",a+""]):(e&&null!=(d=c.match(/version\/([\.\d]+)/i))&&(e[2]=d[1]),e=e?[e[1],e[2]]:[a,navigator.appVersion,"-?"]);a=e;"undefined"!=
typeof a&&null!=a&&1<=a.length&&(c=(a[0]+"").toLowerCase(),a=a[1].split("."),a=parseInt(a[0]),("firefox"==c&&22<=a||"msie"==c&&10<=a||"safari"==c&&5<=a)&&"localStorage"in window&&null!==window.localStorage&&(b=!0));return b},fonts:"",getFont:function(b){ADM_AdsTracking.fonts=b},lcStorage:{timestamp:"timestamp_",get_exprises:function(b,a,c,d){b+="";a=b.indexOf(a,c);c=b.length-1;return-1!=a?(d=b.indexOf(d,a),-1==d&&(d=c),b.substring(a,d)):""},set_item:function(b,a,c){var d="",e=(new Date).getTime(),
f=this.timestamp,e=0==c||""==c?e+63072E7:e+864E5*c,d="_azs"==b?";":",";c=this.get_exprises(a,f,0,d);a=""==c?a+(f+e.toString()+d):a.replace(c,f+e.toString());localStorage.setItem(b,a)},get_item:function(b,a){var c=localStorage.getItem(b),d=(new Date).getTime(),e=this.timestamp;if(""==c||null==c)return"";endchar="_azs"==b?";":",";var f=this.get_exprises(c,e,0,endchar),f=f.replace(e,"");return""==f||isNaN(parseInt(f))||parseInt(f)<d?"":c=c.replace(e+f+endchar,"")},remove_item:function(b){localStorage.removeItem(b)},
flush:function(){localStorage.clear()}},setCookie:function(b,a,c,d,e,f){(new Date).getTime();d="/";c=0==c||""==c?(new Date(+new Date+63072E7)).toGMTString():(new Date(+new Date+864E5*c)).toGMTString();b=[b+"="+escape(a)];for(var g in c={expires:c,path:d,domain:e})c[g]&&b.push(g+"="+c[g]);return f&&b.push("secure"),document.cookie=b.join(";"),!0},getCookie:function(b){return 0<document.cookie.length&&(c_start=document.cookie.indexOf(b+"="),-1!=c_start)?(c_start=c_start+b.length+1,c_end=document.cookie.indexOf(";",
c_start),-1==c_end&&(c_end=document.cookie.length),unescape(document.cookie.substring(c_start,c_end))):""},get:function(b){var a="",c="";if("__ui"==b||"__uid"==b||"__create"==b)c=b,b="__uif";if("localStorage"in window&&null!==window.localStorage){if("__R"==b||"__RC"==b||"__uif"==b)a=ADM_AdsTracking.getCookie(b);if(null==a||""==a)a=ADM_AdsTracking.lcStorage.get_item(b),null!=a&&""!=a&&ADM_AdsTracking.setCookie(b,a,"")}else a=ADM_AdsTracking.getCookie(b);if(""!=c&&""!=a){b=a.split("|");for(var d=0,
e=b.length;d<e;d++)if(-1!=b[d].indexOf(c+":")){a=b[d].replace(c+":","");break}}return a},set:function(b,a,c){if("localStorage"in window&&null!==window.localStorage){if(ADM_AdsTracking.lcStorage.set_item(b,a,c),"__R"==b||"__RC"==b||"__uif"==b)"__R"==b&&"undefined"!=typeof ADS_Location&&ADS_Location!=a&&""!=a&&"0"!=a&&(ADS_Location=parseInt(a)),"__RC"==b&&"undefined"!=typeof ADS_City&&ADS_City!=a&&""!=a&&"0"!=a&&(ADS_City=parseInt(a)),ADM_AdsTracking.setCookie(b,a,c)}else ADM_AdsTracking.setCookie(b,
a,c)},getParam:function(){if(ADM_AdsTracking.checkBrowser()){var b=ADM_AdsTracking.get("__create")+"",a=ADM_AdsTracking.get("__uid")+"";30<a.length&&(a="");""==a&&(b="");11<b.length&&""!=a&&(b=Math.floor((new Date).getTime()/1E3));return"&ce=1&lc="+ADM_AdsTracking.get("__RC")+"&cr="+b+"&ui="+a}return""},getInfoParam:function(){if(ADM_AdsTracking.checkBrowser())return"";var b=ADM_AdsTracking.get("__uid"),a=ADM_AdsTracking.get("__create");return"&ce=1&guie=1&__uid="+b+"&__create="+a},flashcheck:function(b){for(var a in b)ADM_AdsTracking.check(a,
b[a],!0)},expireAllCookies:function(b,a){var c=(new Date(0)).toUTCString();document.cookie=b+"=; expires="+c;for(var d=0,e=a.length;d<e;d++)document.cookie=b+"=; path="+a[d]+"; expires="+c},expireActiveCookies:function(b){for(var a=location.pathname.replace(/\/$/,"").split("/"),c=[],d=0,e=a.length,f;d<e;d++)f=a.slice(0,d+1).join("/"),f=f.replace(/\.([\w]+)/gi,""),""!=f&&(c.push(f),c.push(f+"/"));0<c.length&&ADM_AdsTracking.expireAllCookies(b,c)},check:function(b,a){switch(b){case "__ui":case "__uid":case "__create":if(2==
arguments.length&&"__uid"==b||"__create"==b&&""!=a){ADM_AdsTracking.paramFlash[b]=a;var c=ADS_CHECKER.getFlashMovie("_admFlck");c&&c.setck&&c.setck(ADM_AdsTracking.paramFlash)}var d=ADM_AdsTracking.get("__uif")+"";if(""==d)d=b+":"+a;else{for(var c=b+":"+a,d=d.split("|"),e=[],f=0,g=d.length;f<g;f++)-1==d[f].indexOf(b+":")&&e.push(d[f]);e.push(c);d=e.join("|")}ADM_AdsTracking.set("__uif",d,10);break;default:d=ADM_AdsTracking.get(b),2==arguments.length&&""!=a&&"0"!=a&&"-1"!=a&&(ADM_AdsTracking.paramFlash[b]=
a,(c=ADS_CHECKER.getFlashMovie("_admFlck"))&&c.setck&&c.setck(ADM_AdsTracking.paramFlash)),d!=a&&ADM_AdsTracking.set(b,a,"")}}};};

var _ADMFlashDetect = new function(){
	var self = this;
	self.installed = false;
	self.raw = "";
	self.major = -1;
	self.minor = -1;
	self.revision = -1;
	self.revisionStr = "";
	var activeXDetectRules = [
		{
			"name":"ShockwaveFlash.ShockwaveFlash.7",
			"version":function(obj){
				return getActiveXVersion(obj);
			}
		},
		{
			"name":"ShockwaveFlash.ShockwaveFlash.6",
			"version":function(obj){
				var version = "6.0.r21";
				try{
					obj.AllowScriptAccess = "always";
					version = getActiveXVersion(obj);
				}catch(err){}
				return version;
			}
		},
		{
			"name":"ShockwaveFlash.ShockwaveFlash",
			"version":function(obj){
				return getActiveXVersion(obj);
			}
		}
	];
   
	var getActiveXVersion = function(activeXObj){
		var version = -1;
		try{
			version = activeXObj.GetVariable("$version");
		}catch(err){}
		return version;
	};
   
	var getActiveXObject = function(name){
		var obj = -1;
		try{
			obj = new ActiveXObject(name);
		}catch(err){
			obj = {activeXError:true};
		}
		return obj;
	};
	
	var parseActiveXVersion = function(str){
		var versionArray = str.split(",");//replace with regex
		return {
			"raw":str,
			"major":parseInt(versionArray[0].split(" ")[1], 10),
			"minor":parseInt(versionArray[1], 10),
			"revision":parseInt(versionArray[2], 10),
			"revisionStr":versionArray[2]
		};
	};
   
	var parseStandardVersion = function(str){
		var descParts = str.split(/ +/);
		var majorMinor = descParts[2].split(/\./);
		var revisionStr = descParts[3];
		return {
			"raw":str,
			"major":parseInt(majorMinor[0], 10),
			"minor":parseInt(majorMinor[1], 10), 
			"revisionStr":revisionStr,
			"revision":parseRevisionStrToInt(revisionStr)
		};
	};
  
	var parseRevisionStrToInt = function(str){
		return parseInt(str.replace(/[a-zA-Z]/g, ""), 10) || self.revision;
	};
  
	self.majorAtLeast = function(version){
		return self.major >= version;
	};
 
	self.minorAtLeast = function(version){
		return self.minor >= version;
	};
   
	self.revisionAtLeast = function(version){
		return self.revision >= version;
	};
	
	self.versionAtLeast = function(major){
		var properties = [self.major, self.minor, self.revision];
		var len = Math.min(properties.length, arguments.length);
		for(i=0; i<len; i++){
			if(properties[i]>=arguments[i]){
				if(i+1<len && properties[i]==arguments[i]){
					continue;
				}else{
					return true;
				}
			}else{
				return false;
			}
		}
	};
  
	self._ADMFlashDetect = function(){
		if(navigator.plugins && navigator.plugins.length>0){
			var type = 'application/x-shockwave-flash';
			var mimeTypes = navigator.mimeTypes;
			if(mimeTypes && mimeTypes[type] && mimeTypes[type].enabledPlugin && mimeTypes[type].enabledPlugin.description){
				var version = mimeTypes[type].enabledPlugin.description;
				var versionObj = parseStandardVersion(version);
				self.raw = versionObj.raw;
				self.major = versionObj.major;
				self.minor = versionObj.minor; 
				self.revisionStr = versionObj.revisionStr;
				self.revision = versionObj.revision;
				self.installed = true;
			}
		}else if(navigator.appVersion.indexOf("Mac")==-1 && window.execScript){
			var version = -1;
			for(var i=0; i<activeXDetectRules.length && version==-1; i++){
				var obj = getActiveXObject(activeXDetectRules[i].name);
				if(!obj.activeXError){
					self.installed = true;
					version = activeXDetectRules[i].version(obj);
					if(version!=-1){
						var versionObj = parseActiveXVersion(version);
						self.raw = versionObj.raw.replace('Shockwave Flash ','');
						self.major = versionObj.major;
						self.minor = versionObj.minor; 
						self.revision = versionObj.revision;
						self.revisionStr = versionObj.revisionStr;
					}
				}
			}
		}
	}();
}
var paramBrowser={
	screen_Resolution:screen.width+''+screen.height,
	screen_Color:screen.colorDepth,
	hostname:document.domain.replace('www.',''),
	cookieEnabled:(navigator.cookieEnabled)?1:0,
	javaEnabled:(navigator.javaEnabled())?1:0,
	referrer:document.referrer,
	url:function(){
		var strlocation=(window.location != window.parent.location) ? document.referrer : document.location+"";
		var hostname=this.hostname;
		if(hostname==''){
			return strlocation;
		}
		else{
			return strlocation.substring(strlocation.indexOf(hostname)+hostname.length,strlocation.length);
		}
	},
	flashVersion:function(){
		var version=_ADMFlashDetect.major+'.'+_ADMFlashDetect.minor+'.'+_ADMFlashDetect.revisionStr;
		return version;
	 },
	zenURL:{
		encode:function(url){
			var hostname=document.domain;
			if(hostname.indexOf('muachung.vn')!=-1){
				if(url.indexOf('http://')==-1){
					if(typeof(ADS_CHECKER)=='undefined'){
						var mc_city='';
					}
					else{
						var mc_city=ADS_CHECKER.getCookie('mc_city');
					}
					var f=["/ha-noi","/tp-ho-chi-minh","/da-nang","/nha-trang","/vung-tau","/hai-phong"];
					var r=["/Ha-Noi","/TP-HCM","/Da-Nang","/Khanh-Hoa","/Ba-Ria-Vung-Tau","/Hai-Phong"];
					for(var i=0;i<f.length;i++){
						if(url.indexOf(f[i])==0){
							url=url.replace(f[i],r[i]);
							return encodeURIComponent(url);
						}
					}
					var k={"22":"/Ha-Noi","29":"/TP-HCM","15":"/Da-Nang","68":"/Khanh-Hoa","26":"/Hai-Phong","67":"/Ba-Ria-Vung-Tau"};
					if(mc_city!='' && (typeof(k[mc_city])!='undefined')){
						url=k[mc_city]+url;
	
					}
				}
				return encodeURIComponent(url);
				
			}
			else{
				return encodeURIComponent(url);
			}
		},
		decode:function(url){
			var encoded=url;
			return decodeURIComponent(encoded.replace(/\+/g,  " "));
		}
	}
}
var _ADMBrowser = {
	  Version: function() {
		var version = 999; // we assume a sane browser
		if (navigator.appVersion.indexOf("MSIE") != -1)
		  // bah, IE again, lets downgrade version number
		  version = parseFloat(navigator.appVersion.split("MSIE")[1]);
		return version;
	  }
}
var _admBrV=_ADMBrowser.Version();


function ADM_TrackingSend(){
    window['__ADM_TrackingSend']=true;
	_admProtocol=window.location.protocol+'', _stradmCer='';
	if(_admProtocol.indexOf('https:')!=-1){
		_stradmCer='lg.';
	};
	var chkBrowser=ADM_AdsTracking.checkBrowser(), url = "//lg.logging.admicro.vn/_tracking1.gif?",g=0;
	
	url += "fl="+paramBrowser.flashVersion();
	url += "&je="+paramBrowser.javaEnabled;
	url += "&sr="+paramBrowser.screen_Resolution;
	url += "&sc="+paramBrowser.screen_Color;
	url += "&hn="+paramBrowser.hostname;
	url += "&p="+paramBrowser.zenURL.encode(paramBrowser.url());	
	url += "&r="+((paramBrowser.referrer=='')?paramBrowser.referrer:paramBrowser.zenURL.encode(paramBrowser.referrer));	
	if(typeof(ADS_CHECKER)!='undefined'){
		if(paramBrowser.hostname.indexOf('enbac.com')!=-1){
			g=(ADS_CHECKER.getCookie('province_id')!='')?ADS_CHECKER.getCookie('province_id'):0;
		}
		if(paramBrowser.hostname.indexOf('rongbay.com')!=-1){
			g=(ADS_CHECKER.getCookie('cityid')!='')?ADS_CHECKER.getCookie('cityid'):0;
		}
	}
	url += "&g="+g;	
	if(typeof(ADS_CHECKER)=='undefined'){
		url=url.replace('_tracking1.gif','tracking_none_ads1.gif');
	}
	/*
	//send banner cpc zc.1
	ADM_Storage.sendLog('http://logging.admicro.vn/_zc.1.gif?_domain='+encodeURIComponent(document.URL)+'&_ci=1037440|218460&_zid=287&tp=3');
	//send banner BoxApp
	ADM_Storage.sendLog('http://logging.admicro.vn/_zc.2.gif?_domain='+encodeURIComponent(document.URL)+'&_ci=1035824|218491|-1&_zid=3682&tp=4');
	//send banner Balloon
	ADM_Storage.sendLog('http://logging.admicro.vn/v?1036985;218483;3964;-1;-1;9;0;0;'+paramBrowser.hostname+';'+encodeURIComponent(paramBrowser.url()));
	ADM_Storage.sendLog('http://logging.admicro.vn/_adv.gif?adm_domain='+encodeURIComponent(document.URL)+'&adm_campaign=1037464&adm_aditem=218574&adm_zoneid=6782&adm_channelid=-1');
	
	
	ADM_Storage.sendLog('http://logging.admicro.vn/c_cpa?1036985;218483;3964;-1;-1;9;0;0;'+paramBrowser.hostname+';'+encodeURIComponent(paramBrowser.url())+'&re=');
	*/	
	
	
		/*url=url.replace('logging.admicro.vn/tracking_none_ads.gif','wq.logging.admicro.vn:8088/tracking_none_ads.gif');
		url=url.replace('logging.admicro.vn/_tracking.gif','wq.logging.admicro.vn:8088/_tracking.gif');*/
		
		//detect browser not support cookie

		if(chkBrowser===true){
			var a = document.createElement("iframe");
			a.src = url+ADM_AdsTracking.getParam();
			a.style.width="0px";
			a.style.height="0px";
			a.style.display="none";
			a.style.border='none';
			a.target="admTrackmain";
			a.name="admIframeTracking";
			a.id="admIframeTracking";
			document.body.appendChild(a);
			var respondMessage = function (e) {
				
				//detect url domain not full url. get send data
				if (e.origin == 'http://logging.admicro.vn') {
					var data=e.data;
					if(typeof(data)=='object'){
						try{
							
							if(data[0]=='__CRT'){
								data[0]='__create';
							}
							if(data[0]=='__UF'){
								data[0]='__ui';
							}
							if(data[0]!='__C'){
								ADM_AdsTracking.check(data[0],data[1],'','/');
								//ADM_Storage.setStorage(data[0],data[1],365*(24*60),'/');
							}
							
							//localStorage[data[0]]=data[1];
						}catch(e){}
					}
				}
			}
			if (window.addEventListener) {
				window.addEventListener('message', respondMessage, false);
			}
			else{
				window.attachEvent('onmessage', respondMessage, false);
			}
			/*
			//send banner cpc zc.1
			ADM_Storage.sendLog('http://wq.logging.admicro.vn:8088/_zc.1.gif?_domain='+encodeURIComponent(document.URL)+'&_ci=1037440|218464&_zid=287&tp=3'+ADM_Storage.getParam());
			//send banner BoxApp
			ADM_Storage.sendLog('http://wq.logging.admicro.vn:8088/_zc.2.gif?_domain='+encodeURIComponent(document.URL)+'&_ci=1035824|218495|-1&_zid=3682&tp=4'+ADM_Storage.getParam());
			//send banner Balloon
			ADM_Storage.sendLog('http://wq.logging.admicro.vn:8088/v?p1=1036985;218487;3964;-1;-1;9;0;0;'+paramBrowser.hostname+'&p2='+encodeURIComponent(paramBrowser.url())+ADM_Storage.getParam());
			ADM_Storage.sendLog('http://wq.logging.admicro.vn:8088/c?p1=1036985;218487;3964;-1;-1;9;0;0;'+paramBrowser.hostname+';&p2='+encodeURIComponent(paramBrowser.url())+ADM_Storage.getParam()+'&re=');
			
			//baner CPD
			ADM_Storage.sendLog('http://wq.logging.admicro.vn:8088/_adv.gif?adm_domain='+encodeURIComponent(document.URL)+'&adm_campaign=1037464&adm_aditem=218576&adm_zoneid=6782&adm_channelid=-1'+ADM_Storage.getParam());
			*/
			
		}
		else{
			//browser support cookie.
			var a = document.createElement("script");
			a.type = "text/javascript";
			a.async = true;
			a.src = url;
			var c = document.getElementsByTagName("script")[0];
			c.parentNode.insertBefore(a, c);
			//headElement.removeChild(scriptTag); 
			/*
			//send banner cpc zc.1
			ADM_Storage.sendLog('http://wq.logging.admicro.vn:8088/_zc.1.gif?_domain='+encodeURIComponent(document.URL)+'&_ci=1037440|218463&_zid=287&tp=3');
			//send banner BoxApp
			ADM_Storage.sendLog('http://wq.logging.admicro.vn:8088/_zc.2.gif?_domain='+encodeURIComponent(document.URL)+'&_ci=1035824|218494|-1&_zid=3682&tp=4');
			//send banner Balloon
			ADM_Storage.sendLog('http://wq.logging.admicro.vn:8088/v?p1=1036985;218484;3964;-1;-1;9;0;0;'+paramBrowser.hostname+'&p2='+encodeURIComponent(paramBrowser.url()));
			ADM_Storage.sendLog('http://wq.logging.admicro.vn:8088/c?p1=1036985;218484;3964;-1;-1;9;0;0;'+paramBrowser.hostname+';&p2='+encodeURIComponent(paramBrowser.url())+'&re=');
			
			ADM_Storage.sendLog('http://wq.logging.admicro.vn:8088/_adv.gif?adm_domain='+encodeURIComponent(document.URL)+'&adm_campaign=1037464&adm_aditem=218575&adm_zoneid=6782&adm_channelid=-1');
			*/
		}
}

/*
var _admTrackingTime=0;
function checkgetJSON(){
	
	if((window.document.readyState=='complete')||(typeof(window.document.readyState)=='undefined')){
		if(!_trackingSend){
			_trackingSend=true;
			getJSON();
	    }
	}
	else{
		_admTrackingTime++;		
		if(_admTrackingTime==3){
			if(!_trackingSend){
				_trackingSend=true;
				getJSON();
			}
			return false;
		}		
		setTimeout("checkgetJSON()",1000);
	}
}
if(typeof(_trackingSend)=='undefined'){
	var _trackingSend=false;
}
checkgetJSON();
*/
ADM_TrackingSend();