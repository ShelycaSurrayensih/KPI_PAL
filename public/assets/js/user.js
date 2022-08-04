//indiv

var checkAll = document.getElementById("checkAll");
checkAll &&
    (checkAll.onclick = function () {
        var e = document.querySelectorAll(
            '.form-check-all input[type="checkbox"]'
        );
        1 == checkAll.checked
            ? Array.from(e).forEach(function (e) {
                  (e.checked = !0),
                      e.closest("tr").classList.add("table-active");
              })
            : Array.from(e).forEach(function (e) {
                  (e.checked = !1),
                      e.closest("tr").classList.remove("table-active");
              });
    });
indiv = [];
var IndivKPI,
    perPage = 8,
    options = {
        valueNames: [
            "id_kpidir",
            "id_direktorat",
            "id_divisi",
            "desc_kpidir",
            "satuan",
            "target",
            "bobot",
            "ket",
            "asal_kpi",
            "alasan",
        ],
        page: perPage,
        pagination: !0,
        plugins: [ListPagination({ left: 2, right: 2 })],
    };
document.getElementById("IndivKPI") &&
    (IndivKPI = new List("IndivKPI", options).on("updated", function (e) {
        0 == e.matchingItems.length
            ? (document.getElementsByClassName("noresult")[0].style.display =
                  "block")
            : (document.getElementsByClassName("noresult")[0].style.display =
                  "none");
        var t = 1 == e.i,
            a = e.i > e.matchingItems.length - e.page;
        document.querySelector(".pagination-prev.disabled") &&
            document
                .querySelector(".pagination-prev.disabled")
                .classList.remove("disabled"),
            document.querySelector(".pagination-next.disabled") &&
                document
                    .querySelector(".pagination-next.disabled")
                    .classList.remove("disabled"),
            t &&
                document
                    .querySelector(".pagination-prev")
                    .classList.add("disabled"),
            a &&
                document
                    .querySelector(".pagination-next")
                    .classList.add("disabled"),
            e.matchingItems.length <= perPage
                ? (document.querySelector(".pagination-wrap").style.display =
                      "none")
                : (document.querySelector(".pagination-wrap").style.display =
                      "flex"),
            e.matchingItems.length == perPage &&
                document
                    .querySelector(".pagination.listjs-pagination")
                    .firstElementChild.children[0].click(),
            0 < e.matchingItems.length
                ? (document.getElementsByClassName(
                      "noresult"
                  )[0].style.display = "none")
                : (document.getElementsByClassName(
                      "noresult"
                  )[0].style.display = "block");
    }));
const xhttp = new XMLHttpRequest();
(xhttp.onload = function () {
    var e = JSON.parse(this.responseText);
    Array.from(e).forEach((e) => {
        IndivKPI.add({
            id:
                '<a href="javascript:void(0);" class="fw-medium link-primary">#VZ' +
                e.id +
                "</a>",
            id_kpidir: e.id_kpidir,
            id_direktorat: e.id_direktorat,
            id_divisi: e.id_divisi,
            desc_kpidir: e.desc_kpidir,
            satuan: e.satuan,
            target: e.target,
            bobot: e.bobot,
            ket: e.ket,
            asal_kpi: e.asal_kpi,
            alasan: e.alasan,
            
        }),
            IndivKPI.sort("id_kpidir", { order: "desc" }),
            refreshCallbacks();
    }),
        IndivKPI.remove(
            "id_kpidir",
            '<a href="javascript:void(0);" class="fw-medium link-primary">#VZ2101</a>'
        );
}),
    xhttp.open("GET", "assets/json/table-customer-list.json"),
    xhttp.send(),
    (count = new DOMParser().parseFromString(
        IndivKPI.items.slice(-1)[0]._values.id,
        "text/html"
    ));
var isValue = count.body.firstElementChild.innerHTML,
    idField = document.getElementById("id_kpidir"),
    direktoratField = document.getElementById("id_direktorat"),
    divisiField = document.getElementById("id_divisi"),
    descField = document.getElementById("desc_kpidir"),
    satuanField = document.getElementById("satuan"),
    targetField = document.getElementById("target"),
    bobotField = document.getElementById("bobot"),
    ketField = document.getElementById("ket"),
    asalField = document.getElementById("asal_kpi"),
    alasanField = document.getElementById("alasan"),
    addBtn = document.getElementById("add-btn"),
    editBtn = document.getElementById("edit-btn"),
    removeBtns = document.getElementsByClassName("remove-item-btn"),
    editBtns = document.getElementsByClassName("edit-item-btn");
