import React, { Component } from 'react';
import axios from 'axios';
import './App.css';

class App extends Component {

  constructor(props) {
    super(props);
    this.state = {
      currentOptionsState: [],
      pastOptions: [],
      score: 0
    }
  }

  fetchOptions() {
    axios.get('https://jsonplaceholder.typicode.com/posts/1')
    .then(((response) => {
      console.log(response)
    }))
  }

  componentWillMount(){
    this.fetchOptions()
  }

  headerRendering() {

    let headerPast = []

    for(let i = 0; i<this.state.pastOptions-1; i++) {
      headerPast.push (
        <div className="headerPast">
        <h3 class="currentOption">
        {this.state.pastOptions[i]}
      </h3>
      <h4 class="currentOption">
      {this.state.pastOptions[i+1]}
      </h4>
      </div>
      )
    }
    return headerPast
  }


  render() {
    let currentOptions = this.state.currentOptionsState.map(((element) => (
        <h3 class="currentOption">
          {element}
        </h3>
    )))
  
    return (
      <div className="App">
        <header className="App-header">
        {this.state.pastOptions ? this.headerRendering() : null}

        </header>
        <div className="currentSection">
          <h1 className="currentState"></h1>
          <h2 className="currentQuestion">Je fais quoi ?</h2>
          <div class="currentOptions">
            {this.state.currentOptionsState ? currentOptions : null}
          </div>
      </div>
      </div>
    );
  }
}

export default App;
