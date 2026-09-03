// const canvas = document.getElementById("canvas");
// const ctx = canvas.getContext("2d");

// let w = canvas.width = window.innerWidth;
// let h = canvas.height = window.innerHeight;

// const stars = Array.from({ length: 200 }, () => ({
//     x: Math.random() * w,
//     y: Math.random() * h,
//     size: Math.random() * 2,
//     brightness: 0
// }));

// let mouse = { x: w / 2, y: h / 2 };
// const followers = [{ x: w / 2, y: h / 2 }, { x: w / 2, y: h / 2 }];

// window.addEventListener('resize', () => {
//     w = canvas.width = window.innerWidth;
//     h = canvas.height = window.innerHeight;
// });

// canvas.addEventListener("pointermove", (e) => {
//     mouse.x = e.clientX;
//     mouse.y = e.clientY;
// });

// function anim() {
//     ctx.fillStyle = "rgba(0, 0, 0, 0.1)";
//     ctx.fillRect(0, 0, w, h);

//     // Teken sterren en pas helderheid aan rond cursor
//     stars.forEach(star => {
//         const dist = Math.hypot(star.x - mouse.x, star.y - mouse.y);
//         star.brightness = dist < 100 ? 1 - dist / 100 : 0;

//         ctx.fillStyle = `rgba(255, 255, 255, ${0.2 + star.brightness * 0.8})`;
//         ctx.beginPath();
//         ctx.arc(star.x, star.y, star.size, 0, Math.PI * 2);
//         ctx.fill();
//     });

//     // Verplaats de volgers naar de cursor en teken ze
//     followers.forEach((follower, i) => {
//         follower.x += (mouse.x - follower.x) * (0.05 + i * 0.02);
//         follower.y += (mouse.y - follower.y) * (0.05 + i * 0.02);

//         ctx.fillStyle = "white";
//         ctx.beginPath();
//         ctx.arc(follower.x, follower.y, 10, 0, Math.PI * 2);
//         ctx.fill();
//     });

//     requestAnimationFrame(anim);
// }
// requestAnimationFrame(anim);



// // let menu = document.querySelector('#menu-icon');
// // let navlist = document.querySelector('.navlist');

// // menu.onclick = () => {
// //     menu.classList.toggle('bx-x');
// //     navlist.classList.toggle('open');
// // };
