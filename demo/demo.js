/**
 * Created by a1 on 2017/7/19.
 */
var db;
// 我们的客户数据看起来像这样。
const customerData = [
    {ssn: "444-44-4444", name: "Bill", age: 35, email: "bill@company.com"},
    {ssn: "555-55-5555", name: "Donna", age: 32, email: "donna@home.org"}
];
const dbName = "the_name";
var version = 2
var objectStore;

//创建数据库
function createDatabase(dbName, version) {
    debugger
    if (dbName && version) {
        var version = version > 1 ? version : 1;
        var request = window.indexedDB.open(dbName, version);
        debugger;
       // console.log(transaction)
        console.log(request);
        request.onerror = function (event) {
            // Do something with request.errorCode!
            console.log(event)
        };
        request.onsuccess = function (event) {
            debugger
            console.log(event)
        };
        request.onupgradeneeded = function (event) {
            debugger
            var db = event.target.result;

            // 创建一个对象存储空间来持有有关我们客户的信息。
            // 我们将使用 "ssn" 作为我们的 key path 因为它保证是唯一的。
            var objectStore = db.createObjectStore("customers", {keyPath: "ssn"});

            // 创建一个索引来通过 name 搜索客户。
            // 可能会有重复的，因此我们不能使用 unique 索引。
            objectStore.createIndex("name", "name", {unique: false});

            // 创建一个索引来通过 email 搜索客户。
            // 我们希望确保不会有两个客户使用相同的 email 地址，因此我们使用一个 unique 索引。
            objectStore.createIndex("email", "email", {unique: true});

            // 在新创建的对象存储空间中保存值
            for (var i in customerData) {
                objectStore.add(customerData[i]);
            }
        };
    }
}
//删除数据
function deleteData(objectStore, key) {
    var request = objectStore.delete(key);
    request.onerror = function (event) {
        // 错误处理!
    };
    request.onsuccess = function (event) {
        // 对 request.result 做些操作！
        alert("Name for SSN 444-44-4444 is " + request.result.name);
    };
}
//获取数据

//使用游标获取数据
function corsorGetData(objectStore) {
    var customers = [];
    objectStore.openCursor().onsuccess = function (event) {
        var cursor = event.target.result;
        if (cursor) {
            alert("Name for SSN " + cursor.key + " is " + cursor.value.name);
            customers.push(cursor.value)
            cursor.continue();
        }
        else {
            alert("No more entries!");
        }
    };
}
//使用索引获取数据
createDatabase(dbName,version);