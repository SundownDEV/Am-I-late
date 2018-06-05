
import React from 'react'
import { Switch, Route } from 'react-router-dom'
import Home from './Home'
import App from './App'

const Router = () => (
    <main>
        <Switch>
            <Route exact path='/' component={Home}/>
            <Route path='/app' component={App}/>
        </Switch>
    </main>
);

export default Router;