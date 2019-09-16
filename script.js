window.onload = function(){
    things();

    listenForScrolls();
}

function things() {

    /*
        The main app/root. This has to be placed under the components? 
    */
    var app = new Vue({
        el: '#app',
        data: {
            // General
            siteName: "vluuks",
            activeTab: 1,

            // Data
            items: itemList,
            projects: projectList,
            
            // Search and filter
            search: "",
            searchProj: "",
            category: "all",
            categoryProj: "all",

            // Shopping cart
            cartItems: {},
            itemCount: 0,
            premium: true,
            cartOpen: false
        },
        methods: {
            updateCart(item) {
                console.log(item);

                // Sanity check
                if(item.inventory <= 0) 
                    return;

                // Is already present in cart
                if(this.cartItems[item.id.toString()]) {
                    console.log("exists in cart");
                    
                    // Can not have more than there are in stock
                    if(this.cartItems[item.id.toString()] == item.inventory) 
                        return;
                    
                    Vue.set(app.cartItems, item.id.toString(), ++app.cartItems[item.id.toString()]);    
       
                }
                // Is first time
                else {
                    Vue.set(app.cartItems, item.id.toString(), 1);
                }

                this.itemCount++;
                console.log(this.cartItems);

            },
            toggleShoppingCart() {
                this.cartOpen = !this.cartOpen;
            }
        },
        computed: {
            pageTitle() {
                return "Fantastische " + this.siteName;
            },
            filteredItems() {
                return filter(this.items, this.search, this.category);
            },
            filteredProjects() {
                return filter(this.projects, this.searchProj, this.categoryProj);
            }
        }
    });

}