function filterContact(e) {
    var t = e;
    IndivKPI.filter(function (e) {
        matchData = new DOMParser().parseFromString(
            e.values().status,
            "text/html"
        );
        e = matchData.body.firstElementChild.innerHTML;
        return "All" == e || "All" == t || e == t;
    }),
        IndivKPI.update();
}
function updateList() {
    var a = document.querySelector("input[name=status]:checked").value;
    (data = userList.filter(function (e) {
        var t = !1;
        return (
            "All" == a
                ? (t = !0)
                : ((t = e.values().sts == a), console.log(t, "statusFilter")),
            t
        );
    })),
        userList.update();
}
refreshCallbacks(),
    document.getElementById("showModal") &&
        (document
            .getElementById("showModal")
            .addEventListener("show.bs.modal", function (e) {
                e.relatedTarget.classList.contains("edit-item-btn")
                    ? ((document.getElementById("exampleModalLabel").innerHTML =
                          "Edit KPI"),
                      (document
                          .getElementById("showModal")
                          .querySelector(".modal-footer").style.display =
                          "block"),
                      (document.getElementById("add-btn").style.display =
                          "none"),
                      (document.getElementById("edit-btn").style.display =
                          "block"))
                    : e.relatedTarget.classList.contains("add-btn")
                    ? (document.getElementById("exampleModalLabel").innerHTML =
                          "Add KPI"
                      (document
                          .getElementById("showModal")
                          .querySelector(".modal-footer").style.display =
                          "block"),
                      (document.getElementById("edit-btn").style.display =
                          "none"),
                      (document.getElementById("add-btn").style.display =
                          "block"))
                    :((document.getElementById("exampleModalLabel").innerHTML =
                          "List KPI"),
                      (document
                          .getElementById("showModal")
                          .querySelector(".modal-footer").style.display =
                          "none"));
            }),
        ischeckboxcheck(),
        document
            .getElementById("showModal")
            .addEventListener("hidden.bs.modal", function () {
                clearFields();
            })),
    document.querySelector("#IndivKPI").addEventListener("click", function () {
        refreshCallbacks(), ischeckboxcheck();
    });
var table = document.getElementById("IndivTable"),
    tr = table.getElementsByTagName("tr"),
    trlist = table.querySelectorAll(".list tr"),
    count = 11;
addBtn &&
    addBtn.addEventListener("click", function (e) {
        "" !== direktoratField.value &&
            "" !== divisiField.value &&
            "" !== descField.value &&
            "" !== satuanField.value &&
            "" !== targetField.value &&
            "" !== bobotField.value &&
            "" !== ketField.value &&
            "" !== asalField.value &&
            "" !== alasanField.value &&
            (IndivKPI.add({
                id_kpidir:
                    '<a href="javascript:void(0);" class="fw-medium link-primary">#VZ' +
                    count +
                    "</a>",
                    id_direktorat: direktoratField.value,
                divisi: divisiField.value,
                desc_kpidir: descField.value,
                satuan: satuanField.value,
                target: targetField.value,
                bobot: bobotField.value,
                ket: ketField.value,
                asal_kpi: asalField.value,
                alasan: alasanField.value,
                status: isStatus(statusField.value),
            }),
            IndivKPI.sort("id_kpidir", { order: "desc" }),
            document.getElementById("close-modal").click(),
            clearFields(),
            refreshCallbacks(),
            filterContact("All"),
            count++,
            Swal.fire({
                position: "center",
                icon: "success",
                title: "KPI inserted successfully!",
                showConfirmButton: !1,
                timer: 2e3,
                showCloseButton: !0,
            }));
    }),
    editBtn &&
        editBtn.addEventListener("click", function (e) {
            document.getElementById("exampleModalLabel").innerHTML =
                "Edit KPI";
            var t = IndivKPI.get({ id: idField.value });
            Array.from(t).forEach(function (e) {
                (isid = new DOMParser().parseFromString(
                    e._values.id,
                    "text/html"
                )),
                    isid.body.firstElementChild.innerHTML == itemId &&
                        e.values({
                            id:
                                '<a href="javascript:void(0);" class="fw-medium link-primary">' +
                                idField.value +
                                "</a>",
                                id_direktorat: direktoratField.value,
                            id_divisi: divisiField.value,
                            desc_kpidir: descField.value,
                            satuan: satuanField.value,
                            target: targetField.value,
                            bobot: bobotField.value,
                            ket: ketField.value,
                            asal_kpi: asalField.value,
                            alasan: alasanField.value,
                            status: isStatus(statusField.value),
                        });
            }),
                document.getElementById("close-modal").click(),
                clearFields(),
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "KPI updated Successfully!",
                    showConfirmButton: !1,
                    timer: 2e3,
                    showCloseButton: !0,
                });
        });
