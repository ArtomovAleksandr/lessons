function ishaveStorage(namestorage) {
    if (localStorage.getItem(namestorage) !== null) {
        return true;
    }
    return false;
}
function readStorage(namestorage) {
    if (ishaveStorage(namestorage)) {
        return JSON.parse(localStorage.getItem(namestorage));
    }
    return false;
}
function removeStorage(namestorage){
    if(ishaveStorage(namestorage)){
        localStorage.removeItem(namestorage);
        return true;
    }
    return false;
}
// id,namestorage
function iscontainsItemById(id,namestorage) {
    let flag = false;
    let itemsgoods=readStorage(namestorage);
    if(!itemsgoods){
        return flag;
    }
    let items=itemsgoods.goods;
    items.forEach(function (item) {
        if (item.id==id){
            flag=true;
        }
    });
    return flag;
}
function updateItemToLocalStorage(id,quantity,namestorage){
    let itemsgood=readStorage(namestorage);
    if(!itemsgood){
        return false;
    }
    let idv=itemsgood.goods;
    let remove=undefined;
    for(let i=0; i<idv.length;i++){
        if(idv[i].id==id){
            let goodselem=idv[i];
            goodselem.quantity=quantity;
            remove= idv.splice(i,1,goodselem);
            break;
        }
    }
    if(remove!=undefined){
        localStorage.setItem(namestorage,JSON.stringify(itemsgood));
        //   basketShow(items);
        return  true;
    }
    return false;
}
function createNewStorage(e,namestorage){
    let timenow=Date.now();
    let storage={
        time:timenow,
        goods: [
            {id: e.id,name:e.name,factory:e.factory,catalog:e.catalog,unit:e.unit,price:e.price,quantity:e.quantity}
        ]

    }
    localStorage.setItem(namestorage,JSON.stringify(storage));

}

function addItemToLocalStorage(goodselem,namestorage){
    let storagedata=readStorage(namestorage);
    if(storagedata!=false) {
        storagedata.goods.push(goodselem);
        localStorage.setItem(namestorage, JSON.stringify(storagedata));
    }

}
function deleteItemToLocalStorage(id,namestorage){
    let itemsgoods=readStorage(namestorage);
    if (!itemsgoods){
        return false
    }
    let idv=itemsgoods.goods;//.indexOf(goodselem.id);
    let remove=undefined;
    for(let i=0; i<idv.length;i++){
        if(idv[i].id==id){
            remove= idv.splice(i,1);
            break;
        }
    }
    if(remove!=undefined){
        localStorage.setItem(namestorage,JSON.stringify(itemsgoods));
        return true;
    }
    return false;
}


function readStorageForBasketShow(namestorage)
{
    let item = readStorage(namestorage);
    if(item!=false){
        if(item.goods.length>0){
            $('#goods-basket').removeClass('display-off').text(item.goods.length);
        }
    }else {
        $('#goods-basket').addClass('display-off');
    }
}
function checkFullTime(namestorage,fulltimestorage) {
    if(ishaveStorage(namestorage)==true){
        let storage=readStorage(namestorage);

        if(storage!=false) {
            let timenow = Date.now();

            let  timestorage = storage.time;

            let fulltime = ((timenow - timestorage) / 60000).toFixed(0);

            if (fulltimestorage < fulltime) {
                removeStorage(namestorage);
            }
        }
     }
}