window.onload = function(){
    
    var promises = [

        request('GET', 'test.php')
            .then(function (e) {
                return e.target.response;
            }, function (e) {
                return e;
            }),

        request('GET', 'test_proj.php')
            .then(function (e) {
                return e.target.response;
            }, function (e) {
                return e;
            })
        ];

    Promise.all(promises)
        .then(
            function(result) { 
                things(result);
            }, 
            function(error) {
                console.log(error)
            });


    listenForScrolls();
}

function things(json) {

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
            items: JSON.parse(json[0]),
            projects: JSON.parse(json[1]),
            
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