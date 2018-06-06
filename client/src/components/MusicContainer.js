import React, { Component } from 'react';
import axios from 'axios';
import App from './App';
import Sound from 'react-sound';


class MusicContainer extends Component {

  constructor(props) {
    super(props);
    this.state = {
    position: 0
    };
  }

  render() {
  
    return (
      <div>
      <Sound
      url="/music.mp3"
      playStatus={Sound.status.PLAYING}
      playFromPosition={this.state.position}
      volume={55}
      onPlaying={(obj) => this.setState({position: obj.position})}
      loop={true}
    />
        <App />
      </div>
    );
  }
}

export default MusicContainer;
