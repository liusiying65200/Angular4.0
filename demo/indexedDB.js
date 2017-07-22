/**
 * Created by a1 on 2017/7/18.
 */
/**
 * 创建数据库操作对象
 */
function indexedDBF() {
    var request = null;
    var transaction = null;
    var db = null;
};

/*    =====================兼容性处理=============================*/
window.indexedDBF = indexedDBF;
/**
 *
 * @returns {*}
 */
indexedDBF.prototype.createIndexeDB = function () {
    var indexed_DB = window.indexedDB || window.mozIndexedDB || window.webkitIndexedDB || window.msIndexedDB;
    if (indexed_DB) {
        console.log(indexed_DB)
        return indexed_DB;
    } else {
        console.log('此浏览器不支持indexedDB');
        return 0;
    }
};
/**
 *
 * @returns {*}
 */
indexedDBF.prototype.createIDBTransaction = function () {
    var IDBTransaction = window.IDBTransaction || window.webkitIDBTransaction || window.msIDBTransaction;
    if (IDBTransaction) {
        console.log(IDBTransaction)
        return IDBTransaction;
    } else {
        console.log('此浏览器不支持IDBTransaction')
        return 0;
    }
};
/**
 *
 * @returns {*}
 */
indexedDBF.prototype.createIDBKeyRange = function () {
    var IDBKeyRange = window.IDBKeyRange || window.webkitIDBKeyRange || window.msIDBKeyRange;
    if (IDBKeyRange) {
        console.log(IDBKeyRange)
        return IDBKeyRange;
    } else {
        return 0;
    }
}

/*=========================== 获取对应的indexedDB对象=================================*/
/**
 *检测浏览器是否支持indexedDB
 * @returns {undefined}
 * @ 成功则返回一个indexedDB对象
 */
indexedDBF.prototype.createIndexedDBObject = function () {
    debugger
    if (this.createIndexeDB()) {
        return this.createIndexeDB();
    } else if (this.createIDBKeyRange()) {
        return this.createIDBKeyRange();
    } else if (this.createIDBTransaction()) {
        return this.createIDBTransaction();
    } else {
        console.log('此浏览器不支持indexedDB操作')
        return undefined;
    }
}
/**
 * 开启数据库连接,获取IDBDatabase对象的实例。
 * @param indexedDBObj
 * @param databaseName
 * @param versionNumber
 */
indexedDBF.prototype.openDatabase = function (indexedDBObj, databaseName, versionNumber) {
    debugger

    if (indexedDBObj && databaseName) {
        if (versionNumber) {
            this.request = indexedDBObj.open(databaseName, versionNumber);
        } else {
            this.request = indexedDBObj.open(databaseName);
        }

    } else {
        console.log('打开数据库失败');
        return 0;
    }
}
/**
 * 为request对象绑定处理事务的函数
 * @param method
 * @param methodName
 * @returns {number}
 */
indexedDBF.prototype.addEventMethod = function (method, methodName) {
    debugger
    if (this.request && method && methodName) {
        this.request[methodName] = method;
    } else {
        console.log("绑定函数失败")
        return 0;
    }
}
/**
 * 添加数据失败后的返回值
 * @param event 事件对象
 * @param customerData 即将向数据库对象添加的数据
 * @param customers 控制事务操作范围的array
 * @param readwrite 控制事务的操作权限
 * @param keyPath 数据存储的空间名称
 * @param setUnique 创建索引的方法
 * @param addDatabases 向数据库对象添加数据的方法
 * @param addTransaction 向result对象添加事务的方法
 * @returns {number} 事件处理失败后的返回值
 */

/**
 * 请求数据失败后的处理函数
 * @param event
 * @returns {Number}
 */
indexedDBF.prototype.errorMethod = function (event) {
    return this.request.errorCode;
}
/**
 * 请求数据成功后的处理函数
 * @param event
 * @returns {Object}
 */
indexedDBF.prototype.successMethod = function (event) {
    var $this = this;

    //console.log(this)
};
/**
 * 创建数据索引
 * @param objectStore
 * @param customerData
 */
indexedDBF.prototype.setUnique = function (objectStore, customerData) {
    // 创建一个索引来通过 name 搜索客户。
    // 可能会有重复的，因此我们不能使用 unique 索引。
    //objectStore.createIndex("name", "name", { unique: false });

    // 创建一个索引来通过 email 搜索客户。
    // 我们希望确保不会有两个客户使用相同的 email 地址，因此我们使用一个 unique 索引。
    //objectStore.createIndex("email", "email", { unique: true });
    for (var i in customerData) {
        if (i == 'email') {
            objectStore.createIndex(i, i, {unique: true})
        }

    }
}
/**
 * 使用add()方法先对象存储空间添加数据
 * @param objectStore
 * @param customerData
 */
indexedDBF.prototype.addDatabases = function (objectStore, customerData) {
    // 在新创建的对象存储空间中保存值
    for (var i in customerData) {
        objectStore.add(customerData[i]);
    }
}
/**
 * 使用put方法向对象存储空间添加数据
 * @param objectStore
 * @param customerData
 */
