import { navigationPlaytic } from  './layout/_header';

function theme_mode() {
  return document.querySelector('body').classList.contains('developmet-mode') ? 'developmet-mode' : 'production-mode';
}

window.onload = function () {
  console.log('PlayTIC Ready');
  theme_mode();
  navigationPlaytic();
};
