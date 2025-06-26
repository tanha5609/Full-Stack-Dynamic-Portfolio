const menu = document.querySelector('.menu').children;
for (let i = 0; i < menu.length; i++) {
    menu[i].addEventListener('click', function(event) {
        console.log(event.target.innerText);
    });
}
btn= document.getElementById('aboutBtn');
btn.addEventListener('click', function() {
    inf= document.getElementById('info');
    inf.innerText='huddai';
    console.log('Button clicked');
});
let ctn = document.getElementById('ctn');
ctn.addEventListener('click', function() {
    pp = document.getElementById('pp');
    pp.src = "https://img-s-msn-com.akamaized.net/tenant/amp/entityid/AA1GXnGi.img?w=800&h=435&q=60&m=2&f=jpg' alt='Image";
});