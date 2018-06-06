import React, { Component } from 'react';
import axios from 'axios';
import '../styles/App.css';
import Modal from 'react-modal';
import Sound from 'react-sound';


const customStyles = {
    content : {
        top                   : '50%',
        left                  : '50%',
        right                 : 'auto',
        bottom                : 'auto',
        marginRight           : '-50%',
        transform             : 'translate(-50%, -50%)'
    }
};

Modal.setAppElement("#root");

class App extends Component {

  constructor(props) {
    super(props);
    this.state = {
      currentResponses: [],
      currentQuestion: "",
      pastQuestion: null,
        modalIsOpen: false,
      pastResponse: null,
      currentSticker: null,
      score: 0,
        start: true,
        baseRoute: "http://localhost:8000"
    };
    this.fetchQuestion = this.fetchQuestion.bind(this);
    this.fetchResponses = this.fetchResponses.bind(this);
    this.openModal = this.openModal.bind(this);
    this.closeModal = this.closeModal.bind(this);
  }

    openModal() {
        this.setState({modalIsOpen: true});
    }

    closeModal() {
        this.setState({
            pastQuestion: null,
            modalIsOpen: false,
            pastResponse: null,
            start: true,
            score: 0
        });

        axios.get(this.state.baseRoute + "/questions/first"+ "?q=" + new Date().getTime())
                        .then(((data) => {
                            this.fetchQuestion(this.state.baseRoute+"/questions/"+data.data[0].id);
                            this.fetchResponses(this.state.baseRoute + "/questions/" + data.data[0].id + "/responses");
                        }))
    }

  _handleClick(element) {
    if(element.child !== element.question) {
    this.setState({
        pastQuestion: this.state.currentQuestion ,
        pastResponse: element.text,
        score: this.state.score+1
    });
      this.fetchQuestion(this.state.baseRoute + element.child);
      this.fetchResponses(this.state.baseRoute + element.child+"/responses");
    } else {
      this.setState({
          modalIsOpen: true
      })
    }
  }

  fetchQuestion(url) {
    axios.get(url)
    .then(((data) => {
      console.log(data.data);
        this.setState({
          currentQuestion: data.data.text,
          currentSticker: data.data.sticker
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

    componentWillMount() {
        if (this.state.start === true) {
                    axios.get(this.state.baseRoute + "/questions/first"+ "?q=" + new Date().getTime())
                        .then(((data) => {
                            this.fetchQuestion(this.state.baseRoute+"/questions/"+data.data[0].id);
                            this.fetchResponses(this.state.baseRoute + "/questions/" + data.data[0].id + "/responses");
                        }))
                this.setState({
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
      <Sound
      url="/music.mp3"
      playStatus={Sound.status.PLAYING}
      playFromPosition={0}
      volume={55}
      loop={true}
    />
          <Modal
              isOpen={this.state.modalIsOpen}
              onAfterOpen={this.afterOpenModal}
              onRequestClose={this.closeModal}
              style={customStyles}
              contentLabel="Modal content"
          >
                  <h2 style={{textAlign: 'center'}}>Try again ?</h2>
                  <button className="btn_app" style={{fontFamily: 'Raleway', marginTop: '15px'}} onClick={this.closeModal} >
                      Come back to the grind
                  </button>
              <h5 className="scoreTitle">Your score is {this.state.score}</h5>
          </Modal>
        <header className="App_header">
            {this.state.pastQuestion ? header : null}
            <h1>Am I late ?</h1>
        </header>
          <div className="jumbotron">
              <div className="currentSection vertical-center container">
          <h2 className="currentState">{this.state.currentQuestion}</h2>
            {this.state.currentSticker ? 
          <img src={this.state.currentSticker} style={{margin:'25px 0'}} />
          : null}
          <div className="currentOptions">
            {this.state.currentResponses ? currentOptions : null}
          </div>
            <p>Votre score : {this.state.score}</p>
        </div>
        </div>
      </div>
    );
  }
}

export default App;
