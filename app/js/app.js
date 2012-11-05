

angular.module('yiiAng',['yiiAngServices','SharedServices']).
config(['$routeProvider',function($routeProvider){
	$routeProvider.when('/contacts',{templateUrl:'app/partials/contact/list.html',controller:ContactsListCtrl});
	$routeProvider.when('/contacts/show/:contactId',{templateUrl:'app/partials/contact/show.html',controller:ContactsShowCtrl});
	$routeProvider.otherwise({redirectTo: '/contacts'});
}]);