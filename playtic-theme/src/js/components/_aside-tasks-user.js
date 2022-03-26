var moment = require('moment');
moment.locale('es');

// Compromando si existen Task 
const checkTaskListUser = () => {
  
  let arrayTaskLocal  = [];
  // comprobrar LocalStorage 
  let arrayLocalTaskListUser = localStorage.getItem( 'playticUserTask' );
  if( arrayLocalTaskListUser  ) {
    
    // Obtener y leer el ArrayLocalStorage
    arrayTaskLocal =  JSON.parse( localStorage.getItem( 'playticUserTask' ) );
    console.log('si existe' , arrayTaskLocal);
    showTaskListUser( arrayTaskLocal );
    return  arrayTaskLocal;
  }
  else {
    console.log('No existe' , arrayLocalTaskListUser );
    return arrayTaskLocal;
  }
};

// Agregar una Nueva Nota
const addLocalTaskUser = () => {
  const formAddTaskUser = document.querySelector('#playtic-form-task-aside');
  if( formAddTaskUser) {
    formAddTaskUser.addEventListener('submit', (event) => {
      let arrayTaskLocal = checkTaskListUser();
      event.preventDefault();
      const msgTaksTextarea = formAddTaskUser.querySelector('#task-textarea-msg');
      
      let msgTask =  msgTaksTextarea.value;
      let idTask = Date.now();
      let nowTask = moment().format('x');
      //'timeTaskHuman': 'Hace ' + moment.duration( humantime, 'seconds').humanize(),
      arrayTaskLocal.unshift ( {
        'idTask' : idTask,
        'msgTask': msgTask,
        'timeTask': nowTask,
        'completedTask': false
      });
      localStorage.setItem( 'playticUserTask', JSON.stringify(  arrayTaskLocal ) ); 
      formAddTaskUser.reset();
      showTaskListUser( arrayTaskLocal );
    });
  }
};

// Mostramos las Task guardadas por el usuario
const showTaskListUser  = ( arrayListTask ) => {
  const noTaskMsg = document.querySelector('.no-task-msg');
  const colTaskList = document.querySelector('.col-task-list');
  if( typeof( arrayListTask) == 'undefined' ) { arrayListTask = checkTaskListUser(); }

  if( arrayListTask && ( arrayListTask.length > 0 ) ) {
    noTaskMsg.classList.add('d-none');
    colTaskList.classList.remove('d-none');
    const ulListTaskUser = document.querySelector('.list-task-saved');
    if ( ulListTaskUser ) {
      ulListTaskUser.innerHTML = '';
      arrayListTask.forEach( (task , index ) => {
        let itemList = document.createElement('li'); 
        let classInItemList = task.completedTask == true ? 'completed' : 'built';
        itemList.classList.add( 'item-list' , classInItemList ,'item-list-'+ index, 'item-list-' + task.idTask );
        itemList.dataset.itemIdTask = task.idTask;

        // div of Task
        let divTask = document.createElement('div');
        divTask.classList.add('task');

        let p1_contentTask = document.createElement('p');
        p1_contentTask.innerHTML = task.msgTask;

        let p2_timerTask = document.createElement('p');
        let span_timerTask = document.createElement('span');

        // var of timer in the show Humanize.
        let timeToShow = moment().format('x');
        
        var a = moment( parseInt(timeToShow ) );
        var b = moment( parseInt( task.timeTask) );
        let result =  ( a.diff(b, 'seconds') );
        
        let timeTaskHuman =  'Hace ' + moment.duration( result, 'seconds').humanize() ;
        span_timerTask.innerHTML = timeTaskHuman;
        p2_timerTask.appendChild(span_timerTask );

        divTask.appendChild( p1_contentTask );
        divTask.appendChild( p2_timerTask );

        // Div of Task Buttons 
        let divTaskUser = document.createElement('div');
        divTaskUser.classList.add('task-user');
        // Image
        let imageUser = document.createElement('img');
        imageUser.setAttribute('src', 'https://picsum.photos/60/60' );
        imageUser.setAttribute('alt', 'User Picture' );
        
        // Button Completed
        let btnCompletedUser = document.createElement('button');
        btnCompletedUser.classList.add('btn-completed-task');
        btnCompletedUser.setAttribute('title', 'Completar nota' );
        if( task.completedTask  == true ) {
          btnCompletedUser.classList.add('disabled');
          btnCompletedUser.toggleAttribute('disabled', true);
          btnCompletedUser.setAttribute('title', 'Nota completada' );
        }
        

        btnCompletedUser.dataset.idTask = task.idTask;
        btnCompletedUser.dataset.indexTask = index;

        let iconCompleted = document.createElement('i');
        iconCompleted.classList.add('bx','bxs-check-circle');
        btnCompletedUser.appendChild( iconCompleted);

        // Button Deleted
        let btnDeleteddUser = document.createElement('button');
        btnDeleteddUser.classList.add('btn-delete-task');
        btnDeleteddUser.setAttribute('title', 'Eliminar nota' );
        btnDeleteddUser.dataset.idTask = task.idTask;
        btnDeleteddUser.dataset.indexTask = index;

        let iconDeleted = document.createElement('i');
        iconDeleted.classList.add('bx','bxs-trash');
        btnDeleteddUser.appendChild( iconDeleted);

        divTaskUser.appendChild( imageUser );
        divTaskUser.appendChild( btnCompletedUser );
        divTaskUser.appendChild( btnDeleteddUser );

        // Add item for List
        itemList.appendChild( divTask );
        itemList.appendChild( divTaskUser );
        ulListTaskUser.appendChild( itemList );
      });
    }
    deleteTaskUser();
    compeltedTaskUser();
  }
  else {
    if(  noTaskMsg ){
      noTaskMsg.classList.remove('d-none');
      colTaskList.classList.add('d-none');
    }
  }
  /*
  <li class="item-list">
    <div class="task">
      <p>Lorem ipsum dolor sit, amet consectetur ael tempore tempora officiis cupiditate aspernatur modi nam cum rem. Voluptatem, unde!</p>
      <p><span>25 Junio del 2028</span></p>
    </div>
    <div class="task-user">
      <img src="https://picsum.photos/100/100" alt="User Picture">
      <button class="btn-completed-task" title="Completar nota"><i class='bx bxs-check-circle' ></i></button>
      <button class="btn-delete-task" title="Eliminar nota"><i class='bx bxs-trash'></i></button>
    </div>
  </li>
  */
};

