class Cart {
    constructor(name) {
        this.name = name;
        
        if (!localStorage.getItem(this.name)) {
            localStorage.setItem(this.name, JSON.stringify([]));
        };
    };

    getData() {
        let cartitems = JSON.parse(localStorage.getItem(this.name));
        return cartitems;
    };

    
    addItem = (item) => {
    let cartitems = JSON.parse(localStorage.getItem(this.name));

    let itemExist = cartitems.find((i)=>{
        return i.id ==item.id;
    });

    if (itemExist) {
        itemExist.qty ++
    } else {
        let itempr = {...item,qty:1}
        cartitems.push(itempr)
    };

    localStorage.setItem(this.name, JSON.stringify(cartitems));
};

incrementItem(itemId) {
    let cartitems = JSON.parse(localStorage.getItem(this.name));
    let itemExist = cartitems.find(item => item.id == itemId);
    if (itemExist) {
        itemExist.qty += 1;
    }
    localStorage.setItem(this.name, JSON.stringify(cartitems));
}

delItem(itemId){
    let cartitems =JSON.parse( localStorage.getItem(this.name));
   cartitems = cartitems.filter(item => item.id != itemId);
   localStorage.setItem(this.name , JSON.stringify(cartitems));
}


 decrementItem(itemId){
 let cartitems =JSON.parse( localStorage.getItem(this.name));
  let itemExist= cartitems.find((item)=> { return  item.id == itemId });
   if (itemExist && itemExist.qty > 1) {
        itemExist.qty -= 1
   }else {
    cartitems = cartitems.filter(item => item.id != itemId);
   }

    localStorage.setItem(this.name , JSON.stringify(cartitems));
}

clearItem(){
   let cartitems =JSON.parse( localStorage.getItem(this.name));
    cartitems = [];
    localStorage.setItem(this.name , JSON.stringify(cartitems));
}


clearAll(){
   localStorage.clear();
}
    
};