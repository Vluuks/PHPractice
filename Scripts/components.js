/*
    Represents shopping cart when opened.
*/
Vue.component('shoppingcart', {
    props: {
        cartItems: {
            type: Object,
            required: true
        },
        itemCount: {
            type: Number,
            required: true
        },
        itemList: {
            type: Array,
            required: true
        }
    },
    name: "shoppingcart",
    template: '#cart-template',
    data() {
        return {
            inCart: this.cartItems,
        }
    },
    computed: {
        itemIds(){
            return Object.keys(this.cartItems);
        }
    },
    methods: {
        checkOut() {
            console.log("checkout");
        },
        renderCart() {

            let ref = this;
            return Object.keys(ref.cartItems).forEach(function(i){
                    return ref.cartItems[i];
            });
        },
        // These need to be methods because the itemId stems from an array with just the id, 
        // hence why accessing the properties directly from the HTML is impossible
        getItemName(itemId) {
            return this.itemList.find(item => item.id == itemId).name; // starts from 1 so substract, this is ugly
        },
        getItemQuantity(itemId) {
            return this.cartItems[itemId];
        },
        getItemPrice(itemId){
            return makeEuros(this.itemList.find(item => item.id == itemId).price);
        },
        getItemTotalPrice(itemId){
            return makeEuros(this.itemList.find(item => item.id == itemId).price * this.cartItems[itemId]);
        },
        getTotalPrice() {
            let total = 0;
            let ref = this;

            Object.keys(ref.cartItems).forEach(function(itemId){
                total += ref.cartItems[itemId] * itemList.find(item => item.id == itemId).price;
            })
            return makeEuros(total);
        }


    }     
});

/*
    Represents a portfolio "project"
*/
Vue.component('project', {

    props: {
        projectItem: {
            type: Object,
            required: true
        }
    },
    name: "project",
    template: "#project-template",
    data() {
        return {
            id: this.projectItem.id,
            name: this.projectItem.name,
            category: this.projectItem.category,
            description: this.projectItem.description,
            image: this.projectItem.image,
            tags: this.projectItem.tags,
            // might not actually be necessary? can grab from prop?
        }
    },
    methods: {
        // ...
    },
    computed: {
        // ...
    }
});


/*
        Component representing an item/product.
*/
Vue.component('product', {
        
    props: {
        item: {
            type: Object,
            required: true
        },
        premium: {
          type: Boolean,
          required: true
        }
    },
    name: "product",
    template: '#item-template',
    data() {
        return {
            id: this.item.id,
            name: this.item.name,
            description: this.item.description,
            image: this.item.image,
    
            price: this.item.price,
            inventory: this.item.inventory,
            virtualInventory: this.item.inventory,
            tags: this.item.tags,
            onSale: this.item.onSale
        }
    },
    methods: {
        addToCart: function() {

            this.virtualInventory--;
            this.$emit('add-to-cart', this);
        },
        getFormattedPrice() {
            return makeEuros(this.price);
        }

    },
    computed: {
        nameComputed() {
            return this.name;
        },
        sale(){
            if(this.onSale) return "SALE!";
        },
        stock(){
            if(this.inventory > 10) return "In stock";
            else if(this.inventory > 0 && this.inventory < 10) return "Only a few items left!";
            else return "Out of stock"; 
        }
    }

})