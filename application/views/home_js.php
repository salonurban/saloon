<script type="text/javascript">
  var app = angular.module('App', []);
    app.controller('Controller', function($scope,$http,$sce,$timeout){
    	$scope.name = "Parthiban";
    	$http({
          method: 'POST',
          url: '<?php echo base_url('/admin/Web_services/gethomepage') ?>',         
          headers: { 
          				'Content-Type': 'application/x-www-form-urlencoded',
          				'X-API-KEY': 'admin'
          			}
        }).then(function(response) {           
            console.log(response.data); 
            $scope.citiesList = response.data.cities_list;
            $scope.locationsList = response.data.locations_list;
            $scope.servicesList = response.data.services;
            $scope.offersList = response.data.offers_list;
            
        });
    });
</script>

<!-- 
sample angular js http call
<script type="text/javascript">
  var app = angular.module('homeApp', []);
    app.controller('homeController', function($scope,$http,$sce,$timeout){        
        $scope.contactSubmit = function () {
        $scope.isDisabled = true;
        $http({
          method: 'POST',
          url: 'contact.php',
          data: $.param({
            name: $scope.name,            
            email: $scope.email,
            mobile: $scope.mobile,
            subject: $scope.subject,
            message: $scope.message
          }),
          headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }).then(function(response) {
            $scope.isDisabled = false;
            console.log(response.data);   
            if(!response.data.success){
              if(response.data.errors.name){
                $scope.nameError = response.data.errors.name;
              }
              else{
                $scope.nameError = "";
              }
         
              if(response.data.errors.email){
                $scope.emailError = response.data.errors.email;
              }
              else{
                $scope.emailError = "";
              }
              
              if(response.data.errors.mobile){
                $scope.mobileError = response.data.errors.mobile;
              }
              else{
                $scope.mobileError = "";
              }
             if(response.data.errors.message){
                 $scope.msg = '<div class="alert alert-danger alert-dismissible fade in">'+response.data.errors.message+'</div>';  
                 $scope.trustedHtml = $sce.trustAsHtml($scope.msg);          
                $timeout(function () {
                    $scope.trustedHtml="";
                }, 3000);
              }
              else{
                $scope.trustedHtml = "";
              }
              if(response.data.message){
                 $scope.msg = '<div class="alert alert-danger alert-dismissible fade in">'+response.data.message+'</div>';  
                 $scope.trustedHtml1 = $sce.trustAsHtml($scope.msg);          
                $timeout(function () {
                    $scope.trustedHtml1="";
                }, 3000);
              }
              else{
                $scope.trustedHtml1 = "";
              }
            }
            else{
              $scope.msg = '<div class="alert alert-success alert-dismissible fade in"><strong>Success!</strong> '+response.data.message+'</div>';  
              $scope.trustedHtml = $sce.trustAsHtml($scope.msg);
              $timeout(function () {
                window.location.href = "contact.html";
                }, 3000);
            }   
        });
      }
        
    });
</script> -->