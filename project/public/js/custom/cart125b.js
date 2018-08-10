jQuery(document).ready(function($){var cartWrapper=$('.cd-cart-container');var $showcoupon=$('.woocommerce-info a.showcoupon');var productId=0;$('#add_to_mail').click();$showcoupon.click(function(){var $form=$('form.checkout_coupon');if($form.is(':visible')){$form.slideUp(500);}else{$form.slideDown(500);}});if(cartWrapper.length>0){var cartBody=cartWrapper.find('.body');var cartList=cartBody.find('ul').eq(0);var cartTotal=cartWrapper.find('.checkout').find('span');var cartTrigger=cartWrapper.children('.cd-cart-trigger');var cartCount=cartTrigger.children('.count');var addToCartBtn=$('.add-to-cart');var cartToggle=$('nav.menu li.cart');var undo=cartWrapper.find('.undo');var undoTimeoutId;initEditProduct();cartToggle.click(function(){if(cartWrapper.hasClass('empty')){}else{}});addToCartBtn.on('click',function(event){event.preventDefault();Cart.add();});cartTrigger.on('click',function(event){event.preventDefault();toggleCart();});cartWrapper.on('click',function(event){if($(event.target).is($(this)))toggleCart(true);});cartList.on('click','.delete-item',function(event){event.preventDefault();Cart.remove(this.dataset.id);removeProduct($(event.target).parents('.product'));});cartList.on('change','select',function(event){quickUpdateCart();});undo.on('click','a',function(event){clearInterval(undoTimeoutId);event.preventDefault();cartList.find('.deleted').addClass('undo-deleted').one('webkitAnimationEnd oanimationend msAnimationEnd animationend',function(){$(this).off('webkitAnimationEnd oanimationend msAnimationEnd animationend').removeClass('deleted undo-deleted').removeAttr('style');quickUpdateCart();});undo.removeClass('visible');});$('#services-form').on('submit',function(e){var form=$('#services-form');var prco=$('.cd-cart-container .cd-cart-trigger ul.count').text();var check=checkForm(form.find('input, textarea, select'));prco=parseFloat(prco);prco=isNaN(prco)?0:prco;if(!check&&prco<=0){e.preventDefault();var msg="Please, select a Product and fill out Titles and Instructions fields";if($('.insnot').hasClass('notices'))msg="Please, select a Product and fill out Notices fields";sweetAlert("Oops...",msg,"error");return;}if(!check&&prco>0){e.preventDefault();location.href='/cart/';return;}$(e).submit();});}function toggleCart(bool){var cartIsOpen=(typeof bool==='undefined')?cartWrapper.hasClass('cart-open'):bool;if(cartIsOpen){cartWrapper.removeClass('cart-open');clearInterval(undoTimeoutId);undo.removeClass('visible');cartList.find('.deleted').remove();setTimeout(function(){cartBody.scrollTop(0);},500);}else{cartWrapper.addClass('cart-open');}}function empty_form(){$('#service-option').val(0).trigger('change');$('#no-words').val(200);$('#no-articles').val(1);$('#services-form textarea').val('');$('.form-columns.up_files .up_file').remove();$('.notices').removeClass('notices');$('.insnothide').css('visibility','visible');$('.insnot').attr('placeholder','Instructions');$('#files_obj').val('');$('#uploadede_file').val('');$('#prod_services').val('');$('.services-form textarea').attr('disabled','disabled');}function addToCart(price,name,id){var cartIsEmpty=cartWrapper.hasClass('empty');addProduct(price,name,id);updateCartCount(cartIsEmpty);updateCartTotal(price,true);cartWrapper.removeClass('empty');}function postNgo(url,data){if(typeof url=='string'){var postform=document.createElement("form");postform.method="POST";postform.action=url;if(typeof data=='object'){for(a in data){var el=document.createElement("input");el.name=a;el.value=data[a];el.type="hidden";postform.appendChild(el);}}document.body.appendChild(postform);postform.submit();}}function initEditProduct(){var editbtns=cartWrapper.find('.actions .edit-item');editbtns.off('.edit-prod-action');editbtns.on('click.edit-prod-action',function(e){e.preventDefault();var href=this.href;var id=this.dataset.id;if(typeof id!='undefined'&&typeof href!='undefined'){postNgo(href,{edit_id:id});}});}function addProduct(price,name,id){productId=productId+1;var productAdded=$('<li class="product"><div class="product-image"><a href="#0"><img src="/wp-content/themes/ranking-articles/img/product-preview.png" alt="placeholder"></a></div><div class="product-details"><h3><a href="#0">'+name+'</a></h3><span class="price">'+price+'</span><div class="actions"><a href="#0" class="delete-item" data-id="'+id+'">Delete</a><a href="/cart/" class="edit-item" data-id="'+id+'">Edit</a></div></div></li>');cartList.prepend(productAdded);initEditProduct();}function removeProduct(product){clearInterval(undoTimeoutId);cartList.find('.deleted').remove();var topPosition=product.offset().top-cartBody.children('ul').offset().top,productQuantity=Number(product.find('.quantity').find('select').val()),productTotPrice=Number(product.find('.price').text().replace('$',''))*productQuantity;product.css('top',topPosition+'px').addClass('deleted');cartList.find('.deleted').remove();updateCartTotal(productTotPrice,false);updateCartCount(true,-productQuantity);undoTimeoutId=setTimeout(function(){undo.removeClass('visible');cartList.find('.deleted').remove();},8000);}function quickUpdateCart(){var quantity=0;var price=0;cartList.children('li:not(.deleted)').each(function(){var singleQuantity=Number($(this).find('select').val());quantity=quantity+singleQuantity;price=price+singleQuantity*Number($(this).find('.price').text().replace('$',''));});cartTotal.text(price.toFixed(2));cartCount.find('li').eq(0).text(quantity);cartCount.find('li').eq(1).text(quantity+1);}function updateCartCount(emptyCart,quantity){var count=$('.cd-cart ul li.product .price').size();cartCount.html(count);$('li.cart span i, div.cart-mobile span i').html(count);}function updateCartTotal(price,bool){var price=0;$('.cd-cart ul li.product .price').each(function(){p=parseFloat(this.innerHTML);price+=isNaN(p)?0:p;});cartTotal.html(price.toFixed(2));}var Cart={add:function(){var form=$('#services-form');if(!checkForm(form.find('input, textarea, select'))){var msg="Please, select a Product and fill out Titles and Instructions fields";if($('.insnot').hasClass('notices'))msg="Please, select a Product and fill out Notices fields";sweetAlert("Oops...",msg,"error");return;}var data=new FormData(form.get(0));data.append('action','add_to_cart');data.append('addcustomcarts',1);$.ajax({url:"/wp-admin/admin-ajax.php",type:'POST',data:data,cache:false,dataType:'json',processData:false,contentType:false,beforeSend:function(){},success:function(res,stat,jqXHR){if(res.status=='success'){addToCart(res.product.price,res.product.name,res.product.id);empty_form();sweetAlert("Success","The item was added","success");}}});},remove:function(id){$.post("/wp-admin/admin-ajax.php",{action:'remove_cart_item',id:id},function(res){res=JSON.parse(res);if(res.status!='error'){updateCartTotal();}});}}});