var statusVal = new Choices(statusField);
function isStatus(e) {
    switch (e) {
        case "Active":
            return (
                '<span class="badge badge-soft-success text-uppercase">' +
                e +
                "</span>"
            );
        case "Block":
            return (
                '<span class="badge badge-soft-danger text-uppercase">' +
                e +
                "</span>"
            );
    }
}
function ischeckboxcheck() {
    Array.from(document.getElementsByName("checkAll")).forEach(function (e) {
        e.addEventListener("click", function (e) {
            e.target.checked
                ? e.target.closest("tr").classList.add("table-active")
                : e.target.closest("tr").classList.remove("table-active");
        });
    });
}
function refreshCallbacks() {
    removeBtns &&
        Array.from(removeBtns).forEach(function (e) {
            e.addEventListener("click", function (e) {
                e.target.closest("tr").children[1].innerText,
                    (itemId = e.target.closest("tr").children[1].innerText);
                e = IndivKPI.get({ id: itemId });
                Array.from(e).forEach(function (e) {
                    deleteid = new DOMParser().parseFromString(
                        e._values.id,
                        "text/html"
                    );
                    var t = deleteid.body.firstElementChild;
                    deleteid.body.firstElementChild.innerHTML == itemId &&
                        document
                            .getElementById("delete-record")
                            .addEventListener("click", function () {
                                IndivKPI.remove("id_kpidir", t.outerHTML),
                                    document
                                        .getElementById("deleteRecordModal")
                                        .click();
                            });
                });
            });
        }),
        editBtn &&
            Array.from(editBtns).forEach(function (e) {
                e.addEventListener("click", function (e) {
                    e.target.closest("tr").children[1].innerText,
                        (itemId = e.target.closest("tr").children[1].innerText);
                    e = IndivKPI.get({ id_kpidir: itemId });
                    Array.from(e).forEach(function (e) { 
                        isid = new DOMParser().parseFromString(
                            e._values.id,
                            "text/html"
                        );
                        var t = isid.body.firstElementChild.innerHTML;
                        t == itemId &&
                            ((idField.value = t),
                            (direktoratField.value = e._values.id_direktorat),
                            (divisiField.value = e._values.id_divisi),
                            (descField.value = e._values.desc_kpidir),
                            (satuanField.value = e._values.satuan),
                            (targetField.value = e._values.target),
                            (bobotField.value = e._values.bobot),
                            (ketField.value = e._values.ket),
                            (asalField.value = e._values.asal_kpi),
                            (alasanField.value = e._values.alasan),
                            statusVal && statusVal.destroy(),
                            (statusVal = new Choices(statusField)),
                            (val = new DOMParser().parseFromString(
                                e._values.status,
                                "text/html"
                            )),
                            (t = val.body.firstElementChild.innerHTML),
                            statusVal.setChoiceByValue(t),
                            flatpickr("#date-field", {
                                dateFormat: "d M, Y",
                                defaultDate: e._values.date,
                            }));
                    });
                });
            });
}
function clearFields() {
    (direktoratField.value = ""),
        (divisiField.value = ""),
        (descField.value = ""),
        (satuanField.value = ""),
        (targetField.value = ""),
        (bobotield.value = ""),
        (ketField.value = ""),
        (asal_kpiField.value = ""),
        (alasanField.value = "");
}
function deleteMultiple() {
    ids_array = [];
    var e = document.getElementsByName("chk_child");
    if (
        (Array.from(e).forEach(function (e) {
            1 == e.checked &&
                ((e =
                    e.parentNode.parentNode.parentNode.querySelector(
                        ".id a"
                    ).innerHTML),
                ids_array.push(e));
        }),
        "undefined" != typeof ids_array && 0 < ids_array.length)
    ) {
        if (!confirm("Are you sure you want to delete this?")) return !1;
        Array.from(ids_array).forEach(function (e) {
            IndivKPI.remove(
                "id",
                `<a href="javascript:void(0);" class="fw-medium link-primary">${e}</a>`
            );
        }),
            (document.getElementById("checkAll").checked = !1);
    } else
        Swal.fire({
            title: "Please select at least one checkbox",
            confirmButtonClass: "btn btn-info",
            buttonsStyling: !1,
            showCloseButton: !0,
        });
}
document.querySelector(".pagination-next") &&
    document
        .querySelector(".pagination-next")
        .addEventListener("click", function () {
            !document.querySelector(".pagination.listjs-pagination") ||
                (document
                    .querySelector(".pagination.listjs-pagination")
                    .querySelector(".active") &&
                    document
                        .querySelector(".pagination.listjs-pagination")
                        .querySelector(".active")
                        .nextElementSibling.children[0].click());
        }),
    document.querySelector(".pagination-prev") &&
        document
            .querySelector(".pagination-prev")
            .addEventListener("click", function () {
                !document.querySelector(".pagination.listjs-pagination") ||
                    (document
                        .querySelector(".pagination.listjs-pagination")
                        .querySelector(".active") &&
                        document
                            .querySelector(".pagination.listjs-pagination")
                            .querySelector(".active")
                            .previousSibling.children[0].click());
            });
var attroptions = {
        valueNames: [
            "name",
            "born",
            { data: ["id"] },
            { attr: "src", name: "image" },
            { attr: "href", name: "link" },
            { attr: "data-timestamp", name: "timestamp" },
        ],
    },
    attrList = new List("users", attroptions);
attrList.add({
    name: "Leia",
    born: "1954",
    image: "assets/images/users/avatar-5.jpg",
    id: 5,
    timestamp: "67893",
});
var existOptionsList = { valueNames: ["contact-name", "contact-message"] },
    existList = new List("contact-existing-list", existOptionsList),
    fuzzySearchList = new List("fuzzysearch-list", { valueNames: ["name"] }),
    paginationList = new List("pagination-list", {
        valueNames: ["pagi-list"],
        page: 3,
        pagination: !0,
    });




    //IndhanTim

var checkAll = document.getElementById("checkAll");
checkAll &&
    (checkAll.onclick = function () {
        var e = document.querySelectorAll(
            '.form-check-all input[type="checkbox"]'
        );
        1 == checkAll.checked
            ? Array.from(e).forEach(function (e) {
                  (e.checked = !0),
                      e.closest("tr").classList.add("table-active");
              })
            : Array.from(e).forEach(function (e) {
                  (e.checked = !1),
                      e.closest("tr").classList.remove("table-active");
              });
    });
    IndhanTimKPI= [];
