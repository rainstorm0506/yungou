				function gg_show_Time_fun(times,objc,uhtml,data){		
					time = times - (new Date().getTime());
					i =  parseInt((time/1000)/60);
					s =  parseInt((time/1000)%60);
					ms =  String(Math.floor(time%1000));
					ms = parseInt(ms.substr(0,2));
					if(i<10)i='0'+i;
					if(s<10)s='0'+s;
					if(ms<0)ms='00';
					objc.html('<span class="minute">'+i+'</span>:<span class="second">'+s+'</span>:<span class="millisecond">'+ms+'</span>');				
	
					if(time<=0){
						
						var obj = objc.parent().parent();							
							obj.find(".countdown_div").html('<span class="lateron">正在计算,请稍后…</span>');	
							 setTimeout(function(){
								obj.html(uhtml);						
								obj.attr('class',"new_li");
								$.ajaxSetup({
									async : false
								});								
								$.post(data['path']+"/api/getshop/lottery_shop_set/",{'lottery_sub':'true','gid':data['id']},null);
							},5000);							 
							return;						
					}
					
					 setTimeout(function(){										 	
							gg_show_Time_fun(times,objc,uhtml,data);				 
					 },30); 
				
				}
				function gg_show_time_add_li(div,path,info){	
				
					var html = '';					
					html+='<li class="countdown_li">';
						html+='<a href="'+path+'/dataserver/'+info.id+'" target="_blank" class="pic">';
							html+='<img src="'+info.upload+'/'+info.thumb+'">';
						html+='</a>';
					html+='<a href="'+path+'/dataserver/'+info.id+'" target="_blank" class="name">'+info.title+'</a>';
					html+='<div class="countdown_div">';
						html+='<img src="'+info.upload+'/photo/zhong.gif">';
						html+='<span class="wenzi">倒计时:</span>';
						html+='<span class="shi"><span class="minute">99</span>:<span class="second">99</span>:<span class="millisecond">99</span></span>';
						html+='</span>';
					html+='</div>';
					html+='<div class="newawary"></div>';
					html+='</li>';
					
					var uhtml = '';
						uhtml += '<a href="'+path+'/dataserver/'+info.id+'" target="_blank" class="pic">';
							uhtml +='<img src="'+info.upload+'/'+info.thumb+'">';
						uhtml +='</a>';						

						uhtml+='<a href="'+path+'/dataserver/'+info.id+'" target="_blank" class="name">'+info.title+'</a>';					
						uhtml +='<span class="winner">';
						uhtml+='获得者：<strong><a rel="nofollow" class="blue" href="'+path+'/uname/'+(1000000000 + parseInt(info.uid))+'" target="_blank">';	
						uhtml+=info.user;
					uhtml+='</a></strong>';
					uhtml+='</span>';

					var divl = $("#"+div).find('li');
					var len = divl.length;			
					if(len==4 && len  >0){
						var this_len = len - 1;
						//divl[this_len].remove();
						divl.eq(this_len).remove();
					}			
					$("#"+div).prepend(html);					
					//var div_li_obj = $(".countdown_li").eq(0).find(".shi");
					var div_li_obj = $(".countdown_li .shi").eq(0);
					//setInterval(function(){gg_show_Time_fun(div_obj,info.times);},123);
					var data = new Array();
						data['id'] = info.id;
						data['path'] = path;							
					info.times = (new Date().getTime())+(parseInt(info.times))*1000;					
					gg_show_Time_fun(info.times,div_li_obj,uhtml,data,info.id);				
				}//	
				
				function gg_show_time_init(div,path,gid){	
					window.setTimeout("gg_show_time_init()",5000);	
					if(!window.GG_SHOP_TIME){	
						window.GG_SHOP_TIME = {
							gid : '',
							path : path,
							div : div,
							arr : new Array()
						};
					}
					$.get(GG_SHOP_TIME.path+"/api/getshop/lottery_shop_json/"+new Date().getTime(),{'gid':GG_SHOP_TIME.gid},function(indexData){																									
							var info = jQuery.parseJSON(indexData);		
							
							if(info.error == '0' && info.id != 'null'){							
								if(!GG_SHOP_TIME.arr[info.id]){
											GG_SHOP_TIME.gid =  GG_SHOP_TIME.gid +'_'+info.id;		
											GG_SHOP_TIME.arr[info.id] = true;											
											gg_show_time_add_li(GG_SHOP_TIME.div,GG_SHOP_TIME.path,info);							
								}			
							}			
					});	
						
				}