$(document).ready(function(){
		$(".updatecart").click(function(){
			var rowid= $(this).attr('id');
			var qty=$(this).parent().parent().find(".qty").val();
			var token = $("input[name='_token']").val();
			var maosp = $("input[name='maosp']").val();
			$.ajax({
				url:'capnhat/'+ rowid+'/'+qty,
				type:'GET',
				cache:false,
				data:{"_token":token,"id":rowid,"qty":qty,"maosp":maosp},
				success:function(data){
					if(data=="oke"){
						window.location("giohang");
					}
					else{
						   alert('Xin lỗi,hiện tại số lưọng hàng trong kho không đáp ứng đưọc nhu cầu của quý khách, rất xin lỗi quí khách');
					}

				}


			});
		});

});

