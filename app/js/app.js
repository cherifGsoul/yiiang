

angular.module('yiiAng',['yiiAngServices','SharedServices']).
config(['$routeProvider',function($routeProvider){
	$routeProvider.when('/',
		{
			templateUrl:'app/partials/contact/list.html',
			controller:ContactsListCtrl
		}
	);
	
	$routeProvider.when('/contacts/show/:contactId',
		{
			templateUrl:'app/partials/contact/show.html',
			controller:ContactsShowCtrl
		}
	);
	$routeProvider.when('/contacts/create',
		{
			templateUrl:'app/partials/contact/edit.html',
			controller:ContactsCreateCtrl
		}
	);

	$routeProvider.when('/contacts/edit/:contactId',
		{
			templateUrl:'app/partials/contact/edit.html',
			controller:ContactsEditCtrl
		}
	);

	$routeProvider.when('/users',
		{
			templateUrl:'app/partials/user/list.html',
			controller:UsersListCtrl
		}
	);
	$routeProvider.otherwise({redirectTo: '/'});
}]);