var IndhanTimKPI,
    perPage = 8,
    options = {
        valueNames: [
            "id_tim",
            "nama_tim",
           
        ],
        page: perPage,
        pagination: !0,
        plugins: [ListPagination({ left: 2, right: 2 })],
    };
document.getElementById("IndhanTimKPI") &&
    (IndhanTimKPI = new List("IndhanTimKPI", options).on("updated", function (e) {
        0 == e.matchingItems.length
            ? (document.getElementsByClassName("noresult")[0].style.display =
                  "block")
            : (document.getElementsByClassName("noresult")[0].style.display =
                  "none");
        var t = 1 == e.i,
            a = e.i > e.matchingItems.length - e.page;
        document.querySelector(".pagination-prev.disabled") &&
            document
                .querySelector(".pagination-prev.disabled")
                .classList.remove("disabled"),
            document.querySelector(".pagination-next.disabled") &&
                document
                    .querySelector(".pagination-next.disabled")
                    .classList.remove("disabled"),
            t &&
                document
                    .querySelector(".pagination-prev")
                    .classList.add("disabled"),
            a &&
                document
                    .querySelector(".pagination-next")
                    .classList.add("disabled"),
            e.matchingItems.length <= perPage
                ? (document.querySelector(".pagination-wrap").style.display =
                      "none")
                : (document.querySelector(".pagination-wrap").style.display =
                      "flex"),
            e.matchingItems.length == perPage &&
                document
                    .querySelector(".pagination.listjs-pagination")
                    .firstElementChild.children[0].click(),
            0 < e.matchingItems.length
                ? (document.getElementsByClassName(
                      "noresult"
                  )[0].style.display = "none")
                : (document.getElementsByClassName(
                      "noresult"
                  )[0].style.display = "block");
    }));
// const xhttp = new XMLHttpRequest();
(xhttp.onload = function () {
    var e = JSON.parse(this.responseText);
    Array.from(e).forEach((e) => {
        IndhanKPI.add({
            id:
                '<a href="javascript:void(0);" class="fw-medium link-primary">#VZ' +
                e.id +
                "</a>",
            id_tim: e.id_tim,
            nama_tim: e.nama_tim,
            
        }),
        IndhanTimKPI.sort("id_tim", { order: "desc" }),
            refreshCallbacks();
    }),
    IndhanTimKPI.remove(
            "id_tim",
            '<a href="javascript:void(0);" class="fw-medium link-primary">#VZ2101</a>'
        );
}),
    xhttp.open("GET", "assets/json/table-customer-list.json"),
    xhttp.send(),
    (count = new DOMParser().parseFromString(
        IndhanTimKPI.items.slice(-1)[0]._values.id,
        "text/html"
    ));
var isValue = count.body.firstElementChild.innerHTML,
    idField = document.getElementById("id_tim"),
    namaField = document.getElementById("nama_tim"),
    addBtn = document.getElementById("add-btn"),
    editBtn = document.getElementById("edit-btn"),
    removeBtns = document.getElementsByClassName("remove-item-btn"),
    editBtns = document.getElementsByClassName("edit-item-btn");
function filterContact(e) {
    var t = e;
    IndhanTimKPI.filter(function (e) {
        matchData = new DOMParser().parseFromString(
            e.values().status,
            "text/html"
        );
        e = matchData.body.firstElementChild.innerHTML;
        return "All" == e || "All" == t || e == t;
    }),
    IndhanTimKPI.update();
}
function updateList() {
    var a = document.querySelector("input[name=status]:checked").value;
    (data = userList.filter(function (e) {
        var t = !1;
        return (
            "All" == a
                ? (t = !0)
                : ((t = e.values().sts == a), console.log(t, "statusFilter")),
            t
        );
    })),
        userList.update();
}
refreshCallbacks(),
    document.getElementById("showModal") &&
        (document
            .getElementById("showModal")
            .addEventListener("show.bs.modal", function (e) {
                e.relatedTarget.classList.contains("edit-item-btn")
                    ? ((document.getElementById("exampleModalLabelEdit").innerHTML =
                          "Edit KPI"),
                      (document
                          .getElementById("showModal")
                          .querySelector(".modal-footer").style.display =
                          "block"),
                      (document.getElementById("add-btn").style.display =
                          "none"),
                      (document.getElementById("edit-btn").style.display =
                          "block"))
                    : e.relatedTarget.classList.contains("add-btn")
                    ? (document.getElementById("exampleModalLabel").innerHTML =
                          "Add KPI"
                      (document
                          .getElementById("showModal")
                          .querySelector(".modal-footer").style.display =
                          "block"),
                      (document.getElementById("edit-btn").style.display =
                          "none"),
                      (document.getElementById("add-btn").style.display =
                          "block"))
                    : ((document.getElementById("exampleModalLabel").innerHTML =
                          "List KPI"),
                      (document
                          .getElementById("showModal")
                          .querySelector(".modal-footer").style.display =
                          "none"));
            }),
        ischeckboxcheck(),
        document
            .getElementById("showModal")
            .addEventListener("hidden.bs.modal", function () {
                clearFields();
            })),
    document.querySelector("#IndhanTimKPI").addEventListener("click", function () {
        refreshCallbacks(), ischeckboxcheck();
    });
