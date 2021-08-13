function user_register(){
	jQuery('.field_error').html('');
	var name=jQuery("#name").val();
	var email=jQuery("#email").val();
	var mobile=jQuery("#mobile").val();
	var password=jQuery("#password").val();
	var type=jQuery("#type").val();
	var is_error='';
	if(name==""){
		jQuery('#name_error').html('Please enter name');
		is_error='yes';
	}if(email==""){
		jQuery('#email_error').html('Please enter email');
		is_error='yes';
	}if(mobile==""){
		jQuery('#mobile_error').html('Please enter mobile');
		is_error='yes';
	}if(password==""){
		jQuery('#password_error').html('Please enter password');
		is_error='yes';
	}
	if(is_error==''){
		jQuery.ajax({
			url:'signin_up',
			type:'post',
			data:'name='+name+'&email='+email+'&mobile='+mobile+'&password='+password+'&type='+type,
			success:function(result){
				if(result=='email_present'){
					jQuery('#email_error').html('Email id already exist');
				}
				if(result=='name_present'){
					jQuery('#name_error').html('Username already in use');
				}
				if(result=='sent'){
					jQuery('#register').html('Thank you for registration, verification email has been sent to your mail');
				}
			}
		});
	}

}

function user_edit(){
	jQuery('.field_error').html('');
	var firstname=jQuery("#firstname").val();
	var lastname=jQuery("#lastname").val();
	var name=jQuery("#name").val();
	var email=jQuery("#email").val();
	var mobile=jQuery("#mobile").val();
	var gender=jQuery("#gender").val();
	var website=jQuery("#website").val();
	var instagram=jQuery("#instagram").val();
	var twitter=jQuery("#twitter").val();
	var bio=jQuery("#bio").val();
	var uidd=jQuery("#uidd").val();
	var typee=jQuery("#typee").val();
	var is_error='';
	if(bio==""){
		jQuery('#bio_error').html('Please enter bio');
		is_error='yes';
	}if(gender==""){
		jQuery('#gender_error').html('Please select gender');
		is_error='yes';
	}
	if(is_error==''){
		jQuery.ajax({
			url:'signin_up',
			type:'post',
			data:'name='+name+'&firstname='+firstname+'&lastname='+lastname+'&email='+email+'&mobile='+mobile+'&name='+name+'&gender='+gender+'&instagram='+instagram+'&website='+website+'&twitter='+twitter+'&bio='+bio+'&uidd='+uidd+'&typee='+typee,
			success:function(result){
				if(result=='valid'){
					jQuery('#save').html('Updated');
				}
			}
		});
	}
}

function user_change(){
	jQuery('.field_error').html('');
	var password=jQuery("#password").val();
	var new_password=jQuery("#new_password").val();
	var uid=jQuery("#uid").val();
	var type=jQuery("#type").val();
	var is_error='';
	if(password==""){
		jQuery('#password_error').html('Please enter current password');
		is_error='yes';
	}if(new_password==""){
		jQuery('#new_password_error').html('Please enter password');
		is_error='yes';
	}
	if(is_error==''){
		jQuery.ajax({
			url:'signin_up',
			type:'post',
			data:'password='+password+'&new_password='+new_password+'&uid='+uid+'&type='+type,
			success:function(result){
				if(result=='valid'){
					jQuery('#update').html('Password updated');
				}
				if(result=='wrong'){
					jQuery('#update').html('Incorrect password');
				}
			}
		});
	}

}


