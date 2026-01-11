// konfirmasi hapus
function hapus(){
  return confirm("Yakin ingin menghapus produk?");
}

// search realtime
document.addEventListener("DOMContentLoaded", function(){
  const searchInput = document.getElementById("search");
  if(!searchInput) return;

  searchInput.addEventListener("keyup", function(){
    const keyword = this.value;

    const xhr = new XMLHttpRequest();
    xhr.open("GET", "search.php?keyword=" + encodeURIComponent(keyword), true);
    xhr.onload = function(){
      document.getElementById("result").innerHTML = this.responseText;
    };
    xhr.send();
  });
});