var table = document.getElementById("timTable"),
    tr = table.getElementsByTagName("tr"),
    trlist = table.querySelectorAll(".list tr"),
    count = 11;
addBtn &&
    addBtn.addEventListener("click", function (e) {
        "" !== namaField.value &&
            
            (IndhanTimKPI.add({
                id_tim:
                    '<a href="javascript:void(0);" class="fw-medium link-primary">#VZ' +
                    count +
                    "</a>",
                    nama_tim: namaField.value,
                
                
            }),
            IndhanTimKPI.sort("id_tim", { order: "desc" }),
            document.getElementById("close-modal").click(),
            clearFields(),
            refreshCallbacks(),
            filterContact("All"),
            count++,
            Swal.fire({
                position: "center",
                icon: "success",
                title: "KPI inserted successfully!",
                showConfirmButton: !1,
                timer: 2e3,
                showCloseButton: !0,
            }));
    }),
    editBtn &&
        editBtn.addEventListener("click", function (e) {
            document.getElementById("exampleModalLabel").innerHTML =
                "Edit KPI";
            var t = IndhanTimKPI.get({ id: idField.value });
            Array.from(t).forEach(function (e) {
                (isid = new DOMParser().parseFromString(
                    e._values.id,
                    "text/html"
                )),
                    isid.body.firstElementChild.innerHTML == itemId &&
                        e.values({
                            id:
                                '<a href="javascript:void(0);" class="fw-medium link-primary">' +
                                idField.value +
                                "</a>",
                                nama_tim: namaField.value,
                            
                        });
            }),
                document.getElementById("close-modal").click(),
                clearFields(),
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "KPI updated Successfully!",
                    showConfirmButton: !1,
                    timer: 2e3,
                    showCloseButton: !0,
                });
        });
var statusVal = new Choices(statusField);
function isStatus(e) {
    switch (e) {
        case "Active":
            return (
                '<span class="badge badge-soft-success text-uppercase">' +
                e +
                "</span>"
            );
        case "Block":
            return (
                '<span class="badge badge-soft-danger text-uppercase">' +
                e +
                "</span>"
            );
    }
}
function ischeckboxcheck() {
    Array.from(document.getElementsByName("checkAll")).forEach(function (e) {
        e.addEventListener("click", function (e) {
            e.target.checked
                ? e.target.closest("tr").classList.add("table-active")
                : e.target.closest("tr").classList.remove("table-active");
        });
    });
}
function refreshCallbacks() {
    removeBtns &&
        Array.from(removeBtns).forEach(function (e) {
            e.addEventListener("click", function (e) {
                e.target.closest("tr").children[1].innerText,
                    (itemId = e.target.closest("tr").children[1].innerText);
                e = IndhanTimKPI.get({ id: itemId });
                Array.from(e).forEach(function (e) {
                    deleteid = new DOMParser().parseFromString(
                        e._values.id,
                        "text/html"
                    );
                    var t = deleteid.body.firstElementChild;
                    deleteid.body.firstElementChild.innerHTML == itemId &&
                        document
                            .getElementById("delete-record")
                            .addEventListener("click", function () {
                                IndhanTimKPI.remove("id_tim", t.outerHTML),
                                    document
                                        .getElementById("deleteRecordModal")
                                        .click();
                            });
                });
            });
        }),
        editBtn &&
            Array.from(editBtns).forEach(function (e) {
                e.addEventListener("click", function (e) {
                    e.target.closest("tr").children[1].innerText,
                        (itemId = e.target.closest("tr").children[1].innerText);
                    e = IndhanTimKPI.get({ id_tim: itemId });
                    Array.from(e).forEach(function (e) {
                        isid = new DOMParser().parseFromString(
                            e._values.id,
                            "text/html"
                        );
                        var t = isid.body.firstElementChild.innerHTML;
                        t == itemId &&
                            ((idField.value = t),
                            (namaField.value = e._values.nama_tim),
                            
                            statusVal && statusVal.destroy(),
                            (statusVal = new Choices(statusField)),
                            (val = new DOMParser().parseFromString(
                                e._values.status,
                                "text/html"
                            )),
                            (t = val.body.firstElementChild.innerHTML),
                            statusVal.setChoiceByValue(t),
                            flatpickr("#date-field", {
                                dateFormat: "d M, Y",
                                defaultDate: e._values.date,
                            }));
                    });
                });
            });
}
function clearFields() {
    (namaField.value = "")
        
}
function deleteMultiple() {
    ids_array = [];
    var e = document.getElementsByName("chk_child");
    if (
        (Array.from(e).forEach(function (e) {
            1 == e.checked &&
                ((e =
                    e.parentNode.parentNode.parentNode.querySelector(
                        ".id a"
                    ).innerHTML),
                ids_array.push(e));
        }),
        "undefined" != typeof ids_array && 0 < ids_array.length)
    ) {
        if (!confirm("Are you sure you want to delete this?")) return !1;
        Array.from(ids_array).forEach(function (e) {
            IndhanTimKPI.remove(
                "id",
                `<a href="javascript:void(0);" class="fw-medium link-primary">${e}</a>`
            );
        }),
            (document.getElementById("checkAll").checked = !1);
    } else
        Swal.fire({
            title: "Please select at least one checkbox",
            confirmButtonClass: "btn btn-info",
            buttonsStyling: !1,
            showCloseButton: !0,
        });
}
document.querySelector(".pagination-next") &&
    document
        .querySelector(".pagination-next")
        .addEventListener("click", function () {
            !document.querySelector(".pagination.listjs-pagination") ||
                (document
                    .querySelector(".pagination.listjs-pagination")
                    .querySelector(".active") &&
                    document
                        .querySelector(".pagination.listjs-pagination")
                        .querySelector(".active")
                        .nextElementSibling.children[0].click());
        }),
    document.querySelector(".pagination-prev") &&
        document
            .querySelector(".pagination-prev")
            .addEventListener("click", function () {
                !document.querySelector(".pagination.listjs-pagination") ||
                    (document
                        .querySelector(".pagination.listjs-pagination")
                        .querySelector(".active") &&
                        document
                            .querySelector(".pagination.listjs-pagination")
                            .querySelector(".active")
                            .previousSibling.children[0].click());
            });
