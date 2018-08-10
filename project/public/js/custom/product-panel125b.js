jQuery.fn.loading = function (a) {
    var opt = {
        start: typeof a != 'undefined' && typeof a.start != 'undefined' ? a.start : 0
    }
    var that  = this;
    var $that = jQuery(that);

    opt.start = Math.ceil((opt.start/10)) * 10;

    $that.addClass('loaing l_'+opt.start);

    var loading = {

        obj : that,
        $obj: $that,
        prev: 'l_'+opt.start,
        to:function (a) {

            this.$obj.removeClass(this.prev);

            a = Math.ceil((a/10)) * 10;

            this.$obj.addClass('l_'+a);

            this.prev = 'l_'+a;

        },
        end:function () {

            this.to(100);

            this.$obj.removeClass('loaing '+this.prev);

        }

    }

    return loading;

};



jQuery(function ($) {

    var $quantityBtns = $('.quantity .quantity-nav .quantity-button');
    var $formCart     = $('.single-product form.cart');
    var $product_pan  = $('#product_panel');
    var product_pan   = $product_pan.get(0);
    var formCart      = $formCart.get(0);
    var $file         = $('#file');
    var $fileUploadBu = $('.file-upload-button');
    var $uploadedShow = $('.form-columns.up_files');
    var $uloadedFiles = $('#uploadede_file');
    var $checkdeliver = $('.delivery .check-delivery');
    var $amount       = $('.summary .woocommerce-Price-amount');

    $formCart.on('submit',function(e){

        e.preventDefault();
        Cart.add();


    });

    $checkdeliver.click(function(){

        count_price();

    });

    $quantityBtns.click(function () {

        var val = formCart.quantity[0].value;


        if($(this).hasClass('quantity-up')){

            formCart.quantity[0].value++;
            formCart.quantity[1].value++;


        }else{

            if(val <= 0 ) return;

            formCart.quantity[0].value--;
            formCart.quantity[1].value--;


        }

        count_price();

    });

    $fileUploadBu.click(function () {

        $file.val('');
        $file.click();

    });

    $file.change(function () {

        var ld = $fileUploadBu.loading();

        ld.to(10);

        var files   = this.files;
        var noPass  = new Array();
        var form    = document.createElement('form');
        var data    = new FormData(form);
        var counter = 0;
        var formats = ['txt', 'rtf', 'doc', 'docx', 'pdf','jpg','xlsx', 'png', 'zip', 'rar'];
        var outofs  = [];
        var upl     = [];

        $.each( files, function( key, value ){

            var type = value.name.slice( value.name.lastIndexOf('.')+1 );
            var size = value.size/1024;

            if(size > 3000){

                outofs.push(value.name);

                return true;

            }

            if( formats.indexOf(type) >= 0 ){

                data.append('file-'+counter, value );
                upl.push(value.name);
                counter++;


            }else{

                noPass.push(value.name);

            }

        });
        ld.to(20);

        if(outofs.length > 0){

            sweetAlert( "Oops...", 'Size of this files : '+outofs.join(', ')+' is more than allowed (3mb) ',"error");
            ld.end();

        }

        if(noPass.length > 0){

            sweetAlert( "Oops...", 'This files can`t be uploaded : '+noPass.join(', ')+' because only zip, rar, docx, txt, rtf, pdf, jpg, png, xlsx document formats are allowed.',"error");
            ld.end();

        }

        if(upl.length <= 0){
            ld.end();
            return;
        }

        data.append( 'action', 'upload_photo' );
        $.ajax({
            url: "/wp-admin/admin-ajax.php",
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false,
            contentType: false,
            beforeSend:function(){
                ld.to(40);
            },
            success: function( response,stat, jqXHR ){

                ld.to(100);

                setTimeout(function () { ld.end(); },1000);

                if(Array.isArray(response.errors)){

                    sweetAlert( "Oops...", response.errors.join(','),"error")

                }

                if(typeof response.files_data != 'undefined' && response.files_data.length > 0){

                    showUploadedFiles(response.files_data);
                    sweetAlert("Success","File was successfully uploaded.","success");

                }

            }
        });

    });




    var Cart = {


        add:function () {

            var fields = $('.checkfiled');

            if(!checkForm(fields)){

                var msg = "Please, select a Product and fill out Titles and Instructions fields";

                if( $('.notices').size() > 0 ) msg = "Please, select a Product and fill out Notices fields";

                sweetAlert("Oops...", msg, "error");

                return;

            }

            SetServices();

            product_pan['no-articles'].value = formCart.quantity[0].value;

            var total =  parseFloat(product_pan['total-price'].value);

            $('.prod-services .delivery input').each(function () {

                if(this.checked){

                    if(this.dataset.pricetype == 1){

                        total += parseFloat(this.dataset.price);

                    }else{

                        total += parseFloat(this.dataset.price);

                    }

                }

            });

            product_pan['total-price'].value = total;

            var data  = new FormData(product_pan);

            data.append('quantity',formCart.quantity[0].value);
            data.append('action','add_to_cart');
            data.append('addcustomcarts','1');

            $.ajax({
                url: "/wp-admin/admin-ajax.php",
                type: 'POST',
                data: data,
                cache: false,
                dataType: 'json',
                processData: false,
                contentType: false,
                beforeSend:function(){

                },
                success: function( res,stat, jqXHR ){

                    if(res.status == 'success'){

                       location.href= '/cart/';

                    }

                }
            });


        },
        remove:function (id) {

            $.post("/wp-admin/admin-ajax.php",{action:'remove_cart_item',id:id},function (res) {

                res = JSON.parse(res);

                if(res.status != 'error'){

                    updateCartTotal();

                }

            });

        }

    }

    function count_price() {

        var price = parseFloat(Woo.ProductPrice);
        price = isNaN(price)  ? 0 : price;

        $checkdeliver.each(function () {

            if(this.checked){

                var chprice = parseFloat(this.dataset.price);
                chprice = isNaN(chprice) ? 0 : chprice;

                price += chprice

            }

        });

        $amount.html('$'+price.toFixed(2));

    }

    function initRemoveUploaded() {

        var $buttons = $('.up_file .remove');

        $buttons.off('.uplremove');

        $buttons.on('click.uplremove',function () {

            var hold = $(this).parents('.up_file');

            hold.fadeOut(500);

            setTimeout(function () {
                hold.remove();
                addUploadedLinks();
            },600);

        });

    }
    function addUploadedLinks() {

        var $buttons = $('.up_file');
        var links = '';
        var files_obj = [];

        $buttons.each(function () {

            var url = this.dataset.href;
            var nam = $(this).find('span.name').html();

            links += '<a href="'+url+'">'+nam+'</a><br>';

            files_obj.push({
                name :nam,
                link :url,
                type :typ
            });

        });

        $uloadedFiles.val(links);
        $('#files_obj').val(JSON.stringify(files_obj));

    }

    function SetServices() {

        var form = jQuery('#product_panel');
        var serv = {};

        form.find('.delivery input').each(function(){

            var that = jQuery(this);
            var lab  = that.next();
            var s    = lab.data('id');
            var tool = lab.find('.tooltip .msgtool');
            tool = tool.size() > 0 ? tool.html() : '';

            console.log(s);
            console.log(lab);

            if(typeof s != 'undefined'){

                serv[s] = { val: that.data('price'), type:that.data('pricetype'),checked:false, name: s, tool: tool };

            }

            if(this.checked) serv[s].checked = true;

        });

        form.find('#prod_services').val(JSON.stringify(serv));

    }

    function showUploadedFiles(f) {

        if(Array.isArray(f)){

            var html      = $uploadedShow.html();
            var links     = $uloadedFiles.val();
            var filo      = $('#files_obj').val();
            var files_obj = typeof filo == 'undefined' ||  filo == '' ? [] : JSON.parse( filo );

            f.forEach(function(a){

                html += '<div class="up_file" data-href="'+a.url+'"> ' +
                    '<span class="remove"></span> ' +
                    '<span class="logo '+a.format.slice(1)+'"></span> ' +
                    '<span class="name">'+a.name+'</span> ' +
                    '</div>';
                links += '<a href="'+a.url+'">'+a.name+'</a><br>';

                files_obj.push({
                    name :a.name,
                    link :a.url,
                    type :a.format.slice(1)
                });

            });

            $uploadedShow.html(html);
            $uloadedFiles.val(links);
            $('#files_obj').val(JSON.stringify(files_obj));
            initRemoveUploaded();
        }

    }

    function checkForm(e) {

        if(typeof e != 'undefined' && e.size() > 0){

            var pass = true;

            e.each(function () {

                var that = jQuery(this);
                that.removeClass('empty');

                if(!that.is(':visible') || that.css('visibility') == 'hidden' || this.type == "file") return true;

                if(this.value.length <= 0 || this.value == 0){

                    that.addClass('empty');

                    this.onkeyup = function () {

                        checkForm(e);

                    };
                    this.onchange = function () {
                        checkForm(e);
                    };

                    pass = false;

                }else{

                    that.removeClass('empty');
                    this.onkeyup = function () {};
                    this.onchange = function () {};

                }


            });

            return pass;

        }

        return false;

    }


});