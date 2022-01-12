import React from "react";
import PapersTitles from "./paperstitles";

class PapersContent extends React.Component {

    constructor(props){
        super(props)
        this.state = {
            results : []
        }
    }



    componentDidMount() {
        let url = "http://unn-w17004648.newnumyspace.co.uk/kf6012/coursework/part1/api/authors"

        if (this.props.author_id !== undefined) {
            url += "?content=" + this.props.author_id
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
                {this.state.results.map( (paper, i) => (<PapersTitles key={i} paper={paper} />) )}
            </div>
        )
    }
}

export default PapersContent;
