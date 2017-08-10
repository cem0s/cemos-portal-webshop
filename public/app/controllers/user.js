
app.controller('userController', ['$scope', '$filter', '$http', 'userService' , 'companyService' ,'$window', function($scope, $filter, $http, userService, companyService , $window) {
   
    $scope.getCompanies = function(){
        

        companyService.getCompanies()
            .then(function(response) {
                 $scope.company = response.data;
                 
            }).catch(function(data) {
                alert('Unable to retrieve company list.');
        });      

    };
    $scope.getCompanies();


    

    //save new record / update existing record
    $scope.save = function(modalstate) 
    {
        $scope.saving = true;
        var c = $("#captcha").val();
    
        if (modalstate === 'edit'){
            userService.updateUser($scope.user).then(function(response) {
                if(response.data.error != undefined) {
                   $scope.saving = false;
                   alert(response.data.error);  

                } else {
                    $scope.saving = false;
                    alert( "Profile successfully updated.");
                    $window.location.href = "profile";
                }

            }).catch(function(response) {
                alert('This is embarassing. An error has occured. Please check the log for details');
            });
        } else {
            if(c == "") {
                alert('Please check captcha form.')
                $scope.saving = false;
                return false;
            }
            userService.insertUser($scope.user).then(function(response) {
               
                if(response.data.error != undefined) {
                   $scope.saving = false;
                   alert(response.data.error);  

                } else {
                    alert( " Thanks for signing up! An activation code has been sent to your email. Please activate your account.");
                    $window.location.href = "login";
                }
                
               
            }).catch(function(response) {
                alert('This is embarassing. An error has occured. Please check the log for details');
            });
        }
       
    }

    $scope.editModal = function(id) 
    {
        userService.getUserById(id).then(function(response) {
                $scope.user = response.data;

            }).catch(function(response) {
                alert('This is embarassing. An error has occured. Please check the log for details');
            });
        $('#edit-profile').modal('show');
    }


    // //delete record
    // $scope.confirmDelete = function(id) {
    //     var isConfirmDelete = confirm('Are you sure you want to delete this record?');
    //     if (isConfirmDelete) {
    //        brandService.deleteBrand(id).
    //             then(function(data) {
    //                 $scope.updateBrands();
    //             }).catch(function(data) {
    //                 alert('Unable to delete. Make sure to delete first the model associated with this brand.');
    //             });
    //     } else {
    //         return false;
    //     }
    // }

   

    // $scope.sort = function(keyname) {
    //     $scope.sortKey = keyname;
    //     $scope.reverse = !$scope.reverse;
    // };

    
}]);

