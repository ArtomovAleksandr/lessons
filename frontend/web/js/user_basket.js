$(function () {
    var digital = 2;
    var namestorage = 'basketstorage';

    function createItems() {
        let conteinerproduct = $('.conteiner-product');
    //    conteinerproduct.empty();
        let Arraygoods = readStorage(namestorage);

    //    console.log('Arraygoods ='+ Arraygoods);
        if(Arraygoods==false){
       //     console.log('Arraygoods нет');
            return;
        }
        let Arraygoodsdata=Arraygoods.goods;
        Arraygoodsdata.forEach(function (elem) {
            let flagdisabledbutton=true;
            if(parseInt(elem.quantity)>1){
                flagdisabledbutton=false;
            }

            conteinerproduct.prepend(
                $('<div class="card-item product-border">')
                    .prepend($('<div class="checkbox-wrap">')
                        .prepend($('<div class="custom-control custom-checkbox">')
                            .prepend($('<input type="checkbox" class="custom-control-input checked-item" id="customCheck' + elem.id + '" checked>'))
                            .append($('<label class="custom-control-label" for="customCheck' + elem.id + '">'))))
                    .append($('<div class="cart-item-info">')
                        .prepend($('<div class="header">')
                            .prepend($('<div class="card-item-title">')
                                .prepend($('<div class="caterory-name">').text('Hаименование'))
                                .append($('<h3 class="title">').text(elem.name)))
                            .append($('<div class="vendor">')
                                .append($('<div class="caterory-name">').text('Каталожный номер'))
                                .append($('<div class="title">').text(elem.catalog)))
                            .append($('<div class="price-vendor">')
                                .append($('<div class="caterory-name">').text('Цена'))
                                .append($('<div class="caterory-name price-in-vendor">').text(elem.price))
                                .append($('<div class="caterory-name">').text('гр.'))))
                        .append($('<div class="footer">')
                            .prepend($('<div class="quantity-wrap">')
                                .prepend($('<div class="quntity-container">')
                                    .prepend($('<div class="select-quantity">')
                                        .prepend($(' <div class="pirice-elem display-off">')
                                            .prepend($('<input class="id-hidden" value="'+elem.id+'">'))
                                            .prepend($('<input class="price-hidden" value="'+elem.price+'">')))
                                        .append($('<button class="select-quantity-button button-minus">')
                                            .prop('disabled',flagdisabledbutton)
                                            .prepend($('<i class="fa fa-minus" aria-hidden="true">')))
                                        .append($('<div class="current-quantity-basket">')
                                            .prepend($('<input type="text" value="' + elem.quantity + '">')))
                                        .append($('<div class="lot-packin-basket">').text(elem.unit))
                                        .append($('<button class="select-quantity-button button-plus">')
                                            .prepend($('<i class="fa fa-plus" aria-hidden="true">'))))))
                            .append($('<div class="price-wrap">')
                                .prepend($('<div class="price-hur">').text((parseInt(elem.quantity) * parseFloat(elem.price)).toFixed(digital)))
                                .append($('<div class="price-uni">').text('гр.')))))
            );

        });
    }

    createItems();
    createTotalPaimentPrice();
    function createTotalPaimentPrice(){
        let allcheckboxchecked=$('.conteiner-product').find( "input[type=checkbox]:checked").get();
        let summ=0;
     //   console.log('tipe summ -'+typeof(summ));
        allcheckboxchecked.forEach(function (e) {
             let selectquantity=$(e).parents('.checkbox-wrap').siblings('.cart-item-info').children('.footer').children('.quantity-wrap').children('.quntity-container').children('.select-quantity');
             let inputelem=$(selectquantity).children('.current-quantity-basket').find('input');
             let priceelem=$(selectquantity).children('.pirice-elem').children('.price-hidden').val();
             let elemdata= inputelem.val();
             summ=summ+parseInt(elemdata)*parseFloat(priceelem);

        });

        $('.total-paiment-price').text(summ.toFixed(digital));


    }
    $('#customCheck').change(function () {
        let flag=this.checked;
        let allcheckbox=$('.conteiner-product').find( "input[type=checkbox]");
         allcheckbox.prop('checked',flag);
        if(!flag) {
            $('.delete-position button').addClass('display-off');
        }else{
            $('.delete-position button').removeClass('display-off');
        }
        createTotalPaimentPrice();
    });
    $(".button-plus").click(function () {
             let selectquantity=$(this).parents('.select-quantity');
             let inputelem=$(selectquantity).children('.current-quantity-basket').find('input');
             let priceelem=$(selectquantity).children('.pirice-elem').children('.price-hidden').val();
             let idelem=$(selectquantity).children('.pirice-elem').children('.id-hidden').val();
             if(iscontainsItemById(idelem,namestorage)){
                 let buttomminus = selectquantity.children('.button-minus');
                 let elemdata = inputelem.val();
                 if (elemdata.match(/^[0-9]+$/) == null) {
                     elemdata = 1;
                     $(buttomminus).attr('disabled', true);
                 } else {
                     $(buttomminus).attr('disabled', false);
                     elemdata = parseInt(elemdata) + 1;
                 }
                 if( updateItemToLocalStorage(idelem,elemdata,namestorage)){
                     readStorageForBasketShow(namestorage);
                 }

                 $(inputelem).val(elemdata);
                 $(selectquantity).parents('.footer').children('.price-wrap').children('.price-hur').text((elemdata * parseFloat(priceelem)).toFixed(digital));
             }else {
                 window.location.reload(true);
             }
             createTotalPaimentPrice();

    });
    $(".button-minus").click(function () {
       // alert("Handler for .click() called.");
        let selectquantity=$(this).parents('.select-quantity');
        let inputelem=$(selectquantity).children('.current-quantity-basket').find('input');
        let priceelem=$(selectquantity).children('.pirice-elem').children('.price-hidden').val();
        let idelem=$(selectquantity).children('.pirice-elem').children('.id-hidden').val();
        if(iscontainsItemById(idelem,namestorage)) {
            let buttomminus = selectquantity.children('.button-minus');
            let elemdata = inputelem.val();
            if (elemdata.match(/^[0-9]+$/) == null) {
                elemdata = 1;
            } else {
                elemdata = parseInt(elemdata) - 1;
            }
            if (elemdata == 1) {
                $(buttomminus).attr('disabled', true);
            }
            if( updateItemToLocalStorage(idelem,elemdata,namestorage)){
                readStorageForBasketShow(namestorage);
            }
            $(inputelem).val(elemdata);
            $(selectquantity).parents('.footer').children('.price-wrap').children('.price-hur').text((elemdata * parseFloat(priceelem)).toFixed(digital));
        }else {
            window.location.reload(true);
        }
            createTotalPaimentPrice();
    });
    $('.checked-item').change(function () {
        let allcheckbox=$('.conteiner-product').find( "input[type=checkbox]").length;
        let allcheckboxchecked=$('.conteiner-product').find( "input[type=checkbox]:checked").length;
        if(allcheckbox==allcheckboxchecked){
            $('#customCheck').prop('checked',true);
        }else{
            $('#customCheck').prop('checked',false);
        }
        if(allcheckboxchecked>0){
            $('.delete-position button').removeClass('display-off');
        }else{
            $('.delete-position button').addClass('display-off');
        }
        createTotalPaimentPrice()
    });
    $('.delete-position button').click(function () {
        let conteinerproduct = $('.conteiner-product');
         if($('#customCheck').prop('checked')&&ishaveStorage(namestorage)){
             localStorage.removeItem(namestorage);
             window.location.reload(true);
         //    readStorageForBasketShow();
         }else {
             let allcheckboxchecked = $('.conteiner-product').find("input[type=checkbox]:checked");
           //  console.log(allcheckboxchecked);
           //  console.log(allcheckboxchecked.get());
             if (allcheckboxchecked.length > 0) {
                 allcheckboxchecked.get().forEach(function (e) {
                     let selectquantity=$(e).parents('.checkbox-wrap').siblings('.cart-item-info').children('.footer').children('.quantity-wrap').children('.quntity-container').children('.select-quantity');
                     let idelem=$(selectquantity).children('.pirice-elem').children('.id-hidden').val();
                     let delelement=$(e).parents('.card-item');
                     if(deleteItemToLocalStorage(idelem,namestorage)){
                         readStorageForBasketShow(namestorage);
                     }
                     $(delelement).remove();
                 })
                 $('#customCheck').prop('checked', true);

                 $('.custom-control-input').prop('checked', true);
                 createTotalPaimentPrice();

             }
         }
      //   console.log(allcheckboxchecked);

    });





    readStorageForBasketShow(namestorage);

});


