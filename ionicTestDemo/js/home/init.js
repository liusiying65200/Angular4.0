/**
 * Created by a1 on 2017/7/18.
 */
    angular.module('ionicApp', ['ionic'])
        .controller('RootCtrl', function ($scope) {
            $scope.onControllerChanged = function (oldController, oldIndex, newController, newIndex) {
                console.log('Controller changed', oldController, oldIndex, newController, newIndex);
                console.log(arguments);
            };
        })
        .controller('HomeCtrl', function ($scope, $timeout, $ionicModal, $ionicActionSheet) {
            debugger;
            $scope.items = [];

            $ionicModal.fromTemplateUrl('newTask.html', function (modal) {
                $scope.settingsModal = modal;
            });

            var removeItem = function (item, button) {
                $ionicActionSheet.show({
                    buttons: [],
                    destructiveText: 'Delete Task',
                    cancelText: 'Cancel',
                    cancel: function () {
                        return true;
                    },
                    destructiveButtonClicked: function () {
                        $scope.items.splice($scope.items.indexOf(item), 1);
                        return true;
                    }
                });
            };

            var completeItem = function (item, button) {
                item.isCompleted = true;
            };

            $scope.onReorder = function (el, start, end) {
                ionic.Utils.arrayMove($scope.items, start, end);
            };

            $scope.onRefresh = function () {
                console.log('ON REFRESH');

                $timeout(function () {
                    $scope.$broadcast('scroll.refreshComplete');
                }, 1000);
            }


            $scope.removeItem = function (item) {
                removeItem(item);
            };

            $scope.newTask = function () {
                $scope.settingsModal.show();
            };

            // Create the items
            for (var i = 0; i < 25; i++) {
                $scope.items.push({
                    title: 'Task ' + (i + 1),
                    buttons: [{
                        text: 'Done',
                        type: 'button-success',
                        onButtonClicked: completeItem,
                    }, {
                        text: 'Delete',
                        type: 'button-danger',
                        onButtonClicked: removeItem,
                    }]
                });
            }

        })
        .controller('cartCtrl', ['$scope', '$ionicTabsDelegate', function ($scope) {
            $scope.items = [];
            for (var i = 0; i < 10; i++) {
                var jsonDate = {
                    name: 'name' + i,
                    title: 'title' + i,
                    id: 10010 + i
                }
                $scope.items.push(jsonDate)
            }
            $scope.onRefresh = function () {
                for (var i = 0; i < 10; i++) {
                    var jsonDate = {
                        name: 'name' + i,
                        title: 'title' + i,
                        id: 10010 + i
                    }
                    $scope.items.push(jsonDate)
                }
            };
            /* $scope.toCart=function (index) {
             $ionicSlideBoxDelegate.select()
             };*/
            $scope.onselect = function (index) {
                alert('我是被选中的时候触发的函数');
            }
            $scope.deSelect = function () {
                alert('选中被取消了')
            }
        }])
        .controller('TaskCtrl', function ($scope) {
            $scope.close = function () {
                $scope.modal.hide();
            }
        })
        .controller('About', ['$scope', '$ionicTabsDelegate', function ($scope, $ionicTabsDelegate) {
            $scope.toGoCart = function (index) {
                $ionicTabsDelegate.select(index, true);
            };
            $scope.images=[];
            for (var i=1;i<11;i++){
                $scope.images.push(i);
            }
        }])
        .controller('Settings',['$scope','$rootScope','$ionicScrollDelegate',function ($scope,$rootScope,$ionicScrollDelegate) {
            $scope.scrollMainToTop = function() {
                alert(878953894689)
                $ionicScrollDelegate.$getByHandle('mainScroll').scrollTop(true);
            };
            $scope.scrollSmallToTop = function() {
                alert(76877878)
                $ionicScrollDelegate.resize()
                $ionicScrollDelegate.$getByHandle('small').scrollTop(true);
            };
            $scope.goToBottom=function () {
                alert(678989)
               // $ionicScrollDelegate.$getByHandle('small').scrollBottom(true)
                $ionicScrollDelegate.$getByHandle('small').scrollBy(-20,30,true)
            }
            $scope.shouldShowScrollView=true;
            if($scope.shouldShowScrollView){
                try {
                    var delegate = $ionicScrollDelegate.$getByHandle('myScroll');
                    delegate.rememberScrollPosition('my-scroll-id');
                    delegate.scrollToRememberedPosition();
                }catch (e){
                    console.log(e);
                    $ionicScrollDelegate.$getByHandle('myScroll').scrollTop();
                }
            }



            // 这里可以放任何唯一的ID。重点是：要在每次重新创建控制器时
            // 我们要加载当前记住的滚动值。

            $scope.items = [];
            for (var i=0; i<100; i++) {
                $scope.items.push(i);
            }
        }])