function user_login(){
	jQuery('.field_error').html('');
	var email=jQuery("#email").val();
	var password=jQuery("#password").val();
	var type=jQuery("#type").val();
	var is_error='';
	if(email==""){
		jQuery('#email_error').html('Please enter email');
		is_error='yes';
	}if(password==""){
		jQuery('#password_error').html('Please enter password');
		is_error='yes';
	}
	if(is_error==''){
		jQuery.ajax({
			url:'signin_up',
			type:'post',
			data:'email='+email+'&password='+password+'&type='+type,
			success:function(result){
				if(result=='wrong'){
					jQuery('#login_msg').html('Please enter valid login details');
				}
				if(result=='valid'){
					window.location.href='profile';
				}
				if(result=='wrong3'){
					jQuery('#login_msg').html('Please verify email address');
				}
				if(result=='wrong2'){
					jQuery('#login_msg').html('Your account has been suspended');
				}
			}
		});
	}
}
function user_forgot(){
	jQuery('.field_error').html('');
	var email=jQuery("#email").val();
	var type=jQuery("#type").val();
	var is_error='';
	if(email==""){
		jQuery('#email_error').html('Please enter email');
		is_error='yes';
	}
	if(is_error==''){
		jQuery.ajax({
			url:'signin_up',
			type:'post',
			data:'email='+email+'&type='+type,
			success:function(result){
				if(result=='wrong'){
					jQuery('#forgot').html('Your account has been suspended');
				}
				if(result=='done'){
					jQuery('#forgot').html('Password has been sent');
				}
				if(result=='wrong3'){
					jQuery('#forgot').html('Email not registered with us');
				}
				if(result=='wrong2'){
					jQuery('#forgot').html('Your email is unverified');
				}
			}
		});
	}
}


function set_checkbox(id){
	var cat_dish=jQuery('#cat_dish').val();
	var check=cat_dish.search(":"+id);
	if(check!='-1'){
		cat_dish=cat_dish.replace(":"+id,'');
	}else{
		cat_dish=cat_dish+":"+id;
	}
	jQuery('#cat_dish').val(cat_dish);
	jQuery('#frmCatDish')[0].submit();
}

function setFoodType(type){
	jQuery('#type').val(type);
	jQuery('#frmCatDish')[0].submit();
}

function setSearch(){
	jQuery('#search_str').val(jQuery('#search').val());
	jQuery('#frmCatDish')[0].submit();
}

function add_to_cart(id,type){
	var qty=jQuery('#qty'+id).val();
	var attr=jQuery('input[name="radio_'+id+'"]:checked').val();
	var is_attr_checked='';
	if(typeof attr=== 'undefined'){
		is_attr_checked='no';
	}
	if(qty>0 && is_attr_checked!='no'){
		jQuery.ajax({
			url:FRONT_SITE_PATH+'manage_cart',
			type:'post',
			data:'qty='+qty+'&attt='+attr+'&type='+type,
			success:function(result){
				var data=jQuery.parseJSON(result);
				swal("Congratulation!", "Dish added successfully", "success");
				jQuery('#shop_added_msg_'+attr).html('(Added -'+qty+')');
				jQuery('#totalCartDish').html(data.totalCartDish);
				jQuery('#totalPrice').html(data.totalPrice+' Rs');
				var tp1=data.totalPrice;
				if(data.totalCartDish==1){
					var tp=qty*data.price;
					var html='<div class="shopping-cart-content"><ul id="cart_ul"><li class="single-shopping-cart" id="attr_'+attr+'"><div class="shopping-cart-img"><a href="javascript:void(0)"><img alt="" src="'+SITE_DISH_IMAGE+data.image+'"></a></div><div class="shopping-cart-title"><h4><a href="javascript:void(0)">'+data.dish+'</a></h4><h6>Qty: '+qty+'</h6><span>'+tp+' Rs</span></div><div class="shopping-cart-delete"><a href="javascript:void(0)" onclick=delete_cart("'+attr+'")><i class="ion ion-close"></i></a></div></li></ul><h4>Total : <span class="shop-total" id="shopTotal">'+tp+' Rs</span></h4><div class="shopping-cart-btn"><a href="cart">view cart</a><a href="checkout">checkout</a></div></div>';
					jQuery('.header-cart').append(html);
				}else{
					var tp=qty*data.price;
					jQuery('#attr_'+attr).remove();
					var html='<li class="single-shopping-cart" id="attr_'+attr+'"><div class="shopping-cart-img"><a href="#"><img alt="" src="'+SITE_DISH_IMAGE+data.image+'"></a></div><div class="shopping-cart-title"><h4><a href="javascript:void(0)">'+data.dish+'</a></h4><h6>Qty: '+qty+'</h6><span>'+tp+' Rs</span></div><div class="shopping-cart-delete"><a href="javascript:void(0)" onclick=delete_cart("'+attr+'")><i class="ion ion-close"></i></a></div></li>';
					jQuery('#cart_ul').append(html);
					jQuery('#shopTotal').html(tp1+ 'Rs');
				}

			}
		});
	}else{
		swal("Error", "Please select qty and dish item", "error");
	}
}

