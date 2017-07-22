/**
 * Created by a1 on 2017/7/19.
 */
// 这就是我们客户数据的结构.
const customerData = [
    { ssn: "444-44-4444", name: "Bill", age: 35, email: "bill@company.com" },
    { ssn: "555-55-5555", name: "Donna", age: 32, email: "donna@home.org" }
];
const dbName = "the_name";
/**********************************************************************************/

function IndexedDBObj() {
    var indexedDB = null;
    var request = null;
    var db = null;
    var transaction=null;
}
IndexedDBObj.prototype.LinkDatabese = function (dbName, version) {
    var $this = this;
    $this.indexedDB = window.indexedDB || window.webkitIndexedDB || window.mozIndexedDB || window.msIndexedDB;
    $this.request = indexedDB.open(dbName, version);
    if ($this.request) {

        $this.request.onerror = function (event) {
            // 对request.errorCode做一些需要的处理！
        };
        $this.request.onsuccess = function (event) {
            $this.db=$this.request.result;
            $this.transaction=$this.db.transaction(['customers'],'readwrite');
        };
        // 截止2012-02-22为止，WebKit内核的浏览器还没有对onupgradeneeded进行实现.
        $this.request.onupgradeneeded = function (event) {

            // 更新存储的对象（译者，此处不懂翻译，原文为Update object stores and indices）

            // 对request.result进行一些需要的处理!
            var db = event.target.result;
            // 创建一个名为“objectStore”的对象来存储我们的客户数据。
            // 我们选择使用“ssn”作为我们的key path，因为它能保证唯一
            var objectStore = db.createObjectStore("customers", { keyPath: "ssn" });

            // 创建一个通过name属性去查找客户数据的索引。因为可能出现
            // 出现重复，所以我们不能使用唯一索引.
            objectStore.createIndex("name", "name", { unique: false });

            // 我们想确保任意两个客户的email是不同的，
            //  所以我们用了唯一索引
            objectStore.createIndex("email", "email", { unique: true });

            // 用我们刚新建的objectStore来存储客户数据.
            for (i in customerData) {
                objectStore.add(customerData[i]);
            }
            db.onerror = function (event) {
                // 针对这个数据库的所有请求的异常都统一在这个异常事件处理程序中完成。（译者：这样做有效减少监听的数量，在事件冒泡过程的最顶层实现一次监听就可以了，这也是提高JS运行效率的一种技巧。）
                alert("Database error: " + event.target.errorCode);
            }
        }
    }
}
/*****************************************************************************************/
