/**
 * @author cherif.bouchelaghem
 */
function ContactsListCtrl($scope,Contact){
	$scope.contacts=Contact.query();
}

function ContactsShowCtrl($scope,Contact,$routeParams){
	$scope.contact=Contact.get({contactId: $routeParams.contactId});
}