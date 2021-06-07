const container = document.querySelector('.container');

const tl = new TimelineMax();

tl.fromTo(container, 0.4, {opacity:"0" ,y:"-100%"}, {opacity:"1" ,y:"0%", ease: Power2.easeInOut});