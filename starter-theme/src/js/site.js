import './../scss/style.scss';

import './navigation';

function theme_mode() {
  const env_mode = document.querySelector('body').classList.contains('developmet-mode') ? 'developmet-mode' : 'production-mode';
  return env_mode;
}
window.onload = function () {
  theme_mode();
};

