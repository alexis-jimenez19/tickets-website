angular.module('ticketsApp',['ngMaterial','ngMdIcons','ngRoute'])
.config(function($mdThemingProvider) {
  $mdThemingProvider.theme('default')
    .primaryPalette('indigo')
    .accentPalette('pink');
});
