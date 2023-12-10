// Import our custom CSS
import '../scss/styles.scss'



window.bootstrap = require('bootstrap');



import utils from './utils';
window.utils = utils;

import phoenix from './phoenix';
window.phoenix = phoenix;


import config from './config';
window.config = config;

import iconCopiedToast from './theme/icons';


window.docs = require('./docs');
window.SimpleBar = require('simplebar/dist/simplebar');
window.AnchorJS  = require('anchor-js/anchor');
window.phoenix.utils = utils;





const navbarStyle = window.config.config.phoenixNavbarTopStyle;
if (navbarStyle && navbarStyle !== 'transparent') {
    document.querySelector('body').classList.add(`navbar-${navbarStyle}`);
}


const phoenixIsRTL = window.config.config.phoenixIsRTL;

if (phoenixIsRTL) {
    const linkDefault = document.getElementById('style-default');
    const userLinkDefault = document.getElementById('user-style-default');
    linkDefault.setAttribute('disabled', true);
    userLinkDefault.setAttribute('disabled', true);
    document.querySelector('html').setAttribute('dir', 'rtl');
} else {
    // const linkRTL = document.getElementById('style-rtl');
    // const userLinkRTL = document.getElementById('user-style-rtl');
    // linkRTL.setAttribute('disabled', true);
    // userLinkRTL.setAttribute('disabled', true);
}








