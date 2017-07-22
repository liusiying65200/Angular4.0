/**
 * Created by a1 on 2017/7/13.
 */
app.controller('homeCtrl',['$scope','$controllerProvider','$compileProvider','$filterProvider',function ($scope,$controllerProvider,$compileProvider,$filterProvider) {
    app.controller=$controllerProvider.register;
    app.directive=$compileProvider.directive;
    app.filter=$filterProvider.filter;

}])