var attroptions = {
        valueNames: [
            "name",
            "born",
            { data: ["id"] },
            { attr: "src", name: "image" },
            { attr: "href", name: "link" },
            { attr: "data-timestamp", name: "timestamp" },
        ],
    },
    attrList = new List("users", attroptions);
attrList.add({
    name: "Leia",
    born: "1954",
    image: "assets/images/users/avatar-5.jpg",
    id: 5,
    timestamp: "67893",
});
var existOptionsList = { valueNames: ["contact-name", "contact-message"] },
    existList = new List("contact-existing-list", existOptionsList),
    fuzzySearchList = new List("fuzzysearch-list", { valueNames: ["name"] }),
    paginationList = new List("pagination-list", {
        valueNames: ["pagi-list"],
        page: 3,
        pagination: !0,
    });


//indhan

var checkAll = document.getElementById("checkAll");
checkAll &&
    (checkAll.onclick = function () {
        var e = document.querySelectorAll(
            '.form-check-all input[type="checkbox"]'
        );
        1 == checkAll.checked
            ? Array.from(e).forEach(function (e) {
                  (e.checked = !0),
                      e.closest("tr").classList.add("table-active");
              })
            : Array.from(e).forEach(function (e) {
                  (e.checked = !1),
                      e.closest("tr").classList.remove("table-active");
              });
    });
indhan = [];
var Indhan,
    perPage = 8,
    options = {
        valueNames: [
            "id_indhan",
            "id_tim",
            "id_divisi",
            "program_strategis",
            "entitas",
            "program_utama",
            "target",
        ],
        page: perPage,
        pagination: !0,
        plugins: [ListPagination({ left: 2, right: 2 })],
    };
document.getElementById("Indhan") &&
    (Indhan = new List("Indhan", options).on("updated", function (e) {
        0 == e.matchingItems.length
            ? (document.getElementsByClassName("noresult")[0].style.display =
                  "block")
            : (document.getElementsByClassName("noresult")[0].style.display =
                  "none");
        var t = 1 == e.i,
            a = e.i > e.matchingItems.length - e.page;
        document.querySelector(".pagination-prev.disabled") &&
            document
                .querySelector(".pagination-prev.disabled")
                .classList.remove("disabled"),
            document.querySelector(".pagination-next.disabled") &&
                document
                    .querySelector(".pagination-next.disabled")
                    .classList.remove("disabled"),
            t &&
                document
                    .querySelector(".pagination-prev")
                    .classList.add("disabled"),
            a &&
                document
                    .querySelector(".pagination-next")
                    .classList.add("disabled"),
            e.matchingItems.length <= perPage
                ? (document.querySelector(".pagination-wrap").style.display =
                      "none")
                : (document.querySelector(".pagination-wrap").style.display =
                      "flex"),
            e.matchingItems.length == perPage &&
                document
                    .querySelector(".pagination.listjs-pagination")
                    .firstElementChild.children[0].click(),
            0 < e.matchingItems.length
                ? (document.getElementsByClassName(
                      "noresult"
                  )[0].style.display = "none")
                : (document.getElementsByClassName(
                      "noresult"
                  )[0].style.display = "block");
    }));
const xhttp = new XMLHttpRequest();
(xhttp.onload = function () {
    var e = JSON.parse(this.responseText);
    Array.from(e).forEach((e) => {
        Indhan.add({
            id:
                '<a href="javascript:void(0);" class="fw-medium link-primary">#VZ' +
                e.id +
                "</a>",
                id_indhan: e.id_indhan,
                id_tim: e.id_tim,
            id_divisi: e.id_divisi,
            program_strategis: e.program_strategis,
            entitas: e.entitas,
            program_utama: e.program_utama,
            target: e.target,
            
            
        }),
            Indhan.sort("id_indhan", { order: "desc" }),
            refreshCallbacks();
    }),
        Indhan.remove(
            "id_indhan",
            '<a href="javascript:void(0);" class="fw-medium link-primary">#VZ2101</a>'
        );
}),
    xhttp.open("GET", "assets/json/table-customer-list.json"),
    xhttp.send(),
    (count = new DOMParser().parseFromString(
        Indhan.items.slice(-1)[0]._values.id,
        "text/html"
    ));
