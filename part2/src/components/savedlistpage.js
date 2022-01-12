import React from "react";
import Footer from "./footer";
import SavedList from "./savedlist";

class SavedListPage extends React.Component {

    constructor(props) {
        super(props);
        this.state = {
            authenticated: false
        }
    }

    componentDidMount() {
        if(localStorage.getItem('myReadingListToken')) {
            this.setState({authenticated:true});
        }
    }

    render() {

        return (
            <div>
                <SavedList />
                <Footer />
            </div>
        )
    }
}

export default SavedListPage;
