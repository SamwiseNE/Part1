import React from "react";
import Paper from "./paper";

class Papers extends React.Component {

    constructor(props){
        super(props)
        this.state = {
            results : [],
            page: 1
        }
    }

    componentDidMount() {
        let url = "http://unn-w17004648.newnumyspace.co.uk/kf6012/coursework/part1/api/papers"

        fetch(url)
            .then( (response) => {
                if (response.status === 200) {
                    return response.json()
                } else {
                    throw Error(response.statusText);
                }
            })
            .then( (data) => {
                console.log(data)
                if (this.props.randomPaper) {
                    const randomPaperID = Math.floor(Math.random() * data.results.length)
                    this.setState({results:[data.results[randomPaperID]]})
                } else {
                    this.setState({results:data.results})
                }
            })
            .catch ((err) => {
                console.log("something went wrong ", err)
            });
    }


    filterByAward = (paper) => {
        return ((paper.award === this.props.award) || (this.props.award === ""))
    }

    filterSearch = (s) => {
        return s.title.toLowerCase().includes(this.props.search.toLowerCase()) || s.abstract.toLowerCase().includes(this.props.search.toLowerCase())
    }

    render() {
        let noData = ""

        if (this.state.results.length === 0) {
            noData = <p>No data</p>
        }

        let filteredResults = this.state.results

        if (this.props.award !== undefined) {
            filteredResults = filteredResults.filter(this.filterByAward)
        }

        if ((filteredResults.length > 0) && (this.props.search !== undefined)) {
            filteredResults = filteredResults.filter(this.filterSearch)
        }

        let buttons = ""

        if (this.props.page !== undefined) {
            const pageSize = 10;
            let pageMax = this.props.page * pageSize
            let pageMin = pageMax - pageSize


            buttons = (
                <div>
                    <button onClick={this.props.handlePreviousClick} disabled={this.props.page <= 1}>Previous</button>
                    <button onClick={this.props.handleNextClick} disabled={this.props.page >= Math.ceil(filteredResults.length / pageSize)}>Next</button>
                </div>
            )
            filteredResults = filteredResults.slice(pageMin, pageMax)
        }

        /*TODO
        Fix award filter
         */
        console.log(this.props.award)


        return (
            <div>
                {noData}
                {filteredResults.map( (paper, i) => (<Paper key={paper.paper_id} paper={paper} />) )}
                {buttons}
            </div>
        )
    }
}

export default Papers;
