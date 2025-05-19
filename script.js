document.addEventListener("DOMContentLoaded", () => {
    const heading = document.querySelector('.fade-in-up');

    // หลังจากที่โหลดหน้าเสร็จให้เพิ่ม class ที่ทำให้เห็น
    setTimeout(() => {
        heading.style.opacity = '1'; // เปลี่ยนความโปร่งใสเป็น 1
        heading.style.transform = 'translateY(0)'; // เปลี่ยนตำแหน่งกลับมา
    }, 100); // ใช้เวลาหน่วงก่อนเริ่ม fade in
});

/// FADE IN UP ANIMATIONS 
// ฟังก์ชันเพื่อเช็คว่า h1 เข้ามาใน viewport แล้วหรือยัง
function isElementInViewport(el) {
    const rect = el.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

// ฟังก์ชันเพื่อเพิ่มคลาส visible เมื่อ h1 เข้ามาใน viewport
function onScroll() {
    const h1 = document.querySelector('h1');
    if (isElementInViewport(h1)) {
        h1.classList.add('visible');
    }
}

// เพิ่ม event listener เพื่อฟังการเลื่อนของเมาส์
window.addEventListener('scroll', onScroll);


// IMAGE SLIDER ON HOME PAGE
let list = document.querySelector('.slider .list');
let items = document.querySelectorAll('.slider .list .item');
let dots = document.querySelectorAll('.slider .dots li');
let prev = document.getElementById('prev');
let next = document.getElementById('next');

let active = 0;
let lengthitems = items.length - 1;

next.onclick = function() {
    if (active + 1 > lengthitems) {
        active = 0;
    } else {
        active = active + 1;
    }
    reloadslider();
}

prev.onclick = function() {
    if (active - 1 < 0) {
        active = lengthitems;
    } else {
        active = active - 1;
    }
    reloadslider();
}

let autoslide = setInterval(() => { next.click(); }, 3000);

function reloadslider() {
    let checkleft = items[active].offsetLeft;
    list.style.left = -checkleft + 'px';

    let lastactiveDot = document.querySelector('.slider .dots li.active');
    if (lastactiveDot) lastactiveDot.classList.remove('active');
    dots[active].classList.add('active');
}

dots.forEach((li, key) => {
    li.addEventListener('click', function() {
        active = key;
        reloadslider();
    })
})

///////////////////////////////////////
