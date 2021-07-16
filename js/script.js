// Insere foto após nome do professor em página Docentes. 
// Remove link de nome de professores
const featuredImage = document.querySelectorAll('#post-989 .wp-block-latest-posts__featured-image');

featuredImage.forEach((element) => {
  var postTitle = element.nextSibling;
  postTitle.removeAttribute("href");
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
