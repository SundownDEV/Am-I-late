import React from 'react'
import { Switch, Route } from 'react-router-dom'
import Home from './Home'
import MusicContainer from './MusicContainer'

const Router = () => (
    <main>
        <Switch>
            <Route exact path='/' component={Home}/>
            <Route path='/app' component={MusicContainer}/>
        </Switch>
    </main>
);

export default Router;