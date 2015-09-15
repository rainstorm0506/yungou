				function gg_show_Time_fun(times,objc,uhtml,data){				
					time = times - (new Date().getTime());
					i =  parseInt((time/1000)/60);
					s =  parseInt((time/1000)%60);
					ms =  String(Math.floor(time%1000));
					ms = parseInt(ms.substr(0,2));
					if(i<10)i='0'+i;
					if(s<10)s='0'+s;
					if(ms<0)ms='00';
					objc.html('<span class="minute">'+i+'</span>：<span class="minute">'+s+'</span>：<span class="minute">'+ms+'</span>');				
					if(time<=0){						
					var obj = objc.parent().parent();					
							obj.find(".minute").html('<span class="minute">正在计算,请稍后…</span>');	
							 setTimeout(function(){
								obj.html(uhtml);						
								obj.attr('class',"wenzi");
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
					html+='<div class="print">';					
					html+='<div class="new_publish1" style="border-right:solid 1px #ebebeb">';					
					html+='<i class="ico_label_newRevealready" title="即将揭晓"></i>';
					html+='<p class="w_goods_title">';
					html+='<a href="'+path+'/dataserver/'+info.id+'" title="'+info.title+'" target="_blank" >(第'+info.qishu+'期)'+info.title+'</a>';
					html+='</p>';
					html+='<div class="w_goods_pic">';
					html+='<a href="'+path+'/dataserver/'+info.id+'" target="_blank" >';
					html+='<img src="'+info.upload+'/'+info.thumb+'">';
					html+='</a>';
					html+='</div>';
					html+='<p class="w_goods_price">总需：'+info.zongrenshu+'人次</p>';
					html+='<div class="w_goods_record">';
					html+='<p>获奖者：马上揭晓</p>';
					html+='<p>本期幸运号码:马上揭晓</p>';
					html+='<span class="wenzi">倒计时：</span>';
					html+='<span class="shi"><span class="minute">99</span>:<span class="second">99</span>:<span class="millisecond">99</span></span>';
					html+='</span>';					
					html+='</div>';
					html+='</div>';
					html+='</div>';
					
					var uhtml = '';
					uhtml+='<div class="print">';					
					uhtml+='<div class="new_publish1" style="border-right:solid 1px #ebebeb">';					
					uhtml+='<i class="ico_label_newReveal" title="最新揭晓"></i>';
					uhtml+='<p class="w_goods_title">';
					uhtml+= '<a href="'+path+'/dataserver/'+info.id+'" title="'+info.title+'" target="_blank" >(第'+info.qishu+'期)'+info.title+'</a>';
					uhtml+='</p>';
					uhtml+='<div class="w_goods_pic">';
					uhtml+='<a href="'+path+'/dataserver/'+info.id+'" target="_blank" >';
					uhtml+='<img src="'+info.upload+'/'+info.thumb+'">';
					uhtml+='</a>';					
					uhtml+='</div>';					
					uhtml+='<p class="w_goods_price">总需：'+info.zongrenshu+'人次</p>';
					uhtml+='<div class="w_goods_record">';
					uhtml+='<p>获得者:<a href="'+path+'/uname/'+(1000000000 + parseInt(info.uid))+'" target="_blank">';
					uhtml+=info.user;
					uhtml+='</a></p>';
					uhtml+='<p>本期参与：'+info.user_shop_number+'人次</p>';
					uhtml+='<p>本期幸运号码:'+info.q_user_code+'</p>';
					uhtml+='</div>';
					uhtml+='</div>';
					uhtml+='</div>';

					var divl = $("#"+div).find('li');
					var len = divl.length;			
					if(len==4 && len  >0){
						var this_len = len - 1;
						divl.eq(this_len).remove();
					}			
					$("#"+div).prepend(html);					
					var div_li_obj = $(".new_publish1 .shi").eq(0);
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