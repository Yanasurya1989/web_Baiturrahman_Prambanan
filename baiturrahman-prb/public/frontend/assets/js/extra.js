// const btnMenu = document.querySelector(".about .tab-class ul li a .tab-3");

// const contentArea = document.querySelector(
//   ".about .tab-class .tab-content #tab-2"
// );

// btnMenu.addEventListener("click", function () {
//   contentArea.classList.toggle("active");
// });

document.addEventListener("DOMContentLoaded", function () {
  const tabs = document.querySelectorAll(".tab");
  const tabContents = document.querySelectorAll(".tab-pane");

  tabs.forEach((tab) => {
    tab.addEventListener("click", function () {
      const target = this.getAttribute("id");

      tabContents.forEach((tc) => tc.classList.remove("active"));

      document.getElementById(target).classList.add("active");
    });
  });
});
