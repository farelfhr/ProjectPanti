document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.getElementById('partner-carousel');
    let scrollAmount = 0;
    let speed = 1; // px per frame

    function animate() {
        scrollAmount += speed;
        if (scrollAmount >= carousel.scrollWidth / 2) {
            scrollAmount = 0;
        }
        carousel.scrollLeft = scrollAmount;
        requestAnimationFrame(animate);
    }

    // Set carousel to scrollable horizontally
    carousel.style.overflowX = 'scroll';
    carousel.style.scrollBehavior = 'auto';
    carousel.scrollLeft = 0;

    animate();
}); 