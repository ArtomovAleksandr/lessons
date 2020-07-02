$(function () {
    var digital=2;
    var namestorage='basketstorage';
    var fulltimestorage = 300; // минуты (время после которого корзина удаляется)
    $( ".order button").click(function() {
        $(this).parents('.capture-order').css('display','none');
        $(this).parents('.product-border').children('.basket-show').css('display', 'flex');
    });
     $('.basket-order-head button').click(function () {
         $(this).parents('.basket-show').css('display','none');
         $(this).parents('.product-border').children('.capture-order').css('display', 'flex');

     });

     $('.select-quantity-plus button').click(
         function () {
             let currentquantity=$(this).parent().siblings(".current-quantity");
             let inputelem= $(currentquantity).find('input');
             let buttomminus=currentquantity.siblings('.select-quantity-minus').find('button');
             let elemdata= inputelem.val();
             if(elemdata.match(/^[0-9]+$/)==null) {
                elemdata = 1;
                 $(buttomminus).attr('disabled',true);
             }else {
                 $(buttomminus).attr('disabled',false);
                 elemdata = parseInt(elemdata) + 1;
             }
             $(inputelem).val(elemdata);
             countprice(this,elemdata);

             });
     $('.select-quantity-minus button').click(function () {
         let currentquantity=$(this).parent().siblings(".current-quantity");
         let inputelem= $(currentquantity).find('input');
         let buttomminus=currentquantity.siblings('.select-quantity-minus').find('button');
         let elemdata= inputelem.val();
         if(elemdata.match(/^[0-9]+$/)==null) {
             elemdata=1;
         }else {
             elemdata = parseInt(elemdata) - 1;
         }
         if(elemdata==1){
             $(buttomminus).attr('disabled',true);
         }
         $(inputelem).val(elemdata);
         countprice(this,elemdata);
     });
     function countprice(e,elemdata) {
         let pricestr= $(e).parents('.product-border').children('.capture-order').children('.capture').children('.capture-price').children('.capture-name-price').text();
         let price= parseFloat(pricestr).toFixed(digital);
       //  $(e).parents('.order-main').siblings('.price-box').children('.total-price').text((elemdata*price).toFixed(digital));
      //   console.log($(e).parents('.basket-show').children('.price-box').children('.total-price-curency').children('.total-price'));
         $(e).parents('.basket-show').children('.price-box').children('.total-price-curency').children('.total-price').text((elemdata*price).toFixed(digital));
     }


     function createGoods(e){
         let id=$(e).val();
         let name= $(e).parents('.basket-show').children('.basket-order-head').children('.basket-name').children('.basket-description').text().trim();
         let catalog= $(e).parents('.basket-show').children('.basket-order-head').children('.basket-name').children('.basket-unit').text().trim();
         let factory= $(e).parents('.product-border').children('.capture-order').children('.capture').children('.capture-factory').children('.capture-name').text();
         let unit= $(e).parents('.product-border').children('.capture-order').children('.capture').children('.capture-unit').children('.capture-name').text();
         let price= $(e).parents('.product-border').children('.capture-order').children('.capture').children('.capture-price').children('.capture-name-price').text();
         let quantity=$(e).siblings(".add-cart-wrap").children('.current-quantity').find('input').val();
         let goods= new DTOGoodsStorage(id,name,factory,catalog,unit,price,quantity);
         return goods;
     }


     $('.to-basket').click(function () {
         let goodselem = createGoods(this);
         if(ishaveStorage(namestorage)){

             if(iscontainsItemById(goodselem.id,namestorage)){
       //        console.log('isConteins');
                updateItemToLocalStorage(goodselem.id,goodselem.quantity,namestorage);

             }else{
         //        console.log('noContains');
                 addItemToLocalStorage(goodselem,namestorage);
             }
         }else {
             createNewStorage(goodselem,namestorage);
         }
         readStorageForBasketShow(namestorage);
     });
     checkFullTime(namestorage,fulltimestorage);
     readStorageForBasketShow(namestorage);

});



