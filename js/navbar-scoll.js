document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('#header');
  
    window.addEventListener('scroll', () => {
      if (window.scrollY > 50) {
        header.classList.remove('transparent');
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
        header.classList.add('transparent');
      }
    });
  
    if (window.scrollY <= 50) {
      header.classList.add('transparent');
    }
  });
  