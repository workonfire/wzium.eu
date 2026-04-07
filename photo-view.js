const items = Array.from(document.querySelectorAll('.photo-item img'));

let currentIndex = 0;

const viewer = document.createElement('div');
viewer.id = 'photo-viewer';
viewer.innerHTML = `
  <button class="pv-close">×</button>
  <button class="pv-prev">‹</button>
  <img class="pv-image">
  <button class="pv-next">›</button>
  <a class="pv-download" download>Pobierz</a>
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
    const src = items[currentIndex].src;

    img.src = src;
    downloadBtn.href = src;

    viewer.classList.add('open');
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