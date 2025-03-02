const list = document.querySelectorAll(".list");
function activeLink() {
    list.forEach((item) => item.classList.remove("active"));
    this.classList.add("active");
}
list.forEach((item) => item.addEventListener("click", activeLink));

// =====================================//
document.querySelectorAll(".nav-item > .nav-link").forEach((link) => {
    link.addEventListener("click", function (e) {
        const submenu = this.nextElementSibling;
        if (submenu && submenu.classList.contains("submenu")) {
            e.preventDefault();
            submenu.classList.toggle("show");
        }
    });
});
// =====================================//

const mobileMenu = document.getElementById("mobileMenu");
const menuOverlay = document.querySelector(".menu-overlay");

// Bắt sự kiện khi menu được mở hoặc đóng
mobileMenu.addEventListener("shown.bs.collapse", () => {
    menuOverlay.classList.add("show");
    document.body.style.overflow = "hidden";
});

mobileMenu.addEventListener("hidden.bs.collapse", () => {
    menuOverlay.classList.remove("show");
    document.body.style.overflow = "";
});

menuOverlay.addEventListener("click", () => {
    const menuCollapse = new bootstrap.Collapse(mobileMenu, {
        toggle: true,
    });
});

// =====================================//
