import { navigationPlaytic } from  './layout/_header';
import { asideToolsPlaytic } from './components/_aside-tools-user';
import { asideTimerClock, weekDayList } from './components/_aside-timer-clock';
import { asideTaskUser } from './components/_aside-tasks-user';

function theme_mode() {
  return document.querySelector('body').classList.contains('developmet-mode') ? 'developmet-mode' : 'production-mode';
}

window.onload = function () {
  console.log('PlayTIC Ready');
  theme_mode();
  navigationPlaytic();
  asideToolsPlaytic();
  asideTimerClock();
  weekDayList();
  asideTaskUser();
};