// Eliminar la task. 
const deleteTaskUser = () => {
  let btnsDeleteTaskUser = document.querySelectorAll('.btn-delete-task');
  if( btnsDeleteTaskUser ) {
    btnsDeleteTaskUser.forEach( buttonDelete  => {
      buttonDelete.addEventListener('click', ( event ) => {
        event.preventDefault();
        event.stopPropagation();
        let newArrayTaskLocal = [];
        let arrayTaskLocal = checkTaskListUser();
        let idTaskToDeleted = buttonDelete.dataset.idTask;
        // recorrer los Task y eliminar la coincidencia 
        arrayTaskLocal.forEach( ( taskInLocal )  => {
          if(  parseInt( idTaskToDeleted )  !=  parseInt( taskInLocal.idTask ) ) {
            newArrayTaskLocal.push( taskInLocal );
          } 
        });
        const listElement = document.querySelector('.item-list-'+idTaskToDeleted);
        listElement.classList.add('animate__animated', 'animate__zoomOut');
        localStorage.setItem( 'playticUserTask', JSON.stringify(  newArrayTaskLocal ) ); 
        setTimeout(() => {
          showTaskListUser( newArrayTaskLocal );
        }, 700);
      });
    });
  }
};

// Completed Task 
const compeltedTaskUser = () => {
  let btnsCompletedTaskUser = document.querySelectorAll('.btn-completed-task');
  if( btnsCompletedTaskUser ) {
    btnsCompletedTaskUser.forEach( buttonCompleted  => {
      buttonCompleted.addEventListener('click', ( event ) => {
        event.preventDefault();
        event.stopPropagation();
        let arrayTaskLocal = checkTaskListUser();
        let idTaskToCompleted = buttonCompleted.dataset.idTask;
        // recorrer los Task y eliminar la coincidencia 
        arrayTaskLocal.forEach( ( taskInLocal )  => {
          if(  parseInt( idTaskToCompleted )  ==  parseInt( taskInLocal.idTask ) ) {
            taskInLocal.completedTask = true;
          } 
        });
        const listElement = document.querySelector('.item-list-'+idTaskToCompleted);
        listElement.classList.add('animate__animated', 'animate__shakeY');
        localStorage.setItem( 'playticUserTask', JSON.stringify(  arrayTaskLocal ) ); 
        setTimeout(() => {
          showTaskListUser( arrayTaskLocal );
        }, 700);
      });
    });
  }
};

const asideTaskUser  = () => {
  showTaskListUser();
  addLocalTaskUser();
};

export { 
  asideTaskUser
};