function initNavToggle() {
    const toggleButton = document.getElementById("nav-toggle");
    const navigation = document.getElementById("primary-navigation");

    if (!toggleButton || !navigation) return;

    toggleButton.addEventListener("click", function () {
        const isExpanded = toggleButton.getAttribute("aria-expanded") === "true";
        toggleButton.setAttribute("aria-expanded", String(!isExpanded));
        toggleButton.setAttribute(
            "aria-label",
            isExpanded ? "Buka menu navigasi" : "Tutup menu navigasi"
        );
        navigation.classList.toggle("nav-open", !isExpanded);
    });

    navigation.addEventListener("click", function (event) {
        if (!event.target.closest("a")) return;
        navigation.classList.remove("nav-open");
        toggleButton.setAttribute("aria-expanded", "false");
        toggleButton.setAttribute("aria-label", "Buka menu navigasi");
    });
}

function initTableSearch() {
    document.querySelectorAll("[data-search-table]").forEach(function (input) {
        const table = document.getElementById(input.dataset.searchTable);
        if (!table) return;

        const rows = Array.from(table.querySelectorAll("tbody [data-search-row]"));
        const status = document.querySelector(
            '[data-search-status="' + input.dataset.searchTable + '"]'
        );
        const emptyResult = table.querySelector("[data-search-empty]");

        function filterRows() {
            const query = input.value.trim().toLocaleLowerCase("id");
            let visibleCount = 0;

            rows.forEach(function (row) {
                const searchableText = Array.from(
                    row.querySelectorAll("[data-searchable]")
                )
                    .map(function (cell) {
                        return cell.textContent;
                    })
                    .join(" ")
                    .toLocaleLowerCase("id");
                const matches = searchableText.includes(query);

                row.hidden = !matches;
                if (matches) visibleCount += 1;
            });

            if (emptyResult) emptyResult.hidden = visibleCount > 0;

            if (status) {
                status.textContent = query
                    ? visibleCount + " dari " + rows.length + " barang ditemukan."
                    : "Menampilkan " + rows.length + " barang.";
            }
        }

        input.addEventListener("input", filterRows);
        filterRows();
    });
}

document.addEventListener("DOMContentLoaded", function () {
    initNavToggle();
    initTableSearch();
});
