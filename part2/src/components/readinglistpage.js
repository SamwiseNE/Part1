import React from "react";
import Login from "./login.js";
import Logout from "./logout";
import ReadingList from "./readinglist";
import Footer from "./footer";

class ReadingListPage extends React.Component {

    constructor(props) {
        super(props);
        this.state = {
            authenticated: false,
            email: "",
            password: ""
        }
        this.handleEmail = this.handleEmail.bind(this);
        this.handlePassword = this.handlePassword.bind(this);
        this.handleLoginClick = this.handleLoginClick.bind(this);
    }

    handlePassword = (e) => {
        this.setState({password:e.target.value})
    }

    handleEmail = (e) => {
        this.setState({email:e.target.value})
    }

    handleLoginClick = () => {
        let url = "http://unn-w17004648.newnumyspace.co.uk/kf6012/coursework/part1/api/authenticate"

        let formData = new FormData();
        formData.append('email', this.state.email);
        formData.append('password', this.state.password);

        fetch(url, { method: 'POST',
            headers : new Headers(),
            body:formData
        })
            .then( (response) => {
                if (response.status === 200) {
                    return response.json()
                } else {
                    throw Error(response.statusText)
                }
            })
            .then( (data) => {
                if ("token" in data.results) {
                    this.setState({ authenticated: true })
                    localStorage.setItem('myReadingListToken', data.results.token)
                }
            })
            .catch ((err) => {
                    console.log("something went wrong ", err)
                }
            );
    }

    handleLogoutClick = () => {
        this.setState({"authenticated":false})
        localStorage.removeItem('myReadingListToken');
    }

    componentDidMount() {
        if(localStorage.getItem('myReadingListToken')) {
            this.setState({authenticated:true});
        }
    }

    render() {

        let page = (
            <Login
                handleEmail={this.handleEmail}
                handlePassword={this.handlePassword}
                handleLoginClick={this.handleLoginClick}
            />
        )
        if (this.state.authenticated) {
            page = (
                <div>
                    <Logout handleLogoutClick={this.handleLogoutClick} />
                    <ReadingList />
                </div>
            )
        }

        return (
            <div>
                {page}
                <Footer />
            </div>
        )
    }
}

export default ReadingListPage;
