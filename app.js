function filterByUsername() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("username-filter");
    filter = input.value.toUpperCase();
    table = document.getElementById("players-table");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows and hide those that don't match the filter
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[3]; // Assuming the username is in the fourth column (index 3)
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
