function executeQuery() {
    let query = document.getElementById("sqlQuery").value;
    
    fetch('execute.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'query=' + encodeURIComponent(query)
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById("result").innerHTML = data;
    })
    .catch(error => console.error('Error:', error));
}


document.addEventListener("DOMContentLoaded", function () {
    const toggleSwitch = document.getElementById("modeToggle");
    const body = document.body;

    // Check if the user already set a mode
    if (localStorage.getItem("mode") === "dark") {
        enableDarkMode();
        toggleSwitch.checked = true;
    }

    toggleSwitch.addEventListener("change", function () {
        if (this.checked) {
            enableDarkMode();
        } else {
            disableDarkMode();
        }
    });

    function enableDarkMode() {
        body.classList.add("dark-mode");
        localStorage.setItem("mode", "dark");
    }

    function disableDarkMode() {
        body.classList.remove("dark-mode");
        localStorage.setItem("mode", "light");
    }
});
