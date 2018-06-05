import React , {Component} from 'react';
import "../styles/Home.css";

class Home extends Component {

    render() {
        return (
            <div className="App">
                <h2 className="App_intro">You are Ariel, a teacher at <strong>HETIC</strong>. < br />
                    You had a class at <strong>9 AM</strong> but you're late. So late.< br />
                    You get out of the bed, it's half past 9.< br />

                    You have to get into the class before <strong>10 AM</strong>.< br />
                    </h2>
                <a href="/app" className="btn_app"><strong>Welcome to the grind</strong></a>
            </div>
        )
    }
}

export default Home;