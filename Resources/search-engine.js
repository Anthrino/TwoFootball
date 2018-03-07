var data;
getList();

function filter(query) {
    var dataList = document.getElementById("dropmenu");
    dataList.innerHTML = "";
    if (query.length > 0) {
        dataList.visibility = "visible";
        $(data.list).each(function(i, item) {
            if (item.title.toLowerCase().indexOf(query) != -1) {
                var option = document.createElement("li");
                option.className = "searchlist dropdown-item";
                option.onclick = function() {
                    window.location = item.link;
                };
                option.innerHTML = item.title;
                dataList.appendChild(option);
            }
        });
        if (dataList.innerHTML == "") {
            var option = document.createElement("li");
            option.className = "searchlist dropdown-item";
            option.innerHTML = "No results";
            dataList.appendChild(option);
        }
    } else {
        dataList.visibility = "hidden";
    }
}

function getList() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.overrideMimeType("application/json");
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            data = JSON.parse(xmlhttp.responseText);
        }
    };
    xmlhttp.open("GET", "../Resources/search-list.json", true);
    xmlhttp.send();
    console.log(data);
}