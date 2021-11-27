
app.controller('MainController', ['$scope', '$http', function($scope, $http) { 
    /*$scope.todo = {
        title: "Things I Need to Do",
        list: ["Clean my room", "Go to the store", "Study Cracking the Coding Interview"]
    }*/

    $scope.books = {
        title: "Search Books by ISBN",
        list: []
    }

  function hasOnlyNumbers(item) {
    return /^[0-9]*$/.test(item)
  }

  function errorCallback() {
      alert("Invalid ISBN!");
  }
    
  $scope.addItem = function(itemList, item) {
    // ISBN : 10 or 13 length and consists of only numbers
    if ((item.length == 10 || item.length == 13) && hasOnlyNumbers(item)) {
      console.log("ISBNssss");
      console.log("uh " + item);
      $http.get("https://www.googleapis.com/books/v1/volumes?q=isbn:" + item).success(function(data) {
        itemList.push("Title: " + data.items[0].volumeInfo.title + " |||| Author(s): " + data.items[0].volumeInfo.authors)
      })
    } else {
      console.log("Not an ISBN");
      
    }
    }

}]);