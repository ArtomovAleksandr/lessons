$(function () {
     var namestorage = 'basketstorge';
    class Storage {
        constructor(id,quantity){
            this.id=id;
            this.quantity=quantity;
        }
    }

    function createNewGoods(oldgoods) {
        let goods=new Array();
        oldgoods.forEach(function (e) {
            let g=new Storage(e.id,e.quantity);
            goods.push(g);
        })
        return goods;
    }
    function createNewData(fone,name,oldgoods){
        let goods=createNewGoods(oldgoods)
        let newdata={
            fone:fone,
            name:name,
            goods:goods
        }
        return newdata;
    }

    $('.client-fone-data input').bind('input',function (e) {
        let value=e.target.value;
        if(value.length>5){
           if(value.match(/[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}/)==null){
               $(this).css('color','red');
            }else {
               $(this).css('color','green');
           }
        }else{
            $(this).css('color','black');
        }

       //console.log(e.target.value);
    });
    $('.info-client-name input').bind('input',function (e) {
        let value=e.target.value;
        if((value.length>3)&&!(value.match(/[><;]+/))){
          //  if(value.match(/[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}/)==null){
                $(this).css('color','green');
            }else{
                $(this).css('color','red');
            }
        // }else{
        //     $(this).css('color','black');
        // }


    });

   $('#create-order').click(function (e) {


       function success() {
       //    console.log("done!");
           alert("Запчасти заказаны");
           removeStorage(namestorage);
           location.replace("/user/allcategory/1");
           //удалить LocalStorage
       }
       function fail() {
       //    console.log("error!")
           alert("Ошибка, запчасти не заказаны")
           location.replace("/user/allcategory/1");
       }



      if(!ishaveStorahe(namestorage)){
          alert("Ошибка, запчастeй нет в корзине")
          return;
      }
      let fone=  $('.client-fone-data input').val();

      let name=$('.client-name-data input').val();

       if(name.match(/[><;]+/)!=null){

          return;
       }
      if(fone.match(/[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}/)==null){

       return;
      }
      let storage=readStorage(namestorage);
      var orderDto=createNewData(fone,name,storage.goods);
      ////////let servise=new AJAXService();
       let servise=new AJAXService();
       // let abc=JSON.stringify(orderDto);
       // console.log(abc);
       // orderDto=JSON.parse(abc);
       servise.post("/api/v1.0/orders/create",orderDto,success,fail);
       e.preventDefault();


   });



});