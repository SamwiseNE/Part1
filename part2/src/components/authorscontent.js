import React from "react";
import AuthorsNames from "./authorsname";



class AuthorsContent extends React.Component {

    constructor(props){
        super(props)
        this.state = {
            results : []
        }
    }



    componentDidMount() {
        let url = "http://unn-w17004648.newnumyspace.co.uk/kf6012/coursework/part1/api/papers"

        if (this.props.paper_id !== undefined) {
            url += "?content=" + this.props.paper_id
        }


        fetch(url)
            .then( (response) => {
                if (response.status === 200) {
                    return response.json()
                } else {
                    throw Error(response.statusText);
                }
            })
            .then( (data) => {
                this.setState({results:data.results})
            })
            .catch ((err) => {
                console.log("something went wrong ", err)
            });

    }


    render() {


        let noData = ""
        if (this.state.results.length === 0) {
            noData = <p>No data</p>
        }


        return (
            <div>
                {noData}
                {this.state.results.map( (author, i) => (<AuthorsNames key={author.author_id} author={author} />) )}
            </div>
        )
    }
}

export default AuthorsContent;
