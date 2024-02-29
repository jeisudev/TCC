
var menu = document.getElementById("menu");

window.addEventListener("scroll", function () {
  if (window.pageYOffset > (window.innerHeight * 0.1)) {
    menu.classList.add("hide-menu");
  } else {
    menu.classList.remove("hide-menu");
  }
});

// Verificar a posição inicial da janela e ocultar o menu, se necessário
if (window.pageYOffset > (window.innerHeight * 0.01)) {
  menu.classList.add("hide-menu");
}

menu.addEventListener("mouseenter", function () {
  menu.classList.remove("hide-menu");
});

menu.addEventListener("mouseleave", function () {
  if (window.pageYOffset > (window.innerHeight * 0.01)) {
    menu.classList.add("hide-menu");
  }
});
window.addEventListener("scroll", function () {
  if (window.pageYOffset > (window.innerHeight * 0.01)) { /* 10vh corresponde a 10% da altura da janela de visualização */
    menu.classList.add("dark");
  } else {
    menu.classList.remove("dark");
  }
});

var stars = document.querySelectorAll('.star-icon');

document.addEventListener('DOMContentLoaded', function () {
  var stars = document.querySelectorAll('.star-icon');

  stars.forEach(function (star) {
    star.addEventListener('click', function () {
      stars.forEach(function (sibling) {
        sibling.classList.remove('ativo');
      });
      this.classList.add('ativo');
      console.log(this.getAttribute('data-avaliacao'));
    });
  });
});

// Obtém os elementos checkboxes e a div

const sidebar = document.querySelector('.menu-lateral');
const footer = document.querySelector('.rodape');

function atualizarPosicaoMenu() {
  const alturaMenu = sidebar.offsetHeight;
  const topoRodape = footer.getBoundingClientRect().top;

  if (topoRodape < alturaMenu) {
    const sobreposicao = alturaMenu - topoRodape;
    sidebar.style.transform = `translateY(-${sobreposicao}px)`;
  } else {
    sidebar.style.transform = 'none';
  }
}

// Chamada inicial para atualizarPosicaoMenu para definir a posição inicial correta
atualizarPosicaoMenu();

// Chame atualizarPosicaoMenu quando a janela for rolada
window.addEventListener('scroll', atualizarPosicaoMenu);

document.addEventListener("DOMContentLoaded", () => {
  const openCartButton = document.querySelector(".open-cart-button");
  const closeCartButton = document.querySelector(".close-cart-button");
  const cartSidebar = document.querySelector(".cart-sidebar");

  openCartButton.addEventListener("click", () => {
    cartSidebar.classList.add("open");
  });

  closeCartButton.addEventListener("click", () => {
    cartSidebar.classList.remove("open");
  });
});

function clickMenu() {
  var paragraphs = document.querySelectorAll('.menu-lateral p');
  
  for (var i = 0; i < paragraphs.length; i++) {
    if (paragraphs[i].style.display == "block") {
      paragraphs[i].style.display = "none";
    }else{
      paragraphs[i].style.display = "block";
    }
  }
}








