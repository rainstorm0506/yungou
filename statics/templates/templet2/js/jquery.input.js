$.fn.iVaryVal=function(iSet,CallBack){
	/*
	 * Minus:���Ԫ��--��С
	 * Add:���Ԫ��--����
	 * Input:��Ԫ��
	 * Min:������Сֵ���Ǹ�����
	 * Max:�������ֵ��������
	 */	
	iSet=$.extend({Minus:$('.jian'),Add:$('.jia'),Input:$('.amount'),Min:1,Max:20},iSet);
	var C=null,O=null;
	//�������ֵ
	var $CB={};
	//����
	iSet.Add.each(function(i){
		$(this).click(function(){
			O=parseInt(iSet.Input.eq(i).val());
			(O+1<=iSet.Max) || (iSet.Max==null) ? iSet.Input.eq(i).val(O+1) : iSet.Input.eq(i).val(iSet.Max);
			//�����ǰ�ı���ֵ
			$CB.val=iSet.Input.eq(i).val();
			$CB.index=i;
			//�ص�����
			if (typeof CallBack == 'function') {
                CallBack($CB.val,$CB.index);
            }
		});
	});
	//����
	iSet.Minus.each(function(i){
		$(this).click(function(){
			O=parseInt(iSet.Input.eq(i).val());
			O-1<iSet.Min ? iSet.Input.eq(i).val(iSet.Min) : iSet.Input.eq(i).val(O-1);
			$CB.val=iSet.Input.eq(i).val();
			$CB.index=i;
			//�ص�����
			if (typeof CallBack == 'function') {
				CallBack($CB.val,$CB.index);
		  	}
		});
	});
	//�ֶ�
	iSet.Input.bind({
		'click':function(){
			O=parseInt($(this).val());
			$(this).select();
		},
		'keyup':function(e){
			if($(this).val()!=''){
				C=parseInt($(this).val());
				//�Ǹ������ж�
				if(/^[1-9]\d*|0$/.test(C)){
					$(this).val(C);
					O=C;
				}else{
					$(this).val(O);
				}
			}
			//���̿��ƣ�����--�ӣ�����--��
			if(e.keyCode==38 || e.keyCode==39){
				iSet.Add.eq(iSet.Input.index(this)).click();
			}
			if(e.keyCode==37 || e.keyCode==40){
				iSet.Minus.eq(iSet.Input.index(this)).click();
			}
			//�����ǰ�ı���ֵ
			$CB.val=$(this).val();
			$CB.index=iSet.Input.index(this);
			//�ص�����
			if (typeof CallBack == 'function') {
                CallBack($CB.val,$CB.index);
            }
		},
		'blur':function(){
			$(this).trigger('keyup');
			if($(this).val()==''){
				$(this).val(O);
			}
			//�ж�����ֵ�Ƿ񳬳������Сֵ
			if(iSet.Max){
				if(O>iSet.Max){
					$(this).val(iSet.Max);
				}
			}
			if(O<iSet.Min){
				$(this).val(iSet.Min);
			}
			//�����ǰ�ı���ֵ
			$CB.val=$(this).val();
			$CB.index=iSet.Input.index(this);
			//�ص�����
			if (typeof CallBack == 'function') {
                CallBack($CB.val,$CB.index);
            }
		}
	});
}