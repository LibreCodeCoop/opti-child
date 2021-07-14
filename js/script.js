
const a = document.querySelectorAll('.wp-block-latest-posts__list:first-child li a');
const li = document.querySelectorAll('.wp-block-latest-posts__list:nth-child(2) li');

a.forEach((elementLi, index) => {  

  elementLi.removeAttribute("href");
  elementLi.addEventListener("click", (evt, cityName) => {

    var i;

    // Get all 'li' elements and hide them 
    for (i = 0; i < li.length; i++) {
      li[i].style.display = "none";
    }

    // Get all 'a' elements and remove the class "active"
    for (i = 0; i < a.length; i++) {
        a[i].className = a[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the element that opened the tab
    li[index].style.display = "block";
    evt.currentTarget.className += " active";
  });
});


const h3 = document.querySelectorAll('.wp-block-group__inner-container h3');

const togle = (el) => {
    el.style.display.length === 0
      ? (el.style.display = "block")
      : (el.style.display = "");
};

/**
 * Altera o elemento chamando o toggle para alterar entre exibir e esconder o elemento
 */
h3.forEach((element) => {
  element.addEventListener("click", (event) => {
    for (let i = 0; i < element.parentNode.children.length; i++) {
      element.parentNode.children[i].tagName !== "H3" ? togle(element.parentNode.children[i]) : 0;
    }
  });
});
