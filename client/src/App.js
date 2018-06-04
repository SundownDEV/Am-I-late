import React, { Component } from 'react';
import axios from 'axios';
import './App.css';

class App extends Component {

  constructor(props) {
    super(props);
    this.state = {
      currentResponses: ["zert","zert","zert","zert"],
      currentQuestion: "zefzeezze",
      currentResponsesContent: ["zert","zert","zert","zert"],
      currentResponsesChild: [0,1,2,3],
      pastQuestion: null,
      pastResponse: null,
      score: 0,

    }
  }

  _handleClick(event) {

  }

  fetchQuestion(id) {
    axios.get('http://localhost:8000/questions/'+ id)
    .then(((data) => {
        this.setState({
          currentResponses : data.responses,
          currentQuestion: data.text
        })
    }))
  }

  fetchResponses() {
    this.state.currentResponses.forEach((element) => {
      axios.get(element)
    .then(((t) => {
        this.setState(prevState => ({
          currentResponsesContent: [...prevState.currentResponsesContent, t.text],
          currentResponsesChild: [...prevState.currentResponsesChild, t.child]
        }))
    }))
    })
    
  }

  componentWillMount(){
    this.fetchQuestion(0);
    this.fetchResponses();
  }

  render() {
    let currentOptions = this.state.currentResponsesContent.map(((element, index) => (
      <p key={index}><a class="btn btn-default btn-lg btn-block text-left" onClick={this._handleClick.bind(this, element)}>{element}</a></p>
    )));

    let header = () => (
      <div class="jumbotron">
					<h3>{this.state.pastQuestion}<br/>
					<small>→ {this.state.pastResponse}</small></h3>
				</div>
    )
  
    return (
      <div className="App container">
      <h1>Am I late ?</h1>
        <header className="App_header">
        {this.state.pastQuestion ? header : null}

        </header>
        <div className="jumbotron">
        <div className="currentSection vertical-center container">
          <h1 className="currentState">{this.state.currentQuestion}</h1>
          <h2 className="currentQuestion">Je fais quoi ?</h2>
          <div className="currentOptions">
            {this.state.currentResponsesContent ? currentOptions : null}
          </div>
      </div>
      </div>
      </div>
    );
  }
}

export default App;
