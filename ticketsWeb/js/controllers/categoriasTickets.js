angular.module('ticketsApp')
.controller('categoriasTickets', function($http){
    var controlador = this;
    $http({
        method:'GET',
        url:'tickets-api.com/categorias',
    })
    .success(function(data){
        controlador.categorias = data;
    });
});
