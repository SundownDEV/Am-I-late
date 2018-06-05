import React, { Component } from 'react';
import axios from 'axios';
import './App.css';

class App extends Component {

  constructor(props) {
    super(props);
    this.state = {
      currentResponses: [],
      currentQuestion: "",
      pastQuestion: null,
      pastResponse: null,
      score: 0,
        start: true,
        baseRoute: "http://localhost:8000"
    };
    this.fetchQuestion = this.fetchQuestion.bind(this);
    this.fetchResponses = this.fetchResponses.bind(this);
  }

  _handleClick(element) {
    this.setState({
        pastQuestion: this.state.currentQuestion ,
        pastResponse: element.text,
        score: this.state.score+1
    });
  this.fetchQuestion(this.state.baseRoute + element.child);
  this.fetchResponses(this.state.baseRoute + element.child+"/responses");
  }

  fetchQuestion(url) {
    axios.get(url)
    .then(((data) => {
        this.setState({
          currentQuestion: data.data.text
        })
    }))
        .catch(error => console.log(error));
  }

  fetchResponses(url) {
      axios.get(url)
          .then(((data) => {
              this.setState({
                 currentResponses : data.data
              })
          }))
    }

  componentWillMount(){
      if(this.state.start === true) {
          this.fetchQuestion(this.state.baseRoute+"/questions/1");
          this.fetchResponses(this.state.baseRoute+"/questions/1/responses");
          this.setState ({
              start: false
          })
      }
  }

  render() {
    let currentOptions = this.state.currentResponses.map((element, index) => (
      <p key={index}><a className="btn btn-default btn-lg btn-block text-left" onClick={this._handleClick.bind(this, element)}>{element.text}</a></p>
    ));

    let header = (
      <div className="jumbotron">
					<h3>{this.state.pastQuestion}<br/>
					<small>→ {this.state.pastResponse}</small></h3>
				</div>
    );
  
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
            {this.state.currentResponses ? currentOptions : null}
          </div>
      </div>
      </div>
      Votre score : {this.state.score}
      </div>
    );
  }
}

export default App;
