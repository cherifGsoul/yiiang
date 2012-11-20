angular.module('yiiAngServices',['ngResource']).
	factory('Contact',function($resource){
		var Contact = $resource('api/contacts/:contactId',{contactId: '@id'},{
			 query: {method:'GET', isArray:false},
             update: { method: 'PUT'}
		});

        Contact.prototype.update = function(cb) {
            return Contact.update({contactId: this.id},
                angular.extend({}, this, {contactId:undefined}), cb);
            };

      

        return Contact;

	}).
    factory('User',function($resource){
        var User = $resource('api/users/:userId',{userId: '@id'},{
             query: {method:'GET', isArray:false},
             update: { method: 'PUT'}
        });

      

        return User;

    })
    
	
	angular.module('SharedServices', [])
    .config(function ($httpProvider) {
        $httpProvider.responseInterceptors.push('myHttpInterceptor');
        var spinnerFunction = function (data, headersGetter) {
            // todo start the spinner here
            $('#loading').show();
            return data;
        };
        $httpProvider.defaults.transformRequest.push(spinnerFunction);
    })
// register the interceptor as a service, intercepts ALL angular ajax http calls
    .factory('myHttpInterceptor', function ($q, $window) {
        return function (promise) {
            return promise.then(function (response) {
                // do something on success
                // todo hide the spinner
                $('#loading').hide();
                return response;

            }, function (response) {
                // do something on error
                // todo hide the spinner
                $('#loading').hide();
                return $q.reject(response);
            });
        };
    });
