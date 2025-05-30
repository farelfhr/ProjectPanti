// Dummy image URLs
const images = [
  '/images/PantiStock/1.jpg',
  '/images/PantiStock/2.jpg',
  '/images/PantiStock/3.jpg',
  '/images/PantiStock/4.jpg',
  '/images/PantiStock/5.jpg',
  '/images/PantiStock/6.webp',
  '/images/PantiStock/7.jpg',
];

document.addEventListener('DOMContentLoaded', function () {
  const blocks = document.querySelectorAll('.goodness-block');
  const photo = document.getElementById('goodness-photo');
  let lastActive = 0;
  let ticking = false;

  function setActive(idx) {
    blocks.forEach((block, i) => {
      block.classList.remove('opacity-100', 'opacity-60', 'opacity-40', 'bg-white');
      if (i === idx) {
        block.classList.add('opacity-100', 'bg-white');
      } else if (i < idx) {
        block.classList.add('opacity-60');
      } else {
        block.classList.add('opacity-40');
      }
    });
    if (images[idx] && photo.src !== location.origin + images[idx]) {
      photo.style.opacity = 0;
      setTimeout(() => {
        photo.src = images[idx];
        photo.onload = () => {
          photo.style.opacity = 1;
        };
      }, 150);
    }
    lastActive = idx;
  }

  function getActiveBlockByScroll() {
    let minDist = Infinity;
    let activeIdx = 0;
    const viewportH = window.innerHeight;
    blocks.forEach((block, i) => {
      const rect = block.getBoundingClientRect();
      const dist = Math.abs(rect.top + rect.height / 2 - viewportH / 2);
      if (dist < minDist) {
        minDist = dist;
        activeIdx = i;
      }
    });
    setActive(activeIdx);
  }

  window.addEventListener('scroll', () => {
    if (!ticking) {
      window.requestAnimationFrame(() => {
        getActiveBlockByScroll();
        ticking = false;
      });
      ticking = true;
    }
  });

  // Initial highlight
  setActive(0);
}); 