var isValue = count.body.firstElementChild.innerHTML,
    idField = document.getElementById("id_indhan"),
    timField = document.getElementById("id_tim"),
    divisiField = document.getElementById("id_divisi"),
    programField = document.getElementById("program_strategis"),
    entitasField = document.getElementById("entitas"),
    utamaField = document.getElementById("program_utama"),
    targetField = document.getElementById("target"),
    addBtn = document.getElementById("add-btn"),
    editBtn = document.getElementById("edit-btn"),
    removeBtns = document.getElementsByClassName("remove-item-btn"),
    editBtns = document.getElementsByClassName("edit-item-btn");
function filterContact(e) {
    var t = e;
    Indhan.filter(function (e) {
        matchData = new DOMParser().parseFromString(
            e.values().status,
            "text/html"
        );
        e = matchData.body.firstElementChild.innerHTML;
        return "All" == e || "All" == t || e == t;
    }),
        Indhan.update();
}
function updateList() {
    var a = document.querySelector("input[name=status]:checked").value;
    (data = userList.filter(function (e) {
        var t = !1;
        return (
            "All" == a
                ? (t = !0)
                : ((t = e.values().sts == a), console.log(t, "statusFilter")),
            t
        );
    })),
        userList.update();
}
refreshCallbacks(),
    document.getElementById("showModal") &&
        (document
            .getElementById("showModal")
            .addEventListener("show.bs.modal", function (e) {
                e.relatedTarget.classList.contains("edit-item-btn")
                    ? ((document.getElementById("exampleModalLabel").innerHTML =
                          "Edit KPI"),
                      (document
                          .getElementById("showModal")
                          .querySelector(".modal-footer").style.display =
                          "block"),
                      (document.getElementById("add-btn").style.display =
                          "none"),
                      (document.getElementById("edit-btn").style.display =
                          "block"))
                    : e.relatedTarget.classList.contains("add-btn")
                    ? (document.getElementById("exampleModalLabel").innerHTML =
                          "Add KPI"
                      (document
                          .getElementById("showModal")
                          .querySelector(".modal-footer").style.display =
                          "block"),
                      (document.getElementById("edit-btn").style.display =
                          "none"),
                      (document.getElementById("add-btn").style.display =
                          "block"))
                    :((document.getElementById("exampleModalLabel").innerHTML =
                          "List KPI"),
                      (document
                          .getElementById("showModal")
                          .querySelector(".modal-footer").style.display =
                          "none"));
            }),
        ischeckboxcheck(),
        document
            .getElementById("showModal")
            .addEventListener("hidden.bs.modal", function () {
                clearFields();
            })),
    document.querySelector("#Indhan").addEventListener("click", function () {
        refreshCallbacks(), ischeckboxcheck();
    });
var table = document.getElementById("IndhanTable"),
    tr = table.getElementsByTagName("tr"),
    trlist = table.querySelectorAll(".list tr"),
    count = 11;
addBtn &&
    addBtn.addEventListener("click", function (e) {
        "" !== timField.value &&
            "" !== divisiField.value &&
            "" !== programField.value &&
            "" !== entitasField.value &&
            "" !== utamaField.value &&
            "" !== targetField.value &&
            (Indhan.add({
                id_indhan:
                    '<a href="javascript:void(0);" class="fw-medium link-primary">#VZ' +
                    count +
                    "</a>",
                    id_tim: timField.value,
                divisi: divisiField.value,
                program_strategis: programField.value,
                entitas: entitasField.value,
                program_utama: utamaField.value,
                target: targetField.value,
                status: isStatus(statusField.value),
            }),
            Indhan.sort("id_indhan", { order: "desc" }),
            document.getElementById("close-modal").click(),
            clearFields(),
            refreshCallbacks(),
            filterContact("All"),
            count++,
            Swal.fire({
                position: "center",
                icon: "success",
                title: "KPI inserted successfully!",
                showConfirmButton: !1,
                timer: 2e3,
                showCloseButton: !0,
            }));
    }),
    editBtn &&
        editBtn.addEventListener("click", function (e) {
            document.getElementById("exampleModalLabel").innerHTML =
                "Edit KPI";
            var t = Indhan.get({ id: idField.value });
            Array.from(t).forEach(function (e) {
                (isid = new DOMParser().parseFromString(
                    e._values.id,
                    "text/html"
                )),
                    isid.body.firstElementChild.innerHTML == itemId &&
                        e.values({
                            id:
                                '<a href="javascript:void(0);" class="fw-medium link-primary">' +
                                idField.value +
                                "</a>",
                                id_tim: timField.value,
                            id_divisi: divisiField.value,
                            program_strategis: programField.value,
                            entitas: entitasField.value,
                            program_utama: programField.value,
                            target: targetField.value,
                            status: isStatus(statusField.value),
                        });
            }),
                document.getElementById("close-modal").click(),
                clearFields(),
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "KPI updated Successfully!",
                    showConfirmButton: !1,
                    timer: 2e3,
                    showCloseButton: !0,
                });
        });
