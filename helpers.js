
function matchStringNoCase(source, comparison){
    return source.toUpperCase().match(comparison.toUpperCase());
}

function makeEuros(number){
    return new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'EUR' }).format(number);
}

/*
    Vanilla js determination whether an element is visible on screen/in viewport.
*/
function isVisible(elem) {
    var bounding = elem.getBoundingClientRect();
    return (
        bounding.top >= 0 &&
        bounding.left >= 0 &&
        bounding.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        bounding.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
};


/* 
    This is probably (certainly?) not the most elegant way to do this. But combined with
    info about visibility of the logo, determine whether big or small one should be shown.
*/
function listenForScrolls(){
    window.addEventListener('scroll', function(e) {
    
        // Fade header and small version in and out
        let ref = document.querySelector('#header');
        
        if(!isVisible(ref)) {
            document.querySelector('#small-header').style.opacity = "1";
            document.querySelector('#header-image').style.opacity = "0";
        }
        else {
            document.querySelector('#small-header').style.opacity = "0";
            document.querySelector('#header-image').style.opacity = "1";
        }
    });
}

/*
    Filters items in the collection based on the selected category and search field input. Compares against
    tags, description and item name. 
*/
function filter(collection, searchTerm, category) {
    
    return collection.filter((item) => {

        // Apply category filter
        if(category != "all")
            return category == item.category && (matchStringNoCase(item.name, searchTerm) || matchStringNoCase(item.description, searchTerm) || matchStringNoCase(item.tags.toString(), searchTerm))

        return matchStringNoCase(item.name, searchTerm) || matchStringNoCase(item.description, searchTerm) || matchStringNoCase(item.tags.toString(), searchTerm) ;
    });

}