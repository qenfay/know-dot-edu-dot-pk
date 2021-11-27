app.directive('singlelist', function() {
	return {
		restrict: 'E',
		scope: {
			mylist:'='
		},
		templateUrl: 'singlelist.html'
	}
})