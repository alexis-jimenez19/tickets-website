angular.module("ticketsApp")
.controller('sideNav', function($scope, $mdSidenav)
{
  $scope.abrirMenuIzquierdo = function() {
    $mdSidenav('left').toggle();
  };
});
