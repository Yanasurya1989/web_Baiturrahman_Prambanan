document.getElementById("about").onclick = function () {
    // alert("hallo");
    document.getElementById("tab-1").style.backgroundColor = "red";
    // document.getElementById("aboutTitle").innerHTML = "Tentang Kita";
    // document.getElementById("aboutContent").innerHTML =
    //     "Tuliskan cerita singkat tentang profil lembaga";
};

document.getElementById("vission").onclick = function () {
    document.getElementById("vissionTitle").innerHTML = "Visi Lembaga Kita";
    document.getElementById("vissionContent").innerHTML =
        "Visi Lembaga Tuliskan dihalaman ini";
};
document.getElementById("mission").onclick = function () {
    document.getElementById("missionTitle").innerHTML = "Misi Lembaga Kita";
    document.getElementById("missionContent").innerHTML =
        "Misi Lembaga Tuliskan dihalaman ini secara singkat untuk lengkapnya nanti bisa ditambahkan dihalaman detil";
};
