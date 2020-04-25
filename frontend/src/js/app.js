var app = angular.module("login_app", []);

app.controller("login_controller", ["$http", "$scope", function($http, $scope){
	
	$scope.name = "";
	$scope.text = "";
	
	$scope.salvar = function()
	{
		$http({
			method: 'POST' ,
			url: 'http://localhost/api/about',
			data: { name: $scope.name, text: $scope.text }
		}).then(function success(response){ //se for ok na API
			$scope.mensagem = response.data.menssage;
		}, function unsuccess(response){ //se não for ok na API
			console.log(response);
		});
		
	}
	
}]);

app.controller("test", function($http, $scope){

	$http.get("http://localhost/api/about").then(function(response) {
		$scope.myData = response.data;
	});

});