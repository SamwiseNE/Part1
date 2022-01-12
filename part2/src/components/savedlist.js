import React from "react";
import Saved from "./saved";

class SavedList extends React.Component {

    constructor(props){
        super(props)
        this.state = {
            results : [],
            readinglist : []
        }
    }

    componentDidMount() {
        let url = "http://unn-w17004648.newnumyspace.co.uk/kf6012/coursework/part1/api/readinglist"

        let formData = new FormData();
        formData.append('token', localStorage.getItem('myReadingListToken'));

        fetch(url, {    method: 'POST',
            headers : new Headers(),
            body:formData})
            .then( (response) => {
                if (response.status === 200) {
                    return response.json()
                } else {
                    throw Error(response.statusText);
                }
            })
            .then( (data) => {
                this.setState({readinglist:data.results})
            })
            .catch ((err) => {
                console.log("something went wrong ", err)
            });
    }

    render() {
        return (
            <div>
                {this.state.readinglist.map( (list, i) => (<Saved key={list.paper_id} list={list}/>) )}
                <p className="info">{this.state.readinglist.length}</p>
            </div>
        )
    }
}

export default SavedList;