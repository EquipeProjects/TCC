let count = 1;
document.getElementById("radio1").checked = true;

setInterval(function () {
     nextImage
}, 2000)


function nextImage() {
    count++
    if (count > 4) {
        count = 1;
    }

    document.getElementById("radio"+count).checked = true;

}
const carrossel = document.querySelector('.carrossel');
const slides = carrossel.querySelector('ul');
const slideWidth = carrossel.offsetWidth;
const acaoAnterior = carrossel.querySelector('.acao-anterior');
const acaoProxima = carrossel.querySelector('.acao-proxima');
let posicaoAtual = 0;

acaoAnterior.addEventListener('click', () => {
  posicaoAtual = Math.max(posicaoAtual - slideWidth, -slideWidth * (slides.children.length - 1));
  slides.style.left = `${posicaoAtual}px`;
});

acaoProxima.addEventListener('click', () => {
  posicaoAtual = Math.min(posicaoAtual + slideWidth, 0);
  slides.style.left = `${posicaoAtual}px`;
});
