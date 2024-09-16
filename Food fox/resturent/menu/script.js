
const menuItems = document.getElementById('menu-items');



document.getElementById("save-changes-btn").addEventListener("click", function() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    var enabledItems = [];
    checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
            enabledItems.push(checkbox.id.replace("enable-", ""));
        }
    });

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "save_changes.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("enabled_items=" + enabledItems.join(","));

    xhr.onload = function() {
        if (xhr.status === 200) {
            location.reload();
        } else {
            console.error("Error saving changes: " + xhr.statusText);
        }
    };
});