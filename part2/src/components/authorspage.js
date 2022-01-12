import React from "react";
import SearchBox from "./searchbox.js";
import Footer from "./footer";
import Authors from "./authors";


class AuthorPage extends React.Component {

    constructor(props) {
        super(props)
        this.state = {
            search: "",
            page: 1
        }
        this.handleSearch= this.handleSearch.bind(this);
        this.handleNextClick= this.handleNextClick.bind(this);
        this.handlePreviousClick= this.handlePreviousClick.bind(this);
    }


    handleSearch = (e) => {
        this.setState({search:e.target.value, page:1})
    }

    handleNextClick = () => {
        this.setState({page:this.state.page+1})
    }

    handlePreviousClick = () => {
        this.setState({page:this.state.page-1})
    }


    render() {
        return (
            <div className="App-header">
                <SearchBox search={this.state.search} handleSearch={this.handleSearch} />
                <Authors
                    search={this.state.search}
                    page={this.state.page}
                    handleNextClick={this.handleNextClick}
                    handlePreviousClick={this.handlePreviousClick}
                />
                <Footer />
            </div>
        )
    }
}

export default AuthorPage;