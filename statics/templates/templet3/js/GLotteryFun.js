				function gg_show_Time_fun(times,objc,uhtml,data){		
					time = times - (new Date().getTime());
					i =  parseInt((time/1000)/60);
					s =  parseInt((time/1000)%60);
					ms =  String(Math.floor(time%1000));
					ms = parseInt(ms.substr(0,2));
					if(i<10)i='0'+i;
					if(s<10)s='0'+s;
					if(ms<0)ms='00';
					objc.html('<span><b>'+i+'</b> : <b>'+s+'</b> : <b>'+ms+'</b></span>');				
					if(time<=0){						
						var obj = objc.parent().parent();							
							obj.find(".u_time").html('<em>正在计算,请稍后…</em>');	
							 setTimeout(function(){
								obj.html(uhtml);																
								obj.parent().attr('class',"new3_li");				
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
					html+='<li class="current"><s></s><dl style="display: block;"><dt>';
					html+='<a href="'+path+'/dataserver/'+info.id+'" target="_blank">';
					html+='<img src="'+info.upload+'/'+info.thumb+'">';
					html+='</a></dt><dd class="g_name">';
					html+='<a href="'+path+'/dataserver/'+info.id+'" target="_blank" style="font-size:12px;">(第'+info.qishu+'期)'+info.title+'</a></dd>';
					html+='<dd class="u_time">';
					html+='<em>揭晓倒计时</em>';
					html+='<span class="shi"><b>99</b> : <b>99</b> : <b><i>9</i><i>9</i></b></span>';
					html+='</dd></dl></li>';				
					
					var uhtml = '';
					uhtml += '<dl style="display: block;"><dt><a href="'+path+'/dataserver/'+info.id+'" target="_blank" >';
					uhtml +='<img src="'+info.upload+'/'+info.thumb+'"  width="213"height="200">';
					uhtml +='</a></dt><dd class="g_user"><p>恭喜';						
					uhtml+='<a href="'+path+'/dataserver/'+info.id+'" target="_blank"  >'+info.user+'</a>';					
					uhtml+='获得</p></dd><dd class="g_name"><a  href="'+path+'/uname/'+(1000000000 + parseInt(info.uid))+'" target="_blank">(第';	
					uhtml+=info.qishu+'期)'+info.title+'</a></dd>';
					uhtml+='</dl><s></s>';

					var divl = $("#"+div).find('li');
					var len = divl.length;
					if(len==5 && len  >0){
						var this_len = len-1;
						divl.eq(this_len).remove();
					}			
					$("#"+div).prepend(html);					
					var div_li_obj = $(".current .shi").eq(0);
					var data = new Array();
						data['id'] = info.id;
						data['path'] = path;							
					info.times = (new Date().getTime())+(parseInt(info.times))*1000;					
					gg_show_Time_fun(info.times,div_li_obj,uhtml,data,info.id);				
				}
				
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