function delete_cart(id,is_type){
	jQuery.ajax({
		url:FRONT_SITE_PATH+'manage_cart',
		type:'post',
		data:'attt='+id+'&type=delete',
		success:function(result){
			if(is_type=='load'){
				window.location.href=window.location.href;
			}else{
				var data=jQuery.parseJSON(result);
				//swal("Congratulation!", "Dish added successfully", "success");
				jQuery('#totalCartDish').html(data.totalCartDish);
				jQuery('#shop_added_msg_'+id).html('');

				if(data.totalCartDish==0){
					jQuery('.shopping-cart-content').remove();
					jQuery('#totalPrice').html('');
				}else{
					var tp1=data.totalPrice;
					jQuery('#shopTotal').html(tp1+ 'Rs');
					jQuery('#attr_'+id).remove();
					jQuery('#totalPrice').html(data.totalPrice+' Rs');
				}
			}

		}
	});
}


jQuery('#frmProfile').on('submit',function(e){
	jQuery('#profile_submit').attr('disabled',true);
	jQuery('#form_msg').html('Please wait...');
	jQuery.ajax({
		url:FRONT_SITE_PATH+'update_profile',
		type:'post',
		data:jQuery('#frmProfile').serialize(),
		success:function(result){
			jQuery('#form_msg').html('');
			jQuery('#profile_submit').attr('disabled',false);
			var data=jQuery.parseJSON(result);
			if(data.status=='success'){
				jQuery('#user_top_name').html(jQuery('#uname').val());
				swal("Success Message", data.msg, "success");
			}
		}
	});
	e.preventDefault();
});

jQuery('#frmPassword').on('submit',function(e){
	jQuery('#password_submit').attr('disabled',true);
	jQuery('#password_form_msg').html('Please wait...');
	jQuery.ajax({
		url:FRONT_SITE_PATH+'update_profile',
		type:'post',
		data:jQuery('#frmPassword').serialize(),
		success:function(result){
			jQuery('#password_form_msg').html('');
			jQuery('#password_submit').attr('disabled',false);
			var data=jQuery.parseJSON(result);
			if(data.status=='success'){
				swal("Success Message", data.msg, "success");
			}
			if(data.status=='error'){
				swal("Error Message", data.msg, "error");
			}
		}
	});
	e.preventDefault();
});

function apply_coupon(){
	var coupon_code=jQuery('#coupon_code').val();
	if(coupon_code==''){
		jQuery('#coupon_code_msg').html('Please enter coupon code');
	}else{
		jQuery.ajax({
			url:FRONT_SITE_PATH+'apply_coupon',
			type:'post',
			data:'coupon_code='+coupon_code,
			success:function(result){
				var data=jQuery.parseJSON(result);
				if(data.status=='success'){
					swal("Success Message", data.msg, "success");
					jQuery('.shopping-cart-total').show();
					jQuery('.coupon_code_str').html(coupon_code);
					jQuery('.final_price').html(data.coupon_code_apply+' Rs');
				}
				if(data.status=='error'){
					swal("Error Message", data.msg, "error");
				}
			}
		})
	}
}

function updaterating(id,oid){
	var rate=jQuery('#rate'+id).val();
	var rate_str=jQuery('#rate'+id+' option:selected').text();

	if(rate==''){
		//jQuery('#coupon_code_msg').html('Please enter coupon code');
	}else{
		jQuery.ajax({
			url:FRONT_SITE_PATH+'updaterating',
			type:'post',
			data:'id='+id+'&rate='+rate+'&oid='+oid,
			success:function(result){
				jQuery('#rating'+id).html("<div class='set_rating'>"+rate_str+"</div>");
			}
		})
	}
}
