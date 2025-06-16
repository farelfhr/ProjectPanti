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
  const scrollContainer = document.querySelector('#goodness-text-scroll-container');
  let lastActive = 0;
  let ticking = false;

  function setActive(idx) {
    blocks.forEach((block, i) => {
      block.classList.remove('opacity-100', 'opacity-60', 'opacity-40', 'bg-white', 'text-[#0D4715]', 'text-[#E9762B]');
      if (i === idx) {
        block.classList.add('opacity-100', 'bg-white');
        const title = block.querySelector('h3');
        const paragraph = block.querySelector('p');
        if (idx === 0 || idx === 2 || idx === 4) {
          title.classList.add('text-[#41644A]');
          paragraph.classList.add('text-[#0D4715]');
        } else if (idx === 1 || idx === 3) {
          title.classList.add('text-[#E9762B]');
          paragraph.classList.add('text-[#0D4715]');
        }
      } else if (i < idx) {
        block.classList.add('opacity-60');
        const title = block.querySelector('h3');
        const paragraph = block.querySelector('p');
        if (idx === 0 || idx === 2 || idx === 4) {
          title.classList.add('text-[#41644A]');
          paragraph.classList.add('text-[#0D4715]');
        } else if (idx === 1 || idx === 3) {
          title.classList.add('text-[#E9762B]');
          paragraph.classList.add('text-[#0D4715]');
        }
      } else {
        block.classList.add('opacity-40');
        const title = block.querySelector('h3');
        const paragraph = block.querySelector('p');
        if (idx === 0 || idx === 2 || idx === 4) {
          title.classList.add('text-[#41644A]');
          paragraph.classList.add('text-[#0D4715]');
        } else if (idx === 1 || idx === 3) {
          title.classList.add('text-[#E9762B]');
          paragraph.classList.add('text-[#0D4715]');
        }
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
    const viewportH = scrollContainer.clientHeight;
    blocks.forEach((block, i) => {
      const rect = block.getBoundingClientRect();
      const dist = Math.abs((rect.top - scrollContainer.getBoundingClientRect().top) + rect.height / 2 - viewportH / 2);
      if (dist < minDist) {
        minDist = dist;
        activeIdx = i;
      }
    });
    setActive(activeIdx);
  }

  scrollContainer.addEventListener('scroll', () => {
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