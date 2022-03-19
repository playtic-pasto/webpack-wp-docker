console.log('Ready for Menu Primary');
/* Se revisa las acciones para el Menu */

const activateSidebarPlaytic = ( event, element ) => {
  event.preventDefault();
  element.classList.toggle('active');
};

const navigationPlaytic = () => {
  let btnMenuPrimary = document.querySelector('#btn-primary-menu');
  let btnSearchForm = document.querySelector('.btn-search-form');
  let sidebarPlaytic = document.querySelector('.sidebar-playtic');
  let contentMainPlaytic = document.querySelector('#site-main-content');
  let searchFormInput = document.querySelector('#searchFormInput');

  

  if ( btnMenuPrimary ) {
    btnMenuPrimary.addEventListener('click', ( event ) => {
      activateSidebarPlaytic( event, sidebarPlaytic );
      contentMainPlaytic.classList.toggle('show-menu-primary');
      if( !sidebarPlaytic.classList.contains('active') ) {
        btnMenuPrimary.classList.remove('bx-menu-alt-left');
        btnMenuPrimary.classList.add('bx-x');
      }
      else {
        btnMenuPrimary.classList.remove('bx-x');
        btnMenuPrimary.classList.add('bx-menu-alt-left');
      }
      

    });
  }
  if ( btnSearchForm ) {
    btnSearchForm.addEventListener('click', ( event ) => {
      if( sidebarPlaytic.classList.contains('active') ) {
        activateSidebarPlaytic( event, sidebarPlaytic  );
        contentMainPlaytic.classList.toggle('show-menu-primary');
        searchFormInput.focus();
      }
      else {
        event.preventDefault();
        console.log('Se realizara la busqueda');
        setTimeout(() => {
          alert('se realziara la busqueda');
        }, 1000);
      }
    });
  }
};


export { 
  navigationPlaytic
};