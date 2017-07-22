/**
 * Created by a1 on 2017/7/19.
 */
var note=document.getElementById('example');
const customerData = [
    {ssn: "444-44-4444", name: "Bill", age: 35, email: "bill@company.com"},
    {ssn: "555-55-5555", name: "Donna", age: 32, email: "donna@home.org"}
];
function displayData() {
    console.log(db)
}
var DBOpenRequest = window.indexedDB.open("toDoList", 3);

// these two event handlers act on the IDBDatabase object,
// when the database is opened successfully, or not
DBOpenRequest.onerror = function(event) {
    note.innerHTML += '<li>Error loading database.</li>';
};

DBOpenRequest.onsuccess = function(event) {
    note.innerHTML += '<li>Database initialised.</li>';

    // store the result of opening the database in the db
    // variable. This is used a lot later on
    db = DBOpenRequest.result;

    // Run the displayData() function to populate the task
    // list with all the to-do list data already in the IDB
    displayData();
};

// This event handles the event whereby a new version of
// the database needs to be created Either one has not
// been created before, or a new version number has been
// submitted via the window.indexedDB.open line above
function getDate(objectStore, key) {
    var request = objectStore.get(key);
    request.onerror = function (event) {
        alert('发生错误');
        // 错误处理!
    };
    request.onsuccess = function (event) {
        // 对 request.result 做些操作！
        alert("Name for SSN 444-44-4444 is " + request.result.name);
    };
}
DBOpenRequest.onupgradeneeded = function(event) {
    debugger
    var db = event.target.result;

    db.onerror = function(event) {
        note.innerHTML += '<li>Error loading database.</li>';
    };

    // Create an objectStore for this database using
    // IDBDatabase.createObjectStore

    var objectStore = db.createObjectStore("toDoList", { keyPath: "taskTitle" });

    // define what data items the objectStore will contain

    objectStore.createIndex("hours", "hours", { unique: false });
    objectStore.createIndex("minutes", "minutes", { unique: false });
    objectStore.createIndex("day", "day", { unique: false });
    objectStore.createIndex("month", "month", { unique: false });
    objectStore.createIndex("year", "year", { unique: false });

    objectStore.createIndex("notified", "notified", { unique: false });
    debugger
    //var transaction=objectStore.transaction(['toDoList'],'readwrite');
    //console.log(transaction)
    note.innerHTML += '<li>Object store created.</li>';
    getDate(objectStore,'taskTitle ')
};