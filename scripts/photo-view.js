const items = Array.from(document.querySelectorAll('.photo-item img'));

let currentIndex = 0;
let loadingTimer;

const viewer = document.createElement('div');
viewer.id = 'photo-viewer';
viewer.innerHTML = `
  <button class="pv-close">×</button>
  <button class="pv-prev">‹</button>
  <img class="pv-image">
  <button class="pv-next">›</button>
  <a class="pv-download" download>Download</a>
  <div class="pv-loading">
    <span></span>
  </div>
`;

document.body.appendChild(viewer);

const img = viewer.querySelector('.pv-image');
const closeBtn = viewer.querySelector('.pv-close');
const prevBtn = viewer.querySelector('.pv-prev');
const nextBtn = viewer.querySelector('.pv-next');
const downloadBtn = viewer.querySelector('.pv-download');

function show(index) {
    if (index < 0) index = items.length - 1;
    if (index >= items.length) index = 0;

    currentIndex = index;
    const src = items[currentIndex].dataset.full || items[currentIndex].src;

    clearTimeout(loadingTimer);

    viewer.classList.remove('loading', 'load-error');

    img.onload = () => {
        clearTimeout(loadingTimer);
        viewer.classList.remove('loading');
    };

    img.onerror = () => {
        clearTimeout(loadingTimer);
        viewer.classList.remove('loading');
        viewer.classList.add('load-error');
    };

    viewer.classList.add('open');

    loadingTimer = setTimeout(() => {
        if (!img.complete) {
            viewer.classList.add('loading');
        }
    }, 150);

    img.src = src;

    if (img.complete) {
        clearTimeout(loadingTimer);
        viewer.classList.remove('loading');
    }

    downloadBtn.href = src;
}

items.forEach((el, i) => {
    el.addEventListener('click', () => show(i));
});

closeBtn.addEventListener('click', () => {
    viewer.classList.remove('open');
});

prevBtn.addEventListener('click', () => show(currentIndex - 1));
nextBtn.addEventListener('click', () => show(currentIndex + 1));

document.addEventListener('keydown', e => {
    if (!viewer.classList.contains('open')) return;

    if (e.key === 'Escape') viewer.classList.remove('open');
    if (e.key === 'ArrowLeft') show(currentIndex - 1);
    if (e.key === 'ArrowRight') show(currentIndex + 1);
});
