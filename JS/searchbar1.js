document.getElementById("searchInput").addEventListener("keyup", function() {
  const filter = this.value.toUpperCase();
  const table = document.getElementById("table");
  const tr = table.getElementsByTagName("tr");

  for (let i = 1; i < tr.length; i++) {
      const td = tr[i].getElementsByTagName("td");
      let isVisible = false;
      for (let j = 0; j < td.length; j++) {
          if (td[j] && td[j].textContent.toUpperCase().includes(filter)) {
              isVisible = true;
          }
      }
      tr[i].style.display = isVisible ? "" : "none";
  }
});