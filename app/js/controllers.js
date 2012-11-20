/**
 * @author cherif.bouchelaghem
 */
function ContactsListCtrl($scope,Contact,$location){
	$scope.contacts=Contact.query();

	
	$scope.destroy=function(id){
		Contact.remove({contactId:id},function(){
			$location.path('/');
		});
	}

}

function ContactsShowCtrl($scope,Contact,$routeParams){
	$scope.contact=Contact.get({contactId: $routeParams.contactId});
}


function ContactsCreateCtrl($scope,$location,Contact){
	$scope.save = function() {
    	Contact.save($scope.contact, function(contact) {
      		$location.path('/contacts');
    	});
  }
		
}


function ContactsEditCtrl($scope,$location,$routeParams,Contact){
	var self=this;
	$scope.contact=Contact.get({contactId: $routeParams.contactId},function(contact){
		self.original=contact;
		$scope.contact = new Contact(self.original);
	});
	
	$scope.save = function() {
		$scope.contact.update(function(){
			$location.path('/');
		});
  	}
		
}


function UsersListCtrl($scope,User){
	$scope.users=User.query();
}
