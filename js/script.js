// Insere foto após nome do professor em página Docentes. 
// Remove link de nome de professores
const featuredImage = document.querySelectorAll('#post-989 .wp-block-latest-posts__featured-image');
const arrowSVG = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 26"><path d="M13,15.405l8.764-8.584c0.392-0.383,1.019-0.38,1.406,0.008l1.536,1.536c0.391,0.391,0.39,1.026-0.002,1.417L13.707,20.707 C13.512,20.902,13.256,21,13,21c-0.256,0-0.512-0.098-0.707-0.293L1.296,9.782c-0.393-0.39-0.394-1.025-0.002-1.417L2.83,6.829 c0.387-0.387,1.015-0.391,1.406-0.008L13,15.405z"/></svg>';

featuredImage.forEach((element) => {

  var postTitle = element.nextSibling;

  postTitle.removeAttribute("href");

  postTitle.textContent += ' v';

  postTitle.parentNode.insertBefore(postTitle, element);
});


// Adiciona ação em clique de lista de posts para exibir conteúdo dos respectivos posts na página Apresentação
const a = document.querySelectorAll('#post-5 .wp-block-latest-posts__list:first-child li a');
const li = document.querySelectorAll('#post-5 .wp-block-latest-posts__list:nth-child(2) > li');

a.forEach((elementLi, index) => {  

  elementLi.removeAttribute("href");
  elementLi.addEventListener("click", (evt) => {

    var i;

    // Pega todos os elementos da lista e os esconde
    for (i = 0; i < li.length; i++) {
      li[i].style.display = "none";
    }

    // Altere a cor dos links para a cor padrão de link
    for (i = 0; i < a.length; i++) {
        a[i].className = a[i].style.color = '#237992'
    }

    // Exibe a guia atual e altera a cor do link que abriu a guia para a cor de link ativo
    li[index].style.display = "block";
    evt.currentTarget.style.color = '#f48634';
  });
});


// Cria dropdown para o conteúdo de listas na página Apresentação
const h3 = document.querySelectorAll('#post-5 .wp-block-group__inner-container h3, #post-989 .wp-block-latest-posts__list li a');

const togle = (el) => {
    el.style.display.length === 0
      ? (el.style.display = "block")
      : (el.style.display = "");
};

h3.forEach((element) => {
  element.addEventListener("click", (event) => {
    for (let i = 0; i < element.parentNode.children.length; i++) {
      element.parentNode.children[i].tagName !== "H3" ? togle(element.parentNode.children[i]) : 0;
    }
  });
});