var statusVal = new Choices(statusField);
function isStatus(e) {
    switch (e) {
        case "Active":
            return (
                '<span class="badge badge-soft-success text-uppercase">' +
                e +
                "</span>"
            );
        case "Block":
            return (
                '<span class="badge badge-soft-danger text-uppercase">' +
                e +
                "</span>"
            );
    }
}
function ischeckboxcheck() {
    Array.from(document.getElementsByName("checkAll")).forEach(function (e) {
        e.addEventListener("click", function (e) {
            e.target.checked
                ? e.target.closest("tr").classList.add("table-active")
                : e.target.closest("tr").classList.remove("table-active");
        });
    });
}
function refreshCallbacks() {
    removeBtns &&
        Array.from(removeBtns).forEach(function (e) {
            e.addEventListener("click", function (e) {
                e.target.closest("tr").children[1].innerText,
                    (itemId = e.target.closest("tr").children[1].innerText);
                e = Indhan.get({ id: itemId });
                Array.from(e).forEach(function (e) {
                    deleteid = new DOMParser().parseFromString(
                        e._values.id,
                        "text/html"
                    );
                    var t = deleteid.body.firstElementChild;
                    deleteid.body.firstElementChild.innerHTML == itemId &&
                        document
                            .getElementById("delete-record")
                            .addEventListener("click", function () {
                                IndhanKPI.remove("id_indhan", t.outerHTML),
                                    document
                                        .getElementById("deleteRecordModal")
                                        .click();
                            });
                });
            });
        }),
        editBtn &&
            Array.from(editBtns).forEach(function (e) {
                e.addEventListener("click", function (e) {
                    e.target.closest("tr").children[1].innerText,
                        (itemId = e.target.closest("tr").children[1].innerText);
                    e = Indhan.get({ id_indhan: itemId });
                    Array.from(e).forEach(function (e) { 
                        isid = new DOMParser().parseFromString(
                            e._values.id,
                            "text/html"
                        );
                        var t = isid.body.firstElementChild.innerHTML;
                        t == itemId &&
                            ((idField.value = t),
                            (timField.value = e._values.id_tim),
                            (divisiField.value = e._values.id_divisi),
                            (programField.value = e._values.program_strategis),
                            (entitasField.value = e._values.entitas),
                            (utamaField.value = e._values.program_utama),
                            (targetField.value = e._values.target),
                            statusVal && statusVal.destroy(),
                            (statusVal = new Choices(statusField)),
                            (val = new DOMParser().parseFromString(
                                e._values.status,
                                "text/html"
                            )),
                            (t = val.body.firstElementChild.innerHTML),
                            statusVal.setChoiceByValue(t),
                            flatpickr("#date-field", {
                                dateFormat: "d M, Y",
                                defaultDate: e._values.date,
                            }));
                    });
                });
            });
}
function clearFields() {
    (timField.value = ""),
        (divisiField.value = ""),
        (programField.value = ""),
        (entitasField.value = ""),
        (utamaField.value = ""),
        (bargetField.value = "")
}
function deleteMultiple() {
    ids_array = [];
    var e = document.getElementsByName("chk_child");
    if (
        (Array.from(e).forEach(function (e) {
            1 == e.checked &&
                ((e =
                    e.parentNode.parentNode.parentNode.querySelector(
                        ".id a"
                    ).innerHTML),
                ids_array.push(e));
        }),
        "undefined" != typeof ids_array && 0 < ids_array.length)
    ) {
        if (!confirm("Are you sure you want to delete this?")) return !1;
        Array.from(ids_array).forEach(function (e) {
            Indhan.remove(
                "id",
                `<a href="javascript:void(0);" class="fw-medium link-primary">${e}</a>`
            );
        }),
            (document.getElementById("checkAll").checked = !1);
    } else
        Swal.fire({
            title: "Please select at least one checkbox",
            confirmButtonClass: "btn btn-info",
            buttonsStyling: !1,
            showCloseButton: !0,
        });
}
document.querySelector(".pagination-next") &&
    document
        .querySelector(".pagination-next")
        .addEventListener("click", function () {
            !document.querySelector(".pagination.listjs-pagination") ||
                (document
                    .querySelector(".pagination.listjs-pagination")
                    .querySelector(".active") &&
                    document
                        .querySelector(".pagination.listjs-pagination")
                        .querySelector(".active")
                        .nextElementSibling.children[0].click());
        }),
    document.querySelector(".pagination-prev") &&
        document
            .querySelector(".pagination-prev")
            .addEventListener("click", function () {
                !document.querySelector(".pagination.listjs-pagination") ||
                    (document
                        .querySelector(".pagination.listjs-pagination")
                        .querySelector(".active") &&
                        document
                            .querySelector(".pagination.listjs-pagination")
                            .querySelector(".active")
                            .previousSibling.children[0].click());
            });
var attroptions = {
        valueNames: [
            "name",
            "born",
            { data: ["id"] },
            { attr: "src", name: "image" },
            { attr: "href", name: "link" },
            { attr: "data-timestamp", name: "timestamp" },
        ],
    },
    attrList = new List("users", attroptions);
attrList.add({
    name: "Leia",
    born: "1954",
    image: "assets/images/users/avatar-5.jpg",
    id: 5,
    timestamp: "67893",
});
var existOptionsList = { valueNames: ["contact-name", "contact-message"] },
    existList = new List("contact-existing-list", existOptionsList),
    fuzzySearchList = new List("fuzzysearch-list", { valueNames: ["name"] }),
    paginationList = new List("pagination-list", {
        valueNames: ["pagi-list"],
        page: 3,
        pagination: !0,
    });

