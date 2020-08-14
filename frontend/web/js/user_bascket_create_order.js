$(function () {
    const namestorage = 'basketstorage';
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
       let value =isFoneValidate(e.target.value);
           if(value ===null){
               $(this).css('color','red');
            }else {
               $(this).css('color','green');
           }
    });
    $('.info-client-name input').bind('input',function (e) {

        let str = isNameValidate(e.target.value)
        if(str !==null){
                $(this).css('color','green');
            }else{
                $(this).css('color','red');
            }
    });

});