indexedDBF.prototype.usePutDatabase = function (objectStore, customerData) {
    for (var i in customerData) {
        objectStore.put(i, customerData[i]);
    }
}
/**
 *添加事务
 * @param db  数据库对象
 * @param readwrite 设定事务操作类型限制
 */
//var transaction = db.transaction(["customers"], "readwrite");
indexedDBF.prototype.addTransaction = function (db, array, readwrite) {
    if (db) {
        if (readwrite) {
            this.transaction = db.transaction(array, readwrite)
        } else {
            if (window.IDBTransaction) {
                this.transaction = db.transaction(array, IDBTransaction.READ_WRITE)
            }
        }
    } else {
        return
    }
}
/****************************** transaction *******************************/

/**
 * 当所有的数据都被增加到数据库时执行一些操作
 * @param event
 */
indexedDBF.prototype.complateMethod = function (event) {
    console.log('添加数据已完毕');
}
/**
 *
 * @param event
 */
indexedDBF.prototype.toTranErrorMethod = function (event) {
    console.log('添加数据失败');
}
/**
 *
 * @param key
 */
indexedDBF.prototype.deleteData = function (key) {
    if (this.transaction) {
        var objectStore = this.transaction.objectStore("customers");
        var request = objectStore.delete(key);
    }
}
/**
 * 向数据库对象添加一个错误处理程序
 * @param method 方法
 * @param methodName 方法名
 * @如上文所述，错误事件冒泡出来。错误事件都是针对产生这些错误的请求的，然后事件冒泡到事务，然后最终到达数据库对象。如果你希望避免为所有的请求都增加错误处理程序，你可以替代性的仅对数据库对象添加一个错误处理程序
 */
indexedDBF.prototype.resultAddMethods = function (method, methodName) {
    debugger;
    var db = this.result;
    db[methodName] = method;
}
/**
 * 数据库对象的错误处理程序
 * @param event
 */
indexedDBF.prototype.dbErrorFuc = function (event) {
    // Generic error handler for all errors targeted at this database's
    // requests!
    alert("Database error: " + event.target.errorCode);
};
indexedDBF.prototype.initIndexedDB = function (customerData, dbName, version, customers, readwrite, keyPath) {
    debugger
    var request = null;
    var db = null;
    if (!window.indexedDB) {
        window.alert("Your browser doesn't support a stable version of IndexedDB. Such and such feature will not be available.")
    }
    /* $this.request=$this.openDatabase(indexedDB,dbName,version);*/
    // In the following line, you should include the prefixes of implementations you want to test.
    window.indexedDB = window.indexedDB || window.mozIndexedDB || window.webkitIndexedDB || window.msIndexedDB;
// DON'T use "var indexedDB = ..." if you're not in a function.
// Moreover, you may need references to some window.IDB* objects:
    if (!window.indexedDB) {
        window.indexedDB = window.IDBTransaction || window.webkitIDBTransaction || window.msIDBTransaction;
    }
    if (!window.indexedDB) {
        window.indexedDB = window.IDBKeyRange || window.webkitIDBKeyRange || window.msIDBKeyRange
    }
    if (window.indexedDB) {
        request = window.indexedDB.open("MyTestDatabase");
    }
    request.onerror = function (event) {
        // Do something with request.errorCode!
        console.log(event.errorCode)
        alert(event.errorCode)
    };
    request.onsuccess = function (event) {
        // Do something with request.result!
        db = request.result;
        db.onerror = function (event) {
            // Generic error handler for all errors targeted at this database's
            // requests!
            alert("Database error: " + event.target.errorCode);
        };
    };
    request.onupgradeneeded = function (event) {
        debugger
        var db = event.target.result;
        // 注意: 旧版实验性的实现使用不建议使用的常量 IDBTransaction.READ_WRITE 而不是 "readwrite"。
        // 如果你想支持这样的实现，你只要这样写就可以了：
        // var transaction = db.transaction(["customers"], IDBTransaction.READ_WRITE);
        /* var transaction = db.transaction(customers, readwrite);


         // 当所有的数据都被增加到数据库时执行一些操作
         transaction.oncomplete = function (event) {
         alert("All done!");
         };

         transaction.onerror = function (event) {
         // 不要忘记进行错误处理！
         };

         var objectStore = transaction.objectStore("customers");*/
        /* for (var i in customerData) {
         var request = objectStore.add(customerData[i]);
         request.onsuccess = function (event) {
         // event.target.result == customerData[i].ssn
         };*/
    }
    // 创建一个索引来通过 name 搜索客户。
    // 可能会有重复的，因此我们不能使用 unique 索引。
    // 创建一个对象存储空间来持有有关我们客户的信息。
    // 我们将使用 "ssn" 作为我们的 key path 因为它保证是唯一的。
    var objectStore = db.createObjectStore("customers", {keyPath: keyPath});
    objectStore.createIndex("name", "name", {unique: false});

    // 创建一个索引来通过 email 搜索客户。
    // 我们希望确保不会有两个客户使用相同的 email 地址，因此我们使用一个 unique 索引。
    objectStore.createIndex("email", "email", {unique: true});

    // 在新创建的对象存储空间中保存值
    for (var i in customerData) {
        objectStore.add(customerData[i]);
    }
}
