
app.controller('userController', ['$scope', '$filter', '$http', 'userService' , '$window', function($scope, $filter, $http, userService, $window) {
   
    // $scope.updateBrands = function(){
    //     $('#myModal').modal('hide');
    //     $('#myModal').find("input,textarea,select").val('').end();
    //     $scope.saving = false;

    //     brandService.getAllBrands()
    //         .then(function(response) {
    //              $scope.allBrands = response.data.brand;
    //         }).catch(function(data) {
    //             alert('Unable to retrieve brand list.');
    //     });      

    // };
    // $scope.updateBrands();


    //show modal form
    // $scope.toggle = function(modalstate, id) {
    //     $scope.modalstate = modalstate;

    //     switch (modalstate) {
    //         case 'add':
    //             $scope.form_title = "Add New Brand";
    //             break;
    //         case 'edit':
    //             $scope.form_title = "Brand Detail";
    //             $scope.id = id;
    //             brandService.getBrandById(id)
    //                 .then(function(response) {
    //                     $scope.brand = response.data;
    //                 });
    //             break;
    //         default:
    //             break;
    //     }
    
    //     $('#myModal').modal('show');
    // }

    //save new record / update existing record
    $scope.save = function(modalstate) {
       
        $scope.saving = true;
        
        if (modalstate === 'edit'){
            userService.updateUser($scope.user).then(function(response) {
            }).catch(function(response) {
                alert('This is embarassing. An error has occured. Please check the log for details');
            });
        } else {
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

