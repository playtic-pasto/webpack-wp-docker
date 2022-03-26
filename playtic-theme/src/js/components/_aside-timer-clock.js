var moment = require('moment');
moment.locale('es');

const updateTimeNow =  element  => {
  let now =  moment();
  let timerRedeable = now.format('hh:mm:ss A');
  element.innerHTML = timerRedeable;
};
const asideTimerClock = () => {
  const clockTimerAside = document.querySelectorAll('.clock-timer-aside');
  if( clockTimerAside ) {
    clockTimerAside.forEach( timerElement  => {
      updateTimeNow( timerElement );
      setInterval( () => {
        updateTimeNow( timerElement );
      } , 1000);
    });
    
  }
};

// Documentation as above
function getISOWeekDates2( isnow = moment(),  isoWeekNum = 1, year = new Date().getFullYear() ) {
  let d = moment( String(year).padStart(4, '0') + 'W' +
                  String(isoWeekNum).padStart(2,'0'));
  for (var dates=[], i=0; i < 7; i++) {
    let isDayActive = d.format('DD-MM-YYYY') == isnow.format('DD-MM-YYYY')  ? true : false;
    dates.push( {
      'ourMoment': d,
      'ourDateLarge': d.format('DD-MM-YYYY'),
      'ourDayNumber': d.format('D'),
      'ourDayOfWeek': d.format('E'),
      'ourDayShort': d.format('ddd'),
      'ourMillisecond' : d.format('x'),
      isDayActive,
    });
    d.add(1, 'day');
  }
  return dates;
}

const weekDayList = () => {
  let now =  moment();
  let weekNumber = moment ( now ).week();
  let isyearNow = now.year();
  let daysOfweekCalendar = getISOWeekDates2 ( now, weekNumber, isyearNow );

  const infoMonthYear = document.querySelector('.info-month-year');
  if( infoMonthYear ) {
    const nowMonth = infoMonthYear.querySelector('.month');
    const nowYear = infoMonthYear.querySelector('.year');
    infoMonthYear.dataset.yearNow = now.format('YYYY');
    nowMonth.innerHTML =  now.format('MMMM');
    nowYear.innerHTML =  now.format('YYYY');
  }

  // Create Week of month and Show
  const listDaysofweek = document.querySelector('.listDaysofweek');
  if( listDaysofweek ) {
    listDaysofweek.innerHTML = '';
    if( daysOfweekCalendar ) {
      daysOfweekCalendar.forEach( dayInWeek => {
        // create li item
        let newItemDate = document.createElement('li');
        newItemDate.setAttribute('title', dayInWeek.ourDateLarge ); 
        newItemDate.classList.add('itemDay');
        if( dayInWeek.isDayActive  ) {
          newItemDate.classList.add('active');
        }
        // create p and add to li
        let elementNumberDay = document.createElement('p');
        elementNumberDay.classList.add('numberDay');
        elementNumberDay.innerHTML = dayInWeek.ourDayNumber;

        // create span and add to li
        let elementTextDay = document.createElement('span');
        elementTextDay.classList.add('textDay');
        elementTextDay.innerHTML = dayInWeek.ourDayShort;

        newItemDate.appendChild( elementNumberDay );
        newItemDate.appendChild( elementTextDay );
        // Add to LI
        listDaysofweek.appendChild( newItemDate );
      });
    }
    /*
      <li class="itemDay">
        <p class="numberDay">-</p>
        <span class="textDay">-</span>
      </li>
    */
  }
};

export { 
  asideTimerClock,
  weekDayList
};