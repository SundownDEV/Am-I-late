import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter } from 'react-router-dom'
import './index.css';
import Main from './components/Main';
import registerServiceWorker from './registerServiceWorker';

ReactDOM.render((<BrowserRouter>
    <Main />
</BrowserRouter>), document.getElementById('root'));
registerServiceWorker();
