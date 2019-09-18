window.onload = function() {
    
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
                console.log(result) 
            }, 
            function(error) {
                console.log(error)
            });


}