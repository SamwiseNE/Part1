import React from "react";
import Footer from "./footer";
import logo from "../logo.svg";
import Papers from "./papers";


class Homepage extends React.Component {

    render() {
        return (
            <div className="App-header">
                <img src={logo} className="App-logo" alt="logo" />
                <p> Welcome to My App </p>
                <Papers randomPaper={true} />
                <Footer />
            </div>
        )
    }
}

export default Homepage;
