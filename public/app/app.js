var app = angular.module('cemos_portal',[])
        .constant('API_URL', 'http://localhost:8081/cemos-portal/');


app.service('userService', ['$http', 'API_URL', function ($http, API_URL) {
		
	var userApi = API_URL + 'user';

	// this.getBrands = function () {
	// 	return $http.get(API_URL + 'brand/allBrands');
	// }

	this.getUserById = function (id) {
		return $http.get(userApi + '/' + id);
	}

	this.insertUser = function (userData) {
		return $http.post(userApi, userData);
	}

	this.updateUser = function (userData) {
        console.log(userData);
		return $http.put(userApi + '/' + userData.user.id, userData);
	}

	// this.deleteBrand= function (id) {
	// 	return $http.delete(brand_api + '/' + id);
	// }

	// this.getAllBrands= function () {
	// 	return $http.get(API_URL + 'brand/allBrands');
	// }



}]);


app.directive("passwordVerify", function() {
    return {
        require: "ngModel",
        scope: {
            passwordVerify: '='
        },
        link: function(scope, element, attrs, ctrl) {
            scope.$watch(function() {
                var combined;
                
                if (scope.passwordVerify || ctrl.$viewValue) {
                   combined = scope.passwordVerify + '_' + ctrl.$viewValue; 
                }                    
                return combined;
            }, function(value) {
                if (value) {
                    ctrl.$parsers.unshift(function(viewValue) {
                        var origin = scope.passwordVerify;
                        if (origin !== viewValue) {
                            ctrl.$setValidity("passwordVerify", false);
                            return undefined;
                        } else {
                            ctrl.$setValidity("passwordVerify", true);
                            return viewValue;
                        }
                    });
                }
            });
        }
    };
});



