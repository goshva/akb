
var shoppingCart = (function () {

    var cart = [];

    function Item(name, price, count) {
        this.name = name
        this.price = price
        this.count = count
    }

    function saveCart() {
        localStorage.setItem("shoppingCart", JSON.stringify(cart));
    }

    function loadCart() {
        cart = JSON.parse(localStorage.getItem("shoppingCart"));
        if (cart === null) {
            cart = []
        }
    }

    loadCart();



    // Публичные методы
    var obj = {};

    obj.addItemToCart = function (name, price, count) {
        for (var i in cart) {
            if (cart[i].name === name) {
                cart[i].count += count;
                saveCart();
                return;
            }
        }

        console.log("addItemToCart:", name, price, count);

        var item = new Item(name, price, count);
        cart.push(item);
        saveCart();
    };

    obj.setCountForItem = function (name, count) {
        for (var i in cart) {
            if (cart[i].name === name) {
                cart[i].count = count;
                break;
            }
        }
        saveCart();
    };


    obj.removeItemFromCart = function (name) { // Removes one item
        for (var i in cart) {
            if (cart[i].name === name) { // "3" === 3 false
                cart[i].count--; // cart[i].count --
                if (cart[i].count === 0) {
                    cart.splice(i, 1);
                }
                break;
            }
        }
        saveCart();
    };


    obj.removeItemFromCartAll = function (name) { // removes all item name
        for (var i in cart) {
            if (cart[i].name === name) {
                cart.splice(i, 1);
                break;
            }
        }
        saveCart();
    };


    obj.clearCart = function () {
        cart = [];
        saveCart();
    }


    obj.countCart = function () {
        var totalCount = 0;

        for (let i = 0; i < cart.length; i++){
            totalCount += cart[i].count
        }

        return totalCount;
    };

    obj.totalCart = function () { // -> return total cost
        var totalCost = 0;
        for (let i = 0; i < cart.length; i++){
            totalCost += cart[i].price * cart[i].count
        }
        return totalCost.toFixed(2);
    };

    obj.listCart = function () { // -> array of Items
        // for (let i in cart) {
        //     console.log(i);
        //     let item = cart[i];
        //     let itemCopy = {};
        //     for (let p in item) {
        //         itemCopy[p] = item[p];
        //     }
        //     itemCopy.total = (item.price * item.count).toFixed(2);
        //     cartCopy.push(itemCopy);
        // }



        return cart;
    };

    // ----------------------------
    return obj;
})();




