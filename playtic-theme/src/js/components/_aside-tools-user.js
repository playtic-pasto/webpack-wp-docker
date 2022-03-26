const asideToolsPlaytic = () => {
  const contentAsideTools = document.querySelector('.content-aside') ;
  if( contentAsideTools ) {
    const btnAsideToolsToogle = contentAsideTools.querySelector('#btn-aside-tools-toogle');
    const rowBodyAsideTools = contentAsideTools.querySelector('.row-body-aside-tools');

    if( btnAsideToolsToogle ) {
      
      btnAsideToolsToogle.addEventListener( 'click', () => {
        btnAsideToolsToogle.classList.toggle('bx-minus-circle');
        btnAsideToolsToogle.classList.toggle('bx-plus-circle');
        rowBodyAsideTools.classList.toggle('animate__fadeInRight');
        rowBodyAsideTools.classList.toggle('animate__fadeOutRight');        
        rowBodyAsideTools.classList.toggle('active');
        if( !rowBodyAsideTools.classList.contains('active') ) {
          setTimeout(() => {
            rowBodyAsideTools.classList.toggle('d-none');
          }, 500);
        }
        else{
          rowBodyAsideTools.classList.toggle('d-none');
        }
      });

    }
  }
  
};

export { 
  asideToolsPlaytic
};