import React, { Component } from 'react';
import axios from 'axios';
import './App.css';

class App extends Component {

  constructor(props) {
    super(props);
    this.state = {
      currentOptionsState: ["test"],
      pastOptions: [],
      score: 0
    }
  }

  _handleClick(element) {
      this.setState(prevState => ({
          pastOptions: [...prevState.pastOptions, element]
      }))
  }

  fetchOptions(id) {
    axios.get('http://localhost/questions/'+ id)
    .then(((t) => {
        this.setState(prevState => ({
            currentOptionsState: [...prevState.currentOptionsState, t.data.responses]
        }))
    }))
  }

  componentWillMount(){
    this.fetchOptions()
  }

  headerRendering() {

    let headerPast = [];

    for(let i = 0; i<this.state.pastOptions-1; i++) {
      headerPast.push (
        <div className="headerPast">
        <h3 className="currentOption">
        {this.state.pastOptions[i]}
      </h3>
      <h4 className="currentOption">
      {this.state.pastOptions[i+1]}
      </h4>
      </div>
      )
    }
    return headerPast
  }


  render() {
    let currentOptions = this.state.currentOptionsState.map(((element, index) => (
        <div key={index} className="currentOption btn btn-default btn-lg btn-block text-left" onClick={this._handleClick.bind(this, element)}>
        <h3 className="currentOption_element">
          {element}
        </h3>
        </div>
    )));
  
    return (
      <div className="App container">
        <header className="App_header">
        {this.state.pastOptions ? this.headerRendering() : null}

        </header>
        <div className="currentSection vertical-center container">
          <h1 className="currentState">{}</h1>
          <h2 className="currentQuestion">Je fais quoi ?</h2>
          <div className="currentOptions">
            {this.state.currentOptionsState ? currentOptions : null}
          </div>
      </div>
      </div>
    );
  }
}

export default App;
