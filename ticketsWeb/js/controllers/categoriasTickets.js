angular.module('ticketsApp')
.controller('categoriasTickets', function($http, $scope){
    $scope.categoriaSeleccionada = 0;
    $scope.subcategoriaSeleccionada = 0;
    var controlador = this;

    $http({
        method:'GET',
        url:'http://tickets-api.com/categorias',
    })
    .success(function(data){
        $scope.categorias = data;
    });
    $scope.obtenerSubcategorias = function (idCategoria){
        $scope.categoriaSeleccionada = idCategoria;
        var urlGetSubcategorias = "http://tickets-api.com/categorias/"+idCategoria+"/subcategorias"
        $http({
            method:'GET',
            url:urlGetSubcategorias,
        })
        .success(function(data){
            $scope.subcategorias = data;
        });
    }

    $scope.obtenerEventos = function (idSubcategoria){

        $scope.subcategoriaSeleccionada = idSubcategoria;
        var urlGetEventos = "http://tickets-api.com/subcategorias/"+idSubcategoria+"/eventos";

        $http({
            method:'GET',
            url:urlGetEventos,
        })
        .success(function(data){
            $scope.eventosObtenidos = data.data;
        });
    }

    $scope.obtenerBoletos = function (idEvento,evento){
        $scope.eventoSeleccionado = evento;
        $scope.eventosObtenidos = {};
        $scope.activaronBoletos = true;
        var urlGetBoletos = "http://tickets-api.com/eventos/"+idEvento+"/boletos";

        $http({
            method:'GET',
            url:urlGetBoletos,
        })
        .success(function(data){
            $scope.boletosObtenidos = data.data;
        });
    }


});
