import React , {Component} from 'react';
import "../styles/Home.css";

class Home extends Component {

    render() {
        return (
            <div className="App home">
                <div className="App_box">
                    <h1 className="App_intro" style={{textAlign:'center'}}>Am I late ?</h1>

                    <h2 className="App_intro">
                        <p>You are Ariel, a teacher at <strong>HETIC</strong>.</p>
                        <p>You had a class at <strong>9 AM</strong> but you're late. So late.</p>
                        <p>It's time to get out of the bed, it's half past 9.</p>
                        <p>You have to get into the class before <strong>10 AM</strong>.</p>
                        <p>Welcome to the grind.</p>
                    </h2>
                    <div>
                        <a href="/app" className="btn_app"><strong>Start playing now</strong></a>
                    </div>
                </div>
            </div>
        )
    }